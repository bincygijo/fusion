<?php
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
//$page_heading="Trial  Accounts due to expire (within 1 week)";
$objU		=	new user();
$result 			=	$objU->select_due_details();
 $send = $_REQUEST['send'];
 if($send == 1)
 {
 	 $to = $_REQUEST['to'];
	 $subject = "Account Expiry";
	 $myFile = "expire_within_7.txt";
     $fh = fopen($myFile, 'r');
     $theData = fgets($fh);
      fclose($fh);
	  //echo ( $to.",".$subject.",".$theData);
      mail( $to,$subject,$theData);
	  $Message = "Mail has been send to  ".$to;

 }
include("templates/booksDue.tpl.php");

?>