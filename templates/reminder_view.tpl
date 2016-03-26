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
        <h2>Reminder Contract PDCT</h2>
        </div>

        </div>
        
        &nbsp;
           <table id="example" class="table table-striped table-bordered table-hover" style="width:100%;">
              <thead style="background-color:#FFF;">
                <tr>
                  
                  <th style="width:4%;" align="center">Site Code</th>
                  <th style="width:4%;" align="center">Contract Level</th>
                  <th style="width:20%;" align="center">Nama Pekerjaan </th>
                  <th style="width:5%;" align="center">Contract Status </th>
                  <th style="width:5%;" align="center">Starting</th>
                  <th style="width:5%;" align="center">Ending</th>
                  <th style="width:3%;" align="center">Opsi</th>
                  
     
                </tr>
                </thead>
                
                <tbody>
                {section name = detail loop = $list}

                {if {$list[detail].is_sent} == "Y"}
                <tr>
                <td style="width:4%;" class="alert alert-info" align="center">{$list[detail].site_code}  </td>
                <td style="width:4%;" class="alert alert-info" align="center" >{$list[detail].contract_level}  </td>
                <td style="width:20%;" class="alert alert-info" > {$list[detail].nama_pekerjaan} </td>
                <td style="width:5%;" class="alert alert-info" align="center"> {$list[detail].contract_status} </td>
                <td style="width:5%;" class="alert alert-info" align="center"> {$list[detail].starting} </td>
                <td style="width:5%;" class="alert alert-info" align="center" > {$list[detail].ending} </td>
     
                <td style="width:3%;" class="alert alert-info" align="center"> 
                <a href="reminder.php?id={$list[detail].id}&act=ContractReminderDetail" title="Detail Kontrak" class="btn btn-xs btn-info"> <i class="glyphicon glyphicon-bookmark"> </i> </a>

                <a href="reminder.php?id={$list[detail].id}&act=ContractReminderSendMail" title="Kirim Email Reminder" class="btn btn-xs btn-danger"> <i class="glyphicon glyphicon-envelope"> </i> </a>                             
                </td>
                </tr>
                {else}

                <tr>
                <td style="width:4%;" align="center">{$list[detail].site_code}  </td>
                <td style="width:4%;" align="center" >{$list[detail].contract_level}  </td>
                <td style="width:20%;" > {$list[detail].nama_pekerjaan} </td>
                <td style="width:5%;" align="center"> {$list[detail].contract_status} </td>
                <td style="width:5%;" align="center"> {$list[detail].starting} </td>
                <td style="width:5%;" align="center" > {$list[detail].ending} </td>
     
                <td style="width:3%;" align="center"> 
                <a href="reminder.php?id={$list[detail].id}&act=ContractReminderDetail" title="Detail Kontrak" class="btn btn-xs btn-info"> <i class="glyphicon glyphicon-bookmark"> </i> </a>

                <a href="reminder.php?id={$list[detail].id}&act=ContractReminderSendMail" title="Kirim Email Reminder" class="btn btn-xs btn-danger"> <i class="glyphicon glyphicon-envelope"> </i> </a>                             
                </td>
                </tr>

                {/if}
                {/section}
                </tbody>
                
                
              
              </table>

              <div class="panel panel-success">  
                <div class="panel-heading">
                Informasi :
                </div>
                <div class="panel-body">
                <p class="btn btn-primary"> Warna Biru = Email Sudah Dikirim </p>
                <p class="btn btn-default"> Warna Putih = Email Belum Dikirim </p>
                 
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






