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
                            <td class="head">Canned Text </td>
                            <td width="4"><img src="images/head_curve_right.gif" alt="" width="4" height="33" /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="385" valign="top" class="border"><table width="725" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
						 <? if($msg!='') { ?>
				<tr>
            <td valign="top" colspan="2" align="center" class="tbtext"><font color="<?=$color?>"><?=$msg?></font></td>
          </tr>
			<? } ?>
                       
                          <tr>
                            <td><form id="form2" name="form2" method="post" action="" style="margin:0;">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td><table width="100%" align="center" border="0" cellpadding="4" cellspacing="1" bgcolor="#75bce1">
                                    <tr class="rowcolor1">
                                      <td width="4%" height="20" align="center" class="tbhead">No</td>
                                      <td width="23%" align="center" class="tbhead">Title</td>
                                      <td width="16%" align="center" class="tbhead">Text</td>
                                      <td width="16%" align="center" class="tbhead">Edit</td>
                                      <td width="16%" align="center" class="tbhead">Delete</td>
                                    </tr>
                                    <?php
								$j=0;
								
								
								
								
								foreach($cdata as $key=>$value)
								{
								$j++;
								?>
                                    <tr class="rowcolor2" id="">
                                      <td height="20" align="center" class="tbtext"><?php echo $j;?></td>
                                      <td class="tbtext" align="center"><?php echo $value['title'];?></td>
                                      <td class="tbtext" align="center"><?php echo $value['c_text'];?></td>
                                      <td class="tbtext" align="center"><a href="cannontxt.php?c_edit=<?php echo $value['id'];?>">Edit</a></td>
                                      <td class="tbtext" align="center"><a href="cannontxt.php?c_del=<?php echo $value['id'];?>">Delete</a></td>
                                    </tr>
                                    <?php
						   }
						   ?>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td><table width="100%" height="171" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="8%" height="45" class="tbtext">Title</td>
                                      <td width="92%" >
                                        <input type="text" name="title"  id="title" class="field2" value="<?php echo $title;?>" />
                                      </td>
                                    </tr>
                                    <tr>
                                      <td height="88" class="tbtext">Text</td>
                                      <td><label>
                                        <textarea name="c_text"  class="textarea" id="c_text"><?php echo $c_text;?> </textarea>
                                      </label></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>
									  <?php
									  if($button=="add")
									  {
									  ?>
									  <input type="image" name="Submit" value="Submit" src="images/add.gif" alt="" onClick="return validate4();" />
									   
									   <?php
									   }
									   else
									   {
									  									   ?>
									   <input type="image" name="update" value="update" src="images/save.gif" alt="" onClick="return validate4();" />
									  <input type="hidden" name="e_cid" value="<?php echo $c_edit; ?>" />
                                        
									   <?php
									   }
									   ?>
									   	
                                      </td>
                                    </tr>
                                  </table></td>
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
    <td height="40" background="images/footer_bg.gif" align="center"><? include('footer.php')?></td>
  </tr>
</table>
</body>
</html>
<script type="text/javascript">
function validate4()
{
 
  if(document.getElementById("title").value=="")
  {
     alert("Enter Title");
	 document.getElementById("title").focus();
	 return false;
	 
  }
  if(document.getElementById("c_text").value=="")
  {
     alert("Enter Text");
	document.getElementById("c_text").focus();
     return false;
  }
}
</script>
