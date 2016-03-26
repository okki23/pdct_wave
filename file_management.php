<?php
 
/**
 * Example Application
 *
 * @package Example-application
 */
require 'con_file_management.php';
$index = new Main();
$act = isset($_GET['act']) ? $_REQUEST['act'] : '';

switch ($act) {
//Start Case PDCT Customer
	case 'View':
		$index->View();
		break;

	case 'Del':
		$index->Del();
		break;
 

	default:
		$index->View();
		break;
}