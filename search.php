<?
include_once 'classes/config.inc.php';
include_once 'classes/search.class.php';

$objS		=	new search();
 $search				= isset($_POST['name'])	? $_POST['name'] 	: ''; 
if(isset($_POST['submit']))
{
//echo"name====".$search;
$arrSearch		=	 $objS->search_school($search);

//print_r($arrSearch);
}
include("template/searchResult.tpl.php");

?>