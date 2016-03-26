<?php
 
 $title = "Program Aplikasi PDCT";
 $footer = "&copy; 2016 <a href='http://wavecomindo.co.id'>PT. Wavecomindo</a>";
 
 include('adodb/adodb.inc.php');
	 
	$dbhost = "localhost";
    $dbuser = "root";
    $dbpassword = "";
    $dbname = "wave";
	
	global $db;
	global $dbhost;
	global $dbuser;
	global $dbpassword;
	global $dbname;
	global $title;
	global $footer;
	
	$db = NewADOConnection("mysqli");
    //$db->debug = true;
    $connect_result = $db->Connect($dbhost,$dbuser,$dbpassword,$dbname);
    if(!$connect_result)
    {
        echo "koneksi gagal";
    	exit();
    }
	
?>					 					 