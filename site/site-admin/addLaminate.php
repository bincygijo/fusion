<?php
include_once '../../config/config.inc.php';

$inside_paper		=	$_GET['q'];
//echo "inside_paper===".$inside_paper;
if($inside_paper=='5'){
?>

<input type="text" name="laminate" id="laminate" size="15" /><input type="button" name="add_laminate"  value="Add"  onclick="return check1();"/>

<? }?>


