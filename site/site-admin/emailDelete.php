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
			  $client_id 		=  $_GET['cid'];
			 $Summary			=	$_POST['summary'];
			 $details			=	$_POST['details'];	
		 	$Date				= date('Y-m-d');		
				
		
	
		
		  	$Emailid		= 	$objU->getEmailId($client_id);
			$id				=	$Emailid[0]['content_id'];
	 		$name			= $Emailid[0]['email_from'];
		 	$email			=	$objU->getSchoolEmail($name);
	 		$m					=	$email['client_id'];
		 
		
		
			
		$msg		= $objH->addContact_History($m,$Date,$Summary,$details);
				
		$msg			= 	$objU->deleteEmail($client_id);	
			
	
echo "<script language='javascript'>window.opener.location='workSpace.php';</script>";

echo "<script language='javascript'>window.close();</script>";
	//header('location:clientSheet.php?id='.$client_Id.'');
	



}

 
	
	
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
          <td height="35" valign="bottom"><input type="image" name="add" img src="images/submit.gif" alt="" width="69" height="21" onClick=""/>
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

