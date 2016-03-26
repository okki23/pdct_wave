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
              <h3 class="panel-title">Data Detail PDCT </h3>
            </div>
            <div class="panel-body">
          
            <br>
            <br>
             <table class="table table-striped table-hover">
             	<tr> 
                	<td> Nama Customer </td>
                    <td> : </td>
                    <td> {$customer_name} </td>
                </tr>
                <tr> 
                	<td> Project No </td>
                    <td> : </td>
                    <td> {$project_no} </td>
                </tr>
                 
                 <tr> 
                  <td> CC Name  </td>
                    <td> : </td>
                    <td> {$cc_name} </td>
                </tr>
                <tr> 
                  <td> Site Name </td>
                    <td> : </td>
                    <td> {$site_name} </td>
                </tr>
                <tr>
                <tr> 
                  <td> Site Code </td>
                    <td> : </td>
                    <td> {$site_code} </td>
                </tr>
                <tr> 
                <td> Contract Level </td>
                    <td> : </td>
                    <td> {$contract_level} </td>
                </tr>
                 
                <tr> 
                <td> Nama Pekerjaan </td>
                    <td> : </td>
                    <td> {$nama_pekerjaan} </td>
                </tr>
                 <tr> 
                <td> No. SPK/P8 </td>
                    <td> : </td>
                    {if {$no_spk_p8_file} == ""}
                    <td> <div class="alert alert-danger">File Tidak Ada / Belum Di Upload </div> </td>
                    {else}
                     <td> <a href="doc_uploads/spk/{$no_spk_p8_file}" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; ">{$no_spk_p8_file} </a> </td>
                    {/if}
                   
                </tr>


                <tr> 
                <td> Surat Kesanggupan </td>
                    <td> : </td>
                    {if {$surat_kesanggupan_file} == ""}
                    <td> <div class="alert alert-danger">File Tidak Ada / Belum Di Upload </div> </td>
                    {else}
                     <td> <a href="doc_uploads/sk/{$surat_kesanggupan_file}" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; ">{$surat_kesanggupan_file} </a> </td>
                    {/if}
                   
                </tr>

                <tr> 
                <td> Contract Number </td>
                    <td> : </td>
                    {if {$contract_number_file} == ""}
                    <td> <div class="alert alert-danger">File Tidak Ada / Belum Di Upload </div> </td>
                    {else}
                     <td> <a href="doc_uploads/cn/{$contract_number_file}" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; ">{$contract_number_file} </a> </td>
                    {/if}
                   
                </tr>

                <tr> 
                <td> BAST </td>
                    <td> : </td>
                    {if {$bast_file} == ""}
                    <td> <div class="alert alert-danger">File Tidak Ada / Belum Di Upload </div> </td>
                    {else}
                     <td> <a href="doc_uploads/bast/{$bast_file}" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; ">{$bast_file} </a> </td>
                    {/if}
                   
                </tr>

                <tr> 
                <td> BASO </td>
                    <td> : </td>
                    {if {$baso_file} == ""}
                    <td> <div class="alert alert-danger">File Tidak Ada / Belum Di Upload </div> </td>
                    {else}
                     <td> <a href="doc_uploads/baso/{$baso_file}" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; ">{$baso_file} </a> </td>
                    {/if}
                   
                </tr>

                 <tr> 
                  <td> Account No </td>
                    <td> : </td>
                    <td> {$account_no} </td>
                </tr>

                <tr> 
                  <td> SID </td>
                    <td> : </td>
                    <td> {$sid} </td>
                </tr>

                <tr> 
                  <td> CID </td>
                    <td> : </td>
                    <td> {$cid} </td>
                </tr>

                <tr> 
                  <td> Start Date </td>
                    <td> : </td>
                    <td> {$start_date} </td>
                </tr>

                <tr> 
                  <td> Ending Date </td>
                    <td> : </td>
                    <td> {$ending_date} </td>
                </tr>

                <tr> 
                  <td> Masa Kontrak </td>
                    <td> : </td>
                    <td> {$masa_kontrak} Bulan </td>
                </tr>

                 <tr> 
                  <td> Contract Status </td>
                    <td> : </td>
                    <td> {$contract_status} </td>
                </tr>

                <tr> 
                  <td> Account Manager </td>
                    <td> : </td>
                    <td> {$account_manager} </td>
                </tr>

                <tr> 
                  <td> Email </td>
                    <td> : </td>
                    <td> {$email} </td>
                </tr>

                <tr> 
                  <td> Phone </td>
                    <td> : </td>
                    <td> {$phone} </td>
                </tr>

                <tr> 
                  <td> OTC </td>
                    <td> : </td>
                    <td> Rp.{$otc} <p class="alert alert-info"> <b><i>Terbilang ( {$terbilang_otc} Rupiah )</b></i></p></td>
                </tr>

                <tr> 
                  <td> Monthly </td>
                    <td> : </td>
                    <td> Rp.{$monthly} <p class="alert alert-info"> <b><i>Terbilang ( {$terbilang_month} Rupiah )</b></i></p></td>
                </tr>

                <tr> 
                  <td> Total </td>
                    <td> : </td>
                    <td> Rp.{$total} <p class="alert alert-info"> <b><i>Terbilang ( {$terbilang_total} Rupiah )</b></i></p></td>
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






