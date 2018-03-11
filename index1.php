<? 
ob_start();
include_once 'classes/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/database.class.php';
$objU		=	new user();
$arrPhoto		=	$objU->viewPhoto();
$arrPhoto1		=	$objU->viewPhoto1();
$page='home';
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="Fusion Books, Fusion Books - School Yearbooks, Graduations Books, Yearbooks, Services, Online Yearbooks System, Fusion Book's online system, Yearbook Express, Yearbook Planner, Printing and Publishing, Custom School Diaries, Calendars, School Newsletters, Prospective,  Annual Report, School Reports, Autograph Books, Yearbooks, School Newsletters, Primary School Graduation Books, High School Graduation Books, Leaver's Books, Profile Books, Sports Club Yearbooks, School Yearbooks, Uni's &amp; Colleges, Workspace, Book Features, Yearbook Pricing, Yearbook Gallery, Yearbook Ideas, Article Page Ideas, Photo Page Ideas, Profile Page Ideas, How to Snap like a Pro, Front Cover Ideas, Yearbook Quotes, Quotes, Lesson Plans and Ideas, FAQ, Free Lesson Plans, Embossing, Hard-Covers, Gloss or matt laminate, UV Varnish and Spot UV Varnish, Dust-jackets, Foil binding, Durable wire-binding, standard binding, Cleat-binding, high quality yearbook, Full-Colour printing" />
<title>Fusion Books : School Yearbooks, Graduation Books, Printing &amp; Publishing</title>
<link rel="stylesheet" href="css/style_dropdown.css" type="text/css" />
<link rel="stylesheet" href="css/bubble-tooltip.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/jquery.jcarousel.css" />
<link rel="stylesheet" type="text/css" href="css/skin_js.css" />
<link rel="stylesheet" type="text/css" href="css/skin.css" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/ddlevelsmenu-base.css" />

<script type="text/javascript" src="js/drop.js"></script>
<script type="text/javascript" src="js/bubble-tooltip.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="js/jquery.jcarousel.pack.js"></script>
<script type="text/javascript" src="js/jquery.scrollTo-min.js"></script>
<script type="text/javascript" src="js/jquery.scrollShow.js"></script>
<script type="text/javascript" src="js/ddlevelsmenu.js"></script>
<script type="text/javascript" src="js/jquery.jcarousel.js"></script>

	
	<script type="text/javascript">

jQuery(document).ready(function() {
    // Initialise the first and second carousel by class selector.
	// Note that they use both the same configuration options (none in this case).
	jQuery('.first-and-second-carousel').jcarousel(
	{
	scroll:1}
	);
	
	jQuery('#third-carousel').jcarousel({
      
		scroll:4
    });
});

</script>
	
	<SCRIPT LANGUAGE="JavaScript">
function openWin(URL){aWindow=window.open(URL,"theWindow","height=380,width=540,left=200,top=100,scrollbars=yes");}
</SCRIPT>
<script language="javascript">

function check(str){ 
	tp = str;
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null){
		alert ("Browser does not support HTTP Request")
		return
	} 
	var url="listdesc.php"
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
	
	if(response)
	{
	document.getElementById("rateType_item").innerHTML=xmlHttp.responseText ;

	}
	//alert(response);
	
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

<!--<link rel="stylesheet" type="text/css" href="ddlevelsfiles/ddlevelsmenu-base.css" />
<script type="text/javascript" src="ddlevelsfiles/ddlevelsmenu.js"></script>
-->
</head>

<body>
<div id="container">
  <? include('header.php');?>
  
  <div id="banner">&nbsp;</div>
  <div id="middle-part">
    <div id="column-left">
      <div class="login">
        <div class="top"><img src="images/curve_top.gif" alt="" /></div>
        <div class="middle">
          <h2><img src="images/icon.jpg" alt="" align="left" /> &nbsp; User <span>login</span></h2>
          <form id="form2" name="form2" method="post" action="login.php">
            <input type="text" name="username" id="username" class="textfield" value="Username" />
            <br />
            <input type="password" name="pass" id="pass" class="textfield" value="Password" />
            <br />
            <input type="image" src="images/submit.gif" alt=""  name="submit" vspace="Sign In"/>
			<input type="hidden" name="submit" value="" />
			<br />
            <div style="margin-top:10px;"><a href="#">Signup now</a> <a href="#">Forgot Password?</a></div>
          </form>
        </div>
        <div class="botton"><img src="images/curve_bottom.gif" alt="" /></div>
      </div>
      <div class="latest">
        <div class="top"><img src="images/curve_top.gif" alt="" /></div>
        <div class="middle">
          <h2><img src="images/icon1.jpg" alt="" align="left" /> &nbsp; Latest <span>news</span></h2>
          <p><strong>Lorem Ipsum is simply dummy text  ...</strong><br />
            May 17, 2009<br />
            <strong>There are many variations  passages ...</strong><br />
            Aug 25, 2009<br />
            <strong>The standard chunk of Lorem Ipsum  ...</strong><br />
            Mar 11, 2009<br />
            <a href="#">View all..</a></p>
        </div>
        <div class="botton"><img src="images/curve_bottom.gif" alt="" /></div>
      </div>
    </div>
    <div id="column-center">
      <h1>Yearbooks Made <span>Easy!</span></h1>
      <p>Looking for an easy way to create a stylish yearbook? Welcome to Fusion Books. Our simple and Flexible online system- means you can create a great yearbook, even if you have had no computer or design experience. <em>We now offer two  main ways of creating a great yearbook:</em></p>
      <div id="aussie">
        <div class="curves">
          <div class="curveleft"><img src="images/curve1.gif" alt="" /></div>
          <div class="curveright"><img src="images/curve2.gif" alt="" /></div>
        </div>
        <div class="middle-area">
		
          <h2>Aussie schools choose <span>Fusion Books...</span></h2>
          <div class="testmonial">
            <!--<div class="arrow"></div>
            <div class="message">-->
              <ul id="second-carousel" class="first-and-second-carousel jcarousel-skin-ie7">
		<? if(!empty($arrPhoto))
			{
			foreach($arrPhoto as $key => $val){
			 $des	=	$val['description'];
		 $des1	=		ereg_replace('"', "", $des);
			
			
			?>
			<li>
			<? ?>
			<span class="quotes">&ldquo;</span><strong style="font-size:11px;"><? echo $des1;?></strong><span class="quotes">&rdquo;</span>
			<? }}?>
			
			</li></ul>
            <!--</div>-->
						
			
			
          </div>
		  
		 <div id="bubble_tooltip">
	<div class="bubble_top"><span></span></div>
	<div class="bubble_middle"><span id="bubble_tooltip_content">Content is comming here as you probably can see.Content is comming here as you probably can see.</span></div>
	<div class="bubble_bottom"></div>
</div>
          <div class="slide">
		  
					<ul id="third-carousel" class="jcarousel-skin-tango">
			<?
			$j=1;
			// count($arrPhoto);
			if(!empty($arrPhoto))
			{
			foreach($arrPhoto as $key => $value){
			
			
			
			?>
			
			<!--<a href="#" onmousemove="showToolTip(event,'This is a simple, simple test');return false" onmouseout="hideToolTip()">A word</a>-->
				<!--<li><img src="images/img1.jpg" /></li>-->
				
				<?
				$tvalue =nl2br(trim($value['photo_desc']));
			//	$tvalue =str_replace("<br />","",$tvalue);
				
				$tvalue =str_replace("\r\n","",$tvalue);
	// echo htmlentities($tvalue);
				?>

				<li><a href="#" onMouseOver="showToolTip(event,'<? echo $tvalue ?>');return false" onMouseOut="hideToolTip()"><img onClick="check('<?=$value['photo_id']?>');" src="site/site-admin/upload/<?=$value['photo_name']?>" alt="" width="65px" height="90px" /></a></li>
				<? 
								
			} }
			?>

	</ul>
		
		
<!--            <div class="arrow_left"><a href="#"><img src="images/arrow_left.jpg" alt="" width="28" height="29" border="0" /></a></div>
			
			
		
			<? //if(count($arrPhoto)>3){?>
			<div class="gallery-nav">
			<a href="#" id="gallery-next">Next<img src="images/arrow_right.jpg" alt="" width="28" height="29" border="0" /></a>
			</div>
			<? //}?>-->
			
		  </div>
        </div>
		
		
		<div style="display: none; left: 113px; top: 109px; " id="bubble_tooltip">
	<div class="bubble_top"><span></span></div>

	<div class="bubble_middle"><span id="bubble_tooltip_content">This is the content of the tooltip. This is the content of the tooltip.</span></div>
	<div class="bubble_bottom"></div>
</div>

		
		
		
        <div class="curves">
          <div class="curveleft"><img src="images/curve3.gif" alt="" /></div>
          <div class="curveright"><img src="images/curve4.gif" alt="" /></div>
        </div>
      </div>
    </div>
    <div id="column-right">
      <div class="player"><img src="images/player.jpg" alt="" /></div>
      <div class="shadow">&nbsp;</div>
      <div class="sample"><a href="samplebooks_trailAccount.php"><img src="images/free_sample.jpg" alt="" border="0" /></a></div>
	  <div class="sample"><a href="contact_fusion_books.php"><img src="images/contact1.jpg" alt="" border="0" /></a></div>
    </div>
  </div>
</div>
<? include('footer.php');?>

<script>

function change_desc(img_id)
{
	//alert(img_id);
}

</script>




</body>
