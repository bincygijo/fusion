<?php
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
include_once 'classes/entry.class.php';
include_once 'classes/user.class.php';
include_once 'classes/production.class.php';
include_once 'classes/history.class.php';


	$page_heading	=	"Workspace";
	$objE 			=	new entry();
	$objU 			=	new user();
	$objP			=	new production();
	$objH			=	new history();
	$arrEmail		=	$objU->getEmailcontent();
	$arrConversation	=	$objU->select_conversation();
	$arrContact		=	$objU->listContact();
//	print_r($listContact);
	$date			=	date('Y-m-d');
	
	if(isset($_POST['contactus']))
	{
	if(count($_POST['contact_id'])>=0){
			for($i = 0; $i < count($_POST['contact_id']); $i++){
				
				$msg		= 	$objU->getContact($_POST['contact_id'][$i]);
		
		$email		=	$msg[0]['email'];
		
				$listEmail		=	$objU->getSchoolEmail($email);
				
			 	$client_id			=$listEmail['client_id'];
							
				$school		=	$listEmail['school'];
				 $Summary			=	'Removed from contactus ';
				$details			=	'Removed from contactus ';
				$Date	= date('Y-m-d');		
				if($client_id)
				{
			//$msg		= $objH->addContact_History($client_id,$Date,$Summary,$details,$school);
				}
				
				$checked=$_POST['contact_id'];
			foreach($checked as $delval)
			{
			$msg			= 	$objU->deleteContact($delval);	
			}	
				
		}
		}
	}
	
	
	
	
	//quotes
	
	if(isset($_POST['quotes']))
	{
	if(count($_POST['quote_id'])>=0){
			for($i = 0; $i < count($_POST['quote_id']); $i++){
				
				$msg		= 	$objU->getQuotes($_POST['quote_id'][$i]);
		
		$email		=	$msg[0]['email'];
		
				$listEmail		=	$objU->getSchoolEmail($email);
				
			 	$client_id			=$listEmail['client_id'];
							
				$school		=	$listEmail['school'];
				 $Summary			=	'Removed from quotes ';
				$details			=	'Removed from quotes ';
				$Date	= date('Y-m-d');		
				if($client_id)
				{
			//$msg		= $objH->addContact_History($client_id,$Date,$Summary,$details,$school);
				}
				
				$checked=$_POST['quote_id'];
			foreach($checked as $delval)
			{
			$msg			= 	$objU->deleteQuote($delval);	
			}	
				
		}
		}
	}
	
	
	//end  quotes
	
	//start  Faq
	
	if(isset($_POST['designfaq']))
	{
	if(count($_POST['ans_id'])>=0){
			for($i = 0; $i < count($_POST['ans_id']); $i++){
				
				$msg		= 	$objU->getFaq($_POST['ans_id'][$i]);
		
		$email		=	$msg[0]['email'];
		
				$listEmail		=	$objU->getSchoolEmail($email);
				
			 	$client_id			=$listEmail['client_id'];
							
				$school		=	$listEmail['school'];
				 $Summary			=	'Removed from quotes ';
				$details			=	'Removed from quotes ';
				$Date	= date('Y-m-d');		
				if($client_id)
				{
			$msg		= $objH->addContact_History($client_id,$Date,$Summary,$details,$school);
				}
				
				$checked=$_POST['ans_id'];
			foreach($checked as $delval)
			{
			$msg			= 	$objU->deleteFaq($delval);	
			}	
				
		}
		}
	}
	
	//faq
	
	
	if(isset($_GET['action']))
	{
	$id		=	$_GET['id'];
	$type	=	$_GET['type'];
	$value	=	$_GET['value'];
	//$qry =mysql_query("UPDATE client_fusion SET $type='$value' WHERE client_id=$id ");
		if($type!="notes"){
		$qry =mysql_query("UPDATE client_fusion SET $type='$value' WHERE client_id=$id ");
		}else{
		$qry =mysql_query("UPDATE  new_entry SET entry_desc='$value' WHERE client_id=$id ");
		}
	}

	if(isset($_POST['remove_x'])){	
	
		if(count($_POST['client_id'])>=0){
				for($i = 0; $i < count($_POST['client_id']); $i++){
			//	$msg		= 	$objU->getclient($_POST['client_id'][$i]);
				
				$action_id	= $_POST['action_id'];
				
				
				$id			=	$msg[0]['client_id'];
				$name		=	$msg[0]['name'];
				$school		=	$msg[0]['school'];	
				$position	=	$msg[0]['positon'];
				$street		=	$msg[0]['street'];
				$substr		=	$msg[0]['substreet'];
				$state		=	$msg[0]['state'];
				$country	=	$msg[0]['country'];
				$postal		=	$msg[0]['postal '];
				$contact	=	$msg[0]['contact'];
				$email		=	$msg[0]['email'];
				$info		=	$msg[0]['information'];
			//	$qry		=	"INSERT INTO client_history (client_id, name, school, position, street, substreet, state, country, postal, contact, email, information,action_id, date) VALUES ($id, '$name', '$school', '$position', '$street', '$substr', '$state', '$country', '$postal', '$contact', '$email', '$info', $action_id,'$date')";
				$result		= 	mysql_query($qry);
			}
		
			
			/*$checked=$_POST['client_id'];
			foreach($checked as $delval)
			{
			$msg			= 	$objE->deleteContact($delval,$action_id);	
			}	*/	
		}			
	}
	
	//values inserted in to history table
	
	
	if(isset($_POST['sent_x'])){	
	
		if(count($_POST['client_id'])>=0){
				for($i = 0; $i < count($_POST['client_id']); $i++){
				$msg		= 	$objU->getclient($_POST['client_id'][$i]);
				
			$action_id	= $_POST['action_id'];
				
				$msg1		=	$objE->getactionsent($_POST['client_id'][$i],$action_id);
				$id			=	$msg[0]['client_id'];
				$name		=	$msg[0]['name'];
				$school		=	$msg[0]['school'];	
				$position	=	$msg[0]['positon'];
				$street		=	$msg[0]['street'];
				$substr		=	$msg[0]['substreet'];
				$state		=	$msg[0]['state'];
				$country	=	$msg[0]['country'];
				$postal		=	$msg[0]['postal '];
				$contact	=	$msg[0]['contact'];
				$email		=	$msg[0]['email'];
				$info		=	$msg[0]['information'];
				
			 	$staff_name		= $msg1['staff_name'];
				$school_name	=	$msg1['school'];	
				$client		=	$msg1['client'];	
				$summary		=	$msg1['entry_summary'];	
				$detail		=	$msg1['entry_details'];	
				$desc		=	$msg1['entry_desc'];
		/*
				$qry		=	"INSERT INTO client_history (client_id, name, school, position, street, substreet, state, country, postal, contact, email, information,action_id, staff_name,client_name,school_name,entry_summary,entry_detail,summary_desc,date) VALUES ($id, '$name', '$school', '$position', '$street', '$substr', '$state', '$country', '$postal', '$contact', '$email', '$info', $action_id,'$staff_name','$client','$school_name','$summary','$detail','$desc','$date')";
				$result		= 	mysql_query($qry);*/
			}
		
			
			$checked=$_POST['client_id'];
			/*foreach($checked as $delval)
			{
				$msg			= 	$objE->deleteNewentry($delval,$action_id);	
			}	*/	
		}			
	}
	
	
	
	//need contacted soon remove from work space
	
	
	if(isset($_POST['removesoon_x'])){	
	
	
		if(count($_POST['client_id'])>=0){
				for($i = 0; $i < count($_POST['client_id']); $i++){
				$msg		= 	$objU->getclient($_POST['client_id'][$i]);
				
				$action_id	= $_POST['action_id'];
				
				
				$id			=	$msg[0]['client_id'];
				$name		=	$msg[0]['name'];
				$school		=	$msg[0]['school'];	
				$position	=	$msg[0]['positon'];
				$street		=	$msg[0]['street'];
				$substr		=	$msg[0]['substreet'];
				$state		=	$msg[0]['state'];
				$country	=	$msg[0]['country'];
				$postal		=	$msg[0]['postal '];
				$contact	=	$msg[0]['contact'];
				$email		=	$msg[0]['email'];
				$info		=	$msg[0]['information'];
				/*$qry		=	"INSERT INTO client_history (client_id, name, school, position, street, substreet, state, country, postal, contact, email, information,action_id, date) VALUES ($id, '$name', '$school', '$position', '$street', '$substr', '$state', '$country', '$postal', '$contact', '$email', '$info', $action_id,'$date')";
				$result		= 	mysql_query($qry);*/
			}
		
			
			/*$checked=$_POST['client_id'];
			foreach($checked as $delval)
			{
			$msg			= 	$objE->deleteNewentry($delval,$action_id);	
			}	*/	
		}			
	}
	
	//remove email received
	
	
	if(isset($_POST['removeemail'])){	
	//echo "hi";
	//echo "id=====******". $client_id	= $_REQUEST['content_id'];
	
	
		if(count($_POST['client_id'])>=0){
				for($i = 0; $i < count($_POST['client_id']); $i++){
			//	echo $client		=	$_POST['client_id'][$i];	exit;
								
				//echo "id=====******". $client_id	= $_POST['content_id'];
				$msg		= 	$objU->getclient($client_id);
				//exit;
				//$id			=	$msg[0]['client_id'];
				$name		=	$msg[0]['name'];	
				$school		=	$msg[0]['school'];	
				$position	=	$msg[0]['positon'];
				$street		=	$msg[0]['street'];
				$substr		=	$msg[0]['substreet'];
				$state		=	$msg[0]['state'];
				$country	=	$msg[0]['country'];
				$postal		=	$msg[0]['postal '];
				$contact	=	$msg[0]['contact'];
				$email		=	$msg[0]['email'];
				$info		=	$msg[0]['information'];
			
				/*$qry		=	"INSERT INTO client_history (client_id, name, school, position, street, substreet, state, country, postal, contact, email, information, date) VALUES ($client_id, '$name', '$school', '$position', '$street', '$substr', '$state', '$country', '$postal', '$contact', '$email', '$info','$date')";
				$result		= 	mysql_query($qry);*/
			}
		
		/*	
			$checked=$_POST['client_id'];
			foreach($checked as $delval)
			{
			//$msg			= 	$objU->deleteEmail($delval);
				header('location:emailRemove.php?id='.$client_id.'');
			}	*/	
		}			
	}
	
	
	//header('location:emailRemove.php');
	
	//}
	
	//$arrRegister_contact	=	$objU->listregister_Contact();
	
	$arrContact		=	$objU->listContact();
	//need contact today
	$arrEntry		= 	$objE->listEntry();
	
	$arrDetails		= 	$objE->entryDetails();
	
	$arrContacted	=	$objE->entryContactedsoon();
	$arrSoftware	=	$objE->entrySoftware();
	$arrDesign		=	$objE->entryDesign();
	
	$arrQuotes		=	$objU->listquotes();
	
	$arrFaq			=	$objU->listFaq();
	//print_r($arrQuotes);
	
	
	//include("templates/index_top.tpl.php");
	include("templates/workspace.tpl.php");
?>