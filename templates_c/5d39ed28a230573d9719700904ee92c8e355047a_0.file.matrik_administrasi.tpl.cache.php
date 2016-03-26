<?php /* Smarty version 3.1.24, created on 2016-03-15 08:45:02
         compiled from "./templates/matrik_administrasi.tpl" */ ?>
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
  ),
  'nocache_hash' => '54656e7bd7e19b397_81128660',
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
  'unifunc' => 'content_56e7bd7e298e57_44143748',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56e7bd7e298e57_44143748')) {
function content_56e7bd7e298e57_44143748 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '54656e7bd7e19b397_81128660';
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
                  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['detail'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['detail']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['name'] = 'detail';
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['contract_status']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
                  <option value="<?php echo $_smarty_tpl->tpl_vars['contract_status']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
" <?php echo $_smarty_tpl->tpl_vars['contract_status']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['selected'];?>
> 
                  <?php echo $_smarty_tpl->tpl_vars['contract_status']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['contract_status'];?>
 </option>
                  <?php endfor; endif; ?>
         </select> 

         </td>
      </tr>

      <tr>
        <td>  Customer Name  </td>
        <td>  : </td>
        <td colspan="3">  
        <select name="id_customer_name" class="form-control"> 
        <option value="" selected="selected">--Pilih--</option>
                  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['detail'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['detail']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['name'] = 'detail';
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['customer_name_opt']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
                  <option value="<?php echo $_smarty_tpl->tpl_vars['customer_name_opt']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
" <?php echo $_smarty_tpl->tpl_vars['customer_name_opt']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['selected'];?>
> <?php echo $_smarty_tpl->tpl_vars['customer_name_opt']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['customer_name'];?>
 </option>
                  <?php endfor; endif; ?>
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
     <?php echo $_smarty_tpl->tpl_vars['info']->value;?>

     <br>
      

     <table class="table table-stripped table-hover" >
      <tr>  
          <td> <b>Contract Status </b> </td>
          <td> : </td>
          <td colspan="3"> <?php echo $_smarty_tpl->tpl_vars['contractstatus']->value;?>
 </td>
      </tr>
       <tr>  
          <td> <b>Customer Name </b> </td>
          <td> : </td>
          <td colspan="3"> <?php echo $_smarty_tpl->tpl_vars['namacustomer']->value;?>
 </td>
      </tr>
       <tr>  
          <td> <b>Month </b> </td>
          <td> : </td>
          <td> <?php echo $_smarty_tpl->tpl_vars['start_date']->value;?>
 </td>
          <td><b>To</b></td>
          <td> <?php echo $_smarty_tpl->tpl_vars['ending_date']->value;?>
 </td>
      </tr>
       
      </table>

    <!-- http://localhost:8081/pdct/print_matrik_administrasi.php-->
           
  <form name="print" method="POST" action="print_matrik_administrasi.php" target="_blank" enctype="multipart/form-data"> 
     <input type="hidden" name="id_customer_name" value="<?php echo $_smarty_tpl->tpl_vars['id_customer_name']->value;?>
">
     <input type="hidden" name="id_contract_status" value="<?php echo $_smarty_tpl->tpl_vars['id_contract_status']->value;?>
">
     <input type="hidden" name="start_date_send" value="<?php echo $_smarty_tpl->tpl_vars['start_date_send']->value;?>
">
     <input type="hidden" name="ending_date_send" value="<?php echo $_smarty_tpl->tpl_vars['ending_date_send']->value;?>
">
     

    <?php echo $_smarty_tpl->tpl_vars['btnprint']->value;?>

   
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

        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['detail'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['detail']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['name'] = 'detail';
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
        <tr style="font-size: 11px;">
        <td> 

        <?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['contract_number_file'];
$_tmp1=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['contract_number_file'];
$_tmp2=ob_get_clean();
if ($_tmp1 == ' ' || $_tmp2 == NULL) {?>
         <div class="btn btn-xs btn-danger"> File Tidak Ada / Belum Diupload</div>
         <?php } else { ?>
        
         <a href="doc_uploads/cn/<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['contract_number_file'];?>
" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; "><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['contract_number_file'];?>
 </a>
        <?php }?>
        </td>
        <td> <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['nama_pekerjaan'];?>
 </td>
        <td align="center"><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['cc_name'];?>
  </td>
        <td align="center"><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['start_date'];?>
 s/d <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['ending_date'];?>
  </td>
        <td align="center"><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['no_spk_p8_date_upload'];?>
  </td>
        <td align="center"><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['contract_date'];?>
  </td>
        <td align="center"><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['baso_date_upload'];?>
  </td>
        <td align="center"><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['bast_date_upload'];?>
  </td>
        <td align="center"><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['account_manager'];?>
 - <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['email'];?>
 - <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['phone'];?>
   </td>
        <td align="center"> <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['cid'];?>
 - <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['cid'];?>
  </td>
        </tr>
        <?php endfor; endif; ?>

        
     </table>
   </div>
   </div>
   </div>


    </div> <!-- /container -->

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