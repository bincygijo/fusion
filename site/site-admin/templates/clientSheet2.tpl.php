<? 
  $uId		=	$_GET['id'];
    $cId		=	$_GET['id'];
   $client_status		=	$_GET['code'];
  $count			=	$objP->countorder($uId);
 $count1			=	$objP->countaccount($uId);
$count2				=	 $objP->countproduct($uId);
	if($count == 0){ 
	$random_number	=	rand(100,10000);	
	//echo "INSERT INTO client_order (client_id,Ref_no)VALUES('".$uId."','".$random_number."')";
 	$qry	= mysql_query("INSERT INTO client_order (client_id,Ref_no)VALUES('".$uId."','".$random_number."')");

	}
	//checking payment
	if($count1 == 0){ 	
		$qry	= mysql_query("INSERT INTO client_account (client_id)VALUES('".$uId."')");
	}
	
	
	//product checking
	
	if($count2 == 0){ 	
		$qry	= mysql_query("INSERT INTO product (client_id)VALUES('".$uId."')");
	}
	

// print_r($count);
 
//$qry		=	mysql_query("insert into client_order(client_id,Ref_no) values($uId,'$random_number')");
  
$arrUser	=	$objU->list_user($uId);

$listUser			=	$objP->listOrderDetails($uId);
//print_r($listUser);
$listAccount		= $objP->listAccount($uId);


$editors_ded		=	$listUser['client_order_deadline'];
//-------------------------------------------------------------------
		if($editors_ded != "")
		{
					 $exp_date_split = explode("-", $editors_ded);
			 //-----------------------------------------------------------------
					$day = $exp_date_split[2];
					$month = $exp_date_split[1];
					$year = $exp_date_split[0];
				    $days = (int)((mktime (0,0,0,$month,$day,$year) - time(void))/86400);
					if($days <=0)
					{
						 
						$msg2	=	$objP->updateClientPrintStatus($clientId);
					}
		}
//-------------------------------------
$listProduct		= $objP->listProduct($uId);

			
 $date1				=	explode('-',$editors_ded);
$editors_ded1		=	$date1[2]."/".$date1[1]."/".$date1[0];

//echo $data[2].'/'.$data[1].'/'.$data[0];
  $delivery_date		=	$listUser['client_order_del_date'];
  
 $date2					=	explode('-',$delivery_date);
$delivery_date1			=	$date2[2]."/".$date2[1]."/".$date2[0];

  $school_name			=	$listUser['client_order_school'];
  
  $inside_paper			=	$listProduct['paper_id'];
  $cover_print			=	$listProduct['cover_id'];
  $laminate_paper		=	$listProduct['lamp_id'];
  $binding				=	$listProduct['bind_id'];
  $books				=	$listProduct['book_id'];
  $freight				=	$listProduct['freight_id'];
 $despatch				=	$listProduct['product_dispatched'];
   $print				=	$listProduct['print'];
   $status				=	$listProduct['print_status'];
   $cover_designed		=	$listProduct['Cover_designed'];
 	$cover_approved		=	$listProduct['Cover_approved'];
 
  // $date3		=	explode('-',$despatch1);
//$despatch		=	$date3[2]."-".$date3[1]."-".$date3[0];

 $trial_account			=   $listAccount['client_expires'];
 $date4					=	explode('-',$trial_account);
$trial_account1			=	$date4[2]."/".$date4[1]."/".$date4[0];
 
  $deposit				=   $listAccount['client_deposit'];
 
 $rate_type				=	$listAccount['rate_type_id'];
  
  
  $trans_date			=	$listAccount['date_received'];
   $trans_id			=	$listAccount['transation_id'];
   $listtrans			=	$objP->getTrans_type($trans_id);
   
 $trans_type				=	 $listtrans['name'];
//print_r($listProduct);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fusion Books</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/pop-up.js"></script>
<script language="javascript" src="js/cal2.js"></script>
<script language="javascript" src="js/cal_conf2.js"></script>

<link href="js/popcalendar.css" rel="stylesheet" type="text/css">

<!--add Inside paper-->
<script language="javascript">


var xmlHttp
var tp
function showId20(str){ 

	tp = str;
	//alert(tp);
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null){
		alert ("Browser does not support HTTP Request")
		return
	} 
	var url="addContact.php"
	//alert(url);
	url=url+"?q="+str
	//alert(url);
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=stateChanged20 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}

function stateChanged20(){ 
	if(xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
		if(tp=="Other"){
			//document.getElementById("txtHint1_1").innerHTML="New Payment type";
			document.getElementById("txtHint1").innerHTML=xmlHttp.responseText ;
		}else{
			//document.getElementById("txtHint1_1").innerHTML="";
			document.getElementById("txtHint1").innerHTML="";
		}
	} 
} 




var xmlHttp
var tp
function showId(str){ 

	tp = str;
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null){
		alert ("Browser does not support HTTP Request")
		return
	} 
	var url="addInside.php"
	url=url+"?q="+str
	//alert(url);
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=stateChanged 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}

function stateChanged(){ 
	if(xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
		if(tp=="14"){
			document.getElementById("txtHint1_1").innerHTML="New Supplier";
			document.getElementById("txtHint1").innerHTML=xmlHttp.responseText ;
		}else{
			document.getElementById("txtHint1_1").innerHTML="";
			document.getElementById("txtHint1").innerHTML="";
		}
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




function showId1(str){ 
	//alert("hai");
	tp = str;
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null){
		alert ("Browser does not support HTTP Request")
		return
	} 
	var url="addCover.php"
	url=url+"?q="+str
	//alert(url);
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=stateChanged1
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}

function stateChanged1(){ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{ 
	if(tp=="4")
	
	{
		document.getElementById("txtHint2_1").innerHTML="New Supplier";
		
		document.getElementById("txtHint2").innerHTML=xmlHttp.responseText ;
	}else{
	document.getElementById("txtHint2_1").innerHTML="";
		
		document.getElementById("txtHint2").innerHTML="";
	}
	} 
} 

function showId2(str)
{ 
//alert("hai");
//alert(str);
tp = str;
//alert(tp);
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
{
alert ("Browser does not support HTTP Request")
return
} 
var url="addLaminate.php"
url=url+"?q="+str
//alert(url);
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged2
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function stateChanged2() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{ 
if(tp=="5")

{
document.getElementById("txtHint3_1").innerHTML="New Supplier";
document.getElementById("txtHint3").innerHTML=xmlHttp.responseText ;
}else{
document.getElementById("txtHint3_1").innerHTML="";
document.getElementById("txtHint3").innerHTML="";
}
} 
} 


function showId3(str)
{ 
//alert("hai");
//alert(str);
tp = str;
//alert(tp);
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
{
alert ("Browser does not support HTTP Request")
return
} 
var url="addBinding.php"
url=url+"?q="+str
//alert(url);
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged3
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function stateChanged3() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{ 
	if(tp=="3")
	
	{
		document.getElementById("txtHint4_1").innerHTML="New Supplier";
		document.getElementById("txtHint4").innerHTML=xmlHttp.responseText ;
	}else{
		document.getElementById("txtHint4_1").innerHTML="";
		document.getElementById("txtHint4").innerHTML="";
	}
} 
} 


function showId4(str)
{ 
//alert("hai");
//alert(str);
tp = str;
//alert(tp);
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
{
alert ("Browser does not support HTTP Request")
return
} 
var url="adddeliver.php"
url=url+"?q="+str
//alert(url);
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged4
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function stateChanged4() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{ 
if(tp=="3")

{
document.getElementById("txtHint5_1").innerHTML="New Supplier";
document.getElementById("txtHint5").innerHTML=xmlHttp.responseText ;
}else{
document.getElementById("txtHint5_1").innerHTML="";
document.getElementById("txtHint5").innerHTML="";
}
} 
} 


function showId5(str)
{ 
//alert("hai");
//alert(str);
tp = str;
//alert(tp);
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
{
alert ("Browser does not support HTTP Request")
return
} 
var url="addfreight.php"
url=url+"?q="+str
//alert(url);
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged5
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function stateChanged5() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{ 
if(tp=="4")

{
document.getElementById("txtHint6_1").innerHTML="New Supplier";
document.getElementById("txtHint6").innerHTML=xmlHttp.responseText ;
}else{
document.getElementById("txtHint6_1").innerHTML="";
document.getElementById("txtHint6").innerHTML="" ;
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

<!-- filling add value in selext box inside paper -->
function check(){

var txt = document.getElementById("inside").value;
//alert(tp);
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
{
alert ("Browser does not support HTTP Request")
return
} 
var url="addnewpaper.php"
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
document.getElementById("inside_paper_content").innerHTML=xmlHttp.responseText;

document.getElementById("txtHint1_1").innerHTML="";
document.getElementById("txtHint1").innerHTML="";
<!--document.getElementById("btnHint1").innerHTML="<input type='submit' value='Submit'>";-->
document.getElementById("").innerHTML=xmlHttp.responseText ;
} 
}
</script>
<script language="javascript">
function validate(){

var txt = document.getElementById("cover_paper").value;
//alert(tp);
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
{
alert ("Browser does not support HTTP Request")
return
} 
var url="listCover.php"
url=url+"?txt="+txt;
//alert(url);
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged7
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}
function stateChanged7() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{ 
//alert(xmlHttp.responseText);
document.getElementById("cover_paper_content").innerHTML=xmlHttp.responseText;

document.getElementById("txtHint2_1").innerHTML="";
document.getElementById("txtHint2").innerHTML="";
<!--document.getElementById("btnHint1").innerHTML="<input type='submit' value='Submit'>";-->
document.getElementById("").innerHTML=xmlHttp.responseText ;
} 
}
</script>


<script language="javascript">
function check1(){

var txt = document.getElementById("laminate").value;
//alert(tp);
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
{

alert ("Browser does not support HTTP Request")
return
} 
var url="listLaminate.php"
url=url+"?txt="+txt;
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
document.getElementById("laminate_paper_content").innerHTML=xmlHttp.responseText;

document.getElementById("txtHint3_1").innerHTML="";
document.getElementById("txtHint3").innerHTML="";
<!--document.getElementById("btnHint1").innerHTML="<input type='submit' value='Submit'>";-->
document.getElementById("").innerHTML=xmlHttp.responseText ;
} 
}
</script>

<script language="javascript">
function check2(){

var txt = document.getElementById("binding").value;
//alert(tp);
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
{
alert ("Browser does not support HTTP Request")
return
} 
var url="listBinding.php"
url=url+"?txt="+txt;
//alert(url);
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged9
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}
function stateChanged9() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{ 
//alert(xmlHttp.responseText);
document.getElementById("binding_paper_content").innerHTML=xmlHttp.responseText;

document.getElementById("txtHint4_1").innerHTML="";
document.getElementById("txtHint4").innerHTML="";
<!--document.getElementById("btnHint1").innerHTML="<input type='submit' value='Submit'>";-->
document.getElementById("").innerHTML=xmlHttp.responseText ;
} 
}
</script>

<script language="javascript">
function check3(){

var txt = document.getElementById("deliver").value;
//alert(txt);
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
{
alert ("Browser does not support HTTP Request")
return
} 
var url="listDeliver.php"
url=url+"?txt="+txt;
//alert(url);
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged10
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}
function stateChanged10() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{ 
//alert(xmlHttp.responseText);
document.getElementById("deliver_paper_content").innerHTML=xmlHttp.responseText;

document.getElementById("txtHint5_1").innerHTML="";
document.getElementById("txtHint5").innerHTML="";
<!--document.getElementById("btnHint1").innerHTML="<input type='submit' value='Submit'>";-->
document.getElementById("").innerHTML=xmlHttp.responseText ;
} 
}
</script>

<script language="javascript">
function check4(){

var txt = document.getElementById("freight").value;
//alert(tp);
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
{
alert ("Browser does not support HTTP Request")
return
} 
var url="listFreight.php"
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
document.getElementById("freight_paper_content").innerHTML=xmlHttp.responseText;

document.getElementById("txtHint6_1").innerHTML="";
document.getElementById("txtHint6").innerHTML="";
<!--document.getElementById("btnHint1").innerHTML="<input type='submit' value='Submit'>";-->
document.getElementById("").innerHTML=xmlHttp.responseText ;
} 
}
</script>

<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td ><table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
         <?php include_once 'header.tpl.php'; ?>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="210" valign="top">
					 <?php include_once 'left_side.tpl.php'; ?>
				</td>
                <td valign="top" >
				
				<table width="767" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#0d76aa">
                          <tr>
                            <td width="4"><img src="images/head_curve_left.gif" alt="" width="4" height="33" /></td>
                            <td class="head"> Client Sheet</td>
                            <td width="4"><img src="images/head_curve_right.gif" alt="" width="4" height="33" /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="385" valign="top" class="border">
					  <form id="form2" name="form2" method="post" action="" style="margin:0;">
					  <table width="725" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="1" bgcolor="#006699"></td>
                          </tr>
                          <tr>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="290" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td class="title"><? echo $school_name; ?></td>
                                      </tr>
                                      <tr>
                                        <td class="subhead">State</td>
                                      </tr>
                                      <tr>
                                        <td class="subhead">Contact: <? echo $arrUser['name'];?></td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td><a href="clientSheet.php?id=<? echo $uId;?>&code=C"><img src="images/contact_info.gif" alt="" border="0" width="269" height="47" /></a></td>
                                      </tr>
                                      <tr>
                                        <td height="7"></td>
                                      </tr>
                                      <tr>
                                        <td><a href="clientSheet.php?id=<? echo $uId;?>&code=A"><img src="images/account_info.gif" alt="" width="269" height="47" border="0" /></a></td>
                                      </tr>
                                      <tr>
                                        <td height="7"></td>
                                      </tr>
                                      <tr>
                                        <td><a href="clientSheet.php?id=<? echo $uId;?>&code=P"><img src="images/prod_info.gif" alt="" width="269" height="47" border="0" /></a></td>
                                      </tr>
                                      <tr>
                                        <td height="7"></td>
                                      </tr>
                                      <tr>
                                        <td><a href="clientSheet.php?id=<? echo $uId;?>&code=L"><img src="images/login_info.gif" alt="" width="269" height="47" border="0" /></a></td>
                                      </tr>
                                      <tr>
                                        <td height="7"></td>
                                      </tr>
                                      <tr>
                                        <td><a href="clientSheet.php?id=<? echo $uId;?>&code=H"><img src="images/client_history.gif" alt="" width="269" height="47" border="0" /></a></td>
                                      </tr>
                                    </table></td>
                                    <td valign="top" class="boxline"><? 
									
									if(($uId && $client_status=='C') || ($uId && !isset($_GET['code']))) {
									//echo $client_status;
									//echo $uId;
									?><table width="90%" border="0" align="center" cellpadding="3" cellspacing="0">
                                      <tr>
                                        <td class="grouphead">Contact Information</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td class="grouphead">Ref#</td>
                                          <td width="2">&nbsp;</td>
                                          <td width="190"><?php
										  
									  $ref_id		=	$listUser['Ref_no'];
								//$random_number	=	rand(100,10000);
										
										
//echo(rand(1000,10000))


?>
<input type="text" name="refNumber" class="field" value="<? if($ref_id){echo $listUser['Ref_no'];}else{echo $random_number;}?>" />
<!--<input type="text" name="refNumber" <? if($ref_id){?>value="<? echo $listUser['Ref_no']; ?>" <? }else { echo $random_number; }?> class="field"   />--><? //echo(rand(1000,10000)) ?><!--<input type="button" onclick="return gen_pwd2()" value="Generale" />--><!--<input type="text" name="textfield2" class="field" />--></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">Contact Person Name </td>
                                          <td>&nbsp;</td>
                                          <td><input type="text" name="contactNname" class="field" value="<? echo $arrUser['name'];?>"/></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">School Name </td>
                                          <td>&nbsp;</td>
                                          <td><input type="text" name="schoolName" value="<? echo $arrUser['school'];?>" class="field" /></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">No.books requires </td>
                                          <td>&nbsp;</td>
                                          <td><input type="text" name="noBooks" class="field"  value="<? echo $listUser['client_order_books'];?>"/></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">Editor's Deadline</td>
                                          <td>&nbsp;</td>
                                          <td><input type="text" name="editorsDeadline" id="editorsDeadline" size="10" value="<? if($editors_ded=='0000-00-00'){ echo $editors_ded==""; }else {echo $editors_ded;}?>" /> <a href="javascript:showCal('Calendar2')"><img src="images/cal.gif" width="19" height="17" border="0" /></a></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">Delivery Address</td>
                                          <td>&nbsp;</td>
                                          <td><input type="text" name="deliveryAddr" class="field"  value="<? echo $listUser['client_order_del_addr'];?>"/></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">Delivery Date</td>
                                          <td>&nbsp;</td>
                                          <td><input type="text" name="deliveryDate" id="deliveryDate" size="10" value="<? if($delivery_date=='0000-00-00'){ echo $delivery_date==""; }else {echo $delivery_date;}?>" /> <a href="javascript:showCal('Calendar3')"><img src="images/cal.gif" width="19" height="17" border="0" /></a></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">Contact Number</td>
                                          <td>&nbsp;</td>
                                          <td><input type="text" name="contactNumber" class="field" value="<? echo $arrUser['contact'];?>" /></td>
                                      </tr>
                                        <tr>
                                          <td class="tbtext">Email</td>
                                          <td>&nbsp;</td>
                                          <td><input type="text" class="field" name="email" value="<? echo $arrUser['email'];?>" /></td>
                                        </tr>
                                    </table><? } elseif ($uId && $client_status=='A')  {
								//	($uId && $client_status=='C') || ($uId && !isset($_GET['status']))
									//echo $client_status;
									//echo $uId;
									?>
									<? //if($uId && $status=='A')?>
									<? //{?>
									<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0">
                                      <tr>
                                        <td class="grouphead">Account Information</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td class="tbtext">Trial account expires on</td>
                                          <td width="2">&nbsp;</td>
                                          <td width="190" class="tbtext"><input type="text" name="expiry_date" id="expiry_date" size="10" value="<? if($trial_account=='0000-00-00'){ echo $trial_account==""; }else {echo $trial_account;}?>" />
										 
										<a href="javascript:showCal('Calendar4')"><img src="images/cal.gif" width="19" height="17" border="0" /></a>




</td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">No.books required </td>
                                          <td>&nbsp;</td>
                                          <td class="tbtext"><input type="text" name="txt_books" id="txt_books" onblur="calculate();" class="field" value="<? echo $listAccount['client_book_require'];?>" /></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">No.pages reqired </td>
                                          <td>&nbsp;</td>
                                          <td class="tbtext"><input type="text" name="txt_pages" id="txt_pages" onblur="calculate();" class="field" value="<? echo $listAccount['client_page_require'];?>" /></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">Deposit</td>
                                          <td>&nbsp;</td>
                                          <td class="tbtext"><div id="deposit"> <? 
										  $listAccount		= $objP->listAccount($uId);
										   $amount				= $listAccount['client_deposit'];
										   $total				= $listAccount['total'];
										  if($amount >='300')
										  {
										   ?>
										  PAID ($<?=$listAccount['client_deposit'];?>,<?=$trans_id;?>)<?=$trans_date;?><br />
										 <a  href="download.php?pdfname=invoice<?=$uId?>.pdf" target="_blank"><img src="images/pdf.gif" border="0"/></a>&nbsp;&nbsp; <a href="javascript:openWin('popupedit.php?id=<?=$uId;?>&acid=<?=$listAccount['client_account_id']?>')" onclick="return popedit();">Edit</a>
										   <?
										   		}
												else
											{
												?>
											
										   <a href="javascript:openWin('popupdeposit.php?id=<?=$uId;?>&acid=<?=$listAccount['client_account_id']?>')">Due </a>date is <?=$trial_account1;?>
												<?php
												}
										 ?>
										 
										  </div></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">Rate type</td>
                                          <td>&nbsp;</td>
                                          <td class="tbtext"><select name="rate_type" id="rate_type" class="listmenu3" onchange="showId15(this.value)" onblur="calculate();">
										  
										  <option value="">--- Select ---</option>
											<? 
										if(!empty($listRate))
										{
										foreach($listRate as $key=>$value)
										{ ?>
										<option value="<?=$value['offer_id']?>" <? if($rate_type==$value['offer_id']) echo 'selected';?> >
										 <?=$value['rate_type']?></option>
										<? }
										}?>
										
										  </select> <a href="javascript:openWin('addrateType.php?id=<?=$uId;?>&code=<?=$client_status?>');">Add&nbsp;New</a>	</td>
                                        </tr>
										<? 
										$baserate		=	$listAccount['client_basic_rate'];?>
                                        <tr>
                                          <td class="tbtext">Base rate (50 pp)</td>
                                          <td>&nbsp;</td>
                                          <td class="tbtext"><div id="rateType_item">$<input type="text" name="baserate" id="baserate" class="field" value="<? echo?>"  readonly=""/></div></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext"><div id="rateType_item_1">Per page rate</div></td>
                                          <td>&nbsp;</td>
                                          <td class="tbtext"><div id="rateType_item">$<input type="text" name="rate" id="rate" class="field" value="<? echo $listAccount['client_per_page_rate'];?>" readonly="" /></div></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">Extra cost(per books)</td>
                                          <td>&nbsp;</td>
                                          <td class="tbtext">$<input type="text" name="cost_perbook" onblur="calculate();"  id="cost_perbook" class="field" value="<? echo $listAccount['client_extra_per__book'];?>" /></td>
                                      </tr>
                                        <tr>
                                          <td class="tbtext">Extra cost(all books)</td>
                                          <td>&nbsp;</td>
                                          <td class="tbtext">$<input type="text" onblur="calculate();"  name="extracost" id="extracost" class="field" value="<? echo $listAccount['client_extra_all_book'];?>" /></td>
                                        </tr>
										
										<? 
										//---------------------------------------------------------
										
										$listpayment		=	$objP->getPayment($uId);
										//print_r($listpayment);
										
										//echo "amt".$amt_total;
										$no_pages		=	$listAccount['client_page_require'];
										$no_books		=	$listAccount['client_book_require'];
										
										//$total_page		=	
										
										$page_amt		=	24.95;
										$total_page		=	$no_pages-50;
										$per_page	=	0.16;
										$totalpage_per	= $total_page*$per_page;
										
										$grand_totalpaper	=	$totalpage_per+$page_amt;
										
										$total_amount1		=	$grand_totalpaper*$no_books;
										//$total_page		=	$no_pages-50;
										$amount				=	$listAccount['total'];
										//$per		=$amount*60/100;	
										//--------------------------------------------------------------
										
									$total_amount		=	$listAccount['total'];
									 $depo				=	$listAccount['client_deposit'];
										//$amt_receivd		=	$listAccount['amount_received'];
								 	$amt		=	$listpayment['amount'];
									$amt_receivd		= $amt + $depo;
						 			 $per		=	$total_amount*60/100;	
										?>
										
                                        <tr>
                                          <td class="tbtext">Total Amount </td>
                                          <td>&nbsp;</td>
                                          <td class="tbtext">$<input type="text" value="<?=number_format($total_amount,2);?>" name="total" id="total" class="field" readonly="" onfocus="calculate();"/></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">60% Payment</td>
                                          <td>&nbsp;</td>
                                          <td class="tbtext"><?
										
										  if($amt_receivd==0  || $per==0 || $amt_receivd < $per)
										  {
										 ?> <a href="javascript:openWin('payment.php?id=<?=$uId;?>&aid=<?=$listAccount['client_account_id'];?>')">Due</a>&nbsp;due before <?=$editors_ded1;?>
										 
										  <?  }else{?>
										 <?  echo "PAID"; ?>
											<a  href="download.php?pdfname=invoicepayment<?=$uId?>.pdf" target="_blank"><img src="images/pdf.gif" border="0"/></a>
											
											<!-- <a  href="download.php?pdfname=invoice<?=$uId?>.pdf" target="_blank"><img src="images/pdf.gif" border="0"/></a>-->
											<? }?>
										  <? 
										// if($depo>=300)
										//{
										 /*if($amt_receivd >= $per )
										 	{
											echo "PAID"; ?>
											<a  href="clientSheet.php?pdfname=invoices/invoicepayment<?=$uId?>.pdf&pdf=pdf" target="_blank"><img src="images/pdf.gif" border="0"/></a>
										<?	}
											else
											{
											echo "NOT PAID"?> due before <?=$editors_ded1;?><a href="javascript:openWin('payment.php?id=<?=$uId;?>&aid=<?=$listAccount['client_account_id'];?>')">Due</a>
										<? 	}*/
										// }
										?>
										</td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">Final payment</td>
                                          <td>&nbsp;</td>
                                          <td class="tbtext"><?
										  if($total_amount==0 || $amt_receivd==0 || $amt_receivd<=$total_amount)
										  {
										 ?> <a href="javascript:openWin('payment.php?id=<?=$uId;?>&aid=<?=$listAccount['client_account_id'];?>')">Due</a> due before <?=$delivery_date1;?>
										<?   }  else{?>
										<? echo "PAID"; ?>
											<a  href="download.php?pdfname=invoicepayment<?=$uId?>.pdf"><img src="images/pdf.gif" border="0"/></a>
											<? }?></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                    </table>
									
								<? } elseif($uId && $client_status=='P'){ ?>
									<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0">
                                      <tr>
                                        <td class="grouphead">Production Information</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td class="tbtext">Inside paper to be printed by</td>
                                          <td width="2">&nbsp;</td>
                                          <td width="190"><div id="inside_paper_content"><select class="listmenu" name="inside_paper" id="inside_paper" onChange="showId(this.value)">
											<option value="">--- Select ---</option>
											<? if(!empty($arrInside)){
												foreach($arrInside as $key => $value){ ?>
											<option value="<?=$value['paper_id']?>" <? if($inside_paper == $value['paper_id']) echo 'selected'; ?>><?=$value['name']?></option>
											<? } } ?>	
											</select>
											</div>	</td>
                                        </tr>
										
										<tr><td class="tbtext"><div id="txtHint1_1"></div></td> <td></td><td><div id="txtHint1"></div></td>
										   </tr>
										
                                        <tr>
                                          <td class="tbtext">Cover to be printed by </td>
                                          <td>&nbsp;</td>
                                          <td><div id="cover_paper_content"><select class="listmenu" name="coverpaper" id="coverpaper" onChange="showId1(this.value)">
		<option value="">--- Select ---</option>
		<? if(!empty($arrCover))
		{
		foreach($arrCover as $key=>$value)
		{ ?>
		<option value="<?=$value['cover_id']?>" <? if($cover_print==$value['cover_id']) echo 'selected';?> >
		 <?=$value['name']?></option>
		<? }
		}?>
		</select></div></td>
                                        </tr>
										
										<tr><td class="tbtext"><div id="txtHint2_1"></div></td><td></td><td ><div id="txtHint2"></div></td></tr>
                                        <tr>
                                          <td class="tbtext">Laminating to be performed by </td>
                                          <td>&nbsp;</td>
                                          <td><div id="laminate_paper_content"><select class="listmenu" name="laminating_paper" id="laminating_paper" onChange="showId2(this.value)">
		<option value="">--- Select ---</option>
		<? if(!empty($arrLamp))
		{
		foreach($arrLamp as $key=>$value)
		{ ?>
		<option value="<?=$value['lamp_id']?>" <? if($laminate_paper==$value['lamp_id']) echo 'selected';?> >
		 <?=$value['name']?></option>
		<? }
		}?>
		</select></div></td>
                                        </tr>
										 <tr><td class="tbtext"><div id="txtHint3_1"></div></td><td></td><td ><div id="txtHint3"></div></td></tr>
										
                                        <tr>
                                          <td class="tbtext">Binding to be performed by </td>
                                          <td>&nbsp;</td>
                                          <td><div id="binding_paper_content"><select class="listmenu" name="binding_paper" id="binding_paper" onChange="showId3(this.value)">
		<option value="">--- Select ---</option>
		<? if(!empty($arrBind))
		{
		foreach($arrBind as $key=>$value)
		{ ?>
		<option value="<?=$value['bind_id']?>" <? if($binding==$value['bind_id']) echo 'selected';?> >
		 <?=$value['name']?></option>
		<? }
		}?>
		</select></div></td>
                                        </tr>
										
										<tr><td class="tbtext"><div id="txtHint4_1"></div></td><td></td><td ><div id="txtHint4"></div></td></tr>
                                        <tr>
                                          <td class="tbtext">Books to be deliverd by</td>
                                          <td>&nbsp;</td>
                                          <td><div id="deliver_paper_content"><select class="listmenu" name="books_deliver" id="books_deliver" onChange="showId4(this.value)">
			<option value="">--- Select ---</option>
			<? if(!empty($arrBooks))
		{
		foreach($arrBooks as $key=>$value)
		{ ?>
		<option value="<?=$value['book_id']?>" <? if($books==$value['book_id']) echo 'selected';?> >
		 <?=$value['name']?></option>
		<? }
		}?>
		</select></div></td>
                                        </tr>
										
										 <tr><td class="tbtext"><div id="txtHint5_1"></div></td><td></td><td ><div id="txtHint5"></div></td></tr>
                                        <tr>
                                          <td class="tbtext">(connote numbers )</td>
                                          <td>&nbsp;</td>
                                          <td><input type="text" name="txt_connote" class="field" value="<?=$listProduct['product_con_no'];?>" /></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">Type of freight</td>
                                          <td>&nbsp;</td>
                                          <td><div id="freight_paper_content"><select class="listmenu" name="paper_freight" id="paper_freight" onChange="showId5(this.value)">
		<option value="">--- Select ---</option>
			<? if(!empty($arrFreight))
		{
		foreach($arrFreight as $key=>$value)
		{ ?>
		<option value="<?=$value['freight_id']?>" <? if($freight==$value['freight_id']) echo 'selected';?> >
		 <?=$value['name']?></option>
		<? }
		}?>
		</select></div></td>
                                        </tr>
										
										 <tr><td class="tbtext"><div id="txtHint6_1"></div></td><td></td><td ><div id="txtHint6"></div></td></tr>
                                        <tr>
                                          <td class="tbtext">Dispatched on</td>
                                          <td>&nbsp;</td>
                                          <td> <input type="text" name="sdat" id="sdat" size="10" value="<? if($despatch=='0000-00-00'){ echo $despatch==""; }else {echo $despatch;}?>" />
										
										<a href="javascript:showCal('Calendar1')"><img src="images/cal.gif" width="19" height="17" border="0" /></a></td>
                                      </tr>
                                        <tr>
                                          <td class="tbtext">Ready For Print</td>
                                          <td>&nbsp;</td>
                                          <td class="tbtext"><input type="checkbox" name="print" <?PHP if($print=='Y' && $status == "RDY") {echo "checked";}?> id="print" value="Y" class="" /></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">Cover designed</td>
                                          <td>&nbsp;</td>
                                          <td class="tbtext"><input type="checkbox" name="designed" <?PHP if($cover_designed=='Y' ) {echo "checked";}?> id="designed" value="Y" class="" /></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">Cover approved</td>
                                          <td>&nbsp;</td>
                                          <td class="tbtext"><input type="checkbox" name="approved" <?PHP if($cover_approved=='Y' ) {echo "checked";}?> id="approved" value="Y" class="" /></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        
                                    </table>
									<? } elseif($uId && $client_status=='L'){?>
									<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0">
                                      <tr>
                                        <td class="grouphead">Login Detalis</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td class="tbtext" width="190"><a class="" href="javascript:openWindow('editors_detail.php','<? echo $listUser['client_id']; ?>','P');">Contact Person Login Details</a></td>
                                          <td width="2">&nbsp;</td>
                                          <td width="150"><!--<input type="button" onclick="return gen_pwd2()" value="Generale" />--><!--<input type="text" name="textfield2" class="field" />--></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext"><a class="" href="javascript:openWindow('editors_detail.php','<? echo $listUser['client_id']; ?>','E');">Editors Login Details</a> </td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext"><a href="javascript:openWindow('editors_detail.php','<? echo $listUser['client_id']; ?>','C');">Contributors Login Details</a> </td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td></td>
                                        </tr>
                                        
                                       
                                       
                                        
                                    </table>
									<? } else {?>
									
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td><table width="95%" border="0" align="center" cellpadding="2" cellspacing="0">
                                          <tr>
                                            <td height="10" colspan="2"></td>
                                            </tr>
                                          <tr>
                                            <td width="130" class="subhead">New Event </td>
                                            <td class="subhead"> Date <input type="text" name="txtdate" id="txtdate" value="<?=date('Y-m-d');//echo $listUser['date'];?>" class="field2" /> <a href="javascript:showCal('Calendar6')"><img src="images/cal.gif" width="19" height="17" border="0" /></a></td>
                                          </tr>
                                          <tr>
                                            <td class="tbtext">Short Summary </td>
                                            <td><label>
											<input type="text" name="summary" value="<? //echo $listUser['entry_summary'];?>" class="shortfield" />
                                         
                                            </label></td>
                                          </tr>
                                          <tr>
                                            <td valign="top" class="tbtext">Details</td>
                                            <td><label>
											<textarea name="details" value="" class="shortarea" ><? //echo $listUser['entry_details'];?></textarea>
                                             
                                            </label></td>
                                          </tr>
                                          <tr>
                                            <td><label>
											<select name="action" id="action" class="shortmenu">
	<option value="">Select one</option>
	 <? if(!empty($arrEntry)) { ?>
			  <? foreach($arrEntry as $key=>$value){?>
	 <option value="<?=$value['entry_id']?>" <? if($entry==$value['entry_id']) echo 'selected';?> >
			  <?=$value['entry_action']?></option>
			  <? } ?>
			  <? } ?>
	</select>
                                             
                                            </label></td>
                                            <td>
											<textarea name="actionname"  class="shortarea1"><? //echo $listUser['entry_desc'];?></textarea>
											</td>
                                          </tr>
                                          <tr>
                                            <td valign="top" class="tbtext">Contact Method </td>
                                            <td class="tbtext"><label>
                                            <label>  <input type="checkbox" name="chk[]" id="chk[]" value="Phone" />
                                              Phone</label>
                                            <label>  <input type="checkbox" name="chk[]" id="chk[]" value="person" />
                                              In person</label>
                                             <label> <input type="checkbox" name="chk[]" id="chk[]" value="Fax" />
                                              Fax</label>
                                            <label> <input type="checkbox" name="chk[]" id="chk[]" value="Email" />
                                              Email </label><br />
                                          <label>    <input type="checkbox" name="chk[]" id="chk[]" value="Other" onclick="showId20(this.value)"/> Other </label><div id="txtHint1"></div>
                                               </label></td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td><!--<img src="images/submit.gif" alt="" width="69" height="21" />--></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td height="1" bgcolor="#046698"></td>
                                      </tr>
                                      <tr>
                                        <td height="10"></td>
                                      </tr>
                                      <tr>
                                        <td><table width="95%" border="0" align="center" cellpadding="3" cellspacing="0">
                                          <tr>
                                            <td colspan="3" class="subhead">Client History </td>
                                            </tr>
											
											
									<? 
											
$listhistory	=	$objH->listhistory($uId);

if(!empty($listhistory))
{
foreach($listhistory as $key=>$value)
{
  $his_date		=	$value['history_date'];
$expHisdate		=	explode("-",$his_date);
 $exp_His		=	$expHisdate[2]."-".$expHisdate[1]."-".$expHisdate[0];
	

?>
                                          <tr>
                                            <td width="70" class="tbtext"><strong><?=$exp_His?></strong></td>
                                            <td class="tbtext"><strong><?=substr($value['history_summary'],0,30);?><!--Changed Editor's deadline to 21-11-09--></strong></td>
                                            <td align="center" class="tbtext"><strong><a href="historyDetail.php?hid=<?=$value['new_history_id']?>&id=<?=$uId?>&code=<?=$client_status;?>">view</a></strong></td>
                                          </tr><? } }?>
                                         
                                         
                                        </table></td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table>
									
									<? }?>
									</td>
                                  </tr>
                                </table>
                              </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="center"><input type="image" name="add" value="Add" src="images/save.gif" alt="" width="69" height="21" />		  <img name="button" src="images/back.jpg" value="Go back" onClick="history.go(-1);" style="cursor:pointer"  />	
										  
										  						  <input type="hidden" name="clientId" id="clientId" value="<?php echo $_GET["id"]; ?>" /><input type="hidden" name="code" value="<?=$_GET['code'];?>" />
										  <input type="hidden" name="add" /></td>
                          </tr>
                        </table></form>
						</td>
                    </tr>
                    <tr>
                      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="4"><img src="images/curve_bottom_left.gif" width="4" height="4" /></td>
                            <td background="images/bottom_pic.gif"><img src="images/bottom_pic.gif" alt="" width="1" height="4" /></td>
                            <td width="4"><img src="images/curve_bottom_right.gif" alt="" width="4" height="4" /></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
       
        <tr>
          <td height="8"></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="40" background="images/footer_bg.gif" align="center"><? include('footer.php')?></td>
  </tr>
</table>
<script language="javascript">
function el()
{
alert("hi");
}


function goBack()
 {
 	//alert("hi");
	var cId	=	document.getElementById("clientId").value;
	var code	=	document.getElementById("code").value;
	alert(cId);
//window.location = "BuyingStep1.php?enquiryId="+enqId;
 	window.location = "clientSheet.php?id="+cId;
 }
</script>
<script language="javascript" src="js/cal2.js">
</script>
<script language="javascript" src="js/cal_conf2.js"></script>

<SCRIPT LANGUAGE="JavaScript">
function makeDisable()
{
	document.getElementById("extracost").value="";
 }
function makeDisable1()
{
	document.getElementById("cost_perbook").value="";
}

/*
function calculate()
{
	var no_books = document.getElementById("txt_books").value;
	//alert(no_books);
	var no_pages = document.getElementById("txt_pages").value;
	//alert(no_pages);
	var base_rate = document.getElementById("baserate").value;
	var page_rate = document.getElementById("rate").value;
	var extra_per_book = document.getElementById("cost_perbook").value;
	var extra_per_all_book = document.getElementById("extracost").value;
	
	if(no_pages>50)
	{
		var extra_pages = Number(no_pages)-50;
		var base_page_rates = base_rate;
		var extra_page_rate = Number(extra_pages)*Number(page_rate);
		var total_cost = Number(base_page_rates)+Number(extra_page_rate);
		if(extra_per_book == "" || extra_per_book == "0.00")
		{
			var total = Number(total_cost)*Number(no_books);
			var GrandTotal = Number(total)+Number(extra_per_all_book);
		}
	 if(extra_per_all_book == "" || extra_per_all_book == "0.00" )
		{
			var extra_per_book_total = Number(extra_per_book)*Number(no_books);
			var total = Number(total_cost)*Number(no_books);
			var GrandTotal = Number(total)+Number(extra_per_book_total);
		}
		if(extra_per_book == "" && extra_per_all_book == "")
		{
			var GrandTotal = Number(total_cost)*Number(no_books);

		}
		
		document.getElementById("total").value=GrandTotal;
	}
	else		//--------------------------------------------------

	{
		if(extra_per_book == "" || extra_per_book == "0.00" )
		{
			var total_cost = base_rate;
			var total = Number(total_cost)*Number(no_books);
			var GrandTotal = Number(total)+Number(extra_per_all_book);
			
		}
		if(extra_per_all_book == "" || extra_per_all_book == "0.00")
		{
			var extra_per_book_total = Number(extra_per_book)*Number(no_books);
			var total_cost = base_rate;
			var total = Number(total_cost)*Number(no_books);
			var GrandTotal = Number(total)+Number(extra_per_book_total);
			
		}
		if(extra_per_book == "" && extra_per_all_book == "")
		{
			var total_cost = base_rate;
			var GrandTotal = Number(total_cost)*Number(no_books);

		}

		document.getElementById("total").value=GrandTotal;
	}
}


*/






function calculate()
{
//alert("hi");
	var no_books = document.getElementById("txt_books").value;
	var no_pages = document.getElementById("txt_pages").value;
	var base_rate = document.getElementById("baserate").value;
	var page_rate = document.getElementById("rate").value;
	var extra_per_book = document.getElementById("cost_perbook").value;
	var extra_per_all_book = document.getElementById("extracost").value;
	
	//alert(no_books);
	//alert(no_pages);
	//alert(base_rate);
	if(no_pages>50)
	{
	//alert("1");
		var extra_pages = Number(no_pages)-50;
		//alert("2");
		var base_page_rates = base_rate;
	//alert("3");
		var extra_page_rate = Number(extra_pages)*Number(page_rate);
		var total_cost = Number(base_page_rates)+Number(extra_page_rate);
		var extra_per_book_total = Number(extra_per_book)*Number(no_books); // per book calculate extra perbook=5*100
		var total = Number(total_cost)*Number(no_books);
		var GrandTotal = Number(total)+Number(extra_per_all_book)+Number(extra_per_book_total);
		//alert(GrandTotal);
		if(extra_per_book == "" && extra_per_all_book == "")
		{
			var GrandTotal = Number(total);

		}
		
		//alert(GrandTotal);
		
			document.getElementById("total").value=GrandTotal;
	}
	
	else
	{
	//var extra_pages = Number(no_pages)-50;no_pages
		//alert("2");
		//var base_page_rates = base_rate;
		//var total_cost = base_rate;
		//alert(total_cost);
		var extra_per_book_total = Number(extra_per_book)*Number(no_books); 
		var total = Number(base_rate)*Number(no_books);
		var GrandTotal = Number(total)+Number(extra_per_all_book)+Number(extra_per_book_total);
		//alert(total);
		//alert(GrandTotal);
		
		if(extra_per_book == "" && extra_per_all_book == "")
		{
			var GrandTotal = Number(total);

		}
		
		document.getElementById("total").value=GrandTotal;
	}
}
		
		/*if(extra_per_book == "" || extra_per_book == "0.00")
		{
			var total = Number(total_cost)*Number(no_books);
			var GrandTotal = Number(total)+Number(extra_per_all_book);
		}
	 if(extra_per_all_book == "" || extra_per_all_book == "0.00" )
		{
			var extra_per_book_total = Number(extra_per_book)*Number(no_books);
			var total = Number(total_cost)*Number(no_books);
			var GrandTotal = Number(total)+Number(extra_per_book_total);
		}
		if(extra_per_book == "" && extra_per_all_book == "")
		{
			var GrandTotal = Number(total_cost)*Number(no_books);

		}
		
		document.getElementById("total").value=GrandTotal;
	}
	else		//--------------------------------------------------

	{
	
		if(extra_per_book == "" || extra_per_book == "0.00" )
		{
			var total_cost = base_rate;
			var total = Number(total_cost)*Number(no_books);
			var GrandTotal = Number(total)+Number(extra_per_all_book);
			
		}
		if(extra_per_all_book == "" || extra_per_all_book == "0.00")
		{
		
		
		
			var extra_per_book_total = Number(extra_per_book)*Number(no_books);
			var total_cost = base_rate;
			var total = Number(total_cost)*Number(no_books);
			var GrandTotal = Number(total)+Number(extra_per_book_total);
			
		}
		if(extra_per_book == "" && extra_per_all_book == "")
		{
			var total_cost = base_rate;
			var GrandTotal = Number(total_cost)*Number(no_books);

		}
*/
	
function openWin(URL){aWindow=window.open(URL,"theWindow","height=400,width=600,left=200,top=100,scrollbars=yes");}
function openWindow(URL,Cid,Status)
{
	newurl = URL+"?Cid="+Cid+"&status="+Status;
	aWindow=window.open(newurl,"theWindow","height=500,width=650,left=200,top=100,scrollbars=yes");
}

</SCRIPT>

<script language="javascript">
function gen_pwd2() 
	{
	//alert("hi");
		var chars 			= "0123456789";
		var string_length 	= 4;
		var randomstring 	= '';
		for (var i=0; i<string_length; i++) 
		{
			var rnum 		= Math.floor(Math.random() * chars.length);
			randomstring 	+= chars.substring(rnum,rnum+1);
		}
		document.form2.refNumber.value = randomstring;
	}
</script>

<script language="javascript">
function popedit()
{
var x=confirm("Do you want to edit the deposit");
		if(x==true)
		return true;
		else
		return false;
}
</script>
</body>
</html>
