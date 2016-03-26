<?php
/*%%SmartyHeaderCode:2912956a96d060f7c27_87158138%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0093d550658f427002da443b64fb2d305127bb81' => 
    array (
      0 => './templates/dashboard.tpl',
      1 => 1453944067,
      2 => 'file',
    ),
    '6216f7fad91baf0175c25de47934f52f0d1f2a6e' => 
    array (
      0 => './templates/header.tpl',
      1 => 1453780146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2912956a96d060f7c27_87158138',
  'tpl_function' => 
  array (
  ),
  'version' => '3.1.24',
  'unifunc' => 'content_56a9959cf15479_88079961',
  'has_nocache_code' => false,
  'cache_lifetime' => 0,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56a9959cf15479_88079961')) {
function content_56a9959cf15479_88079961 ($_smarty_tpl) {
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
     <link rel="stylesheet" type="text/css" href="assets/dataTables.bootstrap.min.css">
     <script src="assets/jquery-1.10.2.js"> </script>
     <script src="bootstrap/dist/js/bootstrap.min.js"> </script>
     <script src="assets/jquery.dataTables.min.js"> </script>
     <script src="assets/dataTables.bootstrap.min.js"> </script>
     <script type="text/javascript">
      $(document).ready(function() {
          $('#example').DataTable();
      } );
 
    </script>

     
 <style>
  .glyphicon {
    font-size: 100px;
    }
  </style>

  </head>

  <body role="document">
   <HTML>
<HEAD>
<TITLE>Program Aplikasi PDCT - <br />
<b>Notice</b>:  Undefined index: Name in <b>C:\xampp\htdocs\nendi\templates_c\6216f7fad91baf0175c25de47934f52f0d1f2a6e_0.file.header.tpl.cache.php</b> on line <b>36</b><br />
<br />
<b>Notice</b>:  Trying to get property of non-object in <b>C:\xampp\htdocs\nendi\templates_c\6216f7fad91baf0175c25de47934f52f0d1f2a6e_0.file.header.tpl.cache.php</b> on line <b>36</b><br />
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
          <a class="navbar-brand" href="#">Program Aplikasi PDCT</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="master_pdct.php">Master PDCT</a></li>
            
           
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Invoice <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="404.php">Proforma Invoice 1</a></li>
                <li><a href="404.php">Proforma Invoice 2</a></li>
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
   
      <div style="margin-top:50px;">
      </div>
     
       
        <div class="col-lg-12">
        

        <div class="jumbotron">
        <h2>Selamat Datang Okki Setyawan S.Kom !  <br>Kamu Berada Pada Level : Administrator !</h2>
        <p class="lead">Silahkan gunakan menu sesuai kebutuhan anda </p>
 
         </div>

      
          <div class="row placeholders">
            <h2> Master </h2>
            <hr>
            <div class="col-xs-6 col-sm-3" align="center">
              
             
            <a href="master_pdct.php"> <i class="glyphicon glyphicon-hdd"> </i>  </a>
 
              <h4>Master PDCT</h4>
              <span class="text-muted">Manage data PDCT</span>
            </div>
             
                        <div class="col-xs-6 col-sm-3" align="center">
       
            <a href="customer.php"> <i class="glyphicon glyphicon-hdd"> </i>  </a>
 
              <h4>Customer</h4>
              <span class="text-muted">Manage data Customer</span>
            </div>
                       
          </div>


           <div class="row placeholders">
            <h2> Invoice </h2>
            <hr>
            <div class="col-xs-6 col-sm-3" align="center">
              
             
             
            <a href="invoice.php"> <i class="glyphicon glyphicon-file"> </i>  </a>
 
              <h4>Proforma Invoice</h4>
              <span class="text-muted">Manage data Invoice</span>
            </div>
           
          </div>


           <div class="row placeholders">
            <h2> Report </h2>
            <hr>
            <div class="col-xs-6 col-sm-3" align="center">
              
             
            <a href="report.php"> <i class="glyphicon glyphicon-list-alt"> </i>  </a>
 
              <h4>Report PDCT</h4>
              <span class="text-muted">Laporan Periodik PDCT</span>
            </div>
             
           
           
          </div>
                       <div class="row placeholders">
            <h2> Extra </h2>
            <hr>
            
            <div class="col-xs-6 col-sm-3" align="center">
       
            <a href="m_user.php" style="text-align:center;"> <i class="  glyphicon glyphicon-user"> </i>  </a>
 
              <h4>Manajemen User</h4>
              <span class="text-muted">Manage data user beserta hak akses</span>
            </div>
          </div>
                   
       
   </div>
   </div>
   </div>


    </div> <!-- /container -->

    <footer class="footer">
      <div class="container" style="text-align:center; margin-top:30px;">
        <p class="text-muted"> &copy; 2016 <a href='http://wavecomindo.co.id'>PT.Wavecomindo</a></p>
      </div>
    </footer>

    
     
  </body>
</html>






<?php }
}
?>