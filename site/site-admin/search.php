<?php
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
include_once 'classes/search.class.php';
//$page_heading="Search";

$objS			=	new search();

 $search				= isset($_POST['name'])	? $_POST['name'] 	: ''; 

  if(isset($_POST['Search_x']))
{
$arrSearch		=	 $objS->search_school($search);
}
 

include("templates/searchResult.tpl.php");


?>