<?php /* Smarty version 3.1.24, created on 2016-03-15 11:47:54
         compiled from "./templates/pdct_contract_detail_view.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:309556e7e85a66c7f0_15548454%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '101d1920cc790883bbb51320d7bdd2ec68853239' => 
    array (
      0 => './templates/pdct_contract_detail_view.tpl',
      1 => 1458038866,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '309556e7e85a66c7f0_15548454',
  'variables' => 
  array (
    'title' => 0,
    'idcust' => 0,
    'project_no' => 0,
    'customer_name' => 0,
    'cc_name' => 0,
    'site_name' => 0,
    'list' => 0,
    'level_user' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56e7e85a799e19_07889669',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56e7e85a799e19_07889669')) {
function content_56e7e85a799e19_07889669 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '309556e7e85a66c7f0_15548454';
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
        <h2>Data PDCT Kontrak</h2>
        </div>

        </div>
        <br>
        <input type="hidden" name="idcust" value="<?php echo $_smarty_tpl->tpl_vars['idcust']->value;?>
">
        <button type="submit" class="btn btn-primary" onclick="window.location='master_pdct.php';"> <i class="glyphicon glyphicon-arrow-left"> </i> Kembali</button>
   
       
 
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
                      <td> No Project </td>
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
       
        </div>
        
        <br>

         <a href="?act=DetailContractAdd&idcust=<?php echo $_smarty_tpl->tpl_vars['idcust']->value;?>
" class="btn btn-primary"> + Tambah Data Kontrak </a>
         <br>
         <br>
           <table id="example" class="table table-striped table-bordered table-hover" style="width:100%;">
              <thead style="background-color:#FFF; font-size: 12px;">
                <tr>
                  
                  <th style="width:3%;" align="center">Status KD</th>
                  <th style="width:8%;" align="center">Site Code</th>
                  <th style="width:8%;" align="center">Contract Level</th>
                  <th style="width:18%;" align="center">Nama Pekerjaan </th>
 
                  <th style="width:10%;" align="center">Starting</th>
                  <th style="width:10%;" align="center">Ending</th>
                  <th style="width:10%;" align="center">Contract Status</th>
                  <th style="width:12%;" align="center">Opsi</th>
                  
     
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
                 
                

                <?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['selisih'];
$_tmp1=ob_get_clean();
if ($_tmp1 <= 90) {?>
                <td style="width:3%;" class="alert alert-danger" align="center">

                      <?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['kondisi'];
$_tmp2=ob_get_clean();
if ($_tmp2 == 'NF') {?>
                        <img src="images/false.png" style="width: 30%;" align="center">
                      <?php } else { ?>
                        <img src="images/true.png" style="width: 30%;" align="center">
                      <?php }?> 

                </td>
                <td style="width:8%;" class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['site_code'];?>
   </td>
                <td style="width:8%;" class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['contract_level'];?>
  </td>
                <td style="width:18%;" class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['nama_pekerjaan'];?>
 </td>
               
                <td style="width:10%;" class="alert alert-danger"> <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['starting'];?>
   </td>
                <td style="width:10%;" class="alert alert-danger"> <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['ending'];?>
 </td>
                <td style="width:10%;" class="alert alert-danger"> <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['contract_status'];?>
 </td>


                    <?php ob_start();
echo $_smarty_tpl->tpl_vars['level_user']->value;
$_tmp3=ob_get_clean();
if ($_tmp3 == 'Administrator') {?>
                    <td style="width:12%;" class="alert alert-danger" align="center"> 
                     
                    

                    <a href="master_pdct.php?id=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&act=DetailContractUpdate&idcust=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['idcust'];?>
" class="btn btn-xs btn-warning" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>

                    <a href="master_pdct.php?act=DetailContractDelete&id=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&idcust=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['idcust'];?>
" class="btn btn-xs btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a>

                    <a href="master_pdct.php?id=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&act=DetailList&idcust=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['idcust'];?>
" class="btn btn-xs btn-default" title="Detail"> <i class="glyphicon glyphicon-file"> </i> </a>

                     <a href="master_pdct.php?idcont=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&act=DetailBilling&idcust=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['idcust'];?>
" class="btn btn-xs btn-success" title="Billing"> <i class="glyphicon glyphicon-usd"> </i> </a>


                   
                    </td>

                 
                    <?php } else { ?>


                    <td style="width:12%;" class="alert alert-danger" align="center">            
                     <?php ob_start();
echo $_smarty_tpl->tpl_vars['level_user']->value;
$_tmp4=ob_get_clean();
if ($_tmp4 == 'Billing') {?>
                     <a href="master_pdct.php?id=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&act=BillingContractUpdate&idcust=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['idcust'];?>
" class="btn btn-xs btn-warning" title="Billing Contract Update"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                     <?php } else { ?>
                     <?php }?>

                     
                     <?php ob_start();
echo $_smarty_tpl->tpl_vars['level_user']->value;
$_tmp5=ob_get_clean();
if ($_tmp5 == 'Sales') {?>
                     <a href="master_pdct.php?id=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&act=DetailContractUpdate&idcust=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['idcust'];?>
" class="btn btn-xs btn-warning" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                     <?php } else { ?>

                     <?php }?>
     
                    <a href="master_pdct.php?id=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&act=DetailList&idcust=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['idcust'];?>
" class="btn btn-xs btn-default" title="Detail"> <i class="glyphicon glyphicon-file"> </i> </a>

                     <a href="master_pdct.php?idcont=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&act=DetailBilling&idcust=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['idcust'];?>
" class="btn btn-xs btn-success" title="Billing"> <i class="glyphicon glyphicon-usd"> </i> </a>
                     </td>

                   
                    <?php }?>



                    

                    



                <?php } else { ?>
                <td style="width:3%;" align="center">

                      <?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['kondisi'];
$_tmp6=ob_get_clean();
if ($_tmp6 == 'NF') {?>
                        <img src="images/false.png" style="width: 30%;" align="center">
                      <?php } else { ?>
                        <img src="images/true.png" style="width: 30%;" align="center">
                      <?php }?> 

                </td>
                <td style="width:8%;" ><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['site_code'];?>
 </td>
                <td style="width:8%;" ><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['contract_level'];?>
  </td>
                <td style="width:18%;" ><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['nama_pekerjaan'];?>
</td>
              
                <td style="width:10%;" > <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['starting'];?>
   </td>
                <td style="width:10%;" > <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['ending'];?>
 </td>
                 <td style="width:10%;"> <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['contract_status'];?>
 </td>

                 

                 <?php ob_start();
echo $_smarty_tpl->tpl_vars['level_user']->value;
$_tmp7=ob_get_clean();
if ($_tmp7 == 'Administrator') {?>
                  <td style="width:12%;" align="center"> 
                 
               

                  <a href="master_pdct.php?id=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&act=DetailContractUpdate&idcust=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['idcust'];?>
" class="btn btn-xs btn-warning" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>

                <a href="master_pdct.php?act=DetailContractDelete&id=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&idcust=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['idcust'];?>
" class="btn btn-xs btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a>

                <a href="master_pdct.php?id=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&act=DetailList&idcust=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['idcust'];?>
" class="btn btn-xs btn-default" title="Detail"> <i class="glyphicon glyphicon-file"> </i> </a>
               
                 <a href="master_pdct.php?idcont=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&act=DetailBilling&idcust=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['idcust'];?>
" class="btn btn-xs btn-success" title="Billing"> <i class="glyphicon glyphicon-usd"> </i> </a>
                
                


               
                </td>
                  <?php } else { ?>

                  <td style="width:12%;" align="center"> 
                 
                    <?php ob_start();
echo $_smarty_tpl->tpl_vars['level_user']->value;
$_tmp8=ob_get_clean();
if ($_tmp8 == 'Billing') {?>
                     <a href="master_pdct.php?id=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&act=BillingContractUpdate&idcust=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['idcust'];?>
" class="btn btn-xs btn-warning" title="Billing Contract Update"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                     <?php } else { ?>
                     <?php }?> 

                     <?php ob_start();
echo $_smarty_tpl->tpl_vars['level_user']->value;
$_tmp9=ob_get_clean();
if ($_tmp9 == 'Sales') {?>
                     <a href="master_pdct.php?id=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&act=DetailContractUpdate&idcust=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['idcust'];?>
" class="btn btn-xs btn-warning" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                     <?php } else { ?>

                     <?php }?>

                  
                <a href="master_pdct.php?id=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&act=DetailList&idcust=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['idcust'];?>
" class="btn btn-xs btn-default" title="Detail"> <i class="glyphicon glyphicon-file"> </i> </a>

                 <a href="master_pdct.php?idcont=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['id'];?>
&act=DetailBilling&idcust=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['detail']['index']]['idcust'];?>
" class="btn btn-xs btn-success" title="Billing"> <i class="glyphicon glyphicon-usd"> </i> </a>


               
                </td>

                

                 <?php }?>

                  
                  

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
                <p class="btn btn-danger"> Warna Merah  = Kontrak Warning Kurang Dari 90 Hari (3 Bulan)  </p> 
                <br>
                <br>
                <p class="btn btn-default"> Warna Putih  = Kontrak Aman Dari 90 Hari (3 Bulan) </p> 
                <br>
                <br>
                <p class="btn btn-xs btn-danger">Tanda Silang = Field Data Masih ada yang Kosong  </p> 
                <br>
                <br>
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