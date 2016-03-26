<?php /* Smarty version 3.1.24, created on 2016-03-22 11:05:58
         compiled from "./templates/pdct_view.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:3244856f0c4a6bcef44_07022572%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '151a11fafca959db64fa6aab46cdbbc12ab42304' => 
    array (
      0 => './templates/pdct_view.tpl',
      1 => 1458619557,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3244856f0c4a6bcef44_07022572',
  'variables' => 
  array (
    'title' => 0,
    'list' => 0,
    'level_user' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56f0c4a6c8b179_97642532',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56f0c4a6c8b179_97642532')) {
function content_56f0c4a6c8b179_97642532 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3244856f0c4a6bcef44_07022572';
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
        <h2>Data PDCT Customer</h2>
        </div>

        </div>
        <a href="?act=Add" class="btn btn-primary"> + Tambah Data</a>
        <br>
        &nbsp;
           <table id="example" class="table table-striped table-bordered table-hover" style="width:100%;">
              <thead style="background-color:#FFF;">
                <tr align="center">
                  
                  <th style="width:1%; font-size: 12px;" align="center">No</th>
                  <th style="width:10%; font-size: 12px;" align="center">Status KD</th>
                  <th style="width:10%; font-size: 12px;" align="center">Customer Name</th>
                  <th style="width:5%; font-size: 12px;" align="center">Project No</th>
                  <th style="width:7%; font-size: 12px;" align="center">CC Name</th>
                  <th style="width:10%; font-size: 12px;" align="center">Site Name </th>
 
                  <th style="width:4%; font-size: 12px;" align="center">Opsi</th>
                  
     
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
                <tr style="font-size: 12px;">
        
                <td style="width:1%;"  align="center"><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['no'];?>
  </td>
                 <td style="width:1%;" align="center">
                      
                      <?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['kondisi'];
$_tmp1=ob_get_clean();
if ($_tmp1 == '1') {?>
                      <img src="images/false.png" style="width: 30%;" align="center">
                      <?php } else { ?>
                        <img src="images/true.png" style="width: 30%;" align="center">
                      <?php }?>
                     
                      

                  </td>
                <td style="width:10%;"><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['customer_name'];?>
  </td>
                <td style="width:5%;"> <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['project_no'];?>
 </td>
                <td style="width:7%;"> <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['cc_name'];?>
 </td>
                <td style="width:10%;" > <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['site_name'];?>
 </td>
     

                <?php ob_start();
echo $_smarty_tpl->tpl_vars['level_user']->value;
$_tmp2=ob_get_clean();
if ($_tmp2 == 'Administrator') {?>
               <td style="width:4%;" align="center"  > 
                <a href="master_pdct.php?idcust=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&act=DetailContract" title="Detail Kontrak" class="btn btn-xs btn-info"> <i class="glyphicon glyphicon-bookmark"> </i> </a>
                <a href="master_pdct.php?id=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&act=Update" title="Edit" class="btn btn-xs btn-warning"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="master_pdct.php?id=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&act=Delete" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-xs btn-danger"> <i class="glyphicon glyphicon-trash"> </i> </a> 
                </td>
                <?php } else { ?>                

                 <td style="width:4%;" align="center"  > 
                <a href="master_pdct.php?idcust=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&act=DetailContract" title="Detail Kontrak" class="btn btn-xs btn-info"> <i class="glyphicon glyphicon-bookmark"> </i> </a>
                
                </td>

                <?php }?>

                
                  
                </tr>
                
               
                <?php endfor; endif; ?>
                </tbody>
                
                
              
              </table>

                 <div class="panel panel-success">  
                <div class="panel-heading">
                Informasi :
                </div>
                <div class="panel-body">
                
                <p class="btn btn-xs btn-danger">Tanda Silang = Field Data Masih ada yang Kosong  </p> 
                <p class="btn btn-xs btn-success">Tanda Ceklist = Field Data Sudah Terpenuhi Seluruhnya  </p> 
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