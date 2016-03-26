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
      alert('1');
        $("#acc_manager").change(function (){
       var id = $(this).val();
       $.ajax({
         url : "getphonemail.php",
         type : "post",
         dataType : "json",
         data : {id:id},
         success: function(data,status){
          $.each(data, function(i,item){
            $("#bobot").val(item.bobot);
            $("#target").val(item.target);
            $("#satuan").val(item.satuan);
             
           
          });
         },
         error: function(e){
           alert('fail');
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
       
    
    });
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
        <h2>Proforma Invoice PT Wave Communication Indonesia</h2>
        </div>

        </div>



 

    <form action="" method="POST" enctype="multipart/form-data">
    
    <table class="table table-stripped table-hover">
      <tr>  
        <td colspan="6"> <b> TO </b> </td>
      </tr>
       <tr>  
        <td> <b> Customer Name </b> </td>
        <td> : </td>
        <td>  
            <select name="id_customer_name" class="form-control" required="required"> 
            <option value="" selected="selected">--Pilih--</option>
                      {section name = detail loop=$customer_name_opt}
                      <option value="{$customer_name_opt[detail].id}" {$customer_name_opt[detail].selected}> {$customer_name_opt[detail].customer_name} </option>
                      {/section}
            </select> 
        </td>
        <td> <b> CC Name </b> </td>
        <td> : </td>
        <td>  
            <select name="cc_name" class="form-control" required="required"> 
            <option value="" selected="selected">--Pilih--</option>
                      {section name = detail loop=$cc_name_opt}
                      <option value="{$cc_name_opt[detail].cc_name}" {$cc_name_opt[detail].selected}> {$cc_name_opt[detail].cc_name} </option>
                      {/section}
            </select> 
        </td>
       </tr>
       <tr>  
        <td> <b> Account Manager </b> </td>
        <td> : </td>
        <td> 
            <select name="account_manager" id="acc_manager" class="form-control" required="required"> 
            <option value="" selected="selected">--Pilih--</option>
                      {section name = detail loop=$account_manager_opt}
                      <option value="{$account_manager_opt[detail].account_manager}" {$account_manager_opt[detail].selected}> {$account_manager_opt[detail].account_manager} </option>
                      {/section}
            </select> 
        </td>
        <td> <b> Project No </b> </td>
        <td> : </td>
        <td>  
            <select name="project_no" class="form-control" required="required"> 
            <option value="" selected="selected">--Pilih--</option>
                      {section name = detail loop=$project_no_opt}
                      <option value="{$project_no_opt[detail].project_no}" {$project_no_opt[detail].selected}> {$project_no_opt[detail].project_no} </option>
                      {/section}
            </select> 
        </td>
       </tr>
        <tr>  
        
        <td> <b> Periode Until </b> </td>
        <td> : </td>
        <td> 
            <select name="periode_until" class="form-control" required="required"> 
            <option value="" selected="selected">--Pilih--</option>
                      {section name = detail loop=$bill_period_opt}
                      <option value="{$bill_period_opt[detail].bill_periode}" {$bill_period_opt[detail].selected}> {$bill_period_opt[detail].bill_periode} </option>
                      {/section}
            </select> 
        </td>
       </tr>

    </table>


    
  
     <input type="submit" name="caridata" class="btn btn-primary btn-block" value="Cari Data">  
    
     </form>
     <br>

     {$info}

        <table class="table table-stripped table-hover">
        <tr>  
            <td colspan="6"> <b> TO </b> </td>
        </tr>
        <tr>  
            <td> <b> Customer Name </b> </td>
            <td> : </td>
            <td> {$namacustomer} </td>
            <td> <b> CC Name </b> </td>
            <td> : </td>
            <td> {$cc_name}</td>
        </tr>

        <tr>  
            <td> <b> Account Manager </b> </td>
            <td> : </td>
            <td> {$account_manager} </td>
            <td> <b> Project No </b> </td>
            <td> : </td>
            <td> {$project_no} </td>
        </tr>
        
        <tr>  
            <td> <b> Phone / Email </b> </td>
            <td> : </td>
            <td> {$phonemail}</td>
            <td> <b> Periode Until </b> </td>
            <td> : </td>
            <td> {$periode_until}</td>
        </tr>

    </table>
     <br>
     <br> 
 

     <form name="print" method="POST" action="print_proforma_invoice_pdf.php" target="_blank" enctype="multipart/form-data"> 
     <input type="hidden" name="id_customer_name" value="{$id_customer_name}">
     <input type="hidden" name="cc_name" value="{$cc_name}">
     <input type="hidden" name="project_no" value="{$project_no}">
     <input type="hidden" name="account_manager" value="{$account_manager}">
     <input type="hidden" name="periode_until" value="{$periode_until}">

      {$btnprint}
     </form>
     <br>

     <table class="table table-stripped table-hover" >
        <tr>
        <td> <b>Contract Number</b> </td>
        <td> <b>Site Name</b>  </td>
        <td> <b>Account No</b>  </td>
        <td> <b>Periode</b>  </td>
        <td> <b>Bill Amount</b>  </td>
        <td> <b>Charges Amount</b>  </td>
        </tr>
         
        {section name = detail loop = $list}
        <tr>
        <td> {$list[detail].contract_number_file}  </td>
        <td> {$list[detail].site_name} </td>
        <td> {$list[detail].account_no} </td>
        <td> {$list[detail].periode} </td>
        <td> IDR  {$list[detail].bill_amount} </td>
        <td> {$list[detail].charges} </td>
        </tr>
        {/section}
       

         <tr>
          <td colspan="4"> <b>TOTAL IDR </b> </td>
          <td colspan="2"> <b>IDR {$sumtotal} </b></td>
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






