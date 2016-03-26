<?php
 
require ('config.php');
  $sql = "select a.id,a.project_no,b.customer_name,a.cc_name,c.nama_pekerjaan,c.contract_number_file,
  c.id as idcont,d.paid_csc from pdct_customer a
LEFT JOIN pdct_customer_name b on b.id = a.id_customer_name
LEFT JOIN pdct_contract c on c.id_customer = a.id
LEFT JOIN pdct_billing d on d.id_contract = c.id
where a.id_customer_name = 12 and c.contract_date BETWEEN '2016-01-01' and '2016-12-01' GROUP BY c.contract_number_file,d.paid_csc";
	 
	echo "<br>";
$exsql = $db->Execute($sql);
while($row = $exsql->FetchRow()){
	
	 $sqls = "select *,sum(csc) as totalcsc from pdct_billing where id_contract = '$row[idcont]' and id_customer = '$row[id]'";
	 $exsqls = $db->Execute($sqls);

	 while ($rows = $exsqls->FetchRow()) {
	 	echo $row['customer_name'] .' | '. $row['project_no'] .' | '. $row['cc_name'] .' | '. $row['nama_pekerjaan']  .' | '.  $row['paid_csc']  .' | '.  $rows['totalcsc']  .' | '.  "<br>";
	 }
 
 	

  
	
}

?>