<?php
/*%%SmartyHeaderCode:54656e7bd7e19b397_81128660%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d39ed28a230573d9719700904ee92c8e355047a' => 
    array (
      0 => './templates/matrik_administrasi.tpl',
      1 => 1458027900,
      2 => 'file',
    ),
    '0d67b0acdab9c4ef7b7786428c9051d03ca0e70f' => 
    array (
      0 => './templates/header.tpl',
      1 => 1455203965,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54656e7bd7e19b397_81128660',
  'tpl_function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'contract_status' => 0,
    'customer_name_opt' => 0,
    'info' => 0,
    'contractstatus' => 0,
    'namacustomer' => 0,
    'start_date' => 0,
    'ending_date' => 0,
    'id_customer_name' => 0,
    'id_contract_status' => 0,
    'start_date_send' => 0,
    'ending_date_send' => 0,
    'btnprint' => 0,
    'list' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56e7bd7e307154_70497507',
  'cache_lifetime' => 0,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56e7bd7e307154_70497507')) {
function content_56e7bd7e307154_70497507 ($_smarty_tpl) {
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
     <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/css_datepicker.css">
     <link rel="stylesheet" type="text/css" href="assets/dataTables.bootstrap.min.css">
      
     <script src="assets/jquery-1.10.2.js"> </script>
     <script src="bootstrap/dist/js/bootstrap.min.js"> </script>
     <script src="assets/jquery.dataTables.min.js"> </script>
     <script src="assets/dataTables.bootstrap.min.js"> </script>
     <script src="js/jQuery-Mask-Plugin_js_jquery.mask.min.js"> </script>
     <script src="js/bootstrap-datepicker.js"> </script>

     
 
     
    

    <script language='JavaScript'>
    var input_pronumb = $("#input_pronumb").val();
    var idprono = $("#idprono").val();

    if(input_pronumb == ''){
      idprono.value = '';
    }

    if(input_cust_name == ''){
      idcust.value = '';
    }
    
    </script>

    

<script>
  if (top.location != location) {
    top.location.href = document.location.href ;
  }
    $(function(){
      window.prettyPrint && prettyPrint();
      $('#dp1').datepicker({
         
        format: 'dd-mm-yyyy'
      });

       $('#dp2').datepicker({
        
        format: 'dd-mm-yyyy'
      });
       
    
    });
  </script>



    <script language='JavaScript'>
    var ajaxRequest;
    function getAjax() //fungsi untuk mengecek AJAX pada browsergv
    {
      try
      {
        ajaxRequest = new XMLHttpRequest();
      }
      catch (e)
      {
        try
        {
          ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) 
        {
          try
          {
            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
          }
          catch (e)
          {
            alert("Your browser broke!");
            return false;
          }
        }
      }
    }

    function autoComplete() //fungsi menangkap input search dan menampilkan hasil search
    {
      getAjax();
      input_pronumb = document.getElementById('input_pronumb').value;
      
      if (input_pronumb == "")
      {
        document.getElementById("hasil").innerHTML = "";
        document.getElementById("idprono").value = "";
      }
      else
      {
        ajaxRequest.open("GET","autosuggest.php?input_pronumb="+input_pronumb);
        ajaxRequest.onreadystatechange = function()
        {
        document.getElementById("hasil").innerHTML = ajaxRequest.responseText;
        }
        ajaxRequest.send(null);
      }
    } 

     function autoCompletea() //fungsi menangkap input search dan menampilkan hasil search
    {
      getAjax();
      input_cust_name = document.getElementById('input_cust_name').value;
      
      if (input_cust_name == "")
      {
        document.getElementById("hasilcust").innerHTML = "";
        document.getElementById("idcust").value = "";
      }
      else
      {
        ajaxRequest.open("GET","autosuggest.php?input_cust_name="+input_cust_name);
        ajaxRequest.onreadystatechange = function()
        {
        document.getElementById("hasilcust").innerHTML = ajaxRequest.responseText;
        }
        ajaxRequest.send(null);
      }
    } 
  

 
function autoInsert(no_project,nama_site1) //fungsi mengisi input text dengan hasil pencarian yang dipilih
{
  document.getElementById("input_pronumb").value = no_project;
  document.myForm.idprono.value = no_project;
  document.getElementById("hasil").innerHTML = "";
}

 
function autoInserta(id,nama_customer) //fungsi mengisi input text dengan hasil pencarian yang dipilih
{
  document.getElementById("input_cust_name").value = nama_customer;
  document.myForm.idcust.value = nama_customer;
  document.getElementById("hasilcust").innerHTML = "";
}

 
 
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#otc').mask('000.000.000.000.000', {reverse: true});
    $('#bill').mask('000.000.000.000.000', {reverse: true});
    $('#monthly').mask('000.000.000.000.000', {reverse: true});
  });
  
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
    <div style="margin-top:50px;">
    </div>
       
        <div class="jumbotron">
        <div align="right">
        <img src="images/logo.gif">
        <h2>Matrik Administrasi PT Wave Communication Indonesia</h2>
        </div>

        </div>



 

    <form action="" method="POST" enctype="multipart/form-data">
     <table class="table table-stripped table-hover">
      <tr>
        <td>  Contract Status  </td>
        <td>  : </td>
        <td colspan="3">  
         <select name="id_contract_status" class="form-control" > 
         <option value="" selected="selected">--Pilih--</option>
                                    <option value="1" > 
                  Administration </option>
                                    <option value="2" > 
                  On Service </option>
                                    <option value="3" > 
                  End Of Service </option>
                                    <option value="4" > 
                  Other </option>
                                    <option value="5" > 
                  Close Project </option>
                           </select> 

         </td>
      </tr>

      <tr>
        <td>  Customer Name  </td>
        <td>  : </td>
        <td colspan="3">  
        <select name="id_customer_name" class="form-control"> 
        <option value="" selected="selected">--Pilih--</option>
                                    <option value="1" > PT.TELKOM INDONESIA </option>
                                    <option value="2" > PT.SISINDOKOM </option>
                                    <option value="3" > PT.LINTAS ARTA </option>
                                    <option value="4" > PT.FIRST MEDIA </option>
                                    <option value="5" > PT.INDOSAT </option>
                                    <option value="6" > PT.LANGIT ANGKASA PURA </option>
                                    <option value="7" > PT.MEDIA NUSANTARA CITRA </option>
                                    <option value="8" > PT.EXCELECOMINDO </option>
                                    <option value="10" > PT.TRI INDONESIA </option>
                                    <option value="11" > PT.Lenovo Tbk </option>
                                    <option value="12" > PT.SGU Bersama </option>
                          </select> 
        </td>
      </tr>

     <tr>
        <td>  Month  </td>
        <td>  : </td>
        <td> <input type="text" name="start_date" id="dp1" class="form-control"> </td>
        <td align="center">  To </td>
        <td> <input type="text" name="ending_date" id="dp2" class="form-control"> </td>
      </tr>

     </table>
  
     <input type="submit" name="caridata" class="btn btn-primary btn-block" value="Cari Data">  
     <br>
    

     </form>
     
     <br>
      

     <table class="table table-stripped table-hover" >
      <tr>  
          <td> <b>Contract Status </b> </td>
          <td> : </td>
          <td colspan="3">  </td>
      </tr>
       <tr>  
          <td> <b>Customer Name </b> </td>
          <td> : </td>
          <td colspan="3">  </td>
      </tr>
       <tr>  
          <td> <b>Month </b> </td>
          <td> : </td>
          <td>    </td>
          <td><b>To</b></td>
          <td>    </td>
      </tr>
       
      </table>

    <!-- http://localhost:8081/pdct/print_matrik_administrasi.php-->
           
  <form name="print" method="POST" action="print_matrik_administrasi.php" target="_blank" enctype="multipart/form-data"> 
     <input type="hidden" name="id_customer_name" value="">
     <input type="hidden" name="id_contract_status" value="">
     <input type="hidden" name="start_date_send" value="">
     <input type="hidden" name="ending_date_send" value="">
     

    
   
</form>
     <br>

     <table class="table table-stripped table-hover table-bordered" >
        <tr align="center" style="font-size: 12px;">
        <td> <b>Contract Number </b> </td>
        <td> <b>Nama Pekerjaan </b>  </td>
        <td> <b>CC Name </b> </td>
        <td> <b>Jangka Waktu </b> </td>
        <td> <b>Date Input SPK/P8 Waktu </b> </td>
        <td> <b>Date Input Contract Date </b> </td>
        <td> <b>Date Input BASO </b> </td>
        <td> <b>Date Input BAST </b> </td>
        <td> <b>PIC </b> </td>
        <td> <b>CID/SID </b> </td>
       
        </tr>

                <tr style="font-size: 11px;">
        <td> 

                 <div class="btn btn-xs btn-danger"> File Tidak Ada / Belum Diupload</div>
                 </td>
        <td>   </td>
        <td align="center">   </td>
        <td align="center">  s/d    </td>
        <td align="center">   </td>
        <td align="center">   </td>
        <td align="center">   </td>
        <td align="center">   </td>
        <td align="center">  -   -     </td>
        <td align="center">   -    </td>
        </tr>
        
        
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