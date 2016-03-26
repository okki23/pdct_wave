<?php
 /*
 header("Content-Type: application/force-download");
 header("Cache-Control: no-cache, must-revalidate");
 header("Expires: Sat, 26 Jul 2010 05:00:00 GMT"); 
 header("content-disposition: attachment;filename=new_project_list".date('d-m-Y').".xls");
 */
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include "config.php";
include "fn_tgl_indo.php";
		$id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
 		$start_date_send = isset($_REQUEST['start_date_send']) ? $_REQUEST['start_date_send'] : '';
		$ending_date_send = isset($_REQUEST['ending_date_send']) ? $_REQUEST['ending_date_send'] : '';
    

 
 $sql = "select a.*,b.cc_name,sum(c.bill_amount) as totalku  from pdct_contract a
                     left join pdct_customer b on b.id = a.id_customer 
                     left join pdct_billing c on c.id_contract = a.id 
                     where DATE_FORMAT(a.no_spk_p8_date_upload,'%Y-%m-%d') BETWEEN '$start_date_send' and 
                     '$ending_date_send' GROUP BY a.id";
 


 
?>
<h1 align="center"> New Project List </h1>
  <table align="center" border="0" cellpadding="3" cellspacing="0" width="100%">
       
        <tr>
           <td> <b> Periode   </b> </td>
            
            <td> : 
            <?php 
            if(empty($start_date_send)) {
            echo "-";
            }else{
            echo date('d F Y',strtotime($start_date_send));
            }
            ?>
            </td>
            <td> <b>To</b> </td>
            <td>  
            <?php 
            if(empty($ending_date_send)) {
            echo "-";
            }else{
            echo date('d F Y',strtotime($ending_date_send));
            }
            ?>
            </td>
        </tr>

       

    </table>
    <br>
     <table align="center" class="table table-stripped table-hover" border="1" cellpadding="3" cellspacing="0" width="100%">
        <tr align="center">
        <td> <b>Contract Number </b>  </td>
        <td> <b>Nama Pekerjaan </b> </td>
        <td> <b>CC Name </b>  </td>
        <td> <b>Total Bill Amount </b> </td>
        </tr>
        
        <?php

     
      
      
		$exsql = $db->Execute($sql);
		$sumtotal = 0;
		while($row = $exsql->FetchRow()){
			
        ?>

        
       
        <tr>
        <td> <?php echo $row['contract_number_file']; ?>  </td>
        <td> <?php echo $row['nama_pekerjaan']; ?> </td>
        <td align="center"> <?php echo $row['cc_name']; ?> </td>
      
        <td align="center"> IDR <?php echo number_format($row['totalku'],0,".","."); ?>  </td>
         
        </tr>
  		
  		<?php
  		$sumtotal += $row['totalku'];
		}	
  		?>
       

         <tr align="center">
          <td colspan="3"> <b>TOTAL IDR </b> </td>
          <td colspan="1"> <b>IDR . <?php echo number_format($sumtotal,0,".","."); ?> </b></td>
        </tr>
     </table>
</body>
</html>