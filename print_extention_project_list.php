<?php
 
 header("Content-Type: application/force-download");
 header("Cache-Control: no-cache, must-revalidate");
 header("Expires: Sat, 26 Jul 2010 05:00:00 GMT"); 
 header("content-disposition: attachment;filename=extention_project_list".date('d-m-Y').".xls");
 
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
        $id_contract_status = isset($_REQUEST['id_contract_status']) ? $_REQUEST['id_contract_status'] : '';
 		 
        $start_date_send = $_POST['start_date_send'];
        $ending_date_send = $_POST['ending_date_send'];
          
        
        $start_date = date('Y-m-d',strtotime($start_date_send));
        $ending_date = date('Y-m-d',strtotime($ending_date_send));
        
        //x00
        if(!empty($id_contract_status) && empty($id_customer_name) && empty($start_date_send) && empty($ending_date_send)){

               
        $start_date = '';
        $ending_date = '';

         $sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
                    b.site_code,b.contract_number_file,b.nama_pekerjaan,b.contract_date,b.start_date,
                    b.ending_date,b.contract_status_opt,c.charges,c.bill_periode,c.bill_amount,
                    d.customer_name, sum(c.bill_amount) as totalku from pdct_customer a
                    left join pdct_contract b on b.id_customer = a.id
                    left join pdct_billing c on c.id_contract = b.id
                    left join pdct_customer_name d on d.id = a.id_customer_name 
                    where b.contract_status_opt = '$id_contract_status' 
                    GROUP BY a.id";

              //get data customer
                    
                    $namacustomer = '';

              //get data contract status
                    $sqlcont = "select * from pdct_contract_status where id = '$id_contract_status'";
                    $exsqlcont =$db->Execute($sqlcont);
                    $getcont = $exsqlcont->FetchRow();
                    $contractstatus = $getcont['contract_status'];

        //xx0
        }elseif (!empty($id_contract_status) && !empty($id_customer_name) && empty($start_date_send) && empty($ending_date_send)) {

        $start_date = '';
        $ending_date = '';

         $sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
                    b.site_code,b.contract_number_file,b.nama_pekerjaan,b.contract_date,b.start_date,
                    b.ending_date,b.contract_status_opt,c.charges,c.bill_periode,c.bill_amount,
                    d.customer_name, sum(c.bill_amount) as totalku from pdct_customer a
                    left join pdct_contract b on b.id_customer = a.id
                    left join pdct_billing c on c.id_contract = b.id
                    left join pdct_customer_name d on d.id = a.id_customer_name 
                    where a.id_customer_name = '$id_customer_name'
                    and b.contract_status_opt = '$id_contract_status' 
                    GROUP BY a.id";

              //get data customer
                    $sqlcust = "select * from pdct_customer_name where id = '$id_customer_name'";
                    $exsqlcust =$db->Execute($sqlcust);
                    $getcust = $exsqlcust->FetchRow();
                    $namacustomer = $getcust['customer_name'];

              //get data contract status
                    $sqlcont = "select * from pdct_contract_status where id = '$id_contract_status'";
                    $exsqlcont =$db->Execute($sqlcont);
                    $getcont = $exsqlcont->FetchRow();
                    $contractstatus = $getcont['contract_status'];
         
        //xxx  
        }elseif (!empty($id_contract_status) && !empty($id_customer_name) && !empty($start_date_send) && !empty($ending_date_send)) {

      

            $sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
                    b.site_code,b.contract_number_file,b.nama_pekerjaan,b.contract_date,b.start_date,
                    b.ending_date,b.contract_status_opt,c.charges,c.bill_periode,c.bill_amount,
                    d.customer_name, sum(c.bill_amount) as totalku from pdct_customer a
                    left join pdct_contract b on b.id_customer = a.id
                    left join pdct_billing c on c.id_contract = b.id
                    left join pdct_customer_name d on d.id = a.id_customer_name 
                    where a.id_customer_name = '$id_customer_name'
                    and b.contract_status_opt = '$id_contract_status'
                    and b.ending_date BETWEEN '$start_date_send' and '$ending_date_send'
                    GROUP BY a.id";

              //get data customer
                    $sqlcust = "select * from pdct_customer_name where id = '$id_customer_name'";
                    $exsqlcust =$db->Execute($sqlcust);
                    $getcust = $exsqlcust->FetchRow();
                    $namacustomer = $getcust['customer_name'];

              //get data contract status
                    $sqlcont = "select * from pdct_contract_status where id = '$id_contract_status'";
                    $exsqlcont =$db->Execute($sqlcont);
                    $getcont = $exsqlcont->FetchRow();
                    $contractstatus = $getcont['contract_status'];

        //0xx
        }elseif (empty($id_contract_status) && !empty($id_customer_name) && !empty($start_date_send) && !empty($ending_date_send)) {

             $sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
                    b.site_code,b.contract_number_file,b.nama_pekerjaan,b.contract_date,b.start_date,
                    b.ending_date,b.contract_status_opt,c.charges,c.bill_periode,c.bill_amount,
                    d.customer_name, sum(c.bill_amount) as totalku from pdct_customer a
                    left join pdct_contract b on b.id_customer = a.id
                    left join pdct_billing c on c.id_contract = b.id
                    left join pdct_customer_name d on d.id = a.id_customer_name 
                    where a.id_customer_name = '$id_customer_name' 
                    and b.ending_date BETWEEN '$start_date_send' and '$ending_date_send'
                    GROUP BY a.id";

              //get data customer
                    $sqlcust = "select * from pdct_customer_name where id = '$id_customer_name'";
                    $exsqlcust =$db->Execute($sqlcust);
                    $getcust = $exsqlcust->FetchRow();
                    $namacustomer = $getcust['customer_name'];

              //get data contract status
                   
                    $contractstatus = '';
            
        //00x    
        }elseif (empty($id_contract_status) && empty($id_customer_name) && !empty($start_date_send) && !empty($ending_date_send)) {

            $sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
                    b.site_code,b.contract_number_file,b.nama_pekerjaan,b.contract_date,b.start_date,
                    b.ending_date,b.contract_status_opt,c.charges,c.bill_periode,c.bill_amount,
                    d.customer_name, sum(c.bill_amount) as totalku from pdct_customer a
                    left join pdct_contract b on b.id_customer = a.id
                    left join pdct_billing c on c.id_contract = b.id
                    left join pdct_customer_name d on d.id = a.id_customer_name 
                    where b.ending_date BETWEEN '$start_date_send' and '$ending_date_send'
                    GROUP BY a.id";

              //get data customer
                   
                    $namacustomer = '';

              //get data contract status
                    
                    $contractstatus = '';

        //x0x   
        }elseif (!empty($id_contract_status) && empty($id_customer_name) && !empty($start_date_send) && !empty($ending_date_send)) {

            $sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
                    b.site_code,b.contract_number_file,b.nama_pekerjaan,b.contract_date,b.start_date,
                    b.ending_date,b.contract_status_opt,c.charges,c.bill_periode,c.bill_amount,
                    d.customer_name, sum(c.bill_amount) as totalku from pdct_customer a
                    left join pdct_contract b on b.id_customer = a.id
                    left join pdct_billing c on c.id_contract = b.id
                    left join pdct_customer_name d on d.id = a.id_customer_name 
                    where  b.contract_status_opt = '$id_contract_status'
                    and b.ending_date BETWEEN '$start_date_send' and '$ending_date_send'
                    GROUP BY a.id";

              //get data customer
                 
                    $namacustomer = '';

              //get data contract status
                    $sqlcont = "select * from pdct_contract_status where id = '$id_contract_status'";
                    $exsqlcont =$db->Execute($sqlcont);
                    $getcont = $exsqlcont->FetchRow();
                    $contractstatus = $getcont['contract_status'];        

        //0x0    
        }elseif (empty($id_contract_status) && !empty($id_customer_name) && empty($start_date_send) && empty($ending_date_send)) {

             $start_date = '';
             $ending_date = '';


              $sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
                    b.site_code,b.contract_number_file,b.nama_pekerjaan,b.contract_date,b.start_date,
                    b.ending_date,b.contract_status_opt,c.charges,c.bill_periode,c.bill_amount,
                    d.customer_name, sum(c.bill_amount) as totalku from pdct_customer a
                    left join pdct_contract b on b.id_customer = a.id
                    left join pdct_billing c on c.id_contract = b.id
                    left join pdct_customer_name d on d.id = a.id_customer_name 
                    where a.id_customer_name = '$id_customer_name' 
                    GROUP BY a.id";

              //get data customer
                    $sqlcust = "select * from pdct_customer_name where id = '$id_customer_name'";
                    $exsqlcust =$db->Execute($sqlcust);
                    $getcust = $exsqlcust->FetchRow();
                    $namacustomer = $getcust['customer_name'];

              //get data contract status
                    
                    $contractstatus = '';
             
        }

         

         /*--------------------------------------*/
       

 
  
?>
<h1 align="center"> Extention Project List </h1>
  <table align="center" border="0" cellpadding="3" cellspacing="0" width="100%">
        
        <tr>  

         
            <td> <b> Contract Status Name </b> </td>
            
            <td colspan="3"> :
            <?php 
            if($contractstatus == ''){
            echo '-';
            }else{
            echo $contractstatus; 
            }?>
            </td>
          
        </tr>
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
           <td> <b>Month </b> </td>
            
            <td> : 
            <?php 

            if(empty($start_date)) {
            echo "-";
            }else{
            echo date('d F Y',strtotime($start_date));
            }
            ?>
            </td>
            <td> <b>To</b> </td>
            <td>  
            <?php 
            if(empty($ending_date)) {
            echo "-";
            }else{
            echo date('d F Y',strtotime($ending_date));
            }
            ?>
            </td>
        </tr>

       

    </table>
    <br>
     <table align="center" class="table table-stripped table-hover" border="1" cellpadding="3" cellspacing="0" width="100%">
        <tr align="center">
        <td> <b>Ending Date </b>  </td>
        <td> <b>Contract Date </b>  </td>
        <td> <b>Contract Number </b>  </td>
        <td> <b>Nama Pekerjaan </b> </td>
        <td> <b>CC Name </b>  </td>
        <td> <b>Total Bill Amount </b> </td>
        </tr>
        
        <?php

 		$exsql = $db->Execute($sql);
		$sumtotal = 0;
		while($row = $exsql->FetchRow()){
			
        ?>

        <tr>
        <td> <?php echo $row['ending_date']; ?>  </td>
        <td> <?php echo $row['contract_date']; ?>  </td>
        <td> <?php echo $row['contract_number_file']; ?>  </td>
        <td> <?php echo $row['nama_pekerjaan']; ?> </td>
        <td align="center"> <?php echo $row['cc_name']; ?> </td>
      
        <td align="center"> IDR <?php echo number_format($row['totalku'],0,".","."); ?>  </td>
         
        </tr>
  		
  		<?php
  		$sumtotal += $row['totalku'];
		}	
  		?>
       

         <tr align="center">
          <td colspan="5"> <b>TOTAL IDR </b> </td>
          <td> <b>IDR . <?php echo number_format($sumtotal,0,".","."); ?> </b></td>
        </tr>
     </table>
</body>
</html>