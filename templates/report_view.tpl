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
     <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/css_datepicker.css">
     <link rel="stylesheet" type="text/css" href="assets/dataTables.bootstrap.min.css">
      
     <script src="assets/jquery-1.10.2.js"> </script>
     <script src="bootstrap/dist/js/bootstrap.min.js"> </script>
     <script src="assets/jquery.dataTables.min.js"> </script>
     <script src="assets/dataTables.bootstrap.min.js"> </script>
     <script src="js/jQuery-Mask-Plugin_js_jquery.mask.min.js"> </script>
     <script src="js/bootstrap-datepicker.js"> </script>
     <script type="text/javascript">
      $(document).ready(function() {
          $('#example').DataTable();
      } );
 
    </script>

    <script>
  if (top.location != location) {
    top.location.href = document.location.href ;
  }
    $(function(){
      window.prettyPrint && prettyPrint();
      $('#dp1').datepicker({
         
        format: 'dd-mm-yyyy'
      });

       $('#dp2').datepicker({
        
        format: 'dd-mm-yyyy'
      });
       
    
    });
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
        <h2>Cetak Report PDCT</h2>
        </div>

        </div>
        <br>
          <div class="panel panel-primary">

             <div class="panel-heading">
             Filter Data Laporan By :
             </div> <!--panel heading-->

             <div class="panel-body"> 
             <div class="col-md-12">
        <div class="col-md-6">
        <fieldset>
        <legend>Tanggal Kontrak</legend>
        <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Starting </label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="starting" id="dp1">
              </div>
        </div>
        <br>
        <br>

        <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Ending </label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="ending" id="dp2">
              </div>
        </div>
        </div>

        </fieldset>
       

       <div class="col-md-6">
        <fieldset>
        <legend>Paid Status</legend>
        <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Paid </label>

              <div class="col-sm-4">
                <input type="radio" class="form-control input-sm"  name="statuspaid">
              </div>
        </div>
        <br>
        <br>

        <div class="form-group">
              <label  class="col-sm-3 form-control-static"> No Paid </label>

              <div class="col-sm-4">
                <input type="radio" class="form-control input-sm" name="statuspaid">
              </div>
        </div>
        </div>
        &nbsp;
        <br>
        <br>
        <button class="btn btn-primary btn-block"> Cetak</button>
        </fieldset>

      
             </div> <!--panel body-->

          </div> <!--panel panel-primary-->
       
       <!--
        &nbsp;
           <table id="example" class="table table-striped table-bordered table-hover" style="width:100%;">
              <thead style="background-color:#FFF;">
                <tr>
                  
                  <th style="width:10%;" align="center">No Project</th>
                  <th style="width:10%;" align="center">Nama Project</th>
                  <th style="width:10%;" align="center">CC Name</th>
                  <th style="width:5%;" align="center">Site Name </th>
                  <th style="width:5%;" align="center">Nama Pekerjaan</th>
                  <th style="width:5%;" align="center">Status</th>
                  <th style="width:8%;" align="center">Opsi</th>
                  
     
                </tr>
                </thead>
                
                <tbody>
                {section name = detail loop = $list}
                <tr>
                 

                <td style="width:10%;" class="alert alert-info">{$list[detail].no_project}  </td>
                <td style="width:10%;" class="alert alert-info"> {$list[detail].customer_name} </td>
                <td style="width:10%;" class="alert alert-info"> {$list[detail].cc_name} </td>
                <td style="width:5%;" class="alert alert-info"> {$list[detail].site_name} </td>
                <td style="width:5%;" class="alert alert-info"> {$list[detail].nama_pekerjaan} </td>
                <td style="width:5%;" class="alert alert-info"> {$list[detail].status} </td>
                <td style="width:8%;" class="alert alert-info"> 
                <a href="master_pdct.php?idcust={$list[detail].id}&act=DetailContract" title="Detail Kontrak"> <i class="glyphicon glyphicon-bookmark"> </i> </a>
                <a href="master_pdct.php?id={$list[detail].id}&act=Update" title="Edit"> <i class="glyphicon glyphicon-pencil"> </i> </a>
                <a href="master_pdct.php?id={$list[detail].id}&act=Delete" title="Hapus"> <i class="glyphicon glyphicon-trash"> </i> </a> 
                <a href="master_pdct.php?id={$list[detail].id}&act=DetailList" title="Detail"> <i class="glyphicon glyphicon-file"> </i> </a>


                 
                </td>

               
                  
                </tr>
                {/section}
                </tbody>
                
                
              
              </table>
              -->
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






