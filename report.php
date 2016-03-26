<?php
/**
 * Example Application
 *
 * @package Example-application
 */
require 'con_report.php';
$index = new Main();
$act = isset($_GET['act']) ? $_REQUEST['act'] : '';

switch ($act) {
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
  
	default:
		$index->View();
		break;
}