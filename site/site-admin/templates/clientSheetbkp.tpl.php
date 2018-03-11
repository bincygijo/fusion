<? 
 $uId			=	$_GET['id'];

$listUser		=	$objU->list_user($uId);?>
<script language="javascript" src="js/cal2.js">
</script>
<script language="javascript" src="js/cal_conf2.js"></script>
<script language="javascript" src="js/pop-up.js">
</script>

<link href="js/popcalendar.css" rel="stylesheet" type="text/css">


<!--add Inside paper-->
<script language="javascript">
var xmlHttp
var tp
function showId(str)
{ 
tp = str;
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
{
alert ("Browser does not support HTTP Request")
return
} 
var url="addInside.php"
url=url+"?q="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function stateChanged() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{ 
if(tp=="Addnew")

{
document.getElementById("txtHint1_1").innerHTML="New Supplier";
<!--document.getElementById("btnHint1").innerHTML="<input type='submit' value='Submit'>";-->
document.getElementById("txtHint1").innerHTML=xmlHttp.responseText ;

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
</script>

<!-- add cover to be printed -->
<script language="javascript">
var xmlHttp
var tp
function showId1(str)
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
var url="addCover.php"
url=url+"?q="+str
//alert(url);
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged1
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function stateChanged1() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{ 
if(tp=="Addnew")

{
document.getElementById("txtHint2_1").innerHTML="New Supplier";

document.getElementById("txtHint2").innerHTML=xmlHttp.responseText ;
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
</script>
<!-- add laminate to be printed -->

<script language="javascript">
var xmlHttp
var tp
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
if(tp=="Addnew")

{
document.getElementById("txtHint3_1").innerHTML="New Supplier";
document.getElementById("txtHint3").innerHTML=xmlHttp.responseText ;
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
</script>

<script language="javascript">
var xmlHttp
var tp
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
if(tp=="Addnew")

{
document.getElementById("txtHint4_1").innerHTML="New Supplier";
document.getElementById("txtHint4").innerHTML=xmlHttp.responseText ;
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
</script>

<script language="javascript">
var xmlHttp
var tp
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
if(tp=="Addnew")

{
document.getElementById("txtHint5_1").innerHTML="New Supplier";
document.getElementById("txtHint5").innerHTML=xmlHttp.responseText ;
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
</script>


<script language="javascript">
var xmlHttp
var tp
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
if(tp=="Addnew")

{
document.getElementById("txtHint6_1").innerHTML="New Supplier";
document.getElementById("txtHint6").innerHTML=xmlHttp.responseText ;
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
//alert(tp);
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
xmlHttp.onreadystatechange=stateChanged10
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}
function stateChanged10() 
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

<font color="#000000"><strong><? echo $listUser['school'];?></strong></font>
<table width="100%" border="0" style="border:1px solid #4674a4;">
  <tr>
    <td width="504"  ><table width="100%" border="0">
  
  <tr>
    <td width="271"><font color="#0033FF"><strong>Ref#</strong></font></td>
    <td width="291"><input type="text" name="" /></td>
  </tr>
  <tr>
    <td>Contact Person Name </td>
    <td><input type="text" name="" value="<? echo $listUser['name'];?>" /></td>
  </tr>
  <tr>
    <td>School Name </td>
    <td><input type="text" name="" value="<? echo $listUser['school'];?>" /></td>
  </tr>
  <tr>
    <td>No.books requires </td>
    <td><input type="text" name="" /></td>
  </tr>
  <tr>
    <td>Editor's Deadline </td>
    <td><input type="text" name="" value="" /></td>
  </tr>
  <tr>
    <td>Delivery Address </td>
    <td><input type="text" name="" value="" /></td>
  </tr>
  <tr>
    <td>Delivery Date </td>
    <td><input type="text" name="" value="" /></td>
  </tr>
  <tr>
    <td>Contact Number </td>
    <td><input type="text" name="" value="<? echo $listUser['contact'];?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</td>
    <td width="700"><table width="85%" border="0">
      <tr>
        <td colspan="2"><font color="#0033FF"><strong>Account Information</strong></font></td>
        </tr>
      <tr>
        <td width="329">Trial account expires on </td>
        <td width="259"><input type="text" name="" value="" /></td>
      </tr>
      <tr>
        <td>No.books required </td>
        <td><input type="text" name="" value="" /></td>
      </tr>
      <tr>
        <td>No.pages reqired </td>
        <td><input type="text" value=""  name="" /></td>
      </tr>
      <tr>
        <td>Deposit</td>
        <td><a href="javascript:openWin('popupdeposit.php')">PAID</a></td>
      </tr>
      <tr>
        <td>Rate type </td>
        <td>:</td>
      </tr>
      <tr>
        <td>Base rate (50 pp) </td>
        <td>:</td>
      </tr>
      <tr>
        <td>Per page rate </td>
        <td>:</td>
      </tr>
      <tr>
        <td>Extra cost(per books) </td>
        <td>:</td>
      </tr>
      <tr>
        <td>Extra cost(all books) </td>
        <td>:</td>
      </tr>
      <tr>
        <td>60% Payment paymeny </td>
        <td>:</td>
      </tr>
      <tr>
        <td>Final payment </td>
        <td>:</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
   <tr>
    <td height="97">
	<form name="form1" id="form1" method="post" action="">
	<table width="100%" border="0">
      <tr>
        <td colspan="2"><font color="#0033FF"><strong>Production Information</strong></font> </td>
        </tr>
      <tr>
        <td width="245">Number of books </td>
        <td width="179"><input type="text" name="no_books" /></td>
      </tr>
      <tr>
        <td>Number of pages </td>
        <td><input type="text" name="no_page" /></td>
      </tr>
      <tr>
        <td>Inside paper to be printed by </td>
        <td ><div id="inside_paper_content"><select name="inside_paper" id="inside_paper" onchange="showId(this.value)">
		<option value="">Select One</option>
		<? if(!empty($arrInside))
		{
		foreach($arrInside as $key=>$value)
		{ ?>
		<option value="<?=$value['name']?>" <? if($paperInside==$value['name']) echo 'selected';?> >
		 <?=$value['name']?></option>
		<? }
		}?>
	
		</select>	</div>	</td>
      </tr>
      <tr><td><div id="txtHint1_1"></div></td><td ><div id="txtHint1"></div></td>
        <td width="89" ><div id="btnHint1"></div></td>
     </tr>
	  <!-- <tr><td><div id="txtHint1_1"></div></td><td colspan="2" ><div id="txtHint1"></div></td><td><div id="btnHint1"></div></td></tr>-->
      <tr>
        <td>Cover to be printed by </td>
        <td><div id="cover_paper_content"><select name="coverpaper" id="coverpaper" onchange="showId1(this.value)">
		<option value="">Select One</option>
		<? if(!empty($arrCover))
		{
		foreach($arrCover as $key=>$value)
		{ ?>
		<option value="<?=$value['name']?>" <? if($paperCover==$value['cover_id']) echo 'selected';?> >
		 <?=$value['name']?></option>
		<? }
		}?>
		</select></div>	</td>
      </tr>
	    <tr><td><div id="txtHint2_1"></div></td><td ><div id="txtHint2"></div></td></tr>
      <tr>
        <td>Laminating to be performed by </td>
        <td><div id="laminate_paper_content"><select name="laminating_paper" id="laminating_paper" onchange="showId2(this.value)">
		<option value="">Select One</option>
		<? if(!empty($arrLamp))
		{
		foreach($arrLamp as $key=>$value)
		{ ?>
		<option value="<?=$value['name']?>" <? if($arrLamp==$value['lamp_id']) echo 'selected';?> >
		 <?=$value['name']?></option>
		<? }
		}?>
		</select></div></td>
      </tr>
	  <tr><td><div id="txtHint3_1"></div></td><td ><div id="txtHint3"></div></td></tr>
      <tr>
        <td>Binding to be performed by </td>
        <td><div id="binding_paper_content"><select name="binding_paper" id="binding_paper" onchange="showId3(this.value)">
		<option value="">Select One</option>
		<? if(!empty($arrBind))
		{
		foreach($arrBind as $key=>$value)
		{ ?>
		<option value="<?=$value['name']?>" <? if($arrBind==$value[' bind_id']) echo 'selected';?> >
		 <?=$value['name']?></option>
		<? }
		}?>
		</select></div></td>
      </tr>
	   <tr><td><div id="txtHint4_1"></div></td><td ><div id="txtHint4"></div></td></tr>
      <tr>
        <td>Books to be deliverd by </td>
        <td><div id="deliver_paper_content"><select name="books_deliver" id="books_deliver" onchange="showId4(this.value)">
		<option value="">Select One</option>
			<? if(!empty($arrBooks))
		{
		foreach($arrBooks as $key=>$value)
		{ ?>
		<option value="<?=$value['name']?>" <? if($arrBooks==$value[' book_id']) echo 'selected';?> >
		 <?=$value['name']?></option>
		<? }
		}?>
		</select></div></td>
      </tr>
	   <tr><td><div id="txtHint5_1"></div></td><td ><div id="txtHint5"></div></td></tr>
      <tr>
        <td>(connote numbers ) </td>
        <td><input type="text" name="canotnumber" /></td>
      </tr>
      <tr>
        <td>Type of freight </td>
        <td><div id="freight_paper_content"><select name="freight" id="freight" onchange="showId5(this.value)">
		<option value="">Select One</option>
			<? if(!empty($arrFreight))
		{
		foreach($arrFreight as $key=>$value)
		{ ?>
		<option value="<?=$value['name']?>" <? if($arrFreight==$value['freight_id']) echo 'selected';?> >
		 <?=$value['name']?></option>
		<? }
		}?>
		</select></div>		</td>
      </tr>
	   <tr><td><div id="txtHint6_1"></div></td><td ><div id="txtHint6"></div></td></tr>
	  
      <tr>
        <td>Dispatched on </td>
        <td><input type="text" name="sdat"  id="sdat"  />
          <a href="javascript:;" name="AnchorTo" id="AnchorTo" onClick="popUpCalendar(form1.image1,document.getElementById('sdat'), 'dd-mm-yyyy')"><img src="js/images/calendar.gif" alt="Date Selector" name="image1" width="20" height="23" hspace="3" border="0" align="absmiddle" id="image1" onMouseOver="window.status='Pop up a calendar to select a date';return true" onMouseOut="window.status='';return true;"></a>
          <script language="javascript" src="js/datecal.js"></script></td></tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
	</form></td>
    <td><table width="86%" border="0">
      <tr>
        <td colspan="2"><font color="#0033FF"><strong>Login Details</strong></font> </td>
        </tr>
      <tr>
        <td width="317">Contact Person Login Details </td>
        <td width="275">&nbsp;</td>
      </tr>
      <tr>
        <td>Editors Login Details </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Contributors Login Details </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>

<!-- Client History -->	
<div id="sub" style="display:block;">
<table width="699" border="0">
  <tr>
    <td width="299"><font color="#0033FF"><strong>Client History</strong></font></td>
	<td width="154"><input type="hidden" name="cid" value="<?=$uId?>"><a href="newEntry.php?id=<?=$uId;?>"><font color="#0033FF"><strong>Create New Entry</strong></font></a></td>
 
    <td width="232"><a href="#" onClick="setVisibility('main1', 'inline');setVisibility('sub', 'none');">+ More Info</a></td>
  </tr>
</table>
</div>
<div id="main1" style="display:none">
<table width="699" border="0">
  <tr>
    <td width="299"><font color="#0033FF"><strong>Client History</strong></font></td>
	<td width="154"><a href="newEntry.php"><font color="#0033FF"><strong>Create New Entry</strong></font></a></td>
    <td width="232"><a href="#" onClick="setVisibility('main1', 'none');setVisibility('sub', 'inline');">- Less</a></td>
  </tr>
</table>
<table width="699" border="1">
  <tr>
    <td width="443">test</td>
    <td width="240">test</td>
	
  </tr>
  
</table>


</div>
<!-- close History -->
<script language="JavaScript">
function setVisibility(id, visibility) {
//alert("hi");
document.getElementById(id).style.display = visibility;
}

</script>

<SCRIPT LANGUAGE="JavaScript">
function openWin(URL){aWindow=window.open(URL,"theWindow","height=380,width=540,left=200,top=100,scrollbars=yes");}
</SCRIPT>