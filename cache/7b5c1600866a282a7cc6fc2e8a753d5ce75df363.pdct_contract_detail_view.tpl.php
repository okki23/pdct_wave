<?php
/*%%SmartyHeaderCode:1826056a8dae4e481e4_49376886%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b5c1600866a282a7cc6fc2e8a753d5ce75df363' => 
    array (
      0 => './templates/pdct_contract_detail_view.tpl',
      1 => 1453906659,
      2 => 'file',
    ),
    '6216f7fad91baf0175c25de47934f52f0d1f2a6e' => 
    array (
      0 => './templates/header.tpl',
      1 => 1453780146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1826056a8dae4e481e4_49376886',
  'tpl_function' => 
  array (
  ),
  'version' => '3.1.24',
  'unifunc' => 'content_56a968111ae498_76486227',
  'has_nocache_code' => false,
  'cache_lifetime' => 0,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56a968111ae498_76486227')) {
function content_56a968111ae498_76486227 ($_smarty_tpl) {
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
        <h2>Data PDCT Kontrak</h2>
        </div>

        </div>
        <br>
        <input type="hidden" name="idcust" value="10">
        <button type="submit" class="btn btn-primary" onclick="window.location='master_pdct.php';"> <i class="glyphicon glyphicon-arrow-left"> </i> Kembali</button>
   
       
 
        <br>
        <br>
        <br>
            <div class="col-md-12">

            <div class="panel panel-primary">
              <div class="panel-heading">Detail Customer</div>
              <div class="panel-body">
                   <div class="col-md-6">
                   <table class="table table-stripped table-hover">
                    <tr>  
                      <td> No Project </td>
                      <td> : </td>
                      <td> T-0022-CBS-A0 </td>
                    </tr>
                     <tr>  
                      <td> Customer Name </td>
                      <td> : </td>
                      <td> PT.SISINDOKOM </td>
                    </tr>
                     <tr>  
                      <td> CC Name </td>
                      <td> : </td>
                      <td> CC0AB </td>
                    </tr>
                  </table>
                  </div>

                   <div class="col-md-6">
                   <table class="table table-stripped table-hovered">
                    <tr>  
                      <td> Site Name </td>
                      <td> : </td>
                      <td> Kranji </td>
                    </tr>
                     <tr>  
                      <td> Nama Pekerjaan </td>
                      <td> : </td>
                      <td> Instalasi FO </td>
                    </tr>
                     <tr>  
                      <td> Status </td>
                      <td> : </td>
                      <td> On Service </td>
                    </tr>
                  </table>
                  </div>
              </div>
              </div>

              </div>
       
        </div>
        
        <br>

         <a href="?act=DetailContractAdd&idcust=10" class="btn btn-primary"> + Tambah Data Kontrak </a>
         <br>
         <br>
           <table id="example" class="table table-striped table-bordered table-hover" style="width:100%;">
              <thead style="background-color:#FFF;">
                <tr>
                  
                  <th style="width:8%;" align="center">Contract Level</th>
                  <th style="width:8%;" align="center">Account No </th>
                  <th style="width:8%;" align="center">SID</th>
                  <th style="width:5%;" align="center">CID</th>
                  <th style="width:8%;" align="center">Starting</th>
                  <th style="width:8%;" align="center">Ending</th>
                  <th style="width:8%;" align="center">Opsi</th>
                  
     
                </tr>
                </thead>
                
                <tbody>
                                <tr>
                 
                

                                <td style="width:8%;" class="alert alert-info">Add 1  </td>
                <td style="width:8%;" class="alert alert-info"> ACC-101050 </td>
                <td style="width:8%;" class="alert alert-info"> SID001 </td>
                <td style="width:5%;" class="alert alert-info"> CID001 </td>
                <td style="width:8%;" class="alert alert-info"> 01 Januari 2016   </td>
                <td style="width:8%;" class="alert alert-info"> 01 Desember 2016 </td>
                <td style="width:8%;" class="alert alert-info" align="center"> 
                 
               

                <a href="master_pdct.php?id=15&act=DetailContractUpdate&idcust=10" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>

                <a href="master_pdct.php?act=DetailContractDelete&id=15&idcust=10" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a>

                <a href="master_pdct.php?id=15&act=DetailList&idcust=10" title="Detail"> <i class="glyphicon glyphicon-file"> </i> </a>


               
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