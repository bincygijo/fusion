<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fusion Books</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body style="background:none;">
<?php
if($status == 'E')
$login = "Editors";
else if($status == 'C')
$login = "Contributors";
else if($status == 'P')
$login = "Contact Persons";

?>

<table width="640" border="0" cellspacing="0" cellpadding="0" class="border_box">
  <tr>
    <td height="30">&nbsp;</td>
  </tr>
  <form id="editors_detail" name="editors_detail" method="post" action="" style="margin:0;">
  <tr>
    <td><table width="550" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#1096D6">
      <tr>
        <td height="25" class="head"> <?php echo $login; ?> Login Details</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"></td>
  </tr>
  
  <tr>
    <td>
	<table width="550" border="0">
  <tr>
    <td></td>
  </tr>
</table>

	<?PHP 
	if($status != 'P')
	{
	?>
	<table width="550" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#75bce1">
      <tr class="rowcolor1">
        <td width="30" class="tbhead">Sl No</td>
        <td class="tbhead">First Name</td>
        <td class="tbhead">Surname</td>
        <td class="tbhead">Username</td>
        <td class="tbhead">Password</td>
        <td class="tbhead">Notes</td>
      </tr>
	   <?php
  	if($values	 != "")
	{
		$num = 1 ;
		while($result =mysql_fetch_array($values))
		{
  ?>
      <tr class="rowcolor2">
        <td align="center" class="tbtext"><?php echo $num++ ;?></td>
        <td class="tbtext"><?php echo $result['firstname'] ;?></td>
        <td class="tbtext"><?php echo $result['surname'] ;?></td>
        <td class="tbtext"><?php echo $result['username'] ;?></td>
        <td class="tbtext"><?php echo $result['password'] ;?></td>
        <td class="tbtext"><?php echo $result['notes'] ;?> </td>
      </tr>
	  <?php
  	}
  }
  else
  {
  ?>
  <tr class="rowcolor2">
    <td colspan="6" align="center">No Login Exist!!</td>
	</tr>
  <?php
  }
  ?>
  
      <tr class="rowcolor2">
        <td colspan="6" align="right" class="tbtext">   <img name="button" src="images/close.jpg" value="Go back" onClick="window.close();" style="cursor:pointer"/>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:show();">add+</a></td>
        </tr>
    </table>
	<?PHP
	}
	else
	{
		$contactQry = mysql_query("select name from client_fusion where client_id = '$Cid' ");
		$resultQry  = mysql_fetch_array($contactQry);
		$result2 = mysql_fetch_array($values2);
	?>
		
		<table width="550" border="0" align="center"  class="" >
		 <tr class="rowcolor2">
        <td class="tbtext" align="right">Contact  Name</td>
        <td>&nbsp;&nbsp;<input name="contact" id="contact" readonly="" type="text" value="<?php echo $resultQry['name']; ?>" class="field2" /></td>
      </tr>
		 <tr class="rowcolor2">
        <td class="tbtext" align="right">Username</td>
        <td>&nbsp;&nbsp;<input name="Pusername" id="Pusername" type="text" value="<?php echo $result2['username'] ;?>" class="field2" /></td>
      </tr>
      <tr class="rowcolor2">
        <td class="tbtext" align="right">Password</td>
        <td>&nbsp;&nbsp;<input name="Ppassword" id="Ppassword" type="password" value="<?php echo $result2['password'] ;?>"  class="field2" /></td>
      </tr>
		
		 <tr class="rowcolor2">
    <td colspan="6" align="center"><input type="hidden" name="add" value="1" /><img src="images/add.gif" onclick="return validate2();" alt="" name="add" id="add" width="49" height="21"  style="cursor:pointer"/>&nbsp;&nbsp;  <img name="button" src="images/close.jpg" value="Go back" onClick="window.close();" style="cursor:pointer"  /> </td>
	</tr>
	</table>
	<?php
	}
	?>
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="300" border="0" id="add_box" align="center" cellpadding="2" cellspacing="0">
      <tr>
        <td class="tbtext">First Name</td>
        <td width="2" class="tbtext">&nbsp;</td>
        <td><label>
          <input name="firstname" id="firstname" type="text" class="field2" />
        </label></td>
      </tr>
      <tr>
        <td class="tbtext">Surname</td>
        <td class="tbtext">&nbsp;</td>
        <td><input name="surname" id="surname" type="text" class="field2" /></td>
      </tr>
      <tr>
        <td class="tbtext">Username</td>
        <td class="tbtext">&nbsp;</td>
        <td><input name="username" id="username" type="text" class="field2" /></td>
      </tr>
      <tr>
        <td class="tbtext">Password</td>
        <td class="tbtext">&nbsp;</td>
        <td><input name="password" id="password" type="password"  class="field2" /></td>
      </tr>
      <tr>
        <td class="tbtext">Notes</td>
        <td class="tbtext">&nbsp;</td>
        <td><label>
          <textarea id="notes" name="notes" class="textarea"></textarea>
        </label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td height="35" valign="bottom"><input type="hidden" name="add" value="1" /><img src="images/add.gif" onclick="return validate();" alt="" name="add" id="add" width="49" height="21" /></td>
      </tr>
    </table></td>
  </tr>
  <input type="hidden" name="Cid" id="Cid" value="<?php echo $Cid; ?>" />
<input type="hidden" name="status" id="status" value="<?php echo $status; ?>" />

  </form> 
  <tr>
    <td height="30">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<script type="text/javascript">
var target = document.getElementById('add_box');
 target.style.display = 'none';

function show()
{
	 var targetElement = document.getElementById('add_box');
 targetElement.style.display = 'block';

}
function validate()
{
	if(document.getElementById("firstname").value == "")
	{
		alert("Enter First Name");
		document.getElementById("firstname").focus();
		return false
	}
	if(document.getElementById("surname").value == "")
	{
		alert("Enter SurName");
		document.getElementById("surname").focus();
		return false
	}
		if(document.getElementById("username").value == "")
	{
		alert("Enter UserName");
		document.getElementById("username").focus();
		return false
	}
	if(document.getElementById("password").value == "")
	{
		alert("Enter Password");
		document.getElementById("password").focus();
		return false
	}
	
document.editors_detail.action = "editors_detail.php";
document.editors_detail.submit();
}
function validate2()
{

var id	=	document.getElementById("Cid").value;
var str	=	document.getElementById("status").value;

if(document.getElementById("Pusername").value == "")
	{
		alert("Enter username");
		document.getElementById("Pusername").focus();
		return false
	}


if(document.getElementById("Ppassword").value == "")
	{
		alert("Enter password");
		document.getElementById("Ppassword").focus();
		return false
	}
document.editors_detail.action = "editors_detail.php";
document.editors_detail.submit();

}

</script>
