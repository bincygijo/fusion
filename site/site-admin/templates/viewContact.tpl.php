

<script type="text/javascript" src="openwysiwyg/scripts/wysiwyg.js"></script>
<script type="text/javascript" src="openwysiwyg/scripts/wysiwyg-settings.js"></script>

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
$listUser		=	$objU->getContact_us($uId);


  //$actionName['entry_action'];
 
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
                            <td class="head"> View Contact Us</td>
                            <td width="4"><img src="images/head_curve_right.gif" alt="" width="4" height="33" /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="385" valign="top" class="border"><table width="725" border="0" align="center" cellpadding="0" cellspacing="0">
						      <?php if($msg!='') { ?>
				<tr>
            <td valign="top" colspan="2" align="center"><font color="#FF0000"><?=$msg?></font></td>
          </tr>
			<?php } ?>          
                      
                          <tr>
                            <td>
<form name="form2" id="form2" method="post" action="">
<table width="625" border="0" align="center" cellpadding="2" cellspacing="0">

                       
                        <tr>
                          <td width="267" class="tbtext">First Name </td>
                          <td width="10">&nbsp;</td>
                          <td class="tbtext"><?php echo $listUser['name'];?><input type="hidden" name="ref_no" class="field2" value="<?php echo $listUser['ref_id'];?>" /></td>
                        </tr>
                        <tr>
                          <td class="tbtext">Last  Name </td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?php echo $listUser['last_name'];?><input type="hidden" name="contact_name" value="<?php echo $listUser['name'];?>" class="field2" /></td>
                        </tr>
                        <tr>
                          <td class="tbtext">Position</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?php  echo $listUser['positon'];?><input type="hidden" name="school_name" value="<?php  echo $listUser['school'];?>" class="field2" /></td>
                        </tr>
                        <tr>
                          <td class="tbtext">Email</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?php  echo $listUser['email'];?><input type="hidden" name="no_books" value="<?php  echo $listUser['no_books'];?>" class="field2" /></td>
                        </tr>
                        <tr>
                          <td class="tbtext">Best Contact Number  </td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?php echo $listUser['contact'] ;?><input type="hidden" name="editorS_dedline" id="editorS_dedline" value="<?php echo $editor_date;?>" class="field2" /></td>
                        </tr>
                        <tr>
                          <td class="tbtext">No.Of..Books Required </td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?php echo $listUser['number_books'];?><input type="hidden" name="delivery_add" value="<?php echo $listUser['delivery_add'];?>" class="field2" /></td>
                        </tr>
                        <tr>
                          <td class="tbtext">School/Company/Group</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?php echo $listUser['school'];?><input type="hidden" name="delivery_date" class="field2"  id="delivery_date" value="<?php echo $deli_date;?>" /></td>
                        </tr>
                        <tr>
                          <td class="tbtext">What is the price range you are looking at for each book?</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?php echo $listUser['price_range'];?><input type="hidden" name="contact_no" value="<?php echo $listUser['contact'];?>" class="field2" /></td>
                        </tr>
                        <tr>
                          <td class="tbtext">&nbsp;</td>
                          <td>&nbsp;</td>
                          <td class="tbtext">&nbsp;</td>
                        </tr>
                        <tr>
                          <td class="tbtext">Street Address</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?php echo $listUser['street'];?></td>
                        </tr>
                        <tr>
                          <td class="tbtext">Suburb</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?php echo $listUser['substreet'];?></td>
                        </tr>
                        <tr>
                          <td class="tbtext">State</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?php echo $listUser['state'];?></td>
                        </tr>
                        <tr>
                          <td class="tbtext">Country</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?php echo $listUser['country'];?></td>
                        </tr>
                        <tr>
                          <td class="tbtext">Postcode</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?php echo $listUser['postal'];?></td>
                        </tr>
                        <tr>
                          <td class="tbtext">How can we help you? </td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?php echo $listUser['tick'];?></td>
                        </tr>
                        <tr>
                          <td class="tbtext">Any comments/questions/ suggestions?</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?php echo $listUser['comments_sugg'];?></td>
                        </tr>
                        <tr>
                          <td class="tbtext">How did you first hear about Fusion Books?</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><?php echo $listUser['information'];?></td>
                        </tr>
                        <tr>
                          <td class="tbtext">&nbsp;</td>
                          <td>&nbsp;</td>
                          <td class="tbtext">&nbsp;</td>
                        </tr>
                        <tr>
                          <td class="grouphead">Reply</td>
                          <td>&nbsp;</td>
                          <td class="tbtext">&nbsp;</td>
                        </tr>
						
                        <tr>
                          <td class="tbtext">&nbsp;</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"></td>
                        </tr>
                        <tr>
                          <td class="tbtext">To</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><input type="text" name="emailto" class="field2" value="<?php  echo $listUser['email'];?>"  size="40" /></td>
                        </tr>
                        <tr>
                          <td class="tbtext">From</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><select name="from" id="from" class="listmenu2">
		  <option value="info@fusionbooks.com.a">info@fusionbooks.com.au</option>
		   <option value="melanie@fusionbooks.com.au">melanie@fusionbooks.com.au </option>
		     <option value="cliff@fusionbooks.com.au">cliff@fusionbooks.com.au</option>
			
		  </select></td>
                        </tr>
                        <tr>
                          <td class="tbtext">Message</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><textarea name="editor" id="editor" style="height: 270px;"></textarea>
						  
						    <script type="text/javascript">
	WYSIWYG.attach('editor', full); // full featured setup
</script>						  </td>
                        </tr>
                        <tr>
                          <td class="tbtext">&nbsp;</td>
                          <td>&nbsp;</td>
                          <td class="tbtext"><input type="image" name="add" img src="images/save.gif" alt="" width="69" height="21" onClick="return function1();"/>&nbsp;<img name="button" src="images/back.jpg" style="cursor:pointer" value="Go back" onClick="history.go(-1);"  /><input type="hidden" name="add" /></td>
                        </tr>
                        <tr>
                          <td class="tbtext">&nbsp;</td>
                          <td>&nbsp;</td>
                          <td class="tbtext">&nbsp;</td>
                        </tr>
                        <tr>
                          <td class="tbtext">&nbsp;</td>
                          <td>&nbsp;</td>
                          <td class="tbtext">&nbsp;</td>
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

