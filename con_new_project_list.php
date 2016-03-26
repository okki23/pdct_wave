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


	 
 
		//Start Method PDCT New Project List
 
		function View(){
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

 		$caridata = isset($_REQUEST['caridata']) ? $_REQUEST['caridata'] : '';
 		$id_customer_name = isset($_POST['id_customer_name']) ? $_REQUEST['id_customer_name'] :'';
 		$start_date = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : '';
 		$ending_date = isset($_REQUEST['ending_date']) ? $_REQUEST['ending_date'] : '';
 		$start_date_send = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : '';
 		$ending_date_send = isset($_REQUEST['ending_date']) ? $_REQUEST['ending_date'] : '';
		$btnprint = '';
		$info = '';
		$sumtotal = 0;
		$namacustomer = "";
		$list = '';
 		 
 		if(empty($caridata)){
			$sql = ""; 		
		 	$sumtotal = 0;
 			$list[] = array("id"=>"","customer_name"=>"","contract_number"=>"","nama_pekerjaan"=>"","cc_name"=>"","total"=>"");
 			$namacustomer = "";
 			$btnprint = '';
 			$info = '';
 		 
		}else{
			$btnprint = '<button type="submit" name="print" class="btn btn-primary">
 						<i class="glyphicon glyphicon-print"> </i> Print New Project List </button>';
 			$id_customer_name = isset($_POST['id_customer_name']) ? $_REQUEST['id_customer_name'] :'';
 			$start_date = date('Y-m-d',strtotime($_POST['start_date']));
 		 	$ending_date = date('Y-m-d',strtotime($_POST['ending_date']));
 			$start_date_send = date('Y-m-d',strtotime($_POST['start_date']));
 			$ending_date_send = date('Y-m-d',strtotime($_POST['ending_date']));
 			
 			if($ending_date <= $start_date){
	 		 	 		
	 		echo "<script language=javascript>
	                    alert('Tanggal Akhir Tidak Boleh Lebih Kecil atau Sama Dengan Tanggal Mulai!');
	                     window.location='new_project_list.php';
	                    </script>";
	                     

			} 

 			 $sql = "select a.*,b.cc_name,sum(c.bill_amount) as totalku  from pdct_contract a
					 left join pdct_customer b on b.id = a.id_customer 
					 left join pdct_billing c on c.id_contract = a.id 
					 where DATE_FORMAT(a.no_spk_p8_date_upload,'%Y-%m-%d') BETWEEN '$start_date' and 
					 '$ending_date' GROUP BY a.id";
 			
 			$exsql = $db->Execute($sql);
 			$cekavail = $exsql->RecordCount();

	 			if($cekavail > 0){
	 				 
	 				$sumtotal = 0;
 					while($row = $exsql->FetchRow()){
 					$sumtotal += $row['totalku'];
 					$list[] = array("id"=>$row['id'],"contract_number"=>$row['contract_number_file'],"nama_pekerjaan"=>$row['nama_pekerjaan'],"cc_name"=>$row['cc_name'],"total"=>number_format($row['totalku'],0,".","."));
 					$info = '<div class="alert alert-info" align="center">  <b>Data Tersedia Sebanyak '.$cekavail.' Data </b> </div>';
 		
 			  	   }
 
	 			}else{
	 				$btnprint ='';
	 				$sumtotal = "0";
	 				$start_date = date('Y-m-d',strtotime($_POST['start_date']));
 		 			$ending_date = date('Y-m-d',strtotime($_POST['ending_date']));
	 				$start_date_send = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : '';
 					$ending_date_send = isset($_REQUEST['ending_date']) ? $_REQUEST['ending_date'] : '';
 					$info = '<div class="alert alert-danger" align="center"> <b>Data Tidak Ditemukan ! </b> </div>';
	 				$list[] = array("id"=>"","customer_name"=>"","contract_number"=>"","nama_pekerjaan"=>"","cc_name"=>"","total"=>"");
	 			}
		}


		 
 		 
 	 
 
		$customer_name_opt = $this->customer_name_opt();
		$smarty->assign("btnprint",$btnprint);
		$smarty->assign("info",$info);
		$smarty->assign("customer_name_opt",$customer_name_opt);
		$smarty->assign("sumtotal",number_format($sumtotal),0,".",".");
		$smarty->assign("footer",$footer);
		$smarty->assign("namacustomer",$namacustomer);
		$smarty->assign("caridata",$caridata);
		$smarty->assign("id_customer_name",$id_customer_name);
		$smarty->assign("start_date_send",$start_date_send);
		$smarty->assign("ending_date_send",$ending_date_send);
		$smarty->assign("title",$title);
		$smarty->assign("start_date",tgl_indo($start_date));	
		$smarty->assign("ending_date",tgl_indo($ending_date));	
		$smarty->assign("list",$list);		 
		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->display("new_project_list.tpl");
		}

		 
 
		//End Method PDCT New Project List


		 
		
	}
?>