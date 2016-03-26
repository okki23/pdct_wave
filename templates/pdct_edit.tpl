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
     
  
    {literal}
    <script type="text/javascript">
    
    var inputan_cust_name = $("#inputan_cust_name").val();
    var idcust = $("#idcust").val();
    if(input_cust_name == ''){
      idcust.value = '';
    }
    
    </script>

    <script type="text/javascript">
    var ajaxRequest;
    function getAjax() //fungsi untuk mengecek AJAX pada browsergv
    {
      try
      {
        ajaxRequest = new XMLHttpRequest();
      }
      catch (e)
      {
        try
        {
          ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) 
        {
          try
          {
            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
          }
          catch (e)
          {
            alert("Your browser broke!");
            return false;
          }
        }
      }
    }

    function autoComplete() //fungsi menangkap input search dan menampilkan hasil search
    {
      getAjax();
      inputan_cust_name = document.getElementById('inputan_cust_name').value;
      
      if (inputan_cust_name == "")
      {
        document.getElementById("hasilcust").innerHTML = "";
        document.getElementById("idcust").value = "";
      }
      else
      {
        ajaxRequest.open("GET","autosuggest.php?inputan_cust_name="+inputan_cust_name);
        ajaxRequest.onreadystatechange = function()
        {
        document.getElementById("hasilcust").innerHTML = ajaxRequest.responseText;
        }
        ajaxRequest.send(null);
      }
    } 
    
    function autoInsert(id,nama_customer) //fungsi mengisi input text dengan hasil pencarian yang dipilih
    {
      document.getElementById("inputan_cust_name").value = nama_customer;
      document.myForm.idcust.value = id;
      document.getElementById("hasilcust").innerHTML = "";
    }

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
  

    {/literal}
  </head>

  <body role="document">

    {include file="header.tpl"}

    <div class="container theme-showcase" role="main">

    
    <div class="row">
    <div class="col-md-12">

     <div style="margin-top:70px;">
     </div>

     <div class="alert alert-info"> <h3 align="center">Update Data PDCT Customer </h3></div>
      <button onclick="history.go(-1);" class="btn btn-primary"> <i class="glyphicon glyphicon-arrow-left"> </i> Back </button>

     <form action="master_pdct.php?act=ProUpdate" method="POST" enctype="multipart/form-data" name="myForm">
     
    
    
     <br>
     <br>
    <div class="panel panel-primary">
    <div class="panel-heading">Customer</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-6 small">
       

            <div class="form-group">
              <label  class="col-sm-3"> Customer Name </label>
              <input type="hidden" name="id" value="{$id}">
              <div class="col-sm-9">
                <input type="text" name="cust_names" id="inputan_cust_name" class="form-control input-sm" autocomplete="off" onkeyup="autoComplete();" required="required" required="required" value="{$customer_name}">
              </div>

              <input type='hidden' id='idcust' name='id_cust_name' value='{$id_customer_name}'>

              <div style="margin-left:150px;">
              <div id="hasilcust"></div>
              </div>
             

            </div>

            <br>
            <br>


           <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Project No. </label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="project_no" value="{$project_no}" required="required">
              </div>

              
              </div>

            

            <br>
            <br>

   
        </div><!--col-md-6-->
        <div class="col-md-6 small">
              {if {$cc_name} == ""}
             
                <div class="form-group">
            
                 <label  class="col-sm-3 form-control-static"> CC Name </label>
               
                   <div class="col-sm-9">
                     <input type="text" style="border-color: red; " class="form-control input-sm" name="cc_name" value="{$cc_name}" >
                   </div>
                
               
               </div>
              {else} 
                   <div class="form-group">
            
                 <label  class="col-sm-3 form-control-static"> CC Name </label>

                   <div class="col-sm-9">
                     <input type="text" class="form-control input-sm" name="cc_name" value="{$cc_name}" >
                   </div>
              
               </div>

              {/if}
              

            <br>
            <br>

             {if {$site_name} == ""}
             <div class="form-group">
              <label  class="col-sm-3"> Site Name </label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" style="border-color: red; "  name="site_name" value="{$site_name}">
              </div>

            </div>
            {else}
            <div class="form-group">
              <label  class="col-sm-3"> Site Name </label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="site_name" value="{$site_name}">
              </div>

            </div>
            {/if}

            <br>
            <br>

 
             


 
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















 