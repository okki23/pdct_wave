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

		//$sql = "select a.*, datediff(ending_date,current_date()) as selisih from pdct where visibility = 'Y'";
		$sql = "select * from pdct_customer";
		$exsql = $db->Execute($sql);
		while ($row = $exsql->FetchRow()) {
			$list[] = array("id"=>$row['id'],"no_project"=>$row['no_project'],
				"cc_name"=>$row['cc_name'],"customer_name"=>$row['customer_name'],"site_name"=>$row['site_name'],"nama_pekerjaan"=>$row['nama_pekerjaan'],"status"=>$row['id_status']);

		}

		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		//$smarty->assign("list",$list);
		$smarty->assign("session",$_SESSION['username']);
	 	$smarty->assign("sessionlevel",$_SESSION['level']);
	 	$smarty->assign("namauser",$_SESSION['namauser']);
		$smarty->display("report_view.tpl");
		}

		 

		function Update(){
		global $title,$db,$footer;
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$id = $_GET['id'];
		$sql = "select * from user where id_user = '$id'";
		$exsql = $db->Execute($sql);
	 	$data = $exsql->FetchRow();

	 	$smarty->assign("id",$data['id_user']);
	 	$smarty->assign("username",$data['username']);
	 	$smarty->assign("password",$data['password']);
	 	$smarty->assign("nama_user",$data['nama_user']);
	 	$smarty->assign("level",$data['level']);
	 	$smarty->assign("branch",$data['branch']);
	 	$smarty->assign("alamat",$data['alamat']);

	 	$smarty->assign("no_hp",$data['no_hp']);
	 	$smarty->assign("bbm",$data['bbm']);
	 	$smarty->assign("email",$data['email']);
	 	$smarty->assign("gambar",$data['gambar']);
	 	$smarty->assign("nik",$data['nik']);
	 	 
	 	$level_user_opt = $this->level_user_opt($data['level']);
		$smarty->assign("level_user_opt",$level_user_opt);
 
		$smarty->assign("session",$_SESSION['username']);
		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		 
		$smarty->display("user_edit.tpl");
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
		$nama_user = protect($_POST['nama_user']);
		$level = protect($_POST['level']);
		$branch = protect($_POST['branch']);
		$alamat = protect($_POST['alamat']);
		$no_hp = protect($_POST['no_hp']);
		$nik = protect($_POST['nik']);
		$bbm = protect($_POST['bbm']);
		$email =protect($_POST['email']);
 		$foto = $_FILES['foto']['name'];
 		$vfoto = end(explode('.', $foto));

	 
		//ekstensi file yang diizinkan masuk ke server
		$extensi = array("jpg","jpeg","png");
		 
	 	//validasi foto
		if(in_array($vfoto,$extensi)){
		if($vfoto >= 2000000){
			 echo "<script language=javascript>
	                    alert('Foto yang anda upload Melebihi 2MB!');
	                    window.location='m_user.php?act=Add';
	                 </script>";
		}
		move_uploaded_file($_FILES['foto']['tmp_name'],"fotopegawai/".$foto);
		}else{
		 
				  echo "<script language=javascript>
	                    alert('Foto yang anda upload bukan format foto yang diizinkan!');
	                   window.location='m_user.php?act=Add';
	                 </script>";
				 
		}
 
		$sql = "insert into user (id_user,username,password,nama_user,level,branch,alamat,
		no_hp,bbm,email,gambar,nik,
		user_add,date_add,visibility) 
		values
		(null,'$username','$password','$nama_user','$level','$branch','$alamat',
		'$no_hp','$bbm','$email','$foto','$nik','$_SESSION[username]',now(),'Y')";
		 
	 //echo $sql;
	 //exit();
	 
		$exsql = $db->Execute($sql);
		
		if($exsql){
			  echo "<script language=javascript>
	                    alert('Terima Kasih, Berhasil Menambah Data');
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
		$nama_user = protect($_POST['nama_user']);
		$level = protect($_POST['level']);
		$branch = protect($_POST['branch']);
		$alamat = protect($_POST['alamat']);
		$no_hp = protect($_POST['no_hp']);
		$bbm = protect($_POST['bbm']);
		$email = protect($_POST['email']);
		$foto = $_FILES['foto']['name'];
		$sfoto = $_FILES['foto']['size'];
		$vfoto = end(explode('.',$foto));
		$nik = protect($_POST['nik']);
		/*
		echo $id .' - '. $username .' - '. $password .' - '. $expasword .' - '. $nama_user .' - '. $level
		.' - '. $branch .' - '. $alamat .' - '. $no_hp .' - '. $bbm .' - '. $email .' - '. $foto .' - '.
		$sfoto .' - '. $vfoto .' - '. $nik;
		*/
  		 
		 if(empty($password) && empty($foto)){
		 	$sql = "update user set username = '$username', nama_user='$nama_user', level = '$level', branch = '$branch',
		 	alamat = '$alamat', no_hp = '$no_hp', bbm = '$bbm', email = '$email', nik = '$nik' where id_user = '$id'";

		 }elseif (empty($password) && !empty($foto)) {
		 	$sql = "update user set username = '$username', nama_user='$nama_user', level = '$level', branch = '$branch',
		 	alamat = '$alamat', no_hp = '$no_hp', bbm = '$bbm', email = '$email', gambar='$foto', nik = '$nik' where id_user = '$id'";
		 

				//ekstensi file yang diizinkan masuk ke server
				$extensi = array("jpg","jpeg","png");
				 
			 	//validasi Foto
				if(in_array($vfoto,$extensi)){
				if($sfoto >= 2000000){
					 echo "<script language=javascript>
			                    alert('File yang anda upload Melebihi 2MB!');
			                    window.location='?act=Update&id=$id';
			                 </script>";
				}
				move_uploaded_file($_FILES['foto']['tmp_name'],"fotopegawai/".$foto);
				}else{
				 
						  echo "<script language=javascript>
			                    alert('File yang anda upload bukan dokumen yang diizinkan!');
			                    window.location='?act=Update&id=$id';
			                 </script>";
			    }
				 
	 

		}elseif (!empty($password) && empty($foto)) {
		 	$sql = "update user set username = '$username', password = '$expasword', nama_user='$nama_user', level = '$level', branch = '$branch',
		 	alamat = '$alamat', no_hp = '$no_hp', bbm = '$bbm', email = '$email', nik = '$nik' where id_user = '$id'";

		}elseif (!empty($password) && !empty($foto)) {
			$sql = "update user set username = '$username', password = '$expasword', nama_user='$nama_user', level = '$level', branch = '$branch',
		 	alamat = '$alamat', no_hp = '$no_hp', bbm = '$bbm', email = '$email', gambar = '$foto', nik = '$nik' where id_user = '$id'";
			
				//ekstensi file yang diizinkan masuk ke server
				$extensi = array("jpg","jpeg","png");
				 
			 	//validasi Foto
				if(in_array($vfoto,$extensi)){
				if($sfoto >= 2000000){
					 echo "<script language=javascript>
			                    alert('File yang anda upload Melebihi 2MB!');
			                    window.location='?act=Update&id=$id';
			                 </script>";
				}
				move_uploaded_file($_FILES['foto']['tmp_name'],"fotopegawai/".$foto);
				}else{
				 
						  echo "<script language=javascript>
			                    alert('File yang anda upload bukan dokumen yang diizinkan!');
			                    window.location='?act=Update&id=$id';
			                 </script>";
			    }

		}

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
		echo $sqldata = "update user set user_delete = '$_SESSION[username]' ,date_delete = now(), visibility = 'N' where id_user = '$id'"; 
		
		/*
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
			*/

		}

 
		
		
		
	}
?>