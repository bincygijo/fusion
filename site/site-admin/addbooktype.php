<?
include_once '../../config/config.inc.php';

$inside_paper		=	$_GET['q'];
//echo "inside_paper===".$inside_paper;
if($inside_paper=='3'){
?>

<input type="text" name="book" id="book" size="15" /><input type="button" value="Add" name="Add" onclick="return check25();" />

<? }?>


