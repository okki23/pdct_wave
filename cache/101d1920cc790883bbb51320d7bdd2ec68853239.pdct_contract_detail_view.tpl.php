<?php
/*%%SmartyHeaderCode:309556e7e85a66c7f0_15548454%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '101d1920cc790883bbb51320d7bdd2ec68853239' => 
    array (
      0 => './templates/pdct_contract_detail_view.tpl',
      1 => 1458038866,
      2 => 'file',
    ),
    '0d67b0acdab9c4ef7b7786428c9051d03ca0e70f' => 
    array (
      0 => './templates/header.tpl',
      1 => 1458151396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '309556e7e85a66c7f0_15548454',
  'tpl_function' => 
  array (
  ),
  'version' => '3.1.24',
  'unifunc' => 'content_56f60c990e2392_92466355',
  'has_nocache_code' => false,
  'cache_lifetime' => 0,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56f60c990e2392_92466355')) {
function content_56f60c990e2392_92466355 ($_smarty_tpl) {
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
        <h2>Data PDCT Kontrak</h2>
        </div>

        </div>
        <br>
        <input type="hidden" name="idcust" value="13">
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
                      <td> PR002 </td>
                    </tr>
                     <tr>  
                      <td> Customer Name </td>
                      <td> : </td>
                      <td> PT.TELKOM INDONESIA </td>
                    </tr>
                   
                  </table>
                  </div>

                   <div class="col-md-6">
                   <table class="table table-stripped table-hovered">
                     <tr>  
                      <td> CC Name </td>
                      <td> : </td>
                      <td> CC202 </td>
                    </tr>
                      <tr>  
                      <td> Site Name </td>
                      <td> : </td>
                      <td> Bintara </td>
                    </tr>
                    
                  </table>
                  </div>
              </div>
              </div>

              </div>
       
        </div>
        
        <br>

         <a href="?act=DetailContractAdd&idcust=13" class="btn btn-primary"> + Tambah Data Kontrak </a>
         <br>
         <br>
           <table id="example" class="table table-striped table-bordered table-hover" style="width:100%;">
              <thead style="background-color:#FFF; font-size: 12px;">
                <tr>
                  
                  <th style="width:3%;" align="center">Status KD</th>
                  <th style="width:8%;" align="center">Site Code</th>
                  <th style="width:8%;" align="center">Contract Level</th>
                  <th style="width:18%;" align="center">Nama Pekerjaan </th>
 
                  <th style="width:10%;" align="center">Starting</th>
                  <th style="width:10%;" align="center">Ending</th>
                  <th style="width:10%;" align="center">Contract Status</th>
                  <th style="width:12%;" align="center">Opsi</th>
                  
     
                </tr>
                </thead>
                
                <tbody>
                 
                <tr style="font-size: 12px;">
                 
                

                                <td style="width:3%;" align="center">

                                              <img src="images/true.png" style="width: 30%;" align="center">
                       

                </td>
                <td style="width:8%;" >BTR01 </td>
                <td style="width:8%;" >Induk 0  </td>
                <td style="width:18%;" >instalasi FO</td>
              
                <td style="width:10%;" > 01 Januari 2016   </td>
                <td style="width:10%;" > 01 Desember 2016 </td>
                 <td style="width:10%;"> Administration </td>

                 

                                   <td style="width:12%;" align="center"> 
                 
               

                  <a href="master_pdct.php?id=42&act=DetailContractUpdate&idcust=13" class="btn btn-xs btn-warning" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>

                <a href="master_pdct.php?act=DetailContractDelete&id=42&idcust=13" class="btn btn-xs btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a>

                <a href="master_pdct.php?id=42&act=DetailList&idcust=13" class="btn btn-xs btn-default" title="Detail"> <i class="glyphicon glyphicon-file"> </i> </a>
               
                 <a href="master_pdct.php?idcont=42&act=DetailBilling&idcust=13" class="btn btn-xs btn-success" title="Billing"> <i class="glyphicon glyphicon-usd"> </i> </a>
                
                


               
                </td>
                  
                  
                  

                
               
                  
                </tr>
                 
                <tr style="font-size: 12px;">
                 
                

                                <td style="width:3%;" align="center">

                                              <img src="images/false.png" style="width: 30%;" align="center">
                       

                </td>
                <td style="width:8%;" >BTR02 </td>
                <td style="width:8%;" >Add 1  </td>
                <td style="width:18%;" >Instalasi FO</td>
              
                <td style="width:10%;" > 01 Januari 2016   </td>
                <td style="width:10%;" > 01 Desember 2016 </td>
                 <td style="width:10%;"> On Service </td>

                 

                                   <td style="width:12%;" align="center"> 
                 
               

                  <a href="master_pdct.php?id=43&act=DetailContractUpdate&idcust=13" class="btn btn-xs btn-warning" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>

                <a href="master_pdct.php?act=DetailContractDelete&id=43&idcust=13" class="btn btn-xs btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a>

                <a href="master_pdct.php?id=43&act=DetailList&idcust=13" class="btn btn-xs btn-default" title="Detail"> <i class="glyphicon glyphicon-file"> </i> </a>
               
                 <a href="master_pdct.php?idcont=43&act=DetailBilling&idcust=13" class="btn btn-xs btn-success" title="Billing"> <i class="glyphicon glyphicon-usd"> </i> </a>
                
                


               
                </td>
                  
                  
                  

                
               
                  
                </tr>
                                </tbody>
                
                
              
              </table>


              <div class="panel panel-success">  
                <div class="panel-heading">
                Informasi :
                </div>
                <div class="panel-body">
                <p class="btn btn-danger"> Warna Merah  = Kontrak Warning Kurang Dari 90 Hari (3 Bulan)  </p> 
                <br>
                <br>
                <p class="btn btn-default"> Warna Putih  = Kontrak Aman Dari 90 Hari (3 Bulan) </p> 
                <br>
                <br>
                <p class="btn btn-xs btn-danger">Tanda Silang = Field Data Masih ada yang Kosong  </p> 
                <br>
                <br>
                <p class="btn btn-xs btn-success">Tanda Ceklist = Field Data Sudah Terpenuhi Seluruhnya  </p> 
                 
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