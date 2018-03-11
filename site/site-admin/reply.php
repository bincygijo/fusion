<?php
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/history.class.php';

$objU		=	new user();
$objH		=	new history();

	$id		=	$_GET['id'];
$listEmail	=	$objU->getEmaillist($id);
 $email 	=	 $listEmail['email_from'];
//print_r($listEmail);
 $date			=	date('Y-m-d');
$cli_email		=	$objU->getSchoolEmail($email);
$client_id		=	 $cli_email['client_id'];
$school			=	$cli_email['school'];
$from 			=	 $listEmail['email_from'];
$sub			=	$listEmail['email_subject'];
$con			=	$listEmail['email_content'];

$cdata=$objU->getcannontxt();
 

//print_r($cli_email);
//if(isset( $_POST['trash']) && $_POST['trash']=='Delete')


if(isset($_POST['add_x']))
{

//echo "hi";

//$msg	= $objH->add_EmalHistory($client_id,$date,$sub,addslashes($con),1);

	$to 			=$_POST['emailto'];
	$subject 		= "Re:".$listEmail['email_subject'];
	 $message		.=	stripslashes($_POST['editor']);
	// $histoty		=	addslashes($_POST['editor']);
	//exit;
		 
		$from_add		=	$_POST['from'];
				
		$header		 = "MIME-Version: 1.0" . "\r\n";
		$header		 .= 'From: '.$from_add.'' . "\r\n";
		$header 	.= "Content-type: text/html; charset=iso-8859-1\r\n";
		
		//echo "to=".$to."from=".$from_add."canned==".$message;
		
		
		//$msg		= $objH->addEmail_History($m,$Date,$Summary,$details,$school);

				
	$msg	=	mail($to, $subject, $message, $header);
	
	$msg1	= $objH->addEmail_History($client_id,$date,$subject,$message,$school);
	if($msg)
	{
 	$msg2	=	"Mail send successfully!";
header("location:reply.php?id=".$id."&ms=Mail send successfully");
	}
	}

//$submit	= "submit"	;



include("templates/reply.tpl.php");
?>
