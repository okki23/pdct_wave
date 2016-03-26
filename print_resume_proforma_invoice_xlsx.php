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
		$id_contract_status = isset($_REQUEST['id_contract_status']) ? $_REQUEST['id_contract_status'] : '';
        $id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
        $bill_period = isset($_REQUEST['bill_period']) ? $_REQUEST['bill_period'] : '';

/*
echo "<br> $id_customer_name";
echo "<br> $cc_name";
echo "<br> $account_manager";
echo "<br> $project_no";
echo "<br> $periode_until";
*/
?>
<h1 align="center"> Resume Proforma Invoice </h1>
  <table align="center" border="1" cellpadding="3" cellspacing="0">
       <?php
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
       ?>
       <tr>  
          <td> <b>Customer Name </b> </td>
          <td> : </td>
          <td> <?php echo $namacustomer; ?>  </td>
       </tr>
       <tr>  
          <td> <b>Contract Status </b> </td>
          <td> : </td>
          <td> <?php echo $contractstatus; ?>  </td>
       </tr>
       <tr>  
          <td> <b>Bill  Periode  </b> </td>
          <td> : </td>
          <td> <?php echo $bill_period; ?></td>
       </tr>

</table>
    <br>
    
    <table align="center" border="1" cellpadding="3" cellspacing="0">
        <tr>
        <td> <b>Contract Number </b> </td>
        <td> <b>Username </b>  </td>
        <td> <b>Site </b> </td>
        <td> <b>Account  </b>  </td>
        <td> <b>Total Balance </b>  </td>
        </tr>
        <?php
            $sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
                    b.site_code,b.contract_number_file,b.nama_pekerjaan,b.account_no,b.contract_status_opt,
                    c.charges,c.bill_periode,c.bill_amount,d.customer_name,sum(c.bill_amount) as totalku 
                    from pdct_customer a
                    inner join pdct_contract b on b.id_customer = a.id 
                    inner join pdct_billing c on c.id_contract = b.id
                    inner join pdct_customer_name d on d.id = a.id_customer_name
                    where a.id_customer_name = '$id_customer_name'
                    and b.contract_status_opt = '$id_contract_status' and c.bill_periode = '$bill_period'
                    GROUP BY a.id"; 

            $exsql = $db->Execute($sql);
            $sumtotal = 0;
            while ($row = $exsql->FetchRow()) {
             
        ?>
       
        <tr>
        <td> <?php echo $row['contract_number_file']; ?>  </td>
        <td> <?php echo $row['cc_name']; ?>  </td>
        <td> <?php echo $row['site_name']; ?> </td>
        <td> <?php echo $row['account_no']; ?> </td>
        <td> IDR . <?php echo number_format($row['totalku'],0,".","."); ?> </td>
        </tr>
        <?php
        $sumtotal += $row['totalku'];
        }
        ?>
         

         

         <tr>
          <td colspan="4"> <b>TOTAL</b> </td>
          <td> <b>IDR. <?php echo number_format($sumtotal,0,".","."); ?>  </b></td>
        </tr>
     </table>

</body>
</html>