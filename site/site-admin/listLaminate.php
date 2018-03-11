<?
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/production.class.php';
$objU			=	new user();
$objP			=	new production();
$arrLamp			= $objP->getLamp_paper();

 $paperLaminate		=	$_GET['txt'];
if(isset($_GET['txt']))
{
$count	=	$objP->getPaper_Laminate($paperLaminate);

if($count!=0)
{
echo "<font color='#FF0000'>Data already exist!</font>";
}
else
{
$msg		=	$objP->add_paperLaminate($paperLaminate);
}
$arrLamp			= $objP->getLamp_paper();

$contents .= '<select name="laminating_paper" class="listmenu" id="laminating_paper" onchange="showId2(this.value)">';
		
		if(!empty($arrLamp))
		{
		foreach($arrLamp as $key=>$value)
		{ 
$contents .= '<option value="'.$value['lamp_id'].'"';
if($paperLaminate==$value['name']){
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