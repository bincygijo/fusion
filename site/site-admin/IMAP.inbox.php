<?php
	require_once 'IMAP.php';
	include_once '../../config/config.inc.php';
	include_once 'classes/user.class.php';
	
		
	$db=new database();
	$msg =& new Mail_IMAP();
	$timeParsed=time();	

	
/*if(is_array($helpdeskEmails)){
	while(list($key,$list)=each($helpdeskEmails)){
*/		$server='67.220.196.18';
		$username='test@portrave.com';
		$password='porttest';
		
		    if($mbox =$msg->open("67.220.196.18","143"))
    {
	
     // echo $imap->get_error();
       // exit;
    } 

	 $msg->login("test@portrave.com","porttest");
  //  echo $imap->error;
    $mail=$msg->open_mailbox("INBOX");
 //   echo $imap->error;
	

		echo "count==".$msgcount = $msg->get_msglist();
		
		if ($msgcount > 0)
		{
			for ($mid = 1; $mid <= $msgcount; $mid++)
			{
				
				echo "pid==". $pid = $msg->getDefaultPid($mid);
				
				
		
		
	echo 	 $struct = imap_fetchstructure($mbox, $mid);
       
        $parts = $struct->parts;
        $i = 0;

        if (!$parts) { /* Simple message, only 1 piece */
          $attachment = array(); /* No attachments */
          $content = imap_body($mbox, $mid);
        } else { /* Complicated message, multiple parts */
       
          $endwhile = false;
       
          $stack = array(); /* Stack while parsing message */
          $content = "";    /* Content of message */
          $attachment = array(); /* Attachments */
       
          while (!$endwhile) {
            if (!$parts[$i]) {
              if (count($stack) > 0) {
                $parts = $stack[count($stack)-1]["p"];
                $i     = $stack[count($stack)-1]["i"] + 1;
                array_pop($stack);
              } else {
                $endwhile = true;
              }
            }
         
            if (!$endwhile) {
              /* Create message part first (example '1.2.3') */
              $partstring = "";
              foreach ($stack as $s) {
                $partstring .= ($s["i"]+1) . ".";
              }
              $partstring .= ($i+1);
           
              if (strtoupper($parts[$i]->disposition) == "ATTACHMENT") { /* Attachment */
                $attachment[] = array("filename" => $parts[$i]->parameters[0]->value,
                                      "filedata" => imap_fetchbody($mbox, $mid, $partstring));
              } elseif (strtoupper($parts[$i]->subtype) == "PLAIN") { /* Message */
                $content .= imap_fetchbody($mbox, $mid, $partstring);
              }
            }

            if ($parts[$i]->parts) {
              $stack[] = array("p" => $parts, "i" => $i);
              $parts = $parts[$i]->parts;
              $i = 0;
            } else {
              $i++;
            }
          } /* while */
        } /* complicated message */

        echo "Analyzed message $mid, result: <br />";
        echo "Content: $content<br /><br />";
        echo "Attachments:"; print_r ($attachment);
		
		
		
		
		
		
exit;		
		
				$msg->getHeaders($mid, $pid);
				$msg->getParts($mid, $pid);
				/*if (!isset($msg->header[$mid]['subject']) || empty($msg->header[$mid]['subject']))
				{
					$msg->header[$mid]['subject'] = "<span style='font-style: italic;'>no subject provided</a>";
				}*/
//				print_r($msg->header[$mid]);
	
			echo "sub==".	$emailSubject=$msg->header[$mid]['subject'];
			echo "from".	$senderEmail_id=$msg->header[$mid]['from'][0];
				$recipientEmail_id=$msg->header[$mid]['to'][0];
				$sendDate=date('D d M, Y h:i:s', $msg->header[$mid]['udate']);	
				echo "<br><font size='16px'>$mid</font>----$emailSubject";
	
		echo "body".		$body = $msg->getBody($mid, $pid);
				
		exit;	
			$emailBody=addslashes($body['message']);
	//			echo $emailBody;
				// Now the attachments
				/*$insertArray=array("userCompany_id"=>$userComapny_id,"timeParsed"=>$timeParsed,"sendDate"=>$sendDate,
				"senderEmail"=>$senderEmail_id,"senderName"=>$senderName,"recipientName"=>$recipientName,
				"recipientEmail"=>$recipientEmail_id,"emailSubject"=>$emailSubject,"emailBody"=>$emailBody);
				$logId=$db->insertQuery("helpdeskemailparserlog",$insertArray);*/
				
				
				
				if (isset($msg->attachPid[$mid]) && count($msg->attachPid[$mid]) > 0) {
					foreach ($msg->attachPid[$mid] as $i => $aid)
					{
						/*$attachmentbody = $msg->getBody($mid, $msg->attachPid[$mid][$i]);
//						print_r($attachmentbody);
						$attachmentType=$msg->attachFtype[$mid][$i];
						$attachmentName=$msg->attachFname[$mid][$i];
						$attachmentSize=$msg->convertBytes($msg->attachFsize[$mid][$i]);
						echo "<br>$attachmentType= 	$attachmentName= $attachmentSize= ";
						$attachmentBody=addslashes($attachmentbody['message']);
						$insertAttachArray=array("ticket_id"=>$ticket_id,"ticketReply_id"=>$ticketReply_id,
						"helpdeskEmailParserLog_id"=>$logId,"attachmentType"=>$attachmentType,
						"attachmentSize"=>$attachmentSize,"attachmentName"=>$attachmentName,"attachmentFile"=>$attachmentBody);
						$logId=$db->insertQuery("helpdeskattachment",$insertAttachArray);*/
	//					echo "<br><b>attachment<b><br>".$attachmentBody;
					}
				}
				$msg->unsetParts($mid);
				$msg->unsetHeaders($mid);
			}// end for
		}//end if
		$msg->close();
	//}//end while
//}		//end if
?>
