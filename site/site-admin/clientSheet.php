<?php
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/production.class.php';
include_once 'classes/history.class.php';
include_once 'classes/entry.class.php';

$page_heading	=	"Client Sheet";
$objU			=	new user();
$objP			=	new production();
$objH			= new history();
$objE			=	new entry();

$arrInside		= 	$objP->getInside_paper();
$arrCover		= 	$objP->getCover_paper();
$arrLamp		= 	$objP->getLamp_paper();
$arrBind		= 	$objP->getbind_paper();
$arrBooks		= 	$objP->getbook_paper();
$arrFreight		= 	$objP->getFreight();
$arrBooktype	=	$objP->getBooktype();


$listRate			=	$objP->listRate();
$arrTrans		=	$objP->listTrans_type();

// history listing
$arrEntry		= 	$objE->list_entry();


 

$paperInside	=	$_GET['txt'];
$paperCover		=	$_POST['inside_paper'];

$clientId = $_GET["id"];
$client_status		=	$_GET["code"];

 $arrUser	=	$objU->list_user($clientId);
//$listUser	=	$objU->list_user($uId);

$listUser		=	$objP->listOrderDetails($clientId);


if(isset($_GET['txt'])){
	$msg		=	$objP->add_paperInside($paperInside);
	$arrInside	= 	$objP->getInside_paper();
	$contents 	.= 	'<select name="inside_paper" id="inside_paper" onchange="showId(this.value)">';
	if(!empty($arrInside)){
		foreach($arrInside as $key => $value){ 
			$contents .= '<option value="'.$value['name'].'"';
			if($paperInside==$value['name'])
			$contents .= '"selected">';
			$contents .= $value['name'].'</option>';
		}
	}

	$contents .= '<option value="Addnew">Add new</option></select>';
				
	echo $contents;
	
}

if(isset($_POST['add_cover']))
{
	$msg		=	$objP->add_paperInside($paperInside);
	
}
// form sumission
	if(isset($_POST['add'])){
	
	
	
	//Personal Details
	
	$ref_no 		= $_POST["refNumber"];
	$contactNname 	= $_POST["contactNname"];
	 $schoolName 	= $_POST["schoolName"];
	$email			= $_POST['email'];
	$noBooks 		= $_POST["noBooks"];
 	$editors 		= $_POST["editorsDeadline"];

 	$date1					=	explode('-',$editors);
 	$editorsDeadline		=	$date1[0]."-".$date1[1]."-".$date1[2];


	$deliveryAddr 		= $_POST["deliveryAddr"];
	$delivery 			= $_POST["deliveryDate"];
	
	$date2				=	explode('-',$delivery);
	$deliveryDate		=	$date2[0]."-".$date2[1]."-".$date2[2];
	
	/*if($deliveryDate)
	{
	 $school_Name 	= $_POST["schoolName"].'Delivery Date';
	}
	if($editorsDeadline)
	{
		 $school_Name 	= $_POST["schoolName"].'Editors Deadline';
	}*/
	

	$contactNumber 		= $_POST["contactNumber"];
	
	//Account fields 
	 $account_expiry 	= $_POST["expiry_date"];
	$txt_books 			= $_POST["txt_books"];
 	$txt_pages 			= $_POST["txt_pages"];
 	$deposit			=	$_POST['deposit'];
 	$rate_type			=	$_POST['rate_type'];
 	$base_rate			=	$_POST['baserate'];
	$per_page			=	$_POST['rate'];
	$extracost_perbook	=	$_POST['cost_perbook'];
	$cost_allbook		=	$_POST['extracost'];
	$total1				=	$_POST['total'];
	$total	=	  str_replace(',',"",$total1);
	
	//Production Information
	$no_books 		= $_POST['txt_no_books'];
	$no_pages 		= $_POST['txt_no_pages'];
	$inside_paper 	= $_POST['inside_paper'];
	$coverpaper 	= $_POST['coverpaper'];
	
	$laminating_paper 	= $_POST['laminating_paper'];
	$binding_paper 		= $_POST['binding_paper'];
	$books_deliver 		= $_POST['books_deliver'];
	
	$connote_number 	= $_POST['txt_connote'];
	
	$paper_freight 		= $_POST["paper_freight"];
	$dispateched_date 	= $_POST["sdat"];
	$print_status 		= $_POST["print"];
 	$cover_designed		=	$_POST["designed"];
	$cover_approved		=	$_POST["approved"];
	$book_typeid		=	$_POST["book_type"];
	$book_sent			=	$_POST["booksreceive"];
	
	//entry action
		$Date			=	$_POST['txtdate'];
		$Summary			=	$_POST['summary'];
		$details			=	$_POST['details'];
		$actionId			=	$_POST['action'];
		$Notes				=	$_POST['actionname'];
		
		 $ref_id				=	$listUser['Ref_no'];
		$contactName		=  $arrUser['name'];
		$school_name			= $arrUser['school'];
		$Books		= $listUser['client_order_books'];
		$editorsDead =$listUser['client_order_deadline'];
		$deliveryAddress =$listUser['client_order_del_addr'];
		$deli_Date		=$listUser['client_order_del_date'];
		$contact_Num		=$arrUser['contact'];
		$staffName		=	$listUser['staff_name'];
		$Client		=$listUser['name'];
		$school	=$arrUser['school'];
		$email_hi	= $arrUser['email'];
		
		$contact1		=	$_POST['chk'];

for($i=0;$i<sizeof($contact1);$i++)
{
$x = explode(",",$contact1);
$contact = implode("," ,$contact1);

}

//print_r($contact);
		//echo $contact;
		
$exp		=	explode(',',$contact);		
//print_r($exp);
$con	=	 $exp[3];
		if($con=='Other')
		{
		$tick	=	$_POST['other_name'];
		}
		
		// user info edit
		
			$name				= $_POST['name'];
			$position			= $_POST['position'];
			$school				= $_POST['school'];
			$street				= $_POST['street'];
			$substr				= $_POST['substreet'];
			$state				= $_POST['state'];
			$country			= $_POST['country'];
			$postal			    = $_POST['postal'];
			$contact			= $_POST['contact'];
			$email				= $_POST['email'];
			$info 				= $_POST['info'];
		
		
	// if contact information
	if(($clientId && $client_status=='C') || ($clientId && !isset($_GET['code']))) {
	$msg3	=	$objP->updateClientOrderInfo($ref_no,$contactNname,$schoolName,$email,$noBooks,$editorsDeadline,$deliveryAddr,$deliveryDate,$contactNumber,$clientId);
	$msg4	=	$objP->updateUserInfo($contactNname,$schoolName,$contactNumber,$email,$clientId);
	$addcal	=	$objP->addCalender($clientId,$deliveryDate,$editorsDeadline,$schoolName);
	//$addca2	=	$objP->addCalender1($clientId,$editorsDeadline,$school_Name);
	
	
	} elseif($clientId && $client_status=='A') //account information
	{
	$msg1	=	$objP->updateClientAccountInfo($account_expiry,$txt_books,$txt_pages,$deposit,$rate_type,$base_rate,$per_page,$extracost_perbook,$cost_allbook,$total,$clientId);
	} elseif ($clientId && $client_status=='P') // production information
	{
	$msg2	=	$objP->updateClientPrdInfo($no_books,$no_pages,$inside_paper,$coverpaper,$laminating_paper,$binding_paper,$books_deliver,$connote_number,$paper_freight,$dispateched_date,$clientId,$print_status,$editors,$cover_designed,$cover_approved,$book_typeid,$book_sent);
	}
	elseif($clientId && $client_status=='I') // user edit 
	{
	$msg8		=	$objU->edit_user($name,$position,$school,$street,$substr,$state,$country,$postal,$contact,$email,$info,$clientId);
	}
	
	else		//History saved and entry added
	{
	$msg = $objE->add_entry($ref_id,$contactName,$school_name,$Books,$editorsDead,$deliveryAddress,$deli_Date,$contact_Num,$Date,$staffName,$Summary,$details,$actionId,$Notes,$Client,$school,$email_hi,$contact,$tick,$clientId);
	//if()
	//$msg5		=$objP->addhistory($clientId,$ref_id,$Summary,$details,$actionId,$Notes,$date_entry,$contactName,$schoolName);
	$msg7		= $objH->addclientshhet_History($clientId,$Date,$contactNname,$schoolName,$Summary,$details);
	if($msg=="")
		{
		//$msg		='Entry already exist';
		header('location:workSpace.php');
		}
	}
	
	//$msg = $objE->add_entry($ref_id,$contactName,$schoolName,$noBooks,$editorsDeadline,$deliveryAddress,$deliveryDate,$contactNumber,$Date,$staffName,$Summary,$details,$actionId,$Notes,$Client,$school,$email,$contact,$cId);
		
			
			//$msg1		= $objH->addHistory($cId,$Date,$staffName,$Client,$school,$Summary,$details);

}

//include("templates/index_top.tpl.php");
include("templates/clientSheet.tpl.php");

?>