<?
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/production.class.php';
$objU			=	new user();
$objP			=	new production();
$arrBook		= 	$objP->getBooktype();

  $book		=	$_GET['txt'];
 // echo "$book". $book;
if(isset($_GET['txt']))
{
$count	=	$objP->getBook_type($book);

if($count!=0)
{
echo "<font color='#FF0000'>Data already exist!</font>";
}
else
{
$msg		=	$objP->add_Books($book);
}
$arrBook		= 	$objP->getBooktype();

$contents .= '<select class="listmenu" name="book_type" id="book_type" onchange="showId25(this.value)">';
		
		if(!empty($arrBook))
		{
		foreach($arrBook as $key=>$value)
		{ 
$contents .= '<option value="'.$value['book_id'].'"';
if($book==$value['booktype']){
$contents .= ' "selected"';
}
$contents .= '>';
$contents .= $value['booktype'].'</option>';
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