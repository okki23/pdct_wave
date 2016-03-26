<?php
/*%%SmartyHeaderCode:32083569e54c6750633_15090044%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e7ddec9fc6876c74d9f0d98a930acaca315950b' => 
    array (
      0 => './templates/pdct_detail.tpl',
      1 => 1453216964,
      2 => 'file',
    ),
    '6216f7fad91baf0175c25de47934f52f0d1f2a6e' => 
    array (
      0 => './templates/header.tpl',
      1 => 1453082858,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32083569e54c6750633_15090044',
  'tpl_function' => 
  array (
  ),
  'version' => '3.1.24',
  'unifunc' => 'content_56a602f9ca51a6_89316020',
  'has_nocache_code' => false,
  'cache_lifetime' => 0,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56a602f9ca51a6_89316020')) {
function content_56a602f9ca51a6_89316020 ($_smarty_tpl) {
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
            <li><a href="404.php">MAS</a></li>
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
    <div style="margin-top:70px;">
    </div>
       
       <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Data Detail PDCT </h3>
            </div>
            <div class="panel-body">
            <button type="submit" class="btn btn-primary">  <i class="glyphicon glyphicon-print"> </i> Cetak Halaman Ini </button>
            <br>
            <br>
             <table class="table table-striped table-hover">
             	<tr> 
                	<td> Nama Customer </td>
                    <td> : </td>
                    <td> PT.FIRST MEDIA </td>
                </tr>
                <tr> 
                	<td> Project No </td>
                    <td> : </td>
                    <td> T-0036-MME-A0 </td>
                </tr>
                 <tr> 
                  <td> CC Name  </td>
                    <td> : </td>
                    <td> CC 201 777 </td>
                </tr>
                 <tr> 
                  <td> Site Name </td>
                    <td> : </td>
                    <td> Kalimalang </td>
                </tr>
                <tr> 
                <td> Nama Pekerjaan No </td>
                    <td> : </td>
                    <td> Instalasi Fiber Optic </td>
                </tr>
                <tr> 
                <td> Status </td>
                    <td> : </td>
                    <td> Administration </td>
                </tr>
                <tr> 
                <td> Contract Level </td>
                    <td> : </td>
                    <td> Add </td>
                </tr>
                 <tr> 
                <td> No. SPK/P8 </td>
                    <td> : </td>
                                         <td> <a href="doc_uploads/spk/Lamaran  PT.GS BATTERY Okki.pdf" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; ">Lamaran  PT.GS BATTERY Okki.pdf </a> </td>
                                       
                </tr>


                <tr> 
                <td> Surat Kesanggupan </td>
                    <td> : </td>
                                         <td> <a href="doc_uploads/spk/Lamaran  PT.GS BATTERY Okki.pdf" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; ">Lamaran  PT.GS BATTERY Okki.pdf </a> </td>
                                       
                </tr>

                <tr> 
                <td> Contract Number </td>
                    <td> : </td>
                                         <td> <a href="doc_uploads/spk/Lamaran  PT.GS BATTERY Okki.pdf" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; ">Lamaran  PT.GS BATTERY Okki.pdf </a> </td>
                                       
                </tr>

                <tr> 
                <td> BAST </td>
                    <td> : </td>
                                         <td> <a href="doc_uploads/spk/Lamaran  PT.GS BATTERY Okki.pdf" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; ">Lamaran  PT.GS BATTERY Okki.pdf </a> </td>
                                       
                </tr>

                <tr> 
                <td> BASO </td>
                    <td> : </td>
                                         <td> <a href="doc_uploads/spk/Lamaran  PT.GS BATTERY Okki.pdf" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; ">Lamaran  PT.GS BATTERY Okki.pdf </a> </td>
                                       
                </tr>

                 <tr> 
                  <td> Account No </td>
                    <td> : </td>
                    <td> 923756237574321 </td>
                </tr>

                <tr> 
                  <td> SID </td>
                    <td> : </td>
                    <td> 3333-333333 </td>
                </tr>

                <tr> 
                  <td> CID </td>
                    <td> : </td>
                    <td> 234 </td>
                </tr>

                <tr> 
                  <td> Start Date </td>
                    <td> : </td>
                    <td> 01 Januari 2016 </td>
                </tr>

                <tr> 
                  <td> Ending Date </td>
                    <td> : </td>
                    <td> 31 Desember 2016 </td>
                </tr>

                <tr> 
                  <td> Masa Kontrak </td>
                    <td> : </td>
                    <td> 12 </td>
                </tr>

                <tr> 
                  <td> Account Manager </td>
                    <td> : </td>
                    <td> Amin </td>
                </tr>

                <tr> 
                  <td> Email </td>
                    <td> : </td>
                    <td> okkisetyawan@gmail.com </td>
                </tr>

                <tr> 
                  <td> Phone </td>
                    <td> : </td>
                    <td> 2147483647 </td>
                </tr>

                <tr> 
                  <td> OTC </td>
                    <td> : </td>
                    <td> Rp.4,000,000 <p class="alert alert-info"> <b><i>Terbilang ( Empat Juta Rupiah )</b></i></p></td>
                </tr>

                <tr> 
                  <td> Monthly </td>
                    <td> : </td>
                    <td> Rp.5,000,000 <p class="alert alert-info"> <b><i>Terbilang ( Lima Juta Rupiah )</b></i></p></td>
                </tr>

                <tr> 
                  <td> Total </td>
                    <td> : </td>
                    <td> Rp.64,000,000 <p class="alert alert-info"> <b><i>Terbilang ( Enam Puluh Empat Juta Rupiah )</b></i></p></td>
                </tr>

                <tr> 
                  <td> End User </td>
                    <td> : </td>
                    <td>  Andi Malaranggeng </td>
                </tr>

                <tr> 
                  <td> Billing Periode </td>
                    <td> : </td>
                    <td>  201603 </td>
                </tr>

                <tr> 
                  <td> FP No </td>
                    <td> : </td>
                    <td>  2135555 </td>
                </tr>

                <tr> 
                  <td> Bill </td>
                    <td> : </td>
                    <td> Rp.56,000,000 <p class="alert alert-info"> <b><i>Terbilang ( Lima Puluh Enam Juta Rupiah )</b></i></p></td>
                </tr>

                <tr> 
                  <td> Paid </td>
                    <td> : </td>
                    <td> 1111111 </td>
                </tr>

                <tr> 
                  <td> Charges </td>
                    <td> : </td>
                    <td> One Time Charge </td>
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
        <p class="text-muted"> &copy; 2016 <a href='http://wavecomindo.co.id'>PT.Wavecomindo</a></p>
      </div>
    </footer>

    
     
  </body>
</html>






<?php }
}
?>