<?php
	ob_start();
	include_once '../../config/config.inc.php';
include_once 'classes/admin.class.php';
$objA			= new admin();
	

	$objA->logout();
	$msg		= "Successfully Logged Out!";
	header("location:index.php?msg=$msg");
	
	
?>