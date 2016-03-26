<?php
/*%%SmartyHeaderCode:1054556e7ea36ac5358_38022467%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82b9e306e769c16dffeaa7ad0ced7b4a114f5dfc' => 
    array (
      0 => './templates/pdct_billing_view.tpl',
      1 => 1458039228,
      2 => 'file',
    ),
    '0d67b0acdab9c4ef7b7786428c9051d03ca0e70f' => 
    array (
      0 => './templates/header.tpl',
      1 => 1458151396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1054556e7ea36ac5358_38022467',
  'tpl_function' => 
  array (
  ),
  'version' => '3.1.24',
  'unifunc' => 'content_56f60c9bb885c8_86293961',
  'has_nocache_code' => false,
  'cache_lifetime' => 0,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56f60c9bb885c8_86293961')) {
function content_56f60c9bb885c8_86293961 ($_smarty_tpl) {
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
        <h2>Data PDCT Billing</h2>
        </div>

        </div>
        <br>
        <input type="hidden" name="idcontract" value="42">
        <input type="hidden" name="idcust" value="13">
        <button type="submit" class="btn btn-primary" onclick="window.location='?idcust=13&act=DetailContract';"> <i class="glyphicon glyphicon-arrow-left"> </i> Kembali</button>
   
       
 
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
                      <td> Project No </td>
                      <td> : </td>
                      <td> PR002 </td>
                    </tr>
                     <tr>  
                      <td> Customer Name </td>
                      <td> : </td>
                      <td> PT.TELKOM INDONESIA</td>
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
       

       <div class="col-md-12">

            <div class="panel panel-primary">
              <div class="panel-heading">Detail Contract</div>
              <div class="panel-body">
                   <div class="col-md-6">
                   <table class="table table-stripped table-hover">
                    <tr>  
                      <td> Site Code </td>
                      <td> : </td>
                      <td> BTR01 </td>
                    </tr>
                     <tr>  
                      <td> Nama Pekerjaan </td>
                      <td> : </td>
                      <td> instalasi FO</td>
                    </tr>

                     <tr>  
                      <td> Starting </td>
                      <td> : </td>
                      <td> 01 Januari 2016 </td>
                    </tr>
                    
                    <tr>  
                      <td> Contract Date </td>
                      <td> : </td>
                      <td> 22 Maret 2016 </td>
                    </tr>
                   
                  </table>
                  </div>

                   <div class="col-md-6">
                   <table class="table table-stripped table-hovered">
                     <tr>  
                      <td> Contract Level </td>
                      <td> : </td>
                      <td> Induk 0 </td>
                    </tr>
                    <tr>  
                      <td> Contract Status </td>
                      <td> : </td>
                      <td> Administration </td>
                    </tr>
                    <tr>  
                      <td> Ending </td>
                      <td> : </td>
                      <td> 01 Desember 2016 </td>
                    </tr>
                     <tr>  
                      <td> Account Manager </td>
                      <td> : </td>
                      <td> Okki Setyawan </td>
                    </tr>
                    
                  </table>
                  </div>
              </div>
              </div>

              </div>
       
        </div>


        
        <br>
        
         <a href="?act=DetailBillingAdd&idcust=13&idcont=42" class="btn btn-primary"> + Tambah Data Billing </a>

                 <br>
         <br>
           <table id="example" class="table table-striped table-bordered table-hover" style="width:100%;">
              <thead style="background-color:#FFF; font-size: 12px;">
                <tr>
                  
                  <th style="width:2%;" align="center">No</th>
                  <th style="width:8%;" align="center">Status KD</th>
                  <th style="width:8%;" align="center">End User</th>
                  <th style="width:8%;" align="center">Bill Periode</th>
                  <th style="width:8%;" align="center">Bill Amount</th>
                  <th style="width:5%;" align="center">Charges</th>
                  <th style="width:8%;" align="center">Paid</th>
               
                  <th style="width:8%;" align="center">Opsi</th>
                  
     
                </tr>
                </thead>
                
                <tbody>
        
                        
                <tr style="font-size: 12px;">
                 
                <td style="width:2%;"> 1</td>
                <td style="width:2%;" align="center"> 

                                         <img src="images/true.png" style="width: 30%;" align="center">
                       
                      </td>
                <td style="width:8%;"> OTC</td>
                <td style="width:8%;"> 201601</td>            
                <td style="width:8%;"> Rp.1,000,000</td>
                <td style="width:5%;"> One Time Charge</td>
                <td style="width:8%;"> 
                                Yes / Sudah Bayar
                                 </td>
                 

                                  <td style="width:8%;" align="center"> 
                  <a href="master_pdct.php?act=DetailBillingUpdate&id=148&idcust=13&idcont=42" title="Edit"  class="btn btn-xs btn-warning"> <i class="glyphicon glyphicon-pencil"> </i> </a>

                <a href="master_pdct.php?act=DetailBillingDelete&id=148&idcust=13&idcont=42" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-xs btn-danger"> <i class="glyphicon glyphicon-trash"> </i> </a>

                <a href="master_pdct.php?act=DetailBillingDetail&id=148&idcust=13&idcont=42" title="Detail"  class="btn btn-xs btn-default"> <i class="glyphicon glyphicon-file"> </i> </a>

                 </td>
                 
                </tr>
                
                        
                <tr style="font-size: 12px;">
                 
                <td style="width:2%;"> 2</td>
                <td style="width:2%;" align="center"> 

                                         <img src="images/true.png" style="width: 30%;" align="center">
                       
                      </td>
                <td style="width:8%;"> Periode 1</td>
                <td style="width:8%;"> 201601</td>            
                <td style="width:8%;"> Rp.1,000,000</td>
                <td style="width:5%;"> Monthly</td>
                <td style="width:8%;"> 
                                Yes / Sudah Bayar
                                 </td>
                 

                                  <td style="width:8%;" align="center"> 
                  <a href="master_pdct.php?act=DetailBillingUpdate&id=149&idcust=13&idcont=42" title="Edit"  class="btn btn-xs btn-warning"> <i class="glyphicon glyphicon-pencil"> </i> </a>

                <a href="master_pdct.php?act=DetailBillingDelete&id=149&idcust=13&idcont=42" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-xs btn-danger"> <i class="glyphicon glyphicon-trash"> </i> </a>

                <a href="master_pdct.php?act=DetailBillingDetail&id=149&idcust=13&idcont=42" title="Detail"  class="btn btn-xs btn-default"> <i class="glyphicon glyphicon-file"> </i> </a>

                 </td>
                 
                </tr>
                
                                </tbody>
                
                
              
              </table>
               <div class="panel panel-success">  
                <div class="panel-heading">
                Informasi :
                </div>
                <div class="panel-body">
              <p class="btn btn-xs btn-danger">Tanda Silang = Field Data Masih ada yang Kosong  </p> 
                 
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