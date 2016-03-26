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


		//Start Method PDCT Project Status List
 
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
		$start_date = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : '';
		$ending_date = isset($_REQUEST['ending_date']) ? $_REQUEST['ending_date'] : '';
		$sql = ""; 		
		$sumtotal = 0;
		$list[] = array("id"=>"","contract_number_file"=>"","nama_pekerjaan"=>"",
 						"customer_name"=>"","total"=>"");
 	 
		$btnprint = '';
 		$info = '';
 		$start_date_send = '';
 		$ending_date_send = '';
 		 

 		if(empty($caridata)){
 		$caridata = isset($_REQUEST['caridata']) ? $_REQUEST['caridata'] : '';
 		$btnprint = '';
 		$info = '';
 		$start_date = '';
		$ending_date = '';
		$sql = ""; 		
		$sumtotal = 0;
	 
 		$start_date_send = '';
 		$ending_date_send = '';
 		}else{

 		//xx	 
		 
		$id_contract_status = isset($_REQUEST['id_contract_status']) ? $_REQUEST['id_contract_status'] : '';
		$sumtotal = 0;
		$list = '';
 	   		 
 		$start_date = date('Y-m-d',strtotime($_POST['start_date']));
	 	$ending_date = date('Y-m-d',strtotime($_POST['ending_date']));
	 	$start_date_send = date('Y-m-d',strtotime($_POST['start_date']));
 		$ending_date_send = date('Y-m-d',strtotime($_POST['ending_date']));

 		if($ending_date <= $start_date){
	 		 	 		
	 			echo "<script language=javascript>
	                    alert('Tanggal Akhir Tidak Boleh Lebih Kecil atau Sama Dengan Tanggal Mulai!');
	                     window.location='project_status_list.php';
	                    </script>";
	    }


			$sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,
						 a.site_name, b.site_code,b.contract_number_file,
						 b.nama_pekerjaan,b.contract_status_opt, b.contract_date,c.charges,
						 c.bill_periode,c.bill_amount,d.customer_name, sum(c.bill_amount) as totalku 
						 from pdct_customer a
						left join pdct_contract b on b.id_customer = a.id
						left join pdct_billing c on c.id_contract = b.id
						left join pdct_customer_name d on d.id = a.id_customer_name
						where b.contract_date BETWEEN '$start_date' and '$ending_date'
						 GROUP BY b.contract_number_file";
			
			
			$exsql = $db->Execute($sql);
			$availability = $exsql->RecordCount();

					if($availability > 0){
						$sumtotal = 0;
						while ($row = $exsql->FetchRow()) {
							$list[] = array("id"=>"-","contract_number_file"=>$row['contract_number_file'],"nama_pekerjaan"=>$row['nama_pekerjaan'],"customer_name"=>$row['customer_name'],"total"=>number_format($row['totalku']),0,".",".");
					 
						$sumtotal += $row['totalku'];
						}
						$btnprint = '<button type="submit" name="print" class="btn btn-primary">
 						<i class="glyphicon glyphicon-print"> </i> Print Project Status List </button>'; 

						$info = '<div class="alert alert-info" align="center">  <b>Data Tersedia Sebanyak '.$availability.' Data </b> </div>'; 
 
						

					}else{

						$sql = ""; 		
		 				$sumtotal = 0;
		 				$list[] = array("id"=>"","contract_number_file"=>"","nama_pekerjaan"=>"",
 						"customer_name"=>"","total"=>"");
 						 
 						$tahun = "";
 						$btnprint = '';
 						$info = '<div class="alert alert-danger" align="center"> <b>Data Tidak Ditemukan ! </b> </div>';
					}
					 


 		}
 
	 

		$contract_status = $this->contract_status();
		$smarty->assign("contract_status",$contract_status);

		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		$smarty->assign("list",$list);
		$smarty->assign("info",$info);
		$smarty->assign("btnprint",$btnprint);
		$smarty->assign("id_contract_status",$id_contract_status);
	 
		 
		$smarty->assign("caridata",$caridata);
	 	
		$smarty->assign("starting",tgl_indo($start_date));	
		$smarty->assign("ending",tgl_indo($ending_date));	
		$smarty->assign("start_date_send",$start_date_send);	
		$smarty->assign("ending_date_send",$ending_date_send);	
		$smarty->assign("sumtotal",number_format($sumtotal),0,".",".");
		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->display("project_status_list.tpl");
		}
  
 
		//End Method PDCT Project Status List


		 
		
	}
?>