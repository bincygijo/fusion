<?
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
include_once 'classes/entry.class.php';
include_once 'classes/user.class.php';
include_once 'classes/production.class.php';
include_once 'classes/history.class.php';


$page_heading="New Entry";
$objE			=	new entry();
$objH			= new history();
$objU			=	new user();
$objP			=	new production();

 $cId		=	$_GET['id'];


$arrEntry		= 	$objE->list_entry();

 $entry			= isset($_REQUEST['action'])	? $_REQUEST['action'] 	: ''; 
$action_name			= isset($_REQUEST['actionname'])	? $_REQUEST['actionname'] 	: ''; 
$msg 			= isset($_REQUEST['msg'])	? $_REQUEST['msg']		: '';
$color 			= isset($_REQUEST['color'])	? $_REQUEST['color']	: 'red';

	if(isset($_POST['submit']))
	
		{
			
		$ref_id				=	$_POST['ref_no'];
		$contactName		=	$_POST['contact_name'];
		$schoolName			=	$_POST['school_name'];
		$noBooks			=	$_POST['no_books'];
		$editorsDeadline	=	$_POST['editorS_dedline'];
		$deliveryAddress	=	$_POST['delivery_add'];
		$deliveryDate		=	$_POST['delivery_date'];
		$contactNumber		=	$_POST['contact_no'];
		 $Date				=	$_POST['txtdate'];
		$staffName			=	$_POST['staff_name'];
		$Client				=	$_POST['client_name'];
		$school				=	$_POST['school'];
		$Summary			=	$_POST['summary'];
		$details			=	$_POST['details'];
		$actionId			=	$_POST['action'];
		$Notes				=	$_POST['actionname'];
		$email				=	$_POST['email'];
		
		$contact		=	$_POST['chk'];
		//echo $contact;
		if($contact=='Other')
		{
		$contact	=	$_POST['type'];
		}
		else
		{
		$contact		=	$_POST['chk'];
		}
		//for($i=0;$i>sizeo)
		//echo $contact;
		//exit;
		
	
		
			$msg = $objE->add_entry($ref_id,$contactName,$schoolName,$noBooks,$editorsDeadline,$deliveryAddress,$deliveryDate,$contactNumber,$Date,$staffName,$Summary,$details,$actionId,$Notes,$Client,$school,$email,$contact,$cId);
			
				$msg1		= $objH->addHistory($cId,$Date,$staffName,$Client,$school,$Summary,$details);
			

		if($msg=="")
		{
		//$msg		='Entry already exist';
		header('location:workSpace.php');
		}
	}

include("templates/client_History.tpl.php");


?>