<?php
/**
 * Example Application
 *
 * @package Example-application
 */
require 'con_404.php';
$index = new Main();
$act = isset($_GET['act']) ? $_REQUEST['act'] : '';

switch ($act) {
	case 'Login':
		$index->ShowLogin();
		break;

	case 'DoLogin':
		$index->DoLogin();
		break;

	case 'Logout':
		$index->Logout();
		break;
		
	case 'Auth_Login':
		$index->Auth_Login();
		break;
	
	default:
		$index->Index();
		break;
}