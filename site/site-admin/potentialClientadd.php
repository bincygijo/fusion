<?php
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/entry.class.php';
include_once 'classes/history.class.php';

$objU		=	new user();
$objE 			=	new entry();
$objH 			=	new history();
 $client_id		=	$_GET['id'];
 $action_id		=	$_GET['action_id'];
$date			=	date('Y-m-d');
		if(isset($_POST['add']))
{
		 $Summary			=	$_POST['summary'];
		 $details			=	$_POST['details'];	
		$Date	= date('Y-m-d');	
		
			/*$reason	=	$_POST['desc'];
			$msg		= 	$objU->getclient($client_id);
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
				$info		=	$msg[0]['information'];*/
				
				//fields in history
				
				
		/* $Date				=	$_POST['txtdate'];
		$staffName			=	$_POST['staff_name'];
		$Client				=	$_POST['client_name'];
		$school				=	$_POST['school'];
		$Summary			=	$_POST['summary'];
		$details			=	$_POST['details'];
		*/
	//	$msg		= $objH->addHistory($client_id,$Date,$staffName,$Client,$school,$Summary,$details);
	$msg		= $objH->addContact_History($client_id,$Date,$Summary,$details);	
				
				/*$qry		=	"INSERT INTO client_history (client_id, name, school, position, street, substreet, state, country, postal, contact, email, information,action_id, date,reason) VALUES ($id, '$name', '$school', '$position', '$street', '$substr', '$state', '$country', '$postal', '$contact', '$email', '$info', $action_id,'$date','$reason')";
				
				
				$result		= 	mysql_query($qry);*/
				
				$msg1			= 	$objE->deleteNewentry($client_id,$action_id);	
				
					
			if($msg=="")
{

echo "<script language='javascript'>window.close();</script>";
	//header('location:clientSheet.php?id='.$client_Id.'');
	
}
			
			//header('location:potentialClient.php?msg=Successfully removed');
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
    <td height="35">&nbsp;</td>
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
          <td height="35" valign="bottom"><input type="image" name="add" img src="images/submit.gif" alt="" width="69" height="21" onClick="function1();"/>
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

