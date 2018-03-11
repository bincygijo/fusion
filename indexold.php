<? 
ob_start();

/*$HostName="localhost";
 	$UserName="root";
 	$Password="";
 	$DatabaseName="fusionbooks";*/
include_once 'classes/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/database.class.php';
$objU		=	new user();
$arrPhoto		=	$objU->viewPhoto();
//print_r($arrPhoto);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fusion Books</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/style_dropdown.css" type="text/css" />
<link rel="stylesheet" href="css/bubble-tooltip.css" type="text/css" />

<script type="text/javascript" src="script/drop.js"></script>


<script type="text/javascript" src="js/bubble-tooltip.js"></script>
<!--<script type="text/javascript" src="js/tools.js"></script>
-->
	<script type="text/javascript" src="js/jquery.js"></script>
	<!--<script type="text/javascript" src="js/jquery.lightbox-0.5.pack.js"></script>-->
	<!--<script type="text/javascript" src="js/common.js"></script>-->
	<!--<script type="text/javascript" src="js/swfobject.js"></script>-->
	<!--/*<script type="text/javascript" src="js/jquery.jcarousel.pack.js"></script>*/-->
	
		<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="js/jquery.scrollTo-min.js"></script>
	<script type="text/javascript" src="js/jquery.scrollShow.js"></script>	
	<script type="text/javascript">
	jQuery(function( $ ){
		//borrowed from jQuery easing plugin
		//http://gsgd.co.uk/sandbox/jquery.easing.php
		$.easing.backout = function(x, t, b, c, d){
	
			var s=1.70158;
			return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
		};
		
		$('#screen').scrollShow({
			view:'#view',
			content:'#images',
			easing:'backout',
			wrappers:'link,crop',
			navigators:'a[id]',
			navigationMode:'sr',
			circular:true,
			start:0
		});
	 });
	</script>
	<style type="text/css">
		#screen{
			width:406px;
			padding:0;
			margin:0;
		}			
			#screen li{
				float:left;
				list-style:none;
			}
			#screen li a {
				margin:35px 0 0 0;
				padding:0;
			}
			#screen .jq-ss-crop{
				margin: 0 7px 0 7px;
				float:left;
				display: inline;
			}
				#left,#right{
					/*margin-top:40px;*/
					display:block;
				}
			#view{
				margin:0px;
				width:340px;
				height: 120px;
				overflow:hidden;
			}
				#images{
					width:3818px !important;
					width:3822px;
					padding:0;
					margin: 0;
				}
					#images li img{
						border: 1px solid #DADBD5;
						width: 90px;
						height: 80px;
						padding: 4px;
						float: left
					}
	</style>
	
	<SCRIPT LANGUAGE="JavaScript">
function openWin(URL){aWindow=window.open(URL,"theWindow","height=380,width=540,left=200,top=100,scrollbars=yes");}
</SCRIPT>
<script language="javascript">
var str	=	document.getElementById("view").value;
//alert(str);
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

</head>
<body>
<div id="container">
  <? //include('header.php');?>
  <div id="main-nav">
    <div class="left"><img src="images/nav_left.jpg" alt="" /></div>
    <ul id="sddm">
      <li><a href="index.php">Home</a></li>
      <li><img src="images/pipe.gif" alt="" /></li>
      <li>
	  	<a href="services.php" onmouseover="mopen('m1')" onmouseout="mclosetime()">Services</a>
		
		<div id="m1" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
			<label><img src="images/menu_curve_top.gif" alt="" align="top" /></label>
			
			<a href="online_yearbook_system.php"><img src="images/bullet.gif" alt="" />Online Yearbook System</a>
			<label style="padding-left:15px;"><img src="images/dash.gif" alt="" /></label>
			
			<a href="printing_and_publishing.php"><img src="images/bullet.gif" alt="" />Yearbook Printing and Publishing</a>
			<label style="padding-left:15px;"><img src="images/dash.gif" alt="" /></label>
			
			<a href="yearbook_express.php"><img src="images/bullet.gif" alt="" />Yearbook Express</a>
			<label style="padding-left:15px;"><img src="images/dash.gif" alt="" /></label>
			
			<a href="yearbook_design_service.php"><img src="images/bullet.gif" alt="" />Yearbook Design Service</a>
			<label><img src="images/menu_curve_bottom.gif" alt="" align="absbottom" /></label>
			
			
		</div>
	 </li>
  
	
      <li><img src="images/pipe.gif" alt="" /></li>
      <li><a href="#" onmouseover="mopen('m2')" onmouseout="mclosetime()">YearbookTypes</a>
	  <div id="m2" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
	  <label ><img src="images/menu_curve_top.gif" alt="" align="top" /></label>
	  
			<a href="primary_school_graduation-books.php"><img src="images/bullet.gif" alt="" />Primary School Graduation Books</a>
			<label style="padding-left:15px;"><img src="images/dash.gif" alt="" /></label>
			
			<a href="high_school_graduation_books.php"><img src="images/bullet.gif" alt="" />High School Graduation Books</a>
			<label style="padding-left:15px;"><img src="images/dash.gif" alt="" /></label>
			
			<a href="sports_club_yearbooks.php"><img src="images/bullet.gif" alt="" />Sports Club Yearbooks</a>
			<label style="padding-left:15px;"><img src="images/dash.gif" alt="" /></label>
			
			<a href="school_yearbooks.php"><img src="images/bullet.gif" alt="" />School Yearbooks</a>
			<label style="padding-left:15px;"><img src="images/dash.gif" alt="" /></label>
			
			<a href="#"><img src="images/bullet.gif" alt="" />Uni's & Colleges</a>
			<label style="padding-left:15px;"><img src="images/dash.gif" alt="" /></label>
			
			<a href="#"><img src="images/bullet.gif" alt="" />Workplaces</a>
			<label ><img src="images/menu_curve_bottom.gif" alt="" align="absbottom" /></label>	</div>
	  </li>
	  
      <li><img src="images/pipe.gif" alt="" /></li>
      <li><a href="book_features.php">BookFeatures</a></li>
      <li><img src="images/pipe.gif" alt="" /></li>
      <li><a href="yearbook_pricing.php">YearbookPricing</a></li>
      <li><img src="images/pipe.gif" alt="" /></li>
      <li><a href="yearbook_gallery.php">YearbookGallery</a></li>
	  
      <li><img src="images/pipe.gif" alt="" /></li>
      <li><a href="yearbook_ideas.php" onmouseover="mopen('m3')" onmouseout="mclosetime()">YearbookIdeas</a>
	  <div id="m3" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
	  <label ><img src="images/menu_curve_top.gif" alt="" align="top" /></label>
	  
			<a href="yearbook_article_page_ideas.php"><img src="images/bullet.gif" alt="" />Yearbook Article Page Ideas</a>
			<label style="padding-left:15px;"><img src="images/dash.gif" alt="" /></label>
			
			<a href="yearbook_photo_page_ideas.php"><img src="images/bullet.gif" alt="" border="0"/>Yearbook Photo Page Ideas</a>
			<label style="padding-left:15px;"><img src="images/dash.gif" alt="" /></label>
			
			<a href="snap_like_pro.php"><img src="images/dot.gif" alt="" />How to Snap like a Pro</a>
			<label style="padding-left:15px;"><img src="images/dash.gif" alt="" /></label>
			
			<a href="yearbook_profile_page_ideas.php"><img src="images/bullet.gif" alt="" />Profile Page Ideas</a>
			<label style="padding-left:15px;"><img src="images/dash.gif" alt="" /></label>
			
			<a href="yearbook_front_cover_ideas.php"><img src="images/bullet.gif" alt="" />Yearbook Front-Cover Ideas</a>
			<label style="padding-left:15px;"><img src="images/dash.gif" alt="" /></label>
			
			<a href="yearbook_quotes.php"><img src="images/bullet.gif" alt="" />Yearbook Quotes</a>
			<label style="padding-left:15px;"><img src="images/dash.gif" alt="" /></label>
			
			<a href="lesson_plans_and_ideas.php"><img src="images/bullet.gif" alt="" />Lesson Plans and Ideas</a>		
			<label ><img src="images/menu_curve_bottom.gif" alt="" align="absbottom" /></label>
			</div>
	  </li>
	  
      <li><img src="images/pipe.gif" alt="" /></li>
      <li><a href="faq.php">FAQ</a></li>
    </ul>
    <div class="right"><img src="images/nav_right.jpg" alt="" /></div>
  </div>
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
            <div class="arrow"></div>
            <div class="message">
              <p id="rateType_item">&quot;in the 12 years I have been resposible for year<br />
                book creation this has definitely been the easiest<br />
                and most enjoyable...&quot;.<br />
                <strong>Lycee Condorcet The French School of Sydney</strong></p>
            </div>
          </div>
		  
		 
          <div class="slide">
		  
		<ul id="screen">
		<li><a id="left" href="javascript:void(0);"><img src="images/arrow_left.jpg" alt="" border="0" /></a></li>
		<li id="view">
			<ul id="images">
			<?
			
			$i	=0;
			// count($arrPhoto);
			if(!empty($arrPhoto))
			{
			foreach($arrPhoto as $key => $value){
			
			
			?>
						
				<?
				$tvalue =nl2br(trim($value['photo_desc']));
			//	$tvalue =str_replace("<br />","",$tvalue);
				
				$tvalue =str_replace("\r\n","",$tvalue);
	// echo htmlentities($tvalue);
				?>

				<li><a href="#" onmouseover="showToolTip(event,'<? echo $tvalue ?>');return false" onmouseout="hideToolTip()"><img onclick="check('<?=$value['photo_id']?>');" src="site/site-admin/upload/<?=$value['photo_name']?>" alt="" width="65px" height="90px" /></a></li>
				
				
				
				
				<? 
				$i++;	
			} }
			?>
			</ul>
		</li>
		
		<li ><a id="right" href=""><img src="images/arrow_right.jpg" alt="" border="0" /></a></li>
		
	</ul>
		
		
<!--            <div class="arrow_left"><a href="#"><img src="images/arrow_left.jpg" alt="" width="28" height="29" border="0" /></a></div>
			
			
			<?
			
			
		/*	$j=1;
			// count($arrPhoto);
			if(!empty($arrPhoto))
			{
			foreach($arrPhoto as $key => $value){*/
		
			
			?>
			<div class="picture"><img src="site/site-admin/upload/<?=$value['photo_name']?>" alt="" width="95px" height="90px" /></div>
			<? 
		
			/*if($j%3=='0')
			
			{ echo '</li><li>'; }
			$j++;*/
		//	} }
			?>
			
			
			<? //if(count($arrPhoto)>3){?>
			<div class="gallery-nav">
			<a href="#" id="gallery-next">Next<img src="images/arrow_right.jpg" alt="" width="28" height="29" border="0" /></a>
			</div>
			<? //}?>-->
			
		  </div>
        </div>
		
		
		<div style="display: none; left: 113px; top: 109px;" id="bubble_tooltip">
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
      <div class="sample"><a href="#"><img src="images/free_sample.jpg" alt="" border="0" /></a></div>
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
</html>

