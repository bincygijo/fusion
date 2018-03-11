<?php
	include_once '../../config/config.inc.php';
include_once 'classes/production.class.php';
$objP			=	new production();	
	
	//$contid 		= isset($_REQUEST['contid'])	? $_REQUEST['contid']	: '';
	 $rate_id 		= $_GET['q'];
	$arrRate		= $objP->getrate_type($rate_id);
	//print_r($arrRate);
	echo $arrRate['base_rate']."*".$arrRate['per_page'];
?>


