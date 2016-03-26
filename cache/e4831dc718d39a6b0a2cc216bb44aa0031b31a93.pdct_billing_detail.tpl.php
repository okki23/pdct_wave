<?php
/*%%SmartyHeaderCode:2109956c56d97a49295_05178314%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e4831dc718d39a6b0a2cc216bb44aa0031b31a93' => 
    array (
      0 => './templates/pdct_billing_detail.tpl',
      1 => 1455070113,
      2 => 'file',
    ),
    '0d67b0acdab9c4ef7b7786428c9051d03ca0e70f' => 
    array (
      0 => './templates/header.tpl',
      1 => 1458151396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2109956c56d97a49295_05178314',
  'tpl_function' => 
  array (
  ),
  'version' => '3.1.24',
  'unifunc' => 'content_56f0e347f17136_37470685',
  'has_nocache_code' => false,
  'cache_lifetime' => 0,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56f0e347f17136_37470685')) {
function content_56f0e347f17136_37470685 ($_smarty_tpl) {
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
            <li><a href="index.php">  Home</a></li>
           
            
           
           

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

          <div class="container">
    <div class="row">
    <div class="col-md-12">
    <div style="margin-top:70px;">
    </div>
         <button onclick="history.go(-1);" class="btn btn-primary"> <i class="glyphicon glyphicon-arrow-left"> </i> Back </button>
         <br>
         <br>
       <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Data Detail PDCT Billing</h3>
            </div>
            <div class="panel-body">
            
            <br>
            <br>
             <table class="table table-striped table-hover">
             	<tr> 
                	<td> End User </td>
                    <td> : </td>
                    <td> Periode 1 </td>
                </tr>
                  <tr> 
                  <td> Bill Periode </td>
                    <td> : </td>
                    <td> 2016 </td>
                </tr>
                <tr> 
                	<td> FP No </td>
                    <td> : </td>
                   

                                          <td> <a href="doc_uploads/fp_no/fp14.pdf" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; ">fp14.pdf </a> </td>
                                    </tr>
                 <tr> 
                  <td> Bill Amount   </td>
                    <td> : </td>
                    <td> Rp.1.000.000 </td>
                </tr>
                 <tr> 
                  <td> Charges  </td>
                    <td> : </td>
                    <td> Monthly </td>
                </tr>
                <tr> 
                  <td> Paid Amount </td>
                    <td> : </td>
                    <td> Rp.1.000.000 </td>
                </tr>
                <tr>
                <tr> 
                  <td> Paid Status </td>
                    <td> : </td>
                    <td> 
                                          Yes / Sudah Dibayar
                                        
                    </td>
                </tr>
                <tr> 
                <td> CSC </td>
                    <td> : </td>
                    <td> Rp.100.000 </td>
                </tr>
                 
                <tr> 
                <td> Paid CSC </td>
                    <td> : </td>
                    <td>                         Yes / Sudah Dibayar
                                         </td>
                </tr>
                
                
             </table>
            </div>
          </div>
   </div>
   </div>
   </div>


    </div> <!-- /container -->

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