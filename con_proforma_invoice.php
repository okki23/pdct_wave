<?php
require ('libs/Smarty.class.php');
require ('config.php');
require ('fn_protect.php');
require ('user_cek.php');


class Main {
 		
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

		function cc_name_opt($selected = ''){
		global $db;
		$data = "select * from pdct_customer GROUP BY cc_name";
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
			
			$cc_name_opt[] = array('id'=>$row['id'],
				'selected'=>$selected_opt,
				'cc_name'=>$row['cc_name']);
			}
			
		}
		return $cc_name_opt;
		}

		function account_manager_opt($selected = ''){
		global $db;
		$data = "select * from pdct_contract GROUP BY account_manager";
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
			
			$account_manager_opt[] = array('id'=>$row['id'],
				'selected'=>$selected_opt,
				'account_manager'=>$row['account_manager']);
			}
			
		}
		return $account_manager_opt;
		}

		function project_no_opt($selected = ''){
		global $db;
		$data = "select * from pdct_customer GROUP BY project_no";
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
			
			$project_no_opt[] = array('id'=>$row['id'],
				'selected'=>$selected_opt,
				'project_no'=>$row['project_no']);
			}
			
		}
		return $project_no_opt;
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


		//Start Method PDCT Proforma Invoice
 
		function View(){
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
		$smarty = new Smarty;

 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$caridata = isset($_REQUEST['caridata']) ? $_REQUEST['caridata'] : '';
		$id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
		$cc_name = isset($_REQUEST['cc_name']) ? $_REQUEST['cc_name'] : '';
		$account_manager = isset($_REQUEST['account_manager']) ? $_REQUEST['account_manager'] : '';
		$project_no = isset($_REQUEST['project_no']) ? $_REQUEST['project_no'] : '';
		$periode_until = isset($_REQUEST['periode_until']) ? $_REQUEST['periode_until'] : '';
		$btnprint = '';
 		$info = '';
 
		if(empty($caridata)){
			$sql = ""; 		
		 	$sumtotal = 0;
 			$list[] = array("id"=>"-","contract_number_file"=>"-","site_name"=>"-","account_no"=>"-","periode"=>"-","bill_amount"=>"-","charges"=>"-");
 			$namacustomer = "";
 			$cc_name = "";
 			$account_manager = "";
 			$project_no = "";
 			$periode_until = "";
 			$phonemail = "";
			$btnprint = '';
 			$info = '';	

 			 
		//00000	 
 		}elseif(!empty($caridata) && empty($id_customer_name) && empty($account_manager) && empty($periode_until) && empty($cc_name) && empty($project_no)){

 			$sql = ""; 		
		 	$sumtotal = 0;
 			$list[] = array("id"=>"-","contract_number_file"=>"-","site_name"=>"-","account_no"=>"-","periode"=>"-","bill_amount"=>"-","charges"=>"-");
 			$namacustomer = "";
 			$cc_name = "";
 			$account_manager = "";
 			$project_no = "";
 			$periode_until = "";
 			$phonemail = "";
			$btnprint = '';
 			$info = '';	
 		
		}elseif(!empty($caridata) && !empty($id_customer_name) && !empty($account_manager) && !empty($periode_until) && !empty($cc_name) && !empty($project_no)){

			$id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
			$cc_name = isset($_REQUEST['cc_name']) ? $_REQUEST['cc_name'] : '';
			$account_manager = isset($_REQUEST['account_manager']) ? $_REQUEST['account_manager'] : '';
			$project_no = isset($_REQUEST['project_no']) ? $_REQUEST['project_no'] : '';
			$periode_until = isset($_REQUEST['periode_until']) ? $_REQUEST['periode_until'] : '';

			$sql = "select a.id,b.customer_name,a.project_no,a.site_name,c.account_manager,a.cc_name,
					c.phone,c.email,c.site_code,c.contract_number_file,c.account_no,d.bill_periode,
					d.bill_amount,e.charges from pdct_customer a
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
			//$datainti = $exsql->FetchRow();
			$availability = $exsql->RecordCount();
			

					if($availability > 0){
						$sumtotal = 0;
						while ($row = $exsql->FetchRow()) {

							$list[] = array("id"=>$row['id'],"contract_number_file"=>$row['contract_number_file'],"site_name"=>$row['site_name'],"account_no"=>$row['account_no'],"periode"=>$row['bill_periode'],"bill_amount"=>number_format($row['bill_amount'],0,".","."),"charges"=>$row['charges']);

 
						 
						$sumtotal += $row['bill_amount'];
						}

						$btnprint = '<button type="submit" name="print" class="btn btn-primary">
 						<i class="glyphicon glyphicon-print"> </i> Print Proforma Invoice </button>'; 

						$info = '<div class="alert alert-info" align="center">  <b>Data Tersedia Sebanyak '.$availability.' Data </b> </div>'; 
 

					

					}else{

						$sql = ""; 	
						$btnprint = '';
 						$info = '<div class="alert alert-danger" align="center"> <b>Data Tidak Ditemukan ! </b> </div>';	
		 				$sumtotal = 0;
 						$list[] = array("id"=>"kosong","contract_number_file"=>"kosong","site_name"=>"kosong","account_no"=>"kosong","periode"=>"kosong","bill_amount"=>"kosong","charges"=>"kosong");
 						 
					}
		 
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

		 

		}

 		//echo $sql;

		$customer_name_opt = $this->customer_name_opt();
		$smarty->assign("customer_name_opt",$customer_name_opt);

		$contract_status = $this->contract_status();
		$smarty->assign("contract_status",$contract_status);

		$cc_name_opt = $this->cc_name_opt();
		$smarty->assign("cc_name_opt",$cc_name_opt);

		$account_manager_opt = $this->account_manager_opt();
		$smarty->assign("account_manager_opt",$account_manager_opt);

		$project_no_opt = $this->project_no_opt();
		$smarty->assign("project_no_opt",$project_no_opt);

		$bill_period_opt = $this->bill_period_opt();
		$smarty->assign("bill_period_opt",$bill_period_opt);

		$smarty->assign("footer",$footer);
		$smarty->assign("btnprint",$btnprint);
		$smarty->assign("info",$info);
		$smarty->assign("title",$title);
		$smarty->assign("list",$list);
		$smarty->assign("namacustomer",$namacustomer);
		$smarty->assign("cc_name",$cc_name);
		$smarty->assign("id_customer_name",$id_customer_name);
		$smarty->assign("phonemail",$phonemail);
		$smarty->assign("periode_until",$periode_until);
		$smarty->assign("project_no",$project_no);
		$smarty->assign("account_manager",$account_manager);
		//$smarty->assign("contractstatus",$contractstatus);
		$smarty->assign("caridata",$caridata);
		//$smarty->assign("tahun",$tahun);	
		$smarty->assign("sumtotal",number_format($sumtotal),0,".",".");
		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->display("proforma_invoice.tpl");
		}
  	

  		function PrintProformaInvoice(){
  			
  		}
 
		//End Method PDCT Proforma Invoice


		 
		
	}
?>