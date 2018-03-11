<?php
include_once '../../config/config.inc.php';
include_once 'classes/production.class.php';
include('fpdf.php');
include('html2fpdf.php');
$objP			=	new production();
$arrTrans		=	$objP->listTrans_type();
$msg		=	$_REQUEST['msg'];

 $client_Id		=	$_GET['id'];
 $account_id	=$_GET['aid'];
  $listAccount		= $objP->listAccount($client_Id);
  $listpayment		=	$objP->listpayment($client_Id);
 //print_r($listpayment);
 $deposit				= $listAccount['client_deposit'];
 
// $account_id		=	$listAccount['client_account_id'];
$count		=	$objP->getPayment($client_Id);
	$sum 	=	$count['amount'];
	$tot	=$sum+$deposit;
	//echo "total=".$tot."<br>";	
 $total			=	$listAccount['total'];
 
 //echo $total;

if(isset($_POST['add']))
{
//$listAccount		=	$objP->listAccount($client_Id);

$dateRece		=	$_POST['date_received'];
  $transId		=	$_POST['trans_type'];
//$note			=	$_POST['notes'];
//$pre_amount		=	$listAccount['client_deposit'];
$amount			=	$_POST['amountrece'];

$amt_total	=	$amount+$deposit;
//$total		=
$msg			=	$objP->addPayment($client_Id,$account_id,$dateRece,$transId,$amount);
	
/*if($total==$tot)
{
$msg			=	$objP->updateaccount($client_Id,$account_id);

}*/

//$msg1			= $objP->

include('invoice_PDF.php');
generateInvoicePDF($client_Id,$account_id);


if($msg=="")
{

echo "<script language='javascript'>window.close();</script>";
	//header('location:clientSheet.php?id='.$client_Id.'');
	
}
header("Location:invoices/invoicepayment".$client_Id.".pdf");
}
//print_r($arrTrans);
?>

<!--<link href="css/style.css" rel="stylesheet" type="text/css" />-->
<script language="javascript" src="js/pop-up.js"></script>
<link href="js/popcalendar.css" rel="stylesheet" type="text/css">


<script language="javascript">
function function1(){
//alert("hi");
if(document.form1.trans_type.value==0)
{
alert("Please select transaction type");
document.form1.date_received.focus();
return false;
}

if(document.form1.amountrece.value=="")
{
alert("Enter amount");
document.form1.amountrece.focus();
return false;
}
	
/*var date1 = document.getElementById("date_received").value;
//alert(date1);
var type = document.getElementById("trans_type").value;
var amount = document.getElementById("amountrece").value;
var str = " ($"+amount +","+type+")"+ date1 ;
//window.parent.document.getElementById("deposit").value = str;

window.opener.document.getElementById("deposit").innerHTML = str;

return true;*/
}


var xmlHttp
var tp
function showId10(str){ 

	tp = str;
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null){
		alert ("Browser does not support HTTP Request")
		return
	} 
	var url="addTransaction1.php"
	url=url+"?q="+str
	//alert(url);
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=stateChanged 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}

function stateChanged(){ 
	if(xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
		if(tp=="Other"){
			document.getElementById("txtHint1_1").innerHTML="New Payment type";
			document.getElementById("txtHint1").innerHTML=xmlHttp.responseText ;
		}else{
			document.getElementById("txtHint1_1").innerHTML="";
			document.getElementById("txtHint1").innerHTML="";
		}
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




function check(){

var txt = document.getElementById("trans").value;
//alert(tp);
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
{
alert ("Browser does not support HTTP Request")
return
} 
var url="addtrans_type.php"
url=url+"?txt="+txt;
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged6
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}
function stateChanged6() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{ 
//alert(xmlHttp.responseText);
document.getElementById("trans_paper_content").innerHTML=xmlHttp.responseText;

document.getElementById("txtHint1_1").innerHTML="";
document.getElementById("txtHint1").innerHTML="";
<!--document.getElementById("btnHint1").innerHTML="<input type='submit' value='Submit'>";-->
document.getElementById("").innerHTML=xmlHttp.responseText ;
} 
}


function function2(){

var date1 = document.getElementById("date_received").value;
alert(date1);
var type = document.getElementById("trans_type").value;
//alert(type);
var amount = document.getElementById("amountrece").value;
var str = "($"+amount +","+type+")"+ date1 ;
//var str = "PAID ($"+amount +","+type+")"+ date1 ;
//alert(amount);
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
{
alert ("Browser does not support HTTP Request")
return
} 
var url="popup_add.php"
url=url+"?txt="+str;
//alert(url);
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged8
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}
function stateChanged8() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{ 
//alert(xmlHttp.responseText);
document.getElementById("deposit_content").innerHTML=xmlHttp.responseText;

//document.getElementById("txtHint1_1").innerHTML="";
//document.getElementById("txtHint1").innerHTML="";
<!--document.getElementById("btnHint1").innerHTML="<input type='submit' value='Submit'>";-->
document.getElementById("").innerHTML=xmlHttp.responseText ;
} 
}





function showId15(str){ 

	tp = str;
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null){
		alert ("Browser does not support HTTP Request")
		return
	} 
	var url="addrate.php"
	url=url+"?q="+str
	//alert(url);
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=stateChanged15 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}

function stateChanged15(){ 
	if(xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
	var response = xmlHttp.responseText ;
	//alert(response);
	str = response.split("*");
	
	document.getElementById("baserate").value=str[0];
	
	document.getElementById("rate").value=str[1];
	
	//document.getElementById("txtHint15").innerHTML="";
	
	//document.getElementById("rateType_item1").innerHTML=xmlHttp.responseText 
		/*if(tp=="2"){
			document.getElementById("txtHint15_1").innerHTML="New Supplier";
			document.getElementById("txtHint15").innerHTML=xmlHttp.responseText ;
		}else{
			document.getElementById("txtHint15_1").innerHTML="";
			document.getElementById("txtHint15").innerHTML="";
		}*/
	} 
} 





</script>
<script language="javascript" src="js/cal2.js">
</script>
<script language="javascript" src="js/cal_conf2.js"></script>

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
    <td><table width="450" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#75bce1">
      <tr class="rowcolor1">
        <td class="tbhead">Date</td>
        <td class="tbhead">Amount</td>
        <td class="tbhead">Type</td>
      </tr>
	  
	  	<? 
	if(!empty($listpayment))
	{
	foreach($listpayment as $key=>$value)
	{
	 $trans_id		=	$value['type'];
	$listType		=	$objP->getTransactionType($trans_id);
	$type			=	$listType['name'];
	 ?>
	
	
      <tr class="rowcolor2">
        <td class="tbtext"><?=$value['date_received']?></td>
        <td class="tbtext"><?=$trans_id?></td>
        <td align="right" class="tbtext"><?=$value['amount']?></td>
      </tr>
	  <?  }
	}?>
	
	
	  <tr class="rowcolor2"><td></td><td class="tbtext">Total(Inc.Deposit)</td><td class="tbtext" align="right"><?=number_format($sum +$deposit,2);?></td></tr>
<?
	// else{
	?>
	<!--<tr class="rowcolor2"><td colspan="3" align="center"><font color="#FF0000">No data found!</font></td></tr>-->
	<? // }?>
     	
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
      <table width="400" border="0" align="center" cellpadding="2" cellspacing="0">
        <tr>
          <td class="tbtext">Amount received as deposited</td>
          <td width="2" class="tbtext">&nbsp;</td>
          <td><label>
            <input name="textfield" type="text" class="field" value="<?=$deposit;?>" readonly="" />
          </label></td>
        </tr>
        <tr>
          <td class="tbtext">Date received</td>
          <td class="tbtext">&nbsp;</td>
          <td><input name="date_received" id="date_received" type="text" class="field" value="<?=date("Y-m-d")?>" /><!--<a href="javascript:;" name="AnchorTo" id="AnchorTo" onClick="popUpCalendar(form1.image3,document.getElementById('date_received'), 'yyyy-mm-dd')"><img src="js/images/calendar.gif" alt="Date Selector" name="image3" width="20" height="20" hspace="3" border="0" align="absmiddle" id="image3" onMouseOver="window.status='Pop up a calendar to select a date';return true" onMouseOut="window.status='';return true;"></a><script language="javascript" src="js/datecal.js"></script>--><a href="javascript:showCal('Calendar9')"> <img src="images/cal.gif" width="19" height="17" border="0" /></a></td>
        </tr>
        <tr>
          <td class="tbtext">Transaction type</td>
          <td class="tbtext">&nbsp;</td>
          <td><div id="trans_paper_content"><select name="trans_type" id="trans_type"  class="listmenu" onChange="showId10(this.value)">
	<option value="">--Select One--</option>
	<? if(!empty($arrTrans))
		{
		foreach($arrTrans as $key=>$value)
		{ ?>
		<option value="<?=$value['name']?>" <? if($trans_type==$value['trans_id']) echo 'selected';?> >
		 <?=$value['name']?></option>
		<? }
		}?>
	
	</select></div>	</td>
        </tr>
		 <tr><td colspan="2" class="tbtext"><div id="txtHint1_1"></div></td><td ><div id="txtHint1"></div></td></tr>
		 
        <tr>
          <td class="tbtext">Amount received</td>
          <td class="tbtext">&nbsp;</td>
          <td><input name="amountrece" id="amountrece" type="text" class="field" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td height="35" valign="bottom"><input type="image" name="add" img src="images/submit.gif" alt="" width="69" height="21" onClick="return function1();"/>&nbsp;&nbsp;<img name="button" src="images/close.jpg" value="Go back" onClick="window.close();"  style="cursor:pointer"/>
		  <input type="hidden" name="add"  value="Submit"/>
		  </td>
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
