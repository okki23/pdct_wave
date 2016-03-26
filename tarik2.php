<?php
   require ('config.php');
   $sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name, b.id as idcont,
   		   b.site_code, b.contract_number_file, b.nama_pekerjaan,b.contract_status_opt,
		   b.contract_date, c.paid_csc,c.bill_amount from pdct_customer a 
		   left join pdct_contract b on b.id_customer = a.id 
		   left join pdct_billing c on c.id_contract = b.id  
		   where a.id_customer_name = '12'and b.contract_date BETWEEN '2016-01-01' and '2016-12-01' order by idcont ASC ";
$exsql = $db->Execute($sql);
while($row = $exsql->FetchRow()){
	echo $row['id'].' '. $row['idcont'].' '.$row['project_no'].' '.$row['contract_number_file'].
	' '.$row['site_code'].' '.$row['paid_csc']."<br>"; 

		$sqls = "select *,sum(csc) as totalcsc from pdct_billing where id_contract = '$row[idcont]' and paid_csc = '$row[paid_csc]'";
		$exsqls = $db->Execute($sqls);
		while ($rows = $exsqls->FetchRow()) {
			echo $rows['totalcsc']."<br>";
		}
}
?>