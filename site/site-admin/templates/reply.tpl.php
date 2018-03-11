<?php
 $m		=	$_GET['ms'];
  $text		=	$_POST['c_text'];
  $from		=	$_POST['from'];
  $content		=	$listEmail['email_content'];
if($text=="")
{
 $editor_content		=	$content;
 //echo  $submit	= 'Save';
}
else
{
 $editor_content		=	$text.'<br>'.$content;
  //echo $submit	= 'Add';
  
}
?>

<script type="text/javascript" src="openwysiwyg/scripts/wysiwyg.js"></script>
<script type="text/javascript" src="openwysiwyg/scripts/wysiwyg-settings.js"></script>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fusion Books</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />

</head>


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
                <td valign="top"><table width="540" border="0" cellspacing="0" cellpadding="0" class="border_box">
                  <tr>
                    <td height="30">&nbsp;</td>
                  </tr>
                  <form id="form1" name="form1" method="post" action="">
                    <tr>
                      <td><table width="500" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#75bce1">
                          <tr class="rowcolor2">
                            <td width="131" class="tbtext">From</td>
                            <td width="189" class="tbtext"><?=$listEmail['email_from'];?></td>
                          </tr>
                          <tr class="rowcolor2">
                            <td class="tbtext">Subject</td>
                            <td class="tbtext"><?=$listEmail['email_subject'];?></td>
                          </tr>
                          <tr class="rowcolor2">
                            <td class="tbtext">Content</td>
                            <td class="tbtext"><?=nl2br(stripslashes($listEmail['email_content']));?></td>
                          </tr>
                          <?
	// else{
	?>
                          <!--<tr class="rowcolor2"><td colspan="3" align="center"><font color="#FF0000">No data found!</font></td></tr>-->
                          <? // }?>
                      </table></td>
                    </tr>
                    <tr>
                      <td align="center"><font color="#FF0000"><? if($m){ echo "Mail send successfully!";}?></font></td>
                    </tr>
                    <tr>
                      <td><table width="400" border="0" align="center" cellpadding="2" cellspacing="0">
                          <tr>
                            <td class="tbtext">To</td>
                            <td width="2" class="tbtext">&nbsp;</td>
                            <td><label>
                              <input name="emailto" type="text" class="field2" value="<?=$listEmail['email_from'];?>" readonly=""  size="80"/>
                            </label></td>
                          </tr>
                          <tr>
                            <td class="tbtext">From</td>
                            <td width="2" class="tbtext">&nbsp;</td>
                            <td><select name="from" id="from" class="listmenu2">
                                <option value="info@fusionbooks.com.a" <? if($_POST['from']=='info@fusionbooks.com.a') { echo "selected";}?>>info@fusionbooks.com.au</option>
                                <option value="melanie@fusionbooks.com.au" <? if($_POST['from']=='melanie@fusionbooks.com.au') { echo "selected";}?>>melanie@fusionbooks.com.au </option>
                                <option value="cliff@fusionbooks.com.au" <? if($_POST['from']=='cliff@fusionbooks.com.au') { echo "selected";}?>>cliff@fusionbooks.com.au</option>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td class="tbtext">Canned&nbsp;Text </td>
                            <td class="tbtext">&nbsp;</td>
                            <td><select name="c_text"  id="c_text" class="listmenu2" onChange="c_change(this.value)">
							<option value="">Select Canned Text</option>
                                <?php
		     foreach($cdata as $key=>$value)
			{
			?>
                                <option value="<?php echo $value['c_text'];?>" <? if($value['c_text']==$text){ echo "selected";}?>><?php echo $value['title'];?></option>
                                <?php
			 }
			 ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td class="tbtext">Message</td>
                            <td class="tbtext">&nbsp;</td>
                            <td class="tbtext" ><textarea name="editor" id="editor" style="height: 270px;"><?=$editor_content;?>
								
                </textarea>
                                <script type="text/javascript">
	WYSIWYG.attach('editor', full); // full featured setup
                  </script>
                            </td>
                          </tr>
                          <tr>
                            <td class="tbtext">&nbsp;</td>
                            <td class="tbtext">&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td height="35" valign="bottom"><input type="image" name="add" img="img" src="images/save.gif" alt="" width="69" height="21" onClick="return function1();"/>
                               <img name="button" src="images/back.jpg" style="cursor:pointer" value="Go back" onClick="history.go(-1);"  />
                             <? //if($submit=='Add') { ?><!--<input type="hidden" name="save" value="<?=$submit?>" />--><? //}else{?>
								<input type="hidden" name="wadd"  value="Submit" /><? //}?>
                            </td>
                          </tr>
                      </table></td>
                    </tr>
                  </form>
                  <tr>
                    <td height="30">&nbsp;</td>
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
<script language="javascript">
function c_change(str)
{ 
//alert(str);
document.form1.submit();

 // var editorj=document.getElementById("hideditor").value;
 // var ed	=	str+"\n\n\n\n"+editorj;
//   alert(ed);
// document.getElementById("editor").value=ed;

 
  
//alert(document.getElementById("editor").value);
}
</script>
