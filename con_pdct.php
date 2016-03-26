<?php
require ('libs/Smarty.class.php');
require ('config.php');
require ('fn_protect.php');
require ('user_cek.php');
date_default_timezone_set('Asia/Jakarta');

class Main {

		function cont_status_opt($selected = ''){
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
				
			$cont_status_opt[] = array('id'=>$row['id'],
				'selected'=>$selected_opt,
				'contract_status'=>$row['contract_status']);
			}
			
		}
		return $cont_status_opt;
		}

		function charges_opt($selected = ''){
		global $db;
		$data = "select * from pdct_charges";
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
				
			$charges_opt[] = array('id'=>$row['id'],
				'selected'=>$selected_opt,
				'charges'=>$row['charges']);
			}
			
		}
		return $charges_opt;
		}

		function BillingContractUpdate(){
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;


		 $id = $_GET['id'];
		 $idcust = $_GET['idcust'];

		$sql = "select a.*,b.contract_status,date_format(start_date,'%d-%m-%Y') as mulai, 
				date_format(ending_date,'%d-%m-%Y') as akhir,date_format(contract_date,'%d-%m-%Y') as tgl_contract_date from pdct_contract a 
				left join pdct_contract_status b on b.id = a.contract_status_opt where a.id = '$id' AND a.id_customer = '$idcust'";
		$exsql = $db->Execute($sql);
	 	$data = $exsql->FetchRow();


		$cont_status_opt = $this->cont_status_opt($data['contract_status_opt']);
		$smarty->assign("cont_status_opt",$cont_status_opt);


	 	$smarty->assign("id",$id);
	 	$smarty->assign("idcust",$idcust);

		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title); 
 		 
	 	$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);

		$smarty->display('billing_contract_update.tpl');
		}

		function BillingContractUpdateAct(){
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;


		$id = protect($_POST['id']);
		$idcust = protect($_POST['idcust']);  
		$contract_status = protect($_POST['contract_status']);

		
 		$sql = "update pdct_contract set contract_status_opt = '$contract_status',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";
 		

 		$exsql = $db->Execute($sql);
			if($exsql){
			 
			  echo "<script language=javascript>
	                    alert('Berhasil Merubah Data');
	                    window.location='master_pdct.php?idcust=$idcust&act=DetailContract';
	                 </script>";
			}else{
				  echo "<script language=javascript>
	                    alert('Maaf, Gagal Merubah Data');
	                    window.location='master_pdct.php?idcust=$idcust&act=DetailContract';
	                 </script>";
			}

		}


		//Start Method PDCT Customer
 
		function View(){
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		//$sql = "select *, datediff(ending_date,current_date()) as selisih from pdct_customer where visibility = 'Y'";
		$sql = "select a.*,b.customer_name,case when 
		a.cc_name = '' OR
		a.site_name = ''
		then '1' else '0' end as kondisi from pdct_customer a
		left join pdct_customer_name b on b.id = a.id_customer_name order by a.id asc";
		$exsql = $db->Execute($sql);
		$availdata = $exsql->RecordCount();
		if($availdata > 0){
			$no = 1;
			while ($row = $exsql->FetchRow()) {
				$list[] = array("id"=>$row['id'],"no"=>$no,"customer_name"=>$row['customer_name'],
					"project_no"=>$row['project_no'],"cc_name"=>$row['cc_name'],
					"site_name"=>$row['site_name'],"kondisi"=>$row['kondisi']);
			$no++;
			}
			

		}else{
	 		$no = 1;
			$list[] = array("id"=>"-","no"=>"-","customer_name"=>"-","project_no"=>"-",
				"cc_name"=>"-","site_name"=>"-","kondisi"=>"-");

	 		$no++;
		
		}

		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		$smarty->assign("list",$list);
		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->display("pdct_view.tpl");
		}

		function Add(){
		global $title,$db,$footer;
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;
		
		$date = date('d-m-Y'); 
		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title); 
		$smarty->assign("date",$date);
		 
	 	$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->display("pdct_add.tpl");			
		}

		function ProAdd(){
		global $title,$db,$footer;
		$smarty = new Smarty;
		include "fn_str.php";
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$id_cust_name = protect($_POST['id_cust_name']);
		$project_no = protect($_POST['project_no']);
		 
		$cc_name = protect($_POST['cc_name']);
		$site_name = protect($_POST['site_name']);
		 
		 

 
        $sql = "insert into pdct_customer (id,id_customer_name,project_no,cc_name,site_name,user_insert,date_insert) 
		values
		(null,'$id_cust_name','$project_no','$cc_name','$site_name','$_SESSION[username]',now())";
		 
	 	 
		$exsql = $db->Execute($sql);
		
		if($exsql){
			  echo "<script language=javascript>
	                    alert('Berhasil Menambah Data');
	                    window.location='master_pdct.php';
	                 </script>";
			}else{
				  echo "<script language=javascript>
	                    alert('Maaf, Gagal Menambah Data');
	                     window.location='master_pdct.php';
	                 </script>";
				}
	 	  
				 
		}

		function Update(){
		global $title,$db,$footer;
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$id = $_GET['id'];
		$sql = "select a.*,b.customer_name from pdct_customer a
		left join pdct_customer_name b on b.id = a.id_customer_name where a.id = '$id'";
		$exsql = $db->Execute($sql);
	 	$data = $exsql->FetchRow();

	 	$smarty->assign("id",$data['id']);
	 	$smarty->assign("id_customer_name",$data['id_customer_name']);
	 	$smarty->assign("project_no",$data['project_no']);
	 	$smarty->assign("customer_name",$data['customer_name']);
 
	 	$smarty->assign("site_name",$data['site_name']);
	 	$smarty->assign("cc_name",$data['cc_name']);
	 		 
		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		 
		$smarty->display("pdct_edit.tpl");
		}
		

		function ProUpdate(){
		global $title,$db,$footer;
		include "fn_str.php";
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$idpdct = protect($_POST['id']);
		$id_cust_name = protect($_POST['id_cust_name']);	 
		$project_no = protect($_POST['project_no']);
		 
		$site_name = protect($_POST['site_name']);
		$cc_name = protect($_POST['cc_name']);
	 
 
 		$sql = "update pdct_customer set
		id_customer_name = '$id_cust_name', project_no = '$project_no', 
		cc_name = '$cc_name', site_name = '$site_name',
		user_edit = '$_SESSION[username]',date_edit= now()
		where id = '$idpdct'";
 
		$exsql = $db->Execute($sql);
		
			if($exsql){
			  echo "<script language=javascript>
	                    alert('Berhasil Merubah Data');
	                    window.location='?act=View';
	                 </script>";
			}else{
				  echo "<script language=javascript>
	                    alert('Maaf, Gagal Merubah Data');
	                    window.location='?act=View';
	                 </script>";
			}
		 	 
		 
		}
		
		function Delete(){
		global $title,$db,$footer;
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$id = $_GET['id'];
		//get all id
		$sqlall = "select a.id as idcust,b.id as idcont,b.id_customer,c.id as idbilling,
					c.id_contract,c.id_customer from pdct_customer a
					inner join pdct_contract b on b.id_customer = a.id
					inner join pdct_billing c on c.id_contract = b.id
					where a.id = '$id'";
		$exsqlall = $db->Execute($sqlall);
		$datasqlall = $exsqlall->FetchRow();
		$idcust = $datasqlall['idcust'];
		$idcont = $datasqlall['idcont'];
		$idbilling = $datasqlall['idbilling'];

		 
		//get data file billing upload and destroy all billing files clear
		 
 		$sqlfilebilling = "select * from pdct_billing where id_customer = '$idcust'";
		$exsqlfilebilling = $db->Execute($sqlfilebilling);
		while($rowfiles = $exsqlfilebilling->FetchRow()){
			//echo"<br>".$rowfiles['fp_no_file'];
			if(empty($rowfiles['fp_no_file'])){
			 
			}else{
		 	unlink("doc_uploads/fp_no/".$rowfiles['fp_no_file']);
			}
			
		 	 
		}	
		 

		 
		//get data file contract upload and destroy all contract files clear
		$sqlupload = "select * from pdct_contract where id_customer = '$idcust'";
 		$exsqluploadcont = $db->Execute($sqlupload);
 		while ($dataupload = $exsqluploadcont->FetchRow()) {

 				//00000 //0
				if(empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && empty($dataupload['baso_file'])){
				
				//x0000 //1
				}else if(!empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && empty($dataupload['baso_file'])){
				
				unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);
		 		 
				//xx000 //2
				}elseif (!empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
				
				unlink("doc]l_uploads/spk/".$dataupload['no_spk_p8_file']);
		 		unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 	 
				//xxxxx //5
				}else if(!empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && !empty($dataupload['baso_file'])){
				
				unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);
		 		unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 		unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		unlink("doc_uploads/bast/".$dataupload['bast_file']);
		 		unlink("doc_uploads/baso/".$dataupload['baso_file']);

				//0x000 //2
				}else if (empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
								 
		 		unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 	
				//xxx00 //3	
				}elseif (!empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
				
				unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);
		 		unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 		unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		 
				//0xx00 //3
				}elseif (empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
	 				 		 
		 		unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 		unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		 
	 			//00x00 //3	
				}elseif (empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
				
			 	unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		 
				//x0x00 //3
				}elseif (!empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
				
				unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);
		 		unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		
				//0x000 //3
				}elseif (empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
				
				unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 		 
				//xxxx0 //4
				}elseif (!empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
				
				unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);
		 		unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 		unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		unlink("doc_uploads/bast/".$dataupload['bast_file']);
		 		 
				//0xxx0 //4		
				}elseif (empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
								 
		 		unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 		unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		unlink("doc_uploads/bast/".$dataupload['bast_file']);
		 		 
				//00xx0 //4
				}elseif (empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
				
			 	unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		unlink("doc_uploads/bast/".$dataupload['bast_file']);
		 		 
				//000x0 //4	
				}elseif (empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
				
			 	unlink("doc_uploads/bast/".$dataupload['bast_file']);
		 		 
				//x00x0 //4
				}elseif (!empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
				 
				unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);
		 		unlink("doc_uploads/bast/".$dataupload['bast_file']);
		 		 
				//xx0x0 //4
				}elseif (!empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
				 
				unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);
		 		unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 		unlink("doc_uploads/bast/".$dataupload['bast_file']);
 
				//0x0x0 //4
				}elseif (empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
			 			  
		 		unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 		unlink("doc_uploads/bast/".$dataupload['bast_file']);
		 		 
				//x0xx0 //4
				}elseif (!empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
			 
			 	unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);		 
		 		unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		unlink("doc_uploads/bast/".$dataupload['bast_file']);
 
		 		//0000x //5
				}elseif (empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && !empty($dataupload['baso_file'])) {
				
				unlink("doc_uploads/baso/".$dataupload['baso_file']);

				//000xx //5	
				}elseif (empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && !empty($dataupload['baso_file'])) {
				
				unlink("doc_uploads/bast/".$dataupload['bast_file']);
		 		unlink("doc_uploads/baso/".$dataupload['baso_file']);

				//00xxx //5	
				}elseif (empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && !empty($dataupload['baso_file'])) {
				

		 		unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		unlink("doc_uploads/bast/".$dataupload['bast_file']);
		 		unlink("doc_uploads/baso/".$dataupload['baso_file']);

				//0xxxx //5					
				}elseif (empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && !empty($dataupload['baso_file'])) {
								 
		 		unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 		unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		unlink("doc_uploads/bast/".$dataupload['bast_file']);
		 		unlink("doc_uploads/baso/".$dataupload['baso_file']);

				//0xx0x //5	
				}elseif (empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && !empty($dataupload['baso_file'])) {
			 	
		 		unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 		unlink("doc_uploads/cn/".$dataupload['contract_number_file']); 		 
		 		unlink("doc_uploads/baso/".$dataupload['baso_file']);

				//xxx0x //5
				}elseif (!empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && !empty($dataupload['baso_file'])) {
				
				unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);
		 		unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 		unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		unlink("doc_uploads/baso/".$dataupload['baso_file']);

				//x0x0x //5
				}elseif (!empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && !empty($dataupload['baso_file'])) {
				
				unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);
		 		unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		unlink("doc_uploads/baso/".$dataupload['baso_file']);

				//x0xxx //5
				}elseif (!empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && !empty($dataupload['baso_file'])) {
				 
				unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);
		 	 	unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		unlink("doc_uploads/bast/".$dataupload['bast_file']);
		 		unlink("doc_uploads/baso/".$dataupload['baso_file']);

				//x00xx //5
				}elseif (!empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && !empty($dataupload['baso_file'])) {
				
				unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);
		 	 	unlink("doc_uploads/bast/".$dataupload['bast_file']);
		 		unlink("doc_uploads/baso/".$dataupload['baso_file']);

				//x000x //5
				}elseif (!empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && !empty($dataupload['baso_file'])) {
				
				unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);
		 	 	unlink("doc_uploads/baso/".$dataupload['baso_file']);

				//xx00x //5
				}elseif (!empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && !empty($dataupload['baso_file'])) {
				
				unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);
		 		unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 		unlink("doc_uploads/baso/".$dataupload['baso_file']);

				//00x0x //5	
				}elseif (empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && !empty($dataupload['baso_file'])) {
				
			 	unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		unlink("doc_uploads/baso/".$dataupload['baso_file']);

				}


 		 
 		}

 	 


 		 
 		//delete all data billing on database
 		$sqldelbill = "delete from pdct_billing where id_customer = '$idcust'";
 		$exsqldelbill = $db->Execute($sqldelbill);

 		//delete all data contract on database
 		$sqldelcont = "delete from pdct_contract where id_customer = '$idcust'";
 		$exsqldelcont = $db->Execute($sqldelcont);

 		//delete all data customer on database
 		$sqldelcust = "delete from pdct_customer where id = '$id'";
 		$exsqldelcust = $db->Execute($sqldelcust);
 
 		if($exsqldelbill && $exsqldelcont && $exsqldelcust ){
			 
			  echo "<script language=javascript>
	                    alert('Berhasil Menghapus Data');
	                    window.location='?act=View';
	                 </script>";
			}else{
				  echo "<script language=javascript>
	                    alert('Maaf, Gagal Menghapus Data');
	                    window.location='?act=View';
	                 </script>";
				}
	 		
			 
		}

		function DetailContract(){
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$idcust = $_GET['idcust'];

		//get info customer
		$sqlcust = "select a.*,customer_name from pdct_customer a
		left join pdct_customer_name b on b.id = a.id_customer_name
		where a.id = '$idcust'";

		$exsqlcust = $db->Execute($sqlcust);
		$datacust = $exsqlcust->FetchRow();
		$smarty->assign("id",$datacust['id']);
		$smarty->assign("customer_name",$datacust['customer_name']);
		$smarty->assign("project_no",$datacust['project_no']);
		$smarty->assign("cc_name",$datacust['cc_name']);
		$smarty->assign("site_name",$datacust['site_name']);
	 
		 
 		 
		$sqlcontract = "select *,a.id as idcontnya,b.contract_status, case when 
		no_spk_p8_file = '' OR
		surat_kesanggupan_file = ''  OR
		contract_number_file = ''  OR
		bast_file = ''  OR
		baso_file = '' OR 
		account_no = ''  OR
		sid = ''  OR
		cid = ''  OR
		start_date = ''  OR
		ending_date = ''  OR
		masa_kontrak = ''  OR
		contract_status_opt = ''  OR
		account_manager = ''  OR
		email = ''  OR 
		phone = ''  OR
		otc = ''  OR
		monthly = '' 
		then 'NF' else 'YF'
		end as kondisi,
		datediff(ending_date,current_date()) as selisih from pdct_contract a 
		left join pdct_contract_status b on b.id = a.contract_status_opt where a.id_customer = '$datacust[id]'";
		$exsqlcontract = $db->Execute($sqlcontract);
		 
 	 	$availdata = $exsqlcontract->RecordCount();
 	 	if($availdata > 0){
 	 			while ($row = $exsqlcontract->FetchRow()) {
				//list($depan,$belakang) = explode("-",$row['contract_level']);
				$listcont[] = array("id"=>$row['idcontnya'],
				"idcust"=>$row['id_customer'],
				"site_code"=>$row['site_code'],
				"contract_level"=>$row['contract_level'],
				"nama_pekerjaan"=>$row['nama_pekerjaan'],
				"account_no"=>$row['account_no'],
				"cid"=>$row['cid'],"sidnya"=>$row['sid'],
				"starting"=>tgl_indo($row['start_date']),
				"selisih"=>$row['selisih'],
				"kondisi"=>$row['kondisi'],
				"contract_status"=>$row['contract_status'],
				"ending"=>tgl_indo($row['ending_date']));

				}

 	 	}else{
 	 			$listcont[] = array("id"=>"-",
				"idcust"=>"-",
				"site_code"=>"-",
				"contract_level"=>"-",
				"nama_pekerjaan"=>"-",
				"account_no"=>"-",
				"cid"=>"-",
				"sidnya"=>"-",
				"starting"=>"-",
				"selisih"=>"-",
				"kondisi"=>"NF",
				"contract_status"=>"-",
				"ending"=>"-");

 	 	}
	

		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		$smarty->assign("list",$listcont);
		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->assign("idcust",$idcust);
 
		$smarty->display("pdct_contract_detail_view.tpl");
		}

		function DetailList(){
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
		include "fn_rupiah.php";
		$moneyFormat = new moneyFormat();
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$id = $_GET['id'];
		$idcust = $_GET['idcust'];
		$sql = "select a.*,b.id_customer_name,b.project_no,b.cc_name,b.site_name,c.customer_name,
				d.contract_status from pdct_contract a
				left join pdct_customer b on b.id = a.id_customer
				left join pdct_customer_name c on c.id = b.id_customer_name
				left join pdct_contract_status d on d.id = a.contract_status_opt
				where a.id = '$id' and a.id_customer = '$idcust'";
		$exsql = $db->Execute($sql);
	 	$data = $exsql->FetchRow();

	 	$smarty->assign("id",$data['id']);
	 	$smarty->assign("project_no",$data['project_no']);
	 	 
	 	$smarty->assign("contract_status",$data['contract_status']);
	 	$smarty->assign("site_code",$data['site_code']);
	 	$smarty->assign("customer_name",$data['customer_name']);
	 	$smarty->assign("cc_name",$data['cc_name']);
	 	$smarty->assign("site_name",$data['site_name']);
	 	$smarty->assign("nama_pekerjaan",$data['nama_pekerjaan']);
	 
	  	$smarty->assign("contract_level",$data['contract_level']);
	 	$smarty->assign("no_spk_p8_file",$data['no_spk_p8_file']);
	 	$smarty->assign("surat_kesanggupan_file",$data['surat_kesanggupan_file']);
	 	$smarty->assign("contract_number_file",$data['contract_number_file']);
	 	$smarty->assign("bast_file",$data['bast_file']);
	 	$smarty->assign("baso_file",$data['baso_file']);
	 	$smarty->assign("account_no",$data['account_no']);
	 	$smarty->assign("sid",$data['sid']);
	 	$smarty->assign("cid",$data['cid']);
	 	$smarty->assign("start_date",tgl_indo($data['start_date']));
	 	$smarty->assign("ending_date",tgl_indo($data['ending_date']));
	 	$smarty->assign("masa_kontrak",$data['masa_kontrak']);
	 	$smarty->assign("account_manager",$data['account_manager']);
	 	$smarty->assign("email",$data['email']);
	 	$smarty->assign("phone",$data['phone']);
	 	$smarty->assign("otc",number_format($data['otc'],0,".",","));
	 	$smarty->assign("monthly",number_format($data['monthly'],0,".",","));
	 	$smarty->assign("total",number_format($data['total'],0,".",","));
	 	 
 	 
		$terbilang_month = $moneyFormat->terbilang($data['monthly']);
	 	$smarty->assign("terbilang_month",$terbilang_month);

	 	$terbilang_otc = $moneyFormat->terbilang($data['otc']);
	 	$smarty->assign("terbilang_otc",$terbilang_otc);

	 	$terbilang_total = $moneyFormat->terbilang($data['total']);
	 	$smarty->assign("terbilang_total",$terbilang_total);
 	 
 
		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);

		 
		$smarty->display("pdct_detail.tpl");
		}


		

 
		//End Method PDCT Customer

		//Start Method PDCT Contract

 		function DetailContractAdd(){
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
	 	 
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$date = date('d-m-Y');
		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		$smarty->assign("date",$date);
		$cont_status_opt = $this->cont_status_opt();
		$smarty->assign("cont_status_opt",$cont_status_opt);
		$smarty->assign("idcust",$_GET['idcust']);
		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
	 	$smarty->display("pdct_contract_detail_add.tpl");

		}
	 	

	 	function DetailContractProAdd(){
	 	global $title,$db,$footer;
		include "fn_tgl_indo.php";
		include "fn_str.php";
 
	 	 
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$idcust = protect($_POST['idcust']);

		$name_contract_level =  protect($_POST['name_contract_level']);
		$val_contract_level = protect($_POST['val_contract_level']);

		if($val_contract_level == ""){
			$cval_contract_level = '0';
		}else{
			$cval_contract_level = $val_contract_level;
		}

	 	$contract_level = $name_contract_level." ".$cval_contract_level;
	 	$site_code = protect($_POST['site_code']);
	 	$nama_pekerjaan = protect($_POST['nama_pekerjaan']);

		$no_spk = $_FILES['no_spk']['name'];
		$sno_spk = $_FILES['no_spk']['size'];
		$get_no_spk = explode('.', $no_spk);
 		$vno_spk = end($get_no_spk);

		$surat_kesanggupan = $_FILES['surat_kesanggupan']['name'];
		$sizesurat_kesanggupan = $_FILES['surat_kesanggupan']['size'];
		$getsurat_kesanggupan = explode('.', $surat_kesanggupan);
		$vsurat_kesanggupan = end($getsurat_kesanggupan);

		$contract_number = $_FILES['contract_number']['name'];
		$scontract_number = $_FILES['contract_number']['size'];
		$getcontract_number = explode('.', $contract_number);
		$vcontract_number = end($getcontract_number);

		$contract_date = date('Y-m-d',strtotime($_POST['contract_date']));

		$bast = $_FILES['bast']['name'];
		$sbast = $_FILES['bast']['size'];
		$getbast = explode('.', $bast);
		$vbast = end($getbast);

		$baso = $_FILES['baso']['name'];
		$sbaso = $_FILES['baso']['size'];
		$getbaso = explode('.', $baso);
		$vbaso = end($getbaso);

		$acc_no = protect($_POST['acc_no']);
		$sid = protect($_POST['sid']);
		$cid = protect($_POST['cid']);
		$starting = date('Y-m-d',strtotime($_POST['starting']));
		 
		$ending = date('Y-m-d',strtotime($_POST['ending']));
		 
		$masa_kontrak = protect($_POST['masa_kontrak']);
		$contract_status = protect($_POST['contract_status']);
		$acc_manager = protect($_POST['acc_manager']);
		$email = protect($_POST['email']);
		$phone = protect($_POST['phone']);
		$otc = clean_string_num($_POST['otc']);
		$monthly = clean_string_num($_POST['monthly']);
		$total = $monthly*$masa_kontrak+$otc;
  
  		if($ending == '' && $starting == ''){

  		}else{

  		}
		 
		if($ending <= $starting){
	 		 	 		
	 		echo "<script language=javascript>
	                    alert('Tanggal Akhir Tidak Boleh Lebih Kecil atau Sama Dengan Tanggal Mulai!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
	                     

			} 
			/*
			echo "MULAI : " .$starting;
			echo "<br>";
			echo "ENDING : " .$ending;
			exit();
			*/

			 	//SKRIP INSERT
				//00000 //0
				if(empty($no_spk) && empty($surat_kesanggupan) && empty($contract_number) && empty($bast) && empty($baso)){


 											 
					$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,contract_date,account_no,sid,
							cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
							(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$contract_date','$acc_no','$sid','$cid','$starting',
							'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";
 
				//x0000 //1
				}else if(!empty($no_spk) && empty($surat_kesanggupan) && empty($contract_number) && empty($bast) && empty($baso)){
 
					$extensi = array("pdf","jpg","jpeg","png");
			 	 	//validasi  
					if(in_array($vno_spk,$extensi)){
						 
						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
								contract_date,account_no,sid,cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,
								user_insert,date_insert) VALUES (null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]',
								'$contract_date','$acc_no','$sid','$cid','$starting','$ending','$masa_kontrak','$contract_status',
								'$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";
						
						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
						 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//xx000 //2
				}elseif (!empty($no_spk) && !empty($surat_kesanggupan) && empty($contract_number) && empty($bast) && empty($baso)) {
			 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	//validasi  
					if(in_array($vno_spk,$extensi) && in_array($vsurat_kesanggupan, $extensi)){
					 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
								surat_kesanggupan_file,surat_kesanggupan_date_upload, surat_kesanggupan_who_upload,contract_date,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]','$surat_kesanggupan',now(),'$_SESSION[username]',
								'$contract_date','$acc_no','$sid','$cid','$starting','$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc',
								'$monthly','$total','$_SESSION[username]',now())";


 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//xxxxx //5
				}else if(!empty($no_spk) && !empty($surat_kesanggupan) && !empty($contract_number) && !empty($bast) && !empty($baso)){
				 

					$extensi = array("pdf","jpg","jpeg");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vsurat_kesanggupan, $extensi) && in_array($vcontract_number, $extensi) && in_array($vbast, $extensi) && in_array($vbaso, $extensi)){
					 
						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
								surat_kesanggupan_file,surat_kesanggupan_date_upload, surat_kesanggupan_who_upload,contract_number_file,contract_number_date_upload,
								contract_number_who_upload,contract_date,bast_file,bast_date_upload,bast_who_upload,baso_file,baso_date_upload,baso_who_upload,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]','$surat_kesanggupan',now(),'$_SESSION[username]',
								'$contract_number',now(),'$_SESSION[username]','$contract_date','$bast',now(),'$_SESSION[username]','$baso',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting',
								'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

  						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);
					}else{
						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				//0x000 //2
				}elseif (empty($no_spk) && !empty($surat_kesanggupan) && empty($contract_number) && empty($bast) && empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vsurat_kesanggupan, $extensi)){
						 

					$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,surat_kesanggupan_file,surat_kesanggupan_date_upload, surat_kesanggupan_who_upload,
								contract_date,account_no,sid,cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert)
								VALUES (null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$surat_kesanggupan',now(),'$_SESSION[username]','$contract_date','$acc_no','$sid','$cid',
								'$starting','$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						 
					move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						 

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				//xxx00 //3	
				}elseif (!empty($no_spk) && !empty($surat_kesanggupan) && !empty($contract_number) && empty($bast) && empty($baso)) {
				 
					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vsurat_kesanggupan, $extensi) && in_array($vcontract_number, $extensi)){
					 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
								surat_kesanggupan_file,surat_kesanggupan_date_upload, surat_kesanggupan_who_upload,contract_number_file,contract_number_date_upload,
								contract_number_who_upload,contract_date,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]','$surat_kesanggupan',now(),'$_SESSION[username]',
								'$contract_number',now(),'$_SESSION[username]','$contract_date','$acc_no','$sid','$cid','$starting',
								'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
					 

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//0xx00 //3
				}elseif (empty($no_spk) && !empty($surat_kesanggupan) && !empty($contract_number) && empty($bast) && empty($baso)) {
				 
					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vsurat_kesanggupan, $extensi) && in_array($vcontract_number, $extensi)){
						 
				$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan, surat_kesanggupan_file,surat_kesanggupan_date_upload, surat_kesanggupan_who_upload,contract_number_file,contract_number_date_upload,
								contract_number_who_upload,contract_date,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$surat_kesanggupan',now(),'$_SESSION[username]',
								'$contract_number',now(),'$_SESSION[username]','$contract_date','$acc_no','$sid','$cid','$starting',
								'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						 
						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						 

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//00x00 //3	
				}elseif (empty($no_spk) && empty($surat_kesanggupan) && !empty($contract_number) && empty($bast) && empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vcontract_number, $extensi)){
					 
						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,contract_number_file,contract_number_date_upload,
								contract_number_who_upload,contract_date,account_no,sid,cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager,
								email,phone,otc,monthly,total,user_insert,date_insert) VALUES (null,$idcust,'$site_code','$contract_level','$nama_pekerjaan',
								'$contract_number',now(),'$_SESSION[username]','$contract_date','$acc_no','$sid','$cid','$starting','$ending','$masa_kontrak',
								'$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}				

				//x0x00 //3
				}elseif (!empty($no_spk) && empty($surat_kesanggupan) && !empty($contract_number) && empty($bast) && empty($baso)) {
			 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vcontract_number, $extensi)){
						 
					$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
							contract_number_file,contract_number_date_upload,contract_number_who_upload,contract_date,account_no,sid, cid,start_date,ending_date,masa_kontrak,
							contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES (null,$idcust,'$site_code','$contract_level',
							'$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]','$contract_number',now(),'$_SESSION[username]','$contract_date',
							'$acc_no','$sid','$cid','$starting','$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
 						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
 					
 					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}				

				//0x000 //3
				}elseif (empty($no_spk) && !empty($surat_kesanggupan) && empty($contract_number) && empty($bast) && empty($baso)) {
			 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vsurat_kesanggupan, $extensi)){
						 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,surat_kesanggupan_file,surat_kesanggupan_date_upload, surat_kesanggupan_who_upload,
								contract_date,account_no,sid,cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$surat_kesanggupan',now(),'$_SESSION[username]','$contract_date','$acc_no','$sid','$cid','$starting',
								'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//xxxx0 //4
				}elseif (!empty($no_spk) && !empty($surat_kesanggupan) && !empty($contract_number) && !empty($bast) && empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vsurat_kesanggupan, $extensi) && in_array($vcontract_number, $extensi) && in_array($vbast, $extensi)){
						 
					$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
								surat_kesanggupan_file,surat_kesanggupan_date_upload, surat_kesanggupan_who_upload,contract_number_file,contract_number_date_upload,
								contract_number_who_upload,contract_date,bast_file,bast_date_upload,bast_who_upload,account_no,sid,cid,start_date,ending_date,masa_kontrak,
								contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]','$surat_kesanggupan',now(),'$_SESSION[username]',
								'$contract_number',now(),'$_SESSION[username]','$contract_date','$bast',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting',
								'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//0xxx0 //4		
				}elseif (empty($no_spk) && !empty($surat_kesanggupan) && !empty($contract_number) && !empty($bast) && empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vsurat_kesanggupan, $extensi) && in_array($vcontract_number, $extensi) && in_array($vbast, $extensi)){
					 

					$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,surat_kesanggupan_file,surat_kesanggupan_date_upload, 
							surat_kesanggupan_who_upload,contract_number_file,contract_number_date_upload, contract_number_who_upload,contract_date,bast_file,
							bast_date_upload,bast_who_upload,account_no,sid, cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,
							monthly,total, user_insert,date_insert) VALUES (null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$surat_kesanggupan',now(),'$_SESSION[username]',
							'$contract_number',now(),'$_SESSION[username]','$contract_date','$bast',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting',
							'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//00xx0 //4
				}elseif (empty($no_spk) && empty($surat_kesanggupan) && !empty($contract_number) && !empty($bast) && empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vcontract_number, $extensi) && in_array($vbast, $extensi)){
						 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,contract_number_file,contract_number_date_upload,
								contract_number_who_upload,contract_date,bast_file,bast_date_upload,bast_who_upload,account_no,sid,cid,start_date,ending_date,masa_kontrak,
								contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES (null,$idcust,'$site_code','$contract_level',
								'$nama_pekerjaan','$contract_number',now(),'$_SESSION[username]','$contract_date','$bast',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting',
								'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//000x0 //4	
				}elseif (empty($no_spk) && empty($surat_kesanggupan) && empty($contract_number) && !empty($bast) && empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vbast, $extensi)){
						 
						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,contract_date,bast_file,bast_date_upload,bast_who_upload,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$contract_date','$bast',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting',
								'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}				
				//x00x0 //4
				}elseif (!empty($no_spk) && empty($surat_kesanggupan) && empty($contract_number) && !empty($bast) && empty($baso)) {
				 
					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vbast, $extensi)){
						 
						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
								contract_date,bast_file,bast_date_upload,bast_who_upload,account_no,sid,cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, 
								email,phone,otc,monthly,total,user_insert,date_insert) VALUES 	(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]',
								'$contract_date','$bast',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting','$ending','$masa_kontrak','$contract_status','$acc_manager',
								'$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//xx0x0 //4
				}elseif (!empty($no_spk) && !empty($surat_kesanggupan) && empty($contract_number) && !empty($bast) && empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vsurat_kesanggupan, $extensi) && in_array($vbast, $extensi)){
						 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
								surat_kesanggupan_file,surat_kesanggupan_date_upload, surat_kesanggupan_who_upload,contract_date,bast_file,bast_date_upload,bast_who_upload,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]','$surat_kesanggupan',now(),'$_SESSION[username]',
								'$contract_date','$bast',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting','$ending','$masa_kontrak','$contract_status','$acc_manager',
								'$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
 						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}			
				//0x0x0 //4
				}elseif (empty($no_spk) && !empty($surat_kesanggupan) && empty($contract_number) && !empty($bast) && empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vsurat_kesanggupan, $extensi) && in_array($vbast, $extensi)){
						 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,surat_kesanggupan_file,surat_kesanggupan_date_upload, surat_kesanggupan_who_upload,
								contract_date,bast_file,bast_date_upload,bast_who_upload,account_no,sid, cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,
								monthly,total,user_insert,date_insert) VALUES (null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$surat_kesanggupan',now(),
								'$_SESSION[username]','$contract_date','$bast',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting','$ending','$masa_kontrak','$contract_status',
								'$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
 						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//x0xx0 //4
				}elseif (!empty($no_spk) && empty($surat_kesanggupan) && !empty($contract_number) && !empty($bast) && empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vcontract_number, $extensi) && in_array($vbast, $extensi)){
						 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
								contract_number_file,contract_number_date_upload,contract_number_who_upload,contract_date,bast_file,bast_date_upload,bast_who_upload,account_no,
								sid,cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]','$contract_number',now(),'$_SESSION[username]',
								'$contract_date','$bast',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting','$ending','$masa_kontrak','$contract_status','$acc_manager',
								'$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
 						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				//0000x //5
				}elseif (empty($no_spk) && empty($surat_kesanggupan) && empty($contract_number) && empty($bast) && !empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vbaso, $extensi)){			 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,contract_date,baso_date_upload,baso_who_upload,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan',$contract_date','$baso',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting',
								'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//000xx //5	
				}elseif (empty($no_spk) && empty($surat_kesanggupan) && empty($contract_number) && !empty($bast) && !empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vbast, $extensi) && in_array($vbaso, $extensi)){
					 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,contract_date,bast_file,bast_date_upload,bast_who_upload,baso_file,baso_date_upload,
								baso_who_upload, account_no,sid,cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$contract_date','$bast',now(),'$_SESSION[username]','$baso',now(),'$_SESSION[username]','$acc_no','$sid','$cid',
								'$starting','$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//00xxx //5	
				}elseif (empty($no_spk) && empty($surat_kesanggupan) && !empty($contract_number) && !empty($bast) && !empty($baso)) {
				 
					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vcontract_number, $extensi) && in_array($vbast, $extensi) && in_array($vbaso, $extensi)){
						
						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
								surat_kesanggupan_file,surat_kesanggupan_date_upload, surat_kesanggupan_who_upload,contract_number_file,contract_number_date_upload,
								contract_number_who_upload,contract_date,bast_file,bast_date_upload,bast_who_upload,baso_file,baso_date_upload,baso_who_upload,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]','$surat_kesanggupan',now(),'$_SESSION[username]',
								'$contract_number',now(),'$_SESSION[username]','$contract_date','$bast',now(),'$_SESSION[username]','$baso',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting',
								'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				//0xxxx //5					
				}elseif (empty($no_spk) && !empty($surat_kesanggupan) && !empty($contract_number) && !empty($bast) && !empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vsurat_kesanggupan, $extensi) && in_array($vcontract_number, $extensi) && in_array($vbast, $extensi) && in_array($vbaso, $extensi)){
						

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,surat_kesanggupan_file,surat_kesanggupan_date_upload, surat_kesanggupan_who_upload,contract_number_file,contract_number_date_upload,
								contract_number_who_upload,contract_date,bast_file,bast_date_upload,bast_who_upload,baso_file,baso_date_upload,baso_who_upload,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$surat_kesanggupan',now(),'$_SESSION[username]','$contract_number',now(),
								'$_SESSION[username]','$contract_date','$bast',now(),'$_SESSION[username]','$baso',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting',
								'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				//0xx0x //5	
				}elseif (empty($no_spk) && !empty($surat_kesanggupan) && !empty($contract_number) && empty($bast) && !empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vsurat_kesanggupan, $extensi) && in_array($vcontract_number, $extensi) && in_array($vbaso, $extensi)){
						 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,surat_kesanggupan_file,surat_kesanggupan_date_upload,
								surat_kesanggupan_who_upload,contract_number_file,contract_number_date_upload, contract_number_who_upload,contract_date,baso_file,baso_date_upload,
								baso_who_upload,account_no,sid,dcid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$surat_kesanggupan',now(),'$_SESSION[username]','$contract_number',now(),'$_SESSION[username]','$contract_date',
								'$baso',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting',
								'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
 						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				
				//xxx0x //5
				}elseif (!empty($no_spk) && !empty($surat_kesanggupan) && !empty($contract_number) && empty($bast) && !empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vsurat_kesanggupan, $extensi) && in_array($vcontract_number, $extensi) && in_array($vbaso, $extensi)){
						 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
								surat_kesanggupan_file,surat_kesanggupan_date_upload, surat_kesanggupan_who_upload,contract_number_file,contract_number_date_upload,
								contract_number_who_upload,contract_date,baso_file,baso_date_upload,baso_who_upload,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]','$surat_kesanggupan',now(),'$_SESSION[username]',
								'$contract_number',now(),'$_SESSION[username]','$contract_date','$baso',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting',
								'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
 						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				//x0x0x //5
				}elseif (!empty($no_spk) && empty($surat_kesanggupan) && !empty($contract_number) && empty($bast) && !empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vcontract_number, $extensi) && in_array($vbaso, $extensi)){
						 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
								contract_number_file,contract_number_date_upload, contract_number_who_upload,contract_date,baso_file,baso_date_upload,baso_who_upload,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]','$contract_number',now(),'$_SESSION[username]','$contract_date',
								'$baso',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting','$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly',
								'$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
 						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
 						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				//x0xxx //5
				}elseif (!empty($no_spk) && empty($surat_kesanggupan) && !empty($contract_number) && !empty($bast) && !empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vcontract_number, $extensi) && in_array($vbast, $extensi) && in_array($vbaso, $extensi)){
						 
						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
								contract_number_file,contract_number_date_upload,contract_number_who_upload,contract_date,bast_file,bast_date_upload,bast_who_upload,baso_file,baso_date_upload,
								baso_who_upload,account_no,sid, cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]','$contract_number',now(),'$_SESSION[username]','$contract_date','$bast',
								now(),'$_SESSION[username]','$baso',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting','$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone',
								'$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
 						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				//x00xx //5
				}elseif (!empty($no_spk) && empty($surat_kesanggupan) && empty($contract_number) && !empty($bast) && !empty($baso)) {
				 
					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vbast, $extensi) && in_array($vbaso, $extensi)){
						 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
								contract_date,bast_file,bast_date_upload,bast_who_upload,baso_file,baso_date_upload,baso_who_upload,account_no,sid, cid,start_date,ending_date,
								masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES (null,$idcust,'$site_code','$contract_level',
								'$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]','$contract_date','$bast',now(),'$_SESSION[username]','$baso',now(),'$_SESSION[username]','$acc_no',
								'$sid','$cid','$starting','$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
 						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				//x000x //5
				}elseif (!empty($no_spk) && empty($surat_kesanggupan) && empty($contract_number) && empty($bast) && !empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vbaso, $extensi)){
						 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,contract_date,baso_file,baso_date_upload,baso_who_upload,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$contract_date','$baso',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting',
								'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";


 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
 						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//xx00x //5
				}elseif (!empty($no_spk) && !empty($surat_kesanggupan) && empty($contract_number) && empty($bast) && !empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vsurat_kesanggupan, $extensi) && in_array($vbaso, $extensi)){
						 
						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
								surat_kesanggupan_file,surat_kesanggupan_date_upload, surat_kesanggupan_who_upload,contract_date,baso_file,baso_date_upload,baso_who_upload,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]','$surat_kesanggupan',now(),'$_SESSION[username]',
								'$contract_date','$baso',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting','$ending','$masa_kontrak','$contract_status','$acc_manager',
								'$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
 						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//00x0x //5	
				}elseif (empty($no_spk) && empty($surat_kesanggupan) && !empty($contract_number) && empty($bast) && !empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vcontract_number, $extensi) && in_array($vbaso, $extensi)){
						 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,contract_number_file,contract_number_date_upload,
								contract_number_who_upload,contract_date,baso_file,baso_date_upload,baso_who_upload,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$contract_number',now(),'$_SESSION[username]','$contract_date','$baso',now(),
								'$_SESSION[username]','$acc_no','$sid','$cid','$starting','$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc',
								'$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
 						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				}


			//SQL insert data
			//echo $sql;
			//exit();
		 			 $exsql = $db->Execute($sql);

			if($exsql){
				  echo "<script language=javascript>
		                    alert('Berhasil Menambah Data');
		                    window.location='master_pdct.php?idcust=$idcust&act=DetailContract';
		                 </script>";
			}else{
				 echo "<script language=javascript>
		                   alert('Maaf, Gagal Menambah Data');
		                    window.location='master_pdct.php?idcust=$idcust&act=DetailContract';
		                 </script>";
			}
		  
			 
			

	 	}

	 	function DetailContractUpdate(){
		global $title,$db,$footer;
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		 $id = $_GET['id'];
		 $idcust = $_GET['idcust'];

		$sql = "select a.*,b.contract_status,date_format(start_date,'%d-%m-%Y') as mulai, 
				date_format(ending_date,'%d-%m-%Y') as akhir,date_format(contract_date,'%d-%m-%Y') as tgl_contract_date from pdct_contract a 
				left join pdct_contract_status b on b.id = a.contract_status_opt where a.id = '$id' AND a.id_customer = '$idcust'";
		$exsql = $db->Execute($sql);
	 	$data = $exsql->FetchRow();

	 	list($name_cont,$val_cont) = explode(" ",$data['contract_level']);
	 	 

	 	$smarty->assign("id",$id);
	 	$smarty->assign("idcust",$idcust);

		$smarty->assign("site_code",$data['site_code']);
		$smarty->assign("contract_level",$data['contract_level']);
		$smarty->assign("name_cont",$name_cont);
		$smarty->assign("val_cont",$val_cont);
		$smarty->assign("nama_pekerjaan",$data['nama_pekerjaan']);
		$smarty->assign("account_no",$data['account_no']);
		$smarty->assign("contract_date",$data['tgl_contract_date']);
	 	$smarty->assign("mulai",$data['mulai']);
	 	$smarty->assign("akhir",$data['akhir']);

	 	$smarty->assign("no_spk_p8_file",$data['no_spk_p8_file']);
	 	$smarty->assign("no_spk_p8_date_upload",$data['no_spk_p8_date_upload']);
	 	$smarty->assign("no_spk_p8_date_edit",$data['no_spk_p8_date_edit']);
	 	$smarty->assign("no_spk_p8_date_delete",$data['no_spk_p8_date_delete']);
	 	$smarty->assign("surat_kesanggupan_file",$data['surat_kesanggupan_file']);
	 	$smarty->assign("surat_kesanggupan_date_upload",$data['surat_kesanggupan_date_upload']);
	 	$smarty->assign("surat_kesanggupan_date_edit",$data['surat_kesanggupan_date_edit']);
	 	$smarty->assign("surat_kesanggupan_date_delete",$data['surat_kesanggupan_date_delete']);
	 	$smarty->assign("contract_number_file",$data['contract_number_file']);
	 	$smarty->assign("contract_number_date_upload",$data['contract_number_date_upload']);
	 	$smarty->assign("contract_number_date_edit",$data['contract_number_date_edit']);
	 	$smarty->assign("contract_number_date_delete",$data['contract_number_date_delete']);
	 	$smarty->assign("bast_file",$data['bast_file']);
	 	$smarty->assign("bast_date_upload",$data['bast_date_upload']);
	 	$smarty->assign("bast_date_edit",$data['bast_date_edit']);
	 	$smarty->assign("bast_date_delete",$data['bast_date_delete']);
	 	$smarty->assign("baso_file",$data['baso_file']);
	 	$smarty->assign("baso_date_upload",$data['baso_date_upload']);
	 	$smarty->assign("baso_date_edit",$data['baso_date_edit']);
	 	$smarty->assign("baso_date_delete",$data['baso_date_delete']);
	 	$smarty->assign("account_no",$data['account_no']);
	 	$smarty->assign("sid",$data['sid']);
	 	$smarty->assign("cid",$data['cid']);
	 	$smarty->assign("start_date",$data['mulai']);
	 	$smarty->assign("ending_date",$data['akhir']);
	 	$smarty->assign("masa_kontrak",$data['masa_kontrak']);
	 	$smarty->assign("account_manager",$data['account_manager']);
	 	$smarty->assign("email",$data['email']);
	 	$smarty->assign("phone",$data['phone']);
	 	$smarty->assign("otc",$data['otc']);
	 	$smarty->assign("monthly",$data['monthly']);
	 	 
	 
	 	$smarty->assign("contract_status_opt",$data['contract_status_opt']);

 
  	 	 
	 	$cont_status_opt = $this->cont_status_opt($data['contract_status_opt']);
		$smarty->assign("cont_status_opt",$cont_status_opt);
		 

		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
	 
		$smarty->display("pdct_contract_detail_edit.tpl");
	 	}

	 	function DetailContractProUpdate(){
	 	global $title,$db,$footer;
	 	include "fn_str.php";
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$id = protect($_POST['id']);
		$idcust = protect($_POST['idcust']);
	  
	 
	 	
	 	$name_contract_level =  protect($_POST['name_contract_level']);
		$val_contract_level = protect($_POST['val_contract_level']);

		if($val_contract_level == ""){
			$cval_contract_level = ' ';
		}else{
			$cval_contract_level = $val_contract_level;
		}

		$contract_level = $name_contract_level." ".$val_contract_level;
	 	$site_code = protect($_POST['site_code']);
	 	$nama_pekerjaan = protect($_POST['nama_pekerjaan']);

		$no_spk = $_FILES['no_spk']['name'];
		$sno_spk = $_FILES['no_spk']['size'];
 		$vno_spk = end(explode('.', $no_spk));

		$surat_kesanggupan = $_FILES['surat_kesanggupan']['name'];
		$sizesurat_kesanggupan = $_FILES['surat_kesanggupan']['size'];
		$vsurat_kesanggupan = end(explode('.', $surat_kesanggupan));

		$contract_number = $_FILES['contract_number']['name'];
		$scontract_number = $_FILES['contract_number']['size'];
		$vcontract_number = end(explode('.', $contract_number));
		$contract_date = date('Y-m-d',strtotime($_POST['contract_date']));
		$bast = $_FILES['bast']['name'];
		$sbast = $_FILES['bast']['size'];
		$vbast = end(explode('.', $bast));

		$baso = $_FILES['baso']['name'];
		$sbaso = $_FILES['baso']['size'];
		$vbaso = end(explode('.', $baso));

		$acc_no = protect($_POST['acc_no']);
		$sid = protect($_POST['sid']);
		$cid = protect($_POST['cid']);
		$starting = date('Y-m-d',strtotime($_POST['starting']));
		 
		$ending = date('Y-m-d',strtotime($_POST['ending']));
		 
		$masa_kontrak = protect($_POST['masa_kontrak']);
		$contract_status = protect($_POST['contract_status']);
		$acc_manager = protect($_POST['acc_manager']);
		$email = protect($_POST['email']);
		$phone = protect($_POST['phone']);
		$otc = clean_string_num($_POST['otc']);
		$monthly = clean_string_num($_POST['monthly']);
		$total = $monthly*$masa_kontrak+$otc;
 
		/* 
		echo $id .'-'. $idcust .'-'. $cont_level .'-'. $no_spk .'-'. $surat_kesanggupan .'-'. $contract_number
		.'-'. $bast .'-'. $baso .'-'. $acc_no .'-'. $sid .'-'. $cid .'-'. $starting .'-'. $ending
		.'-'. $masa_kontrak .'-'. $acc_manager .'-'. $email .'-'. $phone .'-'. $otc .'-'. $monthly
		.'-'. $end_usera .'-'. $bill_period .'-'. $fpno .'-'. $bill .'-'. $paid .'-'. $charges ; 
		*/
  
  		if($ending <= $starting){
	 		 	 		
	 		echo "<script language=javascript>
	                    alert('Tanggal Akhir Tidak Boleh Lebih Kecil atau Sama Dengan Tanggal Mulai!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
	                     

			} 
			
							//00000 //0
				if(empty($no_spk) && empty($surat_kesanggupan) && empty($contract_number) && empty($bast) && empty($baso)){
				
						if(strtotime($ending) < strtotime($starting) || strtotime($ending) == strtotime($starting) ){

						}

						$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								account_no = '$acc_no', sid = '$sid', cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',
								contract_status_opt = '$contract_status',account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', 
								monthly = '$monthly',total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";
					  
				//x0000 //1
				}else if(!empty($no_spk) && empty($surat_kesanggupan) && empty($contract_number) && empty($bast) && empty($baso)){
					echo "spk 0 0 0 0";

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	//validasi  
					if(in_array($vno_spk,$extensi)){
						 

					$sql = "update pdct_contract set contract_level = '$contract_level',site_code = '$site_code', nama_pekerjaan = '$nama_pekerjaan',
							no_spk_p8_file = '$no_spk', no_spk_p8_date_edit = now(), no_spk_p8_who_edit = '$_SESSION[username]',account_no = '$acc_no', sid = '$sid', 
							cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',contract_status_opt = '$contract_status',
							account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', monthly = '$monthly',
							total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";

							move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
						 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

						$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								no_spk_p8_file = '$no_spk', no_spk_p8_date_edit = now(), no_spk_p8_who_edit = '$_SESSION[username]',account_no = '$acc_no', sid = '$sid', 
								cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',contract_status_opt = '$contract_status',
								account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', monthly = '$monthly',
								total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";

						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);

				//xx000 //2
				}elseif (!empty($no_spk) && !empty($surat_kesanggupan) && empty($contract_number) && empty($bast) && empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	//validasi  
					if(in_array($vno_spk,$extensi) && in_array($vsurat_kesanggupan, $extensi)){
						 

						$sql = "update pdct_contract set contract_level = '$contract_level',site_code = '$site_code', nama_pekerjaan = '$nama_pekerjaan',
								no_spk_p8_file = '$no_spk', no_spk_p8_date_edit = now(), no_spk_p8_who_edit = '$_SESSION[username]', surat_kesanggupan_file = '$surat_kesanggupan',
								surat_kesanggupan_date_edit = now(), surat_kesanggupan_who_edit = '$_SESSION[username]', account_no = '$acc_no', sid = '$sid', 
								cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',contract_status_opt = '$contract_status',
								account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', monthly = '$monthly',
								total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//xxxxx //5
				}else if(!empty($no_spk) && !empty($surat_kesanggupan) && !empty($contract_number) && !empty($bast) && !empty($baso)){
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vsurat_kesanggupan, $extensi) && in_array($vcontract_number, $extensi) && in_array($vbast, $extensi) && in_array($vbaso, $extensi)){
					 

						$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								no_spk_p8_file = '$no_spk', no_spk_p8_date_edit = now(), no_spk_p8_who_edit = '$_SESSION[username]', surat_kesanggupan_file = '$surat_kesanggupan',
								surat_kesanggupan_date_edit = now(), surat_kesanggupan_who_edit = '$_SESSION[username]', contract_number_file = '$contract_number',
								contract_number_date_edit = now() , contract_number_who_edit = '$_SESSION[username]',
								bast_file = '$bast', bast_date_edit = now(), bast_who_edit = '$_SESSION[username]', baso_file = '$baso', 
								baso_date_edit = now(), baso_who_edit = '$_SESSION[username]',account_no = '$acc_no', sid = '$sid', 
								cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',contract_status_opt = '$contract_status',
								account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', monthly = '$monthly',
								total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";


 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				//0x000 //2
				}elseif (empty($no_spk) && !empty($surat_kesanggupan) && empty($contract_number) && empty($bast) && empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vsurat_kesanggupan, $extensi)){
						 

						$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								surat_kesanggupan_file = '$surat_kesanggupan', surat_kesanggupan_date_edit = now(), surat_kesanggupan_who_edit = '$_SESSION[username]',
								account_no = '$acc_no', sid = '$sid', cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',
								contract_status_opt = '$contract_status',account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', monthly = '$monthly',
								total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";

 						 
						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						 

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				//xxx00 //3	
				}elseif (!empty($no_spk) && !empty($surat_kesanggupan) && !empty($contract_number) && empty($bast) && empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vsurat_kesanggupan, $extensi) && in_array($vcontract_number, $extensi)){
						 

					$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								no_spk_p8_file = '$no_spk', no_spk_p8_date_edit = now(), no_spk_p8_who_edit = '$_SESSION[username]', surat_kesanggupan_file = '$surat_kesanggupan',
								surat_kesanggupan_date_edit = now(), surat_kesanggupan_who_edit = '$_SESSION[username]', contract_number_file = '$contract_number',
								contract_number_date_edit = now() , contract_number_who_edit = '$_SESSION[username]',
								account_no = '$acc_no', sid = '$sid', cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',
								contract_status_opt = '$contract_status',account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', monthly = '$monthly',
								total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
					 

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//0xx00 //3
				}elseif (empty($no_spk) && !empty($surat_kesanggupan) && !empty($contract_number) && empty($bast) && empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vsurat_kesanggupan, $extensi) && in_array($vcontract_number, $extensi)){
						 

						$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								surat_kesanggupan_file = '$surat_kesanggupan',surat_kesanggupan_date_edit = now(), surat_kesanggupan_who_edit = '$_SESSION[username]', 
								contract_number_file = '$contract_number',contract_number_date_edit = now() , contract_number_who_edit = '$_SESSION[username]',
								account_no = '$acc_no', sid = '$sid', cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',
								contract_status_opt = '$contract_status', account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', 
								monthly = '$monthly', total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";

 						 
						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						 

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//00x00 //3	
				}elseif (empty($no_spk) && empty($surat_kesanggupan) && !empty($contract_number) && empty($bast) && empty($baso)) {
				 
					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vcontract_number, $extensi)){
						 
						$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								contract_number_file = '$contract_number', contract_number_date_edit = now() , contract_number_who_edit = '$_SESSION[username]',
								account_no = '$acc_no', sid = '$sid', cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',
								contract_status_opt = '$contract_status', account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', monthly = '$monthly',
								total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";

 						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}				

				//x0x00 //3
				}elseif (!empty($no_spk) && empty($surat_kesanggupan) && !empty($contract_number) && empty($bast) && empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vcontract_number, $extensi)){
						 
						$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								no_spk_p8_file = '$no_spk', no_spk_p8_date_edit = now(), no_spk_p8_who_edit = '$_SESSION[username]', contract_number_file = '$contract_number',
								contract_number_date_edit = now() , contract_number_who_edit = '$_SESSION[username]',account_no = '$acc_no', sid = '$sid', 
								cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',contract_status_opt = '$contract_status',
								account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', monthly = '$monthly',
								total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
 						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
 					
 					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}				

				//0x000 //3
				}elseif (empty($no_spk) && !empty($surat_kesanggupan) && empty($contract_number) && empty($bast) && empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vsurat_kesanggupan, $extensi)){
					 
						$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								surat_kesanggupan_file = '$surat_kesanggupan',	surat_kesanggupan_date_edit = now(), surat_kesanggupan_who_edit = '$_SESSION[username]', 
								account_no = '$acc_no', sid = '$sid', cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',
								contract_status_opt = '$contract_status',account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', monthly = '$monthly',
								total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";


 						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//xxxx0 //4
				}elseif (!empty($no_spk) && !empty($surat_kesanggupan) && !empty($contract_number) && !empty($bast) && empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vsurat_kesanggupan, $extensi) && in_array($vcontract_number, $extensi) && in_array($vbast, $extensi)){
						 
						$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								no_spk_p8_file = '$no_spk', no_spk_p8_date_edit = now(), no_spk_p8_who_edit = '$_SESSION[username]', surat_kesanggupan_file = '$surat_kesanggupan',
								surat_kesanggupan_date_edit = now(), surat_kesanggupan_who_edit = '$_SESSION[username]', contract_number_file = '$contract_number',
								contract_number_date_edit = now() , contract_number_who_edit = '$_SESSION[username]',
								bast_file = '$bast', bast_date_edit = now(), bast_who_edit = '$_SESSION[username]',account_no = '$acc_no', sid = '$sid', 
								cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',contract_status_opt = '$contract_status',
								account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', monthly = '$monthly',
								total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//0xxx0 //4		
				}elseif (empty($no_spk) && !empty($surat_kesanggupan) && !empty($contract_number) && !empty($bast) && empty($baso)) {
			 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vsurat_kesanggupan, $extensi) && in_array($vcontract_number, $extensi) && in_array($vbast, $extensi)){
	 					
						$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								surat_kesanggupan_file = '$surat_kesanggupan',surat_kesanggupan_date_edit = now(), surat_kesanggupan_who_edit = '$_SESSION[username]',
								contract_number_file = '$contract_number', contract_number_date_edit = now() , contract_number_who_edit = '$_SESSION[username]',
								bast_file = '$bast', bast_date_edit = now(), bast_who_edit = '$_SESSION[username]',account_no = '$acc_no', sid = '$sid', 
								cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',contract_status_opt = '$contract_status',
								account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', monthly = '$monthly',
								total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";


 						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//00xx0 //4
				}elseif (empty($no_spk) && empty($surat_kesanggupan) && !empty($contract_number) && !empty($bast) && empty($baso)) {
			 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vcontract_number, $extensi) && in_array($vbast, $extensi)){
					 
						$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								contract_number_file = '$contract_number',contract_number_date_edit = now() , contract_number_who_edit = '$_SESSION[username]',
								bast_file = '$bast', bast_date_edit = now(), bast_who_edit = '$_SESSION[username]', account_no = '$acc_no', sid = '$sid', 
								cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',contract_status_opt = '$contract_status',
								account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', monthly = '$monthly',
								total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";


 						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//000x0 //4	
				}elseif (empty($no_spk) && empty($surat_kesanggupan) && empty($contract_number) && !empty($bast) && empty($baso)) {
			 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vbast, $extensi)){
				 
						$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								bast_file = '$bast', bast_date_edit = now(), bast_who_edit = '$_SESSION[username]', account_no = '$acc_no', sid = '$sid', 
								cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',contract_status_opt = '$contract_status',
								account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', monthly = '$monthly',
								total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";


 						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}				
				//x00x0 //4
				}elseif (!empty($no_spk) && empty($surat_kesanggupan) && empty($contract_number) && !empty($bast) && empty($baso)) {
				 
					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vbast, $extensi)){
					 
						$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								no_spk_p8_file = '$no_spk', no_spk_p8_date_edit = now(), no_spk_p8_who_edit = '$_SESSION[username]',bast_file = '$bast', bast_date_edit = now(),
								bast_who_edit = '$_SESSION[username]', account_no = '$acc_no', sid = '$sid', cid = '$cid', start_date = '$starting', ending_date = '$ending', 
								masa_kontrak = '$masa_kontrak',contract_status_opt = '$contract_status',account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', 
								monthly = '$monthly',total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";


 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
					 	move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
						 

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//xx0x0 //4
				}elseif (!empty($no_spk) && !empty($surat_kesanggupan) && empty($contract_number) && !empty($bast) && empty($baso)) {
		 
					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vsurat_kesanggupan, $extensi) && in_array($vbast, $extensi)){
					 
						$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								no_spk_p8_file = '$no_spk', no_spk_p8_date_edit = now(), no_spk_p8_who_edit = '$_SESSION[username]', surat_kesanggupan_file = '$surat_kesanggupan',
								surat_kesanggupan_date_edit = now(), surat_kesanggupan_who_edit = '$_SESSION[username]',bast_file = '$bast', bast_date_edit = now(), 
								bast_who_edit = '$_SESSION[username]',account_no = '$acc_no', sid = '$sid', cid = '$cid', start_date = '$starting', ending_date = '$ending', 
								masa_kontrak = '$masa_kontrak',contract_status_opt = '$contract_status',account_manager = '$acc_manager', email = '$email', phone = '$phone',
								otc = '$otc', monthly = '$monthly',	total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";


 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
 						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}			
				//0x0x0 //4
				}elseif (empty($no_spk) && !empty($surat_kesanggupan) && empty($contract_number) && !empty($bast) && empty($baso)) {
 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vsurat_kesanggupan, $extensi) && in_array($vbast, $extensi)){
				 
						$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								surat_kesanggupan_file = '$surat_kesanggupan', surat_kesanggupan_date_edit = now(), surat_kesanggupan_who_edit = '$_SESSION[username]',  
								bast_file = '$bast', bast_date_edit = now(), bast_who_edit = '$_SESSION[username]', account_no = '$acc_no', sid = '$sid', 
								cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',contract_status_opt = '$contract_status',
								account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', monthly = '$monthly',
								total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";


 						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
 						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//x0xx0 //4
				}elseif (!empty($no_spk) && empty($surat_kesanggupan) && !empty($contract_number) && !empty($bast) && empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vcontract_number, $extensi) && in_array($vbast, $extensi)){
				 
						$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								no_spk_p8_file = '$no_spk', no_spk_p8_date_edit = now(), no_spk_p8_who_edit = '$_SESSION[username]', contract_number_file = '$contract_number',
								contract_number_date_edit = now() , contract_number_who_edit = '$_SESSION[username]',bast_file = '$bast', bast_date_edit = now(), 
								bast_who_edit = '$_SESSION[username]',account_no = '$acc_no', sid = '$sid', cid = '$cid', start_date = '$starting', ending_date = '$ending',
								masa_kontrak = '$masa_kontrak',contract_status_opt = '$contract_status',account_manager = '$acc_manager', email = '$email', phone = '$phone', 
								otc = '$otc', monthly = '$monthly', total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";


 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
 						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				//0000x //5
				}elseif (empty($no_spk) && empty($surat_kesanggupan) && empty($contract_number) && empty($bast) && !empty($baso)) {
			 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vbaso, $extensi)){
						 
						$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								baso_file = '$baso', baso_date_edit = now(), baso_who_edit = '$_SESSION[username]',account_no = '$acc_no', sid = '$sid', 
								cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',contract_status_opt = '$contract_status',
								account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', monthly = '$monthly',
								total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";

 						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//000xx //5	
				}elseif (empty($no_spk) && empty($surat_kesanggupan) && empty($contract_number) && !empty($bast) && !empty($baso)) {
	 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vbast, $extensi) && in_array($vbaso, $extensi)){
						 
						$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								bast_file = '$bast', bast_date_edit = now(), bast_who_edit = '$_SESSION[username]', baso_file = '$baso', 
								baso_date_edit = now(), baso_who_edit = '$_SESSION[username]',account_no = '$acc_no', sid = '$sid', 
								cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',contract_status_opt = '$contract_status',
								account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', monthly = '$monthly',
								total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";

 						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//00xxx //5	
				}elseif (empty($no_spk) && empty($surat_kesanggupan) && !empty($contract_number) && !empty($bast) && !empty($baso)) {
 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vcontract_number, $extensi) && in_array($vbast, $extensi) && in_array($vbaso, $extensi)){
					
						$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								contract_number_file = '$contract_number', contract_number_date_edit = now() , contract_number_who_edit = '$_SESSION[username]',
								bast_file = '$bast', bast_date_edit = now(), bast_who_edit = '$_SESSION[username]', baso_file = '$baso', 
								baso_date_edit = now(), baso_who_edit = '$_SESSION[username]',account_no = '$acc_no', sid = '$sid', 
								cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',contract_status_opt = '$contract_status',
								account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', monthly = '$monthly',
								total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";


 						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				//0xxxx //5					
				}elseif (empty($no_spk) && !empty($surat_kesanggupan) && !empty($contract_number) && !empty($bast) && !empty($baso)) {
 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vsurat_kesanggupan, $extensi) && in_array($vcontract_number, $extensi) && in_array($vbast, $extensi) && in_array($vbaso, $extensi)){
					 
							$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								surat_kesanggupan_file = '$surat_kesanggupan',surat_kesanggupan_date_edit = now(), surat_kesanggupan_who_edit = '$_SESSION[username]', 
								contract_number_file = '$contract_number', contract_number_date_edit = now() , contract_number_who_edit = '$_SESSION[username]',
								bast_file = '$bast', bast_date_edit = now(), bast_who_edit = '$_SESSION[username]', baso_file = '$baso', 
								baso_date_edit = now(), baso_who_edit = '$_SESSION[username]',account_no = '$acc_no', sid = '$sid', 
								cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',contract_status_opt = '$contract_status',
								account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', monthly = '$monthly',
								total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";


 						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				//0xx0x //5	
				}elseif (empty($no_spk) && !empty($surat_kesanggupan) && !empty($contract_number) && empty($bast) && !empty($baso)) {
 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vsurat_kesanggupan, $extensi) && in_array($vcontract_number, $extensi) && in_array($vbaso, $extensi)){
						 
						$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								surat_kesanggupan_file = '$surat_kesanggupan',surat_kesanggupan_date_edit = now(), surat_kesanggupan_who_edit = '$_SESSION[username]',
								contract_number_file = '$contract_number', contract_number_date_edit = now() , contract_number_who_edit = '$_SESSION[username]',
								baso_file = '$baso', baso_date_edit = now(), baso_who_edit = '$_SESSION[username]',account_no = '$acc_no', sid = '$sid', 
								cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',contract_status_opt = '$contract_status',
								account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', monthly = '$monthly',
								total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";


 						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
 						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				
				//xxx0x //5
				}elseif (!empty($no_spk) && !empty($surat_kesanggupan) && !empty($contract_number) && empty($bast) && !empty($baso)) {
			 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vsurat_kesanggupan, $extensi) && in_array($vcontract_number, $extensi) && in_array($vbaso, $extensi)){
						 
						$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								no_spk_p8_file = '$no_spk', no_spk_p8_date_edit = now(), no_spk_p8_who_edit = '$_SESSION[username]', surat_kesanggupan_file = '$surat_kesanggupan',
								surat_kesanggupan_date_edit = now(), surat_kesanggupan_who_edit = '$_SESSION[username]', contract_number_file = '$contract_number',
								contract_number_date_edit = now() , contract_number_who_edit = '$_SESSION[username]',baso_file = '$baso', baso_date_edit = now(), baso_who_edit = '$_SESSION[username]',
								account_no = '$acc_no', sid = '$sid', cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',contract_status_opt = '$contract_status',
								account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', monthly = '$monthly',
								total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";


 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
 						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				//x0x0x //5
				}elseif (!empty($no_spk) && empty($surat_kesanggupan) && !empty($contract_number) && empty($bast) && !empty($baso)) {
				 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vcontract_number, $extensi) && in_array($vbaso, $extensi)){
					 
						$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								no_spk_p8_file = '$no_spk', no_spk_p8_date_edit = now(), no_spk_p8_who_edit = '$_SESSION[username]', contract_number_file = '$contract_number',
								contract_number_date_edit = now() , contract_number_who_edit = '$_SESSION[username]',baso_file = '$baso', baso_date_edit = now(),
								baso_who_edit = '$_SESSION[username]',account_no = '$acc_no', sid = '$sid', cid = '$cid', start_date = '$starting', ending_date = '$ending',
								masa_kontrak = '$masa_kontrak',contract_status_opt = '$contract_status',account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', 
								monthly = '$monthly', total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";


 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
 						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
 						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				//x0xxx //5
				}elseif (!empty($no_spk) && empty($surat_kesanggupan) && !empty($contract_number) && !empty($bast) && !empty($baso)) {
		 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vcontract_number, $extensi) && in_array($vbast, $extensi) && in_array($vbaso, $extensi)){
					 
						$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								no_spk_p8_file = '$no_spk', no_spk_p8_date_edit = now(), no_spk_p8_who_edit = '$_SESSION[username]', contract_number_file = '$contract_number',
								contract_number_date_edit = now() , contract_number_who_edit = '$_SESSION[username]',
								bast_file = '$bast', bast_date_edit = now(), bast_who_edit = '$_SESSION[username]', baso_file = '$baso', 
								baso_date_edit = now(), baso_who_edit = '$_SESSION[username]',account_no = '$acc_no', sid = '$sid', 
								cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',contract_status_opt = '$contract_status',
								account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', monthly = '$monthly',
								total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";


 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
 						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				//x00xx //5
				}elseif (!empty($no_spk) && empty($surat_kesanggupan) && empty($contract_number) && !empty($bast) && !empty($baso)) {
		 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vbast, $extensi) && in_array($vbaso, $extensi)){
	 
						$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								no_spk_p8_file = '$no_spk', no_spk_p8_date_edit = now(), no_spk_p8_who_edit = '$_SESSION[username]',bast_file = '$bast', 
								bast_date_edit = now(), bast_who_edit = '$_SESSION[username]', baso_file = '$baso', baso_date_edit = now(), baso_who_edit = '$_SESSION[username]',
								account_no = '$acc_no', sid = '$sid', cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',
								contract_status_opt = '$contract_status',account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', monthly = '$monthly',
								total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
 						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				//x000x //5
				}elseif (!empty($no_spk) && empty($surat_kesanggupan) && empty($contract_number) && empty($bast) && !empty($baso)) {
			 
					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vbaso, $extensi)){
						 
						$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								no_spk_p8_file = '$no_spk', no_spk_p8_date_edit = now(), no_spk_p8_who_edit = '$_SESSION[username]', baso_file = '$baso', 
								baso_date_edit = now(), baso_who_edit = '$_SESSION[username]',account_no = '$acc_no', sid = '$sid', 
								cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',contract_status_opt = '$contract_status',
								account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', monthly = '$monthly',
								total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";


 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
 						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//xx00x //5
				}elseif (!empty($no_spk) && !empty($surat_kesanggupan) && empty($contract_number) && empty($bast) && !empty($baso)) {
 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vsurat_kesanggupan, $extensi) && in_array($vbaso, $extensi)){
						 
						$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								no_spk_p8_file = '$no_spk', no_spk_p8_date_edit = now(), no_spk_p8_who_edit = '$_SESSION[username]', surat_kesanggupan_file = '$surat_kesanggupan',
								surat_kesanggupan_date_edit = now(), surat_kesanggupan_who_edit = '$_SESSION[username]', baso_file = '$baso', 
								baso_date_edit = now(), baso_who_edit = '$_SESSION[username]',account_no = '$acc_no', sid = '$sid', 
								cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',contract_status_opt = '$contract_status',
								account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', monthly = '$monthly',
								total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";


 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
 						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//00x0x //5	
				}elseif (empty($no_spk) && empty($surat_kesanggupan) && !empty($contract_number) && empty($bast) && !empty($baso)) {
			 

					$extensi = array("pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vcontract_number, $extensi) && in_array($vbaso, $extensi)){
 
						$sql = "update pdct_contract set site_code = '$site_code', contract_level = '$contract_level', nama_pekerjaan = '$nama_pekerjaan',
								contract_number_file = '$contract_number',contract_number_date_edit = now() , contract_number_who_edit = '$_SESSION[username]',
								baso_file = '$baso', baso_date_edit = now(), baso_who_edit = '$_SESSION[username]',account_no = '$acc_no', sid = '$sid', 
								cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',contract_status_opt = '$contract_status',
								account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', monthly = '$monthly',
								total = '$total',user_edit = '$_SESSION[username]', date_edit = now() where id = '$id' AND id_customer = '$idcust'";


 						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
 						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				}

		
			//echo $sql;
			//exit();
			
			$exsql = $db->Execute($sql);
			if($exsql){
			 
			  echo "<script language=javascript>
	                    alert('Berhasil Merubah Data');
	                    window.location='master_pdct.php?idcust=$idcust&act=DetailContract';
	                 </script>";
			}else{
				  echo "<script language=javascript>
	                    alert('Maaf, Gagal Merubah Data');
	                    window.location='master_pdct.php?idcust=$idcust&act=DetailContract';
	                 </script>";
			}
	 

	 	}

	 	function UnlinkFileSPK(){
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
		include "fn_rupiah.php";
		$moneyFormat = new moneyFormat();
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;	

		$id = $_GET['id'];
		$idcust = $_GET['idcust'];

		//get file SPK
		$sql = "select * from pdct_contract where id = '$id' and id_customer = '$idcust'";
		$exsql = $db->Execute($sql);
		$fetch = $exsql->FetchRow();

		$spkfiles = $fetch['no_spk_p8_file'];

		unlink("doc_uploads/spk/".$spkfiles);

		$sqlhapusfile = "update pdct_contract set no_spk_p8_file = '', no_spk_p8_date_delete = now(), no_spk_p8_who_delete = '$_SESSION[username]' where id = '$id' and id_customer = '$idcust'";
		$exsqlhapusfile = $db->Execute($sqlhapusfile);

		    if($exsqlhapusfile){
			 
			  	echo "<script language=javascript>
	            alert('Surat Pernyataan Kesanggupan SPK P8 File Dihapus');
	            window.location='master_pdct.php?id=$id&act=DetailContractUpdate&idcust=$idcust';
	            </script>";
			}else{
				echo "<script language=javascript>
	            alert('Surat Pernyataan Kesanggupan SPK P8 File Tidak Dapat Dihapus');
	            window.location='master_pdct.php?id=$id&act=DetailContractUpdate&idcust=$idcust';
	            </script>";
			}

		}

		function UnlinkFileFPNO(){
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
		include "fn_rupiah.php";
		$moneyFormat = new moneyFormat();
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;	

		$id = $_GET['id'];
		$idcust = $_GET['idcust'];
		$idcontract = $_GET['idcontract'];

		//get file FPNO
		$sql = "select * from pdct_billing where id = '$id' and id_contract = '$idcontract' and id_customer = '$idcust'";
		$exsql = $db->Execute($sql);
		$fetch = $exsql->FetchRow();

		$fpnofiles = $fetch['fp_no_file'];

		unlink("doc_uploads/fp_no/".$fpnofiles);

		$sqlhapusfile = "update pdct_billing set fp_no_file = '', fp_no_date_delete = now(), fp_no_who_delete = '$_SESSION[username]' where id = '$id' and id_contract = '$idcontract' and id_customer = '$idcust'";
		$exsqlhapusfile = $db->Execute($sqlhapusfile);

 		    if($exsqlhapusfile){
			 
 		    echo "<script language=javascript>
            alert('Surat Fp.No Dihapus');
	     	window.location='master_pdct.php?act=DetailBillingUpdate&id=$id&idcust=$idcust&idcont=$idcontract';
	            </script>";
			}else{
			echo "<script language=javascript>
	        alert('Surat Fp.No Tidak Dapat Dihapus');
	        window.location='master_pdct.php?act=DetailBillingUpdate&id=$id&idcust=$idcust&idcont=$idcontract';
	            </script>";
			}

		}


		function UnlinkFileSK(){
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
		include "fn_rupiah.php";
		$moneyFormat = new moneyFormat();
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;	

		$id = $_GET['id'];
		$idcust = $_GET['idcust'];

		//get file SK
		$sql = "select * from pdct_contract where id = '$id' and id_customer = '$idcust'";
		$exsql = $db->Execute($sql);
		$fetch = $exsql->FetchRow();

		$skfiles = $fetch['surat_kesanggupan_file'];

		unlink("doc_uploads/sk/".$skfiles);

		$sqlhapusfile = "update pdct_contract set surat_kesanggupan_file = '', surat_kesanggupan_date_delete = now(), surat_kesanggupan_who_delete = '$_SESSION[username]' where id = '$id' and id_customer = '$idcust'";
		$exsqlhapusfile = $db->Execute($sqlhapusfile);

		    if($exsqlhapusfile){
			 
			  	echo "<script language=javascript>
	            alert('Surat Kesanggupan File Dihapus');
	            window.location='master_pdct.php?id=$id&act=DetailContractUpdate&idcust=$idcust';
	            </script>";
			}else{
				echo "<script language=javascript>
	            alert('Surat Kesanggupan File Tidak Dapat Dihapus');
	            window.location='master_pdct.php?id=$id&act=DetailContractUpdate&idcust=$idcust';
	            </script>";
			}

		}

		function UnlinkFileCN(){
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
		include "fn_rupiah.php";
		$moneyFormat = new moneyFormat();
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;	

		$id = $_GET['id'];
		$idcust = $_GET['idcust'];

		//get file CN
		$sql = "select * from pdct_contract where id = '$id' and id_customer = '$idcust'";
		$exsql = $db->Execute($sql);
		$fetch = $exsql->FetchRow();

		$cnfiles = $fetch['contract_number_file'];

		unlink("doc_uploads/cn/".$cnfiles);

		$sqlhapusfile = "update pdct_contract set contract_number_file = '', contract_number_date_delete = now(), contract_number_who_delete = '$_SESSION[username]' where id = '$id' and id_customer = '$idcust'";
		$exsqlhapusfile = $db->Execute($sqlhapusfile);

		    if($exsqlhapusfile){
			 
			  	echo "<script language=javascript>
	            alert('Contract Number File Dihapus');
	            window.location='master_pdct.php?id=$id&act=DetailContractUpdate&idcust=$idcust';
	            </script>";
			}else{
				echo "<script language=javascript>
	            alert('Contract Number File Tidak Dapat Dihapus');
	            window.location='master_pdct.php?id=$id&act=DetailContractUpdate&idcust=$idcust';
	            </script>";
			}

		}


		function UnlinkFileBAST(){
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
		include "fn_rupiah.php";
		$moneyFormat = new moneyFormat();
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;	

		$id = $_GET['id'];
		$idcust = $_GET['idcust'];

		//get file BAST
		$sql = "select * from pdct_contract where id = '$id' and id_customer = '$idcust'";
		$exsql = $db->Execute($sql);
		$fetch = $exsql->FetchRow();

		$bastfiles = $fetch['bast_file'];

		unlink("doc_uploads/bast/".$bastfiles);

		$sqlhapusfile = "update pdct_contract set bast_file = '', bast_date_delete = now(), bast_who_delete = '$_SESSION[username]' where id = '$id' and id_customer = '$idcust'";
		$exsqlhapusfile = $db->Execute($sqlhapusfile);

		    if($exsqlhapusfile){
			 
			  	echo "<script language=javascript>
	            alert('BAST File Dihapus');
	            window.location='master_pdct.php?id=$id&act=DetailContractUpdate&idcust=$idcust';
	            </script>";
			}else{
				echo "<script language=javascript>
	            alert('BAST File Tidak Dapat Dihapus');
	            window.location='master_pdct.php?id=$id&act=DetailContractUpdate&idcust=$idcust';
	            </script>";
			}

		}

		function UnlinkFileBASO(){
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
		include "fn_rupiah.php";
		$moneyFormat = new moneyFormat();
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;	

		$id = $_GET['id'];
		$idcust = $_GET['idcust'];

		//get file BASO
		$sql = "select * from pdct_contract where id = '$id' and id_customer = '$idcust'";
		$exsql = $db->Execute($sql);
		$fetch = $exsql->FetchRow();

		$basofiles = $fetch['baso_file'];

		unlink("doc_uploads/baso/".$basofiles);

		$sqlhapusfile = "update pdct_contract set baso_file = '', baso_date_delete = now(), baso_who_delete = '$_SESSION[username]' where id = '$id' and id_customer = '$idcust'";
		$exsqlhapusfile = $db->Execute($sqlhapusfile);

		    if($exsqlhapusfile){
			 
			  	echo "<script language=javascript>
	            alert('BASO File Dihapus');
	            window.location='master_pdct.php?id=$id&act=DetailContractUpdate&idcust=$idcust';
	            </script>";
			}else{
				echo "<script language=javascript>
	            alert('BASO File Tidak Dapat Dihapus');
	            window.location='master_pdct.php?id=$id&act=DetailContractUpdate&idcust=$idcust';
	            </script>";
			}

		}

	 	function DetailContractDelete(){
	 	global $title,$db,$footer;
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$id = $_GET['id'];
		$idcust = $_GET['idcust'];

		//get data file billing upload

 		$sqlfilebilling = "select * from pdct_billing where id_contract = '$id' and id_customer = '$idcust'";
		$exsqlfilebilling = $db->Execute($sqlfilebilling);
		while($rowfiles = $exsqlfilebilling->FetchRow()){

			if(empty($rowfiles['fp_no_file'])){
			}else{
			 unlink("doc_uploads/fp_no/".$rowfiles['fp_no_file']);
			}
			
		 	 
		}	

		//exit();
		 

		//delete data on database billing
 
		$sqlbillingdel = "delete from pdct_billing where id_contract = '$id' and id_customer = '$idcust'";
		$exsqlbillingdel = $db->Execute($sqlbillingdel);

	 


		//ambil data file contract upload 
 		$sqlupload = "select * from pdct_contract where id = '$id' AND id_customer = '$idcust'";
 		$exsqlupload = $db->Execute($sqlupload);
 		$dataupload = $exsqlupload->FetchRow();

 				//00000 //0
				if(empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && empty($dataupload['baso_file'])){
				
				//x0000 //1
				}else if(!empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && empty($dataupload['baso_file'])){
				
				unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);
		 		 
				//xx000 //2
				}elseif (!empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
				
				unlink("doc]l_uploads/spk/".$dataupload['no_spk_p8_file']);
		 		unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 	 
				//xxxxx //5
				}else if(!empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && !empty($dataupload['baso_file'])){
				
				unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);
		 		unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 		unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		unlink("doc_uploads/bast/".$dataupload['bast_file']);
		 		unlink("doc_uploads/baso/".$dataupload['baso_file']);

				//0x000 //2
				}else if (empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
								 
		 		unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 	
				//xxx00 //3	
				}elseif (!empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
				
				unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);
		 		unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 		unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		 
				//0xx00 //3
				}elseif (empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
	 				 		 
		 		unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 		unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		 
	 			//00x00 //3	
				}elseif (empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
				
			 	unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		 
				//x0x00 //3
				}elseif (!empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
				
				unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);
		 		unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		
				//0x000 //3
				}elseif (empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
				
				unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 		 
				//xxxx0 //4
				}elseif (!empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
				
				unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);
		 		unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 		unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		unlink("doc_uploads/bast/".$dataupload['bast_file']);
		 		 
				//0xxx0 //4		
				}elseif (empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
								 
		 		unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 		unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		unlink("doc_uploads/bast/".$dataupload['bast_file']);
		 		 
				//00xx0 //4
				}elseif (empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
				
			 	unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		unlink("doc_uploads/bast/".$dataupload['bast_file']);
		 		 
				//000x0 //4	
				}elseif (empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
				
			 	unlink("doc_uploads/bast/".$dataupload['bast_file']);
		 		 
				//x00x0 //4
				}elseif (!empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
				 
				unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);
		 		unlink("doc_uploads/bast/".$dataupload['bast_file']);
		 		 
				//xx0x0 //4
				}elseif (!empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
				 
				unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);
		 		unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 		unlink("doc_uploads/bast/".$dataupload['bast_file']);
 
				//0x0x0 //4
				}elseif (empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
			 			  
		 		unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 		unlink("doc_uploads/bast/".$dataupload['bast_file']);
		 		 
				//x0xx0 //4
				}elseif (!empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && empty($dataupload['baso_file'])) {
			 
			 	unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);		 
		 		unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		unlink("doc_uploads/bast/".$dataupload['bast_file']);
 
		 		//0000x //5
				}elseif (empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && !empty($dataupload['baso_file'])) {
				
				unlink("doc_uploads/baso/".$dataupload['baso_file']);

				//000xx //5	
				}elseif (empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && !empty($dataupload['baso_file'])) {
				
				unlink("doc_uploads/bast/".$dataupload['bast_file']);
		 		unlink("doc_uploads/baso/".$dataupload['baso_file']);

				//00xxx //5	
				}elseif (empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && !empty($dataupload['baso_file'])) {
				

		 		unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		unlink("doc_uploads/bast/".$dataupload['bast_file']);
		 		unlink("doc_uploads/baso/".$dataupload['baso_file']);

				//0xxxx //5					
				}elseif (empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && !empty($dataupload['baso_file'])) {
								 
		 		unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 		unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		unlink("doc_uploads/bast/".$dataupload['bast_file']);
		 		unlink("doc_uploads/baso/".$dataupload['baso_file']);

				//0xx0x //5	
				}elseif (empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && !empty($dataupload['baso_file'])) {
			 	
		 		unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 		unlink("doc_uploads/cn/".$dataupload['contract_number_file']); 		 
		 		unlink("doc_uploads/baso/".$dataupload['baso_file']);

				//xxx0x //5
				}elseif (!empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && !empty($dataupload['baso_file'])) {
				
				unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);
		 		unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 		unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		unlink("doc_uploads/baso/".$dataupload['baso_file']);

				//x0x0x //5
				}elseif (!empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && !empty($dataupload['baso_file'])) {
				
				unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);
		 		unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		unlink("doc_uploads/baso/".$dataupload['baso_file']);

				//x0xxx //5
				}elseif (!empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && !empty($dataupload['baso_file'])) {
				 
				unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);
		 	 	unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		unlink("doc_uploads/bast/".$dataupload['bast_file']);
		 		unlink("doc_uploads/baso/".$dataupload['baso_file']);

				//x00xx //5
				}elseif (!empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && !empty($dataupload['bast_file']) && !empty($dataupload['baso_file'])) {
				
				unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);
		 	 	unlink("doc_uploads/bast/".$dataupload['bast_file']);
		 		unlink("doc_uploads/baso/".$dataupload['baso_file']);

				//x000x //5
				}elseif (!empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && !empty($dataupload['baso_file'])) {
				
				unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);
		 	 	unlink("doc_uploads/baso/".$dataupload['baso_file']);

				//xx00x //5
				}elseif (!empty($dataupload['no_spk_p8_file']) && !empty($dataupload['surat_kesanggupan_file']) && empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && !empty($dataupload['baso_file'])) {
				
				unlink("doc_uploads/spk/".$dataupload['no_spk_p8_file']);
		 		unlink("doc_uploads/sk/".$dataupload['surat_kesanggupan_file']);
		 		unlink("doc_uploads/baso/".$dataupload['baso_file']);

				//00x0x //5	
				}elseif (empty($dataupload['no_spk_p8_file']) && empty($dataupload['surat_kesanggupan_file']) && !empty($dataupload['contract_number_file']) && empty($dataupload['bast_file']) && !empty($dataupload['baso_file'])) {
				
			 	unlink("doc_uploads/cn/".$dataupload['contract_number_file']);
		 		unlink("doc_uploads/baso/".$dataupload['baso_file']);

				}

	
 		
 	 
		
		//setelah hapus data file sekarang data didalam database dimulai dari billing

 		//hapus data contract on database
 		$sqlcontractdel = "delete from pdct_contract where id = '$id' AND id_customer = '$idcust'"; 
		 
		$exsqlcontractdel = $db->Execute($sqlcontractdel);
  
  
 		//jika ekseskusi hapus data pada billing dan contract berhasil
 		if($exsqlbillingdel && $exsqlcontractdel){
		 
			  echo "<script language=javascript>
	                    alert('Berhasil Menghapus Data');
	                    window.location='master_pdct.php?idcust=$idcust&act=DetailContract';
	                 </script>";
			}else{
				  echo "<script language=javascript>
	                    alert('Maaf, Gagal Menghapus Data');
	                    window.location='master_pdct.php?idcust=$idcust&act=DetailContract';
	                 </script>";
				}

	 
	 	}

	 

	 	//End Method Contract

	 	//Start Method Billing

	 	function DetailBilling(){
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
		include "fn_rupiah.php";
		$moneyFormat = new moneyFormat();
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		 
		$idcontract = $_GET['idcont'];
		$idcust = $_GET['idcust'];
		//smarty->assign("idcontract",$idcontract);
		//$smarty->assign("idcust",$idcust);

		//get data contract
		$sqlcont = "select a.*,b.id_customer_name,b.project_no,b.cc_name,b.site_name,
					c.customer_name,d.contract_status from pdct_contract a
					left join pdct_customer b on b.id = a.id_customer
					left join pdct_customer_name c on c.id = b.id_customer_name
					left join pdct_contract_status d on d.id = a.contract_status_opt
					where a.id = '$idcontract' and a.id_customer = '$idcust'";
		$exsqlcont = $db->Execute($sqlcont);
		$getsqlcont = $exsqlcont->FetchRow();

		//get data customer
		$sqlcust = "select a.*,b.customer_name from pdct_customer a 
		left join pdct_customer_name b on b.id = a.id_customer_name where a.id = '$idcust'";
		$exsqlcust = $db->Execute($sqlcust);
		$getexsqlcust = $exsqlcust->FetchRow();

		//get data billing
		$sqlbill = "select a.*,b.charges,case when
		a.end_user = '' OR
		a.bill_periode = '' OR
		a.fp_no_file = '' OR
		a.bill_amount = '' OR
		a.charges = '' OR
		a.paid_amount = '' OR
		a.paid_status = '' OR 
		a.csc = ''
		then 'NF' else 'YF' end as kondisi  from pdct_billing a
		left join pdct_charges b on b.id = a.charges where a.id_contract = '$idcontract' and a.id_customer = '$idcust'";
		$exsqlbill =  $db->Execute($sqlbill);
		$availdata = $exsqlbill->RecordCount();
		if($availdata > 0){
				$no = 1;
				while($getbill = $exsqlbill->FetchRow()){
				$databill[] = array("no"=>$no,"id"=>$getbill['id'],
							 "id_customer"=>$getbill['id_customer'],
							 "id_contract"=>$getbill['id_contract'],
							 "kondisi"=>$getbill['kondisi'],
							 "bill_periode"=>$getbill['bill_periode'],
							 "end_user"=>$getbill['end_user'],
							 "bill_amount"=>number_format($getbill['bill_amount'],0,".",","),
							 "charges"=>$getbill['charges'],"paid_status"=>$getbill['paid_status']);
				$no++;
				}

		}else{
			$databill[] = array("no"=>"-","id"=>"-",
							 "id_customer"=>"-",
							 "id_contract"=>"-",
							 "kondisi"=>"NF",
							 "bill_periode"=>"-",
							 "end_user"=>"-",
							 "bill_amount"=>"-",
							 "charges"=>"-");
		}
		
		//number_format($data['otc'],0,".",",")
		 
		//parsing data customer
		$smarty->assign("customer_name",$getexsqlcust['customer_name']);
		$smarty->assign("project_no",$getexsqlcust['project_no']);
		$smarty->assign("cc_name",$getexsqlcust['cc_name']);
		$smarty->assign("site_name",$getexsqlcust['site_name']);

		//parsing data contract
		$smarty->assign("site_code",$getsqlcont['site_code']);
		$smarty->assign("nama_pekerjaan",$getsqlcont['nama_pekerjaan']);
		$smarty->assign("starting",tgl_indo($getsqlcont['start_date']));
		$smarty->assign("ending",tgl_indo($getsqlcont['ending_date']));
		$smarty->assign("contract_date",tgl_indo($getsqlcont['contract_date']));
		$smarty->assign("contract_level",$getsqlcont['contract_level']);
		$smarty->assign("contract_status",$getsqlcont['contract_status']);
		$smarty->assign("acc_manager",$getsqlcont['account_manager']);

		//parsing data bill
		$smarty->assign("databill",$databill);

		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);

		$smarty->assign("idcontract",$idcontract);
		$smarty->assign("idcust",$idcust);

		 
		$smarty->display("pdct_billing_view.tpl");
		}


		function DetailBillingAdd(){
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
		include "fn_rupiah.php";
		$moneyFormat = new moneyFormat();
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		 
		$idcontract = $_GET['idcont'];
		$idcust = $_GET['idcust'];
		 
		$charges_opt = $this->charges_opt();
		$smarty->assign("charges_opt",$charges_opt);

		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);

		$smarty->assign("idcontract",$idcontract);
		$smarty->assign("idcust",$idcust);

		 
		$smarty->display("pdct_billing_add.tpl");
		}

		function DetailBillingProAdd(){
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
		include "fn_rupiah.php";
		include "fn_str.php";
		$moneyFormat = new moneyFormat();
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$idcust = $_POST['idcust'];
		$idcontract = $_POST['idcontract'];
		$end_user = $_POST['end_user'];
		$bill_periode = $_POST['bill_periode'];
		$fp_no = $_FILES['fp_no']['name'];
		$vfp_no = end(explode('.', $fp_no));
		$bill_amount = clean_string_num($_POST['bill_amount']);
		$charges = $_POST['charges'];
		$paid_amount = clean_string_num($_POST['paid_amount']);
		$paid_status = $_POST['paid_status'];
		$csc = clean_string_num($_POST['csc']);
		$csc_status = $_POST['csc_status'];

		if(!empty($fp_no)){

			$extensi = array("pdf","jpg","jpeg","png");
			
				if(in_array($vfp_no,$extensi)){

					$sql = "insert into pdct_billing (id,id_contract,id_customer,end_user,bill_periode,fp_no_file,fp_no_date_upload,
							fp_no_who_upload,bill_amount,charges,paid_amount,paid_status,csc,paid_csc, 
							user_insert,date_insert) values (null,$idcontract,$idcust,'$end_user','$bill_periode','$fp_no',now(),
							'$_SESSION[username]','$bill_amount','$charges','$paid_amount','$paid_status','$csc','$csc_status',
							'$_SESSION[username]',now())";
					 	  
							move_uploaded_file($_FILES['fp_no']['tmp_name'],"doc_uploads/fp_no/".$fp_no);
					
				}else{

						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?master_pdct.php?act=DetailBillingAdd&idcust=$idcust&idcont=$idcontract';
	                    </script>";
 
				}

		}else{
					$sql = "insert into pdct_billing (id,id_contract,id_customer,end_user,bill_periode,bill_amount,charges,paid_amount,
							paid_status,csc,paid_csc, user_insert,date_insert) values (null,$idcontract,$idcust,'$end_user','$bill_periode',
							'$bill_amount','$charges','$paid_amount','$paid_status','$csc','$csc_status','$_SESSION[username]',now())";

		}
 		
  			//echo $sql;
 			//exit();
 			
 			$exsql = $db->Execute($sql);
 			if($exsql){
			 
			  echo "<script language=javascript>
	                    alert('Berhasil Menambah Data');
	                    window.location='master_pdct.php?idcont=$idcontract&act=DetailBilling&idcust=$idcust';
	                 </script>";
			}else{
				  echo "<script language=javascript>
	                    alert('Maaf, Gagal Menambah Data');
	                    window.location='master_pdct.php?idcont=$idcontract&act=DetailBilling&idcust=$idcust';
	                 </script>";
			}

	 
 			
		}


		function DetailBillingDelete(){
		global $title,$db,$footer;
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$id = $_GET['id'];
		$idcust = $_GET['idcust'];
		$idcont = $_GET['idcont'];

		$sqlfile = "select * from pdct_billing where id = '$id' and id_contract = '$idcont' and id_customer = '$idcust'";
		$exsqlfile = $db->Execute($sqlfile);
		$getfile = $exsqlfile->FetchRow();

		if(!empty($getfile['fp_no_file'])){
			unlink("doc_uploads/fp_no/".$getfile['fp_no_file']);
 		}else {
 			//no delete any files			 
		}
		
		$sql = "delete from pdct_billing where id = '$id' and id_contract = '$idcont' and id_customer ='$idcust'";
		$exsql = $db->Execute($sql);

		//echo $sqlfile;
		//exit();
	

			if($exsql){
			 
			  echo "<script language=javascript>
	                    alert('Berhasil Menghapus Data');
	                    window.location='master_pdct.php?idcont=$idcont&act=DetailBilling&idcust=$idcust';
	                 </script>";
			}else{
				  echo "<script language=javascript>
	                    alert('Maaf, Gagal Menghapus Data');
	                    window.location='master_pdct.php?idcont=$idcont&act=DetailBilling&idcust=$idcust';
	                 </script>";
			}
			
	
		}

		function DetailBillingUpdate(){
		global $title,$db,$footer;
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$id = $_GET['id'];
		$idcust = $_GET['idcust'];
		$idcont = $_GET['idcont'];

		$sql = "select * from pdct_billing where id = '$id' and id_contract = '$idcont' and id_customer = '$idcust'";
		$exsql = $db->Execute($sql);
		$data = $exsql->FetchRow();


		$charges_opt = $this->charges_opt($data['charges']);
		$smarty->assign("charges_opt",$charges_opt);

		$smarty->assign("end_user",$data['end_user']);
		$smarty->assign("bill_periode",$data['bill_periode']);
		$smarty->assign("fp_no_file",$data['fp_no_file']);
		$smarty->assign("charges",$data['charges']);
		$smarty->assign("fp_no_date_upload",$data['fp_no_date_upload']);
		$smarty->assign("fp_no_date_edit",$data['fp_no_date_edit']);
		$smarty->assign("fp_no_date_delete",$data['fp_no_date_delete']);
		$smarty->assign("bill_amount",$data['bill_amount']);
		$smarty->assign("paid_amount",$data['paid_amount']);
		$smarty->assign("paid_status",$data['paid_status']);
		$smarty->assign("csc",$data['csc']);
		$smarty->assign("paid_csc",$data['paid_csc']);

		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);

		$smarty->assign("idcontract",$idcont);
		$smarty->assign("idcust",$idcust);
		$smarty->assign("id",$id);

		$smarty->display("pdct_billing_edit.tpl");
		}

		function DetailBillingProUpdate(){
		global $title,$db,$footer;
		include "fn_str.php";
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$id = $_POST['id'];
		$idcust = $_POST['idcust'];
		$idcontract = $_POST['idcontract'];

		$end_user = $_POST['end_user'];
		$bill_periode = $_POST['bill_periode'];
		$fp_no = $_FILES['fp_no']['name'];
		$vfp_no = end(explode('.', $fp_no));
		$bill_amount = clean_string_num($_POST['bill_amount']);
		$charges = $_POST['charges'];
		$paid_amount = clean_string_num($_POST['paid_amount']);
		$paid_status = $_POST['paid_status'];
		$csc = clean_string_num($_POST['csc']);
		$csc_status = $_POST['csc_status'];

		if(!empty($fp_no)){

			$extensi = array("pdf","jpg","jpeg","png");
			
				if(in_array($vfp_no,$extensi)){

					$sql = "update pdct_billing set end_user = '$end_user', bill_periode = '$bill_periode', fp_no_file = '$fp_no', 
							fp_no_date_edit = now(), fp_no_who_edit = '$_SESSION[username]',bill_amount = '$bill_amount',charges = '$charges',
							paid_amount = '$paid_amount', csc = '$csc', paid_status = '$paid_status',paid_csc='$csc_status', user_edit = '$_SESSION[username]', date_edit = now() 
							where id = '$id' AND id_contract = '$idcontract' AND id_customer = '$idcust'";
			 				 	  
							move_uploaded_file($_FILES['fp_no']['tmp_name'],"doc_uploads/fp_no/".$fp_no);
					
				}else{

						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?master_pdct.php?act=DetailBillingUpdate&id=$id&idcust=$idcust&idcont=$idcont';
	                    </script>";
 						//DetailBillingUpdate&id=132&idcust=1&idcont=1
				}

		}else{
					$sql = "update pdct_billing set end_user = '$end_user', bill_periode = '$bill_periode', bill_amount = '$bill_amount',charges = '$charges',
							paid_amount = '$paid_amount', csc = '$csc', paid_status = '$paid_status',paid_csc = '$csc_status', user_edit = '$_SESSION[username]', date_edit = now() 
							where id = '$id' AND id_contract = '$idcontract' AND id_customer = '$idcust'";
		}
 		
  			//echo $sql;
 			//exit();
 			
 			$exsql = $db->Execute($sql);
 			if($exsql){
			 
			  echo "<script language=javascript>
	                    alert('Berhasil Merubah Data');
	                    window.location='master_pdct.php?idcont=$idcontract&act=DetailBilling&idcust=$idcust';

	                 </script>";
			}else{
				  echo "<script language=javascript>
	                    alert('Maaf, Gagal Merubah Data');
	                    window.location='master_pdct.php?idcont=$idcontract&act=DetailBilling&idcust=$idcust';
	                 </script>";
			}
			
		}

		function DetailBillingDetail() {
		global $title,$db,$footer;
		include "fn_str.php";
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$id = $_GET['id'];
		$idcust = $_GET['idcust'];
		$idcont = $_GET['idcont'];

		$sql = "select a.*,b.charges as charge_stat from pdct_billing a 
		left join pdct_charges b on b.id = a.charges
		where a.id = '$id' AND a.id_contract = '$idcont' AND a.id_customer = '$idcust'";
		$exsql = $db->Execute($sql);
		$list = $exsql->FetchRow();

		$list['csc'];
	 	$smarty->assign("end_user",$list['end_user']);
	 	$smarty->assign("bill_periode",$list['bill_periode']);
	 	$smarty->assign("fp_no_file",$list['fp_no_file']);
 
	 	$smarty->assign("bill_amount",number_format($list['bill_amount'],0,".","."));
	 	$smarty->assign("charge_stat",$list['charge_stat']);
	 	$smarty->assign("paid_amount",number_format($list['paid_amount'],0,".","."));
	 	$smarty->assign("paid_status",$list['paid_status']);
	 	$smarty->assign("csc",number_format($list['csc'],0,".","."));
	 	$smarty->assign("paid_csc",$list['paid_csc']);

		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);

		$smarty->assign("idcont",$idcont);
		$smarty->assign("idcust",$idcust);
		$smarty->assign("id",$id);

		$smarty->display("pdct_billing_detail.tpl");


		}
	 	//Ending Method Billing
		
	}
?>