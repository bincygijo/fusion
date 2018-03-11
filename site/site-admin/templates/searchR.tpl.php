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
                <td width="220" valign="top">
				 <?php include_once 'left_side.tpl.php'; ?>
				</td>
				  
                <td valign="top"><table width="767" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#0d76aa">
                          <tr>
                            <td width="4"><img src="images/head_curve_left.gif" alt="" width="4" height="33" /></td>
                            <td class="head"> Search Result </td>
                            <td width="4"><img src="images/head_curve_right.gif" alt="" width="4" height="33" /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="400" valign="top" class="border"><table width="725" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td class="subhead">Search Result</td>
                          </tr>
                          <tr>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td><form id="form1" name="form1" method="post" action="" style="margin:0;">
                                      <table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#75bce1">
                                        <tr class="rowcolor1">
                                          <td height="20" class="tbhead">School</td>
                                          <td class="tbhead">Name</td>
                                        
                                          <td class="tbhead">Suburb</td>
                                          <td class="tbhead">State</td>
                                         
                                        </tr>
 <?
  if(isset($_POST['Search_x']))
{
$arrSearch		=	 $objS->search_school($search);
//print_r($msg) ;
}
   $search				= isset($_POST['name'])	? $_POST['name'] 	: ''; 

   //$arrSearch		=	 $objS->search_school($search);
  //print_r($arrSearch);
   if(!empty($arrSearch)) { ?>
		  <? foreach($arrSearch as $key=>$value) { 
		  
		  
		  ?>
										
                                        <tr class="rowcolor2">
                                          <td height="20" class="tbtext">
                                           
                                           <?=$value['school'];?> </td>
                                          <td class="tbtext"><?=$value['name'];?></td>
                                         
                                          <td align="center" class="tbtext"><?=$value['substreet'];?></td>
                                          <td align="center" class="tbtext"><?=$value['state'];?></td>
                                        
                                        </tr>
										<?php
		}
	}
?>
                                        <tr class="rowcolor2">
                                          <td colspan="6" class="tbtext"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td><a href="#" class="select"> </a></td>
                                                <td align="right"><input type="image"  src="images/remove.gif" alt="" width="69" height="21" name="remove" onclick="return check();"/></td>
                                              </tr>
                                            </table></td>
                                        </tr>
                                      </table>
                                    </form></td>
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
    <td height="57" background="images/footer_bg.gif">&nbsp;</td>
  </tr>
</table>
</body>
</html>

 <script language="javascript">
function check(){	
	var	a			= 	document.form1;
	var countChecked= 	0;
	for(var i = 0; i < document.getElementById('form1').elements.length ; i++){	
		if(document.getElementById('form1').elements[i].checked == true){
			countChecked=countChecked+1;
		}
	}	
	if(countChecked != 0){
		var x=confirm("Do you contact that person?");
		if(x == true)
			return true;
		else
			return false;
	}else{
		alert("You must select atleast one client");
		return false;
	}
	return false;		
}

checked = false;
function checkedAll () {
	if (checked == false){
		checked = true
	}else{
		checked = false
	}
	for (var i = 0; i < document.getElementById('form1').elements.length; i++) {
		document.getElementById('form1').elements[i].checked = checked;
	}
}

checked = false;
function checking () {
	if (checked == false){
		checked = true
	}else{
		checked = false
	}
	for (var i = 0; i < document.getElementById('form2').elements.length; i++) {
		document.getElementById('form2').elements[i].checked = checked;
	}
}
</script>