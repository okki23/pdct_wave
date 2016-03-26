<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
 

    <title>{$title}</title>

     <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="bootstrap/dist/signin.css">
     <link rel="stylesheet" type="text/css" href="assets/dataTables.bootstrap.min.css">
     <script src="assets/jquery-1.10.2.js"> </script>
     <script src="bootstrap/dist/js/bootstrap.min.js"> </script>
     <script src="assets/jquery.dataTables.min.js"> </script>
     <script src="assets/dataTables.bootstrap.min.js"> </script>
     <script type="text/javascript">
      $(document).ready(function() {
          $('#example').DataTable();
      } );
 
    </script>

     
 
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
        <p class="text-muted"> {$footer}</p>
      </div>
    </footer>

    
     
  </body>
</html>






