<?php
/*%%SmartyHeaderCode:2032956d240495badc4_59794038%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b6ed83249ad9e56616a1508149480da459d9aa8' => 
    array (
      0 => './templates/master_email_message_view.tpl',
      1 => 1456619592,
      2 => 'file',
    ),
    '0d67b0acdab9c4ef7b7786428c9051d03ca0e70f' => 
    array (
      0 => './templates/header.tpl',
      1 => 1458151396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2032956d240495badc4_59794038',
  'tpl_function' => 
  array (
  ),
  'version' => '3.1.24',
  'unifunc' => 'content_56f6153d22d573_50699359',
  'has_nocache_code' => false,
  'cache_lifetime' => 0,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56f6153d22d573_50699359')) {
function content_56f6153d22d573_50699359 ($_smarty_tpl) {
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
        <h2>Master Email Message</h2>
        </div>

        </div>
        <br>
        <input type="hidden" name="idcust" value="<br />
<b>Notice</b>:  Undefined index: idcust in <b>C:\xampp\htdocs\pdct\templates_c\9b6ed83249ad9e56616a1508149480da459d9aa8_0.file.master_email_message_view.tpl.cache.php</b> on line <b>97</b><br />
<br />
<b>Notice</b>:  Trying to get property of non-object in <b>C:\xampp\htdocs\pdct\templates_c\9b6ed83249ad9e56616a1508149480da459d9aa8_0.file.master_email_message_view.tpl.cache.php</b> on line <b>97</b><br />
">
     
       
 
        
            <div class="col-md-12">

          
       
        </div>
        
        <br>

         <a href="?act=Add" class="btn btn-primary"> + Tambah Data </a>
         <br>
         <br>
           <table id="example" class="table table-striped table-bordered table-hover" style="width:100%;">
              <thead style="background-color:#FFF; font-size: 12px;">
                <tr>
                  
                  <th style="width:20%;" align="center">Pesan Email </th>
                  <th style="width:3%;" align="center" >Active </th>
                  <th style="width:3%;" align="center">Opsi </th>
                  
     
                </tr>
                </thead>
                
                <tbody>
                                <tr style="font-size: 12px;">
                 
                
 
                 <td style="width:20%;" >Halo Pelanggan Yang Tampan...
Kontrak anda segera habis..segera lakukan perpanjangan ya

Terima Kasih


Tertampan </td>
                  <td style="width:3%;" align="center"> 
                                        No
                                      </td>
               
                <td style="width:3%;" align="center"> 
                 
               

                <a href="master_email_message.php?id=1&act=Update"   class="btn btn-xs btn-warning" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>

                <a href="master_email_message.php?id=1&act=Delete"  class="btn btn-xs btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a>          

               
                </td>

            
               
                  
                </tr>
                                <tr style="font-size: 12px;">
                 
                
 
                 <td style="width:20%;" >Halo Pelanggan Yth,
Bersama ini kami sampaikan bahwa kontrak anda akan segera berakhir dalam waktu kurang dari 90 hari (3 Bulan) dari sekarang

Segera selesaikan administrasi nya untuk perpanjangna kontrak anda.

Terima Kasih


PT.Wavecomindo </td>
                  <td style="width:3%;" align="center"> 
                                        Yes
                                      </td>
               
                <td style="width:3%;" align="center"> 
                 
               

                <a href="master_email_message.php?id=3&act=Update"   class="btn btn-xs btn-warning" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>

                <a href="master_email_message.php?id=3&act=Delete"  class="btn btn-xs btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a>          

               
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
        <p class="text-muted"> &copy; 2016 <a href='http://wavecomindo.co.id'>PT. Wavecomindo</a></p>
      </div>
    </footer>

    
     
  </body>
</html>






<?php }
}
?>