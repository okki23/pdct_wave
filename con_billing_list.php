<?php
require ('libs/Smarty.class.php');
require ('config.php');
require ('fn_protect.php');
require ('user_cek.php');


class Main {

		function customer_name_opt($selected = ''){
		global $db;
		$data = "select * from pdct_customer_name";
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
			
			$customer_name_opt[] = array('id'=>$row['id'],
				'selected'=>$selected_opt,
				'customer_name'=>$row['customer_name']);
			}
			
		}
		return $customer_name_opt;
		}

		function bill_period_opt($selected = ''){
		global $db;
		$data = "select id,bill_periode from pdct_billing GROUP BY bill_periode";
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
			
			$bill_period_opt[] = array('id'=>$row['id'],
				'selected'=>$selected_opt,
				'bill_periode'=>$row['bill_periode']);
			}
			
		}
		return $bill_period_opt;
		}
 
		//Start Method PDCT Billing List
 
		function View(){
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;
		 
		$caridata = isset($_REQUEST['caridata']) ? $_REQUEST['caridata'] : '';
		$id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
		 
		$start_date = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : '';
 		$ending_date = isset($_REQUEST['ending_date']) ? $_REQUEST['ending_date'] : '';
 		$start_date_send = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : '';
 		$ending_date_send = isset($_REQUEST['ending_date']) ? $_REQUEST['ending_date'] : '';
		$info = '';
 		$btnprint = '';
 		$sumtotalbill = 0;
		$sumtotalpaid = 0;
 		$sql = ""; 

	 
		if(empty($caridata)){
		$sql = ""; 		
	 
 		$list[] = array("id"=>"","contract_date"=>"","contract_number_file"=>"","nama_pekerjaan"=>"",
 						"cc_name"=>"","totalbillamount"=>"","totalpaid"=>"");
 		$id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
 		$namacustomer = "";
 		$start_date = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : '';
 		$ending_date = isset($_REQUEST['ending_date']) ? $_REQUEST['ending_date'] : '';
 		$start_date_send = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : '';
 		$ending_date_send = isset($_REQUEST['ending_date']) ? $_REQUEST['ending_date'] : '';
 		$info = '';
 		$sumtotalbill = 0;
		$sumtotalpaid = 0;
 		$btnprint = '';
	
		}

		//00
		if(!empty($caridata) && empty($id_customer_name) && empty($start_date) && empty($ending_date)){
		$sql = ""; 		
		$sumtotalbill = 0;
		$sumtotalpaid = 0;
 		$list[] = array("id"=>"","contract_date"=>"","contract_number_file"=>"","nama_pekerjaan"=>"",
 						"cc_name"=>"","totalbillamount"=>"","totalpaid"=>"");
 		$id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
 		$namacustomer = "";
 		$start_date = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : '';
 		$ending_date = isset($_REQUEST['ending_date']) ? $_REQUEST['ending_date'] : '';
 		$start_date_send = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : '';
 		$ending_date_send = isset($_REQUEST['ending_date']) ? $_REQUEST['ending_date'] : '';
 		$info = '';
 		$btnprint = '';
		
		//x0
		}elseif(!empty($caridata) && !empty($id_customer_name) && empty($start_date) && empty($ending_date)){
			$id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
			$start_date = "";
 		 	$ending_date = "";
 			$start_date_send = "";
 			$ending_date_send = "";
			
			
			$sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
 					b.site_code,b.contract_number_file,b.contract_date,b.nama_pekerjaan,
 					b.contract_status_opt, b.contract_date,c.charges,c.bill_periode,
 					c.bill_amount,d.customer_name, c.paid_status,sum(c.paid_amount) as totalpaid,
 					sum(c.bill_amount) as totalbillamount from pdct_customer a
					left join pdct_contract b on b.id_customer = a.id 
					left join pdct_billing c on c.id_contract = b.id
					left join pdct_customer_name d on d.id = a.id_customer_name 
					where a.id_customer_name = '$id_customer_name'  group by a.id";

			$exsql = $db->Execute($sql);
			$avail = $exsql->RecordCount();
				if($avail > 0){
					$sumtotalbill = 0;
					$sumtotalpaid = 0;

					while ($row = $exsql->FetchRow()) {
						$sumtotalbill += $row['totalbillamount'];
						$sumtotalpaid += $row['totalpaid'];
						$list[] = array("id"=>$row['id'],
								 "contract_number_file"=>$row['contract_number_file'],
								 "contract_date"=>$row['contract_date'],
								 "nama_pekerjaan"=>$row['nama_pekerjaan'],"cc_name"=>$row['cc_name'],
								 "totalpaid"=>number_format($row['totalpaid'],0,".","."),
								 "totalbillamount"=>number_format($row['totalbillamount'],0,".",".")); 
					 
					}
					$info = '<div class="alert alert-info" align="center">  <b>Data Tersedia Sebanyak '.$avail.' Data </b> </div>';
					$btnprint = '<button type="submit" name="print" class="btn btn-primary">
 						<i class="glyphicon glyphicon-print"> </i> Print Billing List </button>';
				}else{
					 
					$list[] = array("id"=>"","contract_date"=>"","contract_number_file"=>"","nama_pekerjaan"=>"",
 						"cc_name"=>"","totalbillamount"=>"","totalpaid"=>"");
					$info = '<div class="alert alert-danger" align="center"> <b>Data Tidak Ditemukan ! </b> </div>';
 					$btnprint = ''; 
 					$sumtotalbill = 0;
					$sumtotalpaid = 0;
				}
				

			//ambil nama customer : 
 			$sqlcust = "select * from pdct_customer_name where id = '$id_customer_name'";
 			$exsqlcust =$db->Execute($sqlcust);
 			$getcust = $exsqlcust->FetchRow();
 			$namacustomer = $getcust['customer_name'];
	
		
		//0x
		}elseif(!empty($caridata) && empty($id_customer_name) && !empty($start_date) && !empty($ending_date)){
			$id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
			$start_date = date('Y-m-d',strtotime($_POST['start_date']));
 		 	$ending_date = date('Y-m-d',strtotime($_POST['ending_date']));
 			$start_date_send = date('Y-m-d',strtotime($_POST['start_date']));
 			$ending_date_send = date('Y-m-d',strtotime($_POST['ending_date']));
			
			if($ending_date <= $start_date){
	 		 	 		
	 		echo "<script language=javascript>
	                    alert('Tanggal Akhir Tidak Boleh Lebih Kecil atau Sama Dengan Tanggal Mulai!');
	                     window.location='billing_list.php';
	                    </script>";
	                     

			} 

			
			$sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
 					b.site_code,b.contract_number_file,b.contract_date,b.nama_pekerjaan,
 					b.contract_status_opt, b.contract_date,c.charges,c.bill_periode,
 					c.bill_amount,d.customer_name, c.paid_status,sum(c.paid_amount) as totalpaid,
 					sum(c.bill_amount) as totalbillamount from pdct_customer a
					left join pdct_contract b on b.id_customer = a.id 
					left join pdct_billing c on c.id_contract = b.id
					left join pdct_customer_name d on d.id = a.id_customer_name 
					where b.contract_date BETWEEN '$start_date' and '$ending_date' group by a.id";

			$exsql = $db->Execute($sql);
			$avail = $exsql->RecordCount();
			if($avail > 0){
					$sumtotalbill = 0;
					$sumtotalpaid = 0;

					while ($row = $exsql->FetchRow()) {
						$sumtotalbill += $row['totalbillamount'];
						$sumtotalpaid += $row['totalpaid'];
						$list[] = array("id"=>$row['id'],
								 "contract_number_file"=>$row['contract_number_file'],
								 "contract_date"=>$row['contract_date'],
								 "nama_pekerjaan"=>$row['nama_pekerjaan'],"cc_name"=>$row['cc_name'],
								 "totalpaid"=>number_format($row['totalpaid'],0,".","."),
								 "totalbillamount"=>number_format($row['totalbillamount'],0,".",".")); 
					 
					}
					$info = '<div class="alert alert-info" align="center">  <b>Data Tersedia Sebanyak '.$avail.' Data </b> </div>';
					$btnprint = '<button type="submit" name="print" class="btn btn-primary">
 						<i class="glyphicon glyphicon-print"> </i> Print Billing List </button>';
				}else{
					 
					$list[] = array("id"=>"","contract_date"=>"","contract_number_file"=>"","nama_pekerjaan"=>"",
 						"cc_name"=>"","totalbillamount"=>"","totalpaid"=>"");
					$info = '<div class="alert alert-danger" align="center"> <b>Data Tidak Ditemukan ! </b> </div>';
 					$btnprint = ''; 
 					$sumtotalbill = 0;
					$sumtotalpaid = 0;
				}
				

			//ambil nama customer : 
 			$sqlcust = "select * from pdct_customer_name where id = '$id_customer_name'";
 			$exsqlcust =$db->Execute($sqlcust);
 			$getcust = $exsqlcust->FetchRow();
 			$namacustomer = $getcust['customer_name'];


	
		//xx
		}elseif(!empty($caridata) && !empty($id_customer_name) && !empty($start_date) && !empty($ending_date)){
			$id_customer_name = isset($_REQUEST['id_customer_name']) ? $_REQUEST['id_customer_name'] : '';
			$start_date = date('Y-m-d',strtotime($_POST['start_date']));
 		 	$ending_date = date('Y-m-d',strtotime($_POST['ending_date']));
 			$start_date_send = date('Y-m-d',strtotime($_POST['start_date']));
 			$ending_date_send = date('Y-m-d',strtotime($_POST['ending_date']));
			
			if($ending_date <= $start_date){
	 		 	 		
	 		echo "<script language=javascript>
	                    alert('Tanggal Akhir Tidak Boleh Lebih Kecil atau Sama Dengan Tanggal Mulai!');
	                     window.location='billing_list.php';
	                    </script>";
	                     

			} 



			$sql = "select a.id,a.id_customer_name,a.project_no,a.cc_name,a.site_name,
 					b.site_code,b.contract_number_file,b.contract_date,b.nama_pekerjaan,
 					b.contract_status_opt, b.contract_date,c.charges,c.bill_periode,
 					c.bill_amount,d.customer_name, c.paid_status,sum(c.paid_amount) as totalpaid,
 					sum(c.bill_amount) as totalbillamount from pdct_customer a
					left join pdct_contract b on b.id_customer = a.id 
					left join pdct_billing c on c.id_contract = b.id
					left join pdct_customer_name d on d.id = a.id_customer_name 
					where a.id_customer_name = '$id_customer_name'
					and b.contract_date BETWEEN '$start_date' and '$ending_date' group by a.id";

			$exsql = $db->Execute($sql);
			$avail = $exsql->RecordCount();

				if($avail > 0){
					$sumtotalbill = 0;
					$sumtotalpaid = 0;

					while ($row = $exsql->FetchRow()) {
						$sumtotalbill += $row['totalbillamount'];
						$sumtotalpaid += $row['totalpaid'];
						$list[] = array("id"=>$row['id'],
								 "contract_number_file"=>$row['contract_number_file'],
								 "contract_date"=>$row['contract_date'],
								 "nama_pekerjaan"=>$row['nama_pekerjaan'],"cc_name"=>$row['cc_name'],
								 "totalpaid"=>number_format($row['totalpaid'],0,".","."),
								 "totalbillamount"=>number_format($row['totalbillamount'],0,".",".")); 
					 
					}
					$info = '<div class="alert alert-info" align="center">  <b>Data Tersedia Sebanyak '.$avail.' Data </b> </div>';
					$btnprint = '<button type="submit" name="print" class="btn btn-primary">
 						<i class="glyphicon glyphicon-print"> </i> Print Billing List </button>';
				}else{
					 
					$list[] = array("id"=>"","contract_date"=>"","contract_number_file"=>"","nama_pekerjaan"=>"",
 						"cc_name"=>"","totalbillamount"=>"","totalpaid"=>"");
					$info = '<div class="alert alert-danger" align="center"> <b>Data Tidak Ditemukan ! </b> </div>';
 					$btnprint = ''; 
 					$sumtotalbill = 0;
					$sumtotalpaid = 0;
				}
				

			//ambil nama customer : 
 			$sqlcust = "select * from pdct_customer_name where id = '$id_customer_name'";
 			$exsqlcust =$db->Execute($sqlcust);
 			$getcust = $exsqlcust->FetchRow();
 			$namacustomer = $getcust['customer_name'];
	
		 

		}
		 

 
 

		$customer_name_opt = $this->customer_name_opt();
		$smarty->assign("customer_name_opt",$customer_name_opt);

		$bill_period_opt = $this->bill_period_opt();
		$smarty->assign("bill_period_opt",$bill_period_opt);
 
		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		$smarty->assign("btnprint",$btnprint);
		$smarty->assign("info",$info);
		$smarty->assign("sumtotalpaid",number_format($sumtotalpaid,0,".","."));
		$smarty->assign("sumtotalbill",number_format($sumtotalbill,0,".","."));
	
		$smarty->assign("id_customer_name",$id_customer_name);
		 
		$smarty->assign("list",$list);
		$smarty->assign("namacustomer",$namacustomer);
		$smarty->assign("start_date_send",$start_date_send);
		$smarty->assign("ending_date_send",$ending_date_send);
		$smarty->assign("start_date",tgl_indo($start_date));	
		$smarty->assign("ending_date",tgl_indo($ending_date));	
		 

		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->display("billing_list.tpl");
		}

		 
 
		//End Method PDCT Billing List


		 
		
	}
?>