<?php
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/production.class.php';
$objU			=	new user();
$objP			=	new production();
$arrTrans		=	$objP->listTrans_type();
$listAccount		=	$objP->listAccount($client_Id);
 echo "deposit===".$deposit		=	$_GET['txt'];
 
if(isset($_GET['txt']))
{
$msg		=	$objP->add_Trans($paperInside);
$listAccount		=	$objP->listAccount($client_Id);

$contents .= '<select name="trans_type" class="listmenu" id="trans_type" onchange="showId10(this.value)">';
		
		if(!empty($arrTrans))
		{
		foreach($arrTrans as $key=>$value)
		{ 
$contents .= '<option value="'.$value['trans_id'].'"';
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