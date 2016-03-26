<?php
/**
 * Example Application
 *
 * @package Example-application
 */
require 'con_pdct.php';
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

	case 'BillingContractUpdate':
		$index->BillingContractUpdate();
		break;

	case 'BillingContractUpdateAct':
		$index->BillingContractUpdateAct();
		break;

	case 'DetailContract':
		$index->DetailContract();
		break;

	case 'UnlinkFileFPNO':
		$index->UnlinkFileFPNO();
		break;

	case 'UnlinkFileSPK':
		$index->UnlinkFileSPK();
		break;

	case 'UnlinkFileSK':
		$index->UnlinkFileSK();
		break;

	case 'UnlinkFileCN':
		$index->UnlinkFileCN();
		break;

	case 'UnlinkFileBAST':
		$index->UnlinkFileBAST();
		break;

	case 'UnlinkFileBASO':
		$index->UnlinkFileBASO();
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

 

//End Case PDCT Contract 

//Start Case PDCT Billing
	case 'DetailBilling':
		$index->DetailBilling();
		break;

	case 'DetailBillingAdd':
		$index->DetailBillingAdd();
		break;

	case 'DetailBillingProAdd':
		$index->DetailBillingProAdd();
		break;

	case 'DetailBillingUpdate':
		$index->DetailBillingUpdate();
		break;

	case 'DetailBillingProUpdate':
		$index->DetailBillingProUpdate();
		break;

	case 'DetailBillingDelete':
		$index->DetailBillingDelete();
		break;

	case 'DetailBillingDetail':
		$index->DetailBillingDetail();
		break;

	case 'DetailContractSendMail':
		$index->DetailContractSendMail();
		break;

//End Case PDCT Contract 

	default:
		$index->View();
		break;
}