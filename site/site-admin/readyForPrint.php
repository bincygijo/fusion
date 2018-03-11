<?php
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/production.class.php';
include_once 'classes/page.class.php';
//$page_heading="Books Ready For Print";
$objP =	new production();

$objU		=	new user();
$objN			=	new page();
	$page			= isset($_REQUEST['page'])		? $_REQUEST['page'] 	: 1;
	$plimit			= isset($_REQUEST['plimit'])	? $_REQUEST['plimit'] 	: 20;
	
	 $searchcount	=	$objU->countPrint();
	
  	$pcount			= $objN->getPagerData($searchcount,$plimit,$page);	
	$cpage   		= $pcount['page'];		
	$offset 		= $pcount['offset'];  	
	$limit  		= $pcount['limit']; 	
	$totpage  		= $pcount['numPages']; 

	$result = $objU->readyForPrint($offset,$limit);

include("templates/readyForPrint.tpl.php");
?>