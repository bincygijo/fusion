<?php
include_once '../../config/config.inc.php';
include_once 'classes/entry.class.php';
include_once 'classes/user.class.php';
include_once 'classes/production.class.php';
include_once 'classes/page.class.php';

$page_heading="New Entry";
$objE			=	new entry();
$objU			=	new user();
//$objP			=	new production();
$objP			=	new page();
	
//print_r($countSchool);
 
// print_r($listSchool);
 include("templates/listschool.tpl.php");

?>



