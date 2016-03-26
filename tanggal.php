<?php
$start = '11-07-2014';
$end = '10-07-2017';
$starting = date('Y-m-d',strtotime($start));
$ending = date('Y-m-d',strtotime($end));

echo $starting;
echo "<br>";
echo $ending;

if($ending <= $starting){
	echo "akhir ga boleh kurang atau sama dari start";
}else{
	echo "selamat";
}
?>