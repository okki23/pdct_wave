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

		$sql = "select * from customer_name where visibility = 'Y'";
		$exsql = $db->Execute($sql);
		while ($row = $exsql->FetchRow()) {
			$list[] = array("id"=>$row['id'],"nama_customer"=>$row['nama_customer']);

		}

		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		$smarty->assign("list",$list);
		$smarty->assign("session",$_SESSION['username']);
		$smarty->display("customer_view.tpl");
		}

		 

		function Update(){
		global $title,$db,$footer;
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$id = $_GET['id'];
		$sql = "select * from customer_name where id = '$id'";
		$exsql = $db->Execute($sql);
	 	$data = $exsql->FetchRow();

	 	$smarty->assign("id",$data['id']);
	 	$smarty->assign("nama_customer",$data['nama_customer']);
	 
 
 
		$smarty->assign("session",$_SESSION['username']);
		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		 
		$smarty->display("customer_edit.tpl");
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
		$level_user_opt = $this->level_user_opt();
		$smarty->assign("level_user_opt",$level_user_opt);
	 
	 	$smarty->assign("session",$_SESSION['username']);
		$smarty->display("customer_add.tpl");			
		}
		
		function ProAdd(){
		global $title,$db,$footer;
		$smarty = new Smarty;
		include "fn_str.php";
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$customer_name = protect($_POST['customer_name']);
	 
 
		$sql = "insert into customer_name (id,nama_customer,visibility,user_add,date_add) 
		values
		(null,'$customer_name','Y','$_SESSION[username]',now())";
		 
	 //echo $sql;
	 //exit();
	 
		$exsql = $db->Execute($sql);
		
		if($exsql){
			  echo "<script language=javascript>
	                    alert('Terima Kasih, Berhasil Menambah Data');
	                    window.location='customer.php';
	                 </script>";
			}else{
				  echo "<script language=javascript>
	                    alert('Maaf, Gagal Menambah Data');
	                     window.location='customer.php';
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
		$customer_name = protect($_POST['customer_name']);
		 
		/*
		echo $id .' - '. $username .' - '. $password .' - '. $expasword .' - '. $nama_user .' - '. $level
		.' - '. $branch .' - '. $alamat .' - '. $no_hp .' - '. $bbm .' - '. $email .' - '. $foto .' - '.
		$sfoto .' - '. $vfoto .' - '. $nik;
		*/
  	 	$sql = "update customer_name set nama_customer = '$customer_name', user_edit = '$_SESSION[username]', date_edit=now() where id = '$id'";

		//echo $sql;
		//exit();
		 
		 
		$exsql = $db->Execute($sql);
		
		if($exsql){
			  echo "<script language=javascript>
	                    alert('Terima Kasih, Berhasil Merubah Data');
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
		$sqldata = "update customer_name set user_delete = '$_SESSION[username]' ,date_delete = now(), visibility = 'N' where id = '$id'"; 
		
 
		$exsqldata = $db->Execute($sqldata);
		$data = $exsqldata->FetchRow();
		 
 
		
		if($exsqldata){
			//unlink("doc_uploads/spk/".$data['spk']);
			  echo "<script language=javascript>
	                    alert('Terima Kasih, Berhasil Menghapus Data');
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