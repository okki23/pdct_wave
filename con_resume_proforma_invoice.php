<?php
require ('libs/Smarty.class.php');
require ('config.php');
require ('fn_protect.php');
require ('user_cek.php');


class Main {
 		
 		function bill_period_opt($selected = ''){
		global $db;
		$data = "select id,bill_periode from pdct_billing GROUP BY bill_periode";
		$get = $db->Execute($data);
		
		if(!$get->RecordCount()){
			$kosong = 'kosong';
			$liz[] = 'kosong';
			$liz[] = 'kosong';
			}else{
		
		while($row = $get->FetchRow()){
			
			$selected_opt = '';
			if($row['id'] == $selected)
			{
				$selected_opt = 'selected=selected';
			}
			
			$bill_period_opt[] = array('id'=>$row['id'],
				'selected'=>$selected_opt,
				'bill_periode'=>$row['bill_periode']);
			}
			
		}
		return $bill_period_opt;
		}
 

		function customer_name_opt($selected = ''){
		global $db;
		$data = "select * from pdct_customer_name";
		$get = $db->Execute($data);
		
		if(!$get->RecordCount()){
			$kosong = 'kosong';
			$liz[] = 'kosong';
			$liz[] = 'kosong';
			}else{
		
		while($row = $get->FetchRow()){
			
			$selected_opt = '';
			if($row['id'] == $selected)
			{
				$selected_opt = 'selected=selected';
			}
			
			$customer_name_opt[] = array('id'=>$row['id'],
				'selected'=>$selected_opt,
				'customer_name'=>$row['customer_name']);
			}
			
		}
		return $customer_name_opt;
		}

		function contract_status($selected = ''){
		global $db;
		$data = "select * from pdct_contract_status";
		$get = $db->Execute($data);
		
		if(!$get->RecordCount()){
			$kosong = 'kosong';
			$liz[] = 'kosong';
			$liz[] = 'kosong';
			}else{
		
		while($row = $get->FetchRow()){
			
			$selected_opt = '';
			if($row['id'] == $selected)
			{
				$selected_opt = 'selected=selected';
			}
			
			$contract_status[] = array('id'=>$row['id'],
				'selected'=>$selected_opt,
				'contract_status'=>$row['contract_status']);
			}
			
		}
		return $contract_status;
		}


		//Start Method PDCT Resume Proforma Invoice
		function View(){
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$caridata = isset($_REQUEST['caridata']) ? $_REQUEST['caridata'] : '';
		$id_contract_status = isset($_REQUEST['id_contract_status']) ? $_REQUEST['id_contract_status'] : '';
		$id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
		$bill_period = isset($_REQUEST['bill_period']) ? $_REQUEST['bill_period'] : '';
		$btnprint = ''; 
		$info = ''; 

		if(empty($caridata)){
			$sql = ""; 		
		 	$sumtotal = 0;
 			$list[] = array("id"=>"-","contract_number_file"=>"-","cc_name"=>"-","site_name"=>"-",
 					  "account_no"=>"-","total"=>"-");
 			$namacustomer = "";
 			$contractstatus = "";
 			$bill_period = "";
 			$btnprint = ''; 
			$info = ''; 

 			//CONTRACT NUMBER	USER NAME	SITE NAME	ACCOUNT 	 TOTAL BALANCE 
			 

		}else{
		$id_contract_status = isset($_REQUEST['id_contract_status']) ? $_REQUEST['id_contract_status'] : '';
		$id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
		$bill_period = isset($_REQUEST['bill_period']) ? $_REQUEST['bill_period'] : '';

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
			
			
			$exsql = $db->Execute($sql);
			$availability = $exsql->RecordCount();

					if($availability > 0){
						$sumtotal = 0;
						while ($row = $exsql->FetchRow()) {
						$list[] = array("id"=>$row['id'],"contract_number_file"=>$row['contract_number_file'],"cc_name"=>$row['cc_name'],"site_name"=>$row['site_name'], "account_no"=>$row['account_no'],
							"total"=>number_format($row['total']),0,".",".");
 
						 
						$sumtotal += $row['total'];
						}

						$btnprint = '<button type="submit" name="print" class="btn btn-primary">
 						<i class="glyphicon glyphicon-print"> </i> Print Resume Proforma Invoice </button>'; 

						$info = '<div class="alert alert-info" align="center">  <b>Data Tersedia Sebanyak '.$availability.' Data </b> </div>'; 

						

					}else{

						$sql = ""; 		
		 				$sumtotal = 0;
 							$list[] = array("id"=>"kosong","contract_number_file"=>"kosong","cc_name"=>"-kosong","site_name"=>"kosong","account_no"=>"kosong","total"=>"kosong");
 						$namacustomer = "";
 						$contractstatus = "";
 						$tahun = "";

 						$btnprint = ''; 

						$info = ''; 
					}

				//get data customer
				$sqlcust = "select * from pdct_customer_name where id = '$id_customer_name'";
	 			$exsqlcust =$db->Execute($sqlcust);
			 	$getcust = $exsqlcust->FetchRow();
			 	$namacustomer = $getcust['customer_name'];

				//get data contract status
				$sqlcont = "select * from pdct_contract_status where id = '$id_contract_status'";
	 			$exsqlcont =$db->Execute($sqlcont);
			 	$getcont = $exsqlcont->FetchRow();
			 	$contractstatus = $getcont['contract_status'];
		 

		}

		//echo $sql;
 		 

		$customer_name_opt = $this->customer_name_opt();
		$smarty->assign("customer_name_opt",$customer_name_opt);

		$contract_status = $this->contract_status();
		$smarty->assign("contract_status",$contract_status);
		$smarty->assign("btnprint",$btnprint);
		$smarty->assign("info",$info);


		$bill_period_opt = $this->bill_period_opt();
		$smarty->assign("bill_period_opt",$bill_period_opt);

		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		$smarty->assign("list",$list);
		$smarty->assign("namacustomer",$namacustomer);
		$smarty->assign("contractstatus",$contractstatus);
		$smarty->assign("caridata",$caridata);
		 
		$smarty->assign("id_contract_status",$id_contract_status);
		$smarty->assign("id_customer_name",$id_customer_name);
		$smarty->assign("bill_period",$bill_period);	
		$smarty->assign("sumtotal",number_format($sumtotal),0,".",".");
		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->display("resume_proforma_invoice.tpl");
		}
  
 
		//End Method PDCT Agging Project Status


		 
		
	}
?>