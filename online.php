<? 
ob_start();
include_once 'classes/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/database.class.php';
$objU		=	new user();
$arrPhoto		=	$objU->viewPhoto();
$arrPhoto1		=	$objU->viewPhoto1();
$arrNews		=	$objU->listnews();
//print_r($arrNews);
$page='home';
?>



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
				margin: 0 8px 0 8px;
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


</script>

<!--<link rel="stylesheet" type="text/css" href="ddlevelsfiles/ddlevelsmenu-base.css" />
<script type="text/javascript" src="ddlevelsfiles/ddlevelsmenu.js"></script>
-->
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
		  <? 
		  if(!empty($arrNews))
		  {
		  foreach($arrNews as $key=>$value)
		  {
		 $news		=	$value['news_name'];
			$news_latest		=	substr($news,0,33);
		  	$date		=	$value['date'];
	$arrdate =	explode('-',$date);
	//print_r($arrdate);
	$day	=	$arrdate[2];
	$month	= $arrdate[1];
	 $m	=	date("M", strtotime($month));
	$year	= $arrdate[0];
	
echo 	$year = date("Y", $date);
echo $month = date("M", $date);
		$arrDate	=		explode('-',$date);
	$da	=	$arrDate[2]."-".$arrDate[1]."-".$arrDate[0]
		  ?>
          <p><strong><? echo $news_latest; ?> ...</strong></p>
		   <p><strong><? echo $da;?></strong></p>
            <? }}?>
          <p>  <a href="viewNews.php">View all..</a></p>
        </div>
        <div class="botton"><img src="images/curve_bottom.gif" alt="" /></div>
      </div>
    </div>
    <div id="column-center">
      <h1>Yearbooks Made <span>Easy!</span></h1>
      <p>Looking for an easy way to create a stylish yearbook? Welcome to Fusion Books. We can cater to all needs and budgets and now offer three great ways to create your yearbook:<em></em></p>
      <div class="highlite"><img src="images/easyway.jpg" alt="" /><img src="images/notime.jpg" alt="" /><img src="images/already_started.jpg" alt="" /></div>
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
             <!-- <ul id="second-carousel" class="first-and-second-carousel jcarousel-skin-ie7">-->
		<?  
		$count	=	  count($arrPhoto1);
		if(!empty($arrPhoto1))
			{
			
			foreach($arrPhoto1 as $key => $val){
			 $des	=	$val['description'];
		 $des1	=		ereg_replace('"', "", $des);
			
			 }}?>
			
			<!--<li>-->
			<? ?>
		<!--	<p id="rateType_item"><span class="quotes">&ldquo;</span>in the 12 years I have been resposible for year<br />
                book creation this has definitely been the easiest<br />
                and most enjoyable...<span class="quotes">&rdquo;</span>.<br />
                <strong>Lycee Condorcet The French School of Sydney</strong> </p>-->
				
			<p id="rateType_item"><span class="quotes">&ldquo;</span><? if($count==0){?>in the 12 years I have been resposible for year<br />
                book creation this has definitely been the easiest<br />
                and most enjoyable...<br />
                <strong>Lycee Condorcet The French School of Sydney</strong> <? }else{echo $des1;} ?><span class="quotes">&rdquo;</span>
               </p>
                
			
			<!--<p id="rateType_item"><span class="quotes">&ldquo;</span><strong style="font-size:11px;"> <? //echo $des1;?></strong><span class="quotes">&rdquo;</span> </p>-->
			
			
			<!--</li></ul>-->
           </div>
						
			
			
          </div>
		  
		 <div id="bubble_tooltip">
	<div class="bubble_top"><span></span></div>
	<div class="bubble_middle"><span id="bubble_tooltip_content">Content is comming here as you probably can see.Content is comming here as you probably can see.</span></div>
	<div class="bubble_bottom"></div>
</div>
          <div class="slide">
		  
		<ul id="screen">
		<li><a id="left" href="javascript:void(0);"><img src="images/arrow_left.jpg" alt="" border="0" /></a></li>
		
		<li id="view">
			<ul id="images">
			<?
			$count	=	  count($arrPhoto);
			$i	=0;
			$j	=0;
			if($count>0) {
			if(!empty($arrPhoto))
			{
			foreach($arrPhoto as $key => $value){
			
			
			?>
						
			<?
			$id		=	$value['photo_id'];
			 $des	=	$value['description'];
		 	$des1	=		ereg_replace('"', "", $des);
			$photo_name		=	$value['photo_name'];
				$tvalue =nl2br(trim($value['photo_desc']));
			//	$tvalue =str_replace("<br />","",$tvalue);
				
				$tvalue =str_replace("\r\n","",$tvalue);
	// echo htmlentities($tvalue);
	
				?>
						

				<li><a href="#" onMouseOver="showToolTip(event,'<? echo $tvalue ?>');return false" onMouseOut="hideToolTip()"><img  src="site/site-admin/upload/<?=$value['photo_name']?>" alt="" width="65px" height="90px" />
				
				<input type="hidden" value="<?=$des1?>" name="photo_id_h" id="photo_id_h<?=$j?>" />
				<input type="hidden" value="<?=$count?>" name="count_id" id="count_id">
				</a></li>
			<?
			$j++;
			 }?>	
			
				
				 
					
		<?	} } else{?>
		<li><img  src="images/front_cover8.jpg" alt="" width="65px" height="90px" border="0" /></li>	<? }?>
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
      <div class="player"><object width="238" height="173" bgcolor="#F5F5F5">
  <param name="movie" value="http://www.youtube.com/v/J4TAubkM5xY&hl=en&fs=1&"> </param>
  <param name="allowFullScreen" value="true"></param>
  <param name="allowscriptaccess" value="always"> </param>
  <embed src="http://www.youtube.com/v/J4TAubkM5xY&hl=en&fs=1&" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="238" height="172" bgcolor="#F5F5F5"></embed>
</object></div>
      <div class="shadow">&nbsp;</div>
      <div class="sample"><a href="samplebooks_trailAccount.php"><img src="images/free_sample.jpg" alt="" border="0" /></a></div>
	  <div class="sample"><a href="request_quote.php"><img src="images/request.jpg" alt="" border="0" /></a></div>
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
