<?
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/production.class.php';
$objU			=	new user();
$objP			=	new production();
$arrBind			= $objP->getbind_paper();

 $paperBinding		=	$_GET['txt'];
if(isset($_GET['txt']))
{
$count	=	$objP->getPaper_Binding($paperBinding);

if($count!=0)
{
echo "<font color='#FF0000'>Data already exist!</font>";
}
else
{
$msg		=	$objP->add_paperBinding($paperBinding);
}
$arrBind			= $objP->getbind_paper();

$contents .= '<select name="binding_paper" class="listmenu" id="binding_paper" onchange="showId3(this.value)">';
		
		if(!empty($arrBind))
		{
		foreach($arrBind as $key=>$value)
		{ 
$contents .= '<option value="'.$value['bind_id'].'"';
if($paperBinding==$value['name']){
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