<?
	include_once 'classes/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/database.class.php';
$objU		=	new user();
	

	  $photo_id 		= $_GET['q'];
	
	
	$arrPho		= $objU->listphoto($photo_id);
	echo $arrPho['description'];


?>

