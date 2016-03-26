<?php
require ('libs/Smarty.class.php');
require ('config.php');
require ('fn_protect.php');
require ('user_cek.php');


class Main {
	
		function View(){
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$sql = "select * from pdct_paid_status";
		$exsql = $db->Execute($sql);
		$avail = $exsql->RecordCount();

		if($avail > 0){

			while ($row = $exsql->FetchRow()) {
			$list[] = array("id"=>$row['id'],"paid_bill_status"=>$row['paid_bill_status']);

			}

		}else{

			$list[] = array("id"=>'',"paid_bill_status"=>'');
		}
		

		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		$smarty->assign("list",$list);
		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->display("master_paid_status_view.tpl");
		}

		 

		function Update(){
		global $title,$db,$footer;
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$id = $_GET['id'];
		$sql = "select * from pdct_contract_status where id = '$id'";
		$exsql = $db->Execute($sql);
	 	$data = $exsql->FetchRow();

	 	$smarty->assign("id",$data['id']);
	 	$smarty->assign("contract_status",$data['contract_status']);
	 
 
 
		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		 
		$smarty->display("contract_status_opt_edit.tpl");
		}
		
		
		function level_user_opt($selected = ''){
		global $db;
		$data = "select * from level_user";
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
				
			$level_user_opt[] = array('id'=>$row['id'],
				'selected'=>$selected_opt,
				'level_user'=>$row['level_user']);
			}
			
		}
		return $level_user_opt;
		}
 

		function Add(){
		global $title,$db,$footer;
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;
		 
		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title); 
		 
	 
	 	$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->display("master_paid_status_add.tpl");			
		}
		
		function ProAdd(){
		global $title,$db,$footer;
		$smarty = new Smarty;
		include "fn_str.php";
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$paid_bill_status = protect($_POST['paid_bill_status']);
	 
 
		$sql = "insert into pdct_paid_status (id,paid_bill_status,user_add,date_add) 
		values
		(null,'$paid_bill_status','$_SESSION[username]',now())";
		 
	 //echo $sql;
	 //exit();
	 
		$exsql = $db->Execute($sql);
		
		if($exsql){
			  echo "<script language=javascript>
	                    alert('Berhasil Menambah Data');
	                    window.location='master_paid_status.php';
	                 </script>";
			}else{
				  echo "<script language=javascript>
	                    alert('Maaf, Gagal Menambah Data');
	                     window.location='master_paid_status.php';
	                 </script>";
				}
	 	 
				 

		}

		function ProUpdate(){
		global $title,$db,$footer;
		include "fn_str.php";
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$id = protect($_POST['id']);
		$contract_status = protect($_POST['contract_status']);
		 
		/*
		echo $id .' - '. $username .' - '. $password .' - '. $expasword .' - '. $nama_user .' - '. $level
		.' - '. $branch .' - '. $alamat .' - '. $no_hp .' - '. $bbm .' - '. $email .' - '. $foto .' - '.
		$sfoto .' - '. $vfoto .' - '. $nik;
		*/
  	 	$sql = "update pdct_contract_status set contract_status = '$contract_status', user_edit = '$_SESSION[username]', date_edit=now() where id = '$id'";

		//echo $sql;
		//exit();
		 
		 
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
		$sqldata = "delete from pdct_contract_status where id = '$id'"; 
		
 
		$exsqldata = $db->Execute($sqldata);
		$data = $exsqldata->FetchRow();
		 
 
		
		if($exsqldata){
			//unlink("doc_uploads/spk/".$data['spk']);
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

 
		
		
		
	}
?>