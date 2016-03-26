<?php
require ('libs/Smarty.class.php');
require ('config.php');
require ('fn_protect.php');
require ('user_cek.php');


class Main {
 
		//Start Method PDCT Master Customer Name
 
		function View(){
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

 		$sql = "select * from pdct_customer_name";
		$exsql = $db->Execute($sql);
		$no =1;
		while ($row = $exsql->FetchRow()) {
				$list[] = array("id"=>$row['id'],"no"=>$no,"customer_name"=>$row['customer_name']);
		$no++;
		}

		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		$smarty->assign("list",$list);
		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->display("pdct_cust_name_view.tpl");
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
		$smarty->display("pdct_cust_name_add.tpl");			
		}

		function ProAdd(){
		global $title,$db,$footer;
		$smarty = new Smarty;
		include "fn_str.php";
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$cust_name = protect($_POST['cust_name']);

 
        $sql = "insert into pdct_customer_name (id,customer_name,user_insert,date_insert) 
		values
		(null,'$cust_name','$_SESSION[username]',now())";
		 
	 	 
		$exsql = $db->Execute($sql);
		
		if($exsql){
			  echo "<script language=javascript>
	                    alert('Berhasil Menambah Data');
	                    window.location='master_cust_name.php';
	                 </script>";
			}else{
				  echo "<script language=javascript>
	                    alert('Maaf, Gagal Menambah Data');
	                     window.location='master_cust_name.php';
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
		$sql = "select * from pdct_customer_name where id = '$id'";
		$exsql = $db->Execute($sql);
	 	$data = $exsql->FetchRow();

	 	$smarty->assign("id",$data['id']); 
	 	$smarty->assign("customer_name",$data['customer_name']);
	  
 		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		 
		$smarty->display("pdct_cust_name_edit.tpl");
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
		$cust_name = protect($_POST['cust_name']);
		 
	 
 		$sql = "update pdct_customer_name set
		customer_name = '$cust_name' user_edit = '$_SESSION[username]',date_edit= now()
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

		$sqldata = "delete from pdct_customer_name where id = '$id'"; 
		 
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
 
		//End Method PDCT Master Customer Name


		 
		
	}
?>