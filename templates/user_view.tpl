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

   {include file="header.tpl"}

    <div class="container theme-showcase" role="main">

          <div class="container">
    <div class="row">
    <div class="col-md-12">
    <div style="margin-top:50px;">
    </div>


        <div class="jumbotron">
        <div align="right">
        <img src="images/logo.gif">
        <h2>Manajemen User</h2>
        </div>

        </div>
        
        <a href="?act=Add" class="btn btn-primary"> + Tambah Data</a>
        <br>
        &nbsp;
           <table id="example" class="table table-striped table-bordered table-hover" style="width:100%;">
              <thead style="background-color:#FFF; font-size: 12px;">
                <tr>
                  
                  <th style="width:10%;" align="center">Nama User</th>
                  <th style="width:10%;" align="center">Username</th>
                  <th style="width:10%;" align="center">Level</th>
                
                   
                  <th style="width:8%;" align="center">Opsi</th>
                  
     
                </tr>
                </thead>
                
                <tbody>
                {section name = detail loop = $list}
                <tr style="font-size: 12px;">
                
               <td style="width:10%;">{$list[detail].nama_pegawai}  </td>
                <td style="width:10%;"> {$list[detail].username} </td>
                <td style="width:10%;"> {$list[detail].level_user} </td>
             
                  
                <td style="width:8%;" align="center"> 
                <a href="m_user.php?id={$list[detail].id}&act=Update" title="Edit" class="btn btn-xs btn-info"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="m_user.php?id={$list[detail].id}&act=Delete" title="Hapus" class="btn btn-xs btn-danger"> <i class="glyphicon glyphicon-trash"> </i> </a> 
           
                 
                </td>

                
                  
                </tr>
                {/section}
                </tbody>
                
                
              
              </table>
   </div>
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






