<?
ob_start();
include_once 'classes/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/database.class.php';
//include_once 'classes/page.class.php';

$objU		=	new user();
//$objP		=	new page();
$page			= isset($_REQUEST['page'])		? $_REQUEST['page'] 	: 1;
$plimit			= isset($_REQUEST['plimit'])	? $_REQUEST['plimit'] 	: 1;
 $id		=	$_GET['id'];
 
 
 
$arrprint	=	$objU->listprinting_publishing();


$arrlist	=	$objU->getprinting($id);
$arrPublish	=	$objU->getonline_publishing($id);

/*$searchcount	=	$objU->count_printing();
$pcount			= $objP->getPagerData($searchcount,$plimit,$page);	
	$cpage   		= $pcount['page'];		
	$offset 		= $pcount['offset'];  	
	$limit  		= $pcount['limit']; 	
	$totpage  		= $pcount['numPages']; */
	
$list		=	$objU->listonline_publish($id);
$page_name="viewonline.php";
$paging		=	$objU->listNavLinks($id,$page_name);

//print_r($paging);


/*$offset=0;$limit=1;
$eu = ($page - 0); 
$limit = 1;                                 // No of records to be shown per page.
$this1 = $eu + $limit; 
 $back = $eu - $limit; 
$next = $eu + $limit; */


/*$query2=" SELECT * FROM printing_publishing order by  print_id ASC ";
$result2=mysql_query($query2);
//echo mysql_error();
$nume=mysql_num_rows($result2);*/

//*/count($list);
/*if (!(isset($page)))
{
$page = 1;
} 
 $rows	=	$searchcount;
$page_rows = 1; 
$last = ceil($rows/$page_rows); 
if ($page < 1)
{
$page = 1;
}
elseif ($page > $last)
{
$page = $last;
} 
 $max = 'limit ' .($page - 1) * $page_rows .',' .$page_rows;
 */

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
	  <?
	  /*$qry	=	"select * from printing_publishing order by print_id ASC ";
	  $result	=	mysql_query($qry);
	  while($list = mysql_fetch_array($result))
		{
	 $qid	=	$list['print_id'];
	 $que	=	$list['question'];
	 $ans	=	$list['answer'];*/
		
		
	  if(!empty($list)){
	  foreach($list as $key=>$value)
	  {
 	 $qid	=	$value['yearbook_id'];
	  $que	=	$value['question'];
	 $ans	=	$value['answer'];
	 
	
	/*else
	{
	$que	=	$value['question'];
	 $ans	=	$value['answer'];
	}*/
	  ?>
	   <div class="dotbox">
	  <p><b><?=$que;?></b></p>
      <p style="width:450px;"><?=$ans;?></p>
	   </div>
	 <? }
	 }?> 
	 <p>
	<? echo $paging;

	?>
</p>
<div class="dotline" ></div>
<br /><br />
	<?  /*for($i=1;$i<=$totpage;$i++) { ?>
		  <? if($i==$page) { ?>
		  <?  echo $i; 
		  } 
		  else { 
		   ?>
		   <a href="viewAns.php?page=<?=$i?>&plimit=<?=$plimit?>&id=<?=$id?>"><? echo $i;?></a>
		   <? } ?>
		   &nbsp; 
		  <? } */?>
	  
	  <p class="question"><img src="images/question.jpg" alt="We are here to answer all your questions" title="We are here to answer all your questions" hspace="5" align="right" />
	  <? if(!empty($arrPublish)){
	  foreach($arrPublish as $key=>$value)
	  { ?>
	  
	   <a href="viewonline.php?id=<?=$value['yearbook_id'];?>"><?=$value['question'];?></a><br />
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
	  <a href="#Q17">What happens if we get stuck? Or have a question?</a></p>-->
	  
	  
	  <div class="dotline"></div>
	 
	 
    </div>
    <div id="column-right">
      <div class="sample"><a href="samplebooks_trailAccount.php"><img src="images/free_sample.jpg" alt="Free Sample Book &amp; Trial account" border="0" /></a></div>
	  <div class="sample"><a href="request_quote.php"><img src="images/request.jpg" alt="Contact Fusion Books" border="0" /></a></div>
    </div>
  </div>
</div>
<? include('footer.php');?>
</body>

