<?php /* Smarty version 3.1.24, created on 2016-02-18 10:07:45
         compiled from "./templates/master_email_message_add.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:924156c589e1332c49_88927067%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d4f03f0b5a1c671e051c41142957b5e8af5b195' => 
    array (
      0 => './templates/master_email_message_add.tpl',
      1 => 1455786182,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '924156c589e1332c49_88927067',
  'variables' => 
  array (
    'title' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56c589e1398667_03371473',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56c589e1398667_03371473')) {
function content_56c589e1398667_03371473 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '924156c589e1332c49_88927067';
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
 
     <link rel="stylesheet" type="text/css" href="assets/dataTables.bootstrap.min.css">
      
     <?php echo '<script'; ?>
 src="ckeditor/ckeditor.js"> <?php echo '</script'; ?>
>
 
    
    

 
    <?php echo '<script'; ?>
 type="text/javascript">
    if ( typeof CKEDITOR == 'undefined' )
    {
  document.write(
    'CKEditor not found');
}
else
{
  var editor = CKEDITOR.replace( 'editor1' ); 

  
  CKFinder.setupCKEditor( editor, '' ) ;

  
}
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

  <div class="alert alert-info"> <h3 align="center">Tambah Pesan Email </h3></div>
     <button onclick="history.go(-1);" class="btn btn-primary"> <i class="glyphicon glyphicon-arrow-left"> </i> Back </button>
     <br>
     <br>
     <form action="?act=ProAdd" method="POST" enctype="multipart/form-data" name="myForm">
    
   
    <div class="panel panel-primary">
    <div class="panel-heading">Editor Pesan Email</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-6 small">
       

            <div class="form-group">
              <label  class="col-sm-3"> Pesan Email </label>

              <div class="col-sm-9">
              <textarea id="editor1" name="pesan_email" rows="10" class="form-control" cols="80"> </textarea>
              </div>

             
            </div>

            <br>
            <br>
            &nbsp;

            <div class="form-group">
              <label  class="col-sm-3"> Set Active </label>

              <div class="col-sm-9">
               <select name="active" class="form-control">
                 <option value="" selected="selected">--Pilih--</option>
                 <option value="Y">Yes</option>
                 <option value="N">No</option>
               </select>
              </div>

             
            </div>

 
        </div><!--col-md-6-->
        <div class="col-md-6 small">
          
             
            


 
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