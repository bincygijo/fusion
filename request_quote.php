<?
ob_start();
include_once 'classes/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/database.class.php';
$objU		=	new user();

if(isset($_POST['Submit']))
{
$name	=	$_POST['name'];
$school	=	$_POST['school'];
$books	=	$_POST['books'];
$page	=	$_POST['pages'];
$budget	=	$_POST['budget'];
$comments	=	$_POST['comments'];
$email		=	$_POST['email'];
$qry		=	$objU->addQuote($name,$school,$books,$page,$budget,$comments,$email);
$msg		=	"You have successfully added!";
}

?>
<script language="javascript">
function check()
{

if(document.form1.email.value=="")
{
alert("Enter Email");
document.form1.email.focus();
return false;
}

 if(document.form1.email.value!="")
	 {
	 	emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
		
		elem=document.form1.email.value;
		if(!elem.match(emailExp)){
			alert('Enter valid email');
			document.form1.email.focus();
			return false;
		}
		
 }
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="Fusion Books, Fusion Books - School Yearbooks, Graduation Books, Yearbooks, Services, Online Yearbooks System, Fusion Book's online system, Yearbook Express, Yearbook Planner, Printing and Publishing, Custom School Diaries, Calendars, School Newsletters, Prospective,  Annual Report, School Reports, Autograph Books, Yearbooks, School Newsletters, Primary School Graduation Books, High School Graduation Books, Leaver’s Books, Profile Books, " />
<meta name="keywords" content="Yearbook, Yearbook Printing, Graduation Books, Sports Club Yearbooks, School Yearbooks, Uni’s &amp; Colleges, Workspace, Book Features, Yearbook Pricing, Yearbook Gallery, Yearbook Ideas, Article Page Ideas, Photo Page Ideas, Profile Page Ideas, How to Snap like a Pro, Front Cover Ideas, Yearbook Quotes, Quotes, Lesson Plans and Ideas, FAQ, Free Lesson Plans, Embossing, Hard-Covers, Gloss or matt laminate, UV Varnish and Spot UV Varnish, Dust-jackets, Foil binding, Durable wire-binding, standard binding, Cleat-binding, high quality yearbook, Full-Colour printing" />
<title>Fusion Books : Book Features</title>
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
      <h1>Request <span> A Quote</span></h1>
      <p>Fusion Books aims to bring its customers the best quality at the best price. If you have a quote from another company, send it to us and we will do our best to beat it.</p>
	  <div class="contact">
        <form id="form1" name="form1" method="post" action="">
		<? if($msg!=''){ ?>
          <p style="margin: 0px; padding:0 0 10px 130px; font-family:Tahoma, Arial, Helvetica, sans-serif;font-weight: bold; color:#FF0000"><? echo $msg;?><? } ?></p>
	  <div class="label">Name</div>
      <label><input type="text" name="name" class="field" /></label><br />
	  <div class="label">School</div>
      <label><input type="text" name="school" class="field" /></label><br />
	   <div class="label">Email</div>
	   <label><input type="text" name="email"  class="field" /></label><br />
	  <div class="label">How many books</div>
      <label><input type="text" name="books" class="field" /></label><br />
	  <div class="label">Approximate number of pages</div>
      <label><input type="text" name="pages" class="field" /></label><br />
	  <div class="label">Approximate budget (total or per book)</div>
      <label><input type="text" name="budget" class="field" /></label><br /><br />
	  <div class="label">Comments and special requests.</div>
      <label><input type="text" name="comments" class="field" /></label><br /><br />
	  <div style="text-align:center;"><label>
	  <input type="submit" name="Submit" value="Submit" class="button"  style="cursor:pointer" onClick="return check();"/>
	  <input type="hidden" name="Submit" />
	  </label>
	  </div>
        </form>
</div>
    </div>
	

    <div id="column-right">
      <div class="sample"><a href="samplebooks_trailAccount.php"><img src="images/free_sample.jpg" alt="Free sample Book &amp; Trial account" border="0" /></a></div>
	  <div class="sample"><a href="request_quote.php"><img src="images/request.jpg" alt="Contact Fusion Books" border="0" /></a></div>
    </div>
  </div>
</div>
<? include('footer.php');?>
</body>

