<?php
 
 header("Content-Type: application/force-download");
 header("Cache-Control: no-cache, must-revalidate");
 header("Expires: Sat, 26 Jul 2010 05:00:00 GMT"); 
 header("content-disposition: attachment;filename=agging_project_status".date('d-m-Y').".xls");
 
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include "config.php";
	$id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
 	$id_contract_status = isset($_REQUEST['id_contract_status']) ? $_REQUEST['id_contract_status'] : '';
	$tahun = isset($_REQUEST['tahun']) ? $_REQUEST['tahun'] : '';
 
  //x00
  if(!empty($id_contract_status) && empty($id_customer_name) && empty($tahun)){
    //get data customer
        
            $namacustomer = '';
    
    //get data contract status
            $sqlcont = "select * from pdct_contract_status where id = '$id_contract_status'";
            $exsqlcont =$db->Execute($sqlcont);
            $getcont = $exsqlcont->FetchRow();
            $contractstatus = $getcont['contract_status']; 
    //tahun
            $tahun = '';

            $sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
            b.site_code,b.contract_number_file,b.nama_pekerjaan,b.contract_status_opt,c.charges,
            c.bill_periode,c.bill_amount,d.customer_name,sum(c.bill_amount) as totalku 
            from pdct_customer a
            left join pdct_contract b on b.id_customer = a.id 
            left join pdct_billing c on c.id_contract = b.id
            left join pdct_customer_name d on d.id = a.id_customer_name 
            where b.contract_status_opt = '$id_contract_status' GROUP BY a.id";

  //xx0    
  }elseif (!empty($id_contract_status) && !empty($id_customer_name) && empty($tahun)) {
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
  //tahun 
            $tahun = '';

            $sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,
            a.site_name, b.site_code,b.contract_number_file,b.nama_pekerjaan,b.contract_status_opt,
            c.charges, c.bill_periode,c.bill_amount,d.customer_name,
            sum(c.bill_amount) as totalku from pdct_customer a
            left join pdct_contract b on b.id_customer = a.id 
            left join pdct_billing c on c.id_contract = b.id
            left join pdct_customer_name d on d.id = a.id_customer_name 
            where a.id_customer_name = '$id_customer_name'
            and b.contract_status_opt = '$id_contract_status' GROUP BY a.id";

  //xxx
  }elseif (!empty($id_contract_status) && !empty($id_customer_name) && !empty($tahun)) {
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
  //tahun
            $tahun = $tahun;

            $sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,
            a.site_name, b.site_code,b.contract_number_file,b.nama_pekerjaan,b.contract_status_opt,
            c.charges, c.bill_periode,c.bill_amount,d.customer_name,
            sum(c.bill_amount) as totalku from pdct_customer a
            left join pdct_contract b on b.id_customer = a.id 
            left join pdct_billing c on c.id_contract = b.id
            left join pdct_customer_name d on d.id = a.id_customer_name 
            where a.id_customer_name = '$id_customer_name'
            and b.contract_status_opt = '$id_contract_status' 
            and c.bill_periode 
            LIKE '%$tahun%' GROUP BY a.id";


  //0x0
  }elseif (empty($id_contract_status) && !empty($id_customer_name) && empty($tahun)) {
  //get data customer
            $sqlcust = "select * from pdct_customer_name where id = '$id_customer_name'";
            $exsqlcust =$db->Execute($sqlcust);
            $getcust = $exsqlcust->FetchRow();
            $namacustomer = $getcust['customer_name'];

  //get data contract status
           
            $contractstatus = '';
  //tahun
            $tahun = '';
  
  //get list data
            $sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
            b.site_code,b.contract_number_file,b.nama_pekerjaan,b.contract_status_opt,c.charges,
            c.bill_periode,c.bill_amount,d.customer_name,sum(c.bill_amount) as totalku 
            from pdct_customer a
            left join pdct_contract b on b.id_customer = a.id 
            left join pdct_billing c on c.id_contract = b.id
            left join pdct_customer_name d on d.id = a.id_customer_name 
            where a.id_customer_name = '$id_customer_name' GROUP BY a.id";

  //00x          
  }elseif (empty($id_contract_status) && empty($id_customer_name) && !empty($tahun)) {
  //get data customer
            $namacustomer = '';

  //get data contract status
            $contractstatus = '';

  //tahun
            $tahun = $tahun;

  //get list data
            $sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
            b.site_code,b.contract_number_file,b.nama_pekerjaan,b.contract_status_opt,c.charges,
            c.bill_periode,c.bill_amount,d.customer_name,sum(c.bill_amount) as totalku 
            from pdct_customer a
            left join pdct_contract b on b.id_customer = a.id 
            left join pdct_billing c on c.id_contract = b.id
            left join pdct_customer_name d on d.id = a.id_customer_name 
            where c.bill_periode LIKE '%$tahun%' GROUP BY a.id";

  //x0x
  }elseif (!empty($id_contract_status) && empty($id_customer_name) && !empty($tahun)) {
   //get data customer 
            
            $namacustomer = '';

  //get data contract status
            $sqlcont = "select * from pdct_contract_status where id = '$id_contract_status'";
            $exsqlcont =$db->Execute($sqlcont);
            $getcont = $exsqlcont->FetchRow();
            $contractstatus = $getcont['contract_status'];  
  //tahun
            $tahun = $tahun;

            $sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,
            a.site_name, b.site_code,b.contract_number_file,b.nama_pekerjaan,b.contract_status_opt,
            c.charges, c.bill_periode,c.bill_amount,d.customer_name,
            sum(c.bill_amount) as totalku from pdct_customer a
            left join pdct_contract b on b.id_customer = a.id 
            left join pdct_billing c on c.id_contract = b.id
            left join pdct_customer_name d on d.id = a.id_customer_name 
            where  b.contract_status_opt = '$id_contract_status' 
            and c.bill_periode 
            LIKE '%$tahun%' GROUP BY a.id";

  //0xx
  }elseif (empty($id_contract_status) && !empty($id_customer_name) && !empty($tahun)) {
   //get data customer 
            $sqlcust = "select * from pdct_customer_name where id = '$id_customer_name'";
            $exsqlcust =$db->Execute($sqlcust);
            $getcust = $exsqlcust->FetchRow();
            $namacustomer = $getcust['customer_name'];

  //get data contract status
           
            $contractstatus = ''; 
  //tahun
            $tahun = $tahun;

            $sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,
            a.site_name, b.site_code,b.contract_number_file,b.nama_pekerjaan,b.contract_status_opt,
            c.charges, c.bill_periode,c.bill_amount,d.customer_name,
            sum(c.bill_amount) as totalku from pdct_customer a
            left join pdct_contract b on b.id_customer = a.id 
            left join pdct_billing c on c.id_contract = b.id
            left join pdct_customer_name d on d.id = a.id_customer_name 
            where a.id_customer_name = '$id_customer_name' and c.bill_periode 
            LIKE '%$tahun%' GROUP BY a.id";

  }
 
?>

<h1 align="center"> Agging Project Status </h1>
  <table align="center" border="0" cellpadding="3" cellspacing="0" width="100%;">
        
        <tr>  

        	<?php
        		

					  
        	?>
            <td> <b> Contract Status </b> </td>
            
            <td> :
            <?php 
            if($contractstatus == ''){
              echo '-';
              }else{
              echo $contractstatus;
              }
            ?></td>
          

        </tr>
        <tr>
         <td> <b> Customer Name </b> </td>
         <td> : 
         <?php 
         if($namacustomer == ''){
         echo '-';
         }else{
         echo $namacustomer;
         } 
         ?></td>
        </tr>
        <tr>
         <td> <b> Year Periode </b> </td>
         <td> : 
         <?php
         if($tahun == ''){
         echo '-';
         }else{
         echo $tahun; 
         } 
         ?></td>
        <tr>

       

    </table>
    <br>
     <table align="center" class="table table-stripped table-hover" border="1" cellpadding="3" cellspacing="0" width="100%;" >
        <tr>
        <td> <b>Bill Period  </b>  </td>
        <td> <b>Total Bill Amount </b> </td>
        </tr>
        
        <?php
       
		$exsql = $db->Execute($sql);
		$sumtotal = 0;
		while($row = $exsql->FetchRow()){
			
        ?>

        
       
        <tr align="center">
        <td> <?php echo $row['bill_periode']; ?>  </td>
        <td> IDR <?php echo number_format($row['totalku'],0,".","."); ?>  </td>
         
        </tr>
  		
  		<?php
  		$sumtotal += $row['totalku'];
		}	
  		?>
       

         <tr align="center">
          <td> <b>TOTAL IDR </b> </td>
          <td> <b>IDR . <?php echo number_format($sumtotal,0,".","."); ?> </b></td>
        </tr>
     </table>
</body>
</html>