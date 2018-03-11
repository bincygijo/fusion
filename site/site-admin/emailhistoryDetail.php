<?
include_once '../../config/config.inc.php';
include_once 'classes/entry.class.php';
include_once 'classes/production.class.php';
include_once 'classes/user.class.php';
include_once 'classes/history.class.php';

$objE		=	new entry();
$objP		= new production();
$objU		= new user();
$objH			= new history();
 $cId		=	$_GET['hid'];
$viewHistory	= $objH->viewemail($cId);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fusion Books</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/pop-up.js"></script>
<link href="js/popcalendar.css" rel="stylesheet" type="text/css">
</head>
<body>
<? 
 $uId			=	$_GET['id'];
$action			=	$_GET['act'];
$arrEntry		= 	$objE->list_entry();
$listUser		=	$objP->getEntrydetails($uId,$action);
  $entry			=	$listUser['entry_actionid'];
  $delivery_date		=	$listUser['client_order_del_date'];

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
 <?php include_once 'templates/header.tpl.php'; ?>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="220" valign="top">
				 <?php include_once 'templates/left_side.tpl.php'; ?>
				</td>
                <td valign="top"><table width="767" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#0d76aa">
                          <tr>
                            <td width="4"><img src="images/head_curve_left.gif" alt="" width="4" height="33" /></td>
                            <td class="head"> History Details</td>
                            <td width="4"><img src="images/head_curve_right.gif" alt="" width="4" height="33" /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="400" valign="top" class="border"><table width="725" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
						      <? if($msg!='') { ?>
				<tr>
            <td valign="top" colspan="2" align="center"><font color="<?=$color?>"><?=$msg?></font></td>
          </tr>
			<? } ?>          
                      
                          <tr>
                            <td>
<form name="form2" id="form2" method="post" action="">
<table width="625" border="0" align="center" cellpadding="2" cellspacing="0">

                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td class="tbtext"></td>
                          <td ></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td class="tbtext"> Date</td>
                          <td></td>
                          <td class="tbtext"><?=$viewHistory['date'];?></td>
                        </tr>
                        <tr>
                          <td class="tbtext">Subject</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?=$viewHistory['subject'];?></td>
                        </tr>
                        <tr>
                          <td class="tbtext">Content</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?=substr($viewHistory['content'],0,50);?></td>
                        </tr>
                       
                        <tr>
                          <td class="tbtext">&nbsp;</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?=$viewHistory['history_date'];?></td>
                        </tr>
                       
                    
                        
                      
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        
                        <tr>
                          <td><input type="hidden" name="clientId" id="clientId" value="<?=$uId;?>" /></td>
                          <td> <img name="button" src="images/back.jpg" value="Go back" onClick="goBack();"  /></td>
                          <td><br />
                             <!-- <input type="image" name="submit" value="submit" src="images/submit.gif" alt="" width="69" height="21" />--><input type="hidden" name="clientId" id="clientId" value="<?php echo $_GET["id"]; ?>" /></td>
                        </tr>
                      </table>
</form></td></tr>
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
                            <td background="images/bottom_pic.gif"><img src="templates/images/bottom_pic.gif" alt="" width="1" height="4" /></td>
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
<script language="javascript">
function goBack()
 {
 	//alert("hi");
	var cId	=	document.getElementById("clientId").value;
	//alert(cId);
//window.location = "BuyingStep1.php?enquiryId="+enqId;
 	window.location = "clientSheet.php?id="+cId;
 }
</script>

</body>
</html>

