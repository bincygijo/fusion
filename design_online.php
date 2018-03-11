<?
ob_start();
include_once 'classes/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/database.class.php';
$objU		=	new user();
$arrPublish	=	$objU->listprinting_publishing();
$arronline	=	$objU->listonline();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="Fusion Books, Fusion Books - School Yearbooks, Graduation Books, Yearbooks, Services, Online Yearbooks System, Fusion Book's online system, Yearbook Express, Yearbook Planner, Printing and Publishing, Custom School Diaries, Calendars, School Newsletters, Prospective,  Annual Report, School Reports, Autograph Books, Yearbooks, School Newsletters, Primary School Graduation Books, High School Graduation Books, Leaver’s Books, Profile Books, " />
<meta name="keywords" content="Yearbook, Yearbook Printing, Graduation Books, Sports Club Yearbooks, School Yearbooks, Uni’s &amp; Colleges, Workspace, Book Features, Yearbook Pricing, Yearbook Gallery, Yearbook Ideas, Article Page Ideas, Photo Page Ideas, Profile Page Ideas, How to Snap like a Pro, Front Cover Ideas, Yearbook Quotes, Quotes, Lesson Plans and Ideas, FAQ, Free Lesson Plans, Embossing, Hard-Covers, Gloss or matt laminate, UV Varnish and Spot UV Varnish, Dust-jackets, Foil binding, Durable wire-binding, standard binding, Cleat-binding, high quality yearbook, Full-Colour printing" />
<title>Fusion Books : FAQ</title>
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
    
	  
	  
       <h1><span>Questions about Fusion Books Online Yearbook System</span></h1>
       <p>Fusion Books offers three great ways to create your yearbooks and Graduation Books:</p>
       <ol>
         <li class="question"><!--<a href="#">-->Fusion Books easy to use online system<!--</a> --></li>
         <li class="question"><!--<a href="#">-->Fusion Books premium design service<!--</a>--></li>
         <li class="question"><!--<a href="#">-->Fusion Books Printing Service<!--</a>--></li>
       </ol>
       <p style="width:450px;">Fusion Books online system is a particularly popular option forGraduation Books (also known as Profile Books, Leavers Books and Year 12 Yearbooks). Click on a link below to have some of your questions answers: </p>
	   <br /><br />
       
	   <p class="question"><? if(!empty($arronline)){
	  foreach($arronline as $key=>$value)
	  { ?>
	  
	   <a href="viewonline.php?id=<?=$value['yearbook_id'];?>"><?=$value['question'];?></a><br />
	<?  }
	  
	  }
	  ?></p>
	  
	 <!-- <p><a name="Q1" id="Q1"></a><b>I have been hearing a lot about Fusion Books, how does Fusion Books save time?</b></p>
      <p>Every aspect of Fusion Books has been designed to be quick and fun, while ensuring only the highest quality product.</p>
      <ul class="list">
        <li>Reordering pages in your book? Simply drag and drop.</li>
        <li>Need people to contribute? Add their email address or print an invitation.</li>
        <li>Need a proof copy? Click &lsquo;Preview Book&rsquo; and have a high-quality PDF proof.</li>
        <li>Formatting? Choose from an array of artist-designed layouts.</li>
        <li>Contents page? Auto-created!</li>
      </ul>
      <p>...Fusion Books has been designed to save you time.</p>
      <div class="dotline"></div>
      <p><a name="Q2" id="Q2"></a><strong>I have been given a trial account how do I get started?</strong></p>
      <ol>
        <li>Go to <a href="http://www.fusionbooks.com.au/" target="_blank">www.fusionbooks.com.au</a></li>
        <li>Login with your username and password (supplied by Fusion Books)</li>
        <li>A short video will appear that will give you a guided tour of the Fusion Books system. <br />
          <br />
        If you don&rsquo;t have a trial account contact Fusion Books and we will set you up a free trial account, so you can see for yourself how easy it is to use our online yearbook system.</li>
      </ol>
      <div class="dotline"></div>
      <p><a name="Q3" id="Q3"></a><strong>What is the best Internet Broswer to use?</strong></p>
      <p>Fusion Books works on all browsers. However, we recommend using Mozilla Firefox (this browser also has Spellcheck). If you do not have Mozilla Firefox, it can be downloaded for free at <a href="http://www.mozilla.com/" target="_blank">www.mozilla.com</a></p>
      <div class="dotline"></div>
      <p><a name="Q4" id="Q4"></a><strong>Can I upload multiple images onto the Fusion website?</strong></p>
      <p>Yes, although you need to have a Flash player installed. If you don't have a Flash player go to<br /> 
        <a href="http://get.adobe.com/flashplayer/" target="_blank">http://get.adobe.com/flashplayer/</a> and download a Flash player for free.</p>
      <div class="dotline"></div>
      <p><a name="Q5" id="Q5"></a><strong>Can I upload my own custom backgrounds?</strong></p>
      <p>Yes, after creating the page in the Book Planner:&nbsp;</p>
      <ol>
        <li>Go to the &ldquo;Background&rdquo; tab. </li>
        <li>Scroll to the bottom of the page</li>
        <li>The option for &ldquo;Upload Background Images&rdquo; appear. Click &ldquo;Upload&rdquo; to select the images from your computer. </li>
        <li>If this option does not appear- you probably require a &ldquo;Flash Player&rdquo;- go to <a href="http://get.adobe.com/flashplayer/" target="_blank">http://get.adobe.com/flashplayer/</a> and download a Flash Player for free. </li>
      </ol>
      <div class="dotline"></div>
      <p><a name="Q6" id="Q6"></a><strong>How do I invite new Editors/Contributors?</strong></p>
      <p>Below is a quick tutorial and worksheet on how to invite new users. You can <a href="#">download a copy of the New Users tutorial</a> for your reference or <a href="#">download the New Users Worksheet to hand out to your class</a>. If you don&rsquo;t have your Group Username and Group Password contact Fusion Books.</p>
      <div class="dotline"></div>
      <p><a name="Q7" id="Q7"></a><strong>Can I upload multiple images onto the Fusion system? </strong></p>
      <p>I have attached a sheet that explains how to add Editors and Contributors.</p>
      <div class="dotline"></div>
      <p><a name="Q8" id="Q8"></a><strong>Are there any computer requirements? Do I have to download any software?</strong></p>
      <p>Fusion Books does not require you to download any software. So you can access your book anywhere you can access the Internet. Fusion Books works on both Windows and Macs.</p>
      <div class="dotline"></div>
      <p><a name="Q9" id="Q9"></a><strong>Our media class usually creates our yearbook. Are they still able to contribute?</strong></p>
      <p>We believe Fusion Books makes creating a yearbook or a Graduation book a more manageable task for students. Instead of creating the entire yearbook from scratch, the students can create several pages in PhotoShop or any other design program and upload them as a full-page in the book. These would create interesting feature pages, for example; a collage.</p>
      <div class="dotline"></div>
      <p><a name="Q10" id="Q10"></a><strong>Is there a certain layout we have to follow?</strong></p>
      <p>Not at all. Fusion Books has been designed to be flexible. You can choose which pages to include and their order. You can create your own backgrounds or select backgrounds from our artist designed library.</p>
      <div class="dotline"></div>
      <p><a name="Q11" id="Q11"></a><strong>What type of pages can we have in our book?</strong></p>
      <p>Fusion Books has been especially designed to enable you to easily create Article pages, Photo Pages, Profiles, Passport Photos and Group Photos. You can also &lsquo;create your own&rsquo; page by uploading a full-page image- this is a particularly popular option to create your front-cover.</p>
      <div class="dotline"></div>
      <p><a name="Q12" id="Q12"></a><strong>Is the Fusion Books site secure? How do you protect the privacy of the images?</strong></p>
      <p>We take your privacy very seriously. All accounts are password protected and are hosted in a secure environment. All images are stored securely online via your password protected login and are not shared with any parties external to the yearbook creation process, without your explicit permission.</p>
      <div class="dotline"></div>
      <p><a name="Q13" id="Q13"></a><strong>Do we have to pay to use the software?</strong></p>
      <p>No, you only have to pay for the books you order, access to our system throughout the year is part of the Fusion Books package.</p>
      <div class="dotline"></div>
      <p><a name="Q14" id="Q14"></a><strong>Do we get a proof of our book before printing?</strong></p>
      <p>With Fusion Books your Yearbook committee can have a full-quality preview of your entire book any time you require. Simply click the &lsquo;Preview Book&rsquo; button and you will get a full-quality preview of your book which you can print and proof.</p>
      <div class="dotline"></div>
      <p><a name="Q15" id="Q15"></a><strong>What does upload mean?</strong></p>
      <p>Upload is when you put anything from your computer onto the Internet. For example, if you are using the Fusion Books online system, you can &lsquo;upload&rsquo; your photos onto the Fusion Books system to use in your book.</p>
      <div class="dotline"></div>
      <p><a name="Q16" id="Q16"></a><strong>What does download mean?</strong></p>
      <p>Download is when you take anything down from the Internet. For example, if you are using the Fusion Books online system, you can &lsquo;download&rsquo;&nbsp; a preview of your book for proofing.</p>
      <div class="dotline"></div>
      <p><a name="Q17" id="Q17"></a><strong>What happens if we get stuck? Or have a question?</strong></p>
      <p>Give us a buzz on <strong>1800 637 515</strong> or <a href="contact_fusion_books.php"><b>Contact Us</b></a></p>-->
      <div class="dotline"></div>
      <!--<p>If you have another question visit <a href="contact_fusion_books.php"><b>Contact Us</b></a></p>-->
    </div>
    <div id="column-right">
      <div class="sample"><a href="samplebooks_trailAccount.php"><img src="images/free_sample.jpg" alt="Free Sample Book &amp; Trial account" border="0" /></a></div>
	  <div class="sample"><a href="request_quote.php"><img src="images/request.jpg" alt="Contact Fusion Books" border="0" /></a></div>
    </div>
  </div>
</div>
<? include('footer.php');?>
</body>

