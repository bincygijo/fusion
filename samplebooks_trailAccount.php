<?php
include_once 'classes/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/database.class.php';
$objU		=	new user();

if(isset($_POST['Submit']))
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
$field			=	'contact';


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
$msg1		=	$objU->add_contactus($name,$lastname,$position,$school,$numberbooks,$price,$street,$substreet,$state,$country,$postal,$contact_number,$email,$date,$info,$comment_sugg,$contact,$tick,$field);


  $msg		=	"You have successfully added!";
 
//header('location:contact_fusion_books.php?msg');

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="Fusion Books, Fusion Books - School Yearbooks, Graduation Books, Yearbooks, Services, Online Yearbooks System, Fusion Book's online system, Yearbook Express, Yearbook Planner, Printing and Publishing, Custom School Diaries, Calendars, School Newsletters, Prospective,  Annual Report, School Reports, Autograph Books, Yearbooks, School Newsletters, Primary School Graduation Books, High School Graduation Books, Leaver's Books, Profile Books, " />
<meta name="keywords" content="Yearbook, Yearbook Printing, Graduation Books, Sports Club Yearbooks, School Yearbooks, Uni's &amp; Colleges, Workspace, Book Features, Yearbook Pricing, Yearbook Gallery, Yearbook Ideas, Article Page Ideas, Photo Page Ideas, Profile Page Ideas, How to Snap like a Pro, Front Cover Ideas, Yearbook Quotes, Quotes, Lesson Plans and Ideas, FAQ, Free Lesson Plans, Embossing, Hard-Covers, Gloss or matt laminate, UV Varnish and Spot UV Varnish, Dust-jackets, Foil binding, Durable wire-binding, standard binding, Cleat-binding, high quality yearbook, Full-Colour printing" />
<title>Fusion Books : Free Sample Book &amp; Trial Account </title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/style_dropdown.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/ddlevelsmenu-base.css" />

<script type="text/javascript" src="js/drop.js"></script>
<script type="text/javascript" src="js/ddlevelsmenu.js"></script>


</head>
<body id="body_bg">
<div id="container">
  <?php include('header.php');?>
  
  <div id="banspace">&nbsp;</div>
  <div id="middle-part">
    
    <div id="content_inner">
      <h1>Free Sample Book &amp; <span>Trial Account</span></h1>
 		<div align="center" style="width:500px;"><img src="images/magazine.jpg" alt="" /></div>
      <form id="form" name="form" method="post" action="" style="margin:0px;">
        <div class="contact">
		<?php if($msg!=''){ ?>
          <p style="margin: 0px; padding:0 0 10px 130px; font-family:Tahoma, Arial, Helvetica, sans-serif;font-weight: bold; color:#FF0000"><?php echo $msg;?><?php } ?></p>
		  <div style="width:540px; float:left; vertical-align:top;">
          First name:
          <label><input type="text" name="first_name" class="field" /></label>
		  Last name:
          <label><input type="text" name="last_name" class="field" /></label></div>
		  <div>
		  <div class="label">Position (ie. Year 6 Teacher, Year 12 Student):</div>
          <label><input type="text" name="position" class="field" /></label><br /><br />
		  <div class="label">Email:</div>
          <label><input type="text" name="email" class="field" /></label><br />
		  <div class="label">Best contact number:</div>
          <label><input type="text" name="contact_number" class="field" /></label><br />
		  <div class="label">No. of books required (estimate)</div>
          <label><input type="text" name="no_books" class="field" /></label><br />
		  <div class="label">School/Company/Group:</div>
          <label><input type="text" name="school" class="field" /></label><br />
		  <div class="label">What is the price range you are looking at for each book?</div>
          <label><input type="text" name="price" class="field" /></label><br /><br />
		  <b>If you want a sample book and trial account fill out your postal address:</b>
		  <br /><br />
          <div class="label">Street Address</div>
          <label><input type="text" name="street" class="field" /></label><br />
		  <div class="label">Suburb</div>
          <label><input type="text" name="sub_street" class="field" /></label><br />
		  <div class="label">State</div>
          <label><input type="text" name="state" class="field" /></label><br />
		  <div class="label">Country</div>
          <label><input type="text" name="country" class="field" /></label><br />
		  <div class="label">Postcode</div>
          <label><input type="text" name="post_code" class="field" /></label><br />
		  <b>How can we help you? I want a. (tick as many as you want):</b>
		  <br /><br />
		  <label><input type="checkbox" name="chk[]" id="chk[]" value="Quote" /></label> 
		  Quote
		  <label><input type="checkbox" name="chk[]" id="chk[]" value="Free Trial Account" /></label> 
		  Free Trial Account
		  <label><input type="checkbox" name="chk[]" id="chk[]" value="Sample Book" /></label> 
		  Sample Book
		  <label><input type="checkbox" name="chk[]" id="chk[]" value="Other" onClick="showId(this.value)"/></label> Other <div id="txtHint1"></div>
		  <!--<label><input type="checkbox" name="chk[]" id="chk[]" value="Any comments" /></label> Any comments/questions/suggestions?
		  <br />--><br />
		  <div class="label">Any comments/questions/ suggestions?</div>
		  <label><textarea name="suggection" class="textarea"></textarea></label><br /><br />
		  <div class="label">How did you first hear about Fusion Books?</div>
		  <label><input type="text" name="info" class="field" /></label>
		  <br /><br />
		  <div style="text-align:center;"><label><input type="submit" name="Submit" value="Submit" class="button" style="cursor:pointer" onClick="return check();"/> <input type="hidden" name="Submit" /></label></div>
        </div>
		</div>
      </form>
      <p>&nbsp;</p>
    </div>
    <div id="column-right">
      <div class="sample"><a href="samplebooks_trailAccount.php"><img src="images/free_sample.jpg" alt="Free sample Book &amp; Trial account" border="0" /></a></div>
	  <div class="sample"><a href="request_quote.php"><img src="images/request.jpg" alt="Contact Fusion Books" border="0" /></a></div>
    </div>
  </div>
</div>
<?php include('footer.php');?>

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
