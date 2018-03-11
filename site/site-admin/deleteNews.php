<?php
include_once '../../config/config.inc.php';
//include_once 'classes/database.class.php';
include_once 'classes/user.class.php';
$objU		=	new user();
$msg 			= isset($_REQUEST['msg'])	? $_REQUEST['msg']		: '';
$color 			= isset($_REQUEST['color'])	? $_REQUEST['color']	: 'red';

  $id			=	$_GET['id'];

 $sql = mysql_query("delete from newsletter where news_id='".$id."'");


header('location:viewNews.php');

?>