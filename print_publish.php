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
     <!-- <h1><span>FAQ</span></h1>-->
	  
	  
	  
	  <!--<p class="head"><u><a href="print_publish.php">General questions about Yearbook Printing and Publishing</a></u></p>
	  <p>Come across a term during your yearbook or graduation book production and want to find out exactly what it mean&hellip; this is a yearbook glossary that that translates yearbook jargon into plain English!</p>
	  <p class="head"><u>Questions about Fusion Books Online Yearbook System</u></p>
	  <p>Have a question about the Fusion Books Online Yearbook system- your answer should be found in here- if not give one of our friendly staff a buzz or email. </p>-->
	  <h1><span>General questions about Yearbook Printing and Publishing</span></h1>
	  <p style="width:450px;">Have a question about yearbook or graduation book printing and publishing?
	   Below are some questions we are asked frequently that may be able to provide you with your answer. Otherwise contact us and one of our friendly staff can help you out.</p>
	  <p class="question"><img src="images/question.jpg" alt="We are here to answer all your questions" title="We are here to answer all your questions" hspace="5" align="right" />
	  <br /><br />
	  <? if(!empty($arrPublish)){
	  foreach($arrPublish as $key=>$value)
	  { ?>
	  
	   <a href="viewAns.php?id=<?=$value['print_id'];?>"><?=$value['question'];?></a><br />
	<?  }
	  
	  }
	  ?>
	  <!--<a href="#Q1">I have been hearing a lot about Fusion Books, how does Fusion Books save time?</a><br />
	  <a href="#Q2">What kind of paper stock do you use?</a><br />
	  <a href="#Q3">Are there any computer requirements? Do I have to download any software?</a><br />
	  <a href="#Q4">Our media class usually creates our yearbook. Are they still able to contribute?</a><br />
	  <a href="#Q5">How much does a Fusion Book cost?</a><br />
	  <a href="#Q6">What is the best Internet Broswer to use?</a><br />
	  <a href="#Q7">Who owns copyright in the Fusion Book?</a><br />
	  <a href="#Q8">Is there a certain layout we have to follow?</a><br />
	  <a href="#Q9">When do we pay?</a><br />
	  <a href="#Q10">What type of pages can we have in our book?</a><br />
	  <a href="#Q11">Is there a minimum order?</a><br />
	  <a href="#Q12">Is the Fusion Books site secure? How do you protect the privacy of the images?</a><br />
	  <a href="#Q13">Our students would like to create a Graduation Book although they cannot afford it. Do you have any suggestions?</a><br />
	  <a href="#Q14">What is the difference between a yearbook and a Graduation Book?</a><br />
	  <a href="#Q15">Do we have to pay to use the software?</a><br />
	  <a href="#Q16">Do we get a proof of our book before printing?</a><br />
	  <a href="#Q17">What happens if we get stuck? Or have a question?</a>--></p>
	  
	  
	  <!-- <div class="dotline"></div>
      <p><b><a name="Q1" id="Q1"></a>What is a yearbook?</b></p>
      <p>A yearbook is often an annual publication produced by schools, sports clubs and businesses to commemorate the events of the year. They often include a message from the principal, staff and students and are used to celebrate the schools achievements, community spirit and special events throughout the year. </p>
     <ul class="list">
        <li>Reordering pages in your book? Simply drag and drop.</li>
        <li>Need people to contribute? Add their email address or print an invitation.</li>
        <li>Need a proof copy? Click <span class="quotes">&lsquo;</span>Preview Book<span class="quotes">&rsquo;</span> and have a high-quality PDF proof.</li>
        <li>Formatting? Choose from an array of artist designed layouts.</li>
        <li>Contents page? Auto-created!<br />
        ...Fusion Books has been designed to save you time.</li>
      </ul>
	  <div class="dotline"></div>
      <p><b><a name="Q2" id="Q2"></a>What is a graduation book?</b></p>
      <p>Graduation Books are typically used for the graduating class from primary school, high-school or university to capture their memories and great times in a special book that most people keep forever.</p>
	  <div class="dotline"></div>
      <p><b><a name="Q3" id="Q3"></a>What is the difference between a yearbook and a Graduation Book?</b></p>
      <p>In a school environment yearbooks are typically used to commemorate a year of the entire school, while Graduation Books are created to reflect upon the years at school of the graduating class.</p>
	  <div class="dotline"></div>
      <p><b><a name="Q4" id="Q4"></a>We are designing our yearbook at school, in what format should we send it to Fusion Books?</b></p>
      <p>Send your completed file in its ‘raw’ format (for example as a Publisher Document (.pub), Indesign Document (.indd) or Word Document (.doc / .docx) and as a PDF. If you need instructions for your specific requirements call us and speak to one of our friendly staff.</p>
	  <div class="dotline"></div>
      <p><b><a name="Q5" id="Q5"></a>What is GSM?</b></p>
      <p>GSM (technically ‘grams per square meter’) is a measure of the thickness of your inside paper or cover. Typically the thicker the paper the higher-quality your book will feel. Fusion Books soft-cover books are typically printed with 150 gsm inside pages and 350 gsm cover. The exception is a very large book (over 150 pages) where it may be preferable to have a thinner stock to prevent having an old-school encyclopaedia.
If you want to have a look at Fusion’s high-quality stock, request  our free sample book.</p>
	  <div class="dotline"></div>
      <p><b><a name="Q6" id="Q6"></a>What is bleed?</b></p>
      <p>Bleed is the (3mm) area around the perimeter of your page that will be cut-off during the trimming process. When designing your book you should continue your design for 3mm beyond the perimeter of your page (for example an A4 book should be 216 mm X 303 mm).</p>
	  <div class="dotline"></div>
      <p><b><a name="Q7" id="Q7"></a>What is crop-marks?</b></p>
      <p>With Fusion Books you don’t have to worry about adding in ‘crop-marks’, as we will do this for you. Although when designing (in Fusion Books  online system or any other program) always ensure you leave a 1.5cm around the perimeter of the page free from faces and text. This will not only provide a more professional look, but will prevent faces and text from being cut-off in the binding or in the crop-marks. 
However, this  does not mean you cannot have design patterns and backgrounds in the 1.5cm perimeter, in fact this is encouraged</p>
	  <div class="dotline"></div>
      <p><b><a name="Q8" id="Q8"></a>What is resolution?</b></p>
      <p>The resolution of an image refers to the images quality. Always use the best quality images you have available. If you are using our Premium Design Service, send your images through to us in the format that comes straight off your camera.</p>
	  <div class="dotline"></div>
      <p><b><a name="Q9" id="Q9"></a>What is the difference between gloss or matt paper?</b></p>
      <p>Fusion Books typically uses gloss paper for our yearbooks. It has a shiny, bright appearance like a magazine. However, you can also request matt paper, which is typically used for a more ‘earthy’ and textured book.</p>
	  <div class="dotline"></div>
      <p><b><a name="Q10" id="Q10"></a>What is the difference between offset and digital printing?</b></p>
      <p>Digital printing is used for smaller quantities of yearbooks  (approximately any orders below 500 copies) and offset printing is used for large quantities of yearbooks (above 500 copies). When more copies are ordered it becomes more cost-effective per book ordered. </p>
	  <div class="dotline"></div>
      <p><b><a name="Q11" id="Q11"></a>What does laminate mean? </b></p>
      <p>All Fusion’s premium soft-cover yearbooks come with a gloss or matt laminate cover. The laminate is a protective covering on the cover of your book that will help to preserve the book over time. It also provides an attractive finishing to your book.</p>
	  <div class="dotline"></div>
      <p><b><a name="Q12" id="Q12"></a>s one page two sides of a page?</b></p>
      <p>“One page” is considered one printed side of the page. For example a 50 page book is 25 leafs of paper.</p>
	  <div class="dotline"></div>
      <p><b><a name="Q13" id="Q13"></a>What kind of paper stock do you use?</b></p>
      <p>All our books are printed on high-quality 150 gram paper. Our soft covers are printed on premium 300 GSM gloss-laminate stock. Large orders are printed using offset printing, while smaller orders are printed using digital printing technology.</p>
	  <div class="dotline"></div>
      <p><b><a name="Q14" id="Q14"></a>What size do your yearbooks come in?</b></p>
      <p>Most yearbooks and graduation books are printed as an A4 book (210 mm X 297 mm). Some schools choose to design the yearbook themselves or use our Premium Design Service and create an A5 book or even a square book.</p>
	  <div class="dotline"></div>
      <p><b><a name="Q15" id="Q15"></a>How much does a Fusion Book cost?</b></p>
      <p>We guarantee our prices are competitive. All our prices include full-access to the Fusion Books system throughout the year, printing and delivery. Prices depend on the number of pages in your book and the number of copies ordered. We offer a variety of options to suit your budget. Contact us to obtain a quote.</p>
	  <div class="dotline"></div>
      <p><b><a name="Q16" id="Q16"></a>Who owns copyright in the Fusion Book?</b></p>
      <p>You must ensure you have the rights for all content included in your Fusion Book. Copyright in the content lies with the person who created the image or took the photograph. Copyright of the page designs lies with Fusion Books</p>
	  <div class="dotline"></div>
      <p><b><a name="Q17" id="Q17"></a>When do we pay?</b></p>
	  
	 <ol>
        <li>Use your free trial account, with no commitment to order.</li>
        <li>Pay your deposit to gain full access to Fusion Books&rsquo; system and book in your printing and delivery dates.</li>
        <li>Give out log in details to staff and students who can then start uploading photos and content.</li>
        <li>Download a full copy of your book via the <span class="quotes">&lsquo;</span>Preview Book<span class="quotes">&rsquo;</span> button. With your schools&rsquo; editing committee check over your book and make any changes necessary.</li>
        <li>When you are ready to print click <span class="quotes">&lsquo;</span>Book Now<span class="quotes">&rsquo;</span> on the <span class="quotes">&lsquo;</span>Home<span class="quotes">&rsquo;</span> menu.</li>
        <li>Get your stylish books delivered to your school on time. And make the final payment on delivery.</li>
      
      </ol>
	  
	  <div class="dotline"></div>
      <p><b><a name="Q16" id="Q16"></a>What is the difference between inc. GST and ex. GST (or + GST)?</b></p>
      <p>GST (Goods and Services Tax) is a 10% tax added to the total cost of your books (ex. GST). Most schools are able to claim this tax back from the government and may be able to lower the cost of the yearbooks and graduation books by charging the students the price (ex. GST).  For example, if the price is displayed as: 
$10 (excl. GST) which is the same as $11 (inc. GST)
You may be able to charge the students $10 per book and the school will be able to pay the $1 per book GST as they may be able to claim this back.</p>

 <div class="dotline"></div>
      <p><b><a name="Q16" id="Q16"></a>Is there a minimum order?</b></p>
      <p>The minimum order is $600. Small schools have found it is more cost effective to combine their Yearbook and Graduation Book into one book.</p>
	  <div class="dotline"></div>
      <p><b><a name="Q16" id="Q16"></a>What is the production timeline?</b></p>
      <p>Fusion Books typically allows 1 month between the Editors’ deadline and your Delivery date. This allows time to print, laminate and finish your books, as well as deliver the books to your school. As soon as you have paid your deposit we can book in your printing and delivery dates.</p>
	  <div class="dotline"></div>
      <p><b><a name="Q16" id="Q16"></a>Is the ‘deposit’ an additional charge on top of the cost of our books?</b></p>
      <p>No, your deposit is subtracted from the total cost of your books. With Fusion Books you only pay for the number of books you order, there are no other set-up charges or fees.</p>
	  <div class="dotline"></div>
      <p><b><a name="Q16" id="Q16"></a>Where are your clients based?</b></p>
      <p>Fusion Books is able to service schools throughout Australia- we have schools from metropolitan Sydney and Melbourne to remote schools in the Northern Territory.</p>
	  <div class="dotline"></div>
      <p><b><a name="Q16" id="Q16"></a>Our students would like to create a Graduation Book although they cannot afford it. Do you have any suggestions?</b></p>
      <p>Local businesses may be willing to sponsor your yearbook. To recognise their contribution you could set aside a page to display their logo and contact details.</p>

	   <div class="dotline"></div>
	   <br />
	  
       <h1><span>Questions about Fusion Books Online Yearbook System</span></h1>
       <p>Fusion Books offers three great ways to create your yearbooks and Graduation Books:</p>
       <ol>
         <li class="question"><a href="#">Fusion Books easy to use online system</a> </li>
         <li class="question"><a href="#">Fusion Books premium design service</a></li>
         <li class="question"><a href="#">Fusion Books Printing Service</a></li>
       </ol>
       <p>Fusion Books online system is a particularly popular option for Graduation Books (also known as Profile Books, Leavers Books and Year 12 Yearbooks). Click on a link below to have some of your questions answers: </p>
       
	   <p class="question"><? /*if(!empty($arronline)){
	  foreach($arronline as $key=>$value)
	  { ?>
	  
	   <a href="viewonline.php?id=<?=$value['yearbook_id'];?>"><?=$value['question'];?></a><br />
	<?  }
	  
	  }*/
	  ?></p>
	  
	  <p><a name="Q1" id="Q1"></a><b>I have been hearing a lot about Fusion Books, how does Fusion Books save time?</b></p>
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
      <p>Give us a buzz on <strong>1800 637 515</strong> or <a href="contact_fusion_books.php"><b>Contact Us</b></a></p>
      <div class="dotline"></div>
     <p>If you have another question visit <a href="contact_fusion_books.php"><b>Contact Us</b></a></p>-->
   <div class="dotline"></div> </div>
	
    <div id="column-right">
      <div class="sample"><a href="samplebooks_trailAccount.php"><img src="images/free_sample.jpg" alt="Free Sample Book &amp; Trial account" border="0" /></a></div>
	  <div class="sample"><a href="request_quote.php"><img src="images/request.jpg" alt="Contact Fusion Books" border="0" /></a></div>
    </div>
  </div>
</div>
<? include('footer.php');?>
</body>

