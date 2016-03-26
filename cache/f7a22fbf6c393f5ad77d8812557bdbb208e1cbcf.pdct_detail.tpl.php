<?php
/*%%SmartyHeaderCode:1972056e035d3e52588_61028332%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7a22fbf6c393f5ad77d8812557bdbb208e1cbcf' => 
    array (
      0 => './templates/pdct_detail.tpl',
      1 => 1457534418,
      2 => 'file',
    ),
    '0d67b0acdab9c4ef7b7786428c9051d03ca0e70f' => 
    array (
      0 => './templates/header.tpl',
      1 => 1455203965,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1972056e035d3e52588_61028332',
  'tpl_function' => 
  array (
  ),
  'version' => '3.1.24',
  'unifunc' => 'content_56e2ba9bc3fde1_74832389',
  'has_nocache_code' => false,
  'cache_lifetime' => 0,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56e2ba9bc3fde1_74832389')) {
function content_56e2ba9bc3fde1_74832389 ($_smarty_tpl) {
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
    <div style="margin-top:70px;">
    </div>
         <button onclick="history.go(-1);" class="btn btn-primary"> <i class="glyphicon glyphicon-arrow-left"> </i> Back </button>
         <br>
         <br>
       <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Data Detail PDCT </h3>
            </div>
            <div class="panel-body">
          
            <br>
            <br>
             <table class="table table-striped table-hover">
             	<tr> 
                	<td> Nama Customer </td>
                    <td> : </td>
                    <td> PT.SGU Bersama </td>
                </tr>
                <tr> 
                	<td> Project No </td>
                    <td> : </td>
                    <td> PR0093 </td>
                </tr>
                 
                 <tr> 
                  <td> CC Name  </td>
                    <td> : </td>
                    <td> Bruno </td>
                </tr>
                <tr> 
                  <td> Site Name </td>
                    <td> : </td>
                    <td> Galaxy </td>
                </tr>
                <tr>
                <tr> 
                  <td> Site Code </td>
                    <td> : </td>
                    <td> GLX03 </td>
                </tr>
                <tr> 
                <td> Contract Level </td>
                    <td> : </td>
                    <td> Add 2 </td>
                </tr>
                 
                <tr> 
                <td> Nama Pekerjaan </td>
                    <td> : </td>
                    <td> Install FO </td>
                </tr>
                 <tr> 
                <td> No. SPK/P8 </td>
                    <td> : </td>
                                         <td> <a href="doc_uploads/spk/baso1.pdf" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; ">baso1.pdf </a> </td>
                                       
                </tr>


                <tr> 
                <td> Surat Kesanggupan </td>
                    <td> : </td>
                                         <td> <a href="doc_uploads/sk/sk1.pdf" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; ">sk1.pdf </a> </td>
                                       
                </tr>

                <tr> 
                <td> Contract Number </td>
                    <td> : </td>
                                         <td> <a href="doc_uploads/cn/cn1.pdf" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; ">cn1.pdf </a> </td>
                                       
                </tr>

                <tr> 
                <td> BAST </td>
                    <td> : </td>
                                         <td> <a href="doc_uploads/bast/bast1.pdf" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; ">bast1.pdf </a> </td>
                                       
                </tr>

                <tr> 
                <td> BASO </td>
                    <td> : </td>
                                         <td> <a href="doc_uploads/baso/baso1.pdf" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; ">baso1.pdf </a> </td>
                                       
                </tr>

                 <tr> 
                  <td> Account No </td>
                    <td> : </td>
                    <td> ACC00 </td>
                </tr>

                <tr> 
                  <td> SID </td>
                    <td> : </td>
                    <td> 999 </td>
                </tr>

                <tr> 
                  <td> CID </td>
                    <td> : </td>
                    <td> 222 </td>
                </tr>

                <tr> 
                  <td> Start Date </td>
                    <td> : </td>
                    <td> 01 Januari 2016 </td>
                </tr>

                <tr> 
                  <td> Ending Date </td>
                    <td> : </td>
                    <td> 01 Desember 2016 </td>
                </tr>

                <tr> 
                  <td> Masa Kontrak </td>
                    <td> : </td>
                    <td> 12 Bulan </td>
                </tr>

                 <tr> 
                  <td> Contract Status </td>
                    <td> : </td>
                    <td> On Service </td>
                </tr>

                <tr> 
                  <td> Account Manager </td>
                    <td> : </td>
                    <td> Marwoto </td>
                </tr>

                <tr> 
                  <td> Email </td>
                    <td> : </td>
                    <td> okkisetyawan@gmail.com </td>
                </tr>

                <tr> 
                  <td> Phone </td>
                    <td> : </td>
                    <td> 089610595064 </td>
                </tr>

                <tr> 
                  <td> OTC </td>
                    <td> : </td>
                    <td> Rp.0 <p class="alert alert-info"> <b><i>Terbilang (  Rupiah )</b></i></p></td>
                </tr>

                <tr> 
                  <td> Monthly </td>
                    <td> : </td>
                    <td> Rp.5,000,000 <p class="alert alert-info"> <b><i>Terbilang ( Lima Juta Rupiah )</b></i></p></td>
                </tr>

                <tr> 
                  <td> Total </td>
                    <td> : </td>
                    <td> Rp.60,000,000 <p class="alert alert-info"> <b><i>Terbilang ( Enam Puluh Juta Rupiah )</b></i></p></td>
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