<?php
/*%%SmartyHeaderCode:2390256d7c037b54977_28655378%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cea6d23caba6072f532a212c198709c1e04921ed' => 
    array (
      0 => './templates/pdct_contract_detail_edit.tpl',
      1 => 1456980022,
      2 => 'file',
    ),
    '0d67b0acdab9c4ef7b7786428c9051d03ca0e70f' => 
    array (
      0 => './templates/header.tpl',
      1 => 1458151396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2390256d7c037b54977_28655378',
  'tpl_function' => 
  array (
  ),
  'version' => '3.1.24',
  'unifunc' => 'content_56f0e5caec41f2_39058888',
  'has_nocache_code' => false,
  'cache_lifetime' => 0,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56f0e5caec41f2_39058888')) {
function content_56f0e5caec41f2_39058888 ($_smarty_tpl) {
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
     
    


    <script type="text/javascript">
    $(document).ready(function(){
       var isi = $("#contlevel").val();


          if (isi == 'Induk'){
            $("#vallevel").prop("readonly", true);
            //alert(isi);
          }else{
            $("#vallevel").prop("readonly", false);
             //alert(isi);
          }
    })

      function ContLevel(){
        var isi = $("#contlevel").val();


          if (isi == 'Induk'){
             $("#vallevel").val('');
            $("#vallevel").prop("readonly", true);
           
            //alert(isi);
          }else{
            $("#vallevel").val('');
            $("#vallevel").prop("readonly", false);
             
             //alert(isi);
          }
         
        
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

        $('#dp3').datepicker({
        
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
  <div class="alert alert-info"> <h3 align="center">Ubah Data PDCT Contract </h3></div>

    <button onclick="history.go(-1);" class="btn btn-primary"> <i class="glyphicon glyphicon-arrow-left"> </i> Back </button>

     <form action="master_pdct.php?act=DetailContractProUpdate" method="POST" enctype="multipart/form-data" name="myForm">
     <input type="hidden" name="id" value="40">
     <input type="hidden" name="idcust" value="12">
     
    
      
     
     <br>
     <br>
     <div class="panel panel-primary">
     <div class="panel-heading">Contract</div>
     <div class="panel-body">
      <div class="row">
        <div class="col-md-6 small">
         
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Site Code </label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="site_code" value="KRJ01" required>
              </div>
              
            </div>

            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Contract Level </label>

              <div class="col-sm-9">
                   <div class="col-sm-5">
                    
                               
                   <select class="form-control" id="contlevel" onchange="ContLevel();" name ="name_contract_level" required="required">
                    
                    
                    <option value="">--Pilih--</option>
                    <option value="Add"  > Add </option>
                    <option value="Induk"  selected="selected" > Induk </option> 
 
                   </select>  
                   
                </div>

                <div class="col-sm-4">
                              <input type="text"  id="vallevel"  class="form-control input-sm" name="val_contract_level" >
                                
                </div>
              </div>
              
            </div>

            <br>
            <br>

             <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Nama Pekerjaan </label>

              <div class="col-sm-9">
              <textarea name="nama_pekerjaan" required="required" class="form-control input-sm"> Instalasi FO</textarea>
               </div>
              
            </div>

            <br>
            <br>

            <fieldset>
            <legend>Upload Files</legend>
              
            <div class="form-group">
            <p class="alert alert-danger"> <b>Kosongkan Jika Tidak Ada Perubahan File / Re-Upload </b></p>
            </div>

             <div class="form-group">
            <p class="alert alert-danger"> <b>File Yang Dapat Diupload Hanya File : PDF, JPG, JPEG </b></p>
            </div>

            <div class="form-group">

              <label  class="col-sm-3 form-control-static"> No.SPK/P8 </label>

              <div class="col-sm-9">

                            <input type="file" class="form-control input-sm" name="no_spk">
                             
              </div>
        
            
              
            </div>
            <br>
             
            <div class="col-sm-9" style="margin-left:135px; padding:5px 0px 10px 0px;">
            
              <div class="col-sm-11">
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Informasi File
                  </div>
                  <div class="panel-body">

                       <a href="doc_uploads/spk/spk1.pdf" target="_blank" class="btn btn-primary"> <i class="glyphicon glyphicon-file"> </i> spk1.pdf </a>
                       <br>
                       <label> Date Upload : 2016-03-22 11:09:27</label> <br>
                       <label> Date Update : </label>
                       <br>
                       <br>
                        
                         <a href="master_pdct.php?act=UnlinkFileSPK&id=40&idcust=12" class="btn btn-xs btn-danger"> [X] Hapus File </a>
                       

                  </div>
                </div>
              </div>
            
                        </div>
            <br>
             

            

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Surat Kesanggupan </label>

              <div class="col-sm-9">
                            <input type="file" class="form-control input-sm" name="surat_kesanggupan">
                             </div>
  
            <br>
            
            <div class="col-sm-9" style="margin-left:135px; padding:5px 0px 10px 0px;">
                        <div class="col-sm-11">
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Informasi File
                  </div>
                  <div class="panel-body">

                       <a href="doc_uploads/sk/sk1.pdf" target="_blank" class="btn btn-primary"> <i class="glyphicon glyphicon-file"> </i> sk1.pdf </a>
                       <br>
                       <label> Date Upload : 2016-03-22 11:09:27</label> <br>
                       <label> Date Update : </label>
                       <br>
                       <br>
                        
                         <a href="master_pdct.php?act=UnlinkFileSK&id=40&idcust=12" class="btn btn-xs btn-danger"> [X] Hapus File </a>
                       

                  </div>
                </div>
              </div>
                        </div>
            <br>


            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Contract Number </label>

              
              <div class="col-sm-9">
                            <input type="file" class="form-control input-sm" name="contract_number">
                            </div>

              
            <br>
            <div class="col-sm-9" style="margin-left:135px; padding:5px 0px 10px 0px;">
                        <div class="col-sm-11">
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Informasi File
                  </div>
                  <div class="panel-body">

                       <a href="doc_uploads/cn/cn1.pdf" target="_blank" class="btn btn-primary"> <i class="glyphicon glyphicon-file"> </i> cn1.pdf </a>
                       <br>
                       <label> Date Upload : 2016-03-22 11:09:27</label> <br>
                       <label> Date Update : </label>
                       <br>
                       <br>
                        
                         <a href="master_pdct.php?act=UnlinkFileCN&id=40&idcust=12" class="btn btn-xs btn-danger"> [X] Hapus File </a>
                       

                  </div>
                </div>
              </div>
                        </div>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Contract Date </label>

              <div class="col-sm-9">

                              <input type="text" id="dp3" class="form-control input-sm" value="22-03-2016" name="contract_date">
               
                

              <div class="col-sm-12" style="padding:10px 0px 10px 0px;" align="center">
             
              </div>
              
         
              </div>
              
            </div>

            <br>
            <br>


            <div class="col-sm-9" style="margin-left:140px;">
             
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
            <div class="col-sm-9" style="margin-left:135px; padding:5px 0px 10px 0px;">
                        <div class="col-sm-11">
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Informasi File
                  </div>
                  <div class="panel-body">

                       <a href="doc_uploads/bast/bast1.pdf" target="_blank" class="btn btn-primary"> <i class="glyphicon glyphicon-file"> </i> bast1.pdf </a>
                       <br>
                       <label> Date Upload : 2016-03-22 11:09:27</label> <br>
                       <label> Date Update : </label>
                       <br>
                       <br>
                        
                         <a href="master_pdct.php?act=UnlinkFileBAST&id=40&idcust=12" class="btn btn-xs btn-danger"> [X] Hapus File </a>
                       

                  </div>
                </div>
              </div>
                        </div>
            <br>
           <div class="col-sm-9" style="margin-left:135px; padding:5px 0px 10px 0px;">
             
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
             <div class="col-sm-9" style="margin-left:135px; padding:5px 0px 10px 0px;">
                          <div class="col-sm-11">
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Informasi File
                  </div>
                  <div class="panel-body">

                       <a href="doc_uploads/baso/baso1.pdf" target="_blank" class="btn btn-primary"> <i class="glyphicon glyphicon-file"> </i> baso1.pdf </a>
                       <br>
                       <label> Date Upload : 2016-03-22 11:09:27</label> <br>
                       <label> Date Update : </label>
                       <br>
                       <br>
                        
                         <a href="master_pdct.php?act=UnlinkFileBASO&id=40&idcust=12" class="btn btn-xs btn-danger"> [X] Hapus File </a>
                       

                  </div>
                </div>
              </div>            
                        </div>
            <br>
            
           
            </fieldset>

            

            <br>
            <br>


            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Account No</label>


              <div class="col-sm-9">
                                 <input type="text" class="form-control input-sm" name="acc_no" value="ACC01">
                             
              </div>
              
            </div>

            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> SID</label>

              <div class="col-sm-9">
                                <input type="text" class="form-control input-sm" value="999-111" name="sid">
              

                
              </div>
              
            </div>

            <br>
            <br>

             <div class="form-group">
              <label  class="col-sm-3 form-control-static"> CID</label>

              <div class="col-sm-9">

                               <input type="text" class="form-control input-sm" value="888-333" name="cid">
                              </div>
              
            </div>

            <br>
            <br>

          
          
        </div>
        <!--col-md-6-->
        <div class="col-md-6 small">
 
            <hr>
             <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Contract Status</label>

              <div class="col-sm-9">

               
                <select name="contract_status" class="form-control" style="border-color: red;">
                  <option value="" selected="selected">--Pilih--</option>
                                    <option value="1" selected=selected> Administration </option>
                                    <option value="2" > On Service </option>
                                    <option value="3" > End Of Service </option>
                                    <option value="4" > Other </option>
                                    <option value="5" > Close Project </option>
                                  </select>


               
 
              </div>
              
            </div>

            <br>
            <br>
            <hr>
            <br>


           
              <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Starting</label>

              <div class="col-sm-9">
                                <input type="text" class="form-control input-sm" required="required" name="starting" value="01-01-2016" id="dp1"> <label style="color:red;"> * Wajib Diisi </label>
               

                
              </div>
              
            </div>

            <br>
            <br>
         
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Ending</label>

              <div class="col-sm-7">
                               <input type="text" class="form-control input-sm" name="ending" required="required" value="01-12-2016" id="dp2"> <span style="color:red;"> <label style="color:red;"> * Wajib Diisi </label>
               
 
              </div>
              
            </div>

            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Masa Kontrak</label>

              <div class="col-sm-9">
                              <input type="text" class="form-control input-sm" value="12" name="masa_kontrak" >
                
              </div>
              
            </div>

           

            <br>
            <br>
            
            <br>
             
            

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Account Manager</label>

              <div class="col-sm-9">
                              <input type="text" class="form-control input-sm" name="acc_manager" value="Okki Setyawan">
               
                
              </div>
              
            </div>

            <br>
            <br>

           
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Email</label>

              <div class="col-sm-9">
                              <input type="text" class="form-control input-sm" name="email" value="okkisetyawan@gmail.com">
               
                
              </div>
              
            </div>

            <br>
            <br>
            
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Phone</label>

              <div class="col-sm-9">
                              <input type="text" class="form-control input-sm" name="phone" value="089610595064">
               
                
              </div>
              
            </div>

            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> OTC </label>

              <div class="col-sm-9">
                              <input type="text" id="otc" class="form-control input-sm" name="otc" value="1000000">
                
              </div>
              
            </div>

            <br>
            <br>
 
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Monthly</label>

              <div class="col-sm-9">
                              <input type="text" id="monthly" class="form-control input-sm" value="1000000" name="monthly">
                
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