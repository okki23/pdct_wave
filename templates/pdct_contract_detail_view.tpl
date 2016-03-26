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
        <h2>Data PDCT Kontrak</h2>
        </div>

        </div>
        <br>
        <input type="hidden" name="idcust" value="{$idcust}">
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
                      <td> {$project_no} </td>
                    </tr>
                     <tr>  
                      <td> Customer Name </td>
                      <td> : </td>
                      <td> {$customer_name} </td>
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
       
        </div>
        
        <br>

         <a href="?act=DetailContractAdd&idcust={$idcust}" class="btn btn-primary"> + Tambah Data Kontrak </a>
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
                {section name = detail loop = $list}
 
                <tr style="font-size: 12px;">
                 
                

                {if {$list[detail].selisih} <= 90 }
                <td style="width:3%;" class="alert alert-danger" align="center">

                      {if {$list[detail].kondisi} == 'NF'}
                        <img src="images/false.png" style="width: 30%;" align="center">
                      {else}
                        <img src="images/true.png" style="width: 30%;" align="center">
                      {/if} 

                </td>
                <td style="width:8%;" class="alert alert-danger">{$list[detail].site_code}   </td>
                <td style="width:8%;" class="alert alert-danger">{$list[detail].contract_level}  </td>
                <td style="width:18%;" class="alert alert-danger">{$list[detail].nama_pekerjaan} </td>
               
                <td style="width:10%;" class="alert alert-danger"> {$list[detail].starting}   </td>
                <td style="width:10%;" class="alert alert-danger"> {$list[detail].ending} </td>
                <td style="width:10%;" class="alert alert-danger"> {$list[detail].contract_status} </td>


                    {if {$level_user} == 'Administrator'}
                    <td style="width:12%;" class="alert alert-danger" align="center"> 
                     
                    

                    <a href="master_pdct.php?id={$list[detail].id}&act=DetailContractUpdate&idcust={$list[detail].idcust}" class="btn btn-xs btn-warning" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>

                    <a href="master_pdct.php?act=DetailContractDelete&id={$list[detail].id}&idcust={$list[detail].idcust}" class="btn btn-xs btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a>

                    <a href="master_pdct.php?id={$list[detail].id}&act=DetailList&idcust={$list[detail].idcust}" class="btn btn-xs btn-default" title="Detail"> <i class="glyphicon glyphicon-file"> </i> </a>

                     <a href="master_pdct.php?idcont={$list[detail].id}&act=DetailBilling&idcust={$list[detail].idcust}" class="btn btn-xs btn-success" title="Billing"> <i class="glyphicon glyphicon-usd"> </i> </a>


                   
                    </td>

                 
                    {else}


                    <td style="width:12%;" class="alert alert-danger" align="center">            
                     {if {$level_user} == 'Billing'}
                     <a href="master_pdct.php?id={$list[detail].id}&act=BillingContractUpdate&idcust={$list[detail].idcust}" class="btn btn-xs btn-warning" title="Billing Contract Update"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                     {else}
                     {/if}

                     
                     {if {$level_user} == 'Sales'}
                     <a href="master_pdct.php?id={$list[detail].id}&act=DetailContractUpdate&idcust={$list[detail].idcust}" class="btn btn-xs btn-warning" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                     {else}

                     {/if}
     
                    <a href="master_pdct.php?id={$list[detail].id}&act=DetailList&idcust={$list[detail].idcust}" class="btn btn-xs btn-default" title="Detail"> <i class="glyphicon glyphicon-file"> </i> </a>

                     <a href="master_pdct.php?idcont={$list[detail].id}&act=DetailBilling&idcust={$list[detail].idcust}" class="btn btn-xs btn-success" title="Billing"> <i class="glyphicon glyphicon-usd"> </i> </a>
                     </td>

                   
                    {/if}



                    

                    



                {else}
                <td style="width:3%;" align="center">

                      {if {$list[detail].kondisi} == 'NF'}
                        <img src="images/false.png" style="width: 30%;" align="center">
                      {else}
                        <img src="images/true.png" style="width: 30%;" align="center">
                      {/if} 

                </td>
                <td style="width:8%;" >{$list[detail].site_code} </td>
                <td style="width:8%;" >{$list[detail].contract_level}  </td>
                <td style="width:18%;" >{$list[detail].nama_pekerjaan}</td>
              
                <td style="width:10%;" > {$list[detail].starting}   </td>
                <td style="width:10%;" > {$list[detail].ending} </td>
                 <td style="width:10%;"> {$list[detail].contract_status} </td>

                 

                 {if {$level_user} == 'Administrator'}
                  <td style="width:12%;" align="center"> 
                 
               

                  <a href="master_pdct.php?id={$list[detail].id}&act=DetailContractUpdate&idcust={$list[detail].idcust}" class="btn btn-xs btn-warning" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>

                <a href="master_pdct.php?act=DetailContractDelete&id={$list[detail].id}&idcust={$list[detail].idcust}" class="btn btn-xs btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a>

                <a href="master_pdct.php?id={$list[detail].id}&act=DetailList&idcust={$list[detail].idcust}" class="btn btn-xs btn-default" title="Detail"> <i class="glyphicon glyphicon-file"> </i> </a>
               
                 <a href="master_pdct.php?idcont={$list[detail].id}&act=DetailBilling&idcust={$list[detail].idcust}" class="btn btn-xs btn-success" title="Billing"> <i class="glyphicon glyphicon-usd"> </i> </a>
                
                


               
                </td>
                  {else}

                  <td style="width:12%;" align="center"> 
                 
                    {if {$level_user} == 'Billing'}
                     <a href="master_pdct.php?id={$list[detail].id}&act=BillingContractUpdate&idcust={$list[detail].idcust}" class="btn btn-xs btn-warning" title="Billing Contract Update"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                     {else}
                     {/if} 

                     {if {$level_user} == 'Sales'}
                     <a href="master_pdct.php?id={$list[detail].id}&act=DetailContractUpdate&idcust={$list[detail].idcust}" class="btn btn-xs btn-warning" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                     {else}

                     {/if}

                  
                <a href="master_pdct.php?id={$list[detail].id}&act=DetailList&idcust={$list[detail].idcust}" class="btn btn-xs btn-default" title="Detail"> <i class="glyphicon glyphicon-file"> </i> </a>

                 <a href="master_pdct.php?idcont={$list[detail].id}&act=DetailBilling&idcust={$list[detail].idcust}" class="btn btn-xs btn-success" title="Billing"> <i class="glyphicon glyphicon-usd"> </i> </a>


               
                </td>

                

                 {/if}

                  
                  

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
        <p class="text-muted"> {$footer}</p>
      </div>
    </footer>

    
     
  </body>
</html>






