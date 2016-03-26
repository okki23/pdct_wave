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
        <h2>File Management</h2>
        </div>

        </div>
        
        <br>
        &nbsp;
       <form name="cari" method="POST" enctype="multipart/form-data">
          <select name="direktori" class="form-control">
            <option value="" selected="selected">--Pilih--</option>
            <option value="spk"> SPK-P8</option>
            <option value="sk"> Surat Kesanggupan</option>
            <option value="cn"> Contract Number</option>
            <option value="bast"> BAST</option>
            <option value="baso"> BASO</option>
            <option value="proforma"> Proforma Invoice</option>
            <option value="resume"> Resume Proforma Invoice</option>
          </select>
           <br>
          <button type="submit" name="changedir" class="btn btn-block btn-primary"> <i class="  glyphicon glyphicon-folder-open" > </i> Ganti Direktori </button>
          <br>
        </form>
        <br>
           <table id="example" class="table table-striped table-bordered table-hover" style="width:100%;">
              <thead style="background-color:#FFF;">
                <tr align="center">
                  
                  <th style="width:1%; font-size: 12px;" align="center">No</th>
                  <th style="width:10%; font-size: 12px;" align="center">Nama File</th>
                  <th style="width:4%; font-size: 12px;" align="center">Opsi</th>
                  
     
                </tr>
                </thead>
                
                <tbody>
                {section name = detail loop = $list}
                <tr style="font-size: 12px;">
        
                <td style="width:1%;"  align="center">{$list[detail].no}  </td>
                <td style="width:40%;"> 
                {if {$list[detail].nama} == '' OR {$list[detail].nama} == NULL }

                 

                {else}
                 <a href="{$list[detail].namafile}" target="_blank"><img src="images/logopdf.jpg" style="width:7%; height=:7%; ">{$list[detail].nama} </a>
                
                {/if}
                

               </td>
                <td style="width:5%;" align="center"> <a href="file_management.php?act=Del&path={$list[detail].namafile}" title="Delete File" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-xs btn-danger"> <i class="glyphicon glyphicon-trash">  </td>
                       
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






