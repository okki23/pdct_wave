<?php /* Smarty version 3.1.24, created on 2016-03-03 05:40:23
         compiled from "./templates/pdct_contract_detail_edit.tpl" */ ?>
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
  ),
  'nocache_hash' => '2390256d7c037b54977_28655378',
  'variables' => 
  array (
    'title' => 0,
    'id' => 0,
    'idcust' => 0,
    'site_code' => 0,
    'name_cont' => 0,
    'val_cont' => 0,
    'nama_pekerjaan' => 0,
    'no_spk_p8_file' => 0,
    'no_spk_p8_date_upload' => 0,
    'no_spk_p8_date_edit' => 0,
    'no_spk_p8_date_delete' => 0,
    'surat_kesanggupan_file' => 0,
    'surat_kesanggupan_date_upload' => 0,
    'surat_kesanggupan_date_edit' => 0,
    'surat_kesanggupan_date_delete' => 0,
    'contract_number_file' => 0,
    'contract_number_date_upload' => 0,
    'contract_number_date_edit' => 0,
    'contract_number_date_delete' => 0,
    'contract_date' => 0,
    'bast_file' => 0,
    'bast_date_upload' => 0,
    'bast_date_edit' => 0,
    'bast_date_delete' => 0,
    'baso_file' => 0,
    'baso_date_upload' => 0,
    'baso_date_edit' => 0,
    'baso_date_delete' => 0,
    'account_no' => 0,
    'sid' => 0,
    'cid' => 0,
    'cont_status_opt' => 0,
    'mulai' => 0,
    'akhir' => 0,
    'masa_kontrak' => 0,
    'account_manager' => 0,
    'email' => 0,
    'phone' => 0,
    'otc' => 0,
    'monthly' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56d7c037d510b3_86394680',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56d7c037d510b3_86394680')) {
function content_56d7c037d510b3_86394680 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2390256d7c037b54977_28655378';
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
 

    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
 
     <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/css_datepicker.css">
     <link rel="stylesheet" type="text/css" href="assets/dataTables.bootstrap.min.css">
      
     <?php echo '<script'; ?>
 src="assets/jquery-1.10.2.js"> <?php echo '</script'; ?>
>
     <?php echo '<script'; ?>
 src="bootstrap/dist/js/bootstrap.min.js"> <?php echo '</script'; ?>
>
     <?php echo '<script'; ?>
 src="assets/jquery.dataTables.min.js"> <?php echo '</script'; ?>
>
     <?php echo '<script'; ?>
 src="assets/dataTables.bootstrap.min.js"> <?php echo '</script'; ?>
>
     <?php echo '<script'; ?>
 src="js/jQuery-Mask-Plugin_js_jquery.mask.min.js"> <?php echo '</script'; ?>
>
     <?php echo '<script'; ?>
 src="js/bootstrap-datepicker.js"> <?php echo '</script'; ?>
>

     
     <?php echo '<script'; ?>
 type="text/javascript">
      $(document).ready(function() {
          $('#example').DataTable();
      } );
 
     <?php echo '</script'; ?>
>
     
    


    <?php echo '<script'; ?>
 type="text/javascript">
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
    <?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 language='JavaScript'>
    var input_pronumb = $("#input_pronumb").val();
    var idprono = $("#idprono").val();

    if(input_pronumb == ''){
      idprono.value = '';
    }

    if(input_cust_name == ''){
      idcust.value = '';
    }
    
    <?php echo '</script'; ?>
>

    

<?php echo '<script'; ?>
>
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
  <?php echo '</script'; ?>
>



    <?php echo '<script'; ?>
 language='JavaScript'>
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

 
 
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
  $(document).ready(function(){
    $('#otc').mask('000.000.000.000.000', {reverse: true});
    $('#bill').mask('000.000.000.000.000', {reverse: true});
    $('#monthly').mask('000.000.000.000.000', {reverse: true});
  });
  
<?php echo '</script'; ?>
>

     
 
  </head>

  <body role="document">

    <?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0);
?>


    <div class="container theme-showcase" role="main">

    
    <div class="row">
    <div class="col-md-12">

     <div style="margin-top:70px;">
     </div>
  <div class="alert alert-info"> <h3 align="center">Ubah Data PDCT Contract </h3></div>

    <button onclick="history.go(-1);" class="btn btn-primary"> <i class="glyphicon glyphicon-arrow-left"> </i> Back </button>

     <form action="master_pdct.php?act=DetailContractProUpdate" method="POST" enctype="multipart/form-data" name="myForm">
     <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
     <input type="hidden" name="idcust" value="<?php echo $_smarty_tpl->tpl_vars['idcust']->value;?>
">
     
    
      
     
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
                <input type="text" class="form-control input-sm" name="site_code" value="<?php echo $_smarty_tpl->tpl_vars['site_code']->value;?>
" required>
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
                    <option value="Add" <?php ob_start();
echo $_smarty_tpl->tpl_vars['name_cont']->value;
$_tmp1=ob_get_clean();
if ($_tmp1 == "Add") {?> selected="selected" <?php } else { ?> <?php }?>> Add </option>
                    <option value="Induk" <?php ob_start();
echo $_smarty_tpl->tpl_vars['name_cont']->value;
$_tmp2=ob_get_clean();
if ($_tmp2 == "Induk") {?> selected="selected" <?php } else { ?> <?php }?>> Induk </option> 
 
                   </select>  
                   
                </div>

                <div class="col-sm-4">
                <?php ob_start();
echo $_smarty_tpl->tpl_vars['val_cont']->value != "0";
$_tmp3=ob_get_clean();
if ($_tmp3) {?>
                 <input type="text"  id="vallevel"  class="form-control input-sm" value="<?php echo $_smarty_tpl->tpl_vars['val_cont']->value;?>
" name="val_contract_level" >
                <?php } else { ?>
              <input type="text"  id="vallevel"  class="form-control input-sm" name="val_contract_level" >
                <?php }?>
                
                </div>
              </div>
              
            </div>

            <br>
            <br>

             <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Nama Pekerjaan </label>

              <div class="col-sm-9">
              <textarea name="nama_pekerjaan" required="required" class="form-control input-sm"> <?php echo $_smarty_tpl->tpl_vars['nama_pekerjaan']->value;?>
</textarea>
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

              <?php ob_start();
echo $_smarty_tpl->tpl_vars['no_spk_p8_file']->value;
$_tmp4=ob_get_clean();
if ($_tmp4 == '') {?>
              <input type="file" class="form-control input-sm" name="no_spk" style="border-color: red;">
              <?php } else { ?>
              <input type="file" class="form-control input-sm" name="no_spk">
              <?php }?>
               
              </div>
        
            
              
            </div>
            <br>
             
            <div class="col-sm-9" style="margin-left:135px; padding:5px 0px 10px 0px;">
            <?php ob_start();
echo $_smarty_tpl->tpl_vars['no_spk_p8_file']->value;
$_tmp5=ob_get_clean();
if ($_tmp5 != '') {?>

              <div class="col-sm-11">
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Informasi File
                  </div>
                  <div class="panel-body">

                       <a href="doc_uploads/spk/<?php echo $_smarty_tpl->tpl_vars['no_spk_p8_file']->value;?>
" target="_blank" class="btn btn-primary"> <i class="glyphicon glyphicon-file"> </i> <?php echo $_smarty_tpl->tpl_vars['no_spk_p8_file']->value;?>
 </a>
                       <br>
                       <label> Date Upload : <?php echo $_smarty_tpl->tpl_vars['no_spk_p8_date_upload']->value;?>
</label> <br>
                       <label> Date Update : <?php echo $_smarty_tpl->tpl_vars['no_spk_p8_date_edit']->value;?>
</label>
                       <br>
                       <br>
                        
                         <a href="master_pdct.php?act=UnlinkFileSPK&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&idcust=<?php echo $_smarty_tpl->tpl_vars['idcust']->value;?>
" class="btn btn-xs btn-danger"> [X] Hapus File </a>
                       

                  </div>
                </div>
              </div>
            
            <?php } else { ?>
              <div class="col-sm-11">
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Informasi File
                  </div>
                  <div class="panel-body">
                       <p class="btn btn-primary"> File No.SPK/P8 Tidak Ada </p>
                       <br>
                       <label> Date Delete : <?php echo $_smarty_tpl->tpl_vars['no_spk_p8_date_delete']->value;?>
</label>

                  </div>
                </div>
              </div>

           
            <?php }?>
            </div>
            <br>
             

            

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Surat Kesanggupan </label>

              <div class="col-sm-9">
              <?php ob_start();
echo $_smarty_tpl->tpl_vars['surat_kesanggupan_file']->value;
$_tmp6=ob_get_clean();
if ($_tmp6 == '') {?>
              <input type="file" class="form-control input-sm" name="surat_kesanggupan" style="border-color: red;">
              <?php } else { ?>
              <input type="file" class="form-control input-sm" name="surat_kesanggupan">
              <?php }?>
               </div>
  
            <br>
            
            <div class="col-sm-9" style="margin-left:135px; padding:5px 0px 10px 0px;">
            <?php ob_start();
echo $_smarty_tpl->tpl_vars['surat_kesanggupan_file']->value;
$_tmp7=ob_get_clean();
if ($_tmp7 != '') {?>
            <div class="col-sm-11">
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Informasi File
                  </div>
                  <div class="panel-body">

                       <a href="doc_uploads/sk/<?php echo $_smarty_tpl->tpl_vars['surat_kesanggupan_file']->value;?>
" target="_blank" class="btn btn-primary"> <i class="glyphicon glyphicon-file"> </i> <?php echo $_smarty_tpl->tpl_vars['surat_kesanggupan_file']->value;?>
 </a>
                       <br>
                       <label> Date Upload : <?php echo $_smarty_tpl->tpl_vars['surat_kesanggupan_date_upload']->value;?>
</label> <br>
                       <label> Date Update : <?php echo $_smarty_tpl->tpl_vars['surat_kesanggupan_date_edit']->value;?>
</label>
                       <br>
                       <br>
                        
                         <a href="master_pdct.php?act=UnlinkFileSK&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&idcust=<?php echo $_smarty_tpl->tpl_vars['idcust']->value;?>
" class="btn btn-xs btn-danger"> [X] Hapus File </a>
                       

                  </div>
                </div>
              </div>
            <?php } else { ?>
            <div class="col-sm-11">
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Informasi File
                  </div>
                  <div class="panel-body">
                       <p class="btn btn-primary"> File Surat Kesanggupan Tidak Ada </p>
                        <br>
                       <label> Date Delete : <?php echo $_smarty_tpl->tpl_vars['surat_kesanggupan_date_delete']->value;?>
 </label>

                  </div>
                </div>
              </div>
            
            <?php }?>
            </div>
            <br>


            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Contract Number </label>

              
              <div class="col-sm-9">
              <?php ob_start();
echo $_smarty_tpl->tpl_vars['contract_number_file']->value;
$_tmp8=ob_get_clean();
if ($_tmp8 == '') {?>
              <input type="file" class="form-control input-sm" name="contract_number" style="border-color: red;">
              <?php } else { ?>
              <input type="file" class="form-control input-sm" name="contract_number">
              <?php }?>
              </div>

              
            <br>
            <div class="col-sm-9" style="margin-left:135px; padding:5px 0px 10px 0px;">
            <?php ob_start();
echo $_smarty_tpl->tpl_vars['contract_number_file']->value;
$_tmp9=ob_get_clean();
if ($_tmp9 != '') {?>
            <div class="col-sm-11">
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Informasi File
                  </div>
                  <div class="panel-body">

                       <a href="doc_uploads/cn/<?php echo $_smarty_tpl->tpl_vars['contract_number_file']->value;?>
" target="_blank" class="btn btn-primary"> <i class="glyphicon glyphicon-file"> </i> <?php echo $_smarty_tpl->tpl_vars['contract_number_file']->value;?>
 </a>
                       <br>
                       <label> Date Upload : <?php echo $_smarty_tpl->tpl_vars['contract_number_date_upload']->value;?>
</label> <br>
                       <label> Date Update : <?php echo $_smarty_tpl->tpl_vars['contract_number_date_edit']->value;?>
</label>
                       <br>
                       <br>
                        
                         <a href="master_pdct.php?act=UnlinkFileCN&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&idcust=<?php echo $_smarty_tpl->tpl_vars['idcust']->value;?>
" class="btn btn-xs btn-danger"> [X] Hapus File </a>
                       

                  </div>
                </div>
              </div>
            <?php } else { ?>
            <div class="col-sm-11">
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Informasi File
                  </div>
                  <div class="panel-body">
                       <p class="btn btn-primary"> File Contract Number Tidak Ada </p>
                        <br>
                       <label> Date Delete : <?php echo $_smarty_tpl->tpl_vars['contract_number_date_delete']->value;?>
 </label>

                  </div>
                </div>
              </div>
            
            <?php }?>
            </div>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Contract Date </label>

              <div class="col-sm-9">

               <?php ob_start();
echo $_smarty_tpl->tpl_vars['contract_date']->value;
$_tmp10=ob_get_clean();
if ($_tmp10 == '') {?>
               <input type="text" id="dp3" class="form-control input-sm" style="border-color: red;" value="<?php echo $_smarty_tpl->tpl_vars['contract_date']->value;?>
" name="contract_date">
               <?php } else { ?>
               <input type="text" id="dp3" class="form-control input-sm" value="<?php echo $_smarty_tpl->tpl_vars['contract_date']->value;?>
" name="contract_date">
               <?php }?>

                

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
               <?php ob_start();
echo $_smarty_tpl->tpl_vars['bast_file']->value;
$_tmp11=ob_get_clean();
if ($_tmp11 == '') {?>
               <input type="file" class="form-control input-sm" style="border-color: red;" name="bast">
               <?php } else { ?>
               <input type="file" class="form-control input-sm" name="bast">
               <?php }?>
              </div>
 
            </div>

            <br>
            <div class="col-sm-9" style="margin-left:135px; padding:5px 0px 10px 0px;">
            <?php ob_start();
echo $_smarty_tpl->tpl_vars['bast_file']->value;
$_tmp12=ob_get_clean();
if ($_tmp12 != '') {?>
            <div class="col-sm-11">
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Informasi File
                  </div>
                  <div class="panel-body">

                       <a href="doc_uploads/bast/<?php echo $_smarty_tpl->tpl_vars['bast_file']->value;?>
" target="_blank" class="btn btn-primary"> <i class="glyphicon glyphicon-file"> </i> <?php echo $_smarty_tpl->tpl_vars['bast_file']->value;?>
 </a>
                       <br>
                       <label> Date Upload : <?php echo $_smarty_tpl->tpl_vars['bast_date_upload']->value;?>
</label> <br>
                       <label> Date Update : <?php echo $_smarty_tpl->tpl_vars['bast_date_edit']->value;?>
</label>
                       <br>
                       <br>
                        
                         <a href="master_pdct.php?act=UnlinkFileBAST&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&idcust=<?php echo $_smarty_tpl->tpl_vars['idcust']->value;?>
" class="btn btn-xs btn-danger"> [X] Hapus File </a>
                       

                  </div>
                </div>
              </div>
            <?php } else { ?>
             <div class="col-sm-11">
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Informasi File
                  </div>
                  <div class="panel-body">
                       <p class="btn btn-primary"> File BAST Tidak Ada </p>
                        <br>
                       <label> Date Delete : <?php echo $_smarty_tpl->tpl_vars['bast_date_delete']->value;?>
</label>

                  </div>
                </div>
              </div>
            
            <?php }?>
            </div>
            <br>
           <div class="col-sm-9" style="margin-left:135px; padding:5px 0px 10px 0px;">
             
            </div>
            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> BASO </label>

              <div class="col-sm-9">
               <?php ob_start();
echo $_smarty_tpl->tpl_vars['baso_file']->value;
$_tmp13=ob_get_clean();
if ($_tmp13 == '') {?>
               <input type="file" class="form-control input-sm" style="border-color: red;" name="baso">
               <?php } else { ?>
               <input type="file" class="form-control input-sm" name="baso">
               <?php }?>
             
              </div>
        
            </div>

            <br>
             <div class="col-sm-9" style="margin-left:135px; padding:5px 0px 10px 0px;">
            <?php ob_start();
echo $_smarty_tpl->tpl_vars['baso_file']->value;
$_tmp14=ob_get_clean();
if ($_tmp14 != '') {?>
              <div class="col-sm-11">
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Informasi File
                  </div>
                  <div class="panel-body">

                       <a href="doc_uploads/baso/<?php echo $_smarty_tpl->tpl_vars['baso_file']->value;?>
" target="_blank" class="btn btn-primary"> <i class="glyphicon glyphicon-file"> </i> <?php echo $_smarty_tpl->tpl_vars['baso_file']->value;?>
 </a>
                       <br>
                       <label> Date Upload : <?php echo $_smarty_tpl->tpl_vars['baso_date_upload']->value;?>
</label> <br>
                       <label> Date Update : <?php echo $_smarty_tpl->tpl_vars['baso_date_edit']->value;?>
</label>
                       <br>
                       <br>
                        
                         <a href="master_pdct.php?act=UnlinkFileBASO&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&idcust=<?php echo $_smarty_tpl->tpl_vars['idcust']->value;?>
" class="btn btn-xs btn-danger"> [X] Hapus File </a>
                       

                  </div>
                </div>
              </div>            
            <?php } else { ?>
           <div class="col-sm-11">
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Informasi File
                  </div>
                  <div class="panel-body">
                       <p class="btn btn-primary"> File BASO Tidak Ada </p>
                        <br>
                       <label> Date Delete : <?php echo $_smarty_tpl->tpl_vars['baso_date_delete']->value;?>
</label>

                  </div>
                </div>
              </div>
            
            <?php }?>
            </div>
            <br>
            
           
            </fieldset>

            

            <br>
            <br>


            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Account No</label>


              <div class="col-sm-9">
              <?php ob_start();
echo $_smarty_tpl->tpl_vars['account_no']->value;
$_tmp15=ob_get_clean();
if ($_tmp15 == '') {?>
                  <input type="text" style="border-color: red;" class="form-control input-sm" name="acc_no" value="<?php echo $_smarty_tpl->tpl_vars['account_no']->value;?>
">
              <?php } else { ?>
                   <input type="text" class="form-control input-sm" name="acc_no" value="<?php echo $_smarty_tpl->tpl_vars['account_no']->value;?>
">
              <?php }?>
               
              </div>
              
            </div>

            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> SID</label>

              <div class="col-sm-9">
              <?php ob_start();
echo $_smarty_tpl->tpl_vars['sid']->value;
$_tmp16=ob_get_clean();
if ($_tmp16 == '') {?>
                 <input type="text" style="border-color: red;" class="form-control input-sm" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
" name="sid">
              <?php } else { ?>
                  <input type="text" class="form-control input-sm" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
" name="sid">
              <?php }?>


                
              </div>
              
            </div>

            <br>
            <br>

             <div class="form-group">
              <label  class="col-sm-3 form-control-static"> CID</label>

              <div class="col-sm-9">

               <?php ob_start();
echo $_smarty_tpl->tpl_vars['cid']->value;
$_tmp17=ob_get_clean();
if ($_tmp17 == '') {?>
                <input type="text" style="border-color: red;" class="form-control input-sm" value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
" name="cid">
               <?php } else { ?>
                <input type="text" class="form-control input-sm" value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
" name="cid">
               <?php }?>
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

               <?php ob_start();
echo $_smarty_tpl->tpl_vars['cont_status_opt']->value;
$_tmp18=ob_get_clean();
if ($_tmp18 == '') {?>
                 <select name="contract_status" class="form-control" style="border-color: red;">
                  <option value="" selected="selected">--Pilih--</option>
                  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['detail'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['detail']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['name'] = 'detail';
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['cont_status_opt']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['total']);
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['cont_status_opt']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
" <?php echo $_smarty_tpl->tpl_vars['cont_status_opt']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['selected'];?>
> <?php echo $_smarty_tpl->tpl_vars['cont_status_opt']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['contract_status'];?>
 </option>
                  <?php endfor; endif; ?>
                </select>

               <?php } else { ?>

                <select name="contract_status" class="form-control" style="border-color: red;">
                  <option value="" selected="selected">--Pilih--</option>
                  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['detail'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['detail']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['name'] = 'detail';
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['cont_status_opt']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['total']);
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['cont_status_opt']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
" <?php echo $_smarty_tpl->tpl_vars['cont_status_opt']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['selected'];?>
> <?php echo $_smarty_tpl->tpl_vars['cont_status_opt']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['contract_status'];?>
 </option>
                  <?php endfor; endif; ?>
                </select>


               <?php }?>

 
              </div>
              
            </div>

            <br>
            <br>
            <hr>
            <br>


           
              <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Starting</label>

              <div class="col-sm-9">
               <?php ob_start();
echo $_smarty_tpl->tpl_vars['mulai']->value;
$_tmp19=ob_get_clean();
if ($_tmp19 == '') {?>
                 <input type="text" style="border-color: red;" required="required" class="form-control input-sm" name="starting" value="<?php echo $_smarty_tpl->tpl_vars['mulai']->value;?>
" id="dp1"> <label style="color:red;"> * Wajib Diisi </label>
               <?php } else { ?>
                 <input type="text" class="form-control input-sm" required="required" name="starting" value="<?php echo $_smarty_tpl->tpl_vars['mulai']->value;?>
" id="dp1"> <label style="color:red;"> * Wajib Diisi </label>
               <?php }?>


                
              </div>
              
            </div>

            <br>
            <br>
         
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Ending</label>

              <div class="col-sm-7">
               <?php ob_start();
echo $_smarty_tpl->tpl_vars['akhir']->value;
$_tmp20=ob_get_clean();
if ($_tmp20 == '') {?>
                <input type="text" style="border-color: red;" class="form-control input-sm" name="ending" value="<?php echo $_smarty_tpl->tpl_vars['akhir']->value;?>
" id="dp2" required="required"> <label style="color:red;"> * Wajib Diisi </label>
               <?php } else { ?>
                <input type="text" class="form-control input-sm" name="ending" required="required" value="<?php echo $_smarty_tpl->tpl_vars['akhir']->value;?>
" id="dp2"> <span style="color:red;"> <label style="color:red;"> * Wajib Diisi </label>
               <?php }?>

 
              </div>
              
            </div>

            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Masa Kontrak</label>

              <div class="col-sm-9">
               <?php ob_start();
echo $_smarty_tpl->tpl_vars['masa_kontrak']->value;
$_tmp21=ob_get_clean();
if ($_tmp21 == '') {?>
               <input type="text" style="border-color: red;" class="form-control input-sm" value="<?php echo $_smarty_tpl->tpl_vars['masa_kontrak']->value;?>
" name="masa_kontrak" >
               <?php } else { ?>
               <input type="text" class="form-control input-sm" value="<?php echo $_smarty_tpl->tpl_vars['masa_kontrak']->value;?>
" name="masa_kontrak" >
               <?php }?>
 
              </div>
              
            </div>

           

            <br>
            <br>
            
            <br>
             
            

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Account Manager</label>

              <div class="col-sm-9">
               <?php ob_start();
echo $_smarty_tpl->tpl_vars['account_manager']->value;
$_tmp22=ob_get_clean();
if ($_tmp22 == '') {?>
               <input type="text" style="border-color: red;" class="form-control input-sm" name="acc_manager" value="<?php echo $_smarty_tpl->tpl_vars['account_manager']->value;?>
">
               <?php } else { ?>
               <input type="text" class="form-control input-sm" name="acc_manager" value="<?php echo $_smarty_tpl->tpl_vars['account_manager']->value;?>
">
               <?php }?>

                
              </div>
              
            </div>

            <br>
            <br>

           
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Email</label>

              <div class="col-sm-9">
               <?php ob_start();
echo $_smarty_tpl->tpl_vars['email']->value;
$_tmp23=ob_get_clean();
if ($_tmp23 == '') {?>
               <input type="text" style="border-color: red;" class="form-control input-sm" name="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
">
               <?php } else { ?>
               <input type="text" class="form-control input-sm" name="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
">
               <?php }?>

                
              </div>
              
            </div>

            <br>
            <br>
            
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Phone</label>

              <div class="col-sm-9">
               <?php ob_start();
echo $_smarty_tpl->tpl_vars['phone']->value;
$_tmp24=ob_get_clean();
if ($_tmp24 == '') {?>
               <input type="text" style="border-color: red;" class="form-control input-sm" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
">
               <?php } else { ?>
               <input type="text" class="form-control input-sm" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
">
               <?php }?>

                
              </div>
              
            </div>

            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> OTC </label>

              <div class="col-sm-9">
               <?php ob_start();
echo $_smarty_tpl->tpl_vars['otc']->value;
$_tmp25=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['otc']->value;
$_tmp26=ob_get_clean();
if ($_tmp25 == '' || $_tmp26 == 0) {?>
               <input type="text" style="border-color: red;" id="otc" class="form-control input-sm" name="otc" value="<?php echo $_smarty_tpl->tpl_vars['otc']->value;?>
">
               <?php } else { ?>
               <input type="text" id="otc" class="form-control input-sm" name="otc" value="<?php echo $_smarty_tpl->tpl_vars['otc']->value;?>
">
               <?php }?>
 
              </div>
              
            </div>

            <br>
            <br>
 
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Monthly</label>

              <div class="col-sm-9">
               <?php ob_start();
echo $_smarty_tpl->tpl_vars['monthly']->value;
$_tmp27=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['monthly']->value;
$_tmp28=ob_get_clean();
if ($_tmp27 == '' || $_tmp28 == 0) {?>
               <input type="text" style="border-color: red;" id="monthly" class="form-control input-sm" value="<?php echo $_smarty_tpl->tpl_vars['monthly']->value;?>
" name="monthly">
               <?php } else { ?>
               <input type="text" id="monthly" class="form-control input-sm" value="<?php echo $_smarty_tpl->tpl_vars['monthly']->value;?>
" name="monthly">
               <?php }?>
 
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
        <p class="text-muted"> <?php echo $_smarty_tpl->tpl_vars['footer']->value;?>
</p>
      </div>
    </footer>

    
     
  </body>
</html>















 <?php }
}
?>