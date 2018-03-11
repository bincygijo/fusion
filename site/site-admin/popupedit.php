<?php
include_once '../../config/config.inc.php';
include_once 'classes/production.class.php';
include_once 'classes/user.class.php';

include('fpdf.php');
include('html2fpdf.php');

$pdf=new HTML2FPDF();
$objP			=	new production();
$objU			=	new user();
$arrTrans		=	$objP->listTrans_type();
//print_r($arrTrans);
$msg		=	$_REQUEST['msg'];

 $client_Id		=	$_GET['id'];
  $arrUser		=	$objU->list_user($client_Id);
  $school_name	=	$arrUser['school'];
  $staff_name		=	$arrUser['name'];
  
   $reason		=	'Edit Payment paid as deposit';
  
  $listAccount		= $objP->listAccount($client_Id);
 //print_r($listAccount);
  $deposit				= $listAccount['client_deposit'];
 $account_id			=	$_GET['acid'];
 $date_res		=	$listAccount['date_received'];
  $trans_type		=	$listAccount['transation_id'];
 $date		=	date('Y-m-d');

 //echo $account_id;
if(isset($_POST['add']))
{
$listAccount		= $objP->listAccount($client_Id);
 $deposit				= $listAccount['client_deposit'];
// echo $deposit;

$his_detail		=	$_POST['reason'];




$dateRece		=	$_POST['date_received'];
 $transId		=	$_POST['trans_type'];
 //echo "$transId";exit;
$note			=	$_POST['notes'];
//$pre_amount		=	$listAccount['client_deposit'];
$amount			=	$_POST['amountrece'];
//$total				= $deposit + $amount;
//echo $otal;
//$total		=	

$qry		=	mysql_query("insert into new_history(client_id,history_staffname,history_date,history_school,history_summary,history_detail,Transation_type,amount)values($client_Id,'$staff_name','$date','$school_name','$reason','$his_detail','$transId','$amount')");



$msg			=	$objP->modifyAccounts($dateRece,$transId,$note,$amount,$client_Id,$account_id);


include('renewal_PDF.php');

generateInvoicePDF($client_Id);

if($msg=="")
{

echo "<script language='javascript'>window.close();</script>";
	//header('location:clientSheet.php?id='.$client_Id.'');
	
}
header("Location:invoices/invoice".$client_Id.".pdf");
}
//print_r($arrTrans);




?>

<!--<link href="css/style.css" rel="stylesheet" type="text/css" />-->
<script language="javascript" src="js/pop-up.js"></script>
<link href="js/popcalendar.css" rel="stylesheet" type="text/css">


<script language="javascript">
function function1(){
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
if(document.form1.reason.value=="")
{
alert("Enter reason ");
document.form1.reason.focus();
return false;
}

//alert("hi");
//var uid	= id;
//alert(uid);	
var depo	=	document.getElementById("depo").value;
//alert(depo);
var date1 = document.getElementById("date_received").value;
//alert(date1);
var type = document.getElementById("trans_type").value;
var amount1 = document.getElementById("amountrece").value;
//var amount	=	Number(depo)+Number(amount1);
//alert(amount);
var str = " ($"+amount1 +","+type+")"+ date1 ;
//window.parent.document.getElementById("deposit").value = str;

window.opener.document.getElementById("deposit").innerHTML = str;
}
var xmlHttp
var tp
function showId10(str){ 

	tp = str;
	//alert(tp);
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null){
		alert ("Browser does not support HTTP Request")
		return
	} 
	var url="addTransaction.php"
	//alert(url);
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
//alert(url);
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
//alert(date1);
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
    <td>
      <table width="400" border="0" align="center" cellpadding="2" cellspacing="0">
        <tr>
          <td class="tbtext">Amount received as deposited</td>
          <td width="2" class="tbtext">&nbsp;</td>
          <td><input type="text" name="depo" id="depo" value="<?=$deposit;?>" readonly="" class="field" /> </td>
        </tr>
        <tr>
          <td class="tbtext">Date received</td>
          <td class="tbtext">&nbsp;</td>
          <td><input type="text" name="date_received" id="date_received" value="<?=$date_res; //date('Y-m-d');?>"  class="field"/><!--<a href="javascript:;" name="AnchorTo" id="AnchorTo" onClick="popUpCalendar(form1.image3,document.getElementById('date_received'), 'yyyy-mm-dd')"><img src="js/images/calendar.gif" alt="Date Selector" name="image3" width="20" height="20" hspace="3" border="0" align="absmiddle" id="image3" onMouseOver="window.status='Pop up a calendar to select a date';return true" onMouseOut="window.status='';return true;"></a><script language="javascript" src="js/datecal.js"></script>--><a href="javascript:showCal('Calendar7')"> <img src="images/cal.gif" width="19" height="17" border="0" /></a></td>
        </tr>

        <tr>
          <td class="tbtext">Transaction type </td>
          <td class="tbtext">&nbsp;</td>
          <td><div id="trans_paper_content"><select name="trans_type" id="trans_type"  class="listmenu" onChange="showId10(this.value)">
	<option value="">--Select One--</option>
	<?php if(!empty($arrTrans))
		{
		foreach($arrTrans as $key=>$value)
		{ ?>
		<option value="<?=$value['name']?>" <?php if($trans_type==$value['name']) echo 'selected';?>>
		 <?=$value['name']?></option>
		<?php }
		}?>
	
	</select></div></td>
        </tr>
		 <tr><td class="tbtext"><div id="txtHint1_1"></div></td><td></td><td ><div id="txtHint1"></div></td></tr>
        <tr>
          <td><span class="tbtext">Notes</span></td>
          <td>&nbsp;</td>
          <td height="35" valign="bottom"><input type="text" name="notes" value="" class="field" /></td>
        </tr>
        <tr>
          <td class="tbtext">Amount received</td>
          <td>&nbsp;</td>
          <td height="35" valign="bottom"><input type="text" name="amountrece" id="amountrece" value="<?=$deposit;?>"  class="field"/></td>
        </tr>
        <tr>
          <td class="tbtext">Reason</td>
          <td>&nbsp;</td>
          <td height="35" valign="bottom"><textarea name="reason" class="textarea2" ></textarea></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td height="35" valign="bottom"><input type="image" name="add" img src="images/submit.gif" alt="" width="69" height="21" onClick="return function1();"/> &nbsp;&nbsp;<img name="button" src="images/close.jpg" value="Go back" onClick="window.close();"  style="cursor:pointer"/>
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
