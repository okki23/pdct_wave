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
        <h2>Data PDCT Customer</h2>
        </div>

        </div>
        <a href="?act=Add" class="btn btn-primary"> + Tambah Data</a>
        <br>
        &nbsp;
           <table id="example" class="table table-striped table-bordered table-hover" style="width:100%;">
              <thead style="background-color:#FFF;">
                <tr align="center">
                  
                  <th style="width:1%; font-size: 12px;" align="center">No</th>
                  <th style="width:10%; font-size: 12px;" align="center">Status KD</th>
                  <th style="width:10%; font-size: 12px;" align="center">Customer Name</th>
                  <th style="width:5%; font-size: 12px;" align="center">Project No</th>
                  <th style="width:7%; font-size: 12px;" align="center">CC Name</th>
                  <th style="width:10%; font-size: 12px;" align="center">Site Name </th>
 
                  <th style="width:4%; font-size: 12px;" align="center">Opsi</th>
                  
     
                </tr>
                </thead>
                
                <tbody>
                {section name = detail loop = $list}
                <tr style="font-size: 12px;">
        
                <td style="width:1%;"  align="center">{$list[detail].no}  </td>
                 <td style="width:1%;" align="center">
                      
                      {if {$list[detail].kondisi} == '1'}
                      <img src="images/false.png" style="width: 30%;" align="center">
                      {else}
                        <img src="images/true.png" style="width: 30%;" align="center">
                      {/if}
                     
                      

                  </td>
                <td style="width:10%;">{$list[detail].customer_name}  </td>
                <td style="width:5%;"> {$list[detail].project_no} </td>
                <td style="width:7%;"> {$list[detail].cc_name} </td>
                <td style="width:10%;" > {$list[detail].site_name} </td>
     

                {if {$level_user} == 'Administrator'}
               <td style="width:4%;" align="center"  > 
                <a href="master_pdct.php?idcust={$list[detail].id}&act=DetailContract" title="Detail Kontrak" class="btn btn-xs btn-info"> <i class="glyphicon glyphicon-bookmark"> </i> </a>
                <a href="master_pdct.php?id={$list[detail].id}&act=Update" title="Edit" class="btn btn-xs btn-warning"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="master_pdct.php?id={$list[detail].id}&act=Delete" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-xs btn-danger"> <i class="glyphicon glyphicon-trash"> </i> </a> 
                </td>
                {else}                

                 <td style="width:4%;" align="center"  > 
                <a href="master_pdct.php?idcust={$list[detail].id}&act=DetailContract" title="Detail Kontrak" class="btn btn-xs btn-info"> <i class="glyphicon glyphicon-bookmark"> </i> </a>
                
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






