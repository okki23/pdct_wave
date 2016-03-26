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


    <script type="text/javascript">
    $(document).ready(function(){
       var isi = $("#contlevel").val();


          if (isi == 'Induk'){
            $("#vallevel").prop("readonly", true);
            //alert(isi);
          }else{
            $("#vallevel").prop("readonly", false);
             //alert(isi);
          }
    })

      function ContLevel(){
        var isi = $("#contlevel").val();


          if (isi == 'Induk'){
             $("#vallevel").val('');
            $("#vallevel").prop("readonly", true);
           
            //alert(isi);
          }else{
            $("#vallevel").val('');
            $("#vallevel").prop("readonly", false);
             
             //alert(isi);
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
  <div class="alert alert-info"> <h3 align="center">Ubah Data PDCT Contract </h3></div>

    <button onclick="history.go(-1);" class="btn btn-primary"> <i class="glyphicon glyphicon-arrow-left"> </i> Back </button>

     <form action="master_pdct.php?act=DetailContractProUpdate" method="POST" enctype="multipart/form-data" name="myForm">
     <input type="hidden" name="id" value="{$id}">
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
                <input type="text" class="form-control input-sm" name="site_code" value="{$site_code}" required>
              </div>
              
            </div>

            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Contract Level </label>

              <div class="col-sm-9">
                   <div class="col-sm-5">
                    
                               
                   <select class="form-control" id="contlevel" onchange="ContLevel();" name ="name_contract_level" required="required">
                    
                    
                    <option value="">--Pilih--</option>
                    <option value="Add" {if {$name_cont} == "Add"} selected="selected" {else} {/if}> Add </option>
                    <option value="Induk" {if {$name_cont} == "Induk"} selected="selected" {else} {/if}> Induk </option> 
 
                   </select>  
                   
                </div>

                <div class="col-sm-4">
                {if {$val_cont != "0"}}
                 <input type="text"  id="vallevel"  class="form-control input-sm" value="{$val_cont}" name="val_contract_level" >
                {else}
              <input type="text"  id="vallevel"  class="form-control input-sm" name="val_contract_level" >
                {/if}
                
                </div>
              </div>
              
            </div>

            <br>
            <br>

             <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Nama Pekerjaan </label>

              <div class="col-sm-9">
              <textarea name="nama_pekerjaan" required="required" class="form-control input-sm"> {$nama_pekerjaan}</textarea>
               </div>
              
            </div>

            <br>
            <br>

            <fieldset>
            <legend>Upload Files</legend>
              
            <div class="form-group">
            <p class="alert alert-danger"> <b>Kosongkan Jika Tidak Ada Perubahan File / Re-Upload </b></p>
            </div>

             <div class="form-group">
            <p class="alert alert-danger"> <b>File Yang Dapat Diupload Hanya File : PDF, JPG, JPEG </b></p>
            </div>

            <div class="form-group">

              <label  class="col-sm-3 form-control-static"> No.SPK/P8 </label>

              <div class="col-sm-9">

              {if {$no_spk_p8_file} == ''}
              <input type="file" class="form-control input-sm" name="no_spk" style="border-color: red;">
              {else}
              <input type="file" class="form-control input-sm" name="no_spk">
              {/if}
               
              </div>
        
            
              
            </div>
            <br>
             
            <div class="col-sm-9" style="margin-left:135px; padding:5px 0px 10px 0px;">
            {if {$no_spk_p8_file} != ''}

              <div class="col-sm-11">
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Informasi File
                  </div>
                  <div class="panel-body">

                       <a href="doc_uploads/spk/{$no_spk_p8_file}" target="_blank" class="btn btn-primary"> <i class="glyphicon glyphicon-file"> </i> {$no_spk_p8_file} </a>
                       <br>
                       <label> Date Upload : {$no_spk_p8_date_upload}</label> <br>
                       <label> Date Update : {$no_spk_p8_date_edit}</label>
                       <br>
                       <br>
                        
                         <a href="master_pdct.php?act=UnlinkFileSPK&id={$id}&idcust={$idcust}" class="btn btn-xs btn-danger"> [X] Hapus File </a>
                       

                  </div>
                </div>
              </div>
            
            {else}
              <div class="col-sm-11">
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Informasi File
                  </div>
                  <div class="panel-body">
                       <p class="btn btn-primary"> File No.SPK/P8 Tidak Ada </p>
                       <br>
                       <label> Date Delete : {$no_spk_p8_date_delete}</label>

                  </div>
                </div>
              </div>

           
            {/if}
            </div>
            <br>
             

            

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Surat Kesanggupan </label>

              <div class="col-sm-9">
              {if {$surat_kesanggupan_file} == ''}
              <input type="file" class="form-control input-sm" name="surat_kesanggupan" style="border-color: red;">
              {else}
              <input type="file" class="form-control input-sm" name="surat_kesanggupan">
              {/if}
               </div>
  
            <br>
            
            <div class="col-sm-9" style="margin-left:135px; padding:5px 0px 10px 0px;">
            {if {$surat_kesanggupan_file} != ''}
            <div class="col-sm-11">
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Informasi File
                  </div>
                  <div class="panel-body">

                       <a href="doc_uploads/sk/{$surat_kesanggupan_file}" target="_blank" class="btn btn-primary"> <i class="glyphicon glyphicon-file"> </i> {$surat_kesanggupan_file} </a>
                       <br>
                       <label> Date Upload : {$surat_kesanggupan_date_upload}</label> <br>
                       <label> Date Update : {$surat_kesanggupan_date_edit}</label>
                       <br>
                       <br>
                        
                         <a href="master_pdct.php?act=UnlinkFileSK&id={$id}&idcust={$idcust}" class="btn btn-xs btn-danger"> [X] Hapus File </a>
                       

                  </div>
                </div>
              </div>
            {else}
            <div class="col-sm-11">
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Informasi File
                  </div>
                  <div class="panel-body">
                       <p class="btn btn-primary"> File Surat Kesanggupan Tidak Ada </p>
                        <br>
                       <label> Date Delete : {$surat_kesanggupan_date_delete} </label>

                  </div>
                </div>
              </div>
            
            {/if}
            </div>
            <br>


            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Contract Number </label>

              
              <div class="col-sm-9">
              {if {$contract_number_file} == ''}
              <input type="file" class="form-control input-sm" name="contract_number" style="border-color: red;">
              {else}
              <input type="file" class="form-control input-sm" name="contract_number">
              {/if}
              </div>

              
            <br>
            <div class="col-sm-9" style="margin-left:135px; padding:5px 0px 10px 0px;">
            {if {$contract_number_file} != ''}
            <div class="col-sm-11">
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Informasi File
                  </div>
                  <div class="panel-body">

                       <a href="doc_uploads/cn/{$contract_number_file}" target="_blank" class="btn btn-primary"> <i class="glyphicon glyphicon-file"> </i> {$contract_number_file} </a>
                       <br>
                       <label> Date Upload : {$contract_number_date_upload}</label> <br>
                       <label> Date Update : {$contract_number_date_edit}</label>
                       <br>
                       <br>
                        
                         <a href="master_pdct.php?act=UnlinkFileCN&id={$id}&idcust={$idcust}" class="btn btn-xs btn-danger"> [X] Hapus File </a>
                       

                  </div>
                </div>
              </div>
            {else}
            <div class="col-sm-11">
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Informasi File
                  </div>
                  <div class="panel-body">
                       <p class="btn btn-primary"> File Contract Number Tidak Ada </p>
                        <br>
                       <label> Date Delete : {$contract_number_date_delete} </label>

                  </div>
                </div>
              </div>
            
            {/if}
            </div>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Contract Date </label>

              <div class="col-sm-9">

               {if {$contract_date} == ''}
               <input type="text" id="dp3" class="form-control input-sm" style="border-color: red;" value="{$contract_date}" name="contract_date">
               {else}
               <input type="text" id="dp3" class="form-control input-sm" value="{$contract_date}" name="contract_date">
               {/if}

                

              <div class="col-sm-12" style="padding:10px 0px 10px 0px;" align="center">
             
              </div>
              
         
              </div>
              
            </div>

            <br>
            <br>


            <div class="col-sm-9" style="margin-left:140px;">
             
            </div>
            <br>
            <br>


            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> BAST </label>

              <div class="col-sm-9">
               {if {$bast_file} == ''}
               <input type="file" class="form-control input-sm" style="border-color: red;" name="bast">
               {else}
               <input type="file" class="form-control input-sm" name="bast">
               {/if}
              </div>
 
            </div>

            <br>
            <div class="col-sm-9" style="margin-left:135px; padding:5px 0px 10px 0px;">
            {if {$bast_file} != ''}
            <div class="col-sm-11">
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Informasi File
                  </div>
                  <div class="panel-body">

                       <a href="doc_uploads/bast/{$bast_file}" target="_blank" class="btn btn-primary"> <i class="glyphicon glyphicon-file"> </i> {$bast_file} </a>
                       <br>
                       <label> Date Upload : {$bast_date_upload}</label> <br>
                       <label> Date Update : {$bast_date_edit}</label>
                       <br>
                       <br>
                        
                         <a href="master_pdct.php?act=UnlinkFileBAST&id={$id}&idcust={$idcust}" class="btn btn-xs btn-danger"> [X] Hapus File </a>
                       

                  </div>
                </div>
              </div>
            {else}
             <div class="col-sm-11">
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Informasi File
                  </div>
                  <div class="panel-body">
                       <p class="btn btn-primary"> File BAST Tidak Ada </p>
                        <br>
                       <label> Date Delete : {$bast_date_delete}</label>

                  </div>
                </div>
              </div>
            
            {/if}
            </div>
            <br>
           <div class="col-sm-9" style="margin-left:135px; padding:5px 0px 10px 0px;">
             
            </div>
            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> BASO </label>

              <div class="col-sm-9">
               {if {$baso_file} == ''}
               <input type="file" class="form-control input-sm" style="border-color: red;" name="baso">
               {else}
               <input type="file" class="form-control input-sm" name="baso">
               {/if}
             
              </div>
        
            </div>

            <br>
             <div class="col-sm-9" style="margin-left:135px; padding:5px 0px 10px 0px;">
            {if {$baso_file} != ''}
              <div class="col-sm-11">
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Informasi File
                  </div>
                  <div class="panel-body">

                       <a href="doc_uploads/baso/{$baso_file}" target="_blank" class="btn btn-primary"> <i class="glyphicon glyphicon-file"> </i> {$baso_file} </a>
                       <br>
                       <label> Date Upload : {$baso_date_upload}</label> <br>
                       <label> Date Update : {$baso_date_edit}</label>
                       <br>
                       <br>
                        
                         <a href="master_pdct.php?act=UnlinkFileBASO&id={$id}&idcust={$idcust}" class="btn btn-xs btn-danger"> [X] Hapus File </a>
                       

                  </div>
                </div>
              </div>            
            {else}
           <div class="col-sm-11">
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Informasi File
                  </div>
                  <div class="panel-body">
                       <p class="btn btn-primary"> File BASO Tidak Ada </p>
                        <br>
                       <label> Date Delete : {$baso_date_delete}</label>

                  </div>
                </div>
              </div>
            
            {/if}
            </div>
            <br>
            
           
            </fieldset>

            

            <br>
            <br>


            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Account No</label>


              <div class="col-sm-9">
              {if {$account_no} == ''}
                  <input type="text" style="border-color: red;" class="form-control input-sm" name="acc_no" value="{$account_no}">
              {else}
                   <input type="text" class="form-control input-sm" name="acc_no" value="{$account_no}">
              {/if}
               
              </div>
              
            </div>

            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> SID</label>

              <div class="col-sm-9">
              {if {$sid} == ''}
                 <input type="text" style="border-color: red;" class="form-control input-sm" value="{$sid}" name="sid">
              {else}
                  <input type="text" class="form-control input-sm" value="{$sid}" name="sid">
              {/if}


                
              </div>
              
            </div>

            <br>
            <br>

             <div class="form-group">
              <label  class="col-sm-3 form-control-static"> CID</label>

              <div class="col-sm-9">

               {if {$cid} == ''}
                <input type="text" style="border-color: red;" class="form-control input-sm" value="{$cid}" name="cid">
               {else}
                <input type="text" class="form-control input-sm" value="{$cid}" name="cid">
               {/if}
               </div>
              
            </div>

            <br>
            <br>

          
          
        </div>
        <!--col-md-6-->
        <div class="col-md-6 small">
 
            <hr>
             <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Contract Status</label>

              <div class="col-sm-9">

               {if {$cont_status_opt} == ''}
                 <select name="contract_status" class="form-control" style="border-color: red;">
                  <option value="" selected="selected">--Pilih--</option>
                  {section name = detail loop=$cont_status_opt}
                  <option value="{$cont_status_opt[detail].id}" {$cont_status_opt[detail].selected}> {$cont_status_opt[detail].contract_status} </option>
                  {/section}
                </select>

               {else}

                <select name="contract_status" class="form-control" style="border-color: red;">
                  <option value="" selected="selected">--Pilih--</option>
                  {section name = detail loop=$cont_status_opt}
                  <option value="{$cont_status_opt[detail].id}" {$cont_status_opt[detail].selected}> {$cont_status_opt[detail].contract_status} </option>
                  {/section}
                </select>


               {/if}

 
              </div>
              
            </div>

            <br>
            <br>
            <hr>
            <br>


           
              <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Starting</label>

              <div class="col-sm-9">
               {if {$mulai} == ''}
                 <input type="text" style="border-color: red;" required="required" class="form-control input-sm" name="starting" value="{$mulai}" id="dp1"> <label style="color:red;"> * Wajib Diisi </label>
               {else}
                 <input type="text" class="form-control input-sm" required="required" name="starting" value="{$mulai}" id="dp1"> <label style="color:red;"> * Wajib Diisi </label>
               {/if}


                
              </div>
              
            </div>

            <br>
            <br>
         
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Ending</label>

              <div class="col-sm-7">
               {if {$akhir} == ''}
                <input type="text" style="border-color: red;" class="form-control input-sm" name="ending" value="{$akhir}" id="dp2" required="required"> <label style="color:red;"> * Wajib Diisi </label>
               {else}
                <input type="text" class="form-control input-sm" name="ending" required="required" value="{$akhir}" id="dp2"> <span style="color:red;"> <label style="color:red;"> * Wajib Diisi </label>
               {/if}

 
              </div>
              
            </div>

            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Masa Kontrak</label>

              <div class="col-sm-9">
               {if {$masa_kontrak} == ''}
               <input type="text" style="border-color: red;" class="form-control input-sm" value="{$masa_kontrak}" name="masa_kontrak" >
               {else}
               <input type="text" class="form-control input-sm" value="{$masa_kontrak}" name="masa_kontrak" >
               {/if}
 
              </div>
              
            </div>

           

            <br>
            <br>
            
            <br>
             
            

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Account Manager</label>

              <div class="col-sm-9">
               {if {$account_manager} == ''}
               <input type="text" style="border-color: red;" class="form-control input-sm" name="acc_manager" value="{$account_manager}">
               {else}
               <input type="text" class="form-control input-sm" name="acc_manager" value="{$account_manager}">
               {/if}

                
              </div>
              
            </div>

            <br>
            <br>

           
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Email</label>

              <div class="col-sm-9">
               {if {$email} == ''}
               <input type="text" style="border-color: red;" class="form-control input-sm" name="email" value="{$email}">
               {else}
               <input type="text" class="form-control input-sm" name="email" value="{$email}">
               {/if}

                
              </div>
              
            </div>

            <br>
            <br>
            
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Phone</label>

              <div class="col-sm-9">
               {if {$phone} == ''}
               <input type="text" style="border-color: red;" class="form-control input-sm" name="phone" value="{$phone}">
               {else}
               <input type="text" class="form-control input-sm" name="phone" value="{$phone}">
               {/if}

                
              </div>
              
            </div>

            <br>
            <br>

            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> OTC </label>

              <div class="col-sm-9">
               {if {$otc} == '' OR {$otc} == 0}
               <input type="text" style="border-color: red;" id="otc" class="form-control input-sm" name="otc" value="{$otc}">
               {else}
               <input type="text" id="otc" class="form-control input-sm" name="otc" value="{$otc}">
               {/if}
 
              </div>
              
            </div>

            <br>
            <br>
 
            <div class="form-group">
              <label  class="col-sm-3 form-control-static"> Monthly</label>

              <div class="col-sm-9">
               {if {$monthly} == '' OR {$monthly} == 0}
               <input type="text" style="border-color: red;" id="monthly" class="form-control input-sm" value="{$monthly}" name="monthly">
               {else}
               <input type="text" id="monthly" class="form-control input-sm" value="{$monthly}" name="monthly">
               {/if}
 
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















 