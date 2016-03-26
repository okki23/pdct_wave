<?php
/**
 * Example Application
 *
 * @package Example-application
 */
require 'con_invoice.php';
$index = new Main();
$act = isset($_GET['act']) ? $_REQUEST['act'] : '';

switch ($act) {
//Start Case PDCT Customer
	case 'View':
		$index->View();
		break;


	case 'Add':
		$index->Add();
		break;

	case 'ProAdd':
		$index->ProAdd();
		break;

	case 'Update':
		$index->Update();
		break;

	case 'ProUpdate':
		$index->ProUpdate();
		break;

	case 'Delete':
		$index->Delete();
		break;

	case 'DetailList':
		$index->DetailList();
		break;

	case 'DetailContract':
		$index->DetailContract();
		break;
//End Case PDCT Customer


//Start Case PDCT Contract
	case 'DetailContractAdd':
		$index->DetailContractAdd();
		break;

	case 'DetailContractProAdd':
		$index->DetailContractProAdd();
		break;

	case 'DetailContractUpdate':
		$index->DetailContractUpdate();
		break;

	case 'DetailContractProUpdate':
		$index->DetailContractProUpdate();
		break;

	case 'DetailContractDelete':
		$index->DetailContractDelete();
		break;

	case 'DetailContractSendMail':
		$index->DetailContractSendMail();
		break;

//End Case PDCT Contract 

	default:
		$index->View();
		break;
}