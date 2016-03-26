<?php
/**
 * Example Application
 *
 * @package Example-application
 */
require 'con_project_status_list.php';
$index = new Main();
$act = isset($_GET['act']) ? $_REQUEST['act'] : '';

switch ($act) {
//Start Case PDCT Project Status List
	case 'View':
		$index->View();
		break;
 //End Case PDCT Project Status List
	default:
		$index->View();
		break;
}