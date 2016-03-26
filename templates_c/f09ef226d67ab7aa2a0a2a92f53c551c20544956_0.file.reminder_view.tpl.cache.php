<?php /* Smarty version 3.1.24, created on 2016-02-18 08:37:23
         compiled from "./templates/reminder_view.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:395056c574b3f20057_40174967%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f09ef226d67ab7aa2a0a2a92f53c551c20544956' => 
    array (
      0 => './templates/reminder_view.tpl',
      1 => 1455755208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '395056c574b3f20057_40174967',
  'variables' => 
  array (
    'title' => 0,
    'list' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56c574b409fce7_37540389',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56c574b409fce7_37540389')) {
function content_56c574b409fce7_37540389 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '395056c574b3f20057_40174967';
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
    <div style="margin-top:50px;">
    </div>
       
        <div class="jumbotron">
        <div align="right">
        <img src="images/logo.gif">
        <h2>Reminder Contract PDCT</h2>
        </div>

        </div>
        
        &nbsp;
           <table id="example" class="table table-striped table-bordered table-hover" style="width:100%;">
              <thead style="background-color:#FFF;">
                <tr>
                  
                  <th style="width:4%;" align="center">Site Code</th>
                  <th style="width:4%;" align="center">Contract Level</th>
                  <th style="width:20%;" align="center">Nama Pekerjaan </th>
                  <th style="width:5%;" align="center">Contract Status </th>
                  <th style="width:5%;" align="center">Starting</th>
                  <th style="width:5%;" align="center">Ending</th>
                  <th style="width:3%;" align="center">Opsi</th>
                  
     
                </tr>
                </thead>
                
                <tbody>
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

                <?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['is_sent'];
$_tmp1=ob_get_clean();
if ($_tmp1 == "Y") {?>
                <tr>
                <td style="width:4%;" class="alert alert-info" align="center"><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['site_code'];?>
  </td>
                <td style="width:4%;" class="alert alert-info" align="center" ><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['contract_level'];?>
  </td>
                <td style="width:20%;" class="alert alert-info" > <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['nama_pekerjaan'];?>
 </td>
                <td style="width:5%;" class="alert alert-info" align="center"> <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['contract_status'];?>
 </td>
                <td style="width:5%;" class="alert alert-info" align="center"> <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['starting'];?>
 </td>
                <td style="width:5%;" class="alert alert-info" align="center" > <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['ending'];?>
 </td>
     
                <td style="width:3%;" class="alert alert-info" align="center"> 
                <a href="reminder.php?id=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&act=ContractReminderDetail" title="Detail Kontrak" class="btn btn-xs btn-info"> <i class="glyphicon glyphicon-bookmark"> </i> </a>

                <a href="reminder.php?id=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&act=ContractReminderSendMail" title="Kirim Email Reminder" class="btn btn-xs btn-danger"> <i class="glyphicon glyphicon-envelope"> </i> </a>                             
                </td>
                </tr>
                <?php } else { ?>

                <tr>
                <td style="width:4%;" align="center"><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['site_code'];?>
  </td>
                <td style="width:4%;" align="center" ><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['contract_level'];?>
  </td>
                <td style="width:20%;" > <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['nama_pekerjaan'];?>
 </td>
                <td style="width:5%;" align="center"> <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['contract_status'];?>
 </td>
                <td style="width:5%;" align="center"> <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['starting'];?>
 </td>
                <td style="width:5%;" align="center" > <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['ending'];?>
 </td>
     
                <td style="width:3%;" align="center"> 
                <a href="reminder.php?id=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&act=ContractReminderDetail" title="Detail Kontrak" class="btn btn-xs btn-info"> <i class="glyphicon glyphicon-bookmark"> </i> </a>

                <a href="reminder.php?id=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&act=ContractReminderSendMail" title="Kirim Email Reminder" class="btn btn-xs btn-danger"> <i class="glyphicon glyphicon-envelope"> </i> </a>                             
                </td>
                </tr>

                <?php }?>
                <?php endfor; endif; ?>
                </tbody>
                
                
              
              </table>

              <div class="panel panel-success">  
                <div class="panel-heading">
                Informasi :
                </div>
                <div class="panel-body">
                <p class="btn btn-primary"> Warna Biru = Email Sudah Dikirim </p>
                <p class="btn btn-default"> Warna Putih = Email Belum Dikirim </p>
                 
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