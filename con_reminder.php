<?php
require ('libs/Smarty.class.php');
require ('config.php');
require ('fn_protect.php');
require ('user_cek.php');


class Main {


		//Start Method PDCT Reminder
 
		function View(){
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;

		//$sql = "select *, datediff(ending_date,current_date()) as selisih from pdct_customer where visibility = 'Y'";
		$sql = "select a.*,b.is_sent,c.contract_status,datediff(ending_date,current_date()) as selisih from pdct_contract a
left join pdct_email_delivery b on b.id_contract = a.id
left join pdct_contract_status c on c.id = a.contract_status_opt
where datediff(ending_date,current_date()) <= 90 
and a.contract_status_opt NOT IN (3,5)
order by a.id";
		$exsql = $db->Execute($sql); 
		$avail = $exsql->RecordCount();
		if($avail > 0){
			while ($row = $exsql->FetchRow()) {
			    $list[] = array("id"=>$row['id'],
				"idcust"=>$row['id_customer'],
				"site_code"=>$row['site_code'],
				"contract_level"=>$row['contract_level'],
				"nama_pekerjaan"=>$row['nama_pekerjaan'],
				"account_no"=>$row['account_no'],
				"cid"=>$row['cid'],"sidnya"=>$row['sid'],
				"starting"=>tgl_indo($row['start_date']),
				"is_sent"=>$row['is_sent'],
				"selisih"=>$row['selisih'],
				"contract_status"=>$row['contract_status'],
				"ending"=>tgl_indo($row['ending_date']));

			}


		}else{
			 $list[] = array("id"=>'',
				"idcust"=>'',
				"site_code"=>'',
				"contract_level"=>'',
				"nama_pekerjaan"=>'',
				"account_no"=>'',
				"cid"=>'',"sidnya"=>'',
				"starting"=>'',
				"is_sent"=>'',
				"selisih"=>'',
				"contract_status"=>'',
				"ending"=>'');
		}
		

		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
		$smarty->assign("list",$list);
		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->display("reminder_view.tpl");
		}

		function ContractReminderDetail(){
	 
		global $title,$db,$footer;
		include "fn_tgl_indo.php";
		include "fn_rupiah.php";
		$moneyFormat = new moneyFormat();
		$smarty = new Smarty;
 		//$smarty->force_compile = true;
		$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 0;
		
		//get info customer
		$id = $_GET['id'];

		$sql = "select a.*,b.contract_status as cn_status, c.project_no,c.id_customer_name,d.customer_name,
		c.cc_name,c.site_name from pdct_contract a 
		left join pdct_contract_status b on b.id = a.contract_status_opt 
		left join pdct_customer c on c.id = a.id_customer
		left join pdct_customer_name d on d.id = c.id_customer_name
		where a.id = '$id'";
 
		$exsql = $db->Execute($sql);
		$data = $exsql->FetchRow();

		$smarty->assign("id",$data['id']);
	 	$smarty->assign("project_no",$data['project_no']);
	 	$smarty->assign("customer_name",$data['customer_name']);
	 	$smarty->assign("cc_name",$data['cc_name']);
	 	$smarty->assign("site_name",$data['site_name']);
	 	$smarty->assign("site_code",$data['site_code']);
	 	$smarty->assign("nama_pekerjaan",$data['nama_pekerjaan']);
	 	 
	 	$smarty->assign("cn_status",$data['cn_status']);
	  
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
  
	 	 
		$terbilang_month = $moneyFormat->terbilang($data['monthly']);
	 	$smarty->assign("terbilang_month",$terbilang_month);

	 	$terbilang_otc = $moneyFormat->terbilang($data['otc']);
	 	$smarty->assign("terbilang_otc",$terbilang_otc);

	 	$terbilang_total = $moneyFormat->terbilang($data['total']);
	 	$smarty->assign("terbilang_total",$terbilang_total);
 	 
		 
		$smarty->assign("footer",$footer);
		$smarty->assign("title",$title);
 
		$smarty->assign("username",$_SESSION['username']);
	 	$smarty->assign("level_user",$_SESSION['level_user']);
	 	$smarty->assign("nama_pegawai",$_SESSION['nama_pegawai']);
		$smarty->display("reminder_detail.tpl");

		}

		function ContractReminderSendMail(){
 
		global $title,$db,$footer;
		require 'phpmailer/PHPMailerAutoload.php';
 	 
		$id = $_GET['id'];
		
		$sql_sent = "insert into pdct_email_delivery (id,id_contract,is_sent,sent_by,sent_date) VALUES (null,$id,'Y','$_SESSION[username]',now())";
		$exsql_sent = $db->Execute($sql_sent);


		//get_email_teks
		$sqlmail = "select * from pdct_email where active = 'Y'";
		$exsqlmail = $db->Execute($sqlmail);
		$datamail = $exsqlmail->FetchRow();

		$mail = new PHPMailer;
		                               
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'okkisetyawan@gmail.com';                 // SMTP username
		$mail->Password = 'kutoarjo93';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to
	 
		
		
		$sql = "select * from pdct_contract where id = '$id'";
		$exsql = $db->Execute($sql);
		$row = $exsql->FetchRow();
		$penerima = $row['email'];
		$acc_manager = $row['account_manager'];
		 
		$mail->setFrom('okkisetyawan@gmail.com', 'Pengirim');
		$mail->addAddress($row['email'], 'Penerima');     // Add a recipient
		$mail->addReplyTo('okkisetyawan@gmail.com', 'Information');
 
 		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = 'Notifikasi Kontrak Per 3 Bulan';
		$mail->Body    = 'Dear'.$row['account_manager'].'<br>'.$datamail['isi_email'].'';
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		  	echo "<script language=javascript>
	           	alert('Email berhasil dikirim kepada $penerima');
	            window.location='reminder.php';
	        </script>";
		}
		 
 
		 
		} 
	 	//Ending Method PDCT Reminder
		
	}
?>