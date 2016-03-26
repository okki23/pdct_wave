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
     
    {literal}

    <script language='JavaScript'>
    var input_pronumb = $("#input_pronumb").val();
    var idprono = $("#idprono").val();

    if(input_pronumb == ''){
      idprono.value = '';
    }

    if(input_cust_name == ''){
      idcust.value = '';
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



    <script language='JavaScript'>
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
      input_pronumb = document.getElementById('input_pronumb').value;
      
      if (input_pronumb == "")
      {
        document.getElementById("hasil").innerHTML = "";
        document.getElementById("idprono").value = "";
      }
      else
      {
        ajaxRequest.open("GET","autosuggest.php?input_pronumb="+input_pronumb);
        ajaxRequest.onreadystatechange = function()
        {
        document.getElementById("hasil").innerHTML = ajaxRequest.responseText;
        }
        ajaxRequest.send(null);
      }
    } 

     function autoCompletea() //fungsi menangkap input search dan menampilkan hasil search
    {
      getAjax();
      input_cust_name = document.getElementById('input_cust_name').value;
      
      if (input_cust_name == "")
      {
        document.getElementById("hasilcust").innerHTML = "";
        document.getElementById("idcust").value = "";
      }
      else
      {
        ajaxRequest.open("GET","autosuggest.php?input_cust_name="+input_cust_name);
        ajaxRequest.onreadystatechange = function()
        {
        document.getElementById("hasilcust").innerHTML = ajaxRequest.responseText;
        }
        ajaxRequest.send(null);
      }
    } 
  

 
function autoInsert(no_project,nama_site1) //fungsi mengisi input text dengan hasil pencarian yang dipilih
{
  document.getElementById("input_pronumb").value = no_project;
  document.myForm.idprono.value = no_project;
  document.getElementById("hasil").innerHTML = "";
}

 
function autoInserta(id,nama_customer) //fungsi mengisi input text dengan hasil pencarian yang dipilih
{
  document.getElementById("input_cust_name").value = nama_customer;
  document.myForm.idcust.value = nama_customer;
  document.getElementById("hasilcust").innerHTML = "";
}

 
 
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#bill_amount').mask('000.000.000.000.000', {reverse: true});
    $('#paid_amount').mask('000.000.000.000.000', {reverse: true});
    $('#csc').mask('000.000.000.000.000', {reverse: true});
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

      <div class="alert alert-info"> <h3 align="center">Tambah Data PDCT Billing </h3></div>
      <button onclick="history.go(-1);" class="btn btn-primary"> <i class="glyphicon glyphicon-arrow-left"> </i> Back </button>

     <form action="master_pdct.php?act=DetailBillingProAdd" method="POST" enctype="multipart/form-data" name="myForm">
     <input type="hidden" name="idcust" value="{$idcust}">
     <input type="hidden" name="idcontract" value="{$idcontract}">
    
    
     
     <br>
     <br>
     <div class="panel panel-primary">
    <div class="panel-heading">Billing</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-6 small">
         
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> End User </label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="end_user" required>
              </div>
              
            </div>

            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Billing Periode</label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="bill_periode" required>
                <span style="color:red;"> Ex:201601</span>
              </div>
              
            </div>

            <br>
            <br>
 
            <fieldset>
            <legend>Upload Files</legend>
              
             
            <div class="form-group">

              <label  class="col-sm-3 form-control-static"> FP No. </label>

              <div class="col-sm-9">
                <input type="file" class="form-control input-sm" name="fp_no">


              </div>
        
            </div>
            <br>
          
            <br>
             

            
             <br>
            <br>

            <div class="form-group">
            <p class="alert alert-danger"> <b>Hanya File : PDF, JPG, JPEG  </b></p>
            </div>
            </fieldset>

            <br>
            <br>


            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Bill Amount</label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="bill_amount" id="bill_amount">
              </div>
              
            </div>

            <br>
            <br>
             <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Charges</label>

              <div class="col-sm-9">
                <select name="charges" class="form-control">
                  <option value="" selected="selected">--Pilih</option>
                  {section name = detail loop = $charges_opt}
                  <option value="{$charges_opt[detail].id}"> {$charges_opt[detail].charges} </option>
                  {/section}
                </select> 
              </div>
              
            </div>

            <br>
            <br>

            
          
          
        </div>
        <!--col-md-6-->
        <div class=
        "col-md-6 small">
           <hr>
            <div class="form-group">
              <label  class="col-sm-3 form-control-static" style="color: red;"> Paid Status</label>

              <div class="col-sm-9">
                <select name="paid_status" class="form-control" style="border-color:red;">
                    <option value="" selected=""> --Pilih-- </option>
                    <option value="Y"> Yes </option>
                    <option value="N"> No </option>
                    <option value="I"> Invoicing </option>
                    <option value="E"> End Of Service </option>
                </select>
              </div>
              
            </div>

            <br>
            <br>
            <hr>
            <br>

         
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Paid Amount</label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="paid_amount" id="paid_amount">
              </div>
              
            </div>

            <br>
            <br>

          
            {if {$level_user} != 'Administrator'}

            {else}
             <div class="form-group">
              <label  class="col-sm-3 form-control-static"> CSC</label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="csc" id="csc">
              </div>
              
            </div>

            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> CSC Status</label>

              <div class="col-sm-9">
                <select name="csc_status" class="form-control">
                    <option value="" selected=""> --Pilih-- </option>
                    <option value="Y"> Yes </option>
                    <option value="N"> No </option>
                </select>
              </div>
              
            </div>

            <br>
            <br>

            {/if}



           

             
            
        </div><!--col-md-6--> 
      </div><!--row-->
    </div><!--panel-body--> 
  </div><!--panel panel-default--> 

  <!------------------------------------------------------------dua------------------------------------------------------------>
   
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















 