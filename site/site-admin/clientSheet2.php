<?php
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/production.class.php';
include_once 'classes/history.class.php';

$page_heading	=	"Client Sheet";
$objU			=	new user();
$objP			=	new production();
$objH			= new history();
$arrInside		= 	$objP->getInside_paper();
$arrCover		= 	$objP->getCover_paper();
$arrLamp		= 	$objP->getLamp_paper();
$arrBind		= 	$objP->getbind_paper();
$arrBooks		= 	$objP->getbook_paper();
$arrFreight		= 	$objP->getFreight();

$listRate			=	$objP->listRate();
$arrTrans		=	$objP->listTrans_type();
 

$paperInside	=	$_GET['txt'];
$paperCover		=	$_POST['inside_paper'];

$clientId = $_GET["id"];


 


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
	
	
	
	$msg1	=	$objP->updateClientAccountInfo($account_expiry,$txt_books,$txt_pages,$deposit,$rate_type,$base_rate,$per_page,$extracost_perbook,$cost_allbook,$total,$clientId);
	
	//exit;
	
	$msg2	=	$objP->updateClientPrdInfo($no_books,$no_pages,$inside_paper,$coverpaper,$laminating_paper,$binding_paper,$books_deliver,$connote_number,$paper_freight,$dispateched_date,$clientId,$print_status,$editors,$cover_designed,$cover_approved);
	
	$msg3	=	$objP->updateClientOrderInfo($ref_no,$contactNname,$schoolName,$email,$noBooks,$editorsDeadline,$deliveryAddr,$deliveryDate,$contactNumber,$clientId);
	
	$msg4	=	$objP->updateUserInfo($contactNname,$schoolName,$contactNumber,$email,$clientId);

}

//include("templates/index_top.tpl.php");
include("templates/clientSheet.tpl.php");

?>