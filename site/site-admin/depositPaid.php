<?php
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/page.class.php';

$page_heading="Deposit Paid ";
$objU		=	new user();
$objP			=	new page();
	$page			= isset($_REQUEST['page'])		? $_REQUEST['page'] 	: 1;
	$plimit			= isset($_REQUEST['plimit'])	? $_REQUEST['plimit'] 	: 20;

$school = isset($_REQUEST['Year'])	? $_REQUEST['Year']		: '';
	
 $searchcount	=	$objU->count_deppaid();
	$pcount			= $objP->getPagerData($searchcount,$plimit,$page);	
	$cpage   		= $pcount['page'];		
	$offset 		= $pcount['offset'];  	
	$limit  		= $pcount['limit']; 	
	$totpage  		= $pcount['numPages']; 
	
$result 			=	$objU->deposit_paid_school($school,$offset,$limit);


	if(isset($_POST['search']))
	{
	$school = isset($_REQUEST['Year'])	? $_REQUEST['Year']		: '';
	 $searchcount	=	$objU->count_deppaid();
	$pcount			= $objP->getPagerData($searchcount,$plimit,$page);	
	$cpage   		= $pcount['page'];		
	$offset 		= $pcount['offset'];  	
	$limit  		= $pcount['limit']; 	
	$totpage  		= $pcount['numPages']; 
		$result 			=	$objU->deposit_paid_school($school);
		
		
	}

include("templates/depositPaid.tpl.php");

?>