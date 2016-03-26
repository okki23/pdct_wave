				SKRIP INSERT
				//00000 //0
				if(empty($no_spk) && empty($surat_kesanggupan) && empty($contract_number) && empty($bast) && empty($baso)){
				echo "<br> spk kosong dan sk kosong dan cn kosong dan bast kosong dan baso kosong <br>";
				
				 					 
					$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,contract_date,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]','$surat_kesanggupan',now(),'$_SESSION[username]',
								'$contract_number',now(),'$_SESSION[username]','$contract_date','$bast',now(),'$_SESSION[username]','$baso',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting',
								'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";
 
				//x0000 //1
				}else if(!empty($no_spk) && empty($surat_kesanggupan) && empty($contract_number) && empty($bast) && empty($baso)){
					echo "spk 0 0 0 0";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	//validasi  
					if(in_array($vno_spk,$extensi)){
						 
						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
								contract_date,account_no,sid,cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,
								user_insert,date_insert) VALUES (null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]',
								'$contract_date','$acc_no','$sid','$cid','$starting','$ending','$masa_kontrak','$contract_status',
								'$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";
						
						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
						 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//xx000 //2
				}elseif (!empty($no_spk) && !empty($surat_kesanggupan) && empty($contract_number) && empty($bast) && empty($baso)) {
				echo "spk sk 0 0 0 ";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	//validasi  
					if(in_array($vno_spk,$extensi) && in_array($vsurat_kesanggupan, $extensi)){
						if($sno_spk >= 2000000 && $sizesurat_kesanggupan >= 2000000){
							 echo "<script language=javascript>
					                    alert('File yang anda upload Melebihi 2MB!');
					                    window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
					                 </script>";
						}

						$sql = "update pdct_contract set contract_level = '$cont_level', no_spk_p8_file = '$no_spk', 
								no_spk_p8_date_edit = now(), no_spk_p8_who_edit = '$_SESSION[username]',  surat_kesanggupan_file = '$surat_kesanggupan',
								surat_kesanggupan_date_edit = now() ,surat_kesanggupan_who_edit = '$_SESSION[username]', account_no = '$acc_no',
							    sid = '$sid', cid = '$cid', start_date = '$starting', ending_date = '$ending', masa_kontrak = '$masa_kontrak',
								account_manager = '$acc_manager', email = '$email', phone = '$phone', otc = '$otc', monthly = '$monthly',
								total = '$total', end_user ='$end_usera', billing_periode = '$bill_period', fp_no = '$fpno',
								bill = '$bill', paid = '$paid', id_charges = '$charges', useredit = '$_SESSION[username]', date_edit = now()
								where id = '$id' AND id_customer = '$idcust'";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//xxxxx //5
				}else if(!empty($no_spk) && !empty($surat_kesanggupan) && !empty($contract_number) && !empty($bast) && !empty($baso)){
				echo "spk sk cn bast baso";

					$extensi = array("pdf","jpg","jpeg");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vsurat_kesanggupan, $extensi) && in_array($vcontract_number, $extensi) && in_array($vbast, $extensi) && in_array($vbaso, $extensi)){
					 
						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
								surat_kesanggupan_file,surat_kesanggupan_date_upload, surat_kesanggupan_who_upload,contract_number_file,contract_number_date_upload,
								contract_number_who_upload,contract_date,bast_file,bast_date_upload,bast_who_upload,baso_file,baso_date_upload,baso_who_upload,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]','$surat_kesanggupan',now(),'$_SESSION[username]',
								'$contract_number',now(),'$_SESSION[username]','$contract_date','$bast',now(),'$_SESSION[username]','$baso',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting',
								'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

  						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);
					}else{
						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				//0x000 //2
				}elseif (empty($no_spk) && !empty($surat_kesanggupan) && empty($contract_number) && empty($bast) && empty($baso)) {
				echo "0 sk 0 0 0";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vsurat_kesanggupan, $extensi)){
						if($sizesurat_kesanggupan >= 2000000){
							 echo "<script language=javascript>
					                    alert('File yang anda upload Melebihi 2MB!');
					                    window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
					                 </script>";
						}

					$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,surat_kesanggupan_file,surat_kesanggupan_date_upload, surat_kesanggupan_who_upload,
								contract_date,account_no,sid,cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert)
								VALUES (null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$surat_kesanggupan',now(),'$_SESSION[username]','$contract_date','$acc_no','$sid','$cid',
								'$starting','$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						 
					move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						 

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				//xxx00 //3	
				}elseif (!empty($no_spk) && !empty($surat_kesanggupan) && !empty($contract_number) && empty($bast) && empty($baso)) {
				echo "spk sk cn 0 0";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vsurat_kesanggupan, $extensi) && in_array($vcontract_number, $extensi)){
					 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
								surat_kesanggupan_file,surat_kesanggupan_date_upload, surat_kesanggupan_who_upload,contract_number_file,contract_number_date_upload,
								contract_number_who_upload,contract_date,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]','$surat_kesanggupan',now(),'$_SESSION[username]',
								'$contract_number',now(),'$_SESSION[username]','$contract_date','$acc_no','$sid','$cid','$starting',
								'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
					 

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//0xx00 //3
				}elseif (empty($no_spk) && !empty($surat_kesanggupan) && !empty($contract_number) && empty($bast) && empty($baso)) {
				echo "0 sk cn 0 0";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vsurat_kesanggupan, $extensi) && in_array($vcontract_number, $extensi)){
						 
				$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan, surat_kesanggupan_file,surat_kesanggupan_date_upload, surat_kesanggupan_who_upload,contract_number_file,contract_number_date_upload,
								contract_number_who_upload,contract_date,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$surat_kesanggupan',now(),'$_SESSION[username]',
								'$contract_number',now(),'$_SESSION[username]','$contract_date','$acc_no','$sid','$cid','$starting',
								'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						 
						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						 

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//00x00 //3	
				}elseif (empty($no_spk) && empty($surat_kesanggupan) && !empty($contract_number) && empty($bast) && empty($baso)) {
				echo "0 0 cn 0 0";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vcontract_number, $extensi)){
						if($scontract_number >= 2000000){
							 echo "<script language=javascript>
					                    alert('File yang anda upload Melebihi 2MB!');
					                    window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
					                 </script>";
						}

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,contract_number_file,contract_number_date_upload,
								contract_number_who_upload,contract_date,account_no,sid,cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager,
								email,phone,otc,monthly,total,user_insert,date_insert) VALUES (null,$idcust,'$site_code','$contract_level','$nama_pekerjaan',
								'$contract_number',now(),'$_SESSION[username]','$contract_date','$acc_no','$sid','$cid','$starting','$ending','$masa_kontrak',
								'$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}				

				//x0x00 //3
				}elseif (!empty($no_spk) && empty($surat_kesanggupan) && !empty($contract_number) && empty($bast) && empty($baso)) {
				echo "spk 0 cn 0 0";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vcontract_number, $extensi)){
						 
					$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
							contract_number_file,contract_number_date_upload,contract_number_who_upload,contract_date,account_no,sid, cid,start_date,ending_date,masa_kontrak,
							contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES (null,$idcust,'$site_code','$contract_level',
							'$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]','$contract_number',now(),'$_SESSION[username]','$contract_date',
							'$acc_no','$sid','$cid','$starting','$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
 						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
 					
 					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}				

				//0x000 //3
				}elseif (empty($no_spk) && !empty($surat_kesanggupan) && empty($contract_number) && empty($bast) && empty($baso)) {
				echo "0 sk 0 0 0";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vsurat_kesanggupan, $extensi)){
						 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,surat_kesanggupan_file,surat_kesanggupan_date_upload, surat_kesanggupan_who_upload,
								contract_date,account_no,sid,cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$surat_kesanggupan',now(),'$_SESSION[username]','$contract_date','$acc_no','$sid','$cid','$starting',
								'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//xxxx0 //4
				}elseif (!empty($no_spk) && !empty($surat_kesanggupan) && !empty($contract_number) && !empty($bast) && empty($baso)) {
				echo "spk sk cn bast 0";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vsurat_kesanggupan, $extensi) && in_array($vcontract_number, $extensi) && in_array($vbast, $extensi)){
						 
					$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
								surat_kesanggupan_file,surat_kesanggupan_date_upload, surat_kesanggupan_who_upload,contract_number_file,contract_number_date_upload,
								contract_number_who_upload,contract_date,bast_file,bast_date_upload,bast_who_upload,account_no,sid,cid,start_date,ending_date,masa_kontrak,
								contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]','$surat_kesanggupan',now(),'$_SESSION[username]',
								'$contract_number',now(),'$_SESSION[username]','$contract_date','$bast',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting',
								'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//0xxx0 //4		
				}elseif (empty($no_spk) && !empty($surat_kesanggupan) && !empty($contract_number) && !empty($bast) && empty($baso)) {
				echo "0 sk cn bast 0";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vsurat_kesanggupan, $extensi) && in_array($vcontract_number, $extensi) && in_array($vbast, $extensi)){
					 

					$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,surat_kesanggupan_file,surat_kesanggupan_date_upload, 
							surat_kesanggupan_who_upload,contract_number_file,contract_number_date_upload, contract_number_who_upload,contract_date,bast_file,
							bast_date_upload,bast_who_upload,account_no,sid, cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,
							monthly,total, user_insert,date_insert) VALUES (null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$surat_kesanggupan',now(),'$_SESSION[username]',
							'$contract_number',now(),'$_SESSION[username]','$contract_date','$bast',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting',
							'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//00xx0 //4
				}elseif (empty($no_spk) && empty($surat_kesanggupan) && !empty($contract_number) && !empty($bast) && empty($baso)) {
				echo "0 0 cn bast 0";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vcontract_number, $extensi) && in_array($vbast, $extensi)){
						 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,contract_number_file,contract_number_date_upload,
								contract_number_who_upload,contract_date,bast_file,bast_date_upload,bast_who_upload,account_no,sid,cid,start_date,ending_date,masa_kontrak,
								contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES (null,$idcust,'$site_code','$contract_level',
								'$nama_pekerjaan','$contract_number',now(),'$_SESSION[username]','$contract_date','$bast',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting',
								'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//000x0 //4	
				}elseif (empty($no_spk) && empty($surat_kesanggupan) && empty($contract_number) && !empty($bast) && empty($baso)) {
				echo "0 0 0 bast 0";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vbast, $extensi)){
						 
						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,contract_date,bast_file,bast_date_upload,bast_who_upload,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$contract_date','$bast',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting',
								'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}				
				//x00x0 //4
				}elseif (!empty($no_spk) && empty($surat_kesanggupan) && empty($contract_number) && !empty($bast) && empty($baso)) {
				echo "spk 0 0 bast 0";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vbast, $extensi)){
						 
						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
								contract_date,bast_file,bast_date_upload,bast_who_upload,account_no,sid,cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, 
								email,phone,otc,monthly,total,user_insert,date_insert) VALUES 	(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]',
								'$contract_date','$bast',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting','$ending','$masa_kontrak','$contract_status','$acc_manager',
								'$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//xx0x0 //4
				}elseif (!empty($no_spk) && !empty($surat_kesanggupan) && empty($contract_number) && !empty($bast) && empty($baso)) {
				echo "spk sk 0 bast 0";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vsurat_kesanggupan, $extensi) && in_array($vbast, $extensi)){
						 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
								surat_kesanggupan_file,surat_kesanggupan_date_upload, surat_kesanggupan_who_upload,contract_date,bast_file,bast_date_upload,bast_who_upload,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]','$surat_kesanggupan',now(),'$_SESSION[username]',
								'$contract_date','$bast',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting','$ending','$masa_kontrak','$contract_status','$acc_manager',
								'$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
 						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}			
				//0x0x0 //4
				}elseif (empty($no_spk) && !empty($surat_kesanggupan) && empty($contract_number) && !empty($bast) && empty($baso)) {
				echo "0 sk 0 bast 0";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vsurat_kesanggupan, $extensi) && in_array($vbast, $extensi)){
						 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,surat_kesanggupan_file,surat_kesanggupan_date_upload, surat_kesanggupan_who_upload,
								contract_date,bast_file,bast_date_upload,bast_who_upload,account_no,sid, cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,
								monthly,total,user_insert,date_insert) VALUES (null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$surat_kesanggupan',now(),
								'$_SESSION[username]','$contract_date','$bast',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting','$ending','$masa_kontrak','$contract_status',
								'$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
 						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//x0xx0 //4
				}elseif (!empty($no_spk) && empty($surat_kesanggupan) && !empty($contract_number) && !empty($bast) && empty($baso)) {
				echo "spk 0 cn bast 0";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vcontract_number, $extensi) && in_array($vbast, $extensi)){
						 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
								contract_number_file,contract_number_date_upload,contract_number_who_upload,contract_date,bast_file,bast_date_upload,bast_who_upload,account_no,
								sid,cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]','$contract_number',now(),'$_SESSION[username]',
								'$contract_date','$bast',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting','$ending','$masa_kontrak','$contract_status','$acc_manager',
								'$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
 						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
 
					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				//0000x //5
				}elseif (empty($no_spk) && empty($surat_kesanggupan) && empty($contract_number) && empty($bast) && !empty($baso)) {
				echo "0 0 0 0 baso";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vbaso, $extensi)){			 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,contract_date,baso_date_upload,baso_who_upload,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan',$contract_date','$baso',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting',
								'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//000xx //5	
				}elseif (empty($no_spk) && empty($surat_kesanggupan) && empty($contract_number) && !empty($bast) && !empty($baso)) {
				echo "0 0 0 bast baso";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vbast, $extensi) && in_array($vbaso, $extensi)){
					 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,contract_date,bast_file,bast_date_upload,bast_who_upload,baso_file,baso_date_upload,
								baso_who_upload, account_no,sid,cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$contract_date','$bast',now(),'$_SESSION[username]','$baso',now(),'$_SESSION[username]','$acc_no','$sid','$cid',
								'$starting','$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//00xxx //5	
				}elseif (empty($no_spk) && empty($surat_kesanggupan) && !empty($contract_number) && !empty($bast) && !empty($baso)) {
				echo "0 0 cn bast baso";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vcontract_number, $extensi) && in_array($vbast, $extensi) && in_array($vbaso, $extensi)){
						
						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
								surat_kesanggupan_file,surat_kesanggupan_date_upload, surat_kesanggupan_who_upload,contract_number_file,contract_number_date_upload,
								contract_number_who_upload,contract_date,bast_file,bast_date_upload,bast_who_upload,baso_file,baso_date_upload,baso_who_upload,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]','$surat_kesanggupan',now(),'$_SESSION[username]',
								'$contract_number',now(),'$_SESSION[username]','$contract_date','$bast',now(),'$_SESSION[username]','$baso',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting',
								'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				//0xxxx //5					
				}elseif (empty($no_spk) && !empty($surat_kesanggupan) && !empty($contract_number) && !empty($bast) && !empty($baso)) {
				echo "0 sk cn bast baso";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vsurat_kesanggupan, $extensi) && in_array($vcontract_number, $extensi) && in_array($vbast, $extensi) && in_array($vbaso, $extensi)){
						

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,surat_kesanggupan_file,surat_kesanggupan_date_upload, surat_kesanggupan_who_upload,contract_number_file,contract_number_date_upload,
								contract_number_who_upload,contract_date,bast_file,bast_date_upload,bast_who_upload,baso_file,baso_date_upload,baso_who_upload,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$surat_kesanggupan',now(),'$_SESSION[username]','$contract_number',now(),
								'$_SESSION[username]','$contract_date','$bast',now(),'$_SESSION[username]','$baso',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting',
								'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				//0xx0x //5	
				}elseif (empty($no_spk) && !empty($surat_kesanggupan) && !empty($contract_number) && empty($bast) && !empty($baso)) {
				echo "0 sk cn 0 baso";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vsurat_kesanggupan, $extensi) && in_array($vcontract_number, $extensi) && in_array($vbaso, $extensi)){
						 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,surat_kesanggupan_file,surat_kesanggupan_date_upload,
								surat_kesanggupan_who_upload,contract_number_file,contract_number_date_upload, contract_number_who_upload,contract_date,baso_file,baso_date_upload,
								baso_who_upload,account_no,sid,dcid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$surat_kesanggupan',now(),'$_SESSION[username]','$contract_number',now(),'$_SESSION[username]','$contract_date',
								'$baso',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting',
								'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
 						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				
				//xxx0x //5
				}elseif (!empty($no_spk) && !empty($surat_kesanggupan) && !empty($contract_number) && empty($bast) && !empty($baso)) {
				echo "spk sk cn 0 baso";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vsurat_kesanggupan, $extensi) && in_array($vcontract_number, $extensi) && in_array($vbaso, $extensi)){
						 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
								surat_kesanggupan_file,surat_kesanggupan_date_upload, surat_kesanggupan_who_upload,contract_number_file,contract_number_date_upload,
								contract_number_who_upload,contract_date,baso_file,baso_date_upload,baso_who_upload,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]','$surat_kesanggupan',now(),'$_SESSION[username]',
								'$contract_number',now(),'$_SESSION[username]','$contract_date','$baso',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting',
								'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
 						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				//x0x0x //5
				}elseif (!empty($no_spk) && empty($surat_kesanggupan) && !empty($contract_number) && empty($bast) && !empty($baso)) {
				echo "spk 0 cn 0 baso";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vcontract_number, $extensi) && in_array($vbaso, $extensi)){
						 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
								contract_number_file,contract_number_date_upload, contract_number_who_upload,contract_date,baso_file,baso_date_upload,baso_who_upload,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]','$contract_number',now(),'$_SESSION[username]','$contract_date',
								'$baso',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting','$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly',
								'$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
 						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
 						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				//x0xxx //5
				}elseif (!empty($no_spk) && empty($surat_kesanggupan) && !empty($contract_number) && !empty($bast) && !empty($baso)) {
				echo "spk 0 cn bast baso";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vcontract_number, $extensi) && in_array($vbast, $extensi) && in_array($vbaso, $extensi)){
						 
						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
								contract_number_file,contract_number_date_upload,contract_number_who_upload,contract_date,bast_file,bast_date_upload,bast_who_upload,baso_file,baso_date_upload,
								baso_who_upload,account_no,sid, cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]','$contract_number',now(),'$_SESSION[username]','$contract_date','$bast',
								now(),'$_SESSION[username]','$baso',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting','$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone',
								'$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
 						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				//x00xx //5
				}elseif (!empty($no_spk) && empty($surat_kesanggupan) && empty($contract_number) && !empty($bast) && !empty($baso)) {
				echo "spk 0 0 bast baso";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vbast, $extensi) && in_array($vbaso, $extensi)){
						 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
								contract_date,bast_file,bast_date_upload,bast_who_upload,baso_file,baso_date_upload,baso_who_upload,account_no,sid, cid,start_date,ending_date,
								masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES (null,$idcust,'$site_code','$contract_level',
								'$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]','$contract_date','$bast',now(),'$_SESSION[username]','$baso',now(),'$_SESSION[username]','$acc_no',
								'$sid','$cid','$starting','$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
 						move_uploaded_file($_FILES['bast']['tmp_name'],"doc_uploads/bast/".$bast);
						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				//x000x //5
				}elseif (!empty($no_spk) && empty($surat_kesanggupan) && empty($contract_number) && empty($bast) && !empty($baso)) {
				echo "spk 0 0 0 baso";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vbaso, $extensi)){
						 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,contract_date,baso_file,baso_date_upload,baso_who_upload,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$contract_date','$baso',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting',
								'$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";


 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
 						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//xx00x //5
				}elseif (!empty($no_spk) && !empty($surat_kesanggupan) && empty($contract_number) && empty($bast) && !empty($baso)) {
				echo "spk sk 0 0 baso";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vno_spk,$extensi) && in_array($vsurat_kesanggupan, $extensi) && in_array($vbaso, $extensi)){
						 
						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,no_spk_p8_file,no_spk_p8_date_upload,no_spk_p8_who_upload,
								surat_kesanggupan_file,surat_kesanggupan_date_upload, surat_kesanggupan_who_upload,contract_date,baso_file,baso_date_upload,baso_who_upload,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$no_spk',now(),'$_SESSION[username]','$surat_kesanggupan',now(),'$_SESSION[username]',
								'$contract_date','$baso',now(),'$_SESSION[username]','$acc_no','$sid','$cid','$starting','$ending','$masa_kontrak','$contract_status','$acc_manager',
								'$email','$phone','$otc','$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['no_spk']['tmp_name'],"doc_uploads/spk/".$no_spk);
						move_uploaded_file($_FILES['surat_kesanggupan']['tmp_name'],"doc_uploads/sk/".$surat_kesanggupan);
 						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}

				//00x0x //5	
				}elseif (empty($no_spk) && empty($surat_kesanggupan) && !empty($contract_number) && empty($bast) && !empty($baso)) {
				echo "0 0 cn 0 baso";

					$extensi = array("doc","docx","xls","xlsx","pdf","jpg","jpeg","png");
			 	 	 
					if(in_array($vcontract_number, $extensi) && in_array($vbaso, $extensi)){
						 

						$sql = "insert into pdct_contract (id,id_customer,site_code,contract_level,nama_pekerjaan,contract_number_file,contract_number_date_upload,
								contract_number_who_upload,contract_date,baso_file,baso_date_upload,baso_who_upload,account_no,sid,
								cid,start_date,ending_date,masa_kontrak,contract_status_opt,account_manager, email,phone,otc,monthly,total,user_insert,date_insert) VALUES 
								(null,$idcust,'$site_code','$contract_level','$nama_pekerjaan','$contract_number',now(),'$_SESSION[username]','$contract_date','$baso',now(),
								'$_SESSION[username]','$acc_no','$sid','$cid','$starting','$ending','$masa_kontrak','$contract_status','$acc_manager','$email','$phone','$otc',
								'$monthly','$total','$_SESSION[username]',now())";

 						move_uploaded_file($_FILES['contract_number']['tmp_name'],"doc_uploads/cn/".$contract_number);
 						move_uploaded_file($_FILES['baso']['tmp_name'],"doc_uploads/baso/".$baso);

					}else{
  						echo "<script language=javascript>
	                    alert('File yang anda upload bukan dokumen yang diizinkan!');
	                     window.location='master_pdct.php?act=DetailContractAdd&idcust=$idcust';
	                    </script>";
					}
				}