<?php
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
//include_once 'classes/database.class.php';
include_once 'classes/user.class.php';
$objU		=	new user();
$msg 			= isset($_REQUEST['msg'])	? $_REQUEST['msg']		: '';
$color 			= isset($_REQUEST['color'])	? $_REQUEST['color']	: 'red';

$arrPhoto		=	$objU->viewPhoto();
//print_r($arrPhoto);
if(isset($_POST['sent']))
{
if(count($_POST['client_id'])>=0)
	{
			
				 $checked=$_POST['client_id'];
				
				
			foreach($checked as $delval)
			{
			$msg			= 	$objU->deletePhoto($delval);	
			
			}
			
				
	}
	}
	
	$arrPhoto		=	$objU->viewPhoto();


include("templates/viewPhoto.tpl.php");

?>