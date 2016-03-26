<?php
/*%%SmartyHeaderCode:155856a995c7be02b3_08615672%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3df96eaca5ffe0c34d280551b23058657c704b51' => 
    array (
      0 => './templates/invoice.tpl',
      1 => 1453941326,
      2 => 'file',
    ),
    '0d67b0acdab9c4ef7b7786428c9051d03ca0e70f' => 
    array (
      0 => './templates/header.tpl',
      1 => 1453780146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155856a995c7be02b3_08615672',
  'tpl_function' => 
  array (
  ),
  'version' => '3.1.24',
  'unifunc' => 'content_56a9bb7abfa806_95130803',
  'has_nocache_code' => false,
  'cache_lifetime' => 0,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56a9bb7abfa806_95130803')) {
function content_56a9bb7abfa806_95130803 ($_smarty_tpl) {
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
        <h2>Cetak Invoice</h2>
        </div>

        </div>
        <a href="?act=Add" class="btn btn-primary"> + Tambah Data</a>
        <br>
        &nbsp;
           <table id="example" class="table table-striped table-bordered table-hover" style="width:100%;">
              <thead style="background-color:#FFF;">
                <tr>
                  
                  <th style="width:10%;" align="center">No Project</th>
                  <th style="width:10%;" align="center">Customer Name</th>
                  <th style="width:10%;" align="center">CC Name</th>
                  <th style="width:5%;" align="center">Site Name </th>
                  <th style="width:5%;" align="center">Nama Pekerjaan</th>
                  <th style="width:5%;" align="center">Status</th>
                  <th style="width:8%;" align="center">Opsi</th>
                  
     
                </tr>
                </thead>
                
                <tbody>
                                <tr>
                 

                <td style="width:10%;" class="alert alert-info">T-0013-BPP-A1  </td>
                <td style="width:10%;" class="alert alert-info"> PT.FIRST MEDIA </td>
                <td style="width:10%;" class="alert alert-info"> CC 201 777AAAA </td>
                <td style="width:5%;" class="alert alert-info"> Bintara Sektor 8 </td>
                <td style="width:5%;" class="alert alert-info"> Instalasi Fiber Optic </td>
                <td style="width:5%;" class="alert alert-info"> Administration </td>
                <td style="width:8%;" class="alert alert-info" align="center"> 
                <a href="print_invoice.php?id=1" title="Cetak Invoice" target="_blank"> <i class="glyphicon glyphicon-print"> </i> </a>
                
              

                 
                </td>

               
                  
                </tr>
                                <tr>
                 

                <td style="width:10%;" class="alert alert-info">T-0022-CBS-A0  </td>
                <td style="width:10%;" class="alert alert-info"> PT.SISINDOKOM </td>
                <td style="width:10%;" class="alert alert-info"> CC0AB </td>
                <td style="width:5%;" class="alert alert-info"> Kranji </td>
                <td style="width:5%;" class="alert alert-info"> Instalasi FO </td>
                <td style="width:5%;" class="alert alert-info"> On Service </td>
                <td style="width:8%;" class="alert alert-info" align="center"> 
                <a href="print_invoice.php?id=10" title="Cetak Invoice" target="_blank"> <i class="glyphicon glyphicon-print"> </i> </a>
                
              

                 
                </td>

               
                  
                </tr>
                                <tr>
                 

                <td style="width:10%;" class="alert alert-info">P-0012-SPE-A0  </td>
                <td style="width:10%;" class="alert alert-info"> PT.LANGIT ANGKASA PURA </td>
                <td style="width:10%;" class="alert alert-info"> SM002 </td>
                <td style="width:5%;" class="alert alert-info"> Bekasi Timur </td>
                <td style="width:5%;" class="alert alert-info"> Grabbing Signal Wifi </td>
                <td style="width:5%;" class="alert alert-info"> Administration </td>
                <td style="width:8%;" class="alert alert-info" align="center"> 
                <a href="print_invoice.php?id=11" title="Cetak Invoice" target="_blank"> <i class="glyphicon glyphicon-print"> </i> </a>
                
              

                 
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