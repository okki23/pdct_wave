<?php
/**
 * Example Application
 *
 * @package Example-application
 */
require 'con_extention_project_list.php';
$index = new Main();
$act = isset($_GET['act']) ? $_REQUEST['act'] : '';

switch ($act) {
//Start Case PDCT Extention Project List
	case 'View':
		$index->View();
		break;
 
//End Case PDCT Extention Project List

 

	default:
		$index->View();
		break;
}