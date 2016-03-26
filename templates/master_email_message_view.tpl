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
        <h2>Master Email Message</h2>
        </div>

        </div>
        <br>
        <input type="hidden" name="idcust" value="{$idcust}">
     
       
 
        
            <div class="col-md-12">

          
       
        </div>
        
        <br>

         <a href="?act=Add" class="btn btn-primary"> + Tambah Data </a>
         <br>
         <br>
           <table id="example" class="table table-striped table-bordered table-hover" style="width:100%;">
              <thead style="background-color:#FFF; font-size: 12px;">
                <tr>
                  
                  <th style="width:20%;" align="center">Pesan Email </th>
                  <th style="width:3%;" align="center" >Active </th>
                  <th style="width:3%;" align="center">Opsi </th>
                  
     
                </tr>
                </thead>
                
                <tbody>
                {section name = detail loop = $list}
                <tr style="font-size: 12px;">
                 
                
 
                 <td style="width:20%;" >{$list[detail].isi_email} </td>
                  <td style="width:3%;" align="center"> 
                  {if {$list[detail].active} == 'Y'}
                      Yes
                  {else}
                      No
                  {/if}
                    </td>
               
                <td style="width:3%;" align="center"> 
                 
               

                <a href="master_email_message.php?id={$list[detail].id}&act=Update"   class="btn btn-xs btn-warning" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>

                <a href="master_email_message.php?id={$list[detail].id}&act=Delete"  class="btn btn-xs btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a>          

               
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






