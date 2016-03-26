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
      
     <script src="ckeditor/ckeditor.js"> </script>
 
    
    

 
    <script type="text/javascript">
    if ( typeof CKEDITOR == 'undefined' )
    {
  document.write(
    'CKEditor not found');
}
else
{
  var editor = CKEDITOR.replace( 'editor1' ); 

  
  CKFinder.setupCKEditor( editor, '' ) ;

  
}
</script>

 
 
  </head>

  <body role="document">

    {include file="header.tpl"}

    <div class="container theme-showcase" role="main">

    
    <div class="row">
    <div class="col-md-12">

     <div style="margin-top:70px;">

     </div>
    <div class="alert alert-info"> <h3 align="center">Tambah Pesan Email </h3></div>
      <button onclick="history.go(-1);" class="btn btn-primary"> <i class="glyphicon glyphicon-arrow-left"> </i> Back </button>
     <br>
     <br>

     <form action="?act=ProUpdate" method="POST" enctype="multipart/form-data" name="myForm">
 
    
    
    <div class="panel panel-primary">
    <div class="panel-heading">Editor Pesan Email</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-6 small">
       
        <input type="hidden" name="id" value="{$id}">
            <div class="form-group">
              <label  class="col-sm-3"> Pesan Email </label>

              <div class="col-sm-9">
              <textarea name="pesan_email" rows="10" class="form-control" cols="90">{$pesan_email}</textarea>
              </div>

             
            </div>

            <br>
            <br>
             &nbsp;

            <div class="form-group">
              <label  class="col-sm-3"> Set Active </label>

              <div class="col-sm-9">
               <select name="active" class="form-control">
                 <option value="">--Pilih--</option>
                 <option value="Y" {if {$active} == 'Y'} selected="selected" {else} {/if} >Yes</option>
                 <option value="N" {if {$active} == 'N'} selected="selected" {else} {/if}>No</option>
               </select>
              </div>

             
            </div>

 
        </div><!--col-md-6-->
        <div class="col-md-6 small">
          
             
            


 
        </div><!--col-md-6--> 
      </div><!--row--> 
     
    </div><!--panel-body--> 
  </div><!--panel panel-default--> 
  <!------------------------------------------------------------satu------------------------------------------------------------>
 
  
  
 <button type="submit" name="simpan" class="btn btn-primary btn-block"> <i class="glyphicon glyphicon-floppy-disk"> </i>  Simpan Data </button>

   </div>
   </div>
  

   

</form>
    <footer class="footer">
      <div class="container" style="text-align:center; margin-top:30px;">
        <p class="text-muted"> {$footer}</p>
      </div>
    </footer>

    
     
  </body>
</html>















 