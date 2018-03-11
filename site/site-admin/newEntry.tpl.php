
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

$listUser		=	$objP->listOrderDetails($uId);
 $entry			=	$listUser['entry_actionid'];
  $delivery_date		=	$listUser['client_order_del_date'];
//print_r($listUser);
?>
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
                            <td class="head"> Create New Entry</td>
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
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="100" class="grouphead">Ref#</td>
                          <td width="2">&nbsp;</td>
                          <td><? echo $listUser['Ref_no'];?><input type="hidden" name="ref_no" class="field2" value="<? echo $listUser['Ref_no'];?>" /></td>
                        </tr>
                        <tr>
                          <td class="tbtext">Contact Person Name </td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><? echo $listUser['client_order_cpname'];?><input type="hidden" name="contact_name" value="<? echo $listUser['client_order_cpname'];?>" class="field2" /></td>
                        </tr>
                        <tr>
                          <td class="tbtext">School Name</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?  echo $listUser['client_order_school'];?><input type="hidden" name="school_name" value="<?  echo $listUser['client_order_school'];?>" class="field2" /></td>
                        </tr>
                        <tr>
                          <td class="tbtext">No.books required</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?  echo $listUser['client_order_books'];?><input type="hidden" name="no_books" value="<?  echo $listUser['client_order_books'];?>" class="field2" /></td>
                        </tr>
                        <tr>
                          <td class="tbtext">Editors Deadline </td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><? echo $listUser['client_order_deadline'];?><input type="hidden" name="editorS_dedline" id="editorS_dedline" value="<? echo $listUser['client_order_deadline'];?>" class="field2" />
                            <script language="javascript" src="js/datecal.js"></script></td>
                        </tr>
                        <tr>
                          <td class="tbtext">Delivery Address</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><? echo $listUser['client_order_del_addr'];?><input type="hidden" name="delivery_add" value="<? echo $listUser['client_order_del_addr'];?>" class="field2" /></td>
                        </tr>
                        <tr>
                          <td class="tbtext">Delivery Date</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><? echo $listUser['client_order_del_date'];?><input type="hidden" name="delivery_date" class="field2"  id="delivery_date" value="" />
                            <script language="javascript" src="js/datecal.js"></script></td>
                        </tr>
                        <tr>
                          <td class="tbtext">Contact Number </td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><? echo $listUser['client_order_contact'];?><input type="hidden" name="contact_no" value="<? echo $listUser['client_order_contact'];?>" class="field2" /></td>
                        </tr>
						 <tr>
                          <td class="tbtext">Email </td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><? echo $listUser['email'];?><input type="hidden" name="email" value="<? echo $listUser['email'];?>" class="field2" /></td>
                        </tr>
                        <tr>
                          <td class="tbtext">&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="3" class="tbtext"><table width="95%" border="0" cellpadding="2" cellspacing="0">
                            <tr>
                              <td width="76">Date</td>
                              <td width="148"><input type="text" name="txtdate" id="txtdate" value="<? echo $listUser['date'];?>" class="field2" /></td>
                              <td width="31"><a href="javascript:;" name="AnchorTo" id="AnchorTo" onClick="popUpCalendar(form2.image1,document.getElementById('txtdate'), 'yyyy-mm-dd')"><img src="js/images/calendar.gif" alt="Date Selector" name="image1" width="20" height="23" hspace="3" border="0" align="absmiddle" id="image1" onMouseOver="window.status='Pop up a calendar to select a date';return true" onMouseOut="window.status='';return true;"></a><script language="javascript" src="js/datecal.js"></script></td>
                              <td width="165">Staff Name</td>
                              <td width="150"><input type="text" name="staff_name" value="<? echo $listUser['staff_name'];?>"  class="field2" /></td>
                              </tr>
                            <tr>
                              <td>Client</td>
                              <td><input type="text" name="client_name" value="<? echo $listUser['name'];?>" class="field2" /></td>
                              <td>&nbsp;</td>
                              <td>School</td>
                              <td><input type="text" name="school" value="<? //echo $listUser['school'];?>"class="field2" /></td>
                            </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td class="tbtext">&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td class="tbtext">Short Summary</td>
                          <td>&nbsp;</td>
                          <td><input type="text" name="summary" value="<? //echo $listUser['entry_summary'];?>" class="field3" /></td>
                        </tr>
                        <tr>
                          <td valign="top" class="tbtext">Details</td>
                          <td>&nbsp;</td>
                          <td><textarea name="details" value="" class="textarea1"><? //echo $listUser['entry_details'];?></textarea></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td valign="top"><select name="action" id="action" class="listmenu">
	<option value="">Select one</option>
	 <? if(!empty($arrEntry)) { ?>
			  <? foreach($arrEntry as $key=>$value){?>
	 <option value="<?=$value['entry_id']?>" <? if($entry==$value['entry_id']) echo 'selected';?> >
			  <?=$value['entry_action']?></option>
			  <? } ?>
			  <? } ?>
	</select></td>
                          <td>&nbsp;</td>
                          <td><textarea name="actionname" rows="5" cols="40"><? //echo $listUser['entry_desc'];?></textarea></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td><br />
                              <input type="image" name="submit" value="submit" src="images/submit.gif" alt="" width="69" height="21" /><input type="hidden" name="clientId" id="clientId" value="<?php echo $_GET["id"]; ?>" /></td>
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

