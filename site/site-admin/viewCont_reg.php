<?php
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';

$objU			=	new user();

if(isset($_POST['add']))
{

		$to 			=$_POST['emailto'];
		$subject 		= 'Register-Contactus ';
		$message		.=	stripslashes($_POST['editor']);
		$from_add		=	$_POST['from'];
		$header		 	= "MIME-Version: 1.0" . "\r\n";
		$header		 .= 'From: '.$from_add.'' . "\r\n";
		$header 		.= "Content-type: text/html; charset=iso-8859-1\r\n";
						
	$msg1	=	mail($to, $subject, $message, $header);
//	$msg1	= $objH->addEmail_History($client_id,$date,$subject,$message,$school);
	
	if($msg1)
	{
	$msg		=	"Mail send successfully!";
	}
			
}


include("templates/viewCont_reg.tpl.php");
?>