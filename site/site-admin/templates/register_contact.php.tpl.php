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
                            <td class="head"><strong>Register Interest (contacted)</strong></td>
                            <td width="4"><img src="images/head_curve_right.gif" alt="" width="4" height="33" /></td>
                          </tr>
                        </table></td>
                    </tr>
					
					
                    <tr>
                      <td valign="top" class="border">
					  <form name="form6" id="form6" action="" method="post">
					  	  					
					  <table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#75bce1">
                              <tr class="rowcolor1">
                                <td width="12%" class="tbhead" style="text-align: left;"><input type="checkbox" name="checkall" id="checkall" onClick="checkcon();" />First Name </td>
								<td width="11%" class="tbhead">Last&nbsp;Name</td>
                                <td width="12%" height="20" class="tbhead">School</td>
                                <td width="15%" class="tbhead">Email</td>
                                <td width="8%" class="tbhead">Number</td>
                                <td width="9%" class="tbhead">Country</td>
								<td width="7%" class="tbhead">No.of.
								Books</td>
								<td width="13%" class="tbhead">Description</td>
								<td width="5%" class="tbhead">View</td>
								<td width="7%" class="tbhead">Action</td>
                            </tr>
					<?php
					
	if(!empty($arrRegister_contact)){
  		foreach($arrRegister_contact as $key => $value){
		 	$email		=	$value['email'];
		$listEmail		=	$objU->getSchoolEmail($email);
		
?>			
								
                              <tr class="rowcolor2">
                                <td class="tbtext" width="12%"> <input type="checkbox" name="register_id[]" id="register_id[]" value="<?=$value['register_id'];?>" style=" float:left;"  /><?=$value['name'];?></td>
                                 <td height="20" class="tbtext"><?=$value['last_name'];?> </td>
								<td height="20" class="tbtext"><?=$value['school'];?> </td>
                                <td class="tbtext"><?=$value['email'];?></td>
                                <td align="center" class="tbtext"><?=$value['contact'];?></td>
                                <td align="center" class="tbtext"><?=$value['country'];?></td>
								<td align="center" class="tbtext"><?=$value['number_books']?></td>
								<td align="center" class="tbtext"><?
								$d		=	$value['description'];
							echo 	$ds		=	substr($d,0,20);
								
								?></td>
								<td align="center" class="tbtext"><a href="viewCont_reg.php?id=<?=$value['register_id']?>">View</a></td>
								<? if($listEmail=="") {?>
								<td align="center" class="tbtext"><a href="addClient_reg.php?id=<?=$value['register_id']?>"><img name="button" src="images/icon.jpg" value="Go back"  border="0"  style="cursor:pointer" alt="" title="Create new client"/></a></td>
								
								 <? }else{ ?>
								 <td width="1%" class="tbtext"></td>
								 <? }?>
                            </tr>
		<?  
			} 
		}
		?>
<tr class="rowcolor2">
                                          <td colspan="10" class="tbtext"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td></td>
                                                <td align="right"><input type="image"  src="images/remove.gif" alt="" width="69" height="21" name="contactus" onClick="return condelete();"/><input type="hidden" name="contactus"></td>
                                              </tr>
                                            </table></td>
                                        </tr>
                            </table>
					  </form>				     </td>
                    </tr>
					
					
					
					  <tr>
					    <td valign="top" class="border">&nbsp;</td>
				    </tr>
					  <tr>
					    <td valign="top" class="border"><b>Quote(Contacted)</b>	</td>
				    </tr>
					  <tr>
                      <td valign="top" class="border">
					  <form name="form7" id="form7" action="" method="post">
					  	  					
					  <table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#75bce1">
                              <tr class="rowcolor1">
                                <td width="17%" class="tbhead" style="text-align: left;"><input type="checkbox" name="checkall" id="checkall" onClick="checkquo();" />                                  Name </td>
								
                                <td width="15%" height="20" class="tbhead">School</td>
                                <td width="9%" class="tbhead">Email</td>
                                <td width="9%" class="tbhead">No.books</td>
                                <td width="9%" class="tbhead">No.pages</td>
								<td width="7%" class="tbhead">Budget</td>
								<td width="10%" class="tbhead">Comments</td>
								<td width="12%" class="tbhead">Description</td>
								<td width="5%" class="tbhead">View</td>
								<td width="6%" class="tbhead">Action</td>
                            </tr>
					<?php
					
	if(!empty($arrRegister_quote)){
  		foreach($arrRegister_quote as $key => $value){
		 	$email		=	$value['email'];
		$listEmail		=	$objU->getSchoolEmail($email);
		
?>			
								
                              <tr class="rowcolor2">
                                <td class="tbtext" width="17%"> <input type="checkbox" name="register_quoteid[]" id="register_quoteid[]" value="<?=$value['register_quoteid'];?>" style=" float:left;"  /><?=$value['name'];?></td>
                               
								<td height="20" class="tbtext"><?=$value['school'];?> </td>
                                <td class="tbtext"><?=$value['email'];?></td>
                                <td align="center" class="tbtext"><?=$value['nobooks'];?></td>
                                <td align="center" class="tbtext"><?=$value['nopages'];?></td>
								<td align="center" class="tbtext"><?=$value['budget']?></td>
								<td align="center" class="tbtext"><? 
								
								$com	=	$value['comments'];
								echo 	$commen		=	substr($com,0,20);
								?></td>
							<td align="center" class="tbtext">
							<? $des	=$value['description'];
							echo $descr	=	substr($des,0,20); ?>
							</td>
								<td align="center" class="tbtext"><a href="viewCont_quote.php?id=<?=$value['register_quoteid']?>">View</a></td>
								<? if($listEmail=="") {?>
								<td align="center" class="tbtext"><a href="addClient_quote.php?id=<?=$value['register_quoteid']?>"><img name="button" src="images/icon.jpg" value="Go back"  border="0"  style="cursor:pointer" alt="" title="Create new client"/></a></td>
								
								 <? }else{ ?>
								 <td width="1%" class="tbtext"></td>
								 <? }?>
                            </tr>
		<?  
			} 
		}
		?>
<tr class="rowcolor2">
                                          <td colspan="10" class="tbtext"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td></td>
                                                <td align="right"><input type="image"  src="images/remove.gif" alt="" width="69" height="21" name="quote" onClick="return quodelete();"/><input type="hidden" name="quote"></td>
                                              </tr>
                                            </table></td>
                                        </tr>
                            </table>
					  </form>				     </td>
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
 
 
 function condelete(){
	var	a			= 	document.form6;
	var countChecked= 	0;
	
	
	
	
	for(var i = 0; i < document.getElementById('form6').elements.length ; i++){	
		if(document.getElementById('form6').elements[i].checked == true){
			countChecked=countChecked+1;
		}
	}	
	if(countChecked != 0){
		var x=confirm("Do you want to remove ?");
		if(x == true)
			return true;
		else
			return false;
	}else{
		alert("You must select atleast one ");
		return false;
	}
	return false;		
}

checked = false;
function checkcon () {
	if (checked == false){
		checked = true
	}else{
		checked = false
	}
	for (var i = 0; i < document.getElementById('form6').elements.length; i++) {
		document.getElementById('form6').elements[i].checked = checked;
	}
}


 
 
 //
 
 function quodelete(){
	var	a			= 	document.form7;
	var countChecked= 	0;
	
	
	
	
	for(var i = 0; i < document.getElementById('form7').elements.length ; i++){	
		if(document.getElementById('form7').elements[i].checked == true){
			countChecked=countChecked+1;
		}
	}	
	if(countChecked != 0){
		var x=confirm("Do you want to remove ?");
		if(x == true)
			return true;
		else
			return false;
	}else{
		alert("You must select atleast one ");
		return false;
	}
	return false;		
}

checked = false;
function checkquo () {
	if (checked == false){
		checked = true
	}else{
		checked = false
	}
	for (var i = 0; i < document.getElementById('form7').elements.length; i++) {
		document.getElementById('form7').elements[i].checked = checked;
	}
}

 //quote
 
 
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
	


//delete


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
