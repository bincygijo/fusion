<?php
include_once '../../config/config.inc.php';

$inside_paper		=	$_GET['q'];
//echo "inside_paper===".$inside_paper;
if($inside_paper=='3'){
?>

<input type="text" name="deliver" id="deliver" size="15" /><input type="button" name="Add" value="Add" onclick="return check3();" />

<?php }?>


