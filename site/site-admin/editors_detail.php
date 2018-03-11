<?php
	session_start();
	include("loginchk.php");
	include_once '../../config/config.inc.php';
	include_once 'classes/user.class.php';
	$page_heading="Editor Login ";
	 $Cid = $_REQUEST['Cid'];
	$status = $_REQUEST['status'];
	$objU		=	new user();
	 $add = $_REQUEST['add'];
	 
	if($add == 1)
	{
	
		$result 			=	$objU->add_login($Cid,$status);	
		echo "<script language='javascript'>window.close();</script>";
	}
	$values			=	$objU->select_login_details($Cid,$status);
		
	$values2		=	$objU->select_login_details_for_contact_person($Cid,$status);		
	

	
		
	include("templates/editors_detail.tpl.php");
?>