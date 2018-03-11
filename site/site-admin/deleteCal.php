<?php
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
//include_once 'classes/database.class.php';
include_once 'classes/user.class.php';
include_once 'classes/production.class.php';


$objU		=	new user();

 $id		=	$_GET['id'];
/* $day	=	$_POST['day'];
 $month	=	$_POST['month'];
  $year	=	$_POST['year'];
   $w	=	$_POST['week'];
    $wd	=	$_POST['day_week'];*/
	
if($id)
{
$qry	=	mysql_query("DELETE FROM calender WHERE calender_id=$id");
echo "<script language='javascript'>window.opener.location='calender.php';</script>";

 echo "<script language='javascript'>window.close();</script>";}

?>
