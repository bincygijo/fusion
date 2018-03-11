<?
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/production.class.php';
$objU			=	new user();
$objP			=	new production();
$arrBooks			= $objP->getbook_paper();

 $paperBooks		=	$_GET['txt'];
if(isset($_GET['txt']))
{
$count	=	$objP->getPaper_Books($paperBooks);

if($count!=0)
{
echo "<font color='#FF0000'>Data already exist!</font>";
}
else
{
$msg		=	$objP->add_paperBooks($paperBooks);
}
$arrBooks			= $objP->getbook_paper();

$contents .= '<select name="books_deliver" class="listmenu" id="books_deliver" onchange="showId4(this.value)">';
		
		if(!empty($arrBooks))
		{
		foreach($arrBooks as $key=>$value)
		{ 
$contents .= '<option value="'.$value['book_id'].'"';
if($paperBooks==$value['name']){
$contents .= ' "selected"';
}
$contents .= '>';
$contents .= $value['name'].'</option>';
		 }
		}

$contents .= '</select>';
			
echo $contents;



/*if($msg=="")
{
echo "Added successfully";
}*/
}
?>