<?php
 $name=$_GET['pdfname'];

header('Content-type: application/pdf');
header('Content-Disposition: attachment; filename="'.$name.'"');
readfile('invoices/'."$name");
exit;
?>