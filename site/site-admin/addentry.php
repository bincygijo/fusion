<?php  
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
//include_once 'classes/database.class.php';
include_once 'classes/user.class.php';
include_once 'classes/production.class.php';


$objU		=	new user();
$objP		=	new production();

$msg 			= isset($_REQUEST['msg'])	? $_REQUEST['msg']		: '';
$color 			= isset($_REQUEST['color'])	? $_REQUEST['color']	: 'red';
   $da	=	$_GET['d'];
$exp		=	explode(',',$da);
   $day	=	$exp[0];
 $month		=	$exp[1];
 $year		=	$exp[2];
  $week	=	$exp[3];
   $week_day	=	$exp[4];

   $event_date		=	$year."-".$month."-".$day;
  
  $arrCalender		=	$objU->listallCalender($event_date);
  
 

  $des		=	$_POST['desc1'];
   $d	=	$_GET['d'];
  
 
 // $date		=	$year."-".$month."-".$day;
  if(isset($_POST['add']))
  {
  
  
  if($_GET['d'])
  {
  $da	=	$_GET['d'];
$exp		=	explode(',',$da);
  $day	=	$exp[0];
  $month		=	$exp[1];
 $year		=	$exp[2];
 $entry_dat	=	$year."-".$month."-".$day;
 
 $qry		=	mysql_query("insert into calender(entry_date,description) values('$entry_dat','$des')");
 
 
 echo "<script language='javascript'>window.opener.location='calender.php';</script>";

 echo "<script language='javascript'>window.close();</script>";

  // header("location:calender.php");
  }
  
   $list		=	$_GET['eventlist'];
 $client_id		=	$_GET['list'];
 
 $exp	=	explode('Date:',$date);
$day	=	$exp[1];


 $expo_id		=	explode(",",$client_id);
 $num		=	count($expo_id)-1;
 
 for($i = 0; $i < count($expo_id)-1; $i++){
 
 $c_id		=	$expo_id[$i];
$school_name		=	$objP->getSchool($c_id); 

$deli_date		=	$school_name['delivery_date'];
$deadline_date	=	$school_name['deadline_date'];
 $school		=	$school_name['school'];

 //$qry		=	mysql_query("update client_order set new_description='$des' where client_id=$c_id and client_order_school='$school'");
 
 header("location:calender.php");
  //echo "update client_order set new_description='$des' where client_id=$c_id and client_order_school='$school'";
 }
 
  
 /* $school_id		=	$_GET['school'];
 $scho_expo		=	explode(",",$school_id);
 
 for($i = 0; $i < count($scho_expo)-1; $i++){
 
 $sc_id		=	$scho_expo[$i];
 
 

// echo "update client_order set new_description='$des' where client_id=$c_id and client_order_school='$sc_id'";
 
 }*/
 

 
// exit;
 
//print_r($expo_id);
 
 /*$school				=	$_GET['school'];
   
 // for($i=0;$i)
// print_r($list1);
 $cl		=	explode('Client Id:',$list);
$client_id		=	$cl[1];
list($date) = split('School:', $list);
list($client) = split('Client Id:',$list);
//echo $client;
$explod		=	explode('School:',$client);
$school	=	$explod[1];*/


 



//echo "clientid==".$client_id."<br>"."school==".$school."<br>"."date==".$day;
//mysql_query("update client_order set ");
 
 ///
 
  
  
 /* $date		=	$year."-".$month."-".$day;
 $title		=	$_POST['title'];
 $start		=	$_POST['start'];
 $end		=	$_POST['end'];
 $des		=	$_POST['desc1'];
 */
 
 
 
 
 
//$msg1		=	$objU->addevents($title,$start,$end,$month,$day,$year,$des);
//header('location:evtcalendar.php');

}
	//$qry		=	mysql_query("insert into event(title,start_time,end_time,date,description)values('$title','$start','$end','$date','$des')");
//  }
  
?>
<script language="javascript">

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

function check()
{
if(document.form1.desc1.value=="")
{
alert("Please add  new entry ");
document.form1.desc1.focus();
return false;
}
}
</script>
<!--<link href="css/style.css" rel="stylesheet" type="text/css" />-->
<script language="javascript" src="js/pop-up.js"></script>
<link href="js/popcalendar.css" rel="stylesheet" type="text/css">



<script language="javascript" src="js/cal2.js">
</script>
<script language="javascript" src="js/cal_conf2.js"></script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fusion Books</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body style="background:none;">
<table width="540" border="0" cellspacing="0" cellpadding="0" class="border_box">
  <tr>
    <td height="30">&nbsp;</td>
  </tr>
  <form id="form1" name="form1" method="post" action="">
  <tr>
    <td><table width="450" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#75bce1">
      <tr class="rowcolor1">
        <td class="tbhead">Editor's&nbsp;Deadline</td>
		 <td class="tbhead">Delivery&nbsp;Date</td>
		  <td class="tbhead">Entry&nbsp;Date</td>
        <td class="tbhead">School</td>
        <td class="tbhead">New&nbsp;Entry</td>
		<td class="tbhead">Delete</td>
      </tr>
	  
	  	<? 
	if(!empty($arrCalender))
	{
	foreach($arrCalender as $key=>$value)
	{
	 $trans_id		=	$value['type'];
	$listType		=	$objP->getTransactionType($trans_id);
	$type			=	$listType['name'];
	 ?>
	
	
      <tr class="rowcolor2">
        <td class="tbtext"><?=$value['deadline_date'];?></td>
		 <td class="tbtext"><?=$value['delivery_date'];?></td>
		 <td class="tbtext"><?=$value['entry_date'];?></td>
        <td class="tbtext"><?=$value['school'];?></td>
        <td align="right" class="tbtext"><?=$value['description']?></td>
		<td align="right" class="tbtext"><a href="deleteCal.php?id=<?=$value['calender_id'];?>"  onclick="return del();">Delete</a></td>
      </tr>
	  <?  }
	}	 else{
	?>
	<tr class="rowcolor2"><td colspan="6" align="center"><font color="#FF0000">No data found!</font></td></tr>
	<?  }?>
     	
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
      <table width="400" border="0" align="center" cellpadding="2" cellspacing="0">
        <tr>
          <td class="tbtext">&nbsp;</td>
          <td width="2" class="tbtext">&nbsp;</td>
          <td><label></label></td>
        </tr>
        <tr>
          <td class="tbtext"> Description</td>
          <td class="tbtext">&nbsp;</td>
          <td><textarea name="desc1" class="textarea"></textarea></td>
        </tr>
		 
        <tr>
          <td class="tbtext">&nbsp;</td>
          <td class="tbtext">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td height="35" valign="bottom"> <input type="image" name="add" value="Add" src="images/save.gif" alt=""  onclick="return check();" /><!--&nbsp;<img name="button" src="images/back.jpg" value="Go back" onClick="history.go(-1);"  />--> <input type="image" name="close"  src="images/close.jpg" onClick="window.close();" />
									
									
									
								 	 
									 </td>
        </tr>
      </table>           </td>
  </tr>
  </form> 
  <tr>
    <td height="30">&nbsp;</td>
  </tr>
</table>
</body>
</html>
