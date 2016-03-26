<?php /* Smarty version 3.1.24, created on 2016-03-15 11:55:50
         compiled from "./templates/pdct_billing_view.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1054556e7ea36ac5358_38022467%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82b9e306e769c16dffeaa7ad0ced7b4a114f5dfc' => 
    array (
      0 => './templates/pdct_billing_view.tpl',
      1 => 1458039228,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1054556e7ea36ac5358_38022467',
  'variables' => 
  array (
    'title' => 0,
    'idcontract' => 0,
    'idcust' => 0,
    'project_no' => 0,
    'customer_name' => 0,
    'cc_name' => 0,
    'site_name' => 0,
    'site_code' => 0,
    'nama_pekerjaan' => 0,
    'starting' => 0,
    'contract_date' => 0,
    'contract_level' => 0,
    'contract_status' => 0,
    'ending' => 0,
    'acc_manager' => 0,
    'level_user' => 0,
    'databill' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56e7ea36ba1441_72199258',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56e7ea36ba1441_72199258')) {
function content_56e7ea36ba1441_72199258 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1054556e7ea36ac5358_38022467';
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
        <h2>Data PDCT Billing</h2>
        </div>

        </div>
        <br>
        <input type="hidden" name="idcontract" value="<?php echo $_smarty_tpl->tpl_vars['idcontract']->value;?>
">
        <input type="hidden" name="idcust" value="<?php echo $_smarty_tpl->tpl_vars['idcust']->value;?>
">
        <button type="submit" class="btn btn-primary" onclick="window.location='?idcust=<?php echo $_smarty_tpl->tpl_vars['idcust']->value;?>
&act=DetailContract';"> <i class="glyphicon glyphicon-arrow-left"> </i> Kembali</button>
   
       
 
        <br>
        <br>
        <br>
            <div class="col-md-12">

            <div class="panel panel-primary">
              <div class="panel-heading">Detail Customer</div>
              <div class="panel-body">
                   <div class="col-md-6">
                   <table class="table table-stripped table-hover">
                    <tr>  
                      <td> Project No </td>
                      <td> : </td>
                      <td> <?php echo $_smarty_tpl->tpl_vars['project_no']->value;?>
 </td>
                    </tr>
                     <tr>  
                      <td> Customer Name </td>
                      <td> : </td>
                      <td> <?php echo $_smarty_tpl->tpl_vars['customer_name']->value;?>
</td>
                    </tr>
                   
                  </table>
                  </div>

                   <div class="col-md-6">
                   <table class="table table-stripped table-hovered">
                     <tr>  
                      <td> CC Name </td>
                      <td> : </td>
                      <td> <?php echo $_smarty_tpl->tpl_vars['cc_name']->value;?>
 </td>
                    </tr>
                      <tr>  
                      <td> Site Name </td>
                      <td> : </td>
                      <td> <?php echo $_smarty_tpl->tpl_vars['site_name']->value;?>
 </td>
                    </tr>
                    
                  </table>
                  </div>
              </div>
              </div>

              </div>
       

       <div class="col-md-12">

            <div class="panel panel-primary">
              <div class="panel-heading">Detail Contract</div>
              <div class="panel-body">
                   <div class="col-md-6">
                   <table class="table table-stripped table-hover">
                    <tr>  
                      <td> Site Code </td>
                      <td> : </td>
                      <td> <?php echo $_smarty_tpl->tpl_vars['site_code']->value;?>
 </td>
                    </tr>
                     <tr>  
                      <td> Nama Pekerjaan </td>
                      <td> : </td>
                      <td> <?php echo $_smarty_tpl->tpl_vars['nama_pekerjaan']->value;?>
</td>
                    </tr>

                     <tr>  
                      <td> Starting </td>
                      <td> : </td>
                      <td> <?php echo $_smarty_tpl->tpl_vars['starting']->value;?>
 </td>
                    </tr>
                    
                    <tr>  
                      <td> Contract Date </td>
                      <td> : </td>
                      <td> <?php echo $_smarty_tpl->tpl_vars['contract_date']->value;?>
 </td>
                    </tr>
                   
                  </table>
                  </div>

                   <div class="col-md-6">
                   <table class="table table-stripped table-hovered">
                     <tr>  
                      <td> Contract Level </td>
                      <td> : </td>
                      <td> <?php echo $_smarty_tpl->tpl_vars['contract_level']->value;?>
 </td>
                    </tr>
                    <tr>  
                      <td> Contract Status </td>
                      <td> : </td>
                      <td> <?php echo $_smarty_tpl->tpl_vars['contract_status']->value;?>
 </td>
                    </tr>
                    <tr>  
                      <td> Ending </td>
                      <td> : </td>
                      <td> <?php echo $_smarty_tpl->tpl_vars['ending']->value;?>
 </td>
                    </tr>
                     <tr>  
                      <td> Account Manager </td>
                      <td> : </td>
                      <td> <?php echo $_smarty_tpl->tpl_vars['acc_manager']->value;?>
 </td>
                    </tr>
                    
                  </table>
                  </div>
              </div>
              </div>

              </div>
       
        </div>


        
        <br>
        <?php ob_start();
echo $_smarty_tpl->tpl_vars['level_user']->value;
$_tmp1=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['level_user']->value;
$_tmp2=ob_get_clean();
if ($_tmp1 == 'Administrator' || $_tmp2 == 'Billing') {?>

         <a href="?act=DetailBillingAdd&idcust=<?php echo $_smarty_tpl->tpl_vars['idcust']->value;?>
&idcont=<?php echo $_smarty_tpl->tpl_vars['idcontract']->value;?>
" class="btn btn-primary"> + Tambah Data Billing </a>

        <?php } else { ?>

        <?php }?>
         <br>
         <br>
           <table id="example" class="table table-striped table-bordered table-hover" style="width:100%;">
              <thead style="background-color:#FFF; font-size: 12px;">
                <tr>
                  
                  <th style="width:2%;" align="center">No</th>
                  <th style="width:8%;" align="center">Status KD</th>
                  <th style="width:8%;" align="center">End User</th>
                  <th style="width:8%;" align="center">Bill Periode</th>
                  <th style="width:8%;" align="center">Bill Amount</th>
                  <th style="width:5%;" align="center">Charges</th>
                  <th style="width:8%;" align="center">Paid</th>
               
                  <th style="width:8%;" align="center">Opsi</th>
                  
     
                </tr>
                </thead>
                
                <tbody>
        
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['detail'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['detail']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['name'] = 'detail';
$_smarty_tpl->tpl_vars['smarty']->value['section']['detail']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['databill']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
                 
                <td style="width:2%;"> <?php echo $_smarty_tpl->tpl_vars['databill']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['no'];?>
</td>
                <td style="width:2%;" align="center"> 

                 <?php ob_start();
echo $_smarty_tpl->tpl_vars['databill']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['kondisi'];
$_tmp3=ob_get_clean();
if ($_tmp3 == 'NF') {?>
                        <img src="images/false.png" style="width: 30%;" align="center">
                      <?php } else { ?>
                        <img src="images/true.png" style="width: 30%;" align="center">
                      <?php }?> 
                      </td>
                <td style="width:8%;"> <?php echo $_smarty_tpl->tpl_vars['databill']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['end_user'];?>
</td>
                <td style="width:8%;"> <?php echo $_smarty_tpl->tpl_vars['databill']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['bill_periode'];?>
</td>            
                <td style="width:8%;"> Rp.<?php echo $_smarty_tpl->tpl_vars['databill']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['bill_amount'];?>
</td>
                <td style="width:5%;"> <?php echo $_smarty_tpl->tpl_vars['databill']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['charges'];?>
</td>
                <td style="width:8%;"> 
                <?php ob_start();
echo $_smarty_tpl->tpl_vars['databill']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['paid_status'];
$_tmp4=ob_get_clean();
if ($_tmp4 == 'Y') {?>
                Yes / Sudah Bayar
                <?php } else { ?>
                No / Belum Bayar
                <?php }?>
                 </td>
                 

                 <?php ob_start();
echo $_smarty_tpl->tpl_vars['level_user']->value;
$_tmp5=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['level_user']->value;
$_tmp6=ob_get_clean();
if ($_tmp5 == 'Administrator' || $_tmp6 == 'Billing') {?>
                 <td style="width:8%;" align="center"> 
                  <a href="master_pdct.php?act=DetailBillingUpdate&id=<?php echo $_smarty_tpl->tpl_vars['databill']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&idcust=<?php echo $_smarty_tpl->tpl_vars['databill']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id_customer'];?>
&idcont=<?php echo $_smarty_tpl->tpl_vars['databill']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id_contract'];?>
" title="Edit"  class="btn btn-xs btn-warning"> <i class="glyphicon glyphicon-pencil"> </i> </a>

                <a href="master_pdct.php?act=DetailBillingDelete&id=<?php echo $_smarty_tpl->tpl_vars['databill']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&idcust=<?php echo $_smarty_tpl->tpl_vars['databill']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id_customer'];?>
&idcont=<?php echo $_smarty_tpl->tpl_vars['databill']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id_contract'];?>
" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-xs btn-danger"> <i class="glyphicon glyphicon-trash"> </i> </a>

                <a href="master_pdct.php?act=DetailBillingDetail&id=<?php echo $_smarty_tpl->tpl_vars['databill']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&idcust=<?php echo $_smarty_tpl->tpl_vars['databill']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id_customer'];?>
&idcont=<?php echo $_smarty_tpl->tpl_vars['databill']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id_contract'];?>
" title="Detail"  class="btn btn-xs btn-default"> <i class="glyphicon glyphicon-file"> </i> </a>

                 </td>
                 <?php } else { ?>
                <td style="width:8%;" align="center"> 
                 

                <a href="master_pdct.php?act=DetailBillingDetail&id=<?php echo $_smarty_tpl->tpl_vars['databill']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&idcust=<?php echo $_smarty_tpl->tpl_vars['databill']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id_customer'];?>
&idcont=<?php echo $_smarty_tpl->tpl_vars['databill']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id_contract'];?>
" title="Detail"  class="btn btn-xs btn-default"> <i class="glyphicon glyphicon-file"> </i> 
                </a>

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