<?php 
session_start();
include("loginchk.php");
$id		=	$_SESSION['username'];
$page_heading="Admin Home";


include_once 'templates/index.tpl.php';
//echo "Welcome to the Fusion Books Admin Panel";

//include_once 'templates/index_bottom.tp
?>