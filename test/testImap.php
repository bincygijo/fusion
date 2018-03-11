<?php
	include_once '../classes/database.class.php';
	include_once '../classes/email.class.php';
    include_once("IMAP.php");
 	//include_once("mimedecode.inc.php");
 
 
	$msg = new Mail_IMAP();
	$timeParsed=time();	


if(!$msg->open("67.220.196.18","143"))
    {
	
   // echo $msg->get_error();
       // exit;
    } 
	
	
	  $msg->login("test@portrave.com","porttest");
	
		echo   $response=$msg->open_mailbox("INBOX");
		
	
	echo  "msg==".	$msgcount = $msg->messageCount();exit;
	
		if ($msgcount > 0)
		{
			for ($mid = 1; $mid <= $msgcount; $mid++)
			{
				
				echo $pid = $msg->getDefaultPid($mid);
				
				$msg->getHeaders($mid, $pid);
				$msg->getParts($mid, $pid);
				if (!isset($msg->header[$mid]['subject']) || empty($msg->header[$mid]['subject']))
				{
					$msg->header[$mid]['subject'] = "<span style='font-style: italic;'>no subject provided</a>";
				}
//				print_r($msg->header[$mid]);
	
				$emailSubject=$msg->header[$mid]['subject'];
				$senderEmail_id=$msg->header[$mid]['from'][0];
				$recipientEmail_id=$msg->header[$mid]['to'][0];
				$sendDate=date('D d M, Y h:i:s', $msg->header[$mid]['udate']);	
				echo "<br><font size='16px'>$mid</font>----$emailSubject";
	
				$body = $msg->getBody($mid, $pid);
				
				$emailBody=addslashes($body['message']);
	//			echo $emailBody;
				// Now the attachments
				$insertArray=array("userCompany_id"=>$userComapny_id,"timeParsed"=>$timeParsed,"sendDate"=>$sendDate,
				"senderEmail"=>$senderEmail_id,"senderName"=>$senderName,"recipientName"=>$recipientName,
				"recipientEmail"=>$recipientEmail_id,"emailSubject"=>$emailSubject,"emailBody"=>$emailBody);
				$logId=$db->insertQuery("helpdeskemailparserlog",$insertArray);
				
				
				
				if (isset($msg->attachPid[$mid]) && count($msg->attachPid[$mid]) > 0) {
					foreach ($msg->attachPid[$mid] as $i => $aid)
					{
						$attachmentbody = $msg->getBody($mid, $msg->attachPid[$mid][$i]);
//						print_r($attachmentbody);
						$attachmentType=$msg->attachFtype[$mid][$i];
						$attachmentName=$msg->attachFname[$mid][$i];
						$attachmentSize=$msg->convertBytes($msg->attachFsize[$mid][$i]);
						echo "<br>$attachmentType= 	$attachmentName= $attachmentSize= ";
						$attachmentBody=addslashes($attachmentbody['message']);
						$insertAttachArray=array("ticket_id"=>$ticket_id,"ticketReply_id"=>$ticketReply_id,
						"helpdeskEmailParserLog_id"=>$logId,"attachmentType"=>$attachmentType,
						"attachmentSize"=>$attachmentSize,"attachmentName"=>$attachmentName,"attachmentFile"=>$attachmentBody);
						$logId=$db->insertQuery("helpdeskattachment",$insertAttachArray);
	//					echo "<br><b>attachment<b><br>".$attachmentBody;
					}
				}
				$msg->unsetParts($mid);
				$msg->unsetHeaders($mid);
			}// end for
	//	}//end if
		$msg->close();
	//}//end while
}		//end if
?>