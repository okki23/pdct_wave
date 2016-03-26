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
                    <td> {$end_user} </td>
                </tr>
                  <tr> 
                  <td> Bill Periode </td>
                    <td> : </td>
                    <td> {$bill_periode} </td>
                </tr>
                <tr> 
                	<td> FP No </td>
                    <td> : </td>
                   

                     {if {$fp_no_file} == ""}
                    <td> <div class="alert alert-danger">File Tidak Ada / Belum Di Upload </div> </td>
                    {else}
                     <td> <a href="doc_uploads/fp_no/{$fp_no_file}" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; ">{$fp_no_file} </a> </td>
                    {/if}
                </tr>
                 <tr> 
                  <td> Bill Amount   </td>
                    <td> : </td>
                    <td> Rp.{$bill_amount} </td>
                </tr>
                 <tr> 
                  <td> Charges  </td>
                    <td> : </td>
                    <td> {$charge_stat} </td>
                </tr>
                <tr> 
                  <td> Paid Amount </td>
                    <td> : </td>
                    <td> Rp.{$paid_amount} </td>
                </tr>
                <tr>
                <tr> 
                  <td> Paid Status </td>
                    <td> : </td>
                    <td> 
                    {if {$paid_status} == 'N'}
                      No / Belum Dibayar
                    {else}
                      Yes / Sudah Dibayar
                    {/if}
                    
                    </td>
                </tr>
                <tr> 
                <td> CSC </td>
                    <td> : </td>
                    <td> Rp.{$csc} </td>
                </tr>
                 
                <tr> 
                <td> Paid CSC </td>
                    <td> : </td>
                    <td>   {if {$paid_csc} == 'N'}
                      No / Belum Dibayar
                    {else}
                      Yes / Sudah Dibayar
                    {/if}
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
        <p class="text-muted"> {$footer}</p>
      </div>
    </footer>

    
     
  </body>
</html>






