<?php
//include '../config/config.inc.php';

include_once '../classes/database.class.php';
include_once '../classes/email.class.php';
    include_once("imap.inc.php");
 include_once("mimedecode.inc.php");
 $objE		=	new email();
 
    $imap=new IMAPMAIL;
    if(!$imap->open("67.220.196.18","143"))
    {
	
     // echo $imap->get_error();
       // exit;
    } 

    $imap->login("test@portrave.com","porttest");
  //  echo $imap->error;
    $response=$imap->open_mailbox("INBOX");
 //   echo $imap->error;
 
 
//get total number of mail in mail box
$msgcount=$imap->get_msglist();


$listmsg		=	$imap->get_message_body($msgcount);

$listmsgheader=	$imap->get_message_header($msgcount);
	
	
	//canot open mail listing
 $response=$imap->get_unseen_msglist();
$listall=$imap->get_recent_msglist();

	
	if ($msgcount > 0)
		{
			for ($mid = 1; $mid <= $msgcount; $mid++)
			{
			  $response=$imap->get_message($mid);

			  $mimedecoder=new MIMEDECODE($response,"\r\n");

			  $msg_full=$imap->get_message_body($mid);
			  $response=$imap->fetch_mail($mid,"BODY[TEXT]");
			   
			//  $temp_arr=explode("\n",$response);
			//	  $imp		=	implode("\n",$temp_arr);

	
			// get all message
		 	 $msgfull=$mimedecoder->get_parsed_message();
			$content_body	=	$imap->get_message_body($mid);
						  			
			$temp_arr=explode("\n",$msgfull);
		//print_r($temp_arr);
	
			$temp		=	explode("<br>",$temp_arr[0]);
					  		
			$to			=	$temp[0];
			
			$from		=	$temp[1];
			$findme   	= '<';
			$fivePos = strpos($from, $findme);
	
			if($fivePos===false)
			{
			$from		=	$temp[1];
			
			}
			else
			{
			$from1		=	explode("<",$from);
			$from2		=	$from1[1];
			$from3    	= explode(">",$from2);
			$from		=$from3[0];
			}
			
			
		
			$suject		=	$temp[2];
			$date		=	strtotime($temp[3]);
			$formatted_date = date('Y-m-d  H:i:s', $date);
			$d			=	explode('-',$date);
			
			
			$content	= "";
			
		//echo "count==".count($temp_arr);
		 	$content	.= $temp[4];
			
			if(count($temp_arr)>=2)
			{
			for($i=2;$i<count($temp_arr);$i++){
			
			
			$content	.= $temp_arr[$i];
	
			}
			}
			//echo "content==". $content;		
			//$msg	=	$objU->listEmail($from);
			
		
		
		$msg1		=	$objE->emailContentAdd($to,$from,$suject,$formatted_date,addslashes($content_body));
	
			/*if($msg1=="")
			{
			echo "<font color='#FF0000'>Email Successfully inserted<font>";
			}*/
			
			
		
		
			$listEmail		=	$objE->getSchoolEmail($from);
			//print_r($listEmail);
			//foreach($listEmail as $key => $value)
			//{
		 $client_id		=	$listEmail['client_id'];
		 $school		=	 $listEmail['school'];
			
			$his_rece	=	$objE->email_Addhistory($client_id,$formatted_date,$school,$suject,$content_body);
			//}
						}
			
		}	
	
	
  		
    $imap->close();
   $response=$imap->fetch_mail("3","BODYSTRUCTURE");



?> 