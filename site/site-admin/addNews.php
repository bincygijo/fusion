<?php
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
//include_once 'classes/database.class.php';
include_once 'classes/user.class.php';

$objU	=	new user();
$msg 			= isset($_REQUEST['msg'])	? $_REQUEST['msg']		: '';
$color 			= isset($_REQUEST['color'])	? $_REQUEST['color']	: 'red';



$date		=	date('Y-m-d');

if(isset($_POST['add']))
{
$des		=	$_POST['desc1'];
$news_date		=	$_POST['news_date'];
$title		=	$_POST['title'];

$msg1	=	$objU->addNews($des,$title,$date,$news_date);
/*if($msg1)
{*/
$msg	=	"News added successfully";
header('location:viewNews.php?msg='.$msg.'&color='.$color.'');
/*}
*/}



include("templates/addNews.tpl.php");
?>