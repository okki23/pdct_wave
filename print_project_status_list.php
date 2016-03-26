<?php
 
 header("Content-Type: application/force-download");
 header("Cache-Control: no-cache, must-revalidate");
 header("Expires: Sat, 26 Jul 2010 05:00:00 GMT"); 
 header("content-disposition: attachment;filename=project_status_list".date('d-m-Y').".xls");
 
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
		$id_contract_status = isset($_REQUEST['id_contract_status']) ? $_REQUEST['id_contract_status'] : '';
 		$start_date_send = isset($_REQUEST['start_date_send']) ? $_REQUEST['start_date_send'] : '';
		$ending_date_send = isset($_REQUEST['ending_date_send']) ? $_REQUEST['ending_date_send'] : '';
    

 
$sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,
                         a.site_name, b.site_code,b.contract_number_file,
                         b.nama_pekerjaan,b.contract_status_opt, b.contract_date,c.charges,
                         c.bill_periode,c.bill_amount,d.customer_name, sum(c.bill_amount) as totalku 
                         from pdct_customer a
                        left join pdct_contract b on b.id_customer = a.id
                        left join pdct_billing c on c.id_contract = b.id
                        left join pdct_customer_name d on d.id = a.id_customer_name
                        where b.contract_date BETWEEN '$start_date_send' and '$ending_date_send'
                         GROUP BY b.contract_number_file";

 

//$start_date_send = isset($_REQUEST['start_date_send']) ? $_REQUEST['start_date_send'] : '';
//$ending_date_send = isset($_REQUEST['ending_date_send']) ? $_REQUEST['ending_date_send'] : '';
     

 
?>
<h1 align="center"> Project Status List </h1>
  <table align="center" border="0" cellpadding="3" cellspacing="0" width="100%">
        
        
        <tr>
           <td> <b> Periode   </b> </td>
            
            <td> : 
            <?php 
            if(empty($start_date_send)) {
            echo "-";
            }else{
            echo date('d F Y',strtotime($start_date_send));
            }
            ?>
            </td>
            <td> <b>To</b> </td>
            <td>  
            <?php 
            if(empty($ending_date_send)) {
            echo "-";
            }else{
            echo date('d F Y',strtotime($ending_date_send));
            }
            ?>
            </td>
        </tr>

       

    </table>
    <br>
     <table align="center" class="table table-stripped table-hover" border="1" cellpadding="3" cellspacing="0" width="100%">
        <tr align="center">
        <td> <b>Contract Number </b>  </td>
        <td> <b>Nama Pekerjaan </b> </td>
        <td> <b>Customer Name </b>  </td>
        <td> <b>Total Bill Amount </b> </td>
        </tr>
        
        <?php

     
      
      
		$exsql = $db->Execute($sql);
		$sumtotal = 0;
		while($row = $exsql->FetchRow()){
			
        ?>

        
       
        <tr>
        <td> <?php echo $row['contract_number_file']; ?>  </td>
        <td> <?php echo $row['nama_pekerjaan']; ?> </td>
        <td align="center"> <?php echo $row['customer_name']; ?> </td>
      
        <td align="center"> Rp. <?php echo number_format($row['totalku'],0,".","."); ?>  </td>
         
        </tr>
  		
  		<?php
  		$sumtotal += $row['totalku'];
		}	
  		?>
       

         <tr align="center">
          <td colspan="3"> <b>TOTAL IDR </b> </td>
          <td colspan="1"> <b> Rp. <?php echo number_format($sumtotal,0,".","."); ?> </b></td>
        </tr>
     </table>
</body>
</html>