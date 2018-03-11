<? 
 $uId		=	$_GET['id'];
$arrUser		=	$objU->list_user($uId);

$listUser	=	$objP->listOrderDetails($uId);
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
$listProduct	= $objP->listProduct($uId);

			
// $date1		=	explode('-',$editors);
//$editors_ded		=	$date1[2]."-".$date1[1]."-".$date1[0];

//echo $data[2].'/'.$data[1].'/'.$data[0];
  $delivery_date		=	$listUser['client_order_del_date'];
  
  // $date2		=	explode('-',$delivery);
//$delivery_date		=	$date2[2]."-".$date2[1]."-".$date2[0];

  $school_name			=	$listUser['client_order_school'];
  
  $inside_paper			=	$listProduct['paper_id'];
  $cover_print			=	$listProduct['cover_id'];
  $laminate_paper		=	$listProduct['lamp_id'];
  $binding				=	$listProduct['bind_id'];
  $books				=	$listProduct['book_id'];
  $freight				=	$listProduct['freight_id'];
 $despatch			=	$listProduct['product_dispatched'];
   $print				=	$listProduct['print'];
   $status				=	$listProduct['print_status'];
 
  // $date3		=	explode('-',$despatch1);
//$despatch		=	$date3[2]."-".$date3[1]."-".$date3[0];

 $trial_account			=   $listAccount['client_expires'];
  $date4				=	explode('-',$trial_account);
$trial_account1			=	$date4[2]."/".$date4[1]."/".$date4[0];
 
  $deposit				=   $listAccount['client_deposit'];
 
 $rate_type				=	$listAccount['rate_type_id'];
  
  
  $trans_date			=	$listAccount['date_received'];
   $trans_id				=	$listAccount['transation_id'];
   $listtrans		=	$objP->getTrans_type($trans_id);
   
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
    <td><table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
         <?php include_once 'header.tpl.php'; ?>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="220" valign="top">
					 <?php include_once 'left_side.tpl.php'; ?>
				</td>
                <td valign="top"><table width="767" border="0" cellspacing="0" cellpadding="0">
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
                      <td height="400" valign="top" class="border"><table width="725" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td class="subhead"><? echo $school_name; ?></td>
                          </tr>
                          <tr>
                            <td height="1" bgcolor="#006699"></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td><form id="form2" name="form2" method="post" action="" style="margin:0;">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="350" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
									
<?php
//echo(rand(100,10000))

 $random_number = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) ); // random(ish) 5 digit int
?>
                                        <tr>
                                          <td width="167" class="grouphead">Ref#</td>
                                          <td width="1">&nbsp;</td>
                                          <td width="170"><?php
										  
									  $ref_id		=	$listUser['Ref_no'];
								$random_number	=	rand(100,10000);
										
										
//echo(rand(1000,10000))


?>
<input type="text" name="refNumber" class="field" value="<? if($ref_id){echo $listUser['Ref_no'];}else{echo $random_number;}?>" />
<!--<input type="text" name="refNumber" <? if($ref_id){?>value="<? echo $listUser['Ref_no']; ?>" <? }else { echo $random_number; }?> class="field"   />--><? //echo(rand(1000,10000)) ?><!--<input type="button" onclick="return gen_pwd2()" value="Generale" />--></td>
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
                                          <td>
										  <input type="text" name="editorsDeadline" id="editorsDeadline" size="10" value="<? if($editors_ded=='0000-00-00'){ echo $editors_ded==""; }else {echo $editors_ded;}?>" />
										
										  <a href="javascript:;" name="AnchorTo" id="AnchorTo" onClick="popUpCalendar(form2.image3,document.getElementById('editorsDeadline'), 'yyyy-mm-dd')"><img src="js/images/calendar.gif" alt="Date Selector" name="image3" width="20" height="20" hspace="3" border="0" align="absmiddle" id="image3" onMouseOver="window.status='Pop up a calendar to select a date';return true" onMouseOut="window.status='';return true;"></a><script language="javascript" src="js/datecal.js"></script></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">Delivery Address</td>
                                          <td>&nbsp;</td>
                                          <td><input type="text" name="deliveryAddr" class="field"  value="<? echo $listUser['client_order_del_addr'];?>"/></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">Delivery Date</td>
                                          <td>&nbsp;</td>
                                          <td> <input type="text" name="deliveryDate" id="deliveryDate" size="10" value="<? if($delivery_date=='0000-00-00'){ echo $delivery_date==""; }else {echo $delivery_date;}?>" />
										  
										 
										  <a href="javascript:;" name="AnchorTo" id="AnchorTo" onClick="popUpCalendar(form2.image4,document.getElementById('deliveryDate'), 'yyyy-mm-dd')"><img src="js/images/calendar.gif" alt="Date Selector" name="image4" width="20" height="20" hspace="3" border="0" align="absmiddle" id="image4" onMouseOver="window.status='Pop up a calendar to select a date';return true" onMouseOut="window.status='';return true;"></a><script language="javascript" src="js/datecal.js"></script></td>
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
                                        <tr>
                                          <td class="grouphead">Production Information</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <!--<tr>
                                          <td class="tbtext">Number of books</td>
                                          <td>&nbsp;</td>
                                          <td><input type="text" name="txt_no_books" class="field" /></td>
                                        </tr>-->
                                      <!--  <tr>
                                          <td class="tbtext">Number of pages</td>
                                          <td>&nbsp;</td>
                                          <td><label>
                                            <input type="text" name="txt_no_pages" class="field" />
                                            </label></td>
                                        </tr>-->
                                        <tr>
                                          <td class="tbtext">Inside paper to be printed by</td>
                                          <td>&nbsp;</td>
                                          <td><div id="inside_paper_content"><select class="listmenu" name="inside_paper" id="inside_paper" onChange="showId(this.value)">
											<option value="">--- Select ---</option>
											<? if(!empty($arrInside)){
												foreach($arrInside as $key => $value){ ?>
											<option value="<?=$value['paper_id']?>" <? if($inside_paper == $value['paper_id']) echo 'selected'; ?>><?=$value['name']?></option>
											<? } } ?>	
											</select>
											</div></td>
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
                                          <td class="tbtext">Binding to be performed by</td>
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
                                          <td class="tbtext">Books to be deliverd by </td>
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
		</select></div>	</td>
                                        </tr>
										 <tr><td class="tbtext"><div id="txtHint6_1"></div></td><td></td><td ><div id="txtHint6"></div></td></tr>
                                        <tr>
                                          <td class="tbtext">Dispatched on </td>
                                          <td>&nbsp;</td>
                                          <td>  <input type="text" name="sdat" id="sdat" size="10" value="<? if($despatch=='0000-00-00'){ echo $despatch==""; }else {echo $despatch;}?>" />
										
										  <a href="javascript:;" name="AnchorTo" id="AnchorTo" onClick="popUpCalendar(form2.image1,document.getElementById('sdat'), 'yyyy-mm-dd')"><img src="js/images/calendar.gif" alt="Date Selector" name="image1" width="20" height="20" hspace="3" border="0" align="absmiddle" id="image1" onMouseOver="window.status='Pop up a calendar to select a date';return true" onMouseOut="window.status='';return true;"></a><script language="javascript" src="js/datecal.js"></script></td>
                                        </tr>
										<tr>
                                          <td class="tbtext">Ready For Print </td>
                                          <td>&nbsp;</td>
                                          <td><input type="checkbox" name="print" <?PHP if($print=='Y' && $status == "RDY") {echo "checked";}?> id="print" value="Y" class="" /></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td><input type="hidden" name="clientId" id="clientId" value="<?php echo $_GET["id"]; ?>" /><input type="image" name="add" value="Add" src="images/submit.gif" alt="" width="69" height="21" /><input type="hidden" name="add" /></td>
                                        </tr>
										 <tr>
                                          <td class="tbtext"></td>
                                          <td>&nbsp;</td>
                                          <td></td>
										 </tr>
                                      </table></td>
                                    <td>&nbsp;</td>
                                    <td width="350" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                                        <tr>
                                          <td class="grouphead">Account Information</td>
                                          <td width="2">&nbsp;</td>
                                          <td width="210">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">Trial account expires on</td>
                                          <td class="tbtext">&nbsp;</td>
                                          <td><input type="text" name="expiry_date" id="expiry_date" size="10" value="<? if($trial_account=='0000-00-00'){ echo $trial_account==""; }else {echo $trial_account;}?>" />
										 
										  <a href="javascript:;" name="AnchorTo" id="AnchorTo" onClick="popUpCalendar(form2.image5,document.getElementById('expiry_date'), 'yyyy--mm-dd')"><img src="js/images/calendar.gif" alt="Date Selector" name="image5" width="20" height="20" hspace="3" border="0" align="absmiddle" id="image5" onMouseOver="window.status='Pop up a calendar to select a date';return true" onMouseOut="window.status='';return true;"></a><script language="javascript" src="js/datecal.js"></script></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">No.books required</td>
                                          <td class="tbtext">&nbsp;</td>
                                          <td><input type="text" name="txt_books" id="txt_books" onblur="calculate();" class="field" value="<? echo $listAccount['client_book_require'];?>" /></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">No.pages reqired</td>
                                          <td class="tbtext">&nbsp;</td>
                                          <td><input type="text" name="txt_pages" id="txt_pages" onblur="calculate();" class="field" value="<? echo $listAccount['client_page_require'];?>" /></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">Deposit</td>
                                          <td class="tbtext">&nbsp;</td>
                                          <td class="tbtext"><div id="deposit"> <? 
										  $listAccount		= $objP->listAccount($uId);
										   $amount				= $listAccount['client_deposit'];
										   $total				= $listAccount['total'];
										   
										  if($amount >='300')
										  {
										   ?>
										  PAID ($<?=$listAccount['client_deposit'];?>,<?=$trans_id;?>)<?=$trans_date;?><br />
										 <a  href="clientSheet.php?pdfname=invoices/invoice<?=$uId?>.pdf&pdf=pdf" target="_blank"><img src="images/pdf.gif" border="0"/></a>
										   <?
										   		}
												else
											{
												?>
											
										   <a href="javascript:openWin('popupdeposit.php?id=<?=$uId;?>')">Due   </a>Date is <?=$trial_account1;?>
												<?php
												}
										 ?>
										 
										  </div>
										  <!--<input type="text" name="deposit" id="deposit"  class="field" value="<? //echo $deposit;?>"/>-->										  </td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">Rate type</td>
                                          <td class="tbtext">:</td>
                                          <td><select name="rate_type" id="rate_type" class="listmenu" onchange="showId15(this.value)" onblur="calculate();">
										  
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
										
										  </select> 		<a href="javascript:openWin('addrateType.php');">Add New</a>							  </td>
                                        </tr>
										<? 
										$baserate		=	$listAccount['client_basic_rate'];?>
                                        <tr>
                                          <td class="tbtext">Base rate (50 pp)</td>
                                          <td class="tbtext">:</td>
                                          <td><div id="rateType_item">$<input type="text" name="baserate" id="baserate" class="field" value="<? echo $listAccount['client_basic_rate'];?>"  readonly=""/></div></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext"><div id="rateType_item_1">Per page rate</div></td>
                                          <td class="tbtext">:</td>
                                          <td><div id="rateType_item">$<input type="text" name="rate" id="rate" class="field" value="<? echo $listAccount['client_per_page_rate'];?>" readonly="" /></div></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">Extra cost(per books)</td>
                                          <td class="tbtext">:</td>
                                          <td>$<input type="text" name="cost_perbook" onblur="calculate();" onfocus="makeDisable();" id="cost_perbook" class="field" value="<? echo $listAccount['client_extra_per__book'];?>" /></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">Extra cost(all books) </td>
                                          <td class="tbtext">:</td>
                                          <td>$<input type="text" onblur="calculate();" onfocus="makeDisable1();" name="extracost" id="extracost" class="field" value="<? echo $listAccount['client_extra_all_book'];?>" /></td>
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
									echo	$amount				=	$listAccount['total'];
										//$per		=$amount*60/100;	
										//--------------------------------------------------------------
										
									 $total_amount		=	$listAccount['total'];
									 $depo				=	$listAccount['client_deposit'];
										//$amt_receivd		=	$listAccount['amount_received'];
								 $amt		=	$listpayment['amount'];
							 $amt_receivd		= $amt + $depo;
						  $per		=	$total_amount*60/100;	
									/*	 if($amt_receivd <= $per)
										 	$ststus = "Not Paid";
										else
											$ststus = "Paid";
											
											echo $ststus;*/
										?>
										
                                        <tr>
                                          <td class="tbtext">Total Amount </td>
                                          <td class="tbtext">&nbsp;</td>
                                          <td class="tbtext">$<input type="" value="<?=number_format($total_amount,2);?>" name="total" id="total" class="field" readonly=""/></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">60% Payment </td>
                                          <td class="tbtext">:</td>
                                          <td class="tbtext"><?
										 if($depo>=300)
										 {
										 if($amt_receivd >= $per)
										 	{
											echo "PAID"; ?>
											
											
											
											<a  href="clientSheet.php?pdfname=invoices/invoicepayment<?=$uId?>.pdf&pdf=pdf" target="_blank"><img src="images/pdf.gif" border="0"/></a>
										<?	}
											else
											{
											echo "NOT PAID"?> due before <?=$editors_ded;?><a href="javascript:openWin('payment.php?id=<?=$uId;?>&aid=<?=$listAccount['client_account_id'];?>')">Due</a>
										<? 	}
										 }
										?>
										
		<? 								   
										  /*  if($amt_receivd >= $per &&  $amt_receivd!=0.00){echo 'PAID';}else{ echo 'NOT PAID';?> due before<?=$editors_ded;?><? }*/?>
										 
										
										  
										  </td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">Final payment</td>
                                          <td class="tbtext">:</td>
                                          <td class="tbtext"><?
										 if($amt_receivd >=$per && $depo>=300)
										 {
										 	if($amt_receivd >= $total_amount)
											{
											echo "PAID"; ?>
										
											<a  href="clientSheet.php?pdfname=invoices/invoicepayment<?=$uId?>.pdf&pdf=pdf" target="_blank"><img src="images/pdf.gif" border="0"/></a>
											<? }
											else
											{
											echo "NOT PAID";?>  due before<?=$delivery_date;?><a href="javascript:openWin('payment.php?id=<?=$uId;?>&aid=<?=$listAccount['client_account_id'];?>')">Due</a>
										 <? }
										 }
										  
										 // $amt_receivd		=	$listpayment['amount'];
										 
										/*if($amt_receivd >= $total_amount &&  $total_amount!=0.00){echo 'PAID';}else{ echo 'NOT PAID';?> due before<?=$delivery_date;?>
										<a href="javascript:openWin('payment.php?id=<?=$uId;?>&aid=<?=$listAccount['client_account_id'];?>')">Due</a>
										<? }*/?>
										 
										 <?
										 
										   /*if($amt_receivd<='$total_amount') { echo 'NOT PAID' ?> due before<?=$delivery_date;?> <a href="javascript:openWin('payment.php?id=<?=$uId;?>&aid=<?=$listAccount['client_account_id'];?>')">Due</a><? }else{ echo 'PAID'?><? }*/?> 
										  </td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">&nbsp;</td>
                                          <td class="tbtext">&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td class="grouphead">Login Details</td>
                                          <td class="tbtext">&nbsp;</td>
                                          <td> </td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext"><a class="" href="javascript:openWindow('editors_detail.php','<? echo $listUser['client_id']; ?>','P');">Contact Person Login Details</a></td>
                                          <td class="tbtext">&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext"><a class="" href="javascript:openWindow('editors_detail.php','<? echo $listUser['client_id']; ?>','E');">Editors Login Details</a></td>
                                          <td class="tbtext">&nbsp;</td>
                                          <td><span class="tbtext"></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext"><a href="javascript:openWindow('editors_detail.php','<? echo $listUser['client_id']; ?>','C');">Contributors Login Details</a></td>
                                          <td></td>
                                          <td>&nbsp;</td>
                                        </tr>
                                      </table></td>
                                  </tr>
                                </table>
                              </form></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>
							<!-- client histort-->
							<div id="sub" style="display:block;">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td class="grouphead">Client History</td>
                                <td><a href="newEntry.php?id=<?=$uId;?>" class="create">Create New Entry</a></td>
                                <td><a href="javascript:void(0);" onClick="setVisibility('main1', 'inline');setVisibility('sub', 'none');" class="create">+ More Info </a></td>
                              </tr>
                            </table>
							</div>
							
							<div id="main1" style="display:none">
<table width="699" border="0">
  <tr>
    <td width="299"><font color="#0033FF"><strong>Client History</strong></font></td>
	<td width="154"><a href="newEntry.php?id=<?=$uId;?>"><font color="#0033FF"><strong>Create New Entry</strong></font></a></td>
    <td width="232"><a href="javascript:void(0);" onClick="setVisibility('main1', 'none');setVisibility('sub', 'inline');">- Less</a></td>
  </tr>
</table>

<table width="699" border="0" cellpadding="2" style="margin:0;">
<? 
$listhistory	=	$objU->listhistory($uId);

if(!empty($listhistory))
{
foreach($listhistory as $key=>$value)
{

	

?>
  <tr>
    <td width="443" class="tbtext2"><?=$value['date'];?></td>
    <td width="240" class="tbtext2"><a href="historyDetail.php?id=<?=$uId?>"><?=$value['school'];?></a></td>
	
  </tr>
<?   }
}?>
  
</table>


</div>
<!-- close History -->
<script language="JavaScript">
function setVisibility(id, visibility) {
//alert("hi");
document.getElementById(id).style.display = visibility;
}

</script>
							
							</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                        </table></td>
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
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="57" background="images/footer_bg.gif" align="center"><? include('footer.php')?></td>
  </tr>
</table>
<SCRIPT LANGUAGE="JavaScript">
function makeDisable()
{
	document.getElementById("extracost").value="";
 }
function makeDisable1()
{
	document.getElementById("cost_perbook").value="";
}

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
function openWin(URL){aWindow=window.open(URL,"theWindow","height=380,width=540,left=200,top=100,scrollbars=no");}
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
</body>
</html>
