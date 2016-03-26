<form name="cari" method="POST" enctype="multipart/form-data">
	<select name="direktori">
		<option value="" selected="selected">--Pilih--</option>
		<option value="spk"> SPK-P8</option>
		<option value="sk"> Surat Kesanggupan</option>
		<option value="cn"> Contract Number</option>
		<option value="bast"> BAST</option>
		<option value="baso"> BASO</option>
	</select>
	<button type="submit" name="ganti"> Ganti Direktori </button>
</form>
<?php

$direktori = isset($_POST['direktori']) ? $_REQUEST['direktori'] : '';
$path = 'doc_uploads/'.$direktori;

if(empty($direktori)){
	echo '';
	echo 'doc_uploads/'.$direktori;
	echo "<br>";
}else{
	echo 'doc_uploads/'.$direktori;
	echo "<br>";
if(is_dir($path)){
if($dh = opendir($path)){
while($file = readdir($dh)){
if($file != "." && $file !=".."){
echo "<a href='$path/$file' target='_blank'> $file </a> &nbsp; 
<a href = 'browse.php?del=$file'>delete </a> <br>";
}
}
closedir($dh);
}
}
}
echo "<br>";


$del = isset($_GET['del']) ? $_REQUEST['del'] : '';
//echo $filedel = $path.$del;
?>