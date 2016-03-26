<?php
/*%%SmartyHeaderCode:17975569d174fd3bd48_79998135%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '263a682356557c3a7b36d88417f8328ad7cf06cb' => 
    array (
      0 => './templates/404.tpl',
      1 => 1453135694,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17975569d174fd3bd48_79998135',
  'tpl_function' => 
  array (
  ),
  'version' => '3.1.24',
  'unifunc' => 'content_56a96ca98047b3_48528582',
  'has_nocache_code' => false,
  'cache_lifetime' => 0,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56a96ca98047b3_48528582')) {
function content_56a96ca98047b3_48528582 ($_smarty_tpl) {
?>

<html>
	<head>
    	<title>
        	Program Aplikasi PDCT
        </title>
       <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/css_datepicker.css">
     <link rel="stylesheet" type="text/css" href="assets/dataTables.bootstrap.min.css">
      
     <script src="assets/jquery-1.10.2.js"> </script>
     <script src="bootstrap/dist/js/bootstrap.min.js"> </script>
  
     <script src="assets/dataTables.bootstrap.min.js"> </script>
     
     
 <style type="text/css">
.error {
  margin: 0 auto;
  text-align: center;
}

.error-code {
  bottom: 60%;
  color: #2d353c;
  font-size: 96px;
  line-height: 100px;
}

.error-desc {
  font-size: 12px;
  color: #647788;
}

.m-b-10 {
  margin-bottom: 10px!important;
}

.m-b-20 {
  margin-bottom: 20px!important;
}

.m-t-20 {
  margin-top: 20px!important;
}

 </style>
    </head>
    
    <body>
    <div class="container">
    <div class="row">
    <div class="col-md-12">
    <div class="error">
        <div class="error-code m-b-10 m-t-20">404 BAD REQUEST <i class="fa fa-warning"></i></div>
        <h3 class="font-bold">Maaf Halaman Yang Anda Cari Tidak Ditemukan</h3>

       <div class="alert alert-danger">
           <b>Pastikan anda membuka halaman yang sah dan sesuai kebutuhan anda, sistem ini dilengkapi keamanan dari orang orang yang tidak bertanggung jawab ! </b>
            <div>
            <br>
               <button type="submit" class="btn btn-danger" onclick="history.go(-1);">  

               <i class="glyphicon glyphicon-circle-arrow-left"> </i> Kembali Ke Halaman Sebelumnya   </button>
                  
            </div>
        </div>
    </div>
   </div>
   </div>
   </div>
    </body>
    
</html><?php }
}
?>