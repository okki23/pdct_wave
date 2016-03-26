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

		$sql = "select * from pdct_email";
		$exsql = $db->Execute($sql);
		$availdata  = $exsql->RecordCount();
		
		if($availdata > 0){

			while ($row = $exsql->FetchRow()) {
			$list[] = array("id"=>$row['id'],"active"=>$row['active'],"isi_email"=>$row['isi_email']);
			}

		}else{

			$list[] = array("id"=>'',"active"=>'',"isi_email"=>'');

		}
		

		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		$smarty->assign("list",$list);
		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->display("master_email_message_view.tpl");
		}

		 

		function Update(){
		global $title,$db,$footer;
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$id = $_GET['id'];
		$sql = "select * from pdct_email where id = '$id'";
		$exsql = $db->Execute($sql);
	 	$data = $exsql->FetchRow();

	 	$smarty->assign("id",$data['id']);
	 	$smarty->assign("pesan_email",$data['isi_email']);
	 	$smarty->assign("active",$data['active']);
	 
 
 
		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		 
		$smarty->display("master_email_message_edit.tpl");
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
		$smarty->display("master_email_message_add.tpl");			
		}
		
		function ProAdd(){
		global $title,$db,$footer;
		$smarty = new Smarty;
		include "fn_str.php";
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$pesan_email = protect($_POST['pesan_email']);
		$active = protect($_POST['active']);
	 	
	 	 
			//cek status 
			$sqlcek = "select * from pdct_email where active = 'Y'";
			$exsqlcek = $db->Execute($sqlcek);
			$availyes = $exsqlcek->RecordCount();

			if($availyes > 0){
				$statusyes = 'Y';
			}else{
				$statusyes = '';
			}

			//cek input
			if($active == $statusyes){
				echo "<script language=javascript>
							alert('Rubah Status Pesan [YES] pada List Email Yang Ada, Status [YES] hanya Berlaku pada 1 Email Saja!');
	                    window.location='?act=Add';
	                 </script>";
	        }else{
	        	$sql = "insert into pdct_email (id,isi_email,active,user_add,date_add) values (null,'$pesan_email','$active','$_SESSION[username]',now())";

	        }

 		 
	 //echo $sql;
	 //exit();
			
 	 
		$exsql = $db->Execute($sql);
		
		if($exsql){
			  echo "<script language=javascript>
	                    alert('Berhasil Menambah Data');
	                    window.location='master_email_message.php';
	                 </script>";
			}else{
				  echo "<script language=javascript>
	                    alert('Maaf, Gagal Menambah Data');
	                     window.location='master_email_message.php';
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
		$pesan_email = protect($_POST['pesan_email']);
		$active = protect($_POST['active']);
		 
		//cek status 
		$sqlcek = "select * from pdct_email where active = 'Y'";
		$exsqlcek = $db->Execute($sqlcek);
		$availyes = $exsqlcek->RecordCount();

		if($active == 'Y'){
			//cek status 
			$sqlcek = "select * from pdct_email where active = 'Y'";
			$exsqlcek = $db->Execute($sqlcek);
			$availyes = $exsqlcek->RecordCount();


				if($availyes > 0){
					echo "<script language=javascript>
							alert('Rubah Status Pesan [YES] pada List Email Yang Ada, Status [YES] hanya Berlaku pada 1 Email Saja!');
	                    window.location='?act=View';
	                 </script>";
				 
				}else{
				$sql = "update pdct_email set isi_email = '$pesan_email', active = '$active',
					 	user_edit = '$_SESSION[username]', date_edit=now() where id = '$id'";
				}	

		

		} else{
			$sql = "update pdct_email set isi_email = '$pesan_email', active = '$active', user_edit = '$_SESSION[username]', date_edit=now() where id = '$id'";
		}

		
	 

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
		$sqldata = "delete from pdct_email where id = '$id'"; 
		
 
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