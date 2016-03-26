<?php
require ('libs/Smarty.class.php');
require ('config.php');
require ('fn_protect.php');
require ('user_cek.php');


class Main {
	
		//Start Method PDCT Customer
 
		function View(){
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		//$sql = "select *, datediff(ending_date,current_date()) as selisih from pdct_customer where visibility = 'Y'";
		$sql = "select a.*,b.status from pdct_customer a
		left join status b on b.id = a.id_status where a.visibility = 'Y'";
		$exsql = $db->Execute($sql);
		while ($row = $exsql->FetchRow()) {
			$list[] = array("id"=>$row['id'],"no_project"=>$row['no_project'],
				"cc_name"=>$row['cc_name'],"customer_name"=>$row['customer_name'],"site_name"=>$row['site_name'],"nama_pekerjaan"=>$row['nama_pekerjaan'],"status"=>$row['status']);

		}

		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		$smarty->assign("list",$list);
		$smarty->assign("session",$_SESSION['username']);
	 	$smarty->assign("sessionlevel",$_SESSION['level']);
	 	$smarty->assign("namauser",$_SESSION['namauser']);
		$smarty->display("invoice.tpl");
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
		$status_opt = $this->status_opt();
		$smarty->assign("status_opt",$status_opt);
		$charges_opt = $this->charges_opt();
		$smarty->assign("charges_opt",$charges_opt);
	 	$smarty->assign("session",$_SESSION['username']);
	 	$smarty->assign("sessionlevel",$_SESSION['level']);
	 	$smarty->assign("namauser",$_SESSION['namauser']);
		$smarty->display("pdct_add.tpl");			
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
		$pro_no = protect($_POST['pro_no']);
		$cc_name = protect($_POST['cc_name']);
		$site_name = protect($_POST['site_name']);
		$nama_pekerjaan = protect($_POST['nama_pekerjaan']);
		$status = protect($_POST['status']);

	  
	 
        $sql = "insert into pdct_customer (id,customer_name,no_project,cc_name,site_name,nama_pekerjaan,id_status,
        	visibility,userinsert,date_insert) 
		values
		(null,'$cust_name','$pro_no','$cc_name','$site_name','$nama_pekerjaan',$status,'Y','$_SESSION[username]',now())";
		 
	 	 
		$exsql = $db->Execute($sql);
		
		if($exsql){
			  echo "<script language=javascript>
	                    alert('Terima Kasih, Berhasil Menambah Data');
	                    window.location='master_pdct.php';
	                 </script>";
			}else{
				  echo "<script language=javascript>
	                    alert('Maaf, Gagal Menambah Data');
	                     window.location='master_pdct.php';
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
		$sql = "select a.*,b.status from pdct_customer a 
		left join status b on b.id = a.id_status where a.id = '$id'";
		$exsql = $db->Execute($sql);
	 	$data = $exsql->FetchRow();

	 	$smarty->assign("id",$data['id']);
	 	$smarty->assign("no_project",$data['no_project']);
	 	$smarty->assign("customer_name",$data['customer_name']);
	 	$smarty->assign("cc_name",$data['cc_name']);
	 	$smarty->assign("site_name",$data['site_name']);
	 	$smarty->assign("nama_pekerjaan",$data['nama_pekerjaan']);
	 	$smarty->assign("status",$data['status']);

	  
 	 	$status_opt = $this->status_opt($data['id_status']);
		$smarty->assign("status_opt",$status_opt);
		 
		$smarty->assign("session",$_SESSION['username']);
	 	$smarty->assign("sessionlevel",$_SESSION['level']);
	 	$smarty->assign("namauser",$_SESSION['namauser']);
		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		 
		$smarty->display("pdct_edit.tpl");
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
		$pro_no = protect($_POST['pro_no']);
		$cc_name = protect($_POST['cc_name']);
		$site_name = protect($_POST['site_name']);
		$nama_pekerjaan = protect($_POST['nama_pekerjaan']);
		$status = protect($_POST['status']);
 
 		$sql = "update pdct_customer set
		customer_name = '$cust_name', no_project = '$pro_no', 
		cc_name = '$cc_name', site_name = '$site_name', 
		nama_pekerjaan = '$nama_pekerjaan', id_status='$status',
		useredit = '$_SESSION[username]',date_edit= now()
		where id = '$idpdct'";
 
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
		$sqldata = "update pdct_customer set visibility = 'N',userdelete = '$_SESSION[username]' ,date_delete = now() where id = '$id'"; 
		 
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

		function DetailContract(){
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$id = $_GET['idcust'];

		//get info customer
		$sqlcust = "select a.*,b.status from pdct_customer a
		left join status b on b.id = a.id_status where a.visibility = 'Y' AND a.id = '$id'";
		$exsqlcust = $db->Execute($sqlcust);
		$datacust = $exsqlcust->FetchRow();
		$smarty->assign("id",$datacust['id']);
		$smarty->assign("customer_name",$datacust['customer_name']);
		$smarty->assign("no_project",$datacust['no_project']);
		$smarty->assign("cc_name",$datacust['cc_name']);
		$smarty->assign("site_name",$datacust['site_name']);
		$smarty->assign("nama_pekerjaan",$datacust['nama_pekerjaan']);
		$smarty->assign("status",$datacust['status']);

 		 
		$sqlcontract = "select *,datediff(ending_date,current_date()) as selisih from pdct_contract where id_customer = '$datacust[id]' AND visibility = 'Y'";
		$exsqlcontract = $db->Execute($sqlcontract);
		 
 	 
		while ($row = $exsqlcontract->FetchRow()) {
			$listcont[] = array("id"=>$row['id'],
				"idcust"=>$row['id_customer'],
				"contract_level"=>$row['contract_level'],
				"account_no"=>$row['account_no'],
				"cid"=>$row['cid'],"sidnya"=>$row['sid'],
				"starting"=>tgl_indo($row['start_date']),
				"selisih"=>$row['selisih'],
				"ending"=>tgl_indo($row['ending_date']));

		}

		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		$smarty->assign("list",$listcont);
		$smarty->assign("session",$_SESSION['username']);
	 	$smarty->assign("sessionlevel",$_SESSION['level']);
	 	$smarty->assign("namauser",$_SESSION['namauser']);
		$smarty->assign("idcust",$id);
		$smarty->display("pdct_contract_detail_view.tpl");
		}

		function DetailList(){
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
		include "fn_rupiah.php";
		$moneyFormat = new moneyFormat();
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		$id = $_GET['id'];
		$sql = "select a.*,b.status,c.charges from pdct_customer a left join status b on b.id = a.id_status
		left join charges c on c.id = a.id_charges where a.id = '$id'";
		$exsql = $db->Execute($sql);
	 	$data = $exsql->FetchRow();

	 	$smarty->assign("id",$data['id']);
	 	$smarty->assign("no_project",$data['no_project']);
	 	$smarty->assign("customer_name",$data['customer_name']);
	 	$smarty->assign("cc_name",$data['cc_name']);
	 	$smarty->assign("site_name",$data['site_name']);
	 	$smarty->assign("nama_pekerjaan",$data['nama_pekerjaan']);
	 	$smarty->assign("status",$data['status']);

	 	$smarty->assign("contract_level",$data['contract_level']);
	 	$smarty->assign("no_spk_p8_file",$data['no_spk_p8_file']);
	 	$smarty->assign("surat_kesanggupan_file",$data['surat_kesanggupan_file']);
	 	$smarty->assign("contract_number_file",$data['contract_number_file']);
	 	$smarty->assign("bast_file",$data['bast_file']);
	 	$smarty->assign("baso_file",$data['baso_file']);
	 	$smarty->assign("account_no",$data['account_no']);
	 	$smarty->assign("sid",$data['sid']);
	 	$smarty->assign("cid",$data['cid']);
	 	$smarty->assign("start_date",tgl_indo($data['start_date']));
	 	$smarty->assign("ending_date",tgl_indo($data['ending_date']));
	 	$smarty->assign("masa_kontrak",$data['masa_kontrak']);
	 	$smarty->assign("account_manager",$data['account_manager']);
	 	$smarty->assign("email",$data['email']);
	 	$smarty->assign("phone",$data['phone']);
	 	$smarty->assign("otc",number_format($data['otc'],0,".",","));
	 	$smarty->assign("monthly",number_format($data['monthly'],0,".",","));
	 	$smarty->assign("total",number_format($data['total'],0,".",","));
	 	$smarty->assign("end_user",$data['end_user']);
	 	$smarty->assign("billing_periode",$data['billing_periode']);
	 	$smarty->assign("fp_no",$data['fp_no']);
	 	$smarty->assign("bill",number_format($data['bill'],0,".",","));
	 	$smarty->assign("paid",$data['paid']);
	 	$smarty->assign("id_charges",$data['id_charges']);
	 	$smarty->assign("charges",$data['charges']);

	 	$smarty->assign("status",$data['status']);
	 	 
		$terbilang_month = $moneyFormat->terbilang($data['monthly']);
	 	$smarty->assign("terbilang_month",$terbilang_month);

	 	$terbilang_otc = $moneyFormat->terbilang($data['otc']);
	 	$smarty->assign("terbilang_otc",$terbilang_otc);

	 	$terbilang_total = $moneyFormat->terbilang($data['total']);
	 	$smarty->assign("terbilang_total",$terbilang_total);

	 	$terbilang_bill = $moneyFormat->terbilang($data['bill']);
	 	$smarty->assign("terbilang_bill",$terbilang_bill);

	 	$status_opt = $this->status_opt($data['id_status']);
		$smarty->assign("status_opt",$status_opt);
		$charges_opt = $this->charges_opt($data['id_charges']);
		$smarty->assign("charges_opt",$charges_opt);
		$smarty->assign("session",$_SESSION['username']);
	 	$smarty->assign("sessionlevel",$_SESSION['level']);
	 	$smarty->assign("namauser",$_SESSION['namauser']);
		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);

		 
		$smarty->display("pdct_detail.tpl");
		}

 
		//End Method PDCT Customer

		
		
		
	}
?>