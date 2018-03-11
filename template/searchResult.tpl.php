<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fusion Books</title>
<link rel="stylesheet"  href="css/style.css" type="text/css" />
</head>
<body id="body_bg">
<div id="container">
  
     <? include('header.php');?>
  <div id="banspace">&nbsp;</div>
  <div id="middle-part">
  
    <div id="content_inner">
      <h1>Search <span>Results</span></h1>
	  <br />
	  <div class="result">
	  <table width="100%" border="0" cellspacing="0" cellpadding="5">
	  <tr class="head">
	  <td>School</td>  	  	
	   <td>Name</td>
	    <td>Suburb</td>
		 <td>State</td>
	  </tr>
  		<tr>
		<? if(!empty($arrSearch))
		{
		foreach($arrSearch as $key=>$value)
		{
		?>
    	 <td><?=$value['school'];?></td>
  	     <td><?=$value['name'];?></td>
  		 <td><?=$value['substreet'];?></td>
  		 <td><?=$value['state'];?></td>
		 
  		</tr><? }
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
                                        </tr><? }?>
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
      <div class="sample"><a href="samplebooks_trailAccount.php"><img src="images/free_sample.jpg" alt="" border="0" /></a></div>
	  <div class="sample"><a href="contact_fusion_books.php"><img src="images/request.jpg" alt="" border="0" /></a></div>
    </div>
  </div>
</div>
<? include('footer.php');?>

</body>
</html>
