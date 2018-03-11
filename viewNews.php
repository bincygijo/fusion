<?php
ob_start();
include_once 'classes/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/database.class.php';
$objU		=	new user();
$arrNews		=	$objU->listallnews();
?>
 


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="Fusion Books, Fusion Books - School Yearbooks, Graduation Books, Yearbooks, Services, Online Yearbooks System, Fusion Book's online system, Yearbook Express, Yearbook Planner, Printing and Publishing, Custom School Diaries, Calendars, School Newsletters, Prospective,  Annual Report, School Reports, Autograph Books, Yearbooks, School Newsletters, Primary School Graduation Books, High School Graduation Books, Leaver's Books, Profile Books, " />
<meta name="keywords" content="Yearbook, Yearbook Printing, Graduation Books, Sports Club Yearbooks, School Yearbooks, Uni's &amp; Colleges, Workspace, Book Features, Yearbook Pricing, Yearbook Gallery, Yearbook Ideas, Article Page Ideas, Photo Page Ideas, Profile Page Ideas, How to Snap like a Pro, Front Cover Ideas, Yearbook Quotes, Quotes, Lesson Plans and Ideas, FAQ, Free Lesson Plans, Embossing, Hard-Covers, Gloss or matt laminate, UV Varnish and Spot UV Varnish, Dust-jackets, Foil binding, Durable wire-binding, standard binding, Cleat-binding, high quality yearbook, Full-Colour printing" />
<title>Fusion Books : Latest News</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/style_dropdown.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/ddlevelsmenu-base.css" />

<script type="text/javascript" src="js/drop.js"></script>
<script type="text/javascript" src="js/ddlevelsmenu.js"></script>

<script language="JavaScript">

function showContent(id){
//alert(id);
if(document.getElementById("content_"+id).style.display=="none"){
document.getElementById("image_"+id).src="images/open.png";
document.getElementById("content_"+id).style.display="block";
}else{
document.getElementById("image_"+id).src="images/close.png";
document.getElementById("content_"+id).style.display="none";
}

}
</script>
</head>
<body id="body_bg">
<div id="container">
  
     <?php include('header.php');?>
  <div id="banspace">&nbsp;</div>
  <div id="middle-part">
  
    <div id="content_inner">
      <h1>Latest <span>News</span></h1>
	  <br />
	  <div class="result">
	  <table width="100%" border="0" cellspacing="0" cellpadding="5">
	  <tr class="head">
	  <td align="left">Title</td>
	  <td></td>  	  	
	   <td></td>
	  
	  </tr>
  		<tr>
		<?php if(!empty($arrNews))
		{
		foreach($arrNews as $key=>$value)
		{
		$date	=	$value['news_date'];
	$arrDate	=		explode('-',$date);
	$da	=	$arrDate[2]."-".$arrDate[1]."-".$arrDate[0];
	$id		=	$value['news_id'];
	
		?>
		<td><div ><img src="images/close.png" width="45" align="absmiddle" height="45" id="image_<?php echo $id;?>"/><? php echo $value['news_title'];?></div> </td>
    	 <td><a href="javascript:void(0);" onclick="javascript:showContent(<?php echo $id;?>);">Read&nbsp;More</a><?C //=$value['news_name'];?></td>
		 
		 <tr>
  	     <td width="500"><div id="content_<?php echo $id;?>" style="display:none;"><span class="head">Description:</span><?php echo $value['news_name']?>
		 
		 <p><span class="head">Date:</span><strong><?php echo $da?></strong></p>
		
		 
	
		 
		  </div><?php //=$da;?></td>
		  
		  <td>&nbsp;</td>
		  </tr>
  		 
		 
  		</tr><?php }
		 }else
		 {
		 ?>
		  <tr class="rowcolor2">
                                          <td colspan="6" class="tbtext"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td  align="center"><font color="#FF0000">No Records Found!</font></td>
                                                <td align="right">&nbsp;</td>
                                              </tr>
                                            </table></td>
                                        </tr><?php }?>
	 </table>
	 
	
	 </div>

      <!--<div class="result">
	  	<a href="#">Yearbook 2009</a><br />	  
      	A popular and effective way to create a yearbook cover is to stage a design contest
	  </div>
	  <div class="result">
	  	<a href="#">Yearbook 2009</a><br />	  
      	A popular and effective way to create a yearbook cover is to stage a design contest
	  </div>
	  <div class="result">
	  	<a href="#">Yearbook 2009</a><br />	  
      	A popular and effective way to create a yearbook cover is to stage a design contest
	  </div>-->
	  
    </div>
    <div id="column-right">
      <div class="sample"><a href="samplebooks_trailAccount.php"><img src="images/free_sample.jpg" alt="Free sample Book &amp; Trial account" border="0" /></a></div>
	  <div class="sample"><a href="request_quote.php"><img src="images/request.jpg" alt="Contact Fusion Books" border="0" /></a></div>
    </div>
  </div>
</div>
<?php include('footer.php');?>

</body>
</html>
