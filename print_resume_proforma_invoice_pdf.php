<?php

ob_start();
require "user_cek.php";
date_default_timezone_set("Asia/Jakarta");
include "config.php";
include "fn_tgl_indo.php";
$tgl = date('Y m d');
?>


<page>

<?php
$id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
$id_contract_status = isset($_REQUEST['id_contract_status']) ? $_REQUEST['id_contract_status'] : '';
$bill_period = isset($_REQUEST['bill_period']) ? $_REQUEST['bill_period'] : '';
$nomorinvoice = substr(str_shuffle(str_repeat("0123456789", 8)), 0, 5);
           

            //get all info
            $sqlinfo = "select a.id,b.customer_name,a.project_no,a.site_name,c.account_manager,
                       a.cc_name, c.phone,c.email,c.site_code,c.contract_number_file,c.account_no,
                       d.bill_periode, d.bill_amount,e.charges,f.contract_status from pdct_customer a
                       left join pdct_customer_name b on b.id = a.id_customer_name
                       left join pdct_contract c on c.id_customer = a.id
                       left join pdct_billing d on d.id_contract = c.id
                       left join pdct_charges e on e.id = d.charges
                       left join pdct_contract_status f on f.id = c.contract_status_opt
                       where a.id_customer_name = '$id_customer_name' and
                       c.contract_status_opt = '$id_contract_status' and
                       d.bill_periode = '$bill_period'";
            $exsqlinfo = $db->Execute($sqlinfo);
            $getinfo = $exsqlinfo->FetchRow();

            $namacustomer = $getinfo['customer_name'];
            $contract_status = $getinfo['contract_status'];
            $periode_until = $getinfo['bill_periode'];

            //get list data
            $sql = "select a.id,b.customer_name,a.project_no,a.site_name,c.account_manager,
                    a.cc_name, c.phone,c.email,c.site_code,c.contract_number_file,
                    c.account_no,c.contract_status_opt, d.bill_periode, d.bill_amount,
                    e.charges,sum(d.bill_amount) as total from pdct_customer a
                    left join pdct_customer_name b on b.id = a.id_customer_name
                    left join pdct_contract c on c.id_customer = a.id
                    left join pdct_billing d on d.id_contract = c.id
                    left join pdct_charges e on e.id = d.charges
                    where a.id_customer_name = '$id_customer_name'
                    and c.contract_status_opt = '$id_contract_status' 
                    and d.bill_periode = '$bill_period' GROUP BY c.site_code";

?> 
 
 
 
 
 <br>
 
     <br> 
 
 
  <table class="table table-stripped table-hover" border="1" cellpadding="3" cellspacing="0" style="width: 100%;">
   <tr align="center">
    <td style="width: 25%;"> <img src="images/logoku.png" style="width: 65%; height: 5%;"> </td>
    <td style="width: 50%;"><h3> RESUME PROFORMA INVOICE </h3></td>
    <td style="width: 25%;"><h4> No. <?php echo $nomorinvoice; ?> </h4> </td>
   </tr>
 </table>
 
 <br>
 <table class="table table-stripped table-hover" border="0" cellpadding="3" cellspacing="0" style="width: 100%;">       
        <tr>  
            <td colspan="6"> <b> TO </b> </td>
        </tr>
        <tr>  
            <td> <b> Customer Name </b> </td>
            <td> : </td>
            <td> <?php echo $namacustomer; ?> </td>
            
        </tr>

        <tr>  
            <td> <b> Contract Status </b> </td>
            <td> : </td>
            <td>  <?php echo $contract_status; ?>  </td>
        </tr>
        
        <tr>  
            
            <td> <b> Bill Period </b> </td>
            <td> : </td>
            <td> <?php echo $periode_until; ?>  </td>
        </tr>

    </table>
     <br>
  <br>
  <table border="1" class="table table-striped table-bordered table-hover" cellpadding="3" cellspacing="0" style="width:100%;">
              <thead style="background-color:#CEF5C9;" align="center">
                <tr>
                <td style="width: 30%;"> <b>Contract Number</b> </td>
                <td style="width: 15%; text-align: center;"> <b>Username</b>  </td>
                <td style="width: 20%; text-align: center;"> <b>Site Name</b>  </td>
                <td style="width: 10%; text-align: center;"> <b>Account</b>  </td>
                
                <td style="width: 20%; text-align: center;"> <b>Total Balance</b>  </td>
                </tr>
              </thead>

              <tbody>
              <?php
              
             
              $exsql = $db->Execute($sql);
              $sumtotal = 0;
              while ($row = $exsql->FetchRow()){
              
             
              ?>
                <tr>
                <td> <b><?php echo $row['contract_number_file']; ?></b> </td>
                <td align="center"> <b><?php echo $row['site_name']; ?></b>  </td>
                <td align="center"> <b><?php echo $row['account_no']; ?></b>  </td>
                <td align="center"> <b><?php echo $row['bill_periode']; ?></b>  </td>
                <td> <b> IDR. <?php echo number_format($row['total'],0,".","."); ?></b>  </td>
                 
                </tr>
                        
              <?php
              $sumtotal += $row['total'];
              }
              ?>
               <tr>
                <td colspan="4" align="center"> <b> TOTAL </b> </td>
                <td> <b> IDR. <?php echo number_format($sumtotal,'0',".","."); ?> </b> </td>
                <td> </td>
              </tr>
              </tbody>


               
           </table>
           
  
 
</page>



<?php
$invoice = 'resume_proforma_invoice_'.$nomorinvoice;
 $content = ob_get_clean();
 require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'en');
        $html2pdf->pdf->SetDisplayMode('fullpage'); 
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('resume_proforma_invoice_"'.$nomorinvoice.'".pdf');
        $html2pdf->Output('C:/xampp/htdocs/pdct/resume_invoice/'.$invoice.'.pdf','F');
    }
   catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
 

 ?>

 