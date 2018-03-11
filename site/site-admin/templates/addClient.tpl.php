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
                            <td class="head"> Create New Client</td>
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
                            <td><form id="form2" name="form2" method="post" action="" style="margin:0;">
                                <table width="569" border="0" align="center" cellpadding="2" cellspacing="0">
                                 <!-- <tr>
                                    <td class="tbtext">Ref.No</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="ref_number" id="ref_number" class="field2"   size="45"/></td>
                                  </tr>-->
                                  <tr>
                                    <td width="116" class="tbtext">Name </td>
                                    <td width="2">&nbsp;</td>
                                    <td width="439"><input type="text" name="name" id="name" class="field2"   size="45" value="<? // =$arrContact[0]['name'];?>"/></td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">Position</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="position" id="position" class="field2" value="<? //=$arrContact[0]['positon']?>"   size="45"/></td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">School </td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="school" id="school" class="field2"  value="<? //=$arrContact[0]['school']?>" size="45"/></td>
                                  </tr>
                                  <tr>
                                    <td class="grouphead">Postal Address</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">Street</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="street" id="street" class="field2"  value="<? //=$arrContact[0]['street']?>" size="45"/></td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">Suburb</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="substreet" id="substreet" class="field2"  value="<? //=$arrContact[0]['substreet']?>" size="45"/></td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">Country</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="country" id="country" class="field2"  value="<? //=$arrContact[0]['country']?>" size="45"/></td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">State</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="state" id="state" class="field2" value="<? //=$arrContact[0]['state']?>" /></td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">Postcode</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="postal" id="postal" class="field2" value="<? //=$arrContact[0]['postal']?>" /></td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">Best Contact Number</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="contact" id="contact" value="<? //=$arrContact[0]['contact']?>" class="field2" /></td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">Email Address</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="email" id="email" class="field2" value="<? //=$email;?>"/></td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">Other information</td>
                                    <td>&nbsp;</td>
                                    <td><textarea name="info" class="textarea"><? //=$arrContact[0]['information']?></textarea></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>
                                    <input type="image" name="add" value="Add" src="images/save_add_new.gif" alt=""  onclick="return validate();"/>
									&nbsp;&nbsp; <input type="image" name="submit" value="" src="images/save_go_to.gif" alt="" onclick="return validate();"  /></td>
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
<script language="javascript">
function validate()
{
if(document.form2.school.value=="")
{
alert("Enter school name");
document.form2.school.focus();
return false;
}
if(document.form2.email.value=="")
{
alert("Enter email");
document.form2.email.focus();
return false;
}

if(document.form2.email.value!="")
	 {
	 	emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
		
		elem=document.form2.email.value;
		if(!elem.match(emailExp)){
			alert('Enter valid email');
			document.form2.email.focus();
			return false;
		}
		
 }

}
</script>
</body>
</html>
