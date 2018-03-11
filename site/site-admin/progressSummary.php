<?php
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
$page_heading="Progress Summary ";
$objU		=	new user();
//$year		=	$_GET['year'];
//echo $year;
//$result 			=	$objU->search_school($year);
//print_r($result);

	/*if(isset($_POST['search']))
	{*/
		//$year = isset($_REQUEST['Year'])	? $_REQUEST['Year']		: '';
		$year		=	date("Y");
		$result 			=	$objU->search_school($year);
		$paidUser 			=	$objU->search_paid_user($year);
		$printUser			=	$objU->print_user($year);
		//print_r($printUser);
		//print_r($paidUser);
//	}



include("templates/progressSummary.tpl.php");
?>