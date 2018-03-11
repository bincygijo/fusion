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
                <td width="220" valign="top">
				 <?php include_once 'left_side.tpl.php'; ?>
				</td>
                <td valign="top"><table width="767" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#0d76aa">
                          <tr>
                            <td width="4"><img src="images/head_curve_left.gif" alt="" width="4" height="33" /></td>
                             <td class="head">Alerts</td>
                            <td width="4"><img src="images/head_curve_right.gif" alt="" width="4" height="33" /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr >
                      <td height="400" valign="top" class="border">
					  <form name="progressSummary" action="" method="post">
					  </form>
					  <br />
				      <br />
					 <table width="90%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#75bce1">
							
                              <tr class="rowcolor1">
                                <td width="19%" class="tbhead">Name</td>
                                  <td width="19%" height="20" class="tbhead">School</td>
                                 <td width="17%" class="tbhead">Date</td>
                                <td width="17%" class="tbhead">Number</td>
                               <td width="28%" class="tbhead">Conversation</td>
                          </tr>
					<?php
						while($values=mysql_fetch_array($result))
						{
					?>			
                                <tr class="rowcolor2">
                                <td class="tbtext" align="center"><?php echo $values['name']; ?></td>
                                <td height="20" class="tbtext" align="center"><?php echo $values['school']; ?></td>
                                <td class="tbtext" align="center"><?php echo $values['date']; ?></td>
                                <td align="center" class="tbtext"><?php echo $values['contact']; ?></td>
                                <td align="center" class="tbtext"><?php echo $values['conversation']; ?></td>
                                </tr>
					<?  
						}
					?>
                        </table>
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
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="57" background="images/footer_bg.gif" align="center"><? include('footer.php')?></td>
  </tr>
</table>

</body>
</html>
<script type="text/javascript">
/*function validate()
{
	if(document.getElementById("Year").value == "")
}*/
</script>