<?php
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/page.class.php';

$page_heading="Trial  Accounts due to expire (within 1 week)";
$objU		=	new user();

$objP		=	new page();
$result 			=	$objU->select_expire_details();

 $send = $_REQUEST['send'];
 if($send == 1)
 {
 	 $to = $_REQUEST['to'];
	 $subject = "Account Expiry";
	 $myFile = "expire_within_1.txt";
     $fh = fopen($myFile, 'r');
     $theData = fgets($fh);
      fclose($fh);
	  //echo ( $to.",".$subject.",".$theData);
      mail( $to,$subject,$theData);
	//  $Message = "Mail has been send to  ".$to;
	$Message = "Mail successfully send! ";
	  
	  header('location:debtorsReport.php?msg=Mail successfully send');
	//  include("templates/debtorsReport.tpl.php");
	

 }

?>