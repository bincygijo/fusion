<?php
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/production.class.php';
$objU			=	new user();
$objP			=	new production();
$arrInside			= $objP->getInside_paper();

 $paperInside		=	$_GET['txt'];
if(isset($_GET['txt']))
{

 $count	=	$objP->getPaper_Inside($paperInside);

if($count!=0)
{
echo "<font color='#FF0000'>Data already exist!</font>";
}
else
{
$msg		=	$objP->add_paperInside($paperInside);
}
$arrInside			= $objP->getInside_paper();

$contents .= '<select name="inside_paper" class="listmenu" id="inside_paper" onchange="showId(this.value)">';
		
		if(!empty($arrInside))
		{
		foreach($arrInside as $key=>$value)
		{ 
$contents .= '<option value="'.$value['paper_id'].'"';
if($paperInside==$value['name']){
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