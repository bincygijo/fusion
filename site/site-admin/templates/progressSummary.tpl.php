<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fusion Books</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
 <?php include_once 'header.tpl.php'; ?>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="210" valign="top">
				 <?php include_once 'left_side.tpl.php'; ?>
				</td>
                <td valign="top"><table width="767" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#0d76aa">
                          <tr>
                            <td width="4"><img src="images/head_curve_left.gif" alt="" width="4" height="33" /></td>
                            <td class="head">Progress Summary </td>
                            <td width="4"><img src="images/head_curve_right.gif" alt="" width="4" height="33" /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="385" valign="top" class="border">
					  <form name="progressSummary" action="" method="post">
					  <table width="100%" border="0">
						<tr>
					  <td valign="bottom" height="10" align="center">
					  <!-- <input type="hidden" name="search" />
					  <input type="image"  src="images/search.jpg"alt="" width="69" height="21" name="search"  />--> 					 </td>
					  </tr>
                      </table>
					  </form>
					  
					  <?php
					  	/*if(isset($_REQUEST['search']) && $_REQUEST['Year'] != "")
						{*/

					  ?>
					  	<table width="90%" border="0" cellpadding="4" cellspacing="1" align="center" bgcolor="#75bce1">
                                        <tr class="rowcolor1">
										
                                          <td class="tbhead" colspan="2">Progress Summary On <?php echo $year//echo $_REQUEST['Year']; ?></td>
                                        </tr>
										
                                        <tr class="rowcolor2">
											 <td width="48%" height="20" class="tbtext">Number of clients <?php echo $year//echo $_REQUEST['Year']; ?></td>
											 <td width="52%" height="20" class="tbtext"><?php echo $result; ?></td>
                                        </tr>
										 <tr class="rowcolor2">
											 <td height="20" class="tbtext">Number of clients <?php echo $year;//echo $_REQUEST['Year']; ?>(paid deposit)</td>
											 <td height="20" class="tbtext"><?php echo $paidUser; ?></td>
                                        </tr>
										 <tr class="rowcolor2">
											 <td height="20" class="tbtext">Number of books that have been printed</td>
											 <td height="20" class="tbtext"><?=$printUser;?></td>
                                        </tr>
										 <tr class="rowcolor2">
											 <td height="20" class="tbtext">Number of books currently in transit</td>
											 <td height="20" class="tbtext"><?=$printUser;?></td>
                                        </tr>
                        </table>
					   <?php
					  // }
					  ?>
					  
					  </td>
                    </tr>
                    <tr>
                      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="4"><img src="images/curve_bottom_left.gif" width="4" height="4" /></td>
                            <td background="images/bottom_pic.gif"><img src="images/bottom_pic.gif" alt="" width="1" height="4" /></td>
                            <td width="4"><img src="images/curve_bottom_right.gif" alt="" width="4" height="4" /></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
       
        <tr>
          <td height="8"></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="40" background="images/footer_bg.gif" align="center"><?php include('footer.php')?></td>
  </tr>
</table>

</body>
</html>
<script type="text/javascript">
function validate()
{
	var year 	=document.getElementById("year").value;
	//window.location.href=progress
}
</script>