<?php
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
$page_heading="Potential Clients";
$objU		=	new user();
//$result 			=	$objU->notDeposted();



if(isset($_POST['contactus']))
	{
	
				
				 $checked=$_POST['register_id'];
				
			foreach($checked as $delval)
			{
			$msg			= 	$objU->deleteReg_Contact($delval);	
			}	
				
		
	}
	
	
	
	if(isset($_POST['quote']))
	{
					
				 $checked=$_POST['register_quoteid'];
				
			//	print_r($checked); exit;
				
			foreach($checked as $delval)
			{
			$msg			= 	$objU->deleteReg_quote($delval);	
			}	
				
		
	}
	

$arrRegister_contact	=	$objU->listregister_Contact();

$arrRegister_quote	=	$objU->listregister_quote();


include("templates/register_contact.php.tpl.php");

?>