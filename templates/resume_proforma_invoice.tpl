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

          <div class="container">
    <div class="row">
    <div class="col-md-12">
    <div style="margin-top:50px;">
    </div>
       
        <div class="jumbotron">
        <div align="right">
        <img src="images/logo.gif">
        <h2>Resume Proforma Invoice PT Wave Communication Indonesia</h2>
        </div>

        </div>



 

    <form action="" method="POST" enctype="multipart/form-data">
     <table class="table table-stripped table-hover">
      <tr>
        <td>  Customer Name  </td>
        <td>  : </td>
        <td colspan="3">  
        <select name="id_customer_name" class="form-control" required="required"> 
        <option value="" selected="selected">--Pilih--</option>
                  {section name = detail loop=$customer_name_opt}
                  <option value="{$customer_name_opt[detail].id}" {$customer_name_opt[detail].selected}> {$customer_name_opt[detail].customer_name} </option>
                  {/section}
        </select> 
        </td>
      </tr>


      <tr>
        <td>  Contract Status  </td>
        <td>  : </td>
        <td colspan="3">  
         <select name="id_contract_status" class="form-control" required="required"> 
         <option value="" selected="selected">--Pilih--</option>
                  {section name = detail loop=$contract_status}
                  <option value="{$contract_status[detail].id}" {$contract_status[detail].selected}> 
                  {$contract_status[detail].contract_status} </option>
                  {/section}
         </select> 

         </td>
      </tr>

     
      <tr>
        <td>  Bill Periode  </td>
        <td>  : </td>
        <td>
        <select name="bill_period" class="form-control" required="required">
         <option value="" selected="selected">--Pilih--</option>
                  {section name = detail loop=$bill_period_opt}
                  <option value="{$bill_period_opt[detail].bill_periode}" {$bill_period_opt[detail].selected}> 
                  {$bill_period_opt[detail].bill_periode} </option>
                  {/section}
         </select> 
        </td>
      </tr>

     </table>
  
     <input type="submit" name="caridata" class="btn btn-primary btn-block" value="Cari Data">  
     
    
     </form>
     <br>
     {$info}
     

     <table class="table table-stripped table-hover" >
     
       <tr>  
          <td> <b>Customer Name </b> </td>
          <td> : </td>
          <td> {$namacustomer} </td>
       </tr>
       <tr>  
          <td> <b>Contract Status </b> </td>
          <td> : </td>
          <td> {$contractstatus} </td>
       </tr>
       <tr>  
          <td> <b>Bill  Periode  </b> </td>
          <td> : </td>
          <td>  {$bill_period} </td>
       </tr>
 
  <br>
   <form name="print" method="POST" action="print_resume_proforma_invoice_pdf.php" target="_blank" enctype="multipart/form-data">     
     {$btnprint}

     <input type="hidden" name="id_contract_status" value="{$id_contract_status}">
     <input type="hidden" name="id_customer_name" value="{$id_customer_name}">
     <input type="hidden" name="bill_period" value="{$bill_period}">
   
     </form>
    <br>
    &nbsp;

     <table class="table table-stripped table-hover" >
        <tr>
        <td> <b>Contract Number </b> </td>
        <td> <b>Username </b>  </td>
        <td> <b>Site </b> </td>
        <td> <b>Account  </b>  </td>
        <td> <b>Total Balance </b>  </td>
        </tr>

        {section name = detail loop = $list}
        <tr>
        <td> {$list[detail].contract_number_file} </td>
        <td> {$list[detail].cc_name} </td>
        <td> {$list[detail].site_name} </td>
        <td> {$list[detail].account_no} </td>
        <td> IDR {$list[detail].total} </td>
        </tr>
        {/section}

         

         <tr>
          <td colspan="4"> <b>TOTAL</b> </td>
          <td> <b>IDR. {$sumtotal} </b></td>
        </tr>
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






