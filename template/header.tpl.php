<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fusion Books</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/style_dropdown.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/ddlevelsmenu-base.css" />

<script type="text/javascript" src="js/drop.js"></script>
<script type="text/javascript" src="js/ddlevelsmenu.js"></script>

<script language="javascript">
  function check()
  {
  var	name =	document.getElementById("name").value;
  alert(name);
  if(document.getElementById("name").value=="")
	  {
	  alert("Enter school or name or email");
	  document.getElementById("name").focus();
	  return false;
  }

  }
  </script>
 
</head>

<div id="header">
    <div id="logo"><img src="images/logo.jpg" alt="Fusion Books" /></div>
    <div id="search">
	<div id="toplins">
        <ul>
          <li><img src="images/online.jpg" alt="" width="31" height="33" /></li>
          <li><a href="#">Online Chat</a></li>
          <li><img src="images/contact.jpg" alt="" width="36" height="36" /></li>
          <li><a href="contact_fusion_books.php">Contact Fusion Books</a></li>
        </ul>
      </div>
      <div id="searchbox">
        <form id="form1" name="form1" method="post" action="search.php">
          <div class="field">
            <input name="name" id="name" type="text" class="textfield" value="" />
			
          </div>
          <div style="float:left;"><input type="image" src="images/search.gif" name="submit" alt="" height="20" width="31" border="0" align="left" onclick="check();"/><!--<img src="images/search.gif" name="submit" alt="" width="31" height="20" border="0" align="left" style="cursor:pointer"/>--> <input type="hidden" name="submit" value=""  />
		  
		   </form>
		  </div>
		 
       
      </div>
    </div>
  </div>
  
  <!--menu section-->
  
  <div id="main-nav">
    <div class="left"><img src="../images/nav_left.jpg" alt="" /></div>
		<ul id="sddm">
		  <li><a href="../index.php">Home</a></li>
		  <li><img src="../images/pipe.gif" alt="" /></li>
		  <li><a rel="Services" href="#">Services</a></li>
		  <li><img src="../images/pipe.gif" alt="" /></li>
		  <li><a rel="Yearbook_Types" href="#">Yearbook Types</a></li>
		  <li><img src="../images/pipe.gif" alt="" /></li>
		  <li><a href="../book_features.php">Book Features</a></li>
		  <li><img src="../images/pipe.gif" alt="" /></li>
		  <li><a href="../yearbook_pricing.php">Yearbook Pricing</a></li>
		  <li><img src="../images/pipe.gif" alt="" /></li>
		  <li><a href="../yearbook_gallery.php">Yearbook Gallery</a></li>
		  <li><img src="../images/pipe.gif" alt="" /></li>
		  <li><a rel="Yearbook_Ideas" href="../yearbook_ideas.php">Yearbook Ideas</a></li>
		  <li><img src="../images/pipe.gif" alt="" /></li>
		  <li><a href="../faq.php">FAQ</a></li>
		</ul>
    <div class="right"><img src="../images/nav_right.jpg" alt="" /></div>
  </div>
  </html>
  
