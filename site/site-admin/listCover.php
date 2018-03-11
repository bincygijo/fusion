<?
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/production.class.php';
$objU			=	new user();
$objP			=	new production();
$arrCover			= $objP->getCover_paper();

 $paperCover		=	$_GET['txt'];
if(isset($_GET['txt']))
{

$count	=	$objP->getPaper_Cover($paperCover);

if($count!=0)
{
echo "<font color='#FF0000'>Data already exist!</font>";
}
else
{
$msg		=	$objP->add_paperCover($paperCover);
}
$arrCover			= $objP->getCover_paper();

$contents .= '<select name="coverpaper" id="coverpaper" class="listmenu" onchange="showId1(this.value)">';
		
		if(!empty($arrCover))
		{
		foreach($arrCover as $key=>$value)
		{ 
$contents .= '<option value="'.$value['cover_id'].'"';
if($paperCover==$value['name']){
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