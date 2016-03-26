<?php
/*%%SmartyHeaderCode:3083056e79e2bf339b6_56330312%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '877419e0744352e65d065f480729cca848603bee' => 
    array (
      0 => './templates/proforma_invoice.tpl',
      1 => 1458019882,
      2 => 'file',
    ),
    '0d67b0acdab9c4ef7b7786428c9051d03ca0e70f' => 
    array (
      0 => './templates/header.tpl',
      1 => 1458151396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3083056e79e2bf339b6_56330312',
  'tpl_function' => 
  array (
  ),
  'version' => '3.1.24',
  'unifunc' => 'content_56ea63b2669221_62865123',
  'has_nocache_code' => false,
  'cache_lifetime' => 0,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56ea63b2669221_62865123')) {
function content_56ea63b2669221_62865123 ($_smarty_tpl) {
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

     
 
     
    

      <script type="text/javascript">
      alert('1');
        $("#acc_manager").change(function (){
       var id = $(this).val();
       $.ajax({
         url : "getphonemail.php",
         type : "post",
         dataType : "json",
         data : {id:id},
         success: function(data,status){
          $.each(data, function(i,item){
            $("#bobot").val(item.bobot);
            $("#target").val(item.target);
            $("#satuan").val(item.satuan);
             
           
          });
         },
         error: function(e){
           alert('fail');
         }
      </script>
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
        <h2>Proforma Invoice PT Wave Communication Indonesia</h2>
        </div>

        </div>



 

    <form action="" method="POST" enctype="multipart/form-data">
    
    <table class="table table-stripped table-hover">
      <tr>  
        <td colspan="6"> <b> TO </b> </td>
      </tr>
       <tr>  
        <td> <b> Customer Name </b> </td>
        <td> : </td>
        <td>  
            <select name="id_customer_name" class="form-control" required> 
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
        <td> <b> CC Name </b> </td>
        <td> : </td>
        <td>  
            <select name="cc_name" class="form-control" required> 
            <option value="" selected="selected">--Pilih--</option>
                                            <option value="Bekasi Selatan" > Bekasi Selatan </option>
                                            <option value="Bruno" > Bruno </option>
                                            <option value="Iwan" > Iwan </option>
                                            <option value="Mahmud" > Mahmud </option>
                                            <option value="Ramon" > Ramon </option>
                                            <option value="Wawan" > Wawan </option>
                                  </select> 
        </td>
       </tr>
       <tr>  
        <td> <b> Account Manager </b> </td>
        <td> : </td>
        <td> 
            <select name="account_manager" id="acc_manager" class="form-control" required> 
            <option value="" selected="selected">--Pilih--</option>
                                            <option value="Bruno" > Bruno </option>
                                            <option value="Iwan Banaran" > Iwan Banaran </option>
                                            <option value="Mahmud MD" > Mahmud MD </option>
                                            <option value="Marwoto" > Marwoto </option>
                                            <option value="Sigit" > Sigit </option>
                                  </select> 
        </td>
        <td> <b> Project No </b> </td>
        <td> : </td>
        <td>  
            <select name="project_no" class="form-control" required> 
            <option value="" selected="selected">--Pilih--</option>
                                            <option value="PR001" > PR001 </option>
                                            <option value="PR0014" > PR0014 </option>
                                            <option value="PR002" > PR002 </option>
                                            <option value="PR0076" > PR0076 </option>
                                            <option value="PR0093" > PR0093 </option>
                                            <option value="PR098" > PR098 </option>
                                  </select> 
        </td>
       </tr>
        <tr>  
        
        <td> <b> Periode Until </b> </td>
        <td> : </td>
        <td> 
            <select name="periode_until" class="form-control" required> 
            <option value="" selected="selected">--Pilih--</option>
                                            <option value="201601" > 201601 </option>
                                            <option value="201602" > 201602 </option>
                                            <option value="201603" > 201603 </option>
                                            <option value="201604" > 201604 </option>
                                            <option value="201701" > 201701 </option>
                                            <option value="201702" > 201702 </option>
                                            <option value="201703" > 201703 </option>
                                            <option value="201704" > 201704 </option>
                                  </select> 
        </td>
       </tr>

    </table>


    
  
     <input type="submit" name="caridata" class="btn btn-primary btn-block" value="Cari Data">  
    
     </form>
     <br>

     <div class="alert alert-info" align="center">  <b>Data Tersedia Sebanyak 7 Data </b> </div>

        <table class="table table-stripped table-hover">
        <tr>  
            <td colspan="6"> <b> TO </b> </td>
        </tr>
        <tr>  
            <td> <b> Customer Name </b> </td>
            <td> : </td>
            <td> PT.SGU Bersama </td>
            <td> <b> CC Name </b> </td>
            <td> : </td>
            <td> Bruno</td>
        </tr>

        <tr>  
            <td> <b> Account Manager </b> </td>
            <td> : </td>
            <td> Bruno </td>
            <td> <b> Project No </b> </td>
            <td> : </td>
            <td> PR0093 </td>
        </tr>
        
        <tr>  
            <td> <b> Phone / Email </b> </td>
            <td> : </td>
            <td> 089610595064 / okkisetyawan@gmail.com</td>
            <td> <b> Periode Until </b> </td>
            <td> : </td>
            <td> 201601</td>
        </tr>

    </table>
     <br>
     <br> 
 

     <form name="print" method="POST" action="print_proforma_invoice_pdf.php" target="_blank" enctype="multipart/form-data"> 
     <input type="hidden" name="id_customer_name" value="12">
     <input type="hidden" name="cc_name" value="Bruno">
     <input type="hidden" name="project_no" value="PR0093">
     <input type="hidden" name="account_manager" value="Bruno">
     <input type="hidden" name="periode_until" value="201601">

      <button type="submit" name="print" class="btn btn-primary">
 						<i class="glyphicon glyphicon-print"> </i> Print Proforma Invoice </button>
     </form>
     <br>

     <table class="table table-stripped table-hover" >
        <tr>
        <td> <b>Contract Number</b> </td>
        <td> <b>Site Name</b>  </td>
        <td> <b>Account No</b>  </td>
        <td> <b>Periode</b>  </td>
        <td> <b>Bill Amount</b>  </td>
        <td> <b>Charges Amount</b>  </td>
        </tr>
         
                <tr>
        <td> cnuhp - Copy - Copy.pdf  </td>
        <td> Galaxy </td>
        <td> ACC01 </td>
        <td> 201601 </td>
        <td> IDR  2.000.000 </td>
        <td> One Time Charge </td>
        </tr>
                <tr>
        <td> cnuhp - Copy - Copy.pdf  </td>
        <td> Galaxy </td>
        <td> ACC01 </td>
        <td> 201601 </td>
        <td> IDR  2.000.000 </td>
        <td> Monthly </td>
        </tr>
                <tr>
        <td> cnuhp - Copy.pdf  </td>
        <td> Galaxy </td>
        <td> ACC01 </td>
        <td> 201601 </td>
        <td> IDR  2.000.000 </td>
        <td> One Time Charge </td>
        </tr>
                <tr>
        <td> cnuhp - Copy.pdf  </td>
        <td> Galaxy </td>
        <td> ACC01 </td>
        <td> 201601 </td>
        <td> IDR  2.000.000 </td>
        <td> Monthly </td>
        </tr>
                <tr>
        <td> cnuhp - Copy - Copy.pdf  </td>
        <td> Galaxy </td>
        <td> ACC01 </td>
        <td> 201601 </td>
        <td> IDR  5.000.000 </td>
        <td> Monthly </td>
        </tr>
                <tr>
        <td> cnuhp - Copy - Copy.pdf  </td>
        <td> Galaxy </td>
        <td> ACC01 </td>
        <td> 201601 </td>
        <td> IDR  5.000.000 </td>
        <td> Monthly </td>
        </tr>
                <tr>
        <td> cnuhp - Copy - Copy.pdf  </td>
        <td> Galaxy </td>
        <td> ACC01 </td>
        <td> 201601 </td>
        <td> IDR  5.000.000 </td>
        <td> Monthly </td>
        </tr>
               

         <tr>
          <td colspan="4"> <b>TOTAL IDR </b> </td>
          <td colspan="2"> <b>IDR 23,000,000 </b></td>
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