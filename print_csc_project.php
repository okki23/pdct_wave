<?php
  
 header("Content-Type: application/force-download");
 header("Cache-Control: no-cache, must-revalidate");
 header("Expires: Sat, 26 Jul 2010 05:00:00 GMT"); 
 header("content-disposition: attachment;filename=csc_project".date('d-m-Y').".xls");
 
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
		$paid_csc = isset($_REQUEST['paid_csc']) ? $_REQUEST['paid_csc'] : '';
       $id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
 		 
        $start_date_send = $_POST['start_date_send'];
        $ending_date_send = $_POST['ending_date_send'];
          
      
        
        //x0
       if(!empty($id_customer_name) && empty($start_date_send) && empty($ending_date_send)) {
            

            //newest
            $sql = "select a.id,a.project_no,b.customer_name,a.cc_name,c.nama_pekerjaan,c.contract_number_file,c.id as idcont,d.paid_csc,sum(d.csc) as totalcsc from pdct_customer a
                LEFT JOIN pdct_customer_name b on b.id = a.id_customer_name
                LEFT JOIN pdct_contract c on c.id_customer = a.id
                LEFT JOIN pdct_billing d on d.id_contract = c.id
                where a.id_customer_name = '$id_customer_name' and d.csc != ''
                GROUP BY c.id,d.paid_csc";
      

             

     
                //get data customer
                $sqlcust = "select * from pdct_customer_name where id = '$id_customer_name'";
                $exsqlcust =$db->Execute($sqlcust);
                $getcust = $exsqlcust->FetchRow();
                $namacustomer = $getcust['customer_name'];

             


        //xx
        }elseif(!empty($id_customer_name) && !empty($start_date_send) && !empty($ending_date_send)) {
         

            //newest
            $sql = "select a.id,a.project_no,b.customer_name,a.cc_name,c.nama_pekerjaan,c.contract_number_file,c.id as idcont,d.paid_csc,sum(d.csc) as totalcsc from pdct_customer a
                LEFT JOIN pdct_customer_name b on b.id = a.id_customer_name
                LEFT JOIN pdct_contract c on c.id_customer = a.id
                LEFT JOIN pdct_billing d on d.id_contract = c.id
                where a.id_customer_name = '$id_customer_name' and 
                c.contract_date BETWEEN '$start_date_send' and '$ending_date_send' and d.csc != ''
                GROUP BY c.id,d.paid_csc";
     
               
                //get data customer
                $sqlcust = "select * from pdct_customer_name where id = '$id_customer_name'";
                $exsqlcust =$db->Execute($sqlcust);
                $getcust = $exsqlcust->FetchRow();
                $namacustomer = $getcust['customer_name'];

             

         
        //0x
        }elseif (empty($id_customer_name) && !empty($start_date_send) && !empty($ending_date_send)) {
 
            //newest
            $sql = "select a.id,a.project_no,b.customer_name,a.cc_name,c.nama_pekerjaan,c.contract_number_file,c.id as idcont,d.paid_csc,sum(d.csc) as totalcsc from pdct_customer a
                LEFT JOIN pdct_customer_name b on b.id = a.id_customer_name
                LEFT JOIN pdct_contract c on c.id_customer = a.id
                LEFT JOIN pdct_billing d on d.id_contract = c.id
                where c.contract_date BETWEEN '$start_date_send' and '$ending_date_send' and d.csc != '' 
                GROUP BY c.id,d.paid_csc";
     
           

     
                //get data customer
                 
                $namacustomer = '';

             


 
        }
     
          /*--------------------------------------*/
       

 
  
?>
<h1 align="center"> CSC Project </h1>
  <table align="center" border="0" cellpadding="3" cellspacing="0" width="100%">
        
         
          <tr>  

         
            <td> <b> Customer Name </b> </td>
            
            <td colspan="3"> :
            <?php 
            if($namacustomer == ''){
            echo '-';
            }else{
            echo $namacustomer; 
            }?>
            </td>
          
        </tr>
        
        <tr>
           <td> <b>Month</b> </td>
            
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

       <!--Customer Name    Nama Pekerjaan  Contract Number     Total CSC  -->

    </table>
    <br>
     <table align="center" class="table table-stripped table-hover" border="1" cellpadding="3" cellspacing="0" width="100%">
        <tr align="center">
        <td> <b>Contract Number </b>  </td>
        <td> <b>Nama Pekerjaan </b> </td>
        <td> <b>CC Name </b>  </td>
        <td> <b>Status CSC </b>  </td>
        <td colspan="2"> <b>Total CSC </b> </td>
        </tr>
        
        <?php

 		$exsql = $db->Execute($sql);
		 
		while($row = $exsql->FetchRow()){
			
        ?>

        <tr>
        <td> <?php echo $row['contract_number_file']; ?>  </td>
        <td> <?php echo $row['nama_pekerjaan']; ?> </td>
        <td align="center"> <?php echo $row['cc_name']; ?> </td>
        <td align="center"> <?php echo $row['paid_csc']; ?> </td>

        <td style="border-right: 0px;"> Rp.</td>
        <td align="right"> <?php echo number_format($row['totalcsc'],0,".","."); ?>  </td>
         
        </tr>
  		
  		<?php
  		 
		}	
  		?>
       

          
     </table>
</body>
</html>