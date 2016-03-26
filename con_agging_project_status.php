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


		//Start Method PDCT Agging Project Status
 
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
		$tahun = isset($_REQUEST['tahun']) ? $_REQUEST['tahun'] : '';
		$btnprint = '';
		$info = '';
		$sumtotal = 0;
 		$list[] = array("id"=>"","billing_periode"=>"","total"=>"");
 		$namacustomer = "";
 		$contractstatus = "";
 		$stat = "";

	 	//empty
	 	/*
		if(empty($caridata)){
			$sql = ""; 		
		 	$sumtotal = 0;
 			$list[] = array("id"=>"-1","billing_periode"=>"-1","total"=>"-1");
 			$namacustomer = "";
 			$contractstatus = "";
 			$tahun = "";
 			$btnprint = '';
 			$info = '';
 			$stat = "zzz";

 		}
 		*/

 		//x00
 		if(!empty($caridata) && !empty($id_contract_status) && empty($id_customer_name) && empty($tahun)){
 		
 		
 		$id_contract_status = isset($_REQUEST['id_contract_status']) ? $_REQUEST['id_contract_status'] : '';
 		$list = '';
		$id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
		$tahun = isset($_REQUEST['tahun']) ? $_REQUEST['tahun'] : '';
	
 		 
 		//$stat = "x00";

 		 
 		$sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
 				b.site_code,b.contract_number_file,	b.nama_pekerjaan,b.contract_status_opt,
 				c.charges,c.bill_periode,c.bill_amount,	d.customer_name,
 				sum(c.bill_amount) as totalku from pdct_customer a
				left join pdct_contract b on b.id_customer = a.id 
				left join pdct_billing c on c.id_contract = b.id
				left join pdct_customer_name d on d.id = a.id_customer_name  
				where  b.contract_status_opt = '$id_contract_status' GROUP BY a.id";

			$exsql = $db->Execute($sql);
			$cekavail = $exsql->RecordCount();

				//kalo datanya ada
				if($cekavail > 0){

					//kalo ada di loooping
					$sumtotal = 0;
					while($row = $exsql->FetchRow()){
					$list[] = array("id"=>$row['id'],"billing_periode"=>$row['bill_periode'],"total"=>number_format($row['totalku'],0,".","."));	
					$sumtotal += $row['totalku'];
					}
					$btnprint = '<button type="submit" name="print" class="btn btn-primary">
 						<i class="glyphicon glyphicon-print"> </i> Print Agging Project Status </button>'; 
					$info = '<div class="alert alert-info" align="center">  <b>Data Tersedia Sebanyak '.$cekavail.' Data </b> </div>';

				}else{
					//buat loopingan kosong
					$list[] = array("id"=>"","billing_periode"=>"","total"=>"");
					$info = '<div class="alert alert-danger" align="center"> <b>Data Tidak Ditemukan ! </b> </div>';
					$sumtotal = 0;
					$btnprint = '';
				}
				

			//ambil nama customer : 
		 			$sqlcust = "select * from pdct_customer_name where id = '$id_customer_name'";
		 			$exsqlcust =$db->Execute($sqlcust);
		 			$getcust = $exsqlcust->FetchRow();
		 			$namacustomer = $getcust['customer_name'];	

		 	//ambil nama contract status : 
		 			$sqlcont = "select * from pdct_contract_status where id = '$id_contract_status'";
		 			$exsqlcont =$db->Execute($sqlcont);
		 			$getcont = $exsqlcont->FetchRow();
		 			$contractstatus = $getcont['contract_status'];		





 		//xx0
 		}else if(!empty($caridata) && !empty($id_customer_name) && !empty($id_contract_status) && empty($tahun)){
 		$id_contract_status = isset($_REQUEST['id_contract_status']) ? $_REQUEST['id_contract_status'] : '';
 		$list = '';
		$id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
		$tahun = isset($_REQUEST['tahun']) ? $_REQUEST['tahun'] : '';
		 
 		 
 		//$stat = "xx0";

 		 
 		$sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
 				b.site_code,b.contract_number_file,	b.nama_pekerjaan,b.contract_status_opt,
 				c.charges,c.bill_periode,c.bill_amount,	d.customer_name,
 				sum(c.bill_amount) as totalku from pdct_customer a
				left join pdct_contract b on b.id_customer = a.id 
				left join pdct_billing c on c.id_contract = b.id
				left join pdct_customer_name d on d.id = a.id_customer_name  
				where a.id_customer_name = '$id_customer_name'
				and b.contract_status_opt = '$id_contract_status' GROUP BY a.id";

			$exsql = $db->Execute($sql);
			$cekavail = $exsql->RecordCount();

				//kalo datanya ada
				if($cekavail > 0){

					//kalo ada di loooping
					$sumtotal = 0;
					while($row = $exsql->FetchRow()){
					$list[] = array("id"=>$row['id'],"billing_periode"=>$row['bill_periode'],"total"=>number_format($row['totalku'],0,".","."));	
					$sumtotal += $row['totalku'];
					}
					$btnprint = '<button type="submit" name="print" class="btn btn-primary">
 						<i class="glyphicon glyphicon-print"> </i> Print Agging Project Status </button>'; 
					$info = '<div class="alert alert-info" align="center">  <b>Data Tersedia Sebanyak '.$cekavail.' Data </b> </div>';

				}else{
					//buat loopingan kosong
					$list[] = array("id"=>"","billing_periode"=>"","total"=>"");
					$info = '<div class="alert alert-danger" align="center"> <b>Data Tidak Ditemukan ! </b> </div>';
					$sumtotal = 0;
					$btnprint = '';
				}
				

			//ambil nama customer : 
		 			$sqlcust = "select * from pdct_customer_name where id = '$id_customer_name'";
		 			$exsqlcust =$db->Execute($sqlcust);
		 			$getcust = $exsqlcust->FetchRow();
		 			$namacustomer = $getcust['customer_name'];	

		 	//ambil nama contract status : 
		 			$sqlcont = "select * from pdct_contract_status where id = '$id_contract_status'";
		 			$exsqlcont =$db->Execute($sqlcont);
		 			$getcont = $exsqlcont->FetchRow();
		 			$contractstatus = $getcont['contract_status'];		

 		//xxx
 		}else if(!empty($caridata) && !empty($id_customer_name) && !empty($id_contract_status) && !empty($tahun)){
 	
 		$id_contract_status = isset($_REQUEST['id_contract_status']) ? $_REQUEST['id_contract_status'] : '';
 		$list = '';
		$id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
		$tahun = isset($_REQUEST['tahun']) ? $_REQUEST['tahun'] : '';
	  
 		 
 		//$stat = "xxx";

 		 
 		 $sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
 				b.site_code,b.contract_number_file,	b.nama_pekerjaan,b.contract_status_opt,
 				c.charges,c.bill_periode,c.bill_amount,	d.customer_name,
 				sum(c.bill_amount) as totalku from pdct_customer a
				left join pdct_contract b on b.id_customer = a.id 
				left join pdct_billing c on c.id_contract = b.id
				left join pdct_customer_name d on d.id = a.id_customer_name  
				where a.id_customer_name = '$id_customer_name'
				and b.contract_status_opt = '$id_contract_status' and 
				c.bill_periode LIKE '%$tahun%' GROUP BY a.id";

			$exsql = $db->Execute($sql);
			$cekavail = $exsql->RecordCount();

				//kalo datanya ada
				if($cekavail > 0){

					//kalo ada di loooping
					$sumtotal = 0;
					while($row = $exsql->FetchRow()){
					$list[] = array("id"=>$row['id'],"billing_periode"=>$row['bill_periode'],"total"=>number_format($row['totalku'],0,".","."));	
					$sumtotal += $row['totalku'];
					}
					$btnprint = '<button type="submit" name="print" class="btn btn-primary">
 						<i class="glyphicon glyphicon-print"> </i> Print Agging Project Status </button>'; 
 					$info = '<div class="alert alert-info" align="center">  <b>Data Tersedia Sebanyak '.$cekavail.' Data </b> </div>';

				}else{
					//buat loopingan kosong
					$list[] = array("id"=>"","billing_periode"=>"","total"=>"");
					$info = '<div class="alert alert-danger" align="center"> <b>Data Tidak Ditemukan ! </b> </div>';
					$sumtotal = 0;
					$btnprint = '';
				}
				

			//ambil nama customer : 
		 			$sqlcust = "select * from pdct_customer_name where id = '$id_customer_name'";
		 			$exsqlcust =$db->Execute($sqlcust);
		 			$getcust = $exsqlcust->FetchRow();
		 			$namacustomer = $getcust['customer_name'];	

		 	//ambil nama contract status : 
		 			$sqlcont = "select * from pdct_contract_status where id = '$id_contract_status'";
		 			$exsqlcont =$db->Execute($sqlcont);
		 			$getcont = $exsqlcont->FetchRow();
		 			$contractstatus = $getcont['contract_status'];		

		//0x0
 		}else if(!empty($caridata) && empty($id_contract_status) && !empty($id_customer_name) && empty($tahun)){
 		$id_contract_status = isset($_REQUEST['id_contract_status']) ? $_REQUEST['id_contract_status'] : '';
 		$list = '';
		$id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
		$tahun = isset($_REQUEST['tahun']) ? $_REQUEST['tahun'] : '';
		 
 		//$stat = "0x0";

 		 
 		$sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
 				b.site_code,b.contract_number_file,	b.nama_pekerjaan,b.contract_status_opt,
 				c.charges,c.bill_periode,c.bill_amount,	d.customer_name,
 				sum(c.bill_amount) as totalku from pdct_customer a
				left join pdct_contract b on b.id_customer = a.id 
				left join pdct_billing c on c.id_contract = b.id
				left join pdct_customer_name d on d.id = a.id_customer_name  
				where a.id_customer_name = '$id_customer_name'   GROUP BY a.id";

			$exsql = $db->Execute($sql);
			$cekavail = $exsql->RecordCount();

				//kalo datanya ada
				if($cekavail > 0){

					//kalo ada di loooping
					$sumtotal = 0;
					while($row = $exsql->FetchRow()){
					$list[] = array("id"=>$row['id'],"billing_periode"=>$row['bill_periode'],"total"=>number_format($row['totalku'],0,".","."));	
					$sumtotal += $row['totalku'];
					}
					$btnprint = '<button type="submit" name="print" class="btn btn-primary">
 						<i class="glyphicon glyphicon-print"> </i> Print Agging Project Status </button>'; 
					$info = '<div class="alert alert-info" align="center">  <b>Data Tersedia Sebanyak '.$cekavail.' Data </b> </div>';

				}else{
					//buat loopingan kosong
					$list[] = array("id"=>"","billing_periode"=>"","total"=>"");
					$info = '<div class="alert alert-danger" align="center"> <b>Data Tidak Ditemukan ! </b> </div>';
					$sumtotal = 0;
					$btnprint = '';
				}
				

			//ambil nama customer : 
		 			$sqlcust = "select * from pdct_customer_name where id = '$id_customer_name'";
		 			$exsqlcust =$db->Execute($sqlcust);
		 			$getcust = $exsqlcust->FetchRow();
		 			$namacustomer = $getcust['customer_name'];	

		 	//ambil nama contract status : 
		 			$contractstatus = '';	

		 	 

 		//00x
 		}else if(!empty($caridata) && empty($id_contract_status) && empty($id_customer_name) && !empty($tahun)){

 		$id_contract_status = isset($_REQUEST['id_contract_status']) ? $_REQUEST['id_contract_status'] : '';
 		$list = '';
		$id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
		$tahun = isset($_REQUEST['tahun']) ? $_REQUEST['tahun'] : '';
  		//$stat = "00x";

 		 
 		$sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
 				b.site_code,b.contract_number_file,	b.nama_pekerjaan,b.contract_status_opt,
 				c.charges,c.bill_periode,c.bill_amount,	d.customer_name,
 				sum(c.bill_amount) as totalku from pdct_customer a
				left join pdct_contract b on b.id_customer = a.id 
				left join pdct_billing c on c.id_contract = b.id
				left join pdct_customer_name d on d.id = a.id_customer_name  
				where c.bill_periode LIKE '%$tahun%' GROUP BY a.id";

			$exsql = $db->Execute($sql);
			$cekavail = $exsql->RecordCount();

				//kalo datanya ada
				if($cekavail > 0){

					//kalo ada di loooping
					$sumtotal = 0;
					while($row = $exsql->FetchRow()){
					$list[] = array("id"=>$row['id'],"billing_periode"=>$row['bill_periode'],"total"=>number_format($row['totalku'],0,".","."));	
					$sumtotal += $row['totalku'];
					}
					$btnprint = '<button type="submit" name="print" class="btn btn-primary">
 						<i class="glyphicon glyphicon-print"> </i> Print Agging Project Status </button>'; 
					$info = '<div class="alert alert-info" align="center">  <b>Data Tersedia Sebanyak '.$cekavail.' Data </b> </div>';

				}else{
					//buat loopingan kosong
					$list[] = array("id"=>"","billing_periode"=>"","total"=>"");
					$info = '<div class="alert alert-danger" align="center"> <b>Data Tidak Ditemukan ! </b> </div>';
					$sumtotal = 0;
					$btnprint = '';
				}
				

			//ambil nama customer : 
		 			 
		 			$namacustomer = '';	

		 	//ambil nama contract status : 
		 			$sqlcont = "select * from pdct_contract_status where id = '$id_contract_status'";
		 			$exsqlcont =$db->Execute($sqlcont);
		 			$getcont = $exsqlcont->FetchRow();
		 			$contractstatus = '';	

		
		//x0x
 		}elseif (!empty($caridata) && !empty($id_contract_status) && empty($id_customer_name) && !empty($tahun)) {

		$id_contract_status = isset($_REQUEST['id_contract_status']) ? $_REQUEST['id_contract_status'] : '';
 		$list = '';
		$id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
		$tahun = isset($_REQUEST['tahun']) ? $_REQUEST['tahun'] : '';
	 
 		 
 		//$stat = "x0x";

 		 
 		$sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
 				b.site_code,b.contract_number_file,	b.nama_pekerjaan,b.contract_status_opt,
 				c.charges,c.bill_periode,c.bill_amount,	d.customer_name,
 				sum(c.bill_amount) as totalku from pdct_customer a
				left join pdct_contract b on b.id_customer = a.id 
				left join pdct_billing c on c.id_contract = b.id
				left join pdct_customer_name d on d.id = a.id_customer_name  
				where  b.contract_status_opt = '$id_contract_status' and 
				c.bill_periode LIKE '%$tahun%' GROUP BY a.id";

			$exsql = $db->Execute($sql);
			$cekavail = $exsql->RecordCount();

				//kalo datanya ada
				if($cekavail > 0){

					//kalo ada di loooping
					$sumtotal = 0;
					while($row = $exsql->FetchRow()){
					$list[] = array("id"=>$row['id'],"billing_periode"=>$row['bill_periode'],"total"=>number_format($row['totalku'],0,".","."));	
					$sumtotal += $row['totalku'];
					}
					$btnprint = '<button type="submit" name="print" class="btn btn-primary">
 						<i class="glyphicon glyphicon-print"> </i> Print Agging Project Status </button>'; 
					$info = '<div class="alert alert-info" align="center">  <b>Data Tersedia Sebanyak '.$cekavail.' Data </b> </div>';

				}else{
					//buat loopingan kosong
					$list[] = array("id"=>"","billing_periode"=>"","total"=>"");
					$info = '<div class="alert alert-danger" align="center"> <b>Data Tidak Ditemukan ! </b> </div>';
					$sumtotal = 0;
					$btnprint = '';
				}
				

			//ambil nama customer : 
		 		 
		 			$namacustomer = '';	

		 	//ambil nama contract status : 
		 			$sqlcont = "select * from pdct_contract_status where id = '$id_contract_status'";
		 			$exsqlcont =$db->Execute($sqlcont);
		 			$getcont = $exsqlcont->FetchRow();
		 			$contractstatus = $getcont['contract_status'];

 		
 		//0xx
 		}elseif (!empty($caridata) && empty($id_contract_status) && !empty($id_customer_name) && !empty($tahun)) {
 		$id_contract_status = isset($_REQUEST['id_contract_status']) ? $_REQUEST['id_contract_status'] : '';
 		$list = '';
		$id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
		$tahun = isset($_REQUEST['tahun']) ? $_REQUEST['tahun'] : '';
		 
 		//$stat = "0xx";

 		 
 		$sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
 				b.site_code,b.contract_number_file,	b.nama_pekerjaan,b.contract_status_opt,
 				c.charges,c.bill_periode,c.bill_amount,	d.customer_name,
 				sum(c.bill_amount) as totalku from pdct_customer a
				left join pdct_contract b on b.id_customer = a.id 
				left join pdct_billing c on c.id_contract = b.id
				left join pdct_customer_name d on d.id = a.id_customer_name  
				where a.id_customer_name = '$id_customer_name' and 
				c.bill_periode LIKE '%$tahun%' GROUP BY a.id";

			$exsql = $db->Execute($sql);
			$cekavail = $exsql->RecordCount();

				//kalo datanya ada
				if($cekavail > 0){

					//kalo ada di loooping
					$sumtotal = 0;
					while($row = $exsql->FetchRow()){
					$list[] = array("id"=>$row['id'],"billing_periode"=>$row['bill_periode'],"total"=>number_format($row['totalku'],0,".","."));	
					$sumtotal += $row['totalku'];
					}
					$btnprint = '<button type="submit" name="print" class="btn btn-primary">
 						<i class="glyphicon glyphicon-print"> </i> Print Agging Project Status </button>'; 
					$info = '<div class="alert alert-info" align="center">  <b>Data Tersedia Sebanyak '.$cekavail.' Data </b> </div>';

				}else{
					//buat loopingan kosong
					$list[] = array("id"=>"","billing_periode"=>"","total"=>"");
					$info = '<div class="alert alert-danger" align="center"> <b>Data Tidak Ditemukan ! </b> </div>';
					$sumtotal = 0;
					$btnprint = '';
				}
				

			//ambil nama customer : 
		 			$sqlcust = "select * from pdct_customer_name where id = '$id_customer_name'";
		 			$exsqlcust =$db->Execute($sqlcust);
		 			$getcust = $exsqlcust->FetchRow();
		 			$namacustomer = $getcust['customer_name'];	

		 	//ambil nama contract status : 
		 			
		 			$contractstatus = '';
 			 
 		}
 	 
 		 

		$customer_name_opt = $this->customer_name_opt();
		$smarty->assign("customer_name_opt",$customer_name_opt);

		$contract_status = $this->contract_status();
		$smarty->assign("contract_status",$contract_status);

		//$smarty->assign("stat",$stat);
		$smarty->assign("btnprint",$btnprint);
		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		$smarty->assign("list",$list);
		$smarty->assign("info",$info);
		$smarty->assign("namacustomer",$namacustomer);
		$smarty->assign("contractstatus",$contractstatus);
		$smarty->assign("caridata",$caridata);
		$smarty->assign("id_customer_name",$id_customer_name);
		$smarty->assign("id_contract_status",$id_contract_status);
		$smarty->assign("tahun",$tahun);	
		$smarty->assign("sumtotal",number_format($sumtotal,0,".","."));
		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->display("agging_project_status.tpl");
		}
  
 
		//End Method PDCT Agging Project Status


		 
		
	}
?>