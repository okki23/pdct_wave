<?php /* Smarty version 3.1.24, created on 2016-02-18 05:42:06
         compiled from "./templates/login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2690256c54b9eea72d6_46827839%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3c78a5f6be9fe78f97358819c0d31038ab0de3d' => 
    array (
      0 => './templates/login.tpl',
      1 => 1453048110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2690256c54b9eea72d6_46827839',
  'variables' => 
  array (
    'title' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56c54b9ef3eff8_38321827',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56c54b9ef3eff8_38321827')) {
function content_56c54b9ef3eff8_38321827 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2690256c54b9eea72d6_46827839';
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
     <link rel="stylesheet" type="text/css" href="bootstrap/dist/signin.css">
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

     

    <div class="container theme-showcase" role="main">
    <div class="container">
    <div class="row">
    <div align="center">
      <img src="images/logo.gif">
    </div>
      <h2 align="center"> Program Aplikasi PDCT</h2>
     <form class="form-signin" method="POST" action="index.php?act=Auth_Login" enctype="multipart/form-data">

        <h4 class="form-signin-heading" align="center">Silahkan Login Untuk Masuk</h4>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" class="form-control" placeholder="Username" name="username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password" required>
         
        <button class="btn btn-lg btn-primary btn-block" type="submit"> <i class="glyphicon glyphicon-circle-arrow-right"> </i> Masuk</button>
      </form>

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