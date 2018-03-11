<?
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/production.class.php';
$objU			=	new user();
$objP			=	new production();
$arrFreight		= 	$objP->getFreight();

  $freight		=	$_GET['txt'];
if(isset($_GET['txt']))
{
$count	=	$objP->getPaper_Freight($freight);

if($count!=0)
{
echo "<font color='#FF0000'>Data already exist!</font>";
}
else
{
$msg		=	$objP->add_Freight($freight);
}
$arrFreight		= 	$objP->getFreight();

$contents .= '<select class="listmenu" name="paper_freight" id="paper_freight" onchange="showId5(this.value)">';
		
		if(!empty($arrFreight))
		{
		foreach($arrFreight as $key=>$value)
		{ 
$contents .= '<option value="'.$value['freight_id'].'"';
if($freight==$value['name']){
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