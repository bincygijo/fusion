<?php
 $cId = $_REQUEST['Cid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fusion Books</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/pop-up.js"></script>
<link href="js/popcalendar.css" rel="stylesheet" type="text/css">
</head>
<body  style="background:none;">
<table width="70%"  id="conversation" cellpadding="4" cellspacing="1" bgcolor="#75bce1" align="center">
	 <tr class="rowcolor1">
		<td width="9%" class="tbhead">No</td>
		<td width="29%" class="tbhead">Date</td>
		<td width="62%" class="tbhead">Conversation</td>
	</tr>
	 <?php
	   $num=1;
	   while($list = mysql_fetch_array($result))
	   {
	  ?>
	 <tr class="rowcolor2" >
		<td class="tbtext"><?php echo $num++; ?></td>
		<td class="tbtext"><?php echo $list['date']; ?></td>
		<td class="tbtext"><?php echo $list['conversation']; ?></td>
	 </tr>
		 <?php
		 }
		?>
	<tr class="rowcolor2" bgcolor="#FFFFFF">
		<td colspan="3" align="right"> <img name="button" src="images/close.jpg" value="Go back" onClick="window.close();" style="cursor:pointer"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:show();">Add New</a></td>
	</tr>
</table>
						
<form name="conversation" action="add_conversation.php" method="post" id="conversation">
<table width="58%" border="0" id="add_box" align="center" cellpadding="2" cellspacing="0">
      <tr>
        <td class="tbtext">Date</td>
        <td class="tbtext">&nbsp;</td>
        <td><input type="text" name="con_date" id="con_date" value="<? echo date('Y-m-d')//$listUser['con_date'];?>" class="field2" /><!--<a href="javascript:;" name="AnchorTo" id="AnchorTo" onClick="popUpCalendar(conversation.image3,document.getElementById('con_date'), 'yyyy-mm-dd')"><img src="js/images/calendar.gif" alt="Date Selector" name="image3" width="20" height="20" hspace="3" border="0" align="absmiddle" id="image3" onMouseOver="window.status='Pop up a calendar to select a date';return true" onMouseOut="window.status='';return true;"></a><script language="javascript" src="js/datecal.js"></script>--><a href="javascript:showCal('Calendar8')"> <img src="images/cal.gif" width="19" height="17" border="0" /></a></td>
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
</table>
<input type="hidden" name="Cid" value="<?php echo $cId; ?>" />
</form>
<br />
</body>
</html>
</script>
<script language="javascript" src="js/cal2.js">
</script>
<script language="javascript" src="js/cal_conf2.js"></script>

<script type="text/javascript">
var target = document.getElementById('add_box');
 target.style.display = 'none';

function show(id)
{
	 var targetElement = document.getElementById('add_box');
 targetElement.style.display = 'block';
}
function validate()
{
document.conversation.submit();
}

</script>