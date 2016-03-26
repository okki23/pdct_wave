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
$cc_name = isset($_REQUEST['cc_name']) ? $_REQUEST['cc_name'] : '';
$project_no = isset($_REQUEST['project_no']) ? $_REQUEST['project_no'] : '';
$account_manager = isset($_REQUEST['account_manager']) ? $_REQUEST['account_manager'] : '';
$periode_until = isset($_REQUEST['periode_until']) ? $_REQUEST['periode_until'] : '';
$nomorinvoice = substr(str_shuffle(str_repeat("0123456789", 8)), 0, 5);
            /*
            //get data customer
            $sqlcust = "select * from pdct_customer_name where id = '$id_customer_name'";
            $exsqlcust =$db->Execute($sqlcust);
            $getcust = $exsqlcust->FetchRow();
            $namacustomer = $getcust['customer_name'];

            //get phonemail
            $sqlpm = "select a.* ,b.site_code,b.account_manager,b.email,b.phone from pdct_customer a
                      left join pdct_contract b on b.id_customer = a.id
                      where a.id_customer_name = '$id_customer_name'
                      group by b.id_customer ";
            $exsqlpm = $db->Execute($sqlpm);
            $getpm = $exsqlpm->FetchRow();
            $phonemail = $getpm['phone'] ." / ". $getpm['email'];
            */

            //get all info
            $sqlinfo = "select a.id,b.customer_name,a.project_no,a.site_name,c.account_manager,
                       a.cc_name, c.phone,c.email,c.site_code,c.contract_number_file,c.account_no,
                       d.bill_periode, d.bill_amount,e.charges from pdct_customer a
                       left join pdct_customer_name b on b.id = a.id_customer_name
                       left join pdct_contract c on c.id_customer = a.id
                       left join pdct_billing d on d.id_contract = c.id
                       left join pdct_charges e on e.id = d.charges
                       where a.id_customer_name = '$id_customer_name' 
                       and c.account_manager = '$account_manager' 
                       and a.cc_name = '$cc_name' 
                       and a.project_no = '$project_no' 
                       and d.bill_periode <= '$periode_until'";
            $exsqlinfo = $db->Execute($sqlinfo);
            $getinfo = $exsqlinfo->FetchRow();

            $namacustomer = $getinfo['customer_name'];
            $phonemail = $getinfo['phone'] ." / ". $getinfo['email'];
            $account_manager = $getinfo['account_manager'];
            $cc_name = $getinfo['cc_name'];
            $project_no = $getinfo['project_no'];
            $periode_until = $getinfo['bill_periode'];

?> 
 
 
 
 
 <br>
 
     <br> 
 
 
  <table class="table table-stripped table-hover" border="1" cellpadding="3" cellspacing="0" style="width: 100%;">
   <tr align="center">
    <td style="width: 25%;"> <img src="images/logoku.png" style="width: 65%; height: 5%;"> </td>
    <td style="width: 50%;"><h3> PROFORMA INVOICE </h3></td>
    <td style="width: 25%;"><h4> No. <?php echo $nomorinvoice; ?> </h4> </td>
   </tr>
 </table>
 
 <br>
 <table class="table table-stripped table-hover" cellpadding="3" cellspacing="0" style="width: 100%;">        <tr>  
            <td colspan="6"> <b> TO </b> </td>
        </tr>
        <tr>  
            <td> <b> Customer Name </b> </td>
            <td> : </td>
            <td> <?php echo $namacustomer; ?> </td>
            <td> <b> CC Name </b> </td>
            <td> : </td>
            <td> <?php echo $cc_name; ?></td>
        </tr>

        <tr>  
            <td> <b> Account Manager </b> </td>
            <td> : </td>
            <td> <?php echo $account_manager; ?> </td>
            <td> <b> Project No </b> </td>
            <td> : </td>
            <td>  <?php echo $project_no; ?>  </td>
        </tr>
        
        <tr>  
            <td> <b> Phone / Email </b> </td>
            <td> : </td>
            <td> <?php echo $phonemail; ?> </td>
            <td> <b> Periode Until </b> </td>
            <td> : </td>
            <td> <?php echo $periode_until; ?>  </td>
        </tr>

    </table>
     <br>
  <br>
  <table border="1" class="table table-striped table-bordered table-hover" cellpadding="3" cellspacing="0" style="width:100%;">
              <thead style="background-color:#CEF5C9;" align="center">
                <tr>
                <td style="width: 25%;"> <b>Contract Number</b> </td>
                <td style="width: 15%; text-align: center;"> <b>Site Name</b>  </td>
                <td style="width: 15%; text-align: center;"> <b>Account No</b>  </td>
                <td style="width: 10%; text-align: center;"> <b>Periode</b>  </td>
                <td style="width: 15%;"> <b>Bill Amount</b>  </td>
                <td style="width: 20%; text-align: center;"> <b>Charges Amount</b>  </td>
                </tr>
              </thead>

              <tbody>
              <?php
              $no = 1;
               $sql = "select a.id,b.customer_name,a.project_no,a.site_name,c.account_manager,
                       a.cc_name, c.phone,c.email,c.site_code,c.contract_number_file,c.account_no,
                       d.bill_periode, d.bill_amount,e.charges from pdct_customer a
                       left join pdct_customer_name b on b.id = a.id_customer_name
                       left join pdct_contract c on c.id_customer = a.id
                       left join pdct_billing d on d.id_contract = c.id
                       left join pdct_charges e on e.id = d.charges
                       where a.id_customer_name = '$id_customer_name' 
                       and c.account_manager = '$account_manager' 
                       and a.cc_name = '$cc_name' 
                       and a.project_no = '$project_no' 
                       and d.bill_periode <= '$periode_until'";
              $exsql = $db->Execute($sql);
              $sumtotal = 0;
              while ($row = $exsql->FetchRow()){
              
             
              ?>
                <tr>
                <td> <b><?php echo $row['contract_number_file']; ?></b> </td>
                <td align="center"> <b><?php echo $row['site_name']; ?></b>  </td>
                <td align="center"> <b><?php echo $row['account_no']; ?></b>  </td>
                <td align="center"> <b><?php echo $row['bill_periode']; ?></b>  </td>
                <td> <b> IDR. <?php echo number_format($row['bill_amount'],0,".","."); ?></b>  </td>
                <td align="center"> <b><?php echo $row['charges']; ?></b>  </td>
                </tr>
                        
              <?php
              $sumtotal += $row['bill_amount'];
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
$invoice = 'proforma_invoice_'.$nomorinvoice;
 $content = ob_get_clean();
 require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'en');
        $html2pdf->pdf->SetDisplayMode('fullpage'); 
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('proforma_invoice_"'.$nomorinvoice.'".pdf');
        $html2pdf->Output('C:/xampp/htdocs/pdct/proforma_invoice/'.$invoice.'.pdf','F');
    }
   catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

  

 ?>

 