<script type="text/javascript">
var hblProto = document.location.protocol == 'https:' ? "https:" : "http:";
document.write(unescape("%3Cscript src='" + hblProto + "//static.hab.la/js/wc.js' type='text/javascript'%3E%3C/script%3E"));
</script><a style="display:none;" href="http://hab.la/#8735-226-10-1042" id="hbl_code">Habla Livehelp</a>

<script language="javascript" type="text/javascript">
  function che()
  {
   var	name =	document.getElementById("name").value;
  if(document.getElementById("name").value=="")
	  {
	  alert("Enter school or name or email");
	  document.getElementById("name").focus();
	  return false;
 	 }

  }
  
  function enable_chat()
  {
  //document.getElementById("habla_oplink_a").focus();
  //document.getElementById("habla_conversation_div").focus();
  wc_init();
  setTimeout("nnn()",4000)
  }
  
  function nnn()
  {
  document.getElementById('habla_panel_div').style.display='block';
  }
  
  </script>
<div id="header">
    <div id="logo"><a href="index.php"><img src="images/logo.jpg" alt="Fusion Books" border="0" align="left" /></a> <div class="call">Call: 1800 637 515</div></div>
    <div id="search">
	<div id="toplins">
        <ul>
          <li><a href="#" onclick="enable_chat()">Online Chat</a></li>
          <li><a href="contact_fusion_books.php">Contact Fusion Books</a></li>
        </ul>
      </div>
      <div id="searchbox">
     <form name="documentSearch" method="post" id="documentSearch" action="">
          <div class="field">
           <!-- <input name="name" id="name" type="text" class="textfield" value="" />-->
		   <label>
			<input type="text" id="doc" onclick="javascript:clearSearch();" onmouseover="javascript:clearSearch();" onblur="javascript:fillSearch();" onmouseout="javascript:fillSearch();"   class="textfield" value="keyword search" style="margin-right:5px;"  /></label>
			
          </div>
          <div style="float:left;">
		   <!--<input type="image" src="images/search.gif" id="search"   name="search"  alt="" height="20" width="31" border="0" align="left" onClick="javascript:searchdoc(this.value);" />-->
		  <label>
		 <input type="image"  src="images/search.gif" name="search" alt="Search" style="cursor:pointer" onclick="javascript:searchdoc(this.value);" /></label></div>
		<!--<img src="images/search.gif" name="submit" alt="" width="31" height="20" border="0" align="left" style="cursor:pointer"/></div>-->
        </form>
      </div>
    </div>
</div>
  
  <!--menu section-->
  
  <div id="main-nav">
    <div class="left"><img src="images/nav_left.jpg" alt="Home" /></div>
		<ul id="sddm">
		  <li><a href="index.php">Home</a></li>
		  <li><img src="images/pipe.gif" alt="Services" /></li>
		  <li><a rel="Services" href="services.php">Services</a></li>
		  <li><img src="images/pipe.gif" alt="Yearbook Types" /></li>
		  <li><a rel="Yearbook_Types" href="yearbook_type.php">Yearbook Types</a></li>
		  <li><img src="images/pipe.gif" alt="Book Features" /></li>
		  <li><a href="book_features.php">Book Features</a></li>
		  <li><img src="images/pipe.gif" alt="Yearbook Pricing" /></li>
		  <li><a href="yearbook_pricing.php">Yearbook Pricing</a></li>
		  <li><img src="images/pipe.gif" alt="Yearbook Gallery" /></li>
		  <!--<li><a href="yearbook_gallery.php">Yearbook Gallery</a></li>
		  <li><img src="images/pipe.gif" alt="Yearbook Ideas" /></li>-->
		  <li><a rel="Yearbook_Ideas" href="yearbook_ideas.php">Yearbook Ideas</a></li>
		  <li><img src="images/pipe.gif" alt="FAQ" /></li>
		  <li><a rel="faq" href="faq.php">FAQ</a></li>
		</ul>
    <div class="right"><img src="images/nav_right.jpg" alt="Fusion Books" /></div>
  </div>
  </html>
  <script type="text/javascript">
			function searchdoc()
			{
				var doc =document.getElementById("doc").value;
				document.documentSearch.action="search_result.php?action=SEARCH&limit=25&keyword="+doc;
				document.documentSearch.submit();
				//
				
				
			}
			function clearSearch()
			{
				
				document.getElementById("doc").value = "";
			}
			function fillSearch()
			{
				
				var doc = document.getElementById("doc").value ;
				
				if(doc == "")
					document.getElementById("doc").value = "keyword search";
			}
			</script>

 