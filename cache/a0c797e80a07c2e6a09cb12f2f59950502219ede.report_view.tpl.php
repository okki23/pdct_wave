<?php
/*%%SmartyHeaderCode:512556a9b6418f53f4_07875557%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0c797e80a07c2e6a09cb12f2f59950502219ede' => 
    array (
      0 => './templates/report_view.tpl',
      1 => 1453792216,
      2 => 'file',
    ),
    '0d67b0acdab9c4ef7b7786428c9051d03ca0e70f' => 
    array (
      0 => './templates/header.tpl',
      1 => 1453780146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '512556a9b6418f53f4_07875557',
  'tpl_function' => 
  array (
  ),
  'version' => '3.1.24',
  'unifunc' => 'content_56a9bbc7ac7161_00253338',
  'has_nocache_code' => false,
  'cache_lifetime' => 0,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56a9bbc7ac7161_00253338')) {
function content_56a9bbc7ac7161_00253338 ($_smarty_tpl) {
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
     <script type="text/javascript">
      $(document).ready(function() {
          $('#example').DataTable();
      } );
 
    </script>

    <script>
  if (top.location != location) {
    top.location.href = document.location.href ;
  }
    $(function(){
      window.prettyPrint && prettyPrint();
      $('#dp1').datepicker({
         
        format: 'dd-mm-yyyy'
      });

       $('#dp2').datepicker({
        
        format: 'dd-mm-yyyy'
      });
       
    
    });
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

    <div class="container">
    <div class="row">
    <div class="col-md-12">
    <div style="margin-top:50px;">
    </div>
       
        <div class="jumbotron">
        <div align="right">
        <img src="images/logo.gif">
        <h2>Cetak Report PDCT</h2>
        </div>

        </div>
        <br>
          <div class="panel panel-primary">

             <div class="panel-heading">
             Filter Data Laporan By :
             </div> <!--panel heading-->

             <div class="panel-body"> 
             <div class="col-md-12">
        <div class="col-md-6">
        <fieldset>
        <legend>Tanggal Kontrak</legend>
        <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Starting </label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="starting" id="dp1">
              </div>
        </div>
        <br>
        <br>

        <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Ending </label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="ending" id="dp2">
              </div>
        </div>
        </div>

        </fieldset>
       

       <div class="col-md-6">
        <fieldset>
        <legend>Paid Status</legend>
        <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Paid </label>

              <div class="col-sm-4">
                <input type="radio" class="form-control input-sm"  name="statuspaid">
              </div>
        </div>
        <br>
        <br>

        <div class="form-group">
              <label  class="col-sm-3 form-control-static"> No Paid </label>

              <div class="col-sm-4">
                <input type="radio" class="form-control input-sm" name="statuspaid">
              </div>
        </div>
        </div>
        &nbsp;
        <br>
        <br>
        <button class="btn btn-primary btn-block"> Cetak</button>
        </fieldset>

      
             </div> <!--panel body-->

          </div> <!--panel panel-primary-->
       
       <!--
        &nbsp;
           <table id="example" class="table table-striped table-bordered table-hover" style="width:100%;">
              <thead style="background-color:#FFF;">
                <tr>
                  
                  <th style="width:10%;" align="center">No Project</th>
                  <th style="width:10%;" align="center">Nama Project</th>
                  <th style="width:10%;" align="center">CC Name</th>
                  <th style="width:5%;" align="center">Site Name </th>
                  <th style="width:5%;" align="center">Nama Pekerjaan</th>
                  <th style="width:5%;" align="center">Status</th>
                  <th style="width:8%;" align="center">Opsi</th>
                  
     
                </tr>
                </thead>
                
                <tbody>
                <br />
<b>Notice</b>:  Undefined index: list in <b>C:\xampp\htdocs\pdct\templates_c\a0c797e80a07c2e6a09cb12f2f59950502219ede_0.file.report_view.tpl.cache.php</b> on line <b>213</b><br />
<br />
<b>Notice</b>:  Trying to get property of non-object in <b>C:\xampp\htdocs\pdct\templates_c\a0c797e80a07c2e6a09cb12f2f59950502219ede_0.file.report_view.tpl.cache.php</b> on line <b>213</b><br />
                </tbody>
                
                
              
              </table>
              -->
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