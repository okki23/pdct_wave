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
        <h2>Data PDCT Billing</h2>
        </div>

        </div>
        <br>
        <input type="hidden" name="idcontract" value="{$idcontract}">
        <input type="hidden" name="idcust" value="{$idcust}">
        <button type="submit" class="btn btn-primary" onclick="window.location='?idcust={$idcust}&act=DetailContract';"> <i class="glyphicon glyphicon-arrow-left"> </i> Kembali</button>
   
       
 
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
                      <td> {$project_no} </td>
                    </tr>
                     <tr>  
                      <td> Customer Name </td>
                      <td> : </td>
                      <td> {$customer_name}</td>
                    </tr>
                   
                  </table>
                  </div>

                   <div class="col-md-6">
                   <table class="table table-stripped table-hovered">
                     <tr>  
                      <td> CC Name </td>
                      <td> : </td>
                      <td> {$cc_name} </td>
                    </tr>
                      <tr>  
                      <td> Site Name </td>
                      <td> : </td>
                      <td> {$site_name} </td>
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
                      <td> {$site_code} </td>
                    </tr>
                     <tr>  
                      <td> Nama Pekerjaan </td>
                      <td> : </td>
                      <td> {$nama_pekerjaan}</td>
                    </tr>

                     <tr>  
                      <td> Starting </td>
                      <td> : </td>
                      <td> {$starting} </td>
                    </tr>
                    
                    <tr>  
                      <td> Contract Date </td>
                      <td> : </td>
                      <td> {$contract_date} </td>
                    </tr>
                   
                  </table>
                  </div>

                   <div class="col-md-6">
                   <table class="table table-stripped table-hovered">
                     <tr>  
                      <td> Contract Level </td>
                      <td> : </td>
                      <td> {$contract_level} </td>
                    </tr>
                    <tr>  
                      <td> Contract Status </td>
                      <td> : </td>
                      <td> {$contract_status} </td>
                    </tr>
                    <tr>  
                      <td> Ending </td>
                      <td> : </td>
                      <td> {$ending} </td>
                    </tr>
                     <tr>  
                      <td> Account Manager </td>
                      <td> : </td>
                      <td> {$acc_manager} </td>
                    </tr>
                    
                  </table>
                  </div>
              </div>
              </div>

              </div>
       
        </div>


        
        <br>
        {if {$level_user} == 'Administrator' OR {$level_user} == 'Billing'}

         <a href="?act=DetailBillingAdd&idcust={$idcust}&idcont={$idcontract}" class="btn btn-primary"> + Tambah Data Billing </a>

        {else}

        {/if}
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
        
                {section name = detail loop = $databill}        
                <tr style="font-size: 12px;">
                 
                <td style="width:2%;"> {$databill[detail].no}</td>
                <td style="width:2%;" align="center"> 

                 {if {$databill[detail].kondisi} == 'NF'}
                        <img src="images/false.png" style="width: 30%;" align="center">
                      {else}
                        <img src="images/true.png" style="width: 30%;" align="center">
                      {/if} 
                      </td>
                <td style="width:8%;"> {$databill[detail].end_user}</td>
                <td style="width:8%;"> {$databill[detail].bill_periode}</td>            
                <td style="width:8%;"> Rp.{$databill[detail].bill_amount}</td>
                <td style="width:5%;"> {$databill[detail].charges}</td>
                <td style="width:8%;"> 
                {if {$databill[detail].paid_status} == 'Y'}
                Yes / Sudah Bayar
                {else}
                No / Belum Bayar
                {/if}
                 </td>
                 

                 {if {$level_user} == 'Administrator' OR {$level_user} == 'Billing'}
                 <td style="width:8%;" align="center"> 
                  <a href="master_pdct.php?act=DetailBillingUpdate&id={$databill[detail].id}&idcust={$databill[detail].id_customer}&idcont={$databill[detail].id_contract}" title="Edit"  class="btn btn-xs btn-warning"> <i class="glyphicon glyphicon-pencil"> </i> </a>

                <a href="master_pdct.php?act=DetailBillingDelete&id={$databill[detail].id}&idcust={$databill[detail].id_customer}&idcont={$databill[detail].id_contract}" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-xs btn-danger"> <i class="glyphicon glyphicon-trash"> </i> </a>

                <a href="master_pdct.php?act=DetailBillingDetail&id={$databill[detail].id}&idcust={$databill[detail].id_customer}&idcont={$databill[detail].id_contract}" title="Detail"  class="btn btn-xs btn-default"> <i class="glyphicon glyphicon-file"> </i> </a>

                 </td>
                 {else}
                <td style="width:8%;" align="center"> 
                 

                <a href="master_pdct.php?act=DetailBillingDetail&id={$databill[detail].id}&idcust={$databill[detail].id_customer}&idcont={$databill[detail].id_contract}" title="Detail"  class="btn btn-xs btn-default"> <i class="glyphicon glyphicon-file"> </i> 
                </a>

                 </td>

                 

                 {/if}

                </tr>
                
                {/section}
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
        <p class="text-muted"> {$footer}</p>
      </div>
    </footer>

    
     
  </body>
</html>






