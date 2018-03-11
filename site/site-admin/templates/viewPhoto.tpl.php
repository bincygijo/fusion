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
                            <td class="head"><strong>View Photo </strong></td>
                            <td width="4"><img src="images/head_curve_right.gif" alt="" width="4" height="33" /></td>
                          </tr>
                        </table></td>
                    </tr>
					<?php if($msg!='') { ?>
				<tr>
            <td valign="top" colspan="2" align="center" class="tbtext border"><font color="<?=$color?>"><?=$msg?></font></td>
          </tr>
			<?php } ?>
                    <tr>
                      <td height="385" valign="top" class="border">
					  <form name="form1" id="form1" action="" method="post">
					  	  <table width="90%" align="center" border="0">
                              <tr>
							  <td align="center"></td>
							  </tr>
						  </table>	  					
					  <table width="88%" align="center"  border="0" cellpadding="4" cellspacing="1" bgcolor="#75bce1">
				
                              <tr class="rowcolor1">
							 <!-- <td width="8%" align="center" class="tbhead" style="text-align: left;"><input type="checkbox" name="chk" id="checkall"  onclick="checkedAll();"/></td>-->
                                <td width="22%" align="center" class="tbhead">Photo</td>
								 <td width="30%" align="center" class="tbhead">Pop-up Description</td>
								 <td width="30%" align="center" class="tbhead">Description</td>
								 <td width="30%" align="center" class="tbhead">School Name</td>
                                 <td width="40%" height="20" align="center" class="tbhead">Edit</td>
								  
                               <td width="14%" align="center" class="tbhead">Delete </td>
                              
                           <!--     <td width="20%" align="center" class="tbhead">&nbsp;</td>
								<td width="11%" align="center" class="tbhead">&nbsp;</td>-->
                                <?php
							
						if(!empty($arrPhoto))
						{
						foreach($arrPhoto as $key=>$value)
						{
						
					 
				   ?>
                              <tr class="rowcolor2" id="">
							    <!--<td width="8%" align="center" class="tbhead">							      <input type="checkbox" name="client_id[]" id="client_id[]" value="<?=$value['photo_id'];?>" style=" float:left;"  />	        </td>-->
							    <td class="tbtext" align="center"><img src="upload/<?=$value['photo_name']; ?>  "  width="50px" height="50px" /></td>
								 <td class="tbtext" align="center"><?=$value['photo_desc']; ?></td>
								  <td class="tbtext" align="center"><?=$value['description']; ?></td>
								  <td class="tbtext" align="center"><?=$value['school_name']; ?></td>
                                <td height="20" class="tbtext" align="center"><a href="editPhoto.php?id=<?=$value['photo_id']?>">Edit</a></td>
                              
                             <td  class="tbtext" align="center"><a href="deletePhoto.php?id=<?=$value['photo_id']?>&name=del" onclick="return del();">Delete</a></td>
                            </tr>
					<!--<tr class="rowcolor2">
						  <td colspan="7" align="right" class="tbtext"><input type="image"  src="images/remove.gif" alt="" width="69" height="21" name="remove" onClick="return check();"/></td>
						  </tr>-->
				<?php
					}	}?>
						
						<tr class="rowcolor2"> 
                                  <td colspan="8" align="left"><a href="photoUpload.php"><img src="images/add_photo.jpg" border="o" style="cursor:pointer" /></a><!--<input type="image" name="sent" src="images/remove.gif" alt="" width="69" height="21"  onclick="return check();"/><input type="hidden" name="sent" />--></td>
                                
						</tr>
						<? //}?>
                          </table>
					  </form>
					  
				     </td>
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
function check(){	
	var	a			= 	document.form1;
	var countChecked= 	0;
	for(var i = 0; i < document.getElementById('form1').elements.length ; i++){	
		if(document.getElementById('form1').elements[i].checked == true){
			countChecked=countChecked+1;
		}
	}	
	if(countChecked != 0){
		var x=confirm("Do you want to delete");
		if(x == true)
			return true;
		else
			return false;
	}else{
		alert("You must select atleast one photo");
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


</script>

 <script language="javascript">
function validate1(){	
//alert("hi");
	var	a			= 	document.form1;
	var passString	= "";
	var countChecked= 	0;
	for(var i = 0; i < document.getElementById('form1').elements.length ; i++){	
	
	if(document.getElementById('form1').elements[i].name=='client_id[]')
	{
	
	
		if(document.getElementById('form1').elements[i].checked == true){
		
		
			countChecked=countChecked+1;
			cid = document.getElementById('form1').elements[i].value;
			acid	=	document.getElementById('action_id').value;
		
			passString = passString + cid + "-";
			//alert(passString);
			mywindow	=	window.open("potential.php?cid="+passString+"&act="+acid,"mywindow","status=1,scrollbars=1,width=550,height=400");
				
		mywindow.moveTo(500,400);		
		}
		}
	}	
	
	if(countChecked==0)
	{
	alert("Do you want to remove?You must select atleast one client");
	}
	
	}
	


	
	
 //mywindow = window.open ("proposalAddress.php?name="+id+"&ds="+dis,"mywindow","status=1,scrollbars=1,width=450,height=400");


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


</script>


</body>
</html>
<script type="text/javascript">

function del()
{
	var x	= confirm("Do you want to delete?");
	if(x==true)
	{
	return true;
	}
	else
	return false;
}

</script>

<script language="javascript" type="text/javascript">
	function validate()
	{
		var x=confirm("Do you want to remove the potential client?");
		if(x==true)
		return true;
		else
		return false;
	}
</script>
<SCRIPT LANGUAGE="JavaScript">
function openWin(URL){aWindow=window.open(URL,"theWindow","height=400,width=600,left=200,top=100,scrollbars=yes");}
</SCRIPT>
