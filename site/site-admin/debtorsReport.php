<?php
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/page.class.php';
$page_heading="Debtors Report ";
 $q	=	$_GET["q"];

$objU		=	new user();
$objP		=	new page();
	
	
		
		if(isset($_POST['search']))
		{
			$overDue = $_POST['overDue'];
			$page  = 1;
		}else{
			$overDue = isset($_REQUEST['overDue'])	? $_REQUEST['overDue']		: '2';
			$page			= isset($_REQUEST['page'])		? $_REQUEST['page'] 	: 1;
		}
		
 			 		
					$plimit			= isset($_REQUEST['plimit'])	? $_REQUEST['plimit'] 	: 20;
					 $searchcount	=	$objU->count_expire();
					$pcount			= $objP->getPagerData($searchcount,$plimit,$page);	
					$cpage   		= $pcount['page'];		
				 	$offset 		= $pcount['offset'];  	
				 	$limit  		= $pcount['limit']; 	
					 $totpage  		= $pcount['numPages']; 
		 
	$result 			=	$objU->select_expire_details($offset,$limit);
		



include("templates/debtorsReport.tpl.php");

?>