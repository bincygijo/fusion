<?
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
include_once 'classes/production.class.php';
$objP			=	new production();
 $clientId		=	$_GET['id'];

$arrOrderform		=	$objP->orderform($clientId);
$paper_id		=	$arrOrderform['paper_id'];
 $cover_id		=	$arrOrderform['cover_id'];
 $bind_id	=	$arrOrderform['bind_id']; 
 $laminate_id		=	$arrOrderform['lamp_id']; 
 $deliver_id		=	$arrOrderform['book_id']; 
$paper				=	$objP->getpaper($paper_id);
$cover				=	$objP->getcover($cover_id);
$binding		=	$objP->getbinding($bind_id);
$laminate		=	$objP->getlaminate($laminate_id);
$deliverd		=	$objP->getdelivered($deliver_id);
//$paper		=	$db->getTableValue("");

//print_r($binding);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fusion</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.fillout {
	color: #000000;
	border-width: 0;
	border-bottom: 1px solid #000000;
	width: 350px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 13px;
}
h3 {
	font-family:"Times New Roman", Times, serif;
	text-decoration: none;
	color: #000000;
}
.disc {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 13px;
	font-weight: bold;
	text-decoration: none;
	color: #000000;
}
-->
</style>
</head>

<body>
<table width="63%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><h3>Order Form</h3></td>
  </tr>
  <tr>
    <td height="1" bgcolor="#000000"></td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>
  <tr>
    <td><form id="form1" name="form1" method="post" action="">
      <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">

        <tr>
          <td align="left" class="disc">&nbsp;</td>
          <td class="disc">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="left" class="disc">School Name</td>
          <td width="20" class="disc">:</td>
          <td width="360"><label>
            <input type="text" name="textfield" class="fillout" value="<?=$arrOrderform['school'];?>" readonly="" />
          </label></td>
        </tr>
        <tr>
          <td align="left" class="disc">&nbsp;</td>
          <td class="disc">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="left" class="disc">School Delivery Address</td>
          <td class="disc">:</td>
          <td><input type="text" name="textfield2" class="fillout" value="<? echo $arrOrderform['client_order_del_addr'];?>" readonly="" /></td>
        </tr>
        <tr>
          <td align="left" class="disc">&nbsp;</td>
          <td class="disc">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="left" class="disc">Contact Name</td>
          <td class="disc">:</td>
          <td><input type="text" name="textfield3" class="fillout" value="<? echo $arrOrderform['name'];?>" readonly="" /></td>
        </tr>
        <tr>
          <td align="left" class="disc">&nbsp;</td>
          <td class="disc">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="left" class="disc">Number of Books ordered</td>
          <td class="disc">:</td>
          <td><input type="text" name="textfield4" class="fillout" value="<? echo $arrOrderform['client_book_require'];?>" readonly=""/></td>
        </tr>
        <tr>
          <td align="left" class="disc">&nbsp;</td>
          <td class="disc">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="left" class="disc">Inside pages printed by</td>
          <td class="disc">:</td>
          <td><input type="text" name="textfield5" class="fillout" value="<? echo $paper['name'];?>" readonly=""/></td>
        </tr>
        <tr>
          <td align="left" class="disc">&nbsp;</td>
          <td class="disc">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="left" class="disc">Cover printed by</td>
          <td class="disc">:</td>
          <td><input type="text" name="textfield6" class="fillout" value="<?=$cover['name'];?>" readonly=""/></td>
        </tr>
        <tr>
          <td align="left" class="disc">&nbsp;</td>
          <td class="disc">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="left" class="disc">Laminated by</td>
          <td class="disc">:</td>
          <td><input type="text" name="textfield7" class="fillout" value="<? echo $laminate['name'];?>" readonly=""/></td>
        </tr>
        <tr>
          <td align="left" class="disc">&nbsp;</td>
          <td class="disc">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="left" class="disc">Binding by</td>
          <td class="disc">:</td>
          <td><input type="text" name="textfield8" class="fillout" value="<?=$binding['name'];?>" readonly=""/></td>
        </tr>
        <tr>
          <td align="left" class="disc">&nbsp;</td>
          <td class="disc">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="left" class="disc">Delivery by</td>
          <td class="disc">:</td>
          <td><input type="text" name="textfield9" class="fillout" value="<? echo $deliverd['name'];?>" readonly=""/></td>
        </tr>
        <tr>
          <td align="left" class="disc">&nbsp;</td>
          <td class="disc">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="left" class="disc">Latest delivery date</td>
          <td class="disc">:</td>
          <td><input type="text" name="textfield10" class="fillout" value="<? echo $arrOrderform['client_order_del_date'];?>" readonly=""/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><label>
           <a href="JavaScript:window.print();"><input type="image" name="print" value="print" src="images/print.gif" /></a> &nbsp;&nbsp;<!--<img name="button" src="images/back.jpg" value="Go back" onClick="history.go(-1);" style="cursor:pointer"  />-->	
         <input type="image" name="close"  src="images/close.jpg" onclick="window.close();" /> </label></td>
        </tr>
      </table>
        </form>    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
