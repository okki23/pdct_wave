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
      function ContLevel(){
        var isi = $("#contlevel").val();

          if (isi == 'Induk'){
            $("#vallevel").prop("readonly", true);
          }else{
            $("#vallevel").prop("readonly", false);
          }
         
        
      }
    </script>

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


    $('#dp3').datepicker({
        
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
    $('#otc').mask('000.000.000.000.000', {reverse: true});
    $('#bill').mask('000.000.000.000.000', {reverse: true});
    $('#monthly').mask('000.000.000.000.000', {reverse: true});
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

      <div class="alert alert-info"> <h3 align="center">Tambah Data PDCT Contract </h3></div>
      <button onclick="history.go(-1);" class="btn btn-primary"> <i class="glyphicon glyphicon-arrow-left"> </i> Back </button>

     <form action="master_pdct.php?act=DetailContractProAdd" method="POST" enctype="multipart/form-data" name="myForm">
     <input type="hidden" name="idcust" value="{$idcust}">
    
    
     
     <br>
     <br>
     <div class="panel panel-primary">
    <div class="panel-heading">Contract</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-6 small">
         
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Site Code </label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="site_code" required="required">
              </div>
              
            </div>

            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Contract Level </label>

              <div class="col-sm-9">

                <div class="col-sm-5">
                  <select class="form-control" id="contlevel" onchange="ContLevel();" name ="name_contract_level" required="required">
                     <option value="" selected="selected"> Pilih </option>
                     <option value="Add" > Add </option>
                    <option value="Induk" > Induk </option>
                  </select>  
                </div>

                <div class="col-sm-4">
                 <input type="text" id="vallevel" class="form-control input-sm" name="val_contract_level">
                </div>
            
               
              </div>
              
            </div>

            <br>
            <br>

             <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Nama Pekerjaan </label>

              <div class="col-sm-9">
              <textarea name="nama_pekerjaan" class="form-control input-sm" required="required"></textarea>
               </div>
              
            </div>

            <br>
            <br>

            <fieldset>
            <legend>Upload Files</legend>
              
             
            <div class="form-group">

              <label  class="col-sm-3 form-control-static"> No.SPK/P8 </label>

              <div class="col-sm-9">
                <input type="file" class="form-control input-sm" name="no_spk">


              </div>
        
            </div>
            <br>
          
            <br>
             

            

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Surat Kesanggupan </label>

              <div class="col-sm-9">
                <input type="file" class="form-control input-sm" name="surat_kesanggupan">
              </div>
              
            </div>
 
            
             
            <br>
            <br>


            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Contract Number </label>

              <div class="col-sm-9">
                <input type="file" class="form-control input-sm" name="contract_number">
              </div>
              
            </div>

            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Contract Date </label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" value="{$date}" id="dp3"  name="contract_date">
                       
              <div class="col-sm-12" style="padding:10px 0px 10px 0px;" align="center">
              
              </div>
              </div>
              

              

            </div>

            <br>
            <br>

 
            <br>
            <br>


            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> BAST </label>

              <div class="col-sm-9">
                <input type="file" class="form-control input-sm" name="bast">
              </div>
              
            </div>

            <br>
            <br>
           
            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> BASO </label>

              <div class="col-sm-9">
                <input type="file" class="form-control input-sm" name="baso">
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
              <label  class="col-sm-3 form-control-static"> Account No</label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="acc_no" >
              </div>
              
            </div>

            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> SID</label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="sid">
              </div>
              
            </div>

            <br>
            <br>

             <div class="form-group">
              <label  class="col-sm-3 form-control-static"> CID</label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="cid" >
              </div>
              
            </div>

            <br>
            <br>

          
          
        </div>
        <!--col-md-6-->

        <div class="col-md-6 small">
           
           <hr>
             <div class="form-group">
              <label  class="col-sm-3 form-control-static" style="color:red;"> Contract Status</label>
 <div style="background-color: red;">
              <div class="col-sm-9">
             
                 
                 <select name="contract_status" class="form-control" style=" border-style:bold;  border-color: red;">
                  <option value="" selected="selected">--Pilih--</option>
                  {section name = detail loop=$cont_status_opt}
                  <option value="{$cont_status_opt[detail].id}" {$cont_status_opt[detail].selected}> {$cont_status_opt[detail].contract_status} </option>
                  {/section}
                </select>

            </div>
              
              </div>
              
            </div>

            <br>
            <br>
            <hr>

              <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Starting</label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="starting" id="dp1" required="required">
                <label style="color:red;"> * Wajib Diisi </label>
              </div>  
              
            </div>

            <br>
            <br>
         
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Ending</label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="ending" id="dp2" required="required">
                <label style="color:red;"> * Wajib Diisi </label>
              </div> 
              
            </div>

            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Masa Kontrak</label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="masa_kontrak">
              </div>
              
            </div>

            <br>
            <br>

            
            

            <br>
     
        

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Account Manager</label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="acc_manager">
              </div>
              
            </div>

            <br>
            <br>

           
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Email</label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="email">
              </div>
              
            </div>

            <br>
            <br>
            
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Phone</label>

              <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="phone" >
              </div>
              
            </div>

            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> OTC </label>

              <div class="col-sm-9">
                <input type="text" id="otc" class="form-control input-sm" name="otc">
             
              </div>
              
            </div>

            <br>
            <br>
 
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Monthly</label>

              <div class="col-sm-9">
                <input type="text" id="monthly" class="form-control input-sm" name="monthly" >
              </div>
              
            </div>

            <br>
            <br>

            
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















 