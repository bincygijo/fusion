<?
include_once 'classes/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/database.class.php';
$objU		=	new user();

if(isset($_POST['Submit']))
{

$name		=	$_POST['first_name'];
$number		=	$_POST['number'];
 $call_time	=	$_POST['call_time'];
$school		=	$_POST['school'];
$email		=	$_POST['email'];
$date		=	$_POST['date_time'];
$state		=	$_POST['state'];
$field		=	'popup';

		$to 			=	'test@portrave.com';
		$subject 		=	'FusionBooks Call details';
	$message		=	"Name"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$name."<br>";
	$message		.=	"Phone Number"."&nbsp;&nbsp;".$number."<br>";
	$message		.=	"Call time"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$call_time."<br>";
	$message		.=	"School"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$school."<br>";
	$message		.=	"Email"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$email."<br>";
	$message		.=	"Call Date"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$date."<br>";
	$message		.=	"State"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$state."<br>";
	
	/*$message		=	 "<table width='100%' border='0' >
  <tr>
    <td>Name</td>
    <td>".$name."</td>
  </tr>
  <tr>
    <td>Phone Number</td>
    <td>".$number."</td>
  </tr>
   <tr>
    <td>Call time</td>
    <td>".$call_time."</td>
  </tr>
   <tr>
    <td>School</td>
    <td>".$school."</td>
  </tr>
   <tr>
    <td>Email</td>
    <td>".$email."</td>
  </tr>
   <tr>
    <td>Date</td>
    <td>".$date."</td>
  </tr>
</table>";
*/
		
		
		$header		 	= "MIME-Version: 1.0" . "\r\n";
		$header		 	.= 'From: '.$email.'' . "\r\n";
		$header 		.= "Content-type: text/html; charset=iso-8859-1\r\n";
						
	$msg	=	mail($to, $subject, $message, $header);
	
	$msg2	= $objU->addpopupCon($name,$number,$call_time,$school,$email,$date);
	
	$msg1	= $objU->addpopContact($name,$number,$call_time,$school,$email,$date,$field);
	
	
echo "<script language='javascript'>window.close();</script>";
}

?>
<script language="javascript">
function check()
{
if(document.form.email.value=="")
{
alert("Please enter email");
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
		}
		

}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fusion Books</title>

<script language="javascript" src="site/site-admin/js/cal2.js"></script>
<script language="javascript" src="site/site-admin/js/cal_conf2.js"></script>

<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body style="background:none;">
<div style="padding:20px; float:left; border:2px solid #99CC00;">
<form name="form" id="form" method="post" action="">
  <div class="contact" style=" margin:0px; width:450px;">
    <div class="label">Name :</div>
    <label><input type="text" name="first_name" class="field" /></label><br />
    <div class="label">Number :</div>
    <label><input type="text" name="number" class="field" /></label><br />
    <div class="label">Best time to call :</div>
    <label><input type="text" name="call_time" class="field" /></label><br />
	<div class="label">Call Date :</div>
    <label><input type="text" name="date_time" id="date_time" class="field" /></label>  <a href="javascript:showCal('Calendar15')"><img src="site/site-admin/images/cal.gif" width="19" height="17" border="0" /></a> <br />
    <div class="label">School/Organisation :</div>
    <label><input type="text" name="school" class="field" /></label><br />
    <div class="label">Email :</div>
    <label><input type="text" name="email" class="field" /></label><br />
	<div class="label">State :</div>
	<label><input type="text" name="state" class="field" /></label>
    <br /><br />
    <div class="label">&nbsp;</div>
    <label><input type="submit" name="Submit" value="Submit" class="button" style="cursor:pointer" onClick="return check();"/>
	<input type="hidden" name="Submit" value="Submit" /></label>
  </div>
  </form>
</div>
</body>
</html>
