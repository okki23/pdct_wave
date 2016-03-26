<?php
require ('libs/Smarty.class.php');
require ('config.php');
//require ('user_cek.php');
class Index {
		 
  			
	    function ShowLogin() {
		//require ('user_cek.php');
  	    global $title,$db,$footer;
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 120;
		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
 
		$smarty->display('signin.tpl');
		}

 		function MenuUtama() {
		require ('user_cek.php');
		include "fn_tgl_indo.php";
  	    global $title,$db,$footer;
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;
		$smarty->assign("username",$_SESSION['username']);
		$smarty->assign("status",$_SESSION['status']);
		$smarty->assign("posisi",$_SESSION['posisi']);
		$smarty->assign("niksesi",$_SESSION['niksesi']);
		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		
 
		
		$smarty->assign("tglsekarang",$_SESSION['tanggalsekarang']);
		$smarty->assign("mulai",$_SESSION['mulaiperiode']);
		$smarty->assign("akhir",$_SESSION['akhirperiode']);
		$smarty->assign("sesipengisian",$_SESSION['sesipengisian']);
		$smarty->assign("jenisperiode",$_SESSION['jenisperiode']);
		$smarty->display('menu_utama.tpl');
		}
		
		 
		
		function DoLogin() {
	    require ('user_cek.php');
		include "fn_tgl_indo.php";
  	    global $title,$db,$footer;
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;
		$smarty->assign("title",$title);
		$smarty->assign("footer",$footer);
		
		
		$username = mysql_real_escape_string($_POST['username']);
		$password = md5(mysql_real_escape_string($_POST['password']));
		
	    $sql = "select * from user where username = '$username' and password = '$password'";
		//echo $sql; exit;
	 
		$execute = $db->Execute($sql);
		$data = $execute->FetchRow();
		$avail = $execute->RecordCount();
		
	
	 
		$sesiusername = $data['username'];
		//ambil data yang bersangkutan saat ini-----------------------------------------------------
 	 	 
				$getybs = "select a.id_user,a.username,b.nik,b.nama_karyawan from user a
				left join karyawan b on b.id_karyawan = a.id_karyawan
				where a.username = '$data[username]'";
				$exgetybs = $db->Execute($getybs);
				$rowybs = $exgetybs->FetchRow();
		
				$nikybs = $rowybs['nik'];
				$namaybs = $rowybs['nm_karyawan'];
		//buat sesi periode
		$sekarang = date('Y-m-d');
		$sqlperiode = "SELECT *,case when jenis_periode = '1' then 'Target' else 'Realisasi' end as sesi_pengisian FROM periode where aktif = 'Y'";
 		$exsqlperiode = $db->Execute($sqlperiode);
		$fetch = $exsqlperiode->FetchRow();
		
		$mulai = tgl_indo($fetch['tgl_mulai']);
		$akhir = tgl_indo($fetch['tgl_akhir']);
		$jenisperiode = $fetch['jenis_periode'];
 		
		if ($sekarang >= $mulai && $sekarang <=$akhir){
			$sesipengisian = '1';
		}else{
			$sesipengisian = '0';
		}
		
 		//-----------------------------------------------------------------------------------------
		//cek bawahan ada atau tidak untuk keperluan session status atasan atau bawahan -----------
		$cekbawah = "select * from karyawan where nik_atasan = '$nikybs'";
		$excekbawah = $db->Execute($cekbawah);
		$availbawah = $excekbawah->RecordCount();
		 
		if($availbawah < 1){
			
			$ada = '0'; // tidak punya bawahan
			
		}else{
			
			$ada = '1'; // punya bawahan
			 
		}
	 
		
		//------------------------------------------------------------------------------------------
		if($avail > 0){
			session_start();
			$_SESSION['username'] = $data['username'];
			$_SESSION['status'] = $data['status_user'];
			$_SESSION['posisi'] = $ada;
			$_SESSION['mulaiperiode'] = $mulai;
			$_SESSION['akhirperiode'] = $akhir;
			$_SESSION['tanggalsekarang'] = $sekarang;
			$_SESSION['sesipengisian'] = $sesipengisian;	
			$_SESSION['jenisperiode'] = $jenisperiode;
			
			$_SESSION['niksesi'] = $nikybs;
 		
			header('location:index.php?action=menuutama');
			}else{
			echo "<script language=javascript>
	                    alert('Login Gagal! Periksa Kembali Akun Anda!');
	                    window.location='index.php?action=showlogin';
	                 </script>";
			}
			 
		
		
		}
	
		function DoLogout() {
  	    global $title,$db,$footer;
		require ('user_cek.php');
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;
		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		
		session_destroy();
		session_unset();
		
	    echo "<script language=javascript>
	                    alert('Anda Telah Keluar!');
	                    window.location='index.php?action=showlogin';
	                 </script>";
		
		}
	
	}
?>
 