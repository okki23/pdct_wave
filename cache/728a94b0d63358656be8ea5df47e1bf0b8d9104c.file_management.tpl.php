<?php
/*%%SmartyHeaderCode:265856e999f1d23489_71437616%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '728a94b0d63358656be8ea5df47e1bf0b8d9104c' => 
    array (
      0 => './templates/file_management.tpl',
      1 => 1458149871,
      2 => 'file',
    ),
    '0d67b0acdab9c4ef7b7786428c9051d03ca0e70f' => 
    array (
      0 => './templates/header.tpl',
      1 => 1458151396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '265856e999f1d23489_71437616',
  'tpl_function' => 
  array (
  ),
  'version' => '3.1.24',
  'unifunc' => 'content_56ea634bc2d092_75229604',
  'has_nocache_code' => false,
  'cache_lifetime' => 0,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56ea634bc2d092_75229604')) {
function content_56ea634bc2d092_75229604 ($_smarty_tpl) {
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
    <div style="margin-top:50px;">
    </div>
       
        <div class="jumbotron">
        <div align="right">
        <img src="images/logo.gif">
        <h2>File Management</h2>
        </div>

        </div>
        
        <br>
        &nbsp;
       <form name="cari" method="POST" enctype="multipart/form-data">
          <select name="direktori" class="form-control">
            <option value="" selected="selected">--Pilih--</option>
            <option value="spk"> SPK-P8</option>
            <option value="sk"> Surat Kesanggupan</option>
            <option value="cn"> Contract Number</option>
            <option value="bast"> BAST</option>
            <option value="baso"> BASO</option>
            <option value="proforma"> Proforma Invoice</option>
            <option value="resume"> Resume Proforma Invoice</option>
          </select>
           <br>
          <button type="submit" name="changedir" class="btn btn-block btn-primary"> <i class="  glyphicon glyphicon-folder-open" > </i> Ganti Direktori </button>
          <br>
        </form>
        <br>
           <table id="example" class="table table-striped table-bordered table-hover" style="width:100%;">
              <thead style="background-color:#FFF;">
                <tr align="center">
                  
                  <th style="width:1%; font-size: 12px;" align="center">No</th>
                  <th style="width:10%; font-size: 12px;" align="center">Nama File</th>
                  <th style="width:4%; font-size: 12px;" align="center">Opsi</th>
                  
     
                </tr>
                </thead>
                
                <tbody>
                                <tr style="font-size: 12px;">
        
                <td style="width:1%;"  align="center">1  </td>
                <td style="width:40%;"> 
                                 <a href="proforma_invoice/proforma_invoice_48433.pdf" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; ">proforma_invoice_48433.pdf </a>
                
                                

               </td>
                <td style="width:5%;" align="center"> <a href="file_management.php?act=Del&path=proforma_invoice/proforma_invoice_48433.pdf" title="Delete File" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-xs btn-danger"> <i class="glyphicon glyphicon-trash">  </td>
                       
                </tr>
                
               
                                <tr style="font-size: 12px;">
        
                <td style="width:1%;"  align="center">2  </td>
                <td style="width:40%;"> 
                                 <a href="proforma_invoice/proforma_invoice_89472.pdf" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; ">proforma_invoice_89472.pdf </a>
                
                                

               </td>
                <td style="width:5%;" align="center"> <a href="file_management.php?act=Del&path=proforma_invoice/proforma_invoice_89472.pdf" title="Delete File" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-xs btn-danger"> <i class="glyphicon glyphicon-trash">  </td>
                       
                </tr>
                
               
                                <tr style="font-size: 12px;">
        
                <td style="width:1%;"  align="center">3  </td>
                <td style="width:40%;"> 
                                 <a href="proforma_invoice/proforma_invoice_94171.pdf" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; ">proforma_invoice_94171.pdf </a>
                
                                

               </td>
                <td style="width:5%;" align="center"> <a href="file_management.php?act=Del&path=proforma_invoice/proforma_invoice_94171.pdf" title="Delete File" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-xs btn-danger"> <i class="glyphicon glyphicon-trash">  </td>
                       
                </tr>
                
               
                                </tbody>
                

              
              </table>

                
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