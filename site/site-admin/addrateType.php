<?php
include_once '../../config/config.inc.php';
include_once 'classes/production.class.php';
$objP			=	new production();
$arrTrans		=	$objP->listTrans_type();
$msg		=	$_REQUEST['msg'];

 $client_Id		=	$_GET['id'];
 $client_status		=	$_GET["code"];
 
if(isset($_POST['add']))
{


$rate_type		=	$_POST['rate_type'];
$base_rate		=	$_POST['base_rate'];
$perpage		=  $_POST['per_page'];


$msg			=	$objP->addOffer_rate($rate_type,$base_rate,$perpage);

if($msg=="")
{
echo "<script language='javascript'>window.opener.location='clientSheet.php?id=".$client_Id."&code=".$client_status."';</script>";
echo "<script language='javascript'>window.close();</script>";
	//header('location:clientSheet.php?id='.$client_Id.'');
	
}
}
//print_r($arrTrans);
?>

<!--<link href="css/style.css" rel="stylesheet" type="text/css" />-->
<script language="javascript" src="js/pop-up.js"></script>
<link href="js/popcalendar.css" rel="stylesheet" type="text/css">

<script language="javascript">
function check4(){

var txt = document.getElementById("rate_type").value;
//alert(txt);
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
{
alert ("Browser does not support HTTP Request")
return
} 
var url="listrate_type.php"
url=url+"?txt="+txt;
//alert(url);
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged11
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}
function stateChanged11() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{ 
//alert(xmlHttp.responseText);
document.getElementById("rate_content").innerHTML=xmlHttp.responseText;

////document.getElementById("txtHint6_1").innerHTML="";
//document.getElementById("txtHint6").innerHTML="";
<!--document.getElementById("btnHint1").innerHTML="<input type='submit' value='Submit'>";-->
document.getElementById("").innerHTML=xmlHttp.responseText ;
} 
}

function GetXmlHttpObject()
{ 
var objXMLHttp=null
if (window.XMLHttpRequest)
{
objXMLHttp=new XMLHttpRequest()
}
else if (window.ActiveXObject)
{
objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")
}
return objXMLHttp
}// JavaScript Document// JavaScript Document

</script>

<script language="javascript">
function reloadParentAndClose()
{
    // reload the opener or the parent window
    window.opener.location.reload();
    // then close this pop-up window
    window.close();
} 
</script>

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
      <table width="400" border="0" align="center" cellpadding="2" cellspacing="0">
        <tr>
          <td class="tbtext">Rate Type </td>
          <td width="2" class="tbtext">&nbsp;</td>
          <td><input name="rate_type" id="rate_type" type="text" class="field" />
          </td>
        </tr>
        <tr>
          <td class="tbtext">Base Rate </td>
          <td class="tbtext">&nbsp;</td>
          <td><input type="text" name="base_rate" id="base_rate" class="field"/></td>
        </tr>

        <tr>
          <td class="tbtext">Per Page </td>
          <td class="tbtext">&nbsp;</td>
          <td><input name="per_page" id="per_page" type="text" class="field" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td height="35" valign="bottom"><input type="image" name="add" img src="images/save.gif" alt="" width="69" height="21" onClick="return check4();"/>&nbsp;&nbsp;<img name="button" src="images/close.jpg" value="Go back" onClick="window.close();"  style="cursor:pointer"/>
		  <input type="hidden" name="add"  value="Submit"/>		  </td>
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
