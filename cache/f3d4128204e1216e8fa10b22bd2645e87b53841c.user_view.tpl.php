<?php
/*%%SmartyHeaderCode:2629956a5a262f41525_15004196%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3d4128204e1216e8fa10b22bd2645e87b53841c' => 
    array (
      0 => './templates/user_view.tpl',
      1 => 1453695531,
      2 => 'file',
    ),
    '6216f7fad91baf0175c25de47934f52f0d1f2a6e' => 
    array (
      0 => './templates/header.tpl',
      1 => 1453780146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2629956a5a262f41525_15004196',
  'tpl_function' => 
  array (
  ),
  'version' => '3.1.24',
  'unifunc' => 'content_56a96d06988773_44961594',
  'has_nocache_code' => false,
  'cache_lifetime' => 0,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56a96d06988773_44961594')) {
function content_56a96d06988773_44961594 ($_smarty_tpl) {
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
        <h2>Manajemen User</h2>
        </div>

        </div>
        
        <a href="?act=Add" class="btn btn-primary"> + Tambah Data</a>
        <br>
        &nbsp;
           <table id="example" class="table table-striped table-bordered table-hover" style="width:100%;">
              <thead style="background-color:#FFF;">
                <tr>
                  
                  <th style="width:10%;" align="center">Nama User</th>
                  <th style="width:10%;" align="center">Username</th>
                  <th style="width:10%;" align="center">Level</th>
                  <th style="width:5%;" align="center">Branch</th>
                   
                  <th style="width:8%;" align="center">Opsi</th>
                  
     
                </tr>
                </thead>
                
                <tbody>
                                <tr>
                
               <td style="width:10%;">nendi  </td>
                <td style="width:10%;"> nendi </td>
                <td style="width:10%;"> Super Administrator </td>
                <td style="width:5%;"> jakarta </td>
                  
                <td style="width:8%;"> 
                <a href="m_user.php?id=1&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="m_user.php?id=1&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
           
                 
                </td>

                
                  
                </tr>
                                <tr>
                
               <td style="width:10%;">Sukirman  </td>
                <td style="width:10%;"> kirman </td>
                <td style="width:10%;"> Direktur </td>
                <td style="width:5%;"> Jakarta </td>
                  
                <td style="width:8%;"> 
                <a href="m_user.php?id=3&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="m_user.php?id=3&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
           
                 
                </td>

                
                  
                </tr>
                                <tr>
                
               <td style="width:10%;">Hendrikus Moton Krowin  </td>
                <td style="width:10%;"> hendra </td>
                <td style="width:10%;"> Direktur </td>
                <td style="width:5%;"> Jakarta </td>
                  
                <td style="width:8%;"> 
                <a href="m_user.php?id=5&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="m_user.php?id=5&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
           
                 
                </td>

                
                  
                </tr>
                                <tr>
                
               <td style="width:10%;">Legal  </td>
                <td style="width:10%;"> legal </td>
                <td style="width:10%;"> Pegawai </td>
                <td style="width:5%;">  </td>
                  
                <td style="width:8%;"> 
                <a href="m_user.php?id=6&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="m_user.php?id=6&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
           
                 
                </td>

                
                  
                </tr>
                                <tr>
                
               <td style="width:10%;">M. Maulana Stiawan  </td>
                <td style="width:10%;"> m.maulana </td>
                <td style="width:10%;"> Administrator </td>
                <td style="width:5%;"> Jakarta </td>
                  
                <td style="width:8%;"> 
                <a href="m_user.php?id=7&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="m_user.php?id=7&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
           
                 
                </td>

                
                  
                </tr>
                                <tr>
                
               <td style="width:10%;">Maulana Havizun Hasibuan  </td>
                <td style="width:10%;"> Maulana  </td>
                <td style="width:10%;"> Administrator </td>
                <td style="width:5%;"> Medan </td>
                  
                <td style="width:8%;"> 
                <a href="m_user.php?id=9&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="m_user.php?id=9&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
           
                 
                </td>

                
                  
                </tr>
                                <tr>
                
               <td style="width:10%;">Angga Kurniawan  </td>
                <td style="width:10%;"> angga </td>
                <td style="width:10%;"> Administrator </td>
                <td style="width:5%;"> Medan </td>
                  
                <td style="width:8%;"> 
                <a href="m_user.php?id=10&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="m_user.php?id=10&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
           
                 
                </td>

                
                  
                </tr>
                                <tr>
                
               <td style="width:10%;">Harry Kurniawan  </td>
                <td style="width:10%;"> harry </td>
                <td style="width:10%;"> Administrator </td>
                <td style="width:5%;"> Medan </td>
                  
                <td style="width:8%;"> 
                <a href="m_user.php?id=11&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="m_user.php?id=11&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
           
                 
                </td>

                
                  
                </tr>
                                <tr>
                
               <td style="width:10%;">Muhammad Fajar Arif  </td>
                <td style="width:10%;"> fajar </td>
                <td style="width:10%;"> Administrator </td>
                <td style="width:5%;"> Pekanbaru </td>
                  
                <td style="width:8%;"> 
                <a href="m_user.php?id=12&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="m_user.php?id=12&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
           
                 
                </td>

                
                  
                </tr>
                                <tr>
                
               <td style="width:10%;">HUSNI MUBARAK  </td>
                <td style="width:10%;"> husni </td>
                <td style="width:10%;"> Administrator </td>
                <td style="width:5%;"> JAMBI </td>
                  
                <td style="width:8%;"> 
                <a href="m_user.php?id=13&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="m_user.php?id=13&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
           
                 
                </td>

                
                  
                </tr>
                                <tr>
                
               <td style="width:10%;">Andi Rachman Anwar  </td>
                <td style="width:10%;"> andi </td>
                <td style="width:10%;"> Administrator </td>
                <td style="width:5%;"> Balikpapan </td>
                  
                <td style="width:8%;"> 
                <a href="m_user.php?id=14&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="m_user.php?id=14&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
           
                 
                </td>

                
                  
                </tr>
                                <tr>
                
               <td style="width:10%;">Ardiyanto  </td>
                <td style="width:10%;"> ardi </td>
                <td style="width:10%;"> Administrator </td>
                <td style="width:5%;">  prabumulih - palembang (sum- sel) </td>
                  
                <td style="width:8%;"> 
                <a href="m_user.php?id=17&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="m_user.php?id=17&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
           
                 
                </td>

                
                  
                </tr>
                                <tr>
                
               <td style="width:10%;">Hasrul  </td>
                <td style="width:10%;"> hasrul </td>
                <td style="width:10%;"> Administrator </td>
                <td style="width:5%;">  </td>
                  
                <td style="width:8%;"> 
                <a href="m_user.php?id=18&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="m_user.php?id=18&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
           
                 
                </td>

                
                  
                </tr>
                                <tr>
                
               <td style="width:10%;">Kurnia Pujiastuti  </td>
                <td style="width:10%;"> kurnia </td>
                <td style="width:10%;"> Super Administrator </td>
                <td style="width:5%;"> Jakarta </td>
                  
                <td style="width:8%;"> 
                <a href="m_user.php?id=20&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="m_user.php?id=20&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
           
                 
                </td>

                
                  
                </tr>
                                <tr>
                
               <td style="width:10%;">Agung Bekti Wibowo  </td>
                <td style="width:10%;"> agung </td>
                <td style="width:10%;"> Administrator </td>
                <td style="width:5%;"> Jakarta </td>
                  
                <td style="width:8%;"> 
                <a href="m_user.php?id=22&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="m_user.php?id=22&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
           
                 
                </td>

                
                  
                </tr>
                                <tr>
                
               <td style="width:10%;">Fatihin  </td>
                <td style="width:10%;"> fatih </td>
                <td style="width:10%;"> Administrator </td>
                <td style="width:5%;"> Jakarta </td>
                  
                <td style="width:8%;"> 
                <a href="m_user.php?id=24&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="m_user.php?id=24&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
           
                 
                </td>

                
                  
                </tr>
                                <tr>
                
               <td style="width:10%;">Imam Muftadi  </td>
                <td style="width:10%;"> imam.m </td>
                <td style="width:10%;"> Super Administrator </td>
                <td style="width:5%;"> Jakarta </td>
                  
                <td style="width:8%;"> 
                <a href="m_user.php?id=28&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="m_user.php?id=28&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
           
                 
                </td>

                
                  
                </tr>
                                <tr>
                
               <td style="width:10%;">Doni Pirmansa  </td>
                <td style="width:10%;"> doni </td>
                <td style="width:10%;"> Administrator </td>
                <td style="width:5%;"> Palembang - Sumsel </td>
                  
                <td style="width:8%;"> 
                <a href="m_user.php?id=29&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="m_user.php?id=29&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
           
                 
                </td>

                
                  
                </tr>
                                <tr>
                
               <td style="width:10%;">Rudy Kurniawan  </td>
                <td style="width:10%;"> roedyx </td>
                <td style="width:10%;"> Administrator </td>
                <td style="width:5%;"> Branch Office Medan </td>
                  
                <td style="width:8%;"> 
                <a href="m_user.php?id=30&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="m_user.php?id=30&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
           
                 
                </td>

                
                  
                </tr>
                                <tr>
                
               <td style="width:10%;">Prawijaya  </td>
                <td style="width:10%;"> wci_prawi </td>
                <td style="width:10%;"> Super Administrator </td>
                <td style="width:5%;">  </td>
                  
                <td style="width:8%;"> 
                <a href="m_user.php?id=31&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="m_user.php?id=31&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
           
                 
                </td>

                
                  
                </tr>
                                <tr>
                
               <td style="width:10%;">Ari Sucita  </td>
                <td style="width:10%;"> ariesucita </td>
                <td style="width:10%;"> Administrator </td>
                <td style="width:5%;"> Jakarta </td>
                  
                <td style="width:8%;"> 
                <a href="m_user.php?id=32&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="m_user.php?id=32&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
           
                 
                </td>

                
                  
                </tr>
                                <tr>
                
               <td style="width:10%;">Yayan  </td>
                <td style="width:10%;"> yayan </td>
                <td style="width:10%;"> Super Administrator </td>
                <td style="width:5%;">  </td>
                  
                <td style="width:8%;"> 
                <a href="m_user.php?id=33&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="m_user.php?id=33&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
           
                 
                </td>

                
                  
                </tr>
                                <tr>
                
               <td style="width:10%;">xx  </td>
                <td style="width:10%;"> xxxx </td>
                <td style="width:10%;"> Direktur </td>
                <td style="width:5%;">  </td>
                  
                <td style="width:8%;"> 
                <a href="m_user.php?id=40&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="m_user.php?id=40&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
           
                 
                </td>

                
                  
                </tr>
                                <tr>
                
               <td style="width:10%;">Okki Setyawan S.Kom  </td>
                <td style="width:10%;"> okki </td>
                <td style="width:10%;"> Administrator </td>
                <td style="width:5%;"> Jakarta Timur </td>
                  
                <td style="width:8%;"> 
                <a href="m_user.php?id=41&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="m_user.php?id=41&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
           
                 
                </td>

                
                  
                </tr>
                                <tr>
                
               <td style="width:10%;">Fahmi Bo  </td>
                <td style="width:10%;"> fahmi </td>
                <td style="width:10%;"> Pegawai </td>
                <td style="width:5%;"> Jakarta Timur </td>
                  
                <td style="width:8%;"> 
                <a href="m_user.php?id=44&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="m_user.php?id=44&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
           
                 
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