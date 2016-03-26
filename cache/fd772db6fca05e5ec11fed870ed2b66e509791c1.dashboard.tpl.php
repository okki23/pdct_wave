<?php
/*%%SmartyHeaderCode:500656f60c9297c7d4_88061522%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd772db6fca05e5ec11fed870ed2b66e509791c1' => 
    array (
      0 => './templates/dashboard.tpl',
      1 => 1458964943,
      2 => 'file',
    ),
    '0d67b0acdab9c4ef7b7786428c9051d03ca0e70f' => 
    array (
      0 => './templates/header.tpl',
      1 => 1458151396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '500656f60c9297c7d4_88061522',
  'tpl_function' => 
  array (
  ),
  'version' => '3.1.24',
  'unifunc' => 'content_56f619301292d4_91606701',
  'has_nocache_code' => false,
  'cache_lifetime' => 0,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56f619301292d4_91606701')) {
function content_56f619301292d4_91606701 ($_smarty_tpl) {
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

    // alert("oke");


      $(document).ready(function() {
          $('#example').DataTable();
      } );

      
    </script>

     
 <style>
  .glyphicon {
    font-size: 100px;
    }
  </style>

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
 
    <div class="row">
   
      <div style="margin-top:50px;">
      </div>
     
       
        <div class="col-lg-12">
        

        <div class="jumbotron">
        <h2>Selamat Datang Okki Setyawan !  <br>Kamu Berada Pada Level : Administrator !</h2>
        <p class="lead">Silahkan gunakan menu sesuai kebutuhan anda </p>
       
         </div>

      
          <div class="row placeholders">
            <h2> Master </h2>
            <hr>
            <div class="col-xs-6 col-sm-2" align="center">
                
            <a href="master_pdct.php"> <i class="glyphicon glyphicon-hdd"> </i>  </a>
 
             <h4>Master PDCT</h4>
             <span class="text-muted">Manage (Customer, Contract , Billing)</span>
            </div>

            <div class="col-xs-6 col-sm-2" align="center">
                
            <a href="master_cust_name.php"> <i class="glyphicon glyphicon-hdd"> </i>  </a>
 
              <h4>Master Customer Name</h4>
              <span class="text-muted">Manage (Customer Name Only)</span>
            </div>

                        <div class="col-xs-6 col-sm-2" align="center">
                
            <a href="master_contract_status.php"> <i class="glyphicon glyphicon-hdd"> </i>  </a>
 
              <h4>Master Contract Status</h4>
              <span class="text-muted">Manage (Contract Status Option Only)</span>
            </div>

            <div class="col-xs-6 col-sm-2" align="center">
                
            <a href="master_email_message.php"> <i class="glyphicon glyphicon-hdd"> </i>  </a>
 
              <h4>Master Email Message</h4>
              <span class="text-muted">Manage (Create/Edit Email Message)</span>
            </div>

             <div class="col-xs-6 col-sm-2" align="center">
                
            <a href="master_paid_status.php"> <i class="glyphicon glyphicon-hdd"> </i>  </a>
 
              <h4>Master Paid Status</h4>
              <span class="text-muted">Manage (Data Status Paid Billing)</span>
            </div>
            
                      

         </div>


          <div class="row placeholders">

            <h2> Reminder </h2>
            <hr>
            <div class="col-xs-6 col-sm-3" align="center">
                
            <a href="reminder.php"> <i class="glyphicon glyphicon-calendar"> </i>  </a>
 
              <h4>Reminder Kontrak PDCT</h4>
              <span class="text-muted">Reminder (Customer, Contract , Billing)</span>
            </div>
            
          </div>


         
                  <div class="row placeholders">

            <h2> Project </h2>
            <hr>

            <div class="col-xs-4 col-sm-2" align="center">
   
              <a href="matrik_administrasi.php"> <i class="glyphicon glyphicon-list-alt"> </i>  </a>
 
              <h4>Matrik Administrasi</h4>
              <span class="text-muted">Matrik Kelengkapan Adminstratisi PT Wave Communication Indonesia</span>
            </div>

              <div class="col-xs-4 col-sm-2" align="center">
   
              <a href="new_project_list.php"> <i class="glyphicon glyphicon-list-alt"> </i>  </a>
 
              <h4>New Project List</h4>
              <span class="text-muted">List Kontrak Baru PT Wave Communication Indonesia</span>
            </div>


           
             <div class="col-xs-4 col-sm-2" align="center">
   
              <a href="agging_project_status.php"> <i class="glyphicon glyphicon-list-alt"> </i>  </a>
 
              <h4>Agging Project Status</h4>
              <span class="text-muted">Agging Kontrak PT Wave Communication Indonesia</span>
             </div>
 

            <div class="col-xs-4 col-sm-2" align="center">
  
              <a href="project_status_list.php"> <i class="glyphicon glyphicon-list-alt"> </i>  </a>
 
              <h4>Project Status List</h4>
              <span class="text-muted">List Kontrak PT Wave Communication Indonesia</span>
            </div>
           

          
            <div class="col-xs-4 col-sm-2" align="center">
  
              <a href="billing_list.php"> <i class="glyphicon glyphicon-list-alt"> </i>  </a>
 
              <h4>Billing List</h4>
              <span class="text-muted">Billing List PT Wave Communication Indonesia</span>
            </div>

         

            <div class="col-xs-4 col-sm-2" align="center">
   
              <a href="extention_project_list.php"> <i class="glyphicon glyphicon-list-alt"> </i>  </a>
 
              <h4>Extention Project List</h4>
              <span class="text-muted">Extension Kontrak PT Wave Communication Indonesia</span>
            </div>


            <div class="col-xs-4 col-sm-2" align="center">
   
              <a href="csc_project.php"> <i class="glyphicon glyphicon-list-alt"> </i>  </a>
 
              <h4>CSC Project </h4>
              <span class="text-muted">CSC Project PT Wave Communication Indonesia</span>
            </div>
 
          </div>
         

         
        
 
     
                <div class="row placeholders">
            <h2> Report </h2>
            <hr>
            
            <div class="col-xs-6 col-sm-3" align="center">
       
            <a href="proforma_invoice.php" style="text-align:center;"> <i class="  glyphicon glyphicon-file"> </i>  </a>
 
              <h4>Proforma Invoice</h4>
              <span class="text-muted">Cetak Proforma Invoice</span>
            </div>

            <div class="col-xs-6 col-sm-3" align="center">
       
            <a href="resume_proforma_invoice.php" style="text-align:center;"> <i class="  glyphicon glyphicon-file"> </i>  </a>
 
              <h4>Resume Proforma Invoice</h4>
              <span class="text-muted">Cetak Resume Proforma Invoice</span>
            </div>

          </div>
            
       
 
         



                    <div class="row placeholders">
            <h2> Extra </h2>
            <hr>
            
            <div class="col-xs-6 col-sm-3" align="center">
       
            <a href="m_user.php" style="text-align:center;"> <i class="  glyphicon glyphicon-user"> </i>  </a>
 
              <h4>Manajemen User</h4>
              <span class="text-muted">Manage data user beserta hak akses <b>(Administrator Only) <b></span>
            </div>


            <div class="col-xs-6 col-sm-3" align="center">
       
            <a href="file_management.php" style="text-align:center;" target="_blank"> <i class="  glyphicon glyphicon-search" > </i>  </a>
 
              <h4>File Management</h4>
              <span class="text-muted">Lihat Berkas / Dokumen Kontrak Yang Berada Didalam Sistem <b>(Administrator Only) <b></span>
            </div>

             

          </div>

          


           
          
         
       
   </div>
   </div>
   </div>


    </div> <!--container -->

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