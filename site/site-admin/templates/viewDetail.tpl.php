
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
<?php 
$uId			=	$_GET['id'];
$action			=	$_GET['act'];
$arrEntry		= 	$objE->list_entry();


$listUser		=	$objP->getEntrydetails($uId,$action);
 $entry			=	$listUser['entry_actionid'];
  $actionName		=	$objE->getActon_values($entry);
  //$actionName['entry_action'];
 $delivery_date		=	$listUser['client_order_del_date'];
 $ed_ded		=	$listUser['editors_dedline'];
 $exp_edDate		=	explode("-",$ed_ded);
 $editor_date		=	$exp_edDate[2]."/".$exp_edDate[1]."/".$exp_edDate[0];
  
  $de_date	=	$listUser['delivery_date'];
  $exp_deldate		=	explode("-",$de_date);
  $deli_date		=	$exp_deldate[2]."/".$exp_deldate[1]."/".$exp_deldate[0];
  
  $curDate		=	$listUser['date'];
  $expDate		=	explode("-",$curDate);
  $date			=	$expDate[2]."/".$expDate[1]."/".$expDate[0];
  
//print_r($listUser);
?>
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
                            <td class="head"> View Details</td>
                            <td width="4"><img src="images/head_curve_right.gif" alt="" width="4" height="33" /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="385" valign="top" class="border"><table width="725" border="0" align="center" cellpadding="0" cellspacing="0">
						      <?php if($msg!='') { ?>
				<tr>
            <td valign="top" colspan="2" align="center"><font color="<?=$color?>"><?=$msg?></font></td>
          </tr>
			<?php } ?>          
                      
                          <tr>
                            <td>
<form name="form2" id="form2" method="post" action="">
<table width="625" border="0" align="center" cellpadding="2" cellspacing="0">

                       
                        <tr>
                          <td width="267" class="grouphead">Ref#</td>
                          <td width="10">&nbsp;</td>
                          <td class="tbtext"><?php echo $listUser['ref_id'];?><input type="hidden" name="ref_no" class="field2" value="<?php echo $listUser['ref_id'];?>" /></td>
                        </tr>
                        <tr>
                          <td class="tbtext">Contact Person Name </td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?php echo $listUser['name'];?><input type="hidden" name="contact_name" value="<?php echo $listUser['name'];?>" class="field2" /></td>
                        </tr>
                        <tr>
                          <td class="tbtext">School Name</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?php  echo $listUser['school'];?><input type="hidden" name="school_name" value="<?php  echo $listUser['school'];?>" class="field2" /></td>
                        </tr>
                        <tr>
                          <td class="tbtext">No.books required</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?php  echo $listUser['no_books'];?><input type="hidden" name="no_books" value="<?php  echo $listUser['no_books'];?>" class="field2" /></td>
                        </tr>
                        <tr>
                          <td class="tbtext">Editors Deadline </td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?php echo $editor_date;?><input type="hidden" name="editorS_dedline" id="editorS_dedline" value="<?php echo $editor_date;?>" class="field2" /></td>
                        </tr>
                        <tr>
                          <td class="tbtext">Delivery Address</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?php echo $listUser['delivery_add'];?><input type="hidden" name="delivery_add" value="<?php echo $listUser['delivery_add'];?>" class="field2" /></td>
                        </tr>
                        <tr>
                          <td class="tbtext">Delivery Date</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?php echo $deli_date;?><input type="hidden" name="delivery_date" class="field2"  id="delivery_date" value="<?php echo $deli_date;?>" /></td>
                        </tr>
                        <tr>
                          <td class="tbtext">Contact Number </td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?php echo $listUser['contact'];?><input type="hidden" name="contact_no" value="<?php echo $listUser['contact'];?>" class="field2" /></td>
                        </tr>
                        <tr>
                          <td class="tbtext">Email</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?php echo $listUser['email'];?><input type="hidden" name="" value="<?php echo $listUser['email'];?>" class="field2" /></td>
                        </tr>
                        <tr>
                          <td colspan="3" class="tbtext"><table width="625" border="0" cellpadding="2" cellspacing="0">
                            <tr>
                              <td class="tbtext" width="255">Date</td>
							  <td width="20">&nbsp;</td>
                              <td  class="tbtext" width="326"><?php echo $date;?></td>
								</tr>
								<tr>
                              <td width="255">Staff Name</td>
							   <td>&nbsp;</td>
                              <td width="326" class="tbtext"><?php echo $listUser['staff_name'];?>                               </td>
                              <td width="8" class="tbtext"></td>
                              </tr>
                            <tr>
                              <td class="tbtext">Client</td>
							   <td>&nbsp;</td>
                              <td class="tbtext"><?php echo $listUser['client'];?></td>
                              <td>&nbsp;</td></tr>
							  <tr>
                              <td width="255">School</td>
							    <td>&nbsp;</td>
                              <td width="326" class="tbtext"><?php echo $listUser['school'];?></td>
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
                          <td class="tbtext"><?php echo $listUser['entry_summary'];?><input type="hidden" name="summary" value="<?php echo $listUser['entry_summary'];?>" class="field3" /></td>
                        </tr>
                        <tr>
                          <td valign="top" class="tbtext">Details</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?php echo $listUser['entry_details'];?><!--<textarea name="details" value="" class="textarea1"><? // echo $listUser['entry_details'];?></textarea>--></td>
                        </tr>
                        <tr>
                          <td class="tbtext">Action </td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?=$actionName['entry_action'];?></td>
                        </tr>
                        <tr>
                          <td  class="tbtext">Description<? //=$actionName['entry_action'];?><!--<select name="action" id="action" class="listmenu">
	<option value="">Select one</option>-->
	 <? /*if(!empty($arrEntry)) { ?>
			  <? foreach($arrEntry as $key=>$value){?>
	 <option value="<?=$value['entry_id']?>" <? if($entry==$value['entry_id']) echo 'selected';?> >
			  <?=$value['entry_action']?></option>
			  <? } ?>
			  <? } */?>
	<!--</select>--></td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?php echo $listUser['entry_desc'];?><!--<textarea name="actionname" rows="5" cols="40"><? //echo $listUser['entry_desc'];?></textarea>--></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>
                              <!--<input type="image" name="submit" value="submit" src="images/back.jpg" alt="" width="69" height="21"  />-->
							   <img name="button" src="images/back.jpg" value="Go back" onClick="goBack();"  />
							  
							  <input type="hidden" name="clientId" id="clientId" value="<?php echo $_GET["id"]; ?>" /></td>
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
          <td height="8"></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="40" background="images/footer_bg.gif" align="center"><?php include('footer.php')?></td>
  </tr>
</table>
<script language="javascript">
function goBack()
 {
 	//alert("hi");

 	window.location = "workSpace.php";
 }
</script>
</body>
</html>

