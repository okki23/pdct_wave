<?php
/*%%SmartyHeaderCode:71956a96f5dab2742_68545269%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d43ed3b1ffeb1bf3aed20df4a911365acaa739a' => 
    array (
      0 => './templates/customer_view.tpl',
      1 => 1453944418,
      2 => 'file',
    ),
    '6216f7fad91baf0175c25de47934f52f0d1f2a6e' => 
    array (
      0 => './templates/header.tpl',
      1 => 1453780146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '71956a96f5dab2742_68545269',
  'tpl_function' => 
  array (
  ),
  'version' => '3.1.24',
  'unifunc' => 'content_56a9730f6cadb6_31250792',
  'has_nocache_code' => false,
  'cache_lifetime' => 0,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56a9730f6cadb6_31250792')) {
function content_56a9730f6cadb6_31250792 ($_smarty_tpl) {
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

          <div class="container">
    <div class="row">
    <div class="col-md-12">
    <div style="margin-top:50px;">
    </div>
       
        <div class="jumbotron">
        <div align="right">
        <img src="images/logo.gif">
        <h2>Data Customer</h2>
        </div>

        </div>
        <a href="?act=Add" class="btn btn-primary"> + Tambah Data</a>
        <br>
        &nbsp;
           <table id="example" class="table table-striped table-bordered table-hover" style="width:100%;">
              <thead style="background-color:#FFF;">
                <tr>
                  
                  <th style="width:10%;" align="center">Nama Customer</th>
               
                  <th style="width:8%;" align="center">Opsi</th>
                  
     
                </tr>
                </thead>
                
                <tbody>
                                <tr>
                 

                <td style="width:30%;" class="alert alert-info">PT.TELKOM INDONESIA  </td>
               
                <td style="width:8%;" class="alert alert-info" align="center"> 
                 <a href="customer.php?id=1&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="customer.php?id=1&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
              

                 
                </td>

               
                  
                </tr>
                                <tr>
                 

                <td style="width:30%;" class="alert alert-info">PT.SISINDOKOM  </td>
               
                <td style="width:8%;" class="alert alert-info" align="center"> 
                 <a href="customer.php?id=2&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="customer.php?id=2&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
              

                 
                </td>

               
                  
                </tr>
                                <tr>
                 

                <td style="width:30%;" class="alert alert-info">PT.LINTAS ARTA  </td>
               
                <td style="width:8%;" class="alert alert-info" align="center"> 
                 <a href="customer.php?id=3&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="customer.php?id=3&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
              

                 
                </td>

               
                  
                </tr>
                                <tr>
                 

                <td style="width:30%;" class="alert alert-info">PT.FIRST MEDIA  </td>
               
                <td style="width:8%;" class="alert alert-info" align="center"> 
                 <a href="customer.php?id=4&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="customer.php?id=4&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
              

                 
                </td>

               
                  
                </tr>
                                <tr>
                 

                <td style="width:30%;" class="alert alert-info">PT.INDOSAT  </td>
               
                <td style="width:8%;" class="alert alert-info" align="center"> 
                 <a href="customer.php?id=5&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="customer.php?id=5&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
              

                 
                </td>

               
                  
                </tr>
                                <tr>
                 

                <td style="width:30%;" class="alert alert-info">PT.LANGIT ANGKASA PURA  </td>
               
                <td style="width:8%;" class="alert alert-info" align="center"> 
                 <a href="customer.php?id=6&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="customer.php?id=6&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
              

                 
                </td>

               
                  
                </tr>
                                <tr>
                 

                <td style="width:30%;" class="alert alert-info">PT.MEDIA NUSANTARA CITRA  </td>
               
                <td style="width:8%;" class="alert alert-info" align="center"> 
                 <a href="customer.php?id=7&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="customer.php?id=7&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
              

                 
                </td>

               
                  
                </tr>
                                <tr>
                 

                <td style="width:30%;" class="alert alert-info">PT.EXCELECOMINDO  </td>
               
                <td style="width:8%;" class="alert alert-info" align="center"> 
                 <a href="customer.php?id=8&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="customer.php?id=8&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
              

                 
                </td>

               
                  
                </tr>
                                </tbody>
                
                
              
              </table>
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