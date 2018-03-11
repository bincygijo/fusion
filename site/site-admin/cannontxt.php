<?php
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
//include_once 'classes/database.class.php';
include_once 'classes/user.class.php';

$page_heading="New Client";
$objU		=	new user();

$button="add";

if($_REQUEST['Submit']) 
{
 // echo "hi";
  $title=$_REQUEST['title'];
  $c_text=addslashes($_REQUEST['c_text']);
 // $qry		=	$objU->addCannedTxt($title,$c_text);
  $qry	=	 mysql_query("INSERT INTO canned_text (`title` ,`c_text`)VALUES ('$title', '$c_text');");
}

if($_REQUEST['update']) 
{
  $e_cid=$_REQUEST['e_cid'];
  $title=$_REQUEST['title'];
  $c_text=addslashes($_REQUEST['c_text']);
  mysql_query("UPDATE canned_text SET `title` = '$title',`c_text` = '$c_text' WHERE `canned_text`.`id` ='$e_cid' LIMIT 1 ;");
   $temp="hide";
}

if($_REQUEST['c_del']) 
{
  $c_del=$_REQUEST['c_del'];
  mysql_query("DELETE FROM canned_text WHERE `canned_text`.`id` =$c_del LIMIT 1");
}

if($_REQUEST['c_edit']) 
{
   
   $button="edit";
   $c_edit=$_REQUEST['c_edit'];
   $c_e_txt=mysql_query("SELECT *FROM `canned_text` WHERE `id` ='$c_edit' LIMIT  1");
  $c_ed_txt=mysql_fetch_array($c_e_txt);
  $title=$c_ed_txt['title'];
   $c_text=addslashes($c_ed_txt['c_text']);
  if($temp=="hide")
  {
   $button="add";
   $title="";
  $c_text="";
  }
}

$cdata=$objU->getcannontxt();
?>
<?php
include("templates/cannontxt.tpl.php");
?>