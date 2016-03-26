<?php
/**
 * Example Application
 *
 * @package Example-application
 */
require 'con_billing_list.php';
$index = new Main();
$act = isset($_GET['act']) ? $_REQUEST['act'] : '';

switch ($act) {
//Start Case PDCT Billing List
	case 'View':
		$index->View();
		break;

 
//End Case PDCT Billing List
 	default:
		$index->View();
		break;
}