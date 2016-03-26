<?php
include "config.php";
	
if (isset($_GET['input_pronumb']))
	{
		$input_pronumb = $_GET['input_pronumb'];
		
		$query = "SELECT * FROM nama_project WHERE no_project LIKE '%$input_pronumb%' AND visibility = 'Y' order by id_project asc limit 10"; //query mencari hasil search
		$exquery = $db->Execute($query);

		$hasil = $exquery->RecordCount();
		if ($hasil > 0)
		{
			while ($data = $exquery->FetchRow())
			{
				?>
				<a class="btn btn-primary" href="javascript:autoInsert('<?=$data[1]?>');"><?=$data[1]?> <?=$data[2]?> </a> <BR> <!-- hasil search -->
				<?php
			}
		}
		else
		{
			echo "<p class='btn btn-danger'>Data tidak ditemukan </p>";
		}
	
	}	


if (isset($_GET['inputan_cust_name']))
	{
		$inputan_cust_name = $_GET['inputan_cust_name'];
		
		$querycust = "SELECT * FROM pdct_customer_name WHERE customer_name LIKE '%$inputan_cust_name%' order by id asc limit 10"; //query mencari hasil search
		$exquerycust = $db->Execute($querycust);

		$hasilcust = $exquerycust->RecordCount();
		if ($hasilcust > 0)
		{
			while ($data = $exquerycust->FetchRow())
			{
				?>
				 <br>

         <a class="btn btn-primary" href="javascript:autoInsert('<?=$data[0]?>','<?=$data[1]?>');"><?=$data[1]?> </a> 
       
 		 

				  
           		  
				
				<?php
			}
		}
		else
		{
			echo "<p class='btn btn-danger'>Data tidak ditemukan </p>";
		}
	
	}	

 
	
	 
 
?>