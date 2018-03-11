<?php
/*    Reasons for Bouncing mail
	+++++++++++++++++++++++++++++
1. Nondeliverable mail - the user's email name is not found
2. Returned mail: Host unknown. Addresses had permanent fatal errors
3. Delivery problems with your mail.  The domain does not exist?
4. Error - Out of office or vacation replies....
5. Message Failure - Unknown user: or mail box full
6. Undeliverable mail - User maildir is over quota!
7. return mail: -  recipient is not in the address book
8. failure notice - Name server: host not found. This is a permanent error.
9. return mail notice - We have not been able to deliver this message for 24 hours
*/
//echo phpinfo();
//define("JGP_ROOT_DIR_PATH","/home/interberry/htdocs/BusinessDirectory/"); 
//require_once(JGP_ROOT_DIR_PATH.'config/config.php'); 
//require_once(JGP_ROOT_DIR_PATH.'connection/dbConnection.php'); 

 $host="{pop.gmail.com:995/pop3/ssl/novalidate-cert}INBOX";
 //"{pop.gmail.com:995/pop3}INBOX"; // pop3host
//$host="{pop.gmail.com:995/pop3}INBOX"; // pop3host
$user="gijoscampi@gmail.com";
$password="gijobincy";

function get_mime_type(&$structure) 
{

   $primary_mime_type = array("TEXT", "MULTIPART","MESSAGE", "APPLICATION", "AUDIO","IMAGE", "VIDEO", "OTHER");

   if($structure->subtype) 
   {

   return $primary_mime_type[(int) $structure->type] . '/' .$structure->subtype;

   }

   return "TEXT/PLAIN";

}

function get_part($stream, $msg_number, $mime_type, $structure = false,$part_number    = false) 
{

   if(!$structure) 
   {
   $structure = imap_fetchstructure($stream, $msg_number);
   }

   if($structure) 
   {
	   if($mime_type == get_mime_type($structure)) 
	   {
		   if(!$part_number) 
		   {
		   $part_number = "1";
		   }
		   $text = imap_fetchbody($stream, $msg_number, $part_number);
		   if($structure->encoding == 3) 
		   {
		   return imap_base64($text);
		   } else if($structure->encoding == 4) 
		   {
		   return imap_qprint($text);
		   } else 
		   {
		   return $text;
		   }
	
	   }

		if($structure->type == 1) /* multipart */ 
		{
			while(list($index, $sub_structure) = each($structure->parts)) 
			{
			   if($part_number) 
			   {
			   $prefix = $part_number . '.';
			   }
			   $data = get_part($stream, $msg_number, $mime_type, $sub_structure,$prefix .    ($index + 1));
			   if($data) 
			   {
			   return $data;
			   }
	
			} // END OF WHILE

   		} // END OF MULTIPART

   } // END OF STRUTURE

   return false;

} // END OF FUNCTION

   



//$mbox = imap_open ("{ekm.asianetonline.net:110/pop3}",  "regiloffice", "regildasx")

$host="67.220.196.18:143"; // pop3host
$user="test@portrave.com";
$password="porttest";

$mbox = imap_open($host,$user,$password) or die("can't connect: " . imap_last_error());
//$mbox = imap_open("{mail.portrave.com:110/pop3}INBOX", "test@portrave.com", "porttest");

echo "inbox".$mbox;

$MC=imap_check($mbox); 

$MN=$MC->Nmsgs; 
exit;
//print $MN;    // Total number of new mails

$overview=imap_fetch_overview($mbox,"1:$MN",0); 

$size=sizeof($overview); 

for($i=1;$i<=$size;$i++)
{ 
				
				$val=$overview[$i]; 
				
				$msg=$val->msgno; 
				
				$from=$val->from; 
				
				$date=$val->date; 
				
				$subj=$val->subject;
				
				print $subj."<br>";    // Subject of each mail
				
				////////////////////////////////
				
				// GET TEXT BODY
				
				   $dataTxt = get_part($mbox, $i, "TEXT/PLAIN");
				
				   
				
				   // GET HTML BODY
				
				   $dataHtml = get_part($mbox, $i, "TEXT/HTML");
				
				   
				
				   if ($dataHtml != "") 
				   {
				   $msgBody = $dataHtml;
				
				   $mailformat = "html";
				
				   } 
				   else 
				   {
				
				   $msgBody = ereg_replace("\n","<br>",$dataTxt);
				
				   $mailformat = "text";
				
				   }
				
				 $orgbody=$msgBody; 
				
				 $regilmail=$msgBody; 
				
	// reading header of the mail 
				
 $header = imap_headerinfo($mbox, $i, 80, 80);
 $fromaddress[$i] = $header->from[0]->host;
 $fromname[$i] = $header->from[0]->mailbox;
 $from= $fromname[$i]."@".$fromaddress[$i];      		// from address of mail
 
 $toaddress[$i] = $header->to[0]->host;
 $toname[$i] = $header->to[0]->mailbox;
 $to= $toname[$i]."@".$toaddress[$i];      		// to address of mail
 
  //$domain=$fromaddress[$i];
 $subject=$header->fetchsubject;                       // subject of mail
 
 	$body=split("--- Below this line is a copy of the message.",$orgbody);
	
	$body1=str_replace(">"," ",str_replace("<br>","\n",$body[0]));
	
	$body2=split("<",$body1);
	$reason=split(":",$body2[1]);
    $split_id1=split("@",$to);
	$split_id2=split("_",$split_id1[0]);
	$orderid=substr($split_id2[1],0,strlen($split_id2[1])-1);
	$orderflag=substr($split_id2[1],strlen($split_id2[1])-1,strlen($split_id2[1]));
	
	 
	
	if(is_numeric($orderid))
	{
		if(strpos($orderid,"e"))
		 { $orderid=""; }		 
	}
	else
	{ $orderid=""; }
	
	/*
	print "<font color='#0000CC' size='-3'><b> No : </b></font>".$i."<br> ";
	print "<font color='#0000CC' size='-3'><b> To : </b></font>".$to." <br>";
	print "<font color='#0000CC' size='-3'><b> Order Id : </b></font>".$orderid." <br>";
	print "<font color='#0000CC' size='-3'><b> Flag : </b></font>".$orderflag." <br>";
	print "<font color='#0000CC' size='-3'><b> Subject : </b></font>".$subject."<br>";
	print "<font color='#0000CC' size='-3'><b> Bounced Id : </b></font><font color='#990099' >".$reason[0]."</font><br>";
	print "<font color='#0000CC' size='-3'><b> Reason : </b></font>".$reason[1]."<br> $body[1] <br>"; 
	print "$split_id2[0]";
	*/
	
	$body_mail=split("Please do not edit on or below this line.",$body[1]);
	//print "b".$body[0]."<br>";
	//print "a".$body[1];
	$body_text=split("#######!!!!!!!!!!!!!!!!!!",$body_mail[1]);
	$msg_Body=split("~",$body_text[1]);
	//print $body_text[1];
	$id=$msg_Body[0];
	$uname=$msg_Body[1];
	$msg_body1=$msg_Body[2];
	$msg_end=split("%%",$msg_body1);
	$ulel=$msg_end[0];
	$id=round($id);
	//print $id."<br>";
	
	$qry=mysql_query("select email from users where id='$uname'");
	$qry1=mysql_fetch_array($qry);
	if($orderflag=="o")
	{
		$qry_ord=mysql_query("select orderflag from order1 where id='$id'");
		$qry_ord1=mysql_fetch_array($qry_ord);
		
		/// nComlete  (Incomplete) incom->client_mail table keyword
		/// New Cancel Change CR CP (NEW ORDER) new
		/// Active CancelA ChangeA CRA CancelReq (ACTIVE) active
		/// Review CancelRevReq CancelRev (REVIEW) review
		/// ReviewC CancelActReq CancelAct (REVIEW ACTIVE) review active
		/// Completed CancelComReq CancelCom (COMPLETED) complete
		
			// category into client mail table
			
		switch($qry_ord1[orderflag])
		{
		case "nComlete":
							$or="incom"; 	
							break;
		case "New":
		case "NewC":
		case "Change":
		case "CR":
		case "CP":
							$or="new"; 		
							break;
		case "Active":
		case "CAA":
		case "ChangeA":
		case "CRA":
		case "CancelReq":
							$or="active"; 		
							break;
		case "Review":
		case "CancelRevReq":
							$or="review"; 		
							break;
		case "ReviewC":
		case "CancelActReq":
							$or="review active"; 		
							break;
		case "Completed":
		case "CancelComReq":
		case "CancelCom":
		case "CancelAct":
		case "CancelRev":
		case "CancelA":
		case "Cancel":
		case "CancelR":
							$or="complete"; 		
							break;
		}
	}
	elseif($orderflag=="p")
    { $or="comp"; }
	
	
  if(($split_id2[0]=="bounce")&&($orderid!="")&&(($orderflag=="o")||($orderflag=="p")))
  {
 // print "=> [bounce mail] <br>";
   // $qry=mysql_query("INSERT INTO `bounce_mails` (`bounce_reason` , `bounce_email` , `bounce_matter`, `bounce_orderid`, `bounce_orderflag`) VALUES ('".addslashes($reason[1])."', '".addslashes($reason[0])."','".addslashes($body[1])."','$orderid','$orderflag')");
 	$qry=mysql_query("INSERT INTO `bounce_mails` (`from_mail` , `to_mail` , `from_status` , `to_status` ,`category`, `date`, sendby,`code` ,`bounce_reason` , `bounce_email` , `bounce_matter`, `bounce_orderid`, `bounce_orderflag`) VALUES ('$from', '$qry1[email]', ',$ulel,', ',$ulel,','$or', now(),'$from','','".addslashes($reason[1])."', '".addslashes($reason[0])."','".addslashes($body[1])."','$orderid','$orderflag')");
	//print "INSERT INTO `bounce_mails` (`from_mail` , `to_mail` , `from_status` , `to_status` ,`category`, `date`, sendby,`code` ,`bounce_reason` , `bounce_email` , `bounce_matter`, `bounce_orderid`, `bounce_orderflag`) VALUES ('$from', '$qry1[email]', ',$ulel,', ',$ulel,','$or', now(),'$from','','".addslashes($reason[1])."', '".addslashes($reason[0])."','".addslashes($body[1])."','$orderid','$orderflag')";
		imap_delete ($mbox,$i);   

  }
  elseif(($split_id2[0]=="bounce")&&($orderid=="")&&($orderflag==""))
  {
 //  print "==> [Miscellenious] <br>";
   $qry=mysql_query("INSERT INTO `bounce_other_mails` (`bounce_reason` , `bounce_email` , `bounce_matter`, `bounce_orderid`, `bounce_orderflag`) VALUES ('".addslashes($reason[1])."', '".addslashes($reason[0])."','".addslashes($body[1])."','$orderid','$orderflag')");
  		imap_delete ($mbox,$i);   

  }
  else /* mails which has from address not as [ bounce@  , bounce_123p   , bounce_23o ] */
  {
   //print "==> [][][][][][]  <br>";
  }
 /*
				
								// Please do not edit below this line#######!!!!!!!!!!!!!!!!!!$orderid~$_SESSION['M_Username']~$_SESSION['M_Userlevel']//
								
	$body=split("Please do not edit on or below this line.",$orgbody);
	//print "b".$body[0]."<br>";
	//print "a".$body[1];
	$body_text=split("#######!!!!!!!!!!!!!!!!!!",$body[1]);
	$msg_Body=split("~",$body_text[1]);
	//print $body_text[1];
	$id=$msg_Body[0];
	$uname=$msg_Body[1];
	$msg_body1=$msg_Body[2];
	$msg_end=split("%%",$msg_body1);
	$ulel=$msg_end[0];
	$id=round($id);
	//print $id."<br>";
	
	$qry=mysql_query("select email from users where id='$uname'");
	$qry1=mysql_fetch_array($qry);
	
	$qry_ord=mysql_query("select orderflag from order1 where id='$id'");
	$qry_ord1=mysql_fetch_array($qry_ord);
	
	/// nComlete  (Incomplete) incom->client_mail table keyword
	/// New Cancel Change CR CP (NEW ORDER) new
	/// Active CancelA ChangeA CRA CancelReq (ACTIVE) active
	/// Review CancelRevReq CancelRev (REVIEW) review
	/// ReviewC CancelActReq CancelAct (REVIEW ACTIVE) review active
	/// Completed CancelComReq CancelCom (COMPLETED) complete
	
	    // category into client mail table
		
	switch($qry_ord1[orderflag])
	{
	case "nComlete":
						$or="incom"; 	
						break;
	case "New":
	case "NewC":
	case "Change":
	case "CR":
	case "CP":
						$or="new"; 		
						break;
	case "Active":
	case "CAA":
	case "ChangeA":
	case "CRA":
	case "CancelReq":
						$or="active"; 		
						break;
	case "Review":
	case "CancelRevReq":
						$or="review"; 		
						break;
	case "ReviewC":
	case "CancelActReq":
						$or="review active"; 		
						break;
	case "Completed":
	case "CancelComReq":
	case "CancelCom":
	case "CancelAct":
	case "CancelRev":
	case "CancelA":
	case "Cancel":
	case "CancelR":
						$or="complete"; 		
						break;
	}
	
if($id=="")
{ $or="comp"; }
	
	/// original body of mail                      				// print  $orgbody;
	 	$My_msg_Body=split("-%-%",$orgbody);
		$mat=$My_msg_Body[0]; 
		$mat.="-%-% </td></tr></table>";         							// message of mail
						
						// It contains all HTML HEADER tags so we don't have to make them.
						//$mat1=str_replace(">","",$mat1); print $mat1."<br>";
						//$mat=str_replace("<br","<br>",$mat1); print $mat."<br>";
						
		//print "$id:---:$uname:----:$ulel:----:$from:------:$or <br>";
	//print "$id:---DONE $subj";
		
if($id!="")   / INSERTING into the TABLE 
{ bounce_mails
	//$qry=mysql_query("INSERT INTO `client_mail` (`from_mail` , `to_mail` , `from_status` , `to_status` ,`category`, `date`, `subject` ,`matter`,sendby,`code` ) VALUES ('$from', '$qry1[email]', ',13,,14,,15,', ',$ulel,','$or', now(),'$subject', '$mat','$from','')");
    //print "INSERT INTO `client_mail` (`from_mail` , `to_mail` , `from_status` , `to_status` ,`category`, `date`, `subject` ,`matter`,sendby,`code` ) VALUES ('$from', '$qry1[email]', ',13,,14,,15,', ',$ulel,','$or', now(),'$subject', '$mat','$from','') <br>";
}
*/					
}
imap_expunge ($mbox);                      


imap_close($mbox); 
//print "----All Done----";
mail("cron_daily@yahoo.co.in","Bounce Mail Divide Cron (in test)","Mails which are BOUNCED back has been posted to tables","From: cron_daily@thompsonllc.com \r\n");
?>