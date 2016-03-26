<?php /* Smarty version 3.1.24, created on 2016-03-05 07:19:49
         compiled from "./templates/pdct_edit.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:3075156da7a85e50e00_80447364%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4cd9edcfc26b7d3378bd4699c51dfea26d985594' => 
    array (
      0 => './templates/pdct_edit.tpl',
      1 => 1457157736,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3075156da7a85e50e00_80447364',
  'variables' => 
  array (
    'title' => 0,
    'id' => 0,
    'customer_name' => 0,
    'id_customer_name' => 0,
    'project_no' => 0,
    'cc_name' => 0,
    'site_name' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56da7a85ef1e65_03001553',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56da7a85ef1e65_03001553')) {
function content_56da7a85ef1e65_03001553 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3075156da7a85e50e00_80447364';
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
    
    var inputan_cust_name = $("#inputan_cust_name").val();
    var idcust = $("#idcust").val();
    if(input_cust_name == ''){
      idcust.value = '';
    }
    
    <?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript">
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
      inputan_cust_name = document.getElementById('inputan_cust_name').value;
      
      if (inputan_cust_name == "")
      {
        document.getElementById("hasilcust").innerHTML = "";
        document.getElementById("idcust").value = "";
      }
      else
      {
        ajaxRequest.open("GET","autosuggest.php?inputan_cust_name="+inputan_cust_name);
        ajaxRequest.onreadystatechange = function()
        {
        document.getElementById("hasilcust").innerHTML = ajaxRequest.responseText;
        }
        ajaxRequest.send(null);
      }
    } 
    
    function autoInsert(id,nama_customer) //fungsi mengisi input text dengan hasil pencarian yang dipilih
    {
      document.getElementById("inputan_cust_name").value = nama_customer;
      document.myForm.idcust.value = id;
      document.getElementById("hasilcust").innerHTML = "";
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
  

    
  </head>

  <body role="document">

    <?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0);
?>


    <div class="container theme-showcase" role="main">

    
    <div class="row">
    <div class="col-md-12">

     <div style="margin-top:70px;">
     </div>

     <div class="alert alert-info"> <h3 align="center">Update Data PDCT Customer </h3></div>
      <button onclick="history.go(-1);" class="btn btn-primary"> <i class="glyphicon glyphicon-arrow-left"> </i> Back </button>

     <form action="master_pdct.php?act=ProUpdate" method="POST" enctype="multipart/form-data" name="myForm">
     
    
    
     <br>
     <br>
    <div class="panel panel-primary">
    <div class="panel-heading">Customer</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-6 small">
       

            <div class="form-group">
              <label  class="col-sm-3"> Customer Name </label>
              <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
              <div class="col-sm-9">
                <input type="text" name="cust_names" id="inputan_cust_name" class="form-control input-sm" autocomplete="off" onkeyup="autoComplete();" required="required" required="required" value="<?php echo $_smarty_tpl->tpl_vars['customer_name']->value;?>
">
              </div>

              <input type='hidden' id='idcust' name='id_cust_name' value='<?php echo $_smarty_tpl->tpl_vars['id_customer_name']->value;?>
'>

              <div style="margin-left:150px;">
              <div id="hasilcust"></div>
              </div>
             

            </div>

            <br>
            <br>


           <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Project No. </label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="project_no" value="<?php echo $_smarty_tpl->tpl_vars['project_no']->value;?>
" required="required">
              </div>

              
              </div>

            

            <br>
            <br>

   
        </div><!--col-md-6-->
        <div class="col-md-6 small">
              <?php ob_start();
echo $_smarty_tpl->tpl_vars['cc_name']->value;
$_tmp1=ob_get_clean();
if ($_tmp1 == '') {?>
             
                <div class="form-group">
            
                 <label  class="col-sm-3 form-control-static"> CC Name </label>
               
                   <div class="col-sm-9">
                     <input type="text" style="border-color: red; " class="form-control input-sm" name="cc_name" value="<?php echo $_smarty_tpl->tpl_vars['cc_name']->value;?>
" >
                   </div>
                
               
               </div>
              <?php } else { ?> 
                   <div class="form-group">
            
                 <label  class="col-sm-3 form-control-static"> CC Name </label>

                   <div class="col-sm-9">
                     <input type="text" class="form-control input-sm" name="cc_name" value="<?php echo $_smarty_tpl->tpl_vars['cc_name']->value;?>
" >
                   </div>
              
               </div>

              <?php }?>
              

            <br>
            <br>

             <?php ob_start();
echo $_smarty_tpl->tpl_vars['site_name']->value;
$_tmp2=ob_get_clean();
if ($_tmp2 == '') {?>
             <div class="form-group">
              <label  class="col-sm-3"> Site Name </label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" style="border-color: red; "  name="site_name" value="<?php echo $_smarty_tpl->tpl_vars['site_name']->value;?>
">
              </div>

            </div>
            <?php } else { ?>
            <div class="form-group">
              <label  class="col-sm-3"> Site Name </label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="site_name" value="<?php echo $_smarty_tpl->tpl_vars['site_name']->value;?>
">
              </div>

            </div>
            <?php }?>

            <br>
            <br>

 
             


 
        </div><!--col-md-6--> 
      </div><!--row--> 
     
    </div><!--panel-body--> 
  </div><!--panel panel-default--> 
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