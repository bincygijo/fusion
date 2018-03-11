<?php
//session_start();
//include("loginchk.php");
include_once '../../config/config.inc.php';
include_once 'classes/search.class.php';
include_once 'classes/entry.class.php';
include_once 'classes/user.class.php';
include_once 'classes/history.class.php';


$objS			=	new search();
$objE			=	new entry();
$objH 			=	new history();
$objU			=	new user();
	$id =  $_GET['cid'];
	$cid	=	explode("-",$id);
	$cid	=	explode("-",$id);
 	$id =  $_GET['cid'];
	$client_id	=	explode("-",$id);
	if(isset($_POST['add']))
	{
	 	$id =  $_GET['cid'];
		$action_id	=$_GET['act'];
		if(($_POST['summary']=="") || ($_POST['details']==""))
		{
	 	$Summary 			= 'Removed from sample books ';
		$details			= 'Removed from sample books ';
		}
		else
		{
		 $Summary			=	$_POST['summary'];
		 $details			=	$_POST['details'];	
		}
		$Date	= date('Y-m-d');		
		$client_id	=	explode("-",$id);
		$cid	=	 $client_id[$i];
		for($i = 0; $i < count($client_id); $i++){
		$clentId		=	$objU->listClient_id($client_id[$i]);
		$school_clent	=	$clentId[0]['school'];
		$msg			= $objH->addContact_History($client_id[$i],$Date,$Summary,$details,$school_clent);
		$msg			= 	$objE->deleteNewentry($client_id[$i],$action_id);	
					
						
				
//if($msg=="")
//{
echo "<script language='javascript'>window.opener.location='workSpace.php';</script>";
echo "<script language='javascript'>window.close();</script>";
$arrEntry		= 	$objE->listEntry();
		
//	}

	}		
	
}
$arrDetails		= 	$objE->entryDetails();
	
	$arrContacted	=	$objE->entryContactedsoon();


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
          <td height="35" valign="bottom"><input type="image" name="add" img src="images/save.gif" alt="" width="69" height="21" onClick="function1();"/>&nbsp; <img name="button" src="images/close.jpg" value="Go back" onClick="window.close();"  style="cursor:pointer"/>
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

