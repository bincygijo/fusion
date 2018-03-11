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
                            <td class="head"> Edit Client</td>
                            <td width="4"><img src="images/head_curve_right.gif" alt="" width="4" height="33" /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="385" valign="top" class="border"><table width="725" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
						 <? if($message!='') { ?>
				<tr>
				
				<td width="135" colspan="">&nbsp;</td>
				<td width="445"><span class="tbtext"><font color="#FF0000">
				  <?=$message?>
				</font></span></td>
				<td width="39">&nbsp;</td>
				<td width="82">&nbsp;</td>
            <td width="24"  align="left" valign="top" class="tbtext">&nbsp;</td>
          </tr>
			<? } ?>
                       
                          <tr>
                            <td colspan="2"><form id="form2" name="form2" method="post" action="" style="margin:0;">
                                <table width="569" border="0" align="center" cellpadding="2" cellspacing="0">
                                 <!-- <tr>
                                    <td class="tbtext">Ref.No</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="ref_number" id="ref_number" class="field2"   size="45"/></td>
                                  </tr>-->
                                  <tr>
                                    <td width="155" class="tbtext">Name </td>
                                    <td width="15">&nbsp;</td>
                                    <td width="387"><input type="text" name="name" id="name" class="field2" value="<?=$arrUser['name'];?>"   size="45"  tabindex="1"/></td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">Position</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="position" id="position" class="field2" value="<?=$arrUser['positon'];?>"   size="45"/></td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">School </td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="school" id="school" class="field2"  value="<?=$arrUser['school'];?>" size="45"/></td>
                                  </tr>
                                  <tr>
                                    <td class="grouphead">Postal Address</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">Street</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="street" id="street" class="field2"  value="<?=$arrUser['street'];?>" size="45"/></td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">Suburb</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="substreet" id="substreet" class="field2"  value="<?=$arrUser['substreet'];?>" size="45"/></td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">Country</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="country" id="country" class="field2"  value="<?=$arrUser['country'];?>" size="45"/></td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">State</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="state" id="state" class="field2"  value="<?=$arrUser['state'];?>"/></td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">Postcode</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="postal" id="postal" class="field2" value="<?=$arrUser['postal'];?>" /></td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">Best Contact Number</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="contact" id="contact" class="field2" value="<?=$arrUser['contact'];?>" /></td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">Email Address</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="email" id="email" class="field2" value="<?=$arrUser['email'];?>" /></td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">Other information</td>
                                    <td>&nbsp;</td>
                                    <td><textarea name="info" class="textarea"><?=$arrUser['information'];?></textarea></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>
                                    <input type="image" name="add" value="Add" src="images/save.gif" alt=""  /> &nbsp; <img name="button" src="images/back.jpg" value="Go back" onClick="goBack();"  />
									<input type="hidden" name="edit"  /><input type="hidden" name="clid" value="<?=$arrUser['client_id'];?>" /><input type="hidden" name="id" id="id" value="<?=$_GET['id'];?>" />
									&nbsp;&nbsp;</td>
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
    <td height="40" background="images/footer_bg.gif" align="center"><? include('footer.php')?></td>
  </tr>
</table>
<script language="javascript">
function goBack()
 {
 	//alert("hi");
	var cId	=	document.getElementById("id").value;
	//alert(cId);
//window.location = "BuyingStep1.php?enquiryId="+enqId;
 	window.location = "list.php?id="+cId;
 }
</script>
</body>
</html>
