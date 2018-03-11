<?
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/entry.class.php';
include_once 'classes/history.class.php';
$objU		=	new user();
$objE 			=	new entry();
$objH 			=	new history();
  
 
  
 		if(isset($_POST['add']))
		
		{
		  $contentId		=	$_GET['id'];
		 
			 $id 				=  $_GET['cid'];
			
			 $details			=	$_POST['details'];	
		 	$Date				= date('Y-m-d');		
			$client_id			=	explode("-",$id);
		
		if(($_POST['summary']=="") || ($_POST['details']==""))
		{
	 	$Summary 			= 'Removed from email received';
		$details			= 'Removed from email received';
		}
		else
		{
		  $Summary			=	$_POST['summary'];
		 $details			=	$_POST['details'];	
		}
		
		
		
		//echo "count==".$k=sizeof($client_id);
	
		for($i = 0; $i < count($client_id)-1; $i++){
		
			$Emailid		= 	$objU->getEmailId($client_id[$i]);
			
			$id				=	$Emailid[0]['content_id'];
	 		$name			= $Emailid[0]['email_from'];
		 	$email			=	$objU->getSchoolEmail($name);
		 	$m				=	$email['client_id'];
		 	$school			=	$email['school'];
		
		 
		 $listEmail		=	$objU->getSchoolEmail($m);
		 $client		=	$listEmail['client_id'];
		
			
		$msg		= $objH->addEmail_History($m,$Date,$Summary,$details,$school);
		//$msg		= $objH->add_EmalHistory($m,$Date,$Summary,$details,1);
		
		$msg			= 	$objU->updateEmail($client_id[$i]);		
		//$msg			= 	$objU->deleteEmail($client_id[$i]);	
				
	
				
			
		


echo "<script language='javascript'>window.opener.location='workSpace.php';</script>";

echo "<script language='javascript'>window.close();</script>";
	//header('location:clientSheet.php?id='.$client_Id.'');
	


	}		
	
}

 
	 /*if(isset($_POST['add']))
	 {
	 		$email		=	$value['email_from'];
		 $listEmail		=	$objU->getSchoolEmail($email);
		 $Summary			=	$_POST['summary'];
		$details			=	$_POST['details'];	
		$Date	= date('Y-m-d');	
		
		//$msg		= $objH->addHistory($client_id,$Date,$staffName,$Client,$school,$Summary,$details);
		
		$msg		= $objH->addContact_History($client_id,$Date,$Summary,$details);
		
		if($msg=="")
{

echo "<script language='javascript'>window.close();</script>";
	//header('location:clientSheet.php?id='.$client_Id.'');
	
}

	
	
	}*/
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fusion Books</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body style="background:none;">
<table width="540" border="0" cellspacing="0" cellpadding="0" class="border_box">
  <tr>
    <td height="30">&nbsp;</td>
  </tr>
  <form id="form1" name="form1" method="post" action="">
 
 
  <tr>
    <td>
      <table width="500" border="0" align="center" cellpadding="2" cellspacing="0">
        <tr>
          <td class="tbtext">Short Summary </td>
          <td width="2">&nbsp;</td>
          <td height="35" valign="bottom"><input type="text" name="summary" id="summary" value=""  class="field3"/></td>
        </tr>
        <tr>
          <td class="tbtext">Detail</td>
          <td>&nbsp;</td>
          <td height="35" ><textarea name="details"  class="textarea1"></textarea></td>
        </tr>
        <tr>
          <td class="tbtext">&nbsp;</td>
          <td>&nbsp;</td>
          <td height="35" valign="bottom"><input type="image" name="add" img src="images/save.gif" alt="" width="69" height="21" onClick=""/> &nbsp; <img name="button" src="images/close.jpg" value="Go back" onClick="window.close();"  style="cursor:pointer"/>
		  <input type="hidden" name="add" value="submit" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td height="35" valign="bottom">&nbsp;</td>
        </tr>
      </table>           </td>
  </tr>
  </form> 
  <tr>
    <td height="30">&nbsp;</td>
  </tr>
</table>
</body>
</html>

