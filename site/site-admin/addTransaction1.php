<?
include_once '../../config/config.inc.php';

$inside_paper		=	$_GET['q'];
//echo "inside_paper===".$inside_paper;
if($inside_paper=='Other'){
?>

<input type="text" name="trans" id="trans" size="15" class="field" />&nbsp;<input type="button" name="add" value="Add" onclick="return check();" />

<? }?>




