<?
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
$page_heading	=	"Edit Client";
$objU 			= 	new user();
$uId			=	$_GET['cid'];
 

$arrUser		=	$objU ->list_user($uId);
$name			=	$_POST['co_name'];
//print_r($arrUser);
if(isset($_POST['edit'])){

	$msg		=	$objU->update_user($_POST,$uId);
	$message		=	"Successfully updated!";
}


//header('location:editClient.php?msg=Successfully updated');

$arrUser		=	$objU ->list_user($uId);
include("templates/editClient.tpl.php");
?>