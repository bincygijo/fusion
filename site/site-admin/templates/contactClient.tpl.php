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
                            <td class="head"> Search </td>
                            <td width="4"><img src="images/head_curve_right.gif" alt="" width="4" height="33" /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="385" valign="top" class="border"><table width="725" border="0" align="center" cellpadding="0" cellspacing="0">
                         
						
				<tr>
            <td valign="top" colspan="2" align="center"></td>
          </tr>
		
                       
                          <tr>
                            <td><form id="form2" name="form2" method="post" action="" style="margin:0;">
                                <table width="569" border="0" align="center" cellpadding="2" cellspacing="0">
                                 <!-- <tr>
                                    <td class="tbtext">Ref.No</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="ref_number" id="ref_number" class="field2"   size="45"/></td>
                                  </tr>-->
                                  <tr>
                                    <td width="116" class="tbtext">&nbsp;</td>
                                    <td width="2">&nbsp;</td>
                                    <td width="439">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">School </td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="name" id="name" value=""  size="45"/></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>
									
                                    <input type="image" name="Search" value="Add" src="images/submit.gif" alt="" onclick="return validate();"  />
									<input type="hidden" name="Search" />
								</td>
                                  </tr>
                                </table>
                              </form></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
					
						
                          <tr>
                            <td>
							<? if(isset($_POST['Search']))
							{?>
							<table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#75bce1">
                                        <tr class="rowcolor1">
                                          <td height="20" class="tbhead">School</td>
                                          <td class="tbhead">Name</td>
                                        
                                          <td class="tbhead">Suburb</td>
                                          <td class="tbhead">State</td>
                                         
                                        </tr>
 <?
 /* if(isset($_POST['Search_x']))
{
$arrSearch		=	 $objS->search_school($search);
//print_r($msg) ;
}
   $search				= isset($_POST['name'])	? $_POST['name'] 	: ''; 
*/
   //$arrSearch		=	 $objS->search_school($search);
  //print_r($arrSearch);
   if(!empty($arrSearch)) { ?>
		  <? foreach($arrSearch as $key=>$value) { 
		  
		  
		  ?>
										
                                        <tr class="rowcolor2">
                                          <td height="20" class="tbtext">
                                           
                                          <a href="clientSheet.php?id=<?=$value['client_id'];?>"> <?=$value['school'];?> </a></td>
                                          <td class="tbtext"><?=$value['name'];?></td>
                                         
                                          <td align="center" class="tbtext"><?=$value['substreet'];?></td>
                                          <td align="center" class="tbtext"><?=$value['state'];?></td>
                                        
                                        </tr>
										<?php
		}
	} else {
?>
                                        <tr class="rowcolor2">
                                          <td colspan="6" class="tbtext"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td  align="center"><font color="#FF0000">No Record Found</font></td>
                                                <td align="right">&nbsp;</td>
                                              </tr>
                                            </table></td>
                                        </tr> <? }?>
                                      </table><? }?></td>
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
<script language="javascript">
function validate()
{
if(document.form2.name.value=="")
{
alert("Enter school name");
document.form2.name.focus();
return false;
}
}
</script>
</body>
</html>
