<?php
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
//$page_heading="Conversation ";
$objU		=	new user();
	if(isset($_POST['add']))
	{
		
		$add 			=	$objU->add_conversation();
	}
$result =	$objU->view_conversation();

include("templates/add_conversation.tpl.php");

?>