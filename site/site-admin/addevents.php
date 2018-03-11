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
 
 // get from id and school
 
 
/* $list		=	$_GET['eventlist'];
  $client_id		=	$_GET['list'];
 
 $exp	=	explode('Date:',$date);
$day	=	$exp[1];

 
 $expo_id		=	explode(",",$client_id);
 $num		=	count($expo_id)-1;
 
 for($i = 0; $i < count($expo_id)-1; $i++){
 
echo  $c_id		=	$expo_id[$i];
 
 //$qry		=	mysql_query("");
 
 }
 
 
  $school_id		=	$_GET['school']."<br>";
 $scho_expo		=	explode(",",$school_id);
 
 for($i = 0; $i < count($scho_expo)-1; $i++){
 
 $sc_id		=	$scho_expo[$i];
 
 }
 
 
 
 
 
//print_r($expo_id);
 
 $school				=	$_GET['school'];
   
 // for($i=0;$i)
// print_r($list1);
 $cl		=	explode('Client Id:',$list);
$client_id		=	$cl[1];
list($date) = split('School:', $list);
list($client) = split('Client Id:',$list);
//echo $client;
$explod		=	explode('School:',$client);
$school	=	$explod[1];

//echo "clientid==".$client_id."<br>"."school==".$school."<br>"."date==".$day;
//mysql_query("update client_order set ");
 
 ///
 */
 
 
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
 
 echo "<script language='javascript'>window.close();</script>";

   header("location:calender.php");
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fusion Books</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/pop-up.js"></script>
<script language="javascript" src="js/cal2.js"></script>
<script language="javascript" src="js/cal_conf2.js"></script>

</head>
<body style="background:none;">
<!--<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
 <?php //include_once 'templates/header.tpl.php'; ?>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="210" valign="top">
				 <?php //include_once 'templates/left_side.tpl.php'; ?>
				</td>
                <td valign="top">--><table width="767" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><!--<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#0d76aa">
                          <tr>
                            <td width="4"><img src="images/head_curve_left.gif" alt="" width="4" height="33" /></td>
                            <td class="head"> Add Entry </td>
                            <td width="4"><img src="images/head_curve_right.gif" alt="" width="4" height="33" /></td>
                          </tr>
                        </table>--></td>
                    </tr>
                    <tr>
                      <td height="385" valign="top" class="border"><table width="725" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
						 <? if($msg!='') { ?>
				<tr>
            <td width="564"  align="center" valign="top" class="tbtext"><font color="<?=$color?>"><?=$msg?></font></td>
            <td width="161"  align="center" valign="top" class="tbtext">&nbsp;</td>
				</tr>
			<? } ?>
                       
                          <tr>
                            <td colspan="2"><form id="form2" name="form2" method="post" action="" style="margin:0;" enctype="multipart/form-data">
                                <table width="569" border="0" align="center" cellpadding="2" cellspacing="0">
                                 <!-- <tr>
                                    <td class="tbtext">Ref.No</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="ref_number" id="ref_number" class="field2"   size="45"/></td>
                                  </tr>-->
                                 
                                  
                                <!--  <tr>
                                    <td class="tbtext">Title </td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="title" class="field2" /></td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">Start Time</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="start" class="field2" /></td>
                                  </tr>-->
                                  <!--<tr>
                                    <td class="tbtext">End Time</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="end" class="field2" /></td>
                                  </tr>-->
                                  <tr>
                                    <td class="tbtext"> Description</td>
                                    <td>&nbsp;</td>
                                    <td><textarea name="desc1" class="textarea"></textarea></td>
                                  </tr>
                                  <!--<tr>
                                    <td class="tbtext">Date</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="news_date" id="news_date" class="field2" /> <a href="javascript:showCal('Calendar10')"><img src="images/cal.gif" width="19" height="17" border="0" /></a></td>
                                  </tr>
                                  <tr>-->
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td align="">
                                    <input type="image" name="add" value="Add" src="images/save.gif" alt=""  onclick="return check();" /><!--&nbsp;<img name="button" src="images/back.jpg" value="Go back" onClick="history.go(-1);"  />--> <input type="image" name="close"  src="images/close.jpg" onclick="window.close();" />
									
									<input type="hidden" name="add" value="Add" />									</td>
                                  </tr>
                                </table>
                              </form></td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td><!--<table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="4"><img src="images/curve_bottom_left.gif" width="4" height="4" /></td>
                            <td background="images/bottom_pic.gif"><img src="images/bottom_pic.gif" alt="" width="1" height="4" /></td>
                            <td width="4"><img src="images/curve_bottom_right.gif" alt="" width="4" height="4" /></td>
                          </tr>-->
                        </table></td>
                    </tr>
                  </table><!--</td>
              </tr>
            </table></td>
        </tr>
        
        <tr>
          <td height="8"></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="40" background="images/footer_bg.gif" align="center"><? // include('footer.php')?></td>
  </tr>
</table>-->
</body>
</html>
