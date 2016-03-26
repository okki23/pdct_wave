<?php
  
 header("Content-Type: application/force-download");
 header("Cache-Control: no-cache, must-revalidate");
 header("Expires: Sat, 26 Jul 2010 05:00:00 GMT"); 
 header("content-disposition: attachment;filename=billing_list".date('d-m-Y').".xls");
 
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include "config.php";
include "fn_tgl_indo.php";
 
		$id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
 		$start_date_send = isset($_REQUEST['start_date_send']) ? $_REQUEST['start_date_send'] : '';
		$ending_date_send = isset($_REQUEST['ending_date_send']) ? $_REQUEST['ending_date_send'] : '';
    
        //x0
        if(!empty($id_customer_name) && empty($start_date_send) && empty($ending_date_send)){

        $sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
                    b.site_code,b.contract_number_file,b.contract_date,b.nama_pekerjaan,
                    b.contract_status_opt, b.contract_date,c.charges,c.bill_periode,
                    c.bill_amount,d.customer_name, c.paid_status,sum(c.paid_amount) as totalpaid,
                    sum(c.bill_amount) as totalbillamount from pdct_customer a
                    left join pdct_contract b on b.id_customer = a.id 
                    left join pdct_billing c on c.id_contract = b.id
                    left join pdct_customer_name d on d.id = a.id_customer_name 
                    where a.id_customer_name = '$id_customer_name' group by a.id";
            
            //ambil nama customer : 
            $sqlcust = "select * from pdct_customer_name where id = '$id_customer_name'";
            $exsqlcust =$db->Execute($sqlcust);
            $getcust = $exsqlcust->FetchRow();
            $namacustomer = $getcust['customer_name'];

        //0x
        }elseif(empty($id_customer_name) && !empty($start_date_send) && !empty($ending_date_send)){

         $sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
                    b.site_code,b.contract_number_file,b.contract_date,b.nama_pekerjaan,
                    b.contract_status_opt, b.contract_date,c.charges,c.bill_periode,
                    c.bill_amount,d.customer_name, c.paid_status,sum(c.paid_amount) as totalpaid,
                    sum(c.bill_amount) as totalbillamount from pdct_customer a
                    left join pdct_contract b on b.id_customer = a.id 
                    left join pdct_billing c on c.id_contract = b.id
                    left join pdct_customer_name d on d.id = a.id_customer_name 
                    where b.contract_date BETWEEN '$start_date_send' and '$ending_date_send' group by a.id";
            
            //ambil nama customer : 
        
            $namacustomer = '';
        //xx
        }elseif(!empty($id_customer_name) && !empty($start_date_send) && !empty($ending_date_send)){
            
          $sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
                    b.site_code,b.contract_number_file,b.contract_date,b.nama_pekerjaan,
                    b.contract_status_opt, b.contract_date,c.charges,c.bill_periode,
                    c.bill_amount,d.customer_name, c.paid_status,sum(c.paid_amount) as totalpaid,
                    sum(c.bill_amount) as totalbillamount from pdct_customer a
                    left join pdct_contract b on b.id_customer = a.id 
                    left join pdct_billing c on c.id_contract = b.id
                    left join pdct_customer_name d on d.id = a.id_customer_name 
                    where a.id_customer_name = '$id_customer_name'
                    and b.contract_date BETWEEN '$start_date_send' and '$ending_date_send' 
                    group by a.id";
            
            //ambil nama customer : 
            $sqlcust = "select * from pdct_customer_name where id = '$id_customer_name'";
            $exsqlcust =$db->Execute($sqlcust);
            $getcust = $exsqlcust->FetchRow();
            $namacustomer = $getcust['customer_name'];
    }
      
?>
<h1 align="center"> Billing List </h1>
  <table align="center" border="0" cellpadding="3" cellspacing="0" width="100%">
        
        <tr>  

         
            <td> <b> Customer Name </b> </td>
            
            <td colspan="3"> :
            <?php 
            if($namacustomer == ''){
            echo '-';
            }else{
            echo $namacustomer; 
            }?>
            </td>
          
        </tr>
        
        <tr>
           <td> <b> Month   </b> </td>
            
            <td> : 
            <?php 
            if(empty($start_date_send)) {
            echo "-";
            }else{
            echo $start_date_send;
            }
            ?>
            </td>
            <td> <b>To</b> </td>
            <td>  
            <?php 
            if(empty($ending_date_send)) {
            echo "-";
            }else{
            echo $ending_date_send;
            }
            ?>
            </td>
        </tr>

       

    </table>
    <br>
     <table align="center" class="table table-stripped table-hover" border="1" cellpadding="3" cellspacing="0" width="100%">
        <tr align="center">
        <td> <b>Contract Date </b>  </td>
        <td> <b>Contract Number </b>  </td>
        <td> <b>Nama Pekerjaan </b> </td>
        <td> <b>CC Name </b>  </td>
        <td> <b>Total Bill Amount </b> </td>
        <td> <b>Total Paid Amount </b> </td>
        </tr>
        
        <?php

 		$exsql = $db->Execute($sql);
		$sumtotalbill = 0;
        $sumtotalpaid = 0;

		while($row = $exsql->FetchRow()){
		
        $sumtotalbill += $row['totalbillamount'];
        $sumtotalpaid += $row['totalpaid'];
        ?>

        <tr>
        <td> <?php echo $row['contract_date']; ?>  </td>
        <td> <?php echo $row['contract_number_file']; ?>  </td>
        <td> <?php echo $row['nama_pekerjaan']; ?> </td>
        <td align="center"> <?php echo $row['cc_name']; ?> </td>
        <td align="center"> <?php echo $row['totalbillamount']; ?> </td>
      
        <td align="center"> IDR <?php echo number_format($row['totalpaid'],0,".","."); ?>  </td>
         
        </tr>
  		
  		<?php
  		 
		}	
  		?>
       

         <tr align="center">
          <td colspan="4"> <b>TOTAL IDR </b> </td>
          <td> <b>IDR . <?php echo number_format($sumtotalbill,0,".","."); ?> </b></td>
          <td> <b>IDR . <?php echo number_format($sumtotalpaid,0,".","."); ?> </b></td>
        </tr>
     </table>
</body>
</html>