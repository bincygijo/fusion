<?
include_once '../../config/config.inc.php';
include_once 'classes/production.class.php';
$objP			=	new production();
$arrTrans		=	$objP->listTrans_type();

 $client_Id		=	$_GET['id'];
if(isset($_POST['add']))
{
$dateRece		=	$_POST['date_received'];
$transId		=	$_POST['trans_type'];
$note			=	$_POST['notes'];
$amount			=	$_POST['amountrece'];
$msg			=	$objP->modifyAccounts($dateRece,$transId,$note,$amount,$client_Id);
if($msg=="")
{
	header('location:clientSheet.php');
}
}
//print_r($arrTrans);
?>