
<html>
	<head>
    	<title>
        	{$title}
        </title>
        <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/dataTables.bootstrap.min.css">
        <script src="assets/jquery-1.10.2.js"> </script>
        <script src="assets/jquery.dataTables.min.js"> </script>
        <script src="assets/dataTables.bootstrap.min.js"> </script>
    <script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
 
 </script>
    </head>
    
    <body>
    <div class="container">
    <div class="row">
    <div class="col-md-10">
    	Ini Adalah Data Anda
        
           <table id="example" class="table table-striped table-bordered table-hover" style="width:100%;">
              <thead style="background-color:#CEF5C9;">
                <tr>
                  
                  <th width="14%" style="width:2%;" align="center">Id Project</th>
				  <th width="40%" style="width:20%;" align="center">Nama Project   </th>
                  
     
                </tr>
                </thead>
                
                <tbody>
                {section name = detail loop = $list}
                <tr>
                  
				  <td style="width:20%;">{$list[detail].id_project}  </td>
                  <td style="width:20%;"> {$list[detail].no_project} </td>
                  
                </tr>
                {/section}
                </tbody>
                
              
              </table>
   </div>
   </div>
   </div>
    </body>
    
</html>