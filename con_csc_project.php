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


		//Start Method  PDCT CSC Project
 
		function View(){
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
		$caridata = isset($_REQUEST['caridata']) ? $_REQUEST['caridata'] : '';
		$start_date = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : '';
		$ending_date = isset($_REQUEST['ending_date']) ? $_REQUEST['ending_date'] : '';
		$start_date_send = '';
		$ending_date_send = '';
		$btnprint = '';
		$info = '';
		$sumpaidcscyes = 0;
		$sumpaidcscno = 0;
		$namacustomer = '';
		$list[] = array("id"=>'',
			 				 "customer_name"=>'',
			 				 "contract_date"=>'',
			 				 "contract_number_file"=>'',
			 				 "nama_pekerjaan"=>'',
			 				 "cc_name"=>'',"statuscscpaid"=>'',
			 				 "totalcsc"=>'');

		 

		//00
 		if(!empty($caridata) && empty($id_customer_name) && empty($start_date) && empty($ending_date)){

			$id_customer_name = ''; 
		 
			$start_date = '';
			$ending_date = '';
			$start_date_send = '';
			$ending_date_send = '';
			$btnprint = '';
			$info = '';
			$sumpaidcscyes = 0;
			$sumpaidcscno = 0;
			$namacustomer = '';
			 

		
		//x0
		}elseif(!empty($caridata) && !empty($id_customer_name) && empty($start_date) && empty($ending_date)) {
			$id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
			$caridata = isset($_REQUEST['caridata']) ? $_REQUEST['caridata'] : '';
			$start_date =  '';
 		 	$ending_date = '';
 		 	$start_date_send = '';
 			$ending_date_send =  '';
			$list = '';

		 

	        //newest
	        $sql = "select a.id,a.project_no,b.customer_name,a.cc_name,c.nama_pekerjaan,c.contract_number_file,c.id as idcont,d.paid_csc,sum(d.csc) as totalcsc from pdct_customer a
				LEFT JOIN pdct_customer_name b on b.id = a.id_customer_name
				LEFT JOIN pdct_contract c on c.id_customer = a.id
				LEFT JOIN pdct_billing d on d.id_contract = c.id
				where a.id_customer_name = '$id_customer_name' and d.csc != ''
				GROUP BY c.id,d.paid_csc";
	 
			$exsql = $db->Execute($sql);
			$avail = $exsql->RecordCount();
			if($avail < 1){
 					$list[] = array("id"=>'',
			 				 "customer_name"=>'',
			 				 "contract_date"=>'',
			 				 "contract_number_file"=>'',
			 				 "nama_pekerjaan"=>'',
			 				 "cc_name"=>'',"statuscscpaid"=>'',
			 				 "totalcsc"=>'');

 					$info = '<div class="alert alert-danger" align="center"> <b>Data Tidak Ditemukan ! </b> </div>';
 					$btnprint = '';


 			}else{
 				$info = '<div class="alert alert-info" align="center">  <b>Data Tersedia Sebanyak '.$avail.' Data </b> </div>';
				$btnprint = '<button type="submit" name="print" class="btn btn-primary">
 						<i class="glyphicon glyphicon-print"> </i> Print CSC Project </button>';


 				while ($row = $exsql->FetchRow()) {
			 		$list[] = array("id"=>$row['id'],
			 				  "customer_name"=>$row['customer_name'],
			 				  "contract_number_file"=>$row['contract_number_file'],
			 				  "nama_pekerjaan"=>$row['nama_pekerjaan'],
			 				  "cc_name"=>$row['cc_name'],"statuscscpaid"=>$row['paid_csc'],
			 				  "totalcsc"=>number_format($row['totalcsc'],0,".","."));
			  
			 		}

 			}

	 
				//get data customer
				$sqlcust = "select * from pdct_customer_name where id = '$id_customer_name'";
	 			$exsqlcust =$db->Execute($sqlcust);
			 	$getcust = $exsqlcust->FetchRow();
 		 		$namacustomer = $getcust['customer_name'];

			 


		//xx
		}elseif(!empty($caridata) && !empty($id_customer_name) && !empty($start_date) && !empty($ending_date)) {
			 
			$id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
			$caridata = isset($_REQUEST['caridata']) ? $_REQUEST['caridata'] : '';
			$start_date =  isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : '';
 		 	$ending_date = isset($_REQUEST['ending_date']) ? $_REQUEST['ending_date'] : '';
			 
 		 	$start_date_send = date('Y-m-d',strtotime($_POST['start_date']));
 			$ending_date_send =  date('Y-m-d',strtotime($_POST['ending_date']));
			$list = '';

			if($ending_date_send <= $start_date_send){
	 		 	 		
	 		echo "<script language=javascript>
	                    alert('Tanggal Akhir Tidak Boleh Lebih Kecil atau Sama Dengan Tanggal Mulai!');
	                     window.location='csc_project.php';
	                    </script>";
	        }

	        //newest
	        $sql = "select a.id,a.project_no,b.customer_name,a.cc_name,c.nama_pekerjaan,c.contract_number_file,c.id as idcont,d.paid_csc,sum(d.csc) as totalcsc from pdct_customer a
				LEFT JOIN pdct_customer_name b on b.id = a.id_customer_name
				LEFT JOIN pdct_contract c on c.id_customer = a.id
				LEFT JOIN pdct_billing d on d.id_contract = c.id
				where a.id_customer_name = '$id_customer_name' and 
				c.contract_date BETWEEN '$start_date_send' and '$ending_date_send' and d.csc != ''
				GROUP BY c.id,d.paid_csc";
	 
			$exsql = $db->Execute($sql);
			$avail = $exsql->RecordCount();
			if($avail < 1){
 					$list[] = array("id"=>'',
			 				 "customer_name"=>'',
			 				 "contract_date"=>'',
			 				 "contract_number_file"=>'',
			 				 "nama_pekerjaan"=>'',
			 				 "cc_name"=>'',"statuscscpaid"=>'',
			 				 "totalcsc"=>'');

 					$info = '<div class="alert alert-danger" align="center"> <b>Data Tidak Ditemukan ! </b> </div>';
 					$btnprint = '';


 			}else{
 				$info = '<div class="alert alert-info" align="center">  <b>Data Tersedia Sebanyak '.$avail.' Data </b> </div>';
				$btnprint = '<button type="submit" name="print" class="btn btn-primary">
 						<i class="glyphicon glyphicon-print"> </i> Print CSC Project </button>';


 				while ($row = $exsql->FetchRow()) {
			 		$list[] = array("id"=>$row['id'],
			 				  "customer_name"=>$row['customer_name'],
			 				  
			 				  "contract_number_file"=>$row['contract_number_file'],
			 				  "nama_pekerjaan"=>$row['nama_pekerjaan'],
			 				  "cc_name"=>$row['cc_name'],"statuscscpaid"=>$row['paid_csc'],
			 				  "totalcsc"=>number_format($row['totalcsc'],0,".","."));
			  
			 		}

 			}

	 
				//get data customer
				$sqlcust = "select * from pdct_customer_name where id = '$id_customer_name'";
	 			$exsqlcust =$db->Execute($sqlcust);
			 	$getcust = $exsqlcust->FetchRow();
 		 		$namacustomer = $getcust['customer_name'];

			 

 		 
		//0x
		}elseif (!empty($caridata) && empty($id_customer_name) && !empty($start_date) && !empty($ending_date)) {

			$id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
			$caridata = isset($_REQUEST['caridata']) ? $_REQUEST['caridata'] : '';
			$start_date =  isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : '';
 		 	$ending_date = isset($_REQUEST['ending_date']) ? $_REQUEST['ending_date'] : '';
			 
 		 	$start_date_send = date('Y-m-d',strtotime($_POST['start_date']));
 			$ending_date_send =  date('Y-m-d',strtotime($_POST['ending_date']));
			$list = '';

			if($ending_date_send <= $start_date_send){
	 		 	 		
	 		echo "<script language=javascript>
	                    alert('Tanggal Akhir Tidak Boleh Lebih Kecil atau Sama Dengan Tanggal Mulai!');
	                     window.location='csc_project.php';
	                    </script>";
	        }

	        //newest
	        $sql = "select a.id,a.project_no,b.customer_name,a.cc_name,c.nama_pekerjaan,c.contract_number_file,c.id as idcont,d.paid_csc,sum(d.csc) as totalcsc from pdct_customer a
				LEFT JOIN pdct_customer_name b on b.id = a.id_customer_name
				LEFT JOIN pdct_contract c on c.id_customer = a.id
				LEFT JOIN pdct_billing d on d.id_contract = c.id
				where c.contract_date BETWEEN '$start_date_send' and '$ending_date_send' and d.csc != '' 
				GROUP BY c.id,d.paid_csc";
	 
			$exsql = $db->Execute($sql);
			$avail = $exsql->RecordCount();
			if($avail < 1){
 					$list[] = array("id"=>'',
			 				 "customer_name"=>'',
			 				 "contract_date"=>'',
			 				 "contract_number_file"=>'',
			 				 "nama_pekerjaan"=>'',
			 				 "cc_name"=>'',"statuscscpaid"=>'',
			 				 "totalcsc"=>'');

 					$info = '<div class="alert alert-danger" align="center"> <b>Data Tidak Ditemukan ! </b> </div>';
 					$btnprint = '';


 			}else{
 				$info = '<div class="alert alert-info" align="center">  <b>Data Tersedia Sebanyak '.$avail.' Data </b> </div>';
				$btnprint = '<button type="submit" name="print" class="btn btn-primary">
 						<i class="glyphicon glyphicon-print"> </i> Print CSC Project </button>';


 				while ($row = $exsql->FetchRow()) {
			 		$list[] = array("id"=>$row['id'],
			 				  "customer_name"=>$row['customer_name'],
			 				  "contract_number_file"=>$row['contract_number_file'],
			 				  "nama_pekerjaan"=>$row['nama_pekerjaan'],
			 				  "cc_name"=>$row['cc_name'],"statuscscpaid"=>$row['paid_csc'],
			 				  "totalcsc"=>number_format($row['totalcsc'],0,".","."));
			  
			 		}

 			}

	 
				//get data customer
				 
 		 		$namacustomer = '';

			 


 
		}

		//parsing data

		$customer_name_opt = $this->customer_name_opt();
		$smarty->assign("customer_name_opt",$customer_name_opt);

	 
		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		$smarty->assign("list",$list);
	 
 
		$smarty->assign("caridata",$caridata);
		$smarty->assign("info",$info);
		//$smarty->assign("tes",$tes);
		$smarty->assign("btnprint",$btnprint);
		$smarty->assign("id_customer_name",$id_customer_name);
		$smarty->assign("namacustomer",$namacustomer);
		 
		$smarty->assign("start_date",tgl_indo($start_date));
		$smarty->assign("ending_date",tgl_indo($ending_date));
		$smarty->assign("start_date_send",$start_date_send);
		$smarty->assign("ending_date_send",$ending_date_send);
		$smarty->assign("start_date_show",tgl_indo($start_date_send));
		$smarty->assign("ending_date_show",tgl_indo($ending_date_send));
 
		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->display("csc_project.tpl");
		
		 
	 
 

 		 


		}
  
 
		//End Method PDCT CSC Project


		 
		
	}
?>