<?php

 header("Content-Type: application/force-download");
 header("Cache-Control: no-cache, must-revalidate");
 header("Expires: Sat, 26 Jul 2010 05:00:00 GMT"); 
 header("content-disposition: attachment;filename=laporan_proforma_invoice".date('d-m-Y').".xls");
 
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
			$cc_name = isset($_REQUEST['cc_name']) ? $_REQUEST['cc_name'] : '';
			$account_manager = isset($_REQUEST['account_manager']) ? $_REQUEST['account_manager'] : '';
			$project_no = isset($_REQUEST['project_no']) ? $_REQUEST['project_no'] : '';
			$periode_until = isset($_REQUEST['periode_until']) ? $_REQUEST['periode_until'] : '';

/*
echo "<br> $id_customer_name";
echo "<br> $cc_name";
echo "<br> $account_manager";
echo "<br> $project_no";
echo "<br> $periode_until";
*/
?>
<h1 align="center"> Proforma Invoice </h1>
  <table align="center" border="1" cellpadding="3" cellspacing="0">
        <tr>  
            <td colspan="6"> <b> TO </b> </td>
        </tr>
        <tr>  

        	<?php
        				//get data customer
						$sqlcust = "select * from pdct_customer_name where id = '$id_customer_name'";
	 					$exsqlcust =$db->Execute($sqlcust);
			 			$getcust = $exsqlcust->FetchRow();
			 			$namacustomer = $getcust['customer_name'];

					 	//get phonemail
					 	$sqlpm = "select a.* ,b.site_code,b.account_manager,b.email,
					 			b.phone from pdct_customer a
								inner join pdct_contract b on b.id_customer = a.id
								where a.id_customer_name = '$id_customer_name'
								group by b.id_customer ";
					 	$exsqlpm = $db->Execute($sqlpm);
					 	$getpm = $exsqlpm->FetchRow();
					 	$phonemail = $getpm['phone'] ." / ". $getpm['email'];
        	?>
            <td> <b> Customer Name </b> </td>
            <td> : </td>
            <td> <?php echo $namacustomer; ?></td>
            <td> <b> CC Name </b> </td>
            <td> : </td>
            <td>  <?php echo $cc_name;?></td>
        </tr>

        <tr>  
            <td> <b> Account Manager </b> </td>
            <td> : </td>
            <td> <?php echo $account_manager; ?> </td>
            <td> <b> Project No </b> </td>
            <td> : </td>
            <td> <?php echo $project_no; ?> </td>
        </tr>
        
        <tr>  
            <td> <b> Phone / Email </b> </td>
            <td> : </td>
            <td> <?php echo $phonemail; ?> </td>
            <td> <b> Periode Until </b> </td>
            <td> : </td>
            <td> <?php echo $periode_until; ?> </td>
        </tr>

    </table>
    <br>
     <table align="center" class="table table-stripped table-hover" border="1" cellpadding="3" cellspacing="0" >
        <tr>
        <td> <b>Contract Number</b> </td>
        <td> <b>Site Name</b>  </td>
        <td> <b>Account No</b>  </td>
        <td> <b>Periode</b>  </td>
        <td> <b>Bill Amount</b>  </td>
        <td> <b>Charges Amount</b>  </td>
        </tr>
        
        <?php
        //get list billing
        $sql = "select a.id,d.customer_name,a.cc_name,a.project_no,a.site_name,
					b.site_code,b.email,b.account_no,b.account_manager,b.contract_number_file,
					c.bill_periode,c.bill_amount,e.charges from pdct_customer a
					inner join pdct_contract b on b.id_customer = a.id
					inner join pdct_billing c on c.id_contract = b.id
					inner join pdct_customer_name d on d.id = a.id_customer_name
					inner join pdct_charges e on e.id = c.charges
					where a.id_customer_name = '$id_customer_name' and
					b.account_manager = '$account_manager' and
					a.cc_name = '$cc_name' and
					a.project_no = '$project_no' and
					c.bill_periode <= '$periode_until'
					GROUP BY c.bill_periode";

		$exsql = $db->Execute($sql);
		$sumtotal = 0;
		while($row = $exsql->FetchRow()){
			
        ?>
       
        <tr>
        <td> <?php echo $row['contract_number_file']; ?>  </td>
        <td> <?php echo $row['site_name']; ?> </td>
        <td> <?php echo $row['account_no']; ?> </td>
        <td> <?php echo $row['bill_periode']; ?> </td>
        <td> IDR <?php echo number_format($row['bill_amount'],0,".","."); ?>  </td>
        <td> <?php echo $row['charges']; ?> </td>
        </tr>
  		
  		<?php
  		$sumtotal += $row['bill_amount'];
		}	
  		?>
       

         <tr>
          <td colspan="4"> <b>TOTAL IDR </b> </td>
          <td colspan="2"> <b>IDR . <?php echo number_format($sumtotal,0,".","."); ?> </b></td>
        </tr>
     </table>
</body>
</html>