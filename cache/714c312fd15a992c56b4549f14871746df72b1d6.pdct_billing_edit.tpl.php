<?php
/*%%SmartyHeaderCode:2405356f0d10c4fda81_96311611%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '714c312fd15a992c56b4549f14871746df72b1d6' => 
    array (
      0 => './templates/pdct_billing_edit.tpl',
      1 => 1458622579,
      2 => 'file',
    ),
    '0d67b0acdab9c4ef7b7786428c9051d03ca0e70f' => 
    array (
      0 => './templates/header.tpl',
      1 => 1458151396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2405356f0d10c4fda81_96311611',
  'tpl_function' => 
  array (
  ),
  'version' => '3.1.24',
  'unifunc' => 'content_56f0de2f379c48_40981364',
  'has_nocache_code' => false,
  'cache_lifetime' => 0,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56f0de2f379c48_40981364')) {
function content_56f0de2f379c48_40981364 ($_smarty_tpl) {
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
      $(document).ready(function() {
          $('#example').DataTable();
      } );
 
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
    $('#bill_amount').mask('000.000.000.000.000', {reverse: true});
    $('#paid_amount').mask('000.000.000.000.000', {reverse: true});
    $('#csc').mask('000.000.000.000.000', {reverse: true});
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

    
    <div class="row">
    <div class="col-md-12">

     <div style="margin-top:70px;">
     </div>

      <div class="alert alert-info"> <h3 align="center">Ubah Data PDCT Billing </h3></div>
      <button onclick="history.go(-1);" class="btn btn-primary"> <i class="glyphicon glyphicon-arrow-left"> </i> Back </button>

     <form action="master_pdct.php?act=DetailBillingProUpdate" method="POST" enctype="multipart/form-data" name="myForm">
     <input type="hidden" name="id" value="145">
     <input type="hidden" name="idcust" value="12">
     <input type="hidden" name="idcontract" value="40">
    
    
     
     <br>
     <br>
     <div class="panel panel-primary">
    <div class="panel-heading">Contract</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-6 small">
         
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> End User </label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="end_user" value="Periode 1" required>
              </div>
              
            </div>

            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Billing Periode</label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="bill_periode" value="201601" required>
                  <span style="color:red;"> Ex:201601</span>
              </div>
              
            </div>

            <br>
            <br>
 
            <fieldset>
            <legend>Upload Files</legend>
               <div class="form-group">
            <p class="alert alert-danger"> <b>Hanya File : PDF, JPG, JPEG  </b></p>
            </div>
             
            <div class="form-group">

              <label  class="col-sm-3 form-control-static"> FP No. </label>

              <div class="col-sm-9">
                <input type="file" class="form-control input-sm" name="fp_no">
             

              </div>
        
            </div>
            <br>
            <div class="col-sm-9" style="margin-left:150px; padding:5px 0px 10px 0px;">
             
                <div class="col-sm-11">
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Informasi File
                  </div>
                  <div class="panel-body">

                       <a href="doc_uploads/spk/<br />
<b>Notice</b>:  Undefined index: no_spk_p8_file in <b>C:\xampp\htdocs\pdct\templates_c\714c312fd15a992c56b4549f14871746df72b1d6_0.file.pdct_billing_edit.tpl.cache.php</b> on line <b>343</b><br />
<br />
<b>Notice</b>:  Trying to get property of non-object in <b>C:\xampp\htdocs\pdct\templates_c\714c312fd15a992c56b4549f14871746df72b1d6_0.file.pdct_billing_edit.tpl.cache.php</b> on line <b>343</b><br />
" target="_blank" class="btn btn-primary"> <i class="glyphicon glyphicon-file"> </i> fp2.pdf </a>
                       <br>
                       <label> Date Upload : 2016-03-22 11:23:44</label> <br>
                       <label> Date Update : </label>
                       <br>
                       <br>
                        
                         <a href="master_pdct.php?act=UnlinkFileFPNO&id=145&idcust=12&idcontract=40" class="btn btn-xs btn-danger"> [X] Hapus File </a>
                       

                  </div>
                </div>
              </div>
            
                        </div>
            
           
            </fieldset>

            <br>
            <br>


            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Bill Amount</label>

              <div class="col-sm-9">
                                 <input type="text" class="form-control input-sm" name="bill_amount" value="1000000" id="bill_amount">
                               
                
              </div>
              
            </div>


            <br>
            <br>

               <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Charges</label>

              <div class="col-sm-9">
                                 <select name="charges" class="form-control">
                  <option value="" selected="selected">--Pilih</option>
                                    <option value="1" > One Time Charge </option>
                                    <option value="2" selected=selected> Monthly </option>
                                    <option value="3" > Recurring </option>
                                    <option value="4" > DP </option>
                                    <option value="5" > Retention </option>
                                    <option value="6" > Balance </option>
                                  </select> 
                               


               
              </div>
              
            </div>

            <br>
            <br>

            
          
          
        </div>
        <!--col-md-6-->
        <div class= "col-md-6 small">
        <hr>
         <div class="form-group">
              <label  class="col-sm-3 form-control-static" style="color: red;"> Paid Status</label>

              <div class="col-sm-9">
                              <select name="paid_status" style="border-color: red;" class="form-control">
                      <option value=""> --Pilih-- </option>
                      <option value="Y"  selected="selected" > Yes </option>
                      <option value="N"  > No </option>
                      <option value="I"   > Invoicing </option>
                      <option value="E"  > End Of Service </option> 
                  </select>
                                   
              


                 
              </div>
              
            </div>

            <br>
            <br>
            <hr>
            <br>
           
         
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Paid Amount</label>

              <div class="col-sm-9">
                                 <input type="text" class="form-control input-sm" name="paid_amount" value="1000000" id="paid_amount">
                 
              </div>
              
            </div>

            <br>
            <br>

           
                         <div class="form-group">
              <label  class="col-sm-3 form-control-static"> CSC</label>

              <div class="col-sm-9">
                               <input type="text" class="form-control input-sm" name="csc" value="1000000" id="csc">
                            
              </div>
              
            </div>

            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> CSC Status</label>

              <div class="col-sm-9">
              
               
                                    <select name="csc_status" class="form-control">
                                         <option value=""> --Pilih-- </option>
                    <option value="Y" selected="selected"> Yes </option>
                    <option value="N" > No </option>
                                       </select>

                
                 
              </div>
              
            </div>

            <br>
            <br>

            

           

             
            
        </div><!--col-md-6--> 
      </div><!--row-->
    </div><!--panel-body--> 
  </div><!--panel panel-default--> 

  <!------------------------------------------------------------dua------------------------------------------------------------>
   
  <!------------------------------------------------------------satu------------------------------------------------------------>
 
  
  
 <button type="submit" name="simpan" class="btn btn-primary btn-block"> <i class="glyphicon glyphicon-floppy-disk"> </i>  Simpan Data </button>

   </div>
   </div>
  

   

</form>
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