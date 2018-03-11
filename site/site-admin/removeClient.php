<?
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
$objU 			= new user();
if(isset($_POST['remove']))
{
echo "hi";
if(count($_POST['client_id'])<=0)
echo "id=============".$_POST['client_id'];
$msg =  "please select atlest one record";
else
{
//$list		= $objU->list_user($_POST['client_id']);
//print_r($list);
//$msg		= $objU->delete_client($_POST['client_id']);

/*if($msg=="")
{
//$msg	=	
header('location:workSpace.php');
}*/
}
}

?>
