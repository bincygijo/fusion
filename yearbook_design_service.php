<?
ob_start();
include_once 'classes/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/database.class.php';
$objU		=	new user();
$arrQusetion	=	$objU->getquestion();

 $q1	= $arrQusetion[0]['question_id'];
 $q2	=   $arrQusetion[1]['question_id'];
  $q3	=   $arrQusetion[2]['question_id'];
   $q4	=   $arrQusetion[3]['question_id'];
//print_r($arrQusetion);
if(isset($_POST['add']))
{

 $question1		=	$_REQUEST['question1'];
 $ans1		=	$_POST['ans1'];
 $question2		=	$_REQUEST['question2'];
 $ans2		=	$_POST['ans2'];
 $question3		=	$_REQUEST['question3'];
 $ans3		=	$_POST['ans3'];
 $question4		=	$_REQUEST['question4'];
 $ans4		=	$_POST['ans4'];
 $question5		=	$_REQUEST['question5'];
 $ans5		=	$_POST['ans5'];
 
 $question6		=	$_REQUEST['question6'];
 $ans6		=	$_POST['ans6'];
 $question7		=	$_REQUEST['question7'];
 $ans7		=	$_POST['ans7'];
 $question8		=	$_REQUEST['question8'];
 $ans8		=	$_POST['ans8'];
 $question9		=	$_REQUEST['question9'];
 $ans9		=	$_POST['ans9'];
 
 
 
 if($question1 && $ans1)
 {
$qry	=	$objU->addquestion($question1,$ans1);
 }
 if($question2 && $ans2)
 {
$qry	=	$objU->addquestion($question2,$ans2);
 }
 if($question3==3 && $ans3)
 {
$qry	=	$objU->addquestion($question3,$ans3);
 
 }

 if($question4==4  && $ans4)
 {
$qry	=	$objU->addquestion($question4,$ans4);
 
 }
 if($question5==5 && $ans5)
 {
$qry	=	$objU->addquestion($question5,$ans5);
 
 }
  if($question6==6 && $ans6)
 {
$qry	=	$objU->addquestion($question6,$ans6);
 
 }
  if($question7==7 && $ans7)
 {
$qry	=	$objU->addquestion($question7,$ans7);
 
 }
  if($question8==8 && $ans8)
 {
$qry	=	$objU->addquestion($question8,$ans8);
 
 }
  if($question9==9 && $ans9)
 {
$qry	=	$objU->addquestion($question9,$ans9);
 
 }
 

  $msg	=	"Successfully inserted!";

}

 /*$ans1	=	$objU->getanswer(1);
 $ans2	=	$objU->getanswer(2);
  $ans3	=	$objU->getanswer(3); 
  $ans4	=	$objU->getanswer(4);
   $ans5	=	$objU->getanswer(5);
   
    $ans6	=	$objU->getanswer(6);
	 $ans7	=	$objU->getanswer(7);
	  $ans8	=	$objU->getanswer(8);
	   $ans9	=	$objU->getanswer(9);
	    $ans10	=	$objU->getanswer(10);
		  $ans11	=	$objU->getanswer(11);
		    $ans12	=	$objU->getanswer(12);
			  $ans13	=	$objU->getanswer(13);*/
//print_r($ans1);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="Fusion Books, Fusion Books - School Yearbooks, Graduation Books, Yearbooks, Services, Online Yearbooks System, Fusion Book's online system, Yearbook Express, Yearbook Planner, Printing and Publishing, Custom School Diaries, Calendars, School Newsletters, Prospective,  Annual Report, School Reports, Autograph Books, Yearbooks, School Newsletters, Primary School Graduation Books, High School Graduation Books, Leaver's Books, Profile Books, " />
<meta name="keywords" content="Yearbook, Yearbook Printing, Graduation Books, Sports Club Yearbooks, School Yearbooks, Uni's &amp; Colleges, Workspace, Book Features, Yearbook Pricing, Yearbook Gallery, Yearbook Ideas, Article Page Ideas, Photo Page Ideas, Profile Page Ideas, How to Snap like a Pro, Front Cover Ideas, Yearbook Quotes, Quotes, Lesson Plans and Ideas, FAQ, Free Lesson Plans, Embossing, Hard-Covers, Gloss or matt laminate, UV Varnish and Spot UV Varnish, Dust-jackets, Foil binding, Durable wire-binding, standard binding, Cleat-binding, high quality yearbook, Full-Colour printing" />
<title>Fusion Books : Yearbook Design Services</title>
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
      <h1>Yearbook <span>Design Services </span></h1>
      <p>Fusion Books specialises in yearbook design and print.</p>
      <p>Our yearbook design team will work with your school to capture its image and personality in a stylish and high quality yearbook. You can have as much or as little input as you like in this process which always has great results.</p>
      <p>If you want a quote and free sample book <a href="contact_fusion_books.php"><b>Contact Us</b></a>.</p>
	  
	  <div align="center"><img src="images/fairfield.jpg" alt="High Quality Yearbooks" title="High Quality Yearbooks" /> <img src="images/classmates.jpg" alt="Remember your classmates" title="Remember your classmates" /> <img src="images/boys.jpg" alt="A book that will be cherished forever" title="A book that will be cherished forever" /></div>
	  
	  <form id="form1" name="form1" method="post" action="">
	  <p class="head" style="font-size:17px;">Fusion Books Premium Design Service</p>
	  <? if($msg!=''){ ?>
          <p style="margin: 0px; padding:0 0 10px 130px; font-family:Tahoma, Arial, Helvetica, sans-serif;font-weight: bold; color:#FF0000"><? echo $msg;?><? } ?></p>
	  <p><strong>FAQ: What do we need to provide Fusion Books to design our yearbook?</strong></p>
	  <p><strong>1.</strong> Fill out the Design Questionnaire (below) which helps us to get a feel for the style of book you require.<br /> 
	    <!--<label><input type="text" name="ans" class="questfield" value="" /><input type="hidden" name="question" value="" /></label>-->
	  </p>
	  <p><strong>2.</strong> You will be provided with a thumb drive with a series of numbered folders. Add the content you would like included on each page in an individual file. Try to get the rough order of pages although they can be changed later.  Be sure to include: </p>
	  <p><blockquote><strong>a. </strong>The page title <br />
        <strong>b.</strong> Photos <br />
        <strong>c.</strong> Any photo captions you want to include. <br />
        <strong>d.</strong> High quality School logo.<br />
		</blockquote>
      <!--<label><input type="text" name="ans1" class="questfield"  /><input type="hidden" name="question1" value="" /></label>-->
	  </p>
	  <p><strong>3.</strong> If you have had class and individual photo&rsquo;s taken by a professional photographer you can send them to us on a CD or whatever format they have provided you with.<br />
	    <!--<label><input type="text" name="ans3" class="questfield"  value=""/><input type="hidden" name="question3" value="" /></label>-->
	  </p>
	  <p><strong>4.</strong> Include additional photos in the &ldquo;Extra Photos&rdquo; folder. Our designers can use these to fill any gaps in the book.<br /> 
	    <!--<label><input type="text" name="ans4" class="questfield" value="" /><input type="hidden" name="question4" value="" /></label>-->
	  </p>
	  <p><strong>Tip: 	Include the highest quality photos possible to ensure your yearbook looks great. </strong></p>
	  <p class="head" style="font-size:17px;">Fusion Books&rsquo; Design Questionnaire</p>
	  <p>If you are ready to get your yearbook started with Fusion Books, fill out the form below to help our design team create you a great yearbook:</p>
	  <p><strong>1. </strong>When would you like your yearbooks delivered?<br />
	    <label>
	    <textarea name="ans1" class="questfield"></textarea><input type="hidden" name="question1" value="<?=$arrQusetion[0]['question_id'];?>" />
	    </label>
	  </p>
	  <p><strong>2.</strong>What are your schools colour(s). Are there any other colours you would like used or that need to be avoided?<br />
	    <label>
		<textarea name="ans2" class="questfield"></textarea><input type="hidden" name="question2" value="<?=$arrQusetion[1]['question_id'];?>" />
		</label>
	  </p>
	  <p><strong>3.</strong> Do you have any theme ideas or concepts you would like in your yearbook?<br />
	    <label>
		<textarea name="ans3" class="questfield"></textarea><input type="hidden" name="question3" value="<?=$arrQusetion[2]['question_id'];?>" />
		</label>
	  </p>
	  <p><strong>4.</strong> List the things that make your school unique. What are things about your school that your staff and students feel proud of? Please list and try and take photos of these elements.<br />
	    <label>
		<textarea name="ans4" class="questfield"></textarea><input type="hidden" name="question4" value="<?=$arrQusetion[3]['question_id'];?>" />
		</label>
	  </p>
	  <p><strong>5. </strong>Does your school have a mission statement or motto?<br />
	    <label>
		<textarea name="ans5" class="questfield"></textarea><input type="hidden" name="question5" value="<?=$arrQusetion[4]['question_id'];?>" />
		</label>
	  </p>
	  <p><strong>6.</strong> What overall style do you want your yearbook to have, what should be &ldquo;the look and feel&rdquo;? (e.g. Calming, energetic, happy, trendy, informal, simple, elegant, bright, neutral, colourful, modern etc). Do you have any specific design elements in mind?<br />
	    <label>
		<textarea name="ans6" class="questfield"></textarea><input type="hidden" name="question6" value="<?=$arrQusetion[5]['question_id'];?>" />
		</label>
	  </p>
	  <p><strong>7. </strong>Do you have any ideas for your front-cover design? Please describe.<br />
	    <label>
		<textarea name="ans7" class="questfield"></textarea><input type="hidden" name="question7" value="<?=$arrQusetion[6]['question_id'];?>" />
		</label>
	  </p>
	  <p><strong>8.</strong> Have you seen any yearbook pages that you really like? (eg. Your schools&rsquo; past yearbook or another schools&rsquo; yearbook. If possible please post us a copy or scan your favourite pages).<br />
	    <label>
		<textarea name="ans8" class="questfield"></textarea><input type="hidden" name="question8" value="<?=$arrQusetion[7]['question_id'];?>" />
		</label>
	  </p>
	  <p><strong>9.</strong> Please write any comments or ideas you think might be helpful for our designers! Include any additional information such as your schools motto  that you would like included in the book.<br />
	    <label>
		<textarea name="ans9" class="questfield"></textarea><input type="hidden" name="question9" value="<?=$arrQusetion[8]['question_id'];?>" />
		</label>
	    <br /><br />
	    <label>
	    <input type="submit" name="Submit" value="Submit" class="subutton" style="cursor:pointer" /><input type="hidden" name="add" value="Submit" />
	    </label>
	  </p>
	  
      </form>
    </div>
    <div id="column-right">
      <div class="sample"><a href="samplebooks_trailAccount.php"><img src="images/free_sample.jpg" alt="Free Sample Book & Trial account" border="0" /></a></div>
	  <div class="sample"><a href="request_quote.php"><img src="images/request.jpg" alt="Contact Fusion Books" border="0" /></a></div>
    </div>
  </div>
</div>
<? include('footer.php');?>
</body>
</html>
