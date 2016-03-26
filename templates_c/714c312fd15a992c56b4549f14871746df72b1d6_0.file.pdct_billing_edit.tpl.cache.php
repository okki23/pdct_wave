<?php /* Smarty version 3.1.24, created on 2016-03-22 11:58:52
         compiled from "./templates/pdct_billing_edit.tpl" */ ?>
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
  ),
  'nocache_hash' => '2405356f0d10c4fda81_96311611',
  'variables' => 
  array (
    'title' => 0,
    'id' => 0,
    'idcust' => 0,
    'idcontract' => 0,
    'end_user' => 0,
    'bill_periode' => 0,
    'fp_no_file' => 0,
    'no_spk_p8_file' => 0,
    'fp_no_date_upload' => 0,
    'fp_no_date_edit' => 0,
    'fp_no_date_delete' => 0,
    'bill_amount' => 0,
    'charges' => 0,
    'charges_opt' => 0,
    'paid_status' => 0,
    'paid_amount' => 0,
    'level_user' => 0,
    'csc' => 0,
    'paid_csc' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56f0d10c60b136_45672013',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56f0d10c60b136_45672013')) {
function content_56f0d10c60b136_45672013 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2405356f0d10c4fda81_96311611';
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
    $('#bill_amount').mask('000.000.000.000.000', {reverse: true});
    $('#paid_amount').mask('000.000.000.000.000', {reverse: true});
    $('#csc').mask('000.000.000.000.000', {reverse: true});
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

      <div class="alert alert-info"> <h3 align="center">Ubah Data PDCT Billing </h3></div>
      <button onclick="history.go(-1);" class="btn btn-primary"> <i class="glyphicon glyphicon-arrow-left"> </i> Back </button>

     <form action="master_pdct.php?act=DetailBillingProUpdate" method="POST" enctype="multipart/form-data" name="myForm">
     <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
     <input type="hidden" name="idcust" value="<?php echo $_smarty_tpl->tpl_vars['idcust']->value;?>
">
     <input type="hidden" name="idcontract" value="<?php echo $_smarty_tpl->tpl_vars['idcontract']->value;?>
">
    
    
     
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
                <input type="text" class="form-control input-sm" name="end_user" value="<?php echo $_smarty_tpl->tpl_vars['end_user']->value;?>
" required>
              </div>
              
            </div>

            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Billing Periode</label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="bill_periode" value="<?php echo $_smarty_tpl->tpl_vars['bill_periode']->value;?>
" required>
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
             <?php ob_start();
echo $_smarty_tpl->tpl_vars['fp_no_file']->value;
$_tmp1=ob_get_clean();
if ($_tmp1 != '') {?>

                <div class="col-sm-11">
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Informasi File
                  </div>
                  <div class="panel-body">

                       <a href="doc_uploads/spk/<?php echo $_smarty_tpl->tpl_vars['no_spk_p8_file']->value;?>
" target="_blank" class="btn btn-primary"> <i class="glyphicon glyphicon-file"> </i> <?php echo $_smarty_tpl->tpl_vars['fp_no_file']->value;?>
 </a>
                       <br>
                       <label> Date Upload : <?php echo $_smarty_tpl->tpl_vars['fp_no_date_upload']->value;?>
</label> <br>
                       <label> Date Update : <?php echo $_smarty_tpl->tpl_vars['fp_no_date_edit']->value;?>
</label>
                       <br>
                       <br>
                        
                         <a href="master_pdct.php?act=UnlinkFileFPNO&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&idcust=<?php echo $_smarty_tpl->tpl_vars['idcust']->value;?>
&idcontract=<?php echo $_smarty_tpl->tpl_vars['idcontract']->value;?>
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
                       <p class="btn btn-primary"> File FP.No Tidak Ada </p> <br>
                       <label> Date Delete : <?php echo $_smarty_tpl->tpl_vars['fp_no_date_delete']->value;?>
</label>

                  </div>
                </div>
              </div>

           
            <?php }?>
            </div>
            
           
            </fieldset>

            <br>
            <br>


            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Bill Amount</label>

              <div class="col-sm-9">
                <?php ob_start();
echo $_smarty_tpl->tpl_vars['bill_amount']->value;
$_tmp2=ob_get_clean();
if ($_tmp2 == '0' || '') {?>
                 <input type="text" style="border-color: red;" class="form-control input-sm" name="bill_amount" value="<?php echo $_smarty_tpl->tpl_vars['bill_amount']->value;?>
" id="bill_amount">
                <?php } else { ?>
                 <input type="text" class="form-control input-sm" name="bill_amount" value="<?php echo $_smarty_tpl->tpl_vars['bill_amount']->value;?>
" id="bill_amount">
                <?php }?>
               
                
              </div>
              
            </div>


            <br>
            <br>

               <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Charges</label>

              <div class="col-sm-9">
                <?php ob_start();
echo $_smarty_tpl->tpl_vars['charges']->value;
$_tmp3=ob_get_clean();
if ($_tmp3 == '') {?>
                 <select name="charges" style="border-color: red;" class="form-control">
                  <option value="" selected="selected">--Pilih</option>
                  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['detail'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['detail']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['name'] = 'detail';
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['charges_opt']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
                  <option value="<?php echo $_smarty_tpl->tpl_vars['charges_opt']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
" <?php echo $_smarty_tpl->tpl_vars['charges_opt']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['selected'];?>
> <?php echo $_smarty_tpl->tpl_vars['charges_opt']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['charges'];?>
 </option>
                  <?php endfor; endif; ?>
                </select> 
                <?php } else { ?>
                 <select name="charges" class="form-control">
                  <option value="" selected="selected">--Pilih</option>
                  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['detail'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['detail']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['name'] = 'detail';
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['charges_opt']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
                  <option value="<?php echo $_smarty_tpl->tpl_vars['charges_opt']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
" <?php echo $_smarty_tpl->tpl_vars['charges_opt']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['selected'];?>
> <?php echo $_smarty_tpl->tpl_vars['charges_opt']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['charges'];?>
 </option>
                  <?php endfor; endif; ?>
                </select> 
                <?php }?>
               


               
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
                <?php ob_start();
echo $_smarty_tpl->tpl_vars['paid_status']->value;
$_tmp4=ob_get_clean();
if ($_tmp4 == '') {?>
                  <select name="paid_status" style="border-color: red;" class="form-control">
                      <option value=""> --Pilih-- </option>
                      <option value="Y" <?php ob_start();
echo $_smarty_tpl->tpl_vars['paid_status']->value;
$_tmp5=ob_get_clean();
if ($_tmp5 == 'Y') {?> selected="selected" <?php } else { ?> <?php }?>> Yes </option>
                      <option value="N" <?php ob_start();
echo $_smarty_tpl->tpl_vars['paid_status']->value;
$_tmp6=ob_get_clean();
if ($_tmp6 == 'N') {?> selected="selected" <?php } else { ?> <?php }?>> No </option>
                      <option value="I" <?php ob_start();
echo $_smarty_tpl->tpl_vars['paid_status']->value;
$_tmp7=ob_get_clean();
if ($_tmp7 == 'I') {?> selected="selected" <?php } else { ?> <?php }?> > Invoicing </option>
                      <option value="E" <?php ob_start();
echo $_smarty_tpl->tpl_vars['paid_status']->value;
$_tmp8=ob_get_clean();
if ($_tmp8 == 'E') {?> selected="selected" <?php } else { ?> <?php }?>> End Of Service </option> 
                  </select>
                  <?php } else { ?>
              <select name="paid_status" style="border-color: red;" class="form-control">
                      <option value=""> --Pilih-- </option>
                      <option value="Y" <?php ob_start();
echo $_smarty_tpl->tpl_vars['paid_status']->value;
$_tmp9=ob_get_clean();
if ($_tmp9 == 'Y') {?> selected="selected" <?php } else { ?> <?php }?>> Yes </option>
                      <option value="N" <?php ob_start();
echo $_smarty_tpl->tpl_vars['paid_status']->value;
$_tmp10=ob_get_clean();
if ($_tmp10 == 'N') {?> selected="selected" <?php } else { ?> <?php }?>> No </option>
                      <option value="I" <?php ob_start();
echo $_smarty_tpl->tpl_vars['paid_status']->value;
$_tmp11=ob_get_clean();
if ($_tmp11 == 'I') {?> selected="selected" <?php } else { ?> <?php }?> > Invoicing </option>
                      <option value="E" <?php ob_start();
echo $_smarty_tpl->tpl_vars['paid_status']->value;
$_tmp12=ob_get_clean();
if ($_tmp12 == 'E') {?> selected="selected" <?php } else { ?> <?php }?>> End Of Service </option> 
                  </select>
                  <?php }?>
                 
              


                 
              </div>
              
            </div>

            <br>
            <br>
            <hr>
            <br>
           
         
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Paid Amount</label>

              <div class="col-sm-9">
               <?php ob_start();
echo $_smarty_tpl->tpl_vars['paid_amount']->value;
$_tmp13=ob_get_clean();
if ($_tmp13 == '0' || '') {?>
                  <input type="text" style="border-color: red;" class="form-control input-sm" name="paid_amount" value="<?php echo $_smarty_tpl->tpl_vars['paid_amount']->value;?>
" id="paid_amount">
                <?php } else { ?>
                  <input type="text" class="form-control input-sm" name="paid_amount" value="<?php echo $_smarty_tpl->tpl_vars['paid_amount']->value;?>
" id="paid_amount">
                <?php }?>
 
              </div>
              
            </div>

            <br>
            <br>

           
            <?php ob_start();
echo $_smarty_tpl->tpl_vars['level_user']->value;
$_tmp14=ob_get_clean();
if ($_tmp14 != 'Administrator') {?>

            <?php } else { ?>
             <div class="form-group">
              <label  class="col-sm-3 form-control-static"> CSC</label>

              <div class="col-sm-9">
              <?php ob_start();
echo $_smarty_tpl->tpl_vars['csc']->value;
$_tmp15=ob_get_clean();
if ($_tmp15 == '0' || '') {?>
                <input type="text" style="border-color: red;" class="form-control input-sm" name="csc" value="<?php echo $_smarty_tpl->tpl_vars['csc']->value;?>
" id="csc">
              <?php } else { ?>
                 <input type="text" class="form-control input-sm" name="csc" value="<?php echo $_smarty_tpl->tpl_vars['csc']->value;?>
" id="csc">
              <?php }?>
              
              </div>
              
            </div>

            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> CSC Status</label>

              <div class="col-sm-9">
              
               
                <?php ob_start();
echo $_smarty_tpl->tpl_vars['paid_csc']->value;
$_tmp16=ob_get_clean();
if ($_tmp16 == '') {?>
                    <select name="csc_status" style="border-color: red;" class="form-control">
                    <?php ob_start();
echo $_smarty_tpl->tpl_vars['paid_csc']->value;
$_tmp17=ob_get_clean();
if ($_tmp17 == 'N') {?>
                    <option value=""> --Pilih-- </option>
                    <option value="Y"> Yes </option>
                    <option value="N" selected="selected"> No </option>
                    <?php } else { ?>
                    <option value=""> --Pilih-- </option>
                    <option value="Y" selected="selected"> Yes </option>
                    <option value="N" > No </option>
                    <?php }?>
                    </select>
                <?php } else { ?>
                    <select name="csc_status" class="form-control">
                     <?php ob_start();
echo $_smarty_tpl->tpl_vars['paid_csc']->value;
$_tmp18=ob_get_clean();
if ($_tmp18 == 'N') {?>
                    <option value=""> --Pilih-- </option>
                    <option value="Y"> Yes </option>
                    <option value="N" selected="selected"> No </option>
                    <?php } else { ?>
                    <option value=""> --Pilih-- </option>
                    <option value="Y" selected="selected"> Yes </option>
                    <option value="N" > No </option>
                    <?php }?>
                   </select>

                <?php }?>

                 
              </div>
              
            </div>

            <br>
            <br>

            <?php }?>


           

             
            
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