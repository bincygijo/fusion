<?
include("loginchk.php");
include_once '../../config/config.inc.php';
if(isset($_POST['move']))
{
//echo "hi";
}

?>

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
                            <td class="head"><strong>Potential Clients</strong></td>
                            <td width="4"><img src="images/head_curve_right.gif" alt="" width="4" height="33" /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="385" valign="top" class="border">
					  <form name="form1" id="form1" action="" method="post">
					  	  <table width="90%" align="center" border="0">
                              <tr>
							  <td align="center"></td>
							  </tr>
						  </table>	  					
					  <table width="90%" align="center"  border="0" cellpadding="4" cellspacing="1" bgcolor="#75bce1">
				
                              <tr class="rowcolor1">
							  <td width="7%" align="center" class="tbhead" style="text-align: left;"><input type="checkbox" name="chk" id="checkall"  onclick="checkedAll();"/></td>
                                <td width="13%" align="center" class="tbhead">School</td>
								 <td width="13%" align="center" class="tbhead">Client&nbsp;Name</td>
                                 <td width="22%" height="20" align="center" class="tbhead">Email</td>
								  <td width="14%" align="center" class="tbhead">Contact&nbsp;Number </td>
								   <td width="14%" align="center" class="tbhead">Action </td>
								    <td width="14%" align="center" class="tbhead">Date </td>
									 <td width="14%" align="center" class="tbhead">Description </td>
                               <!-- <td width="14%" align="center" class="tbhead">Remove </td>-->
                              
                           <!--     <td width="20%" align="center" class="tbhead">&nbsp;</td>
								<td width="11%" align="center" class="tbhead">&nbsp;</td>-->
                                <?
						$result 			=	$objU->notDeposted();		
						//print_r($result);
				  		if(!empty($result))
						{
						foreach($result as $key=>$value)
						{
						$date		=	$value['date'];
						$c_id		=	$value['client_id'];
						$school	=	$value['school'];
						$exp_date		=	explode("-",$date);
						$date_pot		=	$exp_date[2]."/".$exp_date[1]."/".$exp_date[0];

					  $actionid	=	$value['entry_actionid'];
				$listAction		= 	$objU->getActionvalue($actionid);
				//print_r($listAction);
				 $action_name	=	$listAction['entry_action'];
				   ?>
                              <tr class="rowcolor2" id="">
							    <td width="7%" align="center" class="tbhead">							      <input type="checkbox" name="client_id[]" id="client_id[]" value="<?=$value['client_id'];?>" style=" float:left;"  />	<input type="hidden" name="action_id" id="action_id" value="<?=$value['entry_actionid'];?>" />					        </td>
							    <td class="tbtext" align="center"><?=$value['school_name']; ?></td>
								 <td class="tbtext" align="center"><?=$value['contact_name']; ?></td>
                                <td height="20" class="tbtext" align="center"><?=$value['email']; ?></td>
                                <td class="tbtext" align="center"><?=$value['contact']; ?></td>
								<td  class="tbtext" align="center"><?=$action_name;?></td>
								<td  class="tbtext" align="center"><?=$date_pot;?></td>
								<td  class="tbtext" align="center"><?=$value['entry_desc'];?></td>
                             <!-- <td  class="tbtext" align="center"><a href="javascript:openWin('potentialClientadd.php?id=<?=$value['client_id'];?>&action_id=<?=$value['entry_actionid']?>')" onclick="return validate();">Remove</a></td>-->
                                
                            </tr>
					<!--<tr class="rowcolor2">
						  <td colspan="7" align="right" class="tbtext"><input type="image"  src="images/remove.gif" alt="" width="69" height="21" name="remove" onClick="return check();"/></td>
						  </tr>-->
				<?
					}	}?>
						
						<tr class="rowcolor2">
                                   <td colspan="9" align="right">&nbsp; <input type="image" name="move" src="images/move_client.gif" alt="" width="133" height="21"  onclick="return validate2();"/>&nbsp;&nbsp;<input type="image" name="sent" src="images/remove.gif" alt="" width="69" height="21"  onclick="return validate1();"/></td>
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
    <td height="40" background="images/footer_bg.gif" align="center"><? include('footer.php')?></td>
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




//checking for move validation



function validate2(){	
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
			
			
			mywindow	=	window.open("moveclient.php?cid="+passString+"&act="+acid,"mywindow","status=1,scrollbars=1,width=550,height=400");
				
		mywindow.moveTo(500,400);		
		}
		}
	}	
	
	if(countChecked==0)
	{
	alert("Do you want to move ?You must select atleast one client");
	}
	
	}
	


</script>


</body>
</html>
<script type="text/javascript">

/*function validate()
{
	if(document.getElementById("Year").value == "")
}*/

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
