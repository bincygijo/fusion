<?php
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
//include_once 'classes/database.class.php';
include_once 'classes/user.class.php';
//include_once 'classes/image.class.php';

$objU		=	new user();
//$objI		=	new image();

$msg 			= isset($_REQUEST['msg'])	? $_REQUEST['msg']		: '';
$color 			= isset($_REQUEST['color'])	? $_REQUEST['color']	: 'red';

 $id			=	$_GET['id'];
$arrNews		=	$objU->getNews($id);
if(isset($_POST['add']))
{
$description	=	$_POST['desc1'];
$date	=	date('Y-m-d');
$news_date	=	$_POST['news_date'];
$title		=	$_POST['title'];
$msg1		=	$objU->updateNews($description,$title,$date,$news_date,$id);
$msg		=	'Updated successfully!';
header('location:viewNews.php?msg='.$msg.'&color='.$color.'');
}

  
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fusion Books</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/cal2.js"></script>
<script language="javascript" src="js/cal_conf2.js"></script>

</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
 <?php include_once 'templates/header.tpl.php'; ?>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="210" valign="top">
				 <?php include_once 'templates/left_side.tpl.php'; ?>
				</td>
                <td valign="top"><table width="767" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#0d76aa">
                          <tr>
                            <td width="4"><img src="images/head_curve_left.gif" alt="" width="4" height="33" /></td>
                            <td class="head"> Edit News </td>
                            <td width="4"><img src="images/head_curve_right.gif" alt="" width="4" height="33" /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="385" valign="top" class="border"><table width="725" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
						 <?php if($msg!='') { ?>
				<tr>
            <td valign="top" colspan="2" align="center" class="tbtext"><font color="<?=$color?>"><?=$msg?></font></td>
          </tr>
			<?php } ?>
                       
                          <tr>
                            <td><form id="form2" name="form2" method="post" action="" style="margin:0;" enctype="multipart/form-data">
                                <table width="569" border="0" align="center" cellpadding="2" cellspacing="0">
                                 <!-- <tr>
                                    <td class="tbtext">Ref.No</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="ref_number" id="ref_number" class="field2"   size="45"/></td>
                                  </tr>-->
                                  <tr>
                                    <td class="tbtext">News Title</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="title" value="<?=$arrNews['news_title']?>" class="field2" /></td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">Description</td>
                                    <td>&nbsp;</td>
                                    <td><textarea name="desc1" class="textarea"><?=$arrNews['news_name']?></textarea></td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">Date</td>
                                    <td>&nbsp;</td>
									<?php $new_date		=	$arrNews['news_date']?>
                                    <td><input type="text" name="news_date" id="news_date" value="<?php if($new_date=='0000-00-00'){ echo $new_date==""; }else {echo $new_date;}?>" class="field2" /> <a href="javascript:showCal('Calendar11')"><img src="images/cal.gif" width="19" height="17" border="0" /></a></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>
                                    <input type="image" name="add" value="Add" src="images/submit.gif" alt=""  />&nbsp;
									  <img name="button" src="images/back.jpg" value="Go back" onClick="history.go(-1);"  />
									<input type="hidden" name="add" value="Add" />									</td>
                                  </tr>
                                </table>
                              </form></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
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
