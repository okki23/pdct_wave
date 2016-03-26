<?php
/*%%SmartyHeaderCode:2269656a8ed15ee9a30_49393591%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15ec2cb82616703a2563d91fa2b51d1ecf543809' => 
    array (
      0 => './templates/pdct_contract_detail_edit.tpl',
      1 => 1453911317,
      2 => 'file',
    ),
    '6216f7fad91baf0175c25de47934f52f0d1f2a6e' => 
    array (
      0 => './templates/header.tpl',
      1 => 1453780146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2269656a8ed15ee9a30_49393591',
  'tpl_function' => 
  array (
  ),
  'version' => '3.1.24',
  'unifunc' => 'content_56a9681466b508_01347385',
  'has_nocache_code' => false,
  'cache_lifetime' => 0,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56a9681466b508_01347385')) {
function content_56a9681466b508_01347385 ($_smarty_tpl) {
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

    
    <div class="row">
    <div class="col-md-12">

     <div style="margin-top:70px;">
     </div>
 

    
    <div class="alert alert-info"> <h3 align="center">Update Data PDCT Contract  </h3></div>
   
 <button class="btn btn-primary" onclick="history.go(-1);"> <i class="glyphicon glyphicon-arrow-left"> </i> Kembali </button>
    <br>
    <br>
  <!------------------------------------------------------------satu------------------------------------------------------------>
  <form action="master_pdct.php?act=DetailContractProUpdate" method="POST" enctype="multipart/form-data" name="myForm">
  <div class="panel panel-primary">
    <div class="panel-heading">Contract</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-6 small">
         <input type="hidden" name="id" value="15">
         <input type="hidden" name="idcust" value="10">

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Contract Level </label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="cont_level" value="Add 1" required>
              </div>
              
            </div>

            <br>
            <br>
            <fieldset>
            <legend>Upload Files</legend>
              
            <div class="form-group">
            <p class="alert alert-danger"> <b>JIKA FILE TIDAK INGIN DIRUBAH / RE-UPLOAD HARAP KOSONGKAN SAJA !</b></p>
            </div>
            <div class="form-group">

              <label  class="col-sm-3 form-control-static"> No.SPK/P8 </label>

              <div class="col-sm-9">
                <input type="file" class="form-control input-sm" name="no_spk">


              </div>
        
            </div>
            <br>
            <br>
            <div class="col-sm-9" style="margin-left:140px;">
            <a href="doc_uploads/spk/muk apl.pdf" target="_blank">  <i class="glyphicon glyphicon-file"> </i>  muk apl.pdf </a>
            </div>
            <br>
            <br>

            

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Surat Kesanggupan </label>

              <div class="col-sm-9">
                <input type="file" class="form-control input-sm" name="surat_kesanggupan">
              </div>
              
            </div>

            <br>
            <br>
            <div class="col-sm-9" style="margin-left:140px;">
            <a href="doc_uploads/sk/muk apl.pdf" target="_blank">  <i class="glyphicon glyphicon-file"> </i>  muk apl.pdf </a>
            </div>
            <br>
            <br>


            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Contract Number </label>

              <div class="col-sm-9">
                <input type="file" class="form-control input-sm" name="contract_number">
              </div>
              
            </div>

            <br>
            <br>
            <div class="col-sm-9" style="margin-left:140px;">
            <a href="doc_uploads/cn/muk apl.pdf" target="_blank">  <i class="glyphicon glyphicon-file"> </i>  muk apl.pdf </a>
            </div>
            <br>
            <br>


            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> BAST </label>

              <div class="col-sm-9">
                <input type="file" class="form-control input-sm" name="bast">
              </div>
              
            </div>

            <br>
            <br>
            <div class="col-sm-9" style="margin-left:140px;">
            <a href="doc_uploads/bast/muk apl.pdf" target="_blank">  <i class="glyphicon glyphicon-file"> </i>  muk apl.pdf </a>
            </div>
            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> BASO </label>

              <div class="col-sm-9">
                <input type="file" class="form-control input-sm" name="baso">
              </div>
              
            </div>

            <br>
            <br>
            <div class="col-sm-9" style="margin-left:140px;">
            <a href="doc_uploads/baso/muk apl.pdf" target="_blank">  <i class="glyphicon glyphicon-file"> </i>  muk apl.pdf </a>
            </div>
            <br>
            <br>

            <div class="form-group">
            <p class="alert alert-danger"> <b>Hanya File : PDF, JPG, JPEG, DOC, DOCX | Max File Size : 2MB </b></p>
            </div>
            </fieldset>

            <br>
            <br>


            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Account No</label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="acc_no" value="ACC-101050" required>
              </div>
              
            </div>

            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> SID</label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="sid" value="SID001" required>
              </div>
              
            </div>

            <br>
            <br>

             <div class="form-group">
              <label  class="col-sm-3 form-control-static"> CID</label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="cid" value="CID001" required>
              </div>
              
            </div>

            <br>
            <br>

          
          
        </div>
        <!--col-md-6-->
        <div class="col-md-6 small">
           
              <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Starting</label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="starting" id="dp1" value="01-01-2016" required>
              </div>
              
            </div>

            <br>
            <br>
         
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Ending</label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="ending" id="dp2" value="01-12-2016" required>
              </div>
              
            </div>

            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Masa Kontrak</label>

              <div class="col-sm-9">
                <input type="number" class="form-control input-sm" name="masa_kontrak" value="12" required>
              </div>
              
            </div>

            <br>
            <br>
            

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Account Manager</label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="acc_manager" value="Iyan Kasela" required>
              </div>
              
            </div>

            <br>
            <br>

           
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Email</label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="email" value="okkisetyawan@gmail.com" required>
              </div>
              
            </div>

            <br>
            <br>
            
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Phone</label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="phone" value="089610595064" required>
              </div>
              
            </div>

            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> OTC </label>

              <div class="col-sm-9">
                <input type="text" id="otc" class="form-control input-sm" name="otc" value="9000000" required>
             
              </div>
              
            </div>

            <br>
            <br>
 
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Monthly</label>

              <div class="col-sm-9">
                <input type="text" id="monthly" class="form-control input-sm" name="monthly" value="900000" required>
              </div>
              
            </div>

            <br>
            <br>

            
        </div><!--col-md-6--> 
      </div><!--row-->
    </div><!--panel-body--> 
  </div><!--panel panel-default--> 
  <!------------------------------------------------------------dua------------------------------------------------------------>
  
  <div class="panel panel-primary">
    <div class="panel-heading">Billing</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-6 small">
           
            
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> End User A</label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="end_usera" value="Iman JROCKS" required>
              </div>
              
            </div>

            <br>
            <br>

           
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Billing Periode</label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="bill_period" value="201601" required>
              </div>
              
            </div>

            <br>
            <br>


            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> FP No.</label>

              <div class="col-sm-9">
                <input type="text"  class="form-control input-sm" name="fpno" value="FP001" required>
              </div>
              
            </div>

            <br>
            <br>

 
        </div>
        <!--col-md-6-->
        <div class="col-md-6 small">
          
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Bill</label>

              <div class="col-sm-9">
                <input type="text"  class="form-control input-sm" name="bill" id="bill" value="50000" required>
              </div>
              
            </div>

            <br>
            <br>
            

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> PAID</label>

              <div class="col-md-9">
              
               <div class="col-md-2">
              <label class="labeled">
              <input type="radio" name="statuspaid" value="Y"  class="form-control"> YES
              </label>
              </div>

              <div class="col-md-2">
              <label class="labeled">
              <input type="radio" name="statuspaid" value="N" checked="checked" class="form-control"> NO
              </label>
              </div>
                             
              </div>
            
              
            </div>

            <br>
            <br>


            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 form-control-static">Charges</label>
              <div class="col-sm-9">
               <select name="charges" class="form-control">
                  <option value="" selected="selected">--Pilih--</option>
                                    <option value="1" selected=selected> One Time Charge </option>
                                    <option value="2" > Prorate </option>
                                    <option value="3" > Monthly Recurring </option>
                                  </select>
              </div>
            </div>
            
            
    </div> <!-- /container -->
          


        </div><!--col-md-6--> 
      </div><!--row--> 
    </div><!--panel-body--> 
  </div><!--panel panel-default--> 
 <button type="submit" name="simpan" class="btn btn-primary btn-block"> <i class="glyphicon glyphicon-floppy-disk"> </i>  Simpan Data </button>

   </div>
   </div>
  

   

</form>
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