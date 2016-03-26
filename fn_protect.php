<?php
function protect($a){
	$a = trim($a);
	$a = stripcslashes($a);
	$a = htmlentities($a);
	$a = mysql_real_escape_string($a);
return $a;
}
?>