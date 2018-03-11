<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fusion Books</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/pop-up.js"></script>
<script language="javascript" src="js/cal2.js"></script>
<script language="javascript" src="js/cal_conf2.js"></script>

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
                            <td class="head"> Add News</td>
                            <td width="4"><img src="images/head_curve_right.gif" alt="" width="4" height="33" /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="385" valign="top" class="border"><table width="725" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
						 <?php if($msg!='') { ?>
				<tr>
            <td width="564"  align="center" valign="top" class="tbtext"><font color="<?=$color?>"><?=$msg?></font></td>
            <td width="161"  align="center" valign="top" class="tbtext">&nbsp;</td>
				</tr>
			<?php } ?>
                       
                          <tr>
                            <td colspan="2"><form id="form2" name="form2" method="post" action="" style="margin:0;" enctype="multipart/form-data">
                                <table width="569" border="0" align="center" cellpadding="2" cellspacing="0">
                                 <!-- <tr>
                                    <td class="tbtext">Ref.No</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="ref_number" id="ref_number" class="field2"   size="45"/></td>
                                  </tr>-->
                                 
                                  
                                  <tr>
                                    <td class="tbtext">News Title </td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="title" class="field2" /></td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">News Description</td>
                                    <td>&nbsp;</td>
                                    <td><textarea name="desc1" class="textarea"></textarea></td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">Date</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="news_date" id="news_date" class="field2" /> <a href="javascript:showCal('Calendar10')"><img src="images/cal.gif" width="19" height="17" border="0" /></a></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>
                                    <input type="image" name="add" value="Add" src="images/save.gif" alt=""  onclick="return check();" />&nbsp;<img name="button" src="images/back.jpg" value="Go back" onClick="history.go(-1);"  />
									
									<input type="hidden" name="add" value="Add" />									</td>
                                  </tr>
                                </table>
                              </form></td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                        </table></td>
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
<script language="javascript">
function check()
{
if(document.form2.title.value=="")
{
alert("Enter news title");
document.form2.title.focus();
return false;

}
if(document.form2.desc1.value=="")
{
alert("Enter news description");
document.form2.desc1.focus();
return false;

}
if(document.form2.news_date.value=="")
{
alert("Please choose date");
document.form2.news_date.focus();
return false;

}


}
</script>
</body>
</html>
