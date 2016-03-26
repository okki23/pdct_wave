<?php
/**
 * Example Application
 *
 * @package Example-application
 */
require 'con_proforma_invoice.php';
$index = new Main();
$act = isset($_GET['act']) ? $_REQUEST['act'] : '';

switch ($act) {
//Start Case PDCT Agging Project List 
	case 'View':
		$index->View();
		break;
	case 'PrintProformaInvoice':
		$index->PrintPrintProformaInvoice();
		break;
 
 
//End Case PDCT  Agging Project List 

 	default:
		$index->View();
		break;
}