<? 
ob_start();

$HostName="localhost";
 	$UserName="root";
 	$Password="";
 	$DatabaseName="fusionbooks";
//include_once '../config/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/database.class.php';
$objU		=	new user();
$list		=	$objU->viewPhoto();


//print_r($arrPhoto);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fusion Books</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/style1.css" type="text/css" />
<link rel="stylesheet" href="css/jquery.lightbox-0.5.css" type="text/css" />


<link rel="stylesheet" href="css/style_dropdown.css" type="text/css" />
<script type="text/javascript" src="script/drop.js"></script>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.lightbox-0.5.pack.js"></script>
	<script type="text/javascript" src="js/common.js"></script>
	
	<script type="text/javascript" src="js/jquery.jcarousel.pack.js"></script>
</head>
<body>
<div id="container">
  <? include('header.php');?>
  <div id="main-nav">
    <div class="left"><img src="images/nav_left.jpg" alt="" /></div>
    <ul id="sddm">
      <li><a href="index.php">Home</a></li>
      <li><img src="images/pipe.gif" alt="" /></li>
      <li>
	  	<a href="services.php" onmouseover="mopen('m1')" onmouseout="mclosetime()">Services</a>
		
		<div id="m1" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
			<label><img src="images/menu_curve_top.gif" alt="" align="top" /></label>
			
			<a href="#"><img src="images/bullet.gif" alt="" />Online Yearbook System</a>
			<label style="padding-left:15px;"><img src="images/dash.gif" alt="" /></label>
			
			<a href="printing_and_publishing.php"><img src="images/bullet.gif" alt="" />Yearbook Printing and Publishing</a>
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
			<label ><img src="images/menu_curve_bottom.gif" alt="" align="absbottom" /></label>	</div>
	  </li>
	  
      <li><img src="images/pipe.gif" alt="" /></li>
      <li><a href="#">BookFeatures</a></li>
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
			
			<a href="#"><img src="images/dot.gif" alt="" />How to Snap like a Pro</a>
			<label style="padding-left:15px;"><img src="images/dash.gif" alt="" /></label>
			
			<a href="yearbook_profile_page_ideas.php"><img src="images/bullet.gif" alt="" />Profile Page Ideas</a>
			<label style="padding-left:15px;"><img src="images/dash.gif" alt="" /></label>
			
			<a href="yearbook_front_cover_ideas.php"><img src="images/bullet.gif" alt="" />Yearbook Front-Cover Ideas</a>
			<label style="padding-left:15px;"><img src="images/dash.gif" alt="" /></label>
			
			<a href="#"><img src="images/bullet.gif" alt="" />Yearbook Quotes</a>
			<label style="padding-left:15px;"><img src="images/dash.gif" alt="" /></label>
			
			<a href="#"><img src="images/bullet.gif" alt="" />Lesson Plans and Ideas</a>		
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
      <p>Looking for an easy way to create a stylish yearbook? Welcome to Fusion Books. Our simple and Flexible online system- means you can create a great yearbook, even if you have had no computer or design experience. We are here to make your job easy.</p>
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
              <p>&quot;in the 12 years I have been resposible for year<br />
                book creation this has definitely been the easiest<br />
                and most enjoyable...&quot;.<br />
                <strong>Lycee Condorcet The French School of Sydney</strong></p>
            </div>
          </div>
		  <div class="main" id="main-gallery" style="display: block; z-index: 150;">

         <div class="container gallery-container">
<?php 
//$_SESSION["userid"] ='';


	 if(count($list)>3){ ?>	
		<div class="gallery-nav">
			<a href="#" id="gallery-previous"><img src="images/arrow-left.gif" alt="Previous" id="left-arrow" /> &nbsp; Previous</a>
			<a href="#" id="gallery-next">Next  <img src="images/arrow-right.gif" alt="Next" /> </a>
		</div>
	<?php  } ?>
		<div class="thumbs">
			<ul id="slides" class="jcarousel-skin" >
			<li>
			<?php  
			$j=1;
			if(!empty($list))
			{
			foreach($list as $key => $value){
		
			
				
			
		
			?>
			<!--	<a href="site/site-admin/upload/<?=$value['photo_name']?>" rel="lightbox[gallery]">-->
		
			<img src="site/site-admin/upload/<?=$value['photo_name']?>" alt="" width="65px" height="90px"/>
			</a>
			<?php
			//echo $j;
		
			
				/*if($j%3=='0')
				
				{ echo '</li><li>'; }
			$j++;*/
				} }
			?>
			</ul>
		</div>
<?php 
?>
	</div>
	
	
        </div>
		</div>
		
		<div class="side" id="side-gallery" style="display: block; z-index: 150;">
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
	  <div class="sample"><a href="contact_fusion_books.php"><img src="images/request.jpg" alt="" border="0" /></a></div>
    </div>
  </div>
</div>
<? include('footer.php');?>
</body>
</html>

<SCRIPT LANGUAGE="JavaScript">
function openWin(URL){aWindow=window.open(URL,"theWindow","height=380,width=540,left=200,top=100,scrollbars=yes");}
</SCRIPT>
