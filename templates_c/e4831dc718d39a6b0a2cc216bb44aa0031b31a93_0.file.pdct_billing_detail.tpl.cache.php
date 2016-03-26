<?php /* Smarty version 3.1.24, created on 2016-02-18 08:07:03
         compiled from "./templates/pdct_billing_detail.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2109956c56d97a49295_05178314%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e4831dc718d39a6b0a2cc216bb44aa0031b31a93' => 
    array (
      0 => './templates/pdct_billing_detail.tpl',
      1 => 1455070113,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2109956c56d97a49295_05178314',
  'variables' => 
  array (
    'title' => 0,
    'end_user' => 0,
    'bill_periode' => 0,
    'fp_no_file' => 0,
    'bill_amount' => 0,
    'charge_stat' => 0,
    'paid_amount' => 0,
    'paid_status' => 0,
    'csc' => 0,
    'paid_csc' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56c56d97b18819_95326284',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56c56d97b18819_95326284')) {
function content_56c56d97b18819_95326284 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2109956c56d97a49295_05178314';
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
 type="text/javascript">
      $(document).ready(function() {
          $('#example').DataTable();
      } );
 
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
    <div style="margin-top:70px;">
    </div>
         <button onclick="history.go(-1);" class="btn btn-primary"> <i class="glyphicon glyphicon-arrow-left"> </i> Back </button>
         <br>
         <br>
       <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Data Detail PDCT Billing</h3>
            </div>
            <div class="panel-body">
            
            <br>
            <br>
             <table class="table table-striped table-hover">
             	<tr> 
                	<td> End User </td>
                    <td> : </td>
                    <td> <?php echo $_smarty_tpl->tpl_vars['end_user']->value;?>
 </td>
                </tr>
                  <tr> 
                  <td> Bill Periode </td>
                    <td> : </td>
                    <td> <?php echo $_smarty_tpl->tpl_vars['bill_periode']->value;?>
 </td>
                </tr>
                <tr> 
                	<td> FP No </td>
                    <td> : </td>
                   

                     <?php ob_start();
echo $_smarty_tpl->tpl_vars['fp_no_file']->value;
$_tmp1=ob_get_clean();
if ($_tmp1 == '') {?>
                    <td> <div class="alert alert-danger">File Tidak Ada / Belum Di Upload </div> </td>
                    <?php } else { ?>
                     <td> <a href="doc_uploads/fp_no/<?php echo $_smarty_tpl->tpl_vars['fp_no_file']->value;?>
" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; "><?php echo $_smarty_tpl->tpl_vars['fp_no_file']->value;?>
 </a> </td>
                    <?php }?>
                </tr>
                 <tr> 
                  <td> Bill Amount   </td>
                    <td> : </td>
                    <td> Rp.<?php echo $_smarty_tpl->tpl_vars['bill_amount']->value;?>
 </td>
                </tr>
                 <tr> 
                  <td> Charges  </td>
                    <td> : </td>
                    <td> <?php echo $_smarty_tpl->tpl_vars['charge_stat']->value;?>
 </td>
                </tr>
                <tr> 
                  <td> Paid Amount </td>
                    <td> : </td>
                    <td> Rp.<?php echo $_smarty_tpl->tpl_vars['paid_amount']->value;?>
 </td>
                </tr>
                <tr>
                <tr> 
                  <td> Paid Status </td>
                    <td> : </td>
                    <td> 
                    <?php ob_start();
echo $_smarty_tpl->tpl_vars['paid_status']->value;
$_tmp2=ob_get_clean();
if ($_tmp2 == 'N') {?>
                      No / Belum Dibayar
                    <?php } else { ?>
                      Yes / Sudah Dibayar
                    <?php }?>
                    
                    </td>
                </tr>
                <tr> 
                <td> CSC </td>
                    <td> : </td>
                    <td> Rp.<?php echo $_smarty_tpl->tpl_vars['csc']->value;?>
 </td>
                </tr>
                 
                <tr> 
                <td> Paid CSC </td>
                    <td> : </td>
                    <td>   <?php ob_start();
echo $_smarty_tpl->tpl_vars['paid_csc']->value;
$_tmp3=ob_get_clean();
if ($_tmp3 == 'N') {?>
                      No / Belum Dibayar
                    <?php } else { ?>
                      Yes / Sudah Dibayar
                    <?php }?>
                     </td>
                </tr>
                
                
             </table>
            </div>
          </div>
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