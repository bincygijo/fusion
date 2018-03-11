<?php
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/page.class.php';

//$page_heading="Trial  Accounts due to expired ";
$objU		=	new user();
$objP			=	new page();
	$page			= isset($_REQUEST['page'])		? $_REQUEST['page'] 	: 1;
	$plimit			= isset($_REQUEST['plimit'])	? $_REQUEST['plimit'] 	: 20;
	
	  $searchcount	=	$objU->countExpaire();
	
  	$pcount			= $objP->getPagerData($searchcount,$plimit,$page);	
	$cpage   		= $pcount['page'];		
	$offset 		= $pcount['offset'];  	
	$limit  		= $pcount['limit']; 	
	$totpage  		= $pcount['numPages']; 
	
	$result 			=	$objU->select_expire($offset,$limit);
	//print_r($result);
	
include("templates/trailAccountExpired.tpl.php");

?>
