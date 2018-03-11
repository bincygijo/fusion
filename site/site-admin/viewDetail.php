<?php
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
include_once 'classes/entry.class.php';
include_once 'classes/user.class.php';
include_once 'classes/production.class.php';

$page_heading="New Entry";
$objE			=	new entry();
$objU			=	new user();
$objP			=	new production();



include("templates/viewDetail.tpl.php");
?>