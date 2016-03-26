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
		 
		$smarty->assign("session",$_SESSION['username']);
		$smarty->display("404.tpl");
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
		$sql = "select * from user where username = '$username' and password = '$password' LIMIT 1";
		$exsql = $db->Execute($sql);
		$data = $exsql->FetchRow();

		if($exsql->RecordCount() > 0){
			session_start();
			$_SESSION['username'] = $data['username'];
			header("location:index.php?act=Index");

		}else{
			header("location:index.php?act=ShowLogin");
		} 
		}
		
		
		
	}
?>