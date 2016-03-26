<?php
/*%%SmartyHeaderCode:2457256e993cbab42c2_44867889%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e069e9d79a5bee025cfbaaefab5f2fe6d8ae0414' => 
    array (
      0 => './templates/file_contract.tpl',
      1 => 1458148298,
      2 => 'file',
    ),
    '0d67b0acdab9c4ef7b7786428c9051d03ca0e70f' => 
    array (
      0 => './templates/header.tpl',
      1 => 1455203965,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2457256e993cbab42c2_44867889',
  'tpl_function' => 
  array (
  ),
  'version' => '3.1.24',
  'unifunc' => 'content_56e9949d775008_04336129',
  'has_nocache_code' => false,
  'cache_lifetime' => 0,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56e9949d775008_04336129')) {
function content_56e9949d775008_04336129 ($_smarty_tpl) {
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
                <td style="width:50%;">  <a href="resume_invoice/resume_proforma_invoice_03420.pdf" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; ">resume_proforma_invoice_03420.pdf </a>

               </td>
                <td style="width:5%;"> <a href="file_contract.php?act=Del" title="Delete File" class="btn btn-xs btn-danger"> <i class="glyphicon glyphicon-trash">  </td>
                       
                </tr>
                
               
                                <tr style="font-size: 12px;">
        
                <td style="width:1%;"  align="center">2  </td>
                <td style="width:50%;">  <a href="resume_invoice/resume_proforma_invoice_41519.pdf" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; ">resume_proforma_invoice_41519.pdf </a>

               </td>
                <td style="width:5%;"> <a href="file_contract.php?act=Del" title="Delete File" class="btn btn-xs btn-danger"> <i class="glyphicon glyphicon-trash">  </td>
                       
                </tr>
                
               
                                <tr style="font-size: 12px;">
        
                <td style="width:1%;"  align="center">3  </td>
                <td style="width:50%;">  <a href="resume_invoice/resume_proforma_invoice_47565.pdf" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; ">resume_proforma_invoice_47565.pdf </a>

               </td>
                <td style="width:5%;"> <a href="file_contract.php?act=Del" title="Delete File" class="btn btn-xs btn-danger"> <i class="glyphicon glyphicon-trash">  </td>
                       
                </tr>
                
               
                                <tr style="font-size: 12px;">
        
                <td style="width:1%;"  align="center">4  </td>
                <td style="width:50%;">  <a href="resume_invoice/resume_proforma_invoice_84468.pdf" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; ">resume_proforma_invoice_84468.pdf </a>

               </td>
                <td style="width:5%;"> <a href="file_contract.php?act=Del" title="Delete File" class="btn btn-xs btn-danger"> <i class="glyphicon glyphicon-trash">  </td>
                       
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