<?php
/*%%SmartyHeaderCode:1253556e03a7dcbbca4_21736428%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cfdc17659bac1d0a5714d6d9085a522be6c7b569' => 
    array (
      0 => './templates/pdct_cust_name_add.tpl',
      1 => 1454717585,
      2 => 'file',
    ),
    '0d67b0acdab9c4ef7b7786428c9051d03ca0e70f' => 
    array (
      0 => './templates/header.tpl',
      1 => 1455203965,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1253556e03a7dcbbca4_21736428',
  'tpl_function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56e03a7ddda921_72111823',
  'cache_lifetime' => 0,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56e03a7ddda921_72111823')) {
function content_56e03a7ddda921_72111823 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
 

    <title>Program Aplikasi PDCT</title>
 
     <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/css_datepicker.css">
     <link rel="stylesheet" type="text/css" href="assets/dataTables.bootstrap.min.css">
      
     <script src="assets/jquery-1.10.2.js"> </script>
     <script src="bootstrap/dist/js/bootstrap.min.js"> </script>
     <script src="assets/jquery.dataTables.min.js"> </script>
     <script src="assets/dataTables.bootstrap.min.js"> </script>
     <script src="js/jQuery-Mask-Plugin_js_jquery.mask.min.js"> </script>
     <script src="js/bootstrap-datepicker.js"> </script>
     
  
 
  </head>

  <body role="document">

    <HTML>
<HEAD>
<TITLE>Program Aplikasi PDCT - <br />
<b>Notice</b>:  Undefined index: Name in <b>C:\xampp\htdocs\pdct\templates_c\0d67b0acdab9c4ef7b7786428c9051d03ca0e70f_0.file.header.tpl.cache.php</b> on line <b>36</b><br />
<br />
<b>Notice</b>:  Trying to get property of non-object in <b>C:\xampp\htdocs\pdct\templates_c\0d67b0acdab9c4ef7b7786428c9051d03ca0e70f_0.file.header.tpl.cache.php</b> on line <b>36</b><br />
</TITLE>
</HEAD>
<body>
 <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Program Aplikasi PDCT</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="master_pdct.php">Master PDCT</a></li>
            
           
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Project <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="new_project_list.php">New Project List</a></li>
                <li><a href="agging_project_status.php">Agging Project List</a></li>
                <li><a href="project_status_list.php">Project Status List</a></li>
                <li><a href="billing_list.php">Billing List</a></li>
                <li><a href="extention_project_list.php">Extention Project List</a></li>
              </ul>
            </li>

             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Report <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="proforma_invoice.php">Proforma Invoice </a></li>
                <li><a href="resume_proforma_invoice.php">Resume Proforma Invoice </a></li>
              </ul>
            </li>

             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Extra <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="m_user.php">Manajemen User</a></li>
               
              </ul>
            </li>

          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> okki   <span class="caret"></span></a>
              <ul class="dropdown-menu">
                 <li><a href="index.php?act=Logout">Keluar</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
</body>
</HTML>


    <div class="container theme-showcase" role="main">

    
    <div class="row">
    <div class="col-md-12">

     <div style="margin-top:70px;">
     </div>

     <form action="master_cust_name.php?act=ProAdd" method="POST" enctype="multipart/form-data" name="myForm">
     <div class="alert alert-info"> <h3 align="center">Tambah Data PDCT Customer </h3></div>
    
     <button onclick="history.go(-1);" class="btn btn-primary"> <i class="glyphicon glyphicon-arrow-left"> </i> Back </button>
     <br>
     <br>
    <div class="panel panel-primary">
    <div class="panel-heading">Master Customer Name </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-6 small">
       

            <div class="form-group">
              <label  class="col-sm-3"> Customer Name </label>

              <div class="col-sm-9">
                <input type="text" name="cust_name" class="form-control input-sm" required="required">
              </div>

             

            </div>

            <br>
            <br>

 
   
        </div><!--col-md-6-->
      
      </div><!--row--> 
     
    </div><!--panel-body--> 
  </div><!--panel panel-default--> 
  <!------------------------------------------------------------satu------------------------------------------------------------>
 
  
  
 <button type="submit" name="simpan" class="btn btn-primary btn-block"> <i class="glyphicon glyphicon-floppy-disk"> </i>  Simpan Data </button>

   </div>
   </div>
  

   

</form>
    <footer class="footer">
      <div class="container" style="text-align:center; margin-top:30px;">
        <p class="text-muted"> &copy; 2016 <a href='http://wavecomindo.co.id'>PT. Wavecomindo</a></p>
      </div>
    </footer>

    
     
  </body>
</html>















 <?php }
}
?>