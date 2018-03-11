<?php
//print_r($arrDetails);
?>
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
		var x=confirm("Do you want to remove?");
		if(x == true)
			return true;
		else
			return false;
	}else{
		alert("You must select atleast one");
		return false;
	}
	return false;		
}
</script>
<form name="form1" id="form1" method="post" action="">
<table width="699" border="0" style="border:1px solid #4674a4;">
	<tr>
		<td width="80"><b>Needs contact today</b></td>
		<td width="20"></td>
		<td width="129"><strong>Name</strong></td>
		<td width="79"><strong>School</strong></td>
		<td width="90"><strong>Email</strong></td>
		<td width="80"><strong>Number</strong></td>
		<td width="92"><strong>Notes</strong></td>
		<td width="39"></td>
		<td width="50"></td>
	</tr>
<?php
	if(!empty($arrEntry)){
		foreach($arrEntry as $key => $value){
?>
	<tr>
		<td width="80">&nbsp;</td>
		<td><input type="checkbox" name="client_id[]" id="client_id[]" value="<?=$value['client_id'];?>"  /></td>
		<td><?=$value['name'];?></td>
		<td><?=$value['school'];?></td>
		<td><?=$value['email'];?></td>
		<td><?=$value['contact'];?></td>
		 <td><?=$value['entry_desc'];?></td>
		 <td><a href="editClient.php?id=<?=$value['client_id'];?>">Edit</a></td>
		<td><!--<a href="removeClient.php" onclick="return check();">Remove</a>--></td>
	</tr> 
<?php
		}
	}
?>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><input type="submit" name="remove" value="Remove" onclick="return check();"/></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table>
<form>
<br><br><br>
<table width="699" border="0" style="border:1px solid #4674a4;">
	<tr>
		<td width="77"><p><strong>Needs sample</strong><strong>books sent</strong> </p></td>
		<td width="38"><strong>Ref#</strong></td>
		<td width="66"><strong>Name</strong></td>
		<td width="73"><strong>School</strong></td>
		<td width="43"><strong>Street Add</strong></td>
		<td width="58"><strong>Suburb</strong></td>
		<td width="58"><strong>Country</strong></td>
		<td width="58"><strong>State</strong></td>
		<td width="58"><strong>Postcode</strong></td>
		<td width="58"><strong>Notes sent</strong></td>
	</tr>
<?php
	if(!empty($arrDetails)){
  		foreach($arrDetails as $key => $value){
?>
	<tr>
		<td width="77">&nbsp;</td>
		<td>&nbsp;</td>
		<td><?=$value['name'];?></td>
		<td><?=$value['school'];?></td>
		<td><?=$value['street'];?></td>
		<td><?=$value['substreet'];?></td>
		<td><?=$value['country'];?></td>
		<td><?=$value['state'];?></td>
		<td><?=$value['postal'];?></td>
		<td>&nbsp;</td>
	</tr>
<?php
		}
	}
?>
  	<tr><td colspan="10" align="right"><a href="clientcsv.php">DOWNLOAS AS CSV</a></td></tr>
</table>
<br><br><br>
<table width="699" border="0" style="border:1px solid #4674a4;">
	<tr>
		<td width="108" rowspan="2">
			<p><strong>Need to be</strong></p>
			<p><strong> contacted</strong></p>
			<p><strong>soon</strong> </p>
		</td>
		<td width="109"><strong>Name</strong></td>
		<td width="156"><strong>School</strong></td>
		<td width="117"><strong>Email</st></td>
		<td width="80"><strong>Number</strong></td>
		<td width="101"><strong>Notes</strong></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table>