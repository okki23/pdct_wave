<?php
require ('libs/Smarty.class.php');
require ('config.php');
require ('fn_protect.php');
require ('fn_str.php');


class Main {
	
		function Index(){
		global $title,$db,$footer;
		require ('user_cek.php');
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
		$smarty->display("dashboard.tpl");
		}
		
		function ShowLogin(){
		global $title,$db,$footer;
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		 
		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		 
		$smarty->display("login.tpl");			
		}


		
		function Logout(){
		global $title,$db,$footer;
		require ('user_cek.php');
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		session_unset();
		session_destroy();
		header("location:index.php?act=Login");		
		}
		
		function Auth_Login(){
		global $title,$db,$footer;
		require ('user_cek.php');
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

	 
		$username = protect($_POST['username']);
		$password = md5($_POST['password']);
		$sql = "select a.*,b.level_user from pdct_user a
		left join pdct_level_user b on b.id = a.level
		where a.username = '$username' and a.password = '$password' LIMIT 1";
		$exsql = $db->Execute($sql);
		$data = $exsql->FetchRow();

		if($exsql->RecordCount() > 0){
			session_start();
			$_SESSION['username'] = $data['username'];
			$_SESSION['nama_pegawai'] = $data['nama_pegawai'];
			$_SESSION['level_user'] = $data['level_user'];
			header("location:index.php?act=Index");

		}else{
			header("location:index.php?act=ShowLogin");
		} 
		}
		
		
		
	}
?>