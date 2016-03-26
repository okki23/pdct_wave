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

		$sql = "select a.*, b.level_user  from pdct_user a
		left join pdct_level_user b on b.id = a.level";
		$exsql = $db->Execute($sql);
		while ($row = $exsql->FetchRow()) {
		 	$list[] = array("id"=>$row['id'],"username"=>$row['username'],
				"nama_pegawai"=>$row['nama_pegawai'],"level_user"=>$row['level_user']);

		}

		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		$smarty->assign("list",$list);
		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->display("user_view.tpl");
		}

		 

		function Update(){
		global $title,$db,$footer;
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$id = $_GET['id'];
		$sql = "select * from pdct_user where id = '$id'";
		$exsql = $db->Execute($sql);
	 	$data = $exsql->FetchRow();

	 	$smarty->assign("id",$data['id']);
	 	$smarty->assign("username",$data['username']);
	 	$smarty->assign("password",$data['password']);
	 	$smarty->assign("nama_pegawai",$data['nama_pegawai']);
	 	$smarty->assign("level",$data['level']);
	 
	 	$level_user_opt = $this->level_user_opt($data['level']);
		$smarty->assign("level_user_opt",$level_user_opt);
 
		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		 
		$smarty->display("user_edit.tpl");
		}
		
		
		function level_user_opt($selected = ''){
		global $db;
		$data = "select * from pdct_level_user";
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
	 
	 	$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->display("user_add.tpl");			
		}
		
		function ProAdd(){
		global $title,$db,$footer;
		$smarty = new Smarty;
		include "fn_str.php";
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$username = protect($_POST['username']);
		$password = md5($_POST['password']);
		$nama_pegawai = protect($_POST['nama_pegawai']);
		$level_user = protect($_POST['level_user']);
		 

	  
		$sql = "insert into pdct_user (id,username,password,nama_pegawai,level,user_insert,date_insert) 
		values (null,'$username','$password','$nama_pegawai','$level_user','$_SESSION[username]',now())";
		 
	 //echo $sql;
	 //exit();
	 
		$exsql = $db->Execute($sql);
		
		if($exsql){
			  echo "<script language=javascript>
	                    alert('Berhasil Menambah Data');
	                    window.location='m_user.php';
	                 </script>";
			}else{
				  echo "<script language=javascript>
	                    alert('Maaf, Gagal Menambah Data');
	                     window.location='m_user.php';
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
		$username = protect($_POST['username']);
		$password = protect($_POST['password']);
		$expasword = md5($_POST['password']);
		$nama_pegawai = protect($_POST['nama_pegawai']);
		$level_user = protect($_POST['level_user']);
		 
		if(empty($password)){
			$sql = "update pdct_user set username = '$username', nama_pegawai='$nama_pegawai', level = '$level_user' , user_edit = '$_SESSION[username]', date_edit = now() where id = '$id'";
		}else{
			$sql = "update pdct_user set username = '$username', password = '$expasword', nama_pegawai='$nama_pegawai', level = '$level_user', user_edit = '$_SESSION[username]', date_edit = now() where id = '$id'";

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
		$sqldata = "delete from pdct_user where id = '$id'"; 
		
	 
		$exsqldata = $db->Execute($sqldata);
		$data = $exsqldata->FetchRow();
		 
 
		
		if($exsqldata){
			 
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