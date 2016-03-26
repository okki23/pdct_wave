<?php
 
$koneksi = mysql_connect("localhost","root","");
mysql_select_db("wave",$koneksi);
if(!$koneksi){
	echo "database kaga ada";
	}
 
	$id = $_POST["id"];
 
	
	$result = mysql_query("select * from pdct_contract where account_manager='$id'");
	$emparray = array();
    while($row =mysql_fetch_assoc($result))
    {
        $contract[] = $row;
    }
    echo json_encode($contract);
?>