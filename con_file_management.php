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


		
				$direktori = isset($_POST['direktori']) ? $_REQUEST['direktori'] : '';
				$changedir = isset($_POST['changedir']) ? $_REQUEST['changedir'] : '';

				if(empty($direktori)){
					$path = 'doc_uploads/'.$direktori;
					$list[] = array("no"=>"","namafile"=>"","nama"=>"");
					 
				}else{
					 
					if($direktori == 'sk'){
						$path = 'doc_uploads/sk/';
					}elseif($direktori == 'cn'){
						$path = 'doc_uploads/cn/';
					}elseif($direktori == 'spk'){
						$path = 'doc_uploads/spk/';
					}elseif($direktori == 'bast'){
						$path = 'doc_uploads/bast/';
					}elseif($direktori == 'baso'){
						$path = 'doc_uploads/baso/';
					}elseif($direktori == 'proforma'){
						$path = 'proforma_invoice/';
					}elseif($direktori == 'resume'){
						$path = 'resume_invoice/';
					}


					if(is_dir($path)){
					 $dh = opendir($path);

							$no = 1;
							while($file = readdir($dh)){

								if($file != "." && $file !=".."){
									//echo '$path/$file';
									$list[] = array("no"=>$no,"namafile"=>"$path".$file,"nama"=>$file); 
								 $no++;
								}
							
							}

						closedir($dh);
						
					}
					
				}
					
 
		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		$smarty->assign("list",$list);
		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->display("file_management.tpl");
		}

		 
		 
		function Del() {
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		 $path = $_GET['path'];
		 unlink($path);
		 echo "<script language=javascript>
	                    alert('File Berhasil Dihapus');
	                    window.location='file_management.php';
	                 </script>";


		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		$smarty->assign("list",$list);
		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		}
	  
		
	}
?>