<?php
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
//include_once 'classes/database.class.php';
include_once 'classes/user.class.php';

$page_heading="New Client";
$objU		=	new user();

$msg 			= isset($_REQUEST['msg'])	? $_REQUEST['msg']		: '';
$color 			= isset($_REQUEST['color'])	? $_REQUEST['color']	: 'red';
$date			=	date('yy-mm-dd');

/* $contact_id		=	$_GET['id'];
 $email_id			=	$_GET['eid'];

$arrContact		=	$objU->getContact($contact_id);

$arrEmail		=	$objU->getEmaillist($email_id);

//$email			=	$arrContact[0]['email'];
if($contact_id=="")
{
 $email		= $arrEmail['email_from'];
}
else
{
$email			=	$arrContact[0]['email'];
}*/


//print_r($arrContact);
	if(isset($_POST['add_x']))
		{
		/*if($contact_id)
		{*/
		
		
		$msg 			=	$objU->add_user($_POST);
		//$id=mysql_insert_id();
	//	}
		
		if($msg =="")
			{
		$msg		='New client added successfully!';
		//header("location:listCient.php?msg=$msg&color=$color");
			}
		}
		
	
	if(isset($_POST['submit_x']))
		{
		$msg 			=	$objU->add_user($_POST);
		$id=mysql_insert_id();
		
		
		if($msg =="")
			{
		//$msg		='New client added successfully!';
		header("location:clientSheet.php?id=".$id."");
		
			}
		}
		
	
	
//include("templates/index_top.tpl.php");
include("templates/addClient.tpl.php");


?>