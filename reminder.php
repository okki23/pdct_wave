<?php
/**
 * Example Application
 *
 * @package Example-application
 */
require 'con_reminder.php';
$index = new Main();
$act = isset($_GET['act']) ? $_REQUEST['act'] : '';

switch ($act) {
//Start Case Reminder
	case 'View':
		  $index->View();
		  break;
	case 'ContractReminderDetail':
		  $index->ContractReminderDetail();
		  break;

	case 'ContractReminderSendMail':
		  $index->ContractReminderSendMail();
		  break;
//End Case Reminder
 
	default:
		$index->View();
		break;
}