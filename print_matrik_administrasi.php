<?php
 
 header("Content-Type: application/force-download");
 header("Cache-Control: no-cache, must-revalidate");
 header("Expires: Sat, 26 Jul 2010 05:00:00 GMT"); 
 header("content-disposition: attachment;filename=matrik_administrasi".date('d-m-Y').".xls");
 
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
 		$start_date_send = isset($_REQUEST['start_date_send']) ? $_REQUEST['start_date_send'] : '';
		$ending_date_send = isset($_REQUEST['ending_date_send']) ? $_REQUEST['ending_date_send'] : '';
    

        //X00
        if(!empty($id_contract_status) && empty($id_customer_name) && empty($start_date_send) && empty($ending_date_send)){
 //echo "x00";
            $id_contract_status = isset($_REQUEST['id_contract_status']) ? $_REQUEST['id_contract_status'] : '';
            $id_customer_name = '';
            $start_date = '';
            $ending_date = '';
            $start_date_send = '';
            $ending_date_send = '';

            $sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
                    b.site_code,b.contract_number_file,b.nama_pekerjaan,
                    b.no_spk_p8_date_upload,
                    b.contract_date,b.bast_date_upload,b.baso_date_upload,b.sid,b.cid,
                    b.account_manager,b.email,b.phone,
                    b.contract_status_opt,b.start_date,b.ending_date,c.charges,c.bill_periode,
                    c.bill_amount,d.customer_name,
                    sum(c.bill_amount) as totalku from pdct_customer a
                    left join pdct_contract b on b.id_customer = a.id
                    left join pdct_billing c on c.id_contract = b.id
                    left join pdct_customer_name d on d.id = a.id_customer_name 
                    where b.contract_status_opt = '$id_contract_status' 
                    GROUP BY a.id";
            
            
         
                    //get data customer
                     
                    $namacustomer = '-';

                    //get data contract status
                    $sqlcont = "select * from pdct_contract_status where id = '$id_contract_status'";
                    $exsqlcont =$db->Execute($sqlcont);
                    $getcont = $exsqlcont->FetchRow();
                    $contractstatus = $getcont['contract_status'];
        
        //xx0
        }elseif(!empty($id_contract_status) && !empty($id_customer_name) && empty($start_date_send) && empty($ending_date_send)){
             
            $id_contract_status = isset($_REQUEST['id_contract_status']) ? $_REQUEST['id_contract_status'] : '';
            $id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
            $start_date = '';
            $ending_date = '';
            $start_date_send = '';
            $ending_date_send = '';

            $sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
                    b.site_code,b.contract_number_file,b.nama_pekerjaan,
                    b.no_spk_p8_date_upload,
                    b.contract_date,b.bast_date_upload,b.baso_date_upload,b.sid,b.cid,
                    b.account_manager,b.email,b.phone,
                    b.contract_status_opt,b.start_date,b.ending_date,c.charges,c.bill_periode,
                    c.bill_amount,d.customer_name,
                    sum(c.bill_amount) as totalku from pdct_customer a
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
        }elseif(!empty($id_contract_status) && !empty($id_customer_name) && !empty($start_date_send) && !empty($ending_date_send)){
            $id_contract_status = isset($_REQUEST['id_contract_status']) ? $_REQUEST['id_contract_status'] : '';
            $id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
            $start_date = date('Y-m-d',strtotime($_POST['start_date_send']));
            $ending_date = date('Y-m-d',strtotime($_POST['ending_date_send']));
            $start_date_send = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : '';
            $ending_date_send = isset($_REQUEST['ending_date']) ? $_REQUEST['ending_date'] : '';


      

             $sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
                    b.site_code,b.contract_number_file,b.nama_pekerjaan,
                    b.no_spk_p8_date_upload,
                    b.contract_date,b.bast_date_upload,b.baso_date_upload,b.sid,b.cid,
                    b.account_manager,b.email,b.phone,
                    b.contract_status_opt,b.start_date,b.ending_date,c.charges,c.bill_periode,
                    c.bill_amount,d.customer_name,
                    sum(c.bill_amount) as totalku from pdct_customer a
                    left join pdct_contract b on b.id_customer = a.id
                    left join pdct_billing c on c.id_contract = b.id
                    left join pdct_customer_name d on d.id = a.id_customer_name 
                    where a.id_customer_name = '$id_customer_name'
                    and b.contract_status_opt = '$id_contract_status'
                    and b.contract_date BETWEEN '$start_date' and '$ending_date'
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
         

        
    
        //X0X
        }elseif(!empty($id_contract_status) && empty($id_customer_name) && !empty($start_date_send) && !empty($ending_date_send)){
             
            $id_contract_status = isset($_REQUEST['id_contract_status']) ? $_REQUEST['id_contract_status'] : '';
            $id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
            $start_date = date('Y-m-d',strtotime($_POST['start_date_send']));
            $ending_date = date('Y-m-d',strtotime($_POST['ending_date_send']));
            $start_date_send = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : '';
            $ending_date_send = isset($_REQUEST['ending_date']) ? $_REQUEST['ending_date'] : '';

           

             $sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
                    b.site_code,b.contract_number_file,b.nama_pekerjaan,
                    b.no_spk_p8_date_upload,
                    b.contract_date,b.bast_date_upload,b.baso_date_upload,b.sid,b.cid,
                    b.account_manager,b.email,b.phone,
                    b.contract_status_opt,b.start_date,b.ending_date,c.charges,c.bill_periode,
                    c.bill_amount,d.customer_name,
                    sum(c.bill_amount) as totalku from pdct_customer a
                    left join pdct_contract b on b.id_customer = a.id
                    left join pdct_billing c on c.id_contract = b.id
                    left join pdct_customer_name d on d.id = a.id_customer_name 
                    where  b.contract_status_opt = '$id_contract_status'
                    and b.contract_date BETWEEN '$start_date' and '$ending_date'
                    GROUP BY a.id";
            
            
           
                    //get data customer
                     
                    $namacustomer = '-';

                    //get data contract status
                    $sqlcont = "select * from pdct_contract_status where id = '$id_contract_status'";
                    $exsqlcont =$db->Execute($sqlcont);
                    $getcont = $exsqlcont->FetchRow();
                    $contractstatus = $getcont['contract_status'];
    
        //0X0
        }elseif(empty($id_contract_status) && !empty($id_customer_name) && empty($start_date_send) && empty($ending_date_send)){
 
            $id_contract_status = isset($_REQUEST['id_contract_status']) ? $_REQUEST['id_contract_status'] : '';
            $id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
            $start_date = '';
            $ending_date = '';
            $start_date_send = '';
            $ending_date_send = '';

             $sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
                    b.site_code,b.contract_number_file,b.nama_pekerjaan,
                    b.no_spk_p8_date_upload,
                    b.contract_date,b.bast_date_upload,b.baso_date_upload,b.sid,b.cid,
                    b.account_manager,b.email,b.phone,
                    b.contract_status_opt,b.start_date,b.ending_date,c.charges,c.bill_periode,
                    c.bill_amount,d.customer_name,
                    sum(c.bill_amount) as totalku from pdct_customer a
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
                     
                    $contractstatus = '-';

        //00X
        }elseif(empty($id_contract_status) && empty($id_customer_name) && !empty($start_date_send) && !empty($ending_date_send)){
         
            $id_contract_status = '';
            $id_customer_name = '';
             $start_date = date('Y-m-d',strtotime($_POST['start_date_send']));
             $ending_date = date('Y-m-d',strtotime($_POST['ending_date_send']));
            $start_date_send = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : '';
            $ending_date_send = isset($_REQUEST['ending_date']) ? $_REQUEST['ending_date'] : '';
 

            $sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
                    b.site_code,b.contract_number_file,b.nama_pekerjaan,
                    b.no_spk_p8_date_upload,
                    b.contract_date,b.bast_date_upload,b.baso_date_upload,b.sid,b.cid,
                    b.account_manager,b.email,b.phone,
                    b.contract_status_opt,b.start_date,b.ending_date,c.charges,c.bill_periode,
                    c.bill_amount,d.customer_name,
                    sum(c.bill_amount) as totalku from pdct_customer a
                    left join pdct_contract b on b.id_customer = a.id
                    left join pdct_billing c on c.id_contract = b.id
                    left join pdct_customer_name d on d.id = a.id_customer_name 
                    where b.contract_date BETWEEN '$start_date' and '$ending_date'
                    GROUP BY a.id";
            
            
           
                    //get data customer
                     
                    $namacustomer = '-';

                    //get data contract status
                    
                    $contractstatus = '-';
        
        //0XX
        }elseif(empty($id_contract_status) && !empty($id_customer_name) && !empty($start_date_send) && !empty($ending_date_send)){
         
            $id_contract_status =  '';
            $id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
            $start_date = date('Y-m-d',strtotime($_POST['start_date_send']));
            $ending_date = date('Y-m-d',strtotime($_POST['ending_date_send']));
            $start_date_send = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : '';
            $ending_date_send = isset($_REQUEST['ending_date']) ? $_REQUEST['ending_date'] : '';

          
                    
                  $sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
                    b.site_code,b.contract_number_file,b.nama_pekerjaan,
                    b.no_spk_p8_date_upload,
                    b.contract_date,b.bast_date_upload,b.baso_date_upload,b.sid,b.cid,
                    b.account_manager,b.email,b.phone,
                    b.contract_status_opt,b.start_date,b.ending_date,c.charges,c.bill_periode,
                    c.bill_amount,d.customer_name,
                    sum(c.bill_amount) as totalku from pdct_customer a
                    left join pdct_contract b on b.id_customer = a.id
                    left join pdct_billing c on c.id_contract = b.id
                    left join pdct_customer_name d on d.id = a.id_customer_name 
                    where a.id_customer_name = '$id_customer_name' 
                    and b.contract_date BETWEEN '$start_date' and '$ending_date'
                    GROUP BY a.id";
            
            
                    //get data customer
                    $sqlcust = "select * from pdct_customer_name where id = '$id_customer_name'";
                    $exsqlcust =$db->Execute($sqlcust);
                    $getcust = $exsqlcust->FetchRow();
                    $namacustomer = $getcust['customer_name'];

                    //get data contract status
                     
                    $contractstatus = '-';

        }
         
?>
<h1 align="center"> Matrik Administrasi </h1>
  <table align="center" border="0" cellpadding="3" cellspacing="0" width="100%">
        
        <tr>  

         
            <td> <b> Contract Status </b> </td>
            
            <td colspan="3"> : <?php echo $contractstatus; ?></td>
          
        </tr>
         <tr>  

         
            <td> <b> Customer Name </b> </td>
            
            <td colspan="3"> : <?php echo $namacustomer; ?></td>
          
        </tr>
        <tr>
           <td> <b> Periode   </b> </td>
            
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
        <td> <b>Contract Number </b> </td>
        <td> <b>Nama Pekerjaan </b>  </td>
        <td> <b>CC Name </b> </td>
        <td> <b>Jangka Waktu </b> </td>
        <td> <b>Date Input SPK/P8 Waktu </b> </td>
        <td> <b>Date Input Contract Date </b> </td>
        <td> <b>Date Input BASO </b> </td>
        <td> <b>Date Input BAST </b> </td>
        <td> <b>PIC </b> </td>
        <td> <b>CID/SID </b> </td>
        </tr>
        
        <?php

     
      
      
		$exsql = $db->Execute($sql);
		$sumtotal = 0;
		while($row = $exsql->FetchRow()){
			
        ?>

        
       
        <tr>
        <td> <?php echo $row['contract_number_file']; ?>  </td>
        <td> <?php echo $row['nama_pekerjaan']; ?> </td>
        <td> <?php echo $row['cc_name']; ?>  </td>
        <td> <?php echo $row['start_date'] ."-" . $row['ending_date']; ?> </td>
        <td> <?php echo $row['no_spk_p8_date_upload']; ?>  </td>
        <td> <?php echo $row['contract_date']; ?> </td>
        <td> <?php echo $row['baso_date_upload']; ?>  </td>
        <td> <?php echo $row['bast_date_upload']; ?> </td>
        <td> <?php echo $row['account_manager'] ."-". $row['email'] ."-". $row['phone']; ?>  </td>
        <td> <?php echo $row['cid'] ."/". $row['sid']; ?> </td>
        
       
         
        </tr>
  		
  		<?php
        }    
        ?>
       

          
     </table>
</body>
</html>