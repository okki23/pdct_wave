<?php /* Smarty version 3.1.24, created on 2016-03-09 15:40:19
         compiled from "./templates/pdct_detail.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1972056e035d3e52588_61028332%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7a22fbf6c393f5ad77d8812557bdbb208e1cbcf' => 
    array (
      0 => './templates/pdct_detail.tpl',
      1 => 1457534418,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1972056e035d3e52588_61028332',
  'variables' => 
  array (
    'title' => 0,
    'customer_name' => 0,
    'project_no' => 0,
    'cc_name' => 0,
    'site_name' => 0,
    'site_code' => 0,
    'contract_level' => 0,
    'nama_pekerjaan' => 0,
    'no_spk_p8_file' => 0,
    'surat_kesanggupan_file' => 0,
    'contract_number_file' => 0,
    'bast_file' => 0,
    'baso_file' => 0,
    'account_no' => 0,
    'sid' => 0,
    'cid' => 0,
    'start_date' => 0,
    'ending_date' => 0,
    'masa_kontrak' => 0,
    'contract_status' => 0,
    'account_manager' => 0,
    'email' => 0,
    'phone' => 0,
    'otc' => 0,
    'terbilang_otc' => 0,
    'monthly' => 0,
    'terbilang_month' => 0,
    'total' => 0,
    'terbilang_total' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56e035d3f22073_17774895',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56e035d3f22073_17774895')) {
function content_56e035d3f22073_17774895 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1972056e035d3e52588_61028332';
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
              <h3 class="panel-title">Data Detail PDCT </h3>
            </div>
            <div class="panel-body">
          
            <br>
            <br>
             <table class="table table-striped table-hover">
             	<tr> 
                	<td> Nama Customer </td>
                    <td> : </td>
                    <td> <?php echo $_smarty_tpl->tpl_vars['customer_name']->value;?>
 </td>
                </tr>
                <tr> 
                	<td> Project No </td>
                    <td> : </td>
                    <td> <?php echo $_smarty_tpl->tpl_vars['project_no']->value;?>
 </td>
                </tr>
                 
                 <tr> 
                  <td> CC Name  </td>
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
                <tr>
                <tr> 
                  <td> Site Code </td>
                    <td> : </td>
                    <td> <?php echo $_smarty_tpl->tpl_vars['site_code']->value;?>
 </td>
                </tr>
                <tr> 
                <td> Contract Level </td>
                    <td> : </td>
                    <td> <?php echo $_smarty_tpl->tpl_vars['contract_level']->value;?>
 </td>
                </tr>
                 
                <tr> 
                <td> Nama Pekerjaan </td>
                    <td> : </td>
                    <td> <?php echo $_smarty_tpl->tpl_vars['nama_pekerjaan']->value;?>
 </td>
                </tr>
                 <tr> 
                <td> No. SPK/P8 </td>
                    <td> : </td>
                    <?php ob_start();
echo $_smarty_tpl->tpl_vars['no_spk_p8_file']->value;
$_tmp1=ob_get_clean();
if ($_tmp1 == '') {?>
                    <td> <div class="alert alert-danger">File Tidak Ada / Belum Di Upload </div> </td>
                    <?php } else { ?>
                     <td> <a href="doc_uploads/spk/<?php echo $_smarty_tpl->tpl_vars['no_spk_p8_file']->value;?>
" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; "><?php echo $_smarty_tpl->tpl_vars['no_spk_p8_file']->value;?>
 </a> </td>
                    <?php }?>
                   
                </tr>


                <tr> 
                <td> Surat Kesanggupan </td>
                    <td> : </td>
                    <?php ob_start();
echo $_smarty_tpl->tpl_vars['surat_kesanggupan_file']->value;
$_tmp2=ob_get_clean();
if ($_tmp2 == '') {?>
                    <td> <div class="alert alert-danger">File Tidak Ada / Belum Di Upload </div> </td>
                    <?php } else { ?>
                     <td> <a href="doc_uploads/sk/<?php echo $_smarty_tpl->tpl_vars['surat_kesanggupan_file']->value;?>
" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; "><?php echo $_smarty_tpl->tpl_vars['surat_kesanggupan_file']->value;?>
 </a> </td>
                    <?php }?>
                   
                </tr>

                <tr> 
                <td> Contract Number </td>
                    <td> : </td>
                    <?php ob_start();
echo $_smarty_tpl->tpl_vars['contract_number_file']->value;
$_tmp3=ob_get_clean();
if ($_tmp3 == '') {?>
                    <td> <div class="alert alert-danger">File Tidak Ada / Belum Di Upload </div> </td>
                    <?php } else { ?>
                     <td> <a href="doc_uploads/cn/<?php echo $_smarty_tpl->tpl_vars['contract_number_file']->value;?>
" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; "><?php echo $_smarty_tpl->tpl_vars['contract_number_file']->value;?>
 </a> </td>
                    <?php }?>
                   
                </tr>

                <tr> 
                <td> BAST </td>
                    <td> : </td>
                    <?php ob_start();
echo $_smarty_tpl->tpl_vars['bast_file']->value;
$_tmp4=ob_get_clean();
if ($_tmp4 == '') {?>
                    <td> <div class="alert alert-danger">File Tidak Ada / Belum Di Upload </div> </td>
                    <?php } else { ?>
                     <td> <a href="doc_uploads/bast/<?php echo $_smarty_tpl->tpl_vars['bast_file']->value;?>
" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; "><?php echo $_smarty_tpl->tpl_vars['bast_file']->value;?>
 </a> </td>
                    <?php }?>
                   
                </tr>

                <tr> 
                <td> BASO </td>
                    <td> : </td>
                    <?php ob_start();
echo $_smarty_tpl->tpl_vars['baso_file']->value;
$_tmp5=ob_get_clean();
if ($_tmp5 == '') {?>
                    <td> <div class="alert alert-danger">File Tidak Ada / Belum Di Upload </div> </td>
                    <?php } else { ?>
                     <td> <a href="doc_uploads/baso/<?php echo $_smarty_tpl->tpl_vars['baso_file']->value;?>
" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; "><?php echo $_smarty_tpl->tpl_vars['baso_file']->value;?>
 </a> </td>
                    <?php }?>
                   
                </tr>

                 <tr> 
                  <td> Account No </td>
                    <td> : </td>
                    <td> <?php echo $_smarty_tpl->tpl_vars['account_no']->value;?>
 </td>
                </tr>

                <tr> 
                  <td> SID </td>
                    <td> : </td>
                    <td> <?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
 </td>
                </tr>

                <tr> 
                  <td> CID </td>
                    <td> : </td>
                    <td> <?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
 </td>
                </tr>

                <tr> 
                  <td> Start Date </td>
                    <td> : </td>
                    <td> <?php echo $_smarty_tpl->tpl_vars['start_date']->value;?>
 </td>
                </tr>

                <tr> 
                  <td> Ending Date </td>
                    <td> : </td>
                    <td> <?php echo $_smarty_tpl->tpl_vars['ending_date']->value;?>
 </td>
                </tr>

                <tr> 
                  <td> Masa Kontrak </td>
                    <td> : </td>
                    <td> <?php echo $_smarty_tpl->tpl_vars['masa_kontrak']->value;?>
 Bulan </td>
                </tr>

                 <tr> 
                  <td> Contract Status </td>
                    <td> : </td>
                    <td> <?php echo $_smarty_tpl->tpl_vars['contract_status']->value;?>
 </td>
                </tr>

                <tr> 
                  <td> Account Manager </td>
                    <td> : </td>
                    <td> <?php echo $_smarty_tpl->tpl_vars['account_manager']->value;?>
 </td>
                </tr>

                <tr> 
                  <td> Email </td>
                    <td> : </td>
                    <td> <?php echo $_smarty_tpl->tpl_vars['email']->value;?>
 </td>
                </tr>

                <tr> 
                  <td> Phone </td>
                    <td> : </td>
                    <td> <?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
 </td>
                </tr>

                <tr> 
                  <td> OTC </td>
                    <td> : </td>
                    <td> Rp.<?php echo $_smarty_tpl->tpl_vars['otc']->value;?>
 <p class="alert alert-info"> <b><i>Terbilang ( <?php echo $_smarty_tpl->tpl_vars['terbilang_otc']->value;?>
 Rupiah )</b></i></p></td>
                </tr>

                <tr> 
                  <td> Monthly </td>
                    <td> : </td>
                    <td> Rp.<?php echo $_smarty_tpl->tpl_vars['monthly']->value;?>
 <p class="alert alert-info"> <b><i>Terbilang ( <?php echo $_smarty_tpl->tpl_vars['terbilang_month']->value;?>
 Rupiah )</b></i></p></td>
                </tr>

                <tr> 
                  <td> Total </td>
                    <td> : </td>
                    <td> Rp.<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 <p class="alert alert-info"> <b><i>Terbilang ( <?php echo $_smarty_tpl->tpl_vars['terbilang_total']->value;?>
 Rupiah )</b></i></p></td>
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