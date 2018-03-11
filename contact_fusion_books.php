<?
include_once 'classes/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/database.class.php';
$objU		=	new user();

/*if(isset($_POST['Submit']))
{
$name		=	$_POST['first_name'];
$lastname	=	$_POST['last_name'];
$position	=	$_POST['position'];
$school		=	$_POST['school'];
$numberbooks	=	$_POST['no_books'];
$price		=	$_POST['price'];
$street		=	$_POST['street'];
$substreet	=	$_POST['sub_street'];
$state		=	$_POST['state'];
$country	=	$_POST['country'];
$postal		=	$_POST['post_code'];
$contact_number	=	$_POST['contact_number'];
$email		= $_POST['email'];
$date	=	date('Y-m-d');
$info		=	$_POST['info'];
$comment_sugg	=	$_POST['suggection'];


 $contact1		=	$_POST['chk'];

for($i=0;$i<sizeof($contact1);$i++)
{
$x = explode(",",$contact1);
$contact = implode("," ,$contact1);

}

//print_r($contact);
		//echo $contact;
		
$exp		=	explode(',',$contact);		
//print_r($exp);
$con	=	 $exp[3];
		if($con=='Other')
		{
		$tick	=	$_POST['other_name'];
		}
		
//exit;
$msg1		=	$objU->add_contactus($name,$lastname,$position,$school,$numberbooks,$price,$street,$substreet,$state,$country,$postal,$contact_number,$email,$date,$info,$comment_sugg,$contact,$tick);

  $msg		=	"You have successfully added!";
//header('location:contact_fusion_books.php?msg');

}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="Fusion Books, Fusion Books - School Yearbooks, Graduation Books, Yearbooks, Services, Online Yearbooks System, Fusion Book's online system, Yearbook Express, Yearbook Planner, Printing and Publishing, Custom School Diaries, Calendars, School Newsletters, Prospective,  Annual Report, School Reports, Autograph Books, Yearbooks, School Newsletters, Primary School Graduation Books, High School Graduation Books, Leaver’s Books, Profile Books, " />
<meta name="keywords" content="Yearbook, Yearbook Printing, Graduation Books, Sports Club Yearbooks, School Yearbooks, Uni’s &amp; Colleges, Workspace, Book Features, Yearbook Pricing, Yearbook Gallery, Yearbook Ideas, Article Page Ideas, Photo Page Ideas, Profile Page Ideas, How to Snap like a Pro, Front Cover Ideas, Yearbook Quotes, Quotes, Lesson Plans and Ideas, FAQ, Free Lesson Plans, Embossing, Hard-Covers, Gloss or matt laminate, UV Varnish and Spot UV Varnish, Dust-jackets, Foil binding, Durable wire-binding, standard binding, Cleat-binding, high quality yearbook, Full-Colour printing" />
<title>Fusion Books : Contact Fusion Books </title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/style_dropdown.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/ddlevelsmenu-base.css" />

<script type="text/javascript" src="js/drop.js"></script>
<script type="text/javascript" src="js/ddlevelsmenu.js"></script>


</head>
<body id="body_bg">
<div id="container">
  <? include('header.php');?>
  
  <div id="banspace">&nbsp;</div>
  <div id="middle-part">
    
    <div id="content_inner">
      <h1>Contact <span>Fusion Books</span></h1>
      <p>If you want a <b>quote, free trial account, sample book</b>, have a <b>question</b> or if there is anything else we can do to brighten your day let us know:</p>
      <p><img src="images/phone.jpg" alt="Phone" align="left" />&nbsp; <b>Want to chat? Give us a call and we&rsquo;ll pay (within Oz): 1800 637 515</b></p>
      <p style="padding-left:20px;"><b>Or</b> &nbsp;&nbsp;&nbsp; <a href="javascript:openWin('popupContact.php');"><img src="images/callyou.jpg" alt="We can call you" border="0" align="absmiddle" /></a></p>
      <p><img src="images/globe.jpg" alt="Overseas Call" align="left" />&nbsp; <b>If you&rsquo;re overseas call: +61 8 9246 5525</b></b><br />
        <br />
      </p>
      <p><img src="images/mail.gif" alt="Mail" align="left" />&nbsp; <b>Send your fan mail to: PO Box 2501, Warwick WA, Australia 6024</b><br /><br />
      </p>
      <p><img src="images/email.jpg" alt="Email" align="left" />&nbsp; <b>Send an email to <a href="mailto:info@fusionbooks.com.au">info@fusionbooks.com.au</a></b> <b><a href="samplebooks_trailAccount.php">or click here</a></b><br />
        <br />
      </p>
      <p><img src="images/twitter.jpg" alt="Twitter" align="left" />&nbsp; <b>Follow us on Twitter: <a href="http://www.twitter.com/fusionbooks/" target="_blank">www.twitter.com/fusionbooks</a></b><br />
        <br />
      </p>
      <p style="clear:left; padding-top:10px;"><img src="images/chat.jpg" alt="Chat" border="0" align="left" />&nbsp; <a href="#"  onclick="enable_chat()"><b>Chat online now</b></a></p>
	  <br />
     <!-- <h3>Or Contact Us below:</h3>-->
	     
      <p>&nbsp;</p>
    </div>
    <div id="column-right">
      <div class="sample"><a href="samplebooks_trailAccount.php"><img src="images/free_sample.jpg" alt="Free sample Book &amp; Trial account" border="0" /></a></div>
	  <div class="sample"><a href="request_quote.php"><img src="images/request.jpg" alt="Contact Fusion Books" border="0" /></a></div>
    </div>
  </div>
</div>
<? include('footer.php');?>

<script language="javascript">
function check()
{
if(document.form.email.value=="")
{
alert("Enter Email");
document.form.email.focus();
return false;
}

 if(document.form.email.value!="")
	 {
	 	emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
		
		elem=document.form.email.value;
		if(!elem.match(emailExp)){
			alert('Enter valid email');
			document.form.email.focus();
			return false;
		}
		
	 }	}
</script>
<script language="javascript">
var xmlHttp
var tp
function showId(str){ 

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
	xmlHttp.onreadystatechange=stateChanged 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}

function stateChanged(){ 
	if(xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
		if(tp=="Other"){
			
			document.getElementById("txtHint1").innerHTML=xmlHttp.responseText ;
		}else{
			//document.getElementById("txtHint1_1").innerHTML="";
			document.getElementById("txtHint1").innerHTML="";
		//	document.getElementById("").innerHTML=xmlHttp.responseText ;

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
<SCRIPT LANGUAGE="JavaScript">
function openWin(URL){aWindow=window.open(URL,"theWindow","height=380,width=540,left=200,top=100,scrollbars=yes");}
</SCRIPT>

</body>
