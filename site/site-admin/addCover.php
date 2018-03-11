<?php
include_once '../../config/config.inc.php';

$inside_paper		=	$_GET['q'];
//echo "inside_paper===".$inside_paper;
if($inside_paper=='4'){
?>

<input type="text" name="cover_paper" id="cover_paper" size="15" />&nbsp;<input type="button" name="add_cover" value="Add"  onclick="return validate();"/>

<?php }?>

<?php 
if(isset($_POST['add']))
{
echo "hi";
}

?>


