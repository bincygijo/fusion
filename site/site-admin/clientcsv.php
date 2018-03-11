<?php
/**************************************************************
**
*Purpose              : To download file as .CSV
**
***************************************************************/

include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/entry.class.php';


$database = $DatabaseName; 
$table = "client_fusion";
//echo $table;
//$result   = mysql_query("SELECT * FROM $table");
$objE 			= new entry();
//$result		=	$objE->entryDetails();
$result		=	$objE->entryDetails();
//print_r($result);
//print_r($result);
//mysql_query("SELECT * FROM new_entry AS E,client_fusion AS C WHERE C.client_id=E.client_id AND E.entry_actionid=2");
//echo $result;
$out = ''; 

 
 
 $fields = array('Ref Number ', 'School Name','Contact Persons Name', 'Email','Client Name','Street Address','Suburb','Country','State','Postcode');
 
 $columns	=	count($fields);
 //count($fields);
// print_r($fields);exit;
 
// Get all fields names in table .
//$fields = mysql_list_fields($database,$table) or die(mysql_error());
// Count the table fields and put the value into $columns. 
//$columns = mysql_num_fields($fields);

// Put the name of all fields to $out. 
 
 foreach ($fields as $key=>$value)
 {
 $out .= '"'.$value.'",';

 }
$out .="\n";

/*for ($i = 0; $i < $columns; $i++) {
	//$l=mysql_field_name($fields, $i);
	$out .= '"'.$l.'",';
}
$out .="\n";
*/ 
 
while(list($key,$val)   = each($result)){
  
     $out  .= '"'.$val['ref_id'].'",';
	 $out  .= '"'.$val['school'].'",';
	  $out  .= '"'.$val['contact_name'].'",';
	    $out  .= '"'.$val['email'].'",';
	   $out  .= '"'.$val['client'].'",';
	     
	  $out  .= '"'.$val['street'].'",';
	   $out  .= '"'.$val['substreet'].'",';
	    $out  .= '"'.$val['country'].'",'; 
		$out  .= '"'.$val['state'].'",';
		 $out  .= '"'.$val['postal'].'",';
		 
		   
			
	  $out .="\n";
	  
  }
 
 
 
/*while(list($key,$val)   = each($result)){
	for ($i = 0; $i < $columns; $i++) {
		 
		$out .= '"'.$val["$i"].'",';
	}
$out .="\n";
}
*/

// Open file export.csv.
$f = fopen('exportClient.csv','w');

// Put all values from $out to export.csv. 
fputs($f, $out);
fclose($f);

header('Content-type: application/csv');
header('Content-Disposition: attachment; filename="exportClient.csv"');
readfile('exportClient.csv');
?>
