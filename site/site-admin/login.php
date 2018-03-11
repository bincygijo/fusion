<?
include_once '../../config/config.inc.php';
include_once 'classes/admin.class.php';
$objA			= new admin();
$msg 			= isset($_REQUEST['msg'])		? $_REQUEST['msg']	: '';
	if(isset($_POST['submit']) && $_POST['submit']=='Sign In')
	{
		$msg		= $objA->admin_login($_POST);
		if($msg=='')
		header('location:home.php');
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fusion Books</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body style="background: none;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="500"><table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><table width="100%" border="0" cellpadding="0" cellspacing="0" background="images/login_head_bg.gif">
              <tr>
                <td width="4"><img src="images/login_curve_left.gif" alt="" width="4" height="33" /></td>
                <td class="head"> Login </td>
                <td width="4"><img src="images/login_curve_right.gif" alt="" width="4" height="33" /></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td class="border">&nbsp;</td>
        </tr>
        <tr>
          <td class="border"><form id="form1" name="form1" method="post" action="" style="margin:0;">
            <table width="230" border="0" align="center" cellpadding="4" cellspacing="0">

              <tr>
                <td class="tbtext"><strong>Username</strong></td>
                <td width="150"><input name="adminusername" type="text" class="field" /></td>
              </tr>
              <tr>
                <td class="tbtext"><strong>Password</strong></td>
                <td><input name="adminpwd" type="password" class="field" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input type="image"  name="submit" src="images/login.gif" alt="" width="69" height="21" onclick="return check()" /><input type="hidden" name="submit" value="Sign In" onclick="return check()" /></td>
              </tr>
            </table>
          </form></td>
        </tr>
        <tr>
          <td class="border">&nbsp;</td>
        </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="4"><img src="images/curve_bottom_left.gif" width="4" height="4" /></td>
                <td background="images/bottom_pic.gif"><img src="templates/images/bottom_pic.gif" alt="" width="1" height="4" /></td>
                <td width="4"><img src="images/curve_bottom_right.gif" alt="" width="4" height="4" /></td>
              </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>
<script language="javascript">
function check()
{
	var data1	= Trim(document.form1.adminusername.value);
	var data2	= Trim(document.form1.adminpwd.value);
	if((data1=="") || (data1==0))
	{
		alert ("Please enter the userame!");
		document.form1.adminusername.focus();
		return false;
	}
	if(data2=="") 
	{
		alert ("Please enter the password!");
		document.form1.adminpwd.focus();
		return false;
	}
}
</script>
</body>
</html>
