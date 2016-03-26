<?php
/**
 * Example Application
 *
 * @package Example-application
 */
require 'con_new_project_list.php';
$index = new Main();
$act = isset($_GET['act']) ? $_REQUEST['act'] : '';

switch ($act) {
//Start Case PDCT New Project List 
	case 'View':
		$index->View();
		break;

 
 
//End Case PDCT New Project List 

 	default:
		$index->View();
		break;
}