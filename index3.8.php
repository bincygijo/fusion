<? 
ob_start();
include_once 'classes/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/database.class.php';
$objU		=	new user();
$arrPhoto		=	$objU->viewPhoto();
$arrPhoto1		=	$objU->viewPhoto1();
$arrNews		=	$objU->listnews();
// print_r($arrPhoto);
	
$page='home';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="Fusion Books, Fusion Books - School Yearbooks, Graduation Books, Yearbooks, Services, Online Yearbooks System, Fusion Book's online system, Yearbook Express, Yearbook Planner, Printing and Publishing, Custom School Diaries, Calendars, School Newsletters, Prospective,  Annual Report, School Reports, Autograph Books, Yearbooks, School Newsletters, Primary School Graduation Books, High School Graduation Books, Leaver's Books, Profile Books, " />
<meta name="keywords" content="Yearbook, Yearbook Printing, Graduation Books, Sports Club Yearbooks, School Yearbooks, Uni's &amp; Colleges, Workspace, Book Features, Yearbook Pricing, Yearbook Gallery, Yearbook Ideas, Article Page Ideas, Photo Page Ideas, Profile Page Ideas, How to Snap like a Pro, Front Cover Ideas, Yearbook Quotes, Quotes, Lesson Plans and Ideas, FAQ, Free Lesson Plans, Embossing, Hard-Covers, Gloss or matt laminate, UV Varnish and Spot UV Varnish, Dust-jackets, Foil binding, Durable wire-binding, standard binding, Cleat-binding, high quality yearbook, Full-Colour printing" />
<meta name="Identifier-URL" content="http://www.fusionbooks.com.au/" />
<meta name="robots" content="index, follow" />
<meta name="Distribution" content="Global" />
<meta name="revisit-after" content="2days" />
<meta name="Language" content="eng" />
<title>Fusion Books: School Yearbooks, Graduation Books and Yearbook Printing</title>
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
	
	<script type="text/javascript">

jQuery(document).ready(function() {
    // Initialise the first and second carousel by class selector.
	// Note that they use both the same configuration options (none in this case).
	jQuery('.first-and-second-carousel').jcarousel(
	{
	scroll:1
	
	}
	);
	
	jQuery('#third-carousel').jcarousel({
      
		scroll:4
    });
});

</script>
	
	
<script language="javascript" type="text/javascript">
function openWin(URL){aWindow=window.open(URL,"theWindow","height=380,width=540,left=200,top=100,scrollbars=yes");}
</script>

<!--<link rel="stylesheet" type="text/css" href="ddlevelsfiles/ddlevelsmenu-base.css" />
<script type="text/javascript" src="ddlevelsfiles/ddlevelsmenu.js"></script>
-->

</head>
<body>

<div id="container">
  <? include('header.php');?>
  
  <div id="banner">
    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="596" height="265" bgcolor="#000000">
      <param name="movie" value="images/index.swf">
      <param name="quality" value="high">
      <param name="menu" value="false">
      <param name="wmode" value="transparent">
      <embed src="images/index.swf" width="596" height="265" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" bgcolor="#000000" menu="false" wmode="transparent"></embed>
    </object>
  </div>
  <div id="middle-part">
    <div id="column-left">
      <div class="login">
        <div class="top"><img src="images/curve_top.gif" alt="Login" /></div>
        <div class="middle">
          <h2><img src="images/icon.jpg" alt="User Login" align="left" /> &nbsp; User <span>login</span></h2>
          <form id="form2" name="form2" method="post" action="">
		  <label>
            <input type="text" name="username" id="username" class="textfield" value="Username" onclick="javascript:clearUsername();" onmouseover="javascript:clearUsername();" onblur="javascript:fillUsername();" onmouseout="javascript:fillUsername();"  /></label>
			<label>
            <input type="password" name="pass" id="pass" class="textfield" value="Password"  onclick="javascript:clearPass();" onmouseover="javascript:clearPass();" onblur="javascript:fillPass();" onmouseout="javascript:fillPass();" /></label>
           <label> <input type="image" src="images/submit.gif" alt="Submit"  name="submit" />
			<input type="hidden" name="submit" value="" /></label>
			<br />
            <div style="margin-top:10px;"><a href="samplebooks_trailAccount.php">Register now</a> <a href="#">Forgot Password?</a></div>
          </form>
        </div>
        <div class="botton"><img src="images/curve_bottom.gif" alt="Login User" /></div>
      </div>
      <div class="latest">
        <div class="top"><img src="images/curve_top.gif" alt="News" /></div>
        <div class="middle">
          <h2><img src="images/icon1.jpg" alt="Latest News" align="left" /> &nbsp; Latest <span>news</span></h2>
             <? 
		  if(!empty($arrNews))
		  {
		  foreach($arrNews as $key=>$value)
		  {
		 	$news		=	$value['news_name'];
			 $news_latest		=	substr($news,0,200);
			$date		=	$value['news_date'];
			$arrdate =	explode('-',$date);
			//print_r($arrdate);
			$day	=	$arrdate[2];
			$month	= $arrdate[1];
			$year	= $arrdate[0];
			
			$tstamp=mktime(0,0,0,$month,$day,$year); 
			$mon		=	date("M",$tstamp); 
			$M		=	date('M',$month);
			$CM		=	date('M-d-Y',$date); 
			$arrDate	=		explode('-',$date);
			$da			=	$arrDate[2]."-".$arrDate[1]."-".$arrDate[0]
		  ?>
           <p><strong><? echo $news_latest; ?> ...</strong></p>
		   <p><strong><? echo $mon."&nbsp;".$day.","."&nbsp;".$year;?></strong></p>
            <? }}?>
			 <p>  <a href="viewNews.php">View all..</a></p>
        </div>
        <div class="botton"><img src="images/curve_bottom.gif" alt="News Latest" /></div>
      </div>
    </div>
    <div id="column-center">
      <h1>Yearbooks Made <span>Easy!</span></h1>
      <p>Looking for an easy way to create a stylish yearbook? Welcome to Fusion Books. We can cater to all needs and budgets and now offer three great ways to create your yearbook:<em></em></p>
      <div class="highlite"><a href="online_yearbook_system.php"><img src="images/easyway.jpg" alt="Want an easy way?" border="0" /></a><a href="yearbook_express.php"><img src="images/notime.jpg" alt="No Time?" border="0" /></a><a href="printing_and_publishing.php"><img src="images/already_started.jpg" alt="Already Started?" border="0" /></a></div>
      <div id="aussie">
        <div class="curves">
          <div class="curveleft"><img src="images/curve1.gif" alt="Aussie" /></div>
          <div class="curveright"><img src="images/curve2.gif" alt="Aussie schools" /></div>
        </div>
        <div class="middle-area">
		
          <h2>Aussie schools choose <span>Fusion Books...</span></h2>
		  
        <!--  <div class="testmonial">-->
		<!--  <ul id="screen">
		<li><a id="left" href="javascript:void(0);"><img src="images/arrow_left.jpg" alt="Move Left" border="0" /></a></li>-->
            <!--<div class="arrow"></div>-->
          <!--  <div class="message">-->
           
		<? 
		/*$count	=	  count($arrPhoto1);
		 if(!empty($arrPhoto1))
			{
			foreach($arrPhoto1 as $key => $val){
			 $des	=	$val['description'];
		 $des1	=		ereg_replace('"', "", $des);
			*/
			
			
				
			
			?>
			<!-- <ul id="second-carousel" class="first-and-second-carousel jcarousel-skin-ie7">-->
		<!--<ul id="screen">
		
		<li><a id="left" href="javascript:void(0);"><img src="images/arrow_left.jpg" alt="Move Left" border="0" /></a></li>-->
		<?
	/*	echo $count	=	  count($arrPhoto);
		if(!empty($arrPhoto))
			{
			foreach($arrPhoto as $key => $val){
			 $des	=	$val['description'];
		 $des1	=		ereg_replace('"', "", $des);
			*/
			
			?>
			<!--<li>
			<? ?>
			<span class="quotes">&ldquo;</span><strong style="font-size:11px;"><? echo $des1;?></strong><span class="quotes">&rdquo;</span>-->
			<? //}}?>
			
		<!--	</li></ul>-->
			
			<!--<p id="rateType_item"><span class="quotes">&ldquo;</span><? //if($count==0){?>in the 12 years I have been resposible for year<br />
                book creation this has definitely been the easiest<br />
                and most enjoyable...<br />
                <strong>Lycee Condorcet The French School of Sydney</strong> <? //}else{echo $des1;} ?><span class="quotes">&rdquo;</span>
              </p>-->
              
                
		
			
          
			<!--	<li><a id="right" href=""><img src="images/arrow_right.jpg" alt="Move Right" border="0" /></a></li>	
			</ul>-->
			<!--</div>-->
        <!--  </div>-->
		  
		 <div id="bubble_tooltip">
	<div class="bubble_top"><span></span></div>
	<div class="bubble_middle"><span id="bubble_tooltip_content">Content is comming here as you probably can see.Content is comming here as you probably can see.</span></div>
	<div class="bubble_bottom"></div>
</div>
          <div class="slide">
		  
		<ul id="screen">
		<li><a id="left" href="javascript:void(0);"><img src="images/arrow_left.jpg" alt="Move Left" border="0" /></a></li>
		
		<li id="view">
			<ul id="images">
			<?
			
			$count	=	  count($arrPhoto);
			$i	=0;
			$j	=0;
			if($count>=0) {
			if(!empty($arrPhoto))
			{
			foreach($arrPhoto as $key => $value){
			
			
			?>
						
			<?
			//echo $arrPhoto[0][1];
			///echo $arrPhoto[0][2];
			  $des	=	$value['description'];
		 	$des1	=		ereg_replace('"', "", $des);
			
			$d		=	substr($des1,0,125);
			$photo_name		=	$value['photo_name'];
				$tvalue =nl2br(trim($value['photo_desc']));
			//	$tvalue =str_replace("<br />","",$tvalue);
				$tvalue =str_replace("\r\n","",$tvalue);
				$school_name		=	$value['school_name'];
				
				
				$info = getimagesize('site/site-admin/upload/'.$value['photo_name']);
				$width=$info[0];
				$height=$info[1];
				
				if(($width>$height) || ($width==$height))
				{
					$img_dimn='width:90px; max-height:90px;';
					
				}
				else
				{
					$img_dimn='height:90px; max-width:90px;';
					
				}

				?>
				
				<li>
				<div style="clear:none; float:left; width:325px;">
				
				<div style="float:right; width: 30px; height:80px; margin:0; padding:0;"> 
				<a href="#" onmouseover="showToolTip(event,'<? echo $tvalue ?>');return false" onmouseout="hideToolTip()">
				 <img style="vertical-align:top;<?= $img_dimn; ?>" src="site/site-admin/upload/<?=$value['photo_name']?>" alt="" /></a></div>
				 <div style="clear:left; float:left; width:200px;"><span class="quotes">&ldquo;</span><? echo $des1;?><span class="quotes">&rdquo;</span></div>
				 <div style="clear:left; float:left; width:200px; text-align:right;"><? echo $school_name;?></div>
				</div>
				
				
				<input type="hidden" value="<?=$des1?>" name="photo_id_h" id="photo_id_h<?=$j?>" />
				<input type="hidden" value="<?=$count?>" name="count_id" id="count_id" />
				</a></li>
			<?
			$j++;
			 }?>	
			
				
				 
					
		<?	} }else{?>
			<li><img  src="images/front_cover8.jpg" alt="" width="65px" height="90px" border="0" /></li>	<? }?>
			</ul>
		</li>
			
		<li><a id="right" href=""><img src="images/arrow_right.jpg" alt="Move Right" border="0" /></a></li>
	
	</ul>
			
		  </div>
        </div>
		
		
		<div style="display: none; left: 113px; top: 109px; " id="bubble_tooltip">
	<div class="bubble_top"><span></span></div>

	<div class="bubble_middle"><span id="bubble_tooltip_content">This is the content of the tooltip. This is the content of the tooltip.</span></div>
	<div class="bubble_bottom"></div>
</div>

		
		
		
        <div class="curves">
          <div class="curveleft"><img src="images/curve3.gif" alt="choose Fusion Books" /></div>
          <div class="curveright"><img src="images/curve4.gif" alt="user-friendly" /></div>
        </div>
      </div>
    </div>
    <div id="column-right">
      <div class="player">
	  <object width="238" height="175">
  <param name="movie" value="http://www.youtube.com/v/J4TAubkM5xY&hl=en&fs=1&" />
  <param name="allowFullScreen" value="true" />
  <param name="allowscriptaccess" value="always" />
  <param name="bgcolor" value="#F5F5F5" />
  <embed src="http://www.youtube.com/v/J4TAubkM5xY&hl=en&fs=1&" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="238" height="175" bgcolor="F5F5F5" style="display:block;"> </embed>
</object></div>
      <div class="shadow">&nbsp;</div>
      <div class="sample"><a href="samplebooks_trailAccount.php"><img src="images/free_sample.jpg" alt="Free Sample Book &amp; Trial account" border="0" /></a></div>
	  <div class="sample"><a href="contact_fusion_books.php"><img src="images/contact1.jpg" alt="Contact Fusion Books" border="0" /></a></div>
    </div>
  </div>
</div>
<? include('footer.php');?>

<script type="text/javascript">

function clearUsername()
			{
				
				document.getElementById("username").value = "";
			}
			
			function fillUsername()
			{
				
				var doc = document.getElementById("username").value ;
				
				if(doc == "")
					document.getElementById("username").value = "Username";
			}




function clearPass()
			{
				
				document.getElementById("pass").value = "";
			}
			
			function fillPass()
			{
				
				var doc = document.getElementById("pass").value ;
				
				if(doc == "")
					document.getElementById("pass").value = "Password";
			}

</script>

</body>
</html>
