<?php
ob_start();
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
//$page_heading	=	"Edit Client";
$objU 			= 	new user();
 $uId			=	$_GET['cid'];
 $name1		=	$_GET['id'];	
 $date	=date('Y-m-d');

//$i		=	14;
// $newdate=date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")-$i, date("Y")));



$result		=	$objU ->list_user($uId);
$name		=	$result['name'];
$positon		=	$result['positon'];
$school		=	$result['school'];
$street		=	$result['street'];

$substreet		=	$result['substreet'];
$state		=	$result['state'];
$country		=	$result['country'];
$postal		=	$result['postal'];

$contact		=	$result['contact'];
$email		=	$result['email'];
$client_date		=	$result['client_date'];
$information		=	$result['information'];
$status		=	$result['status_remove'];
//$client_date		=	$result['client_date'];

if($uId)
 
 {
$qry		=	mysql_query("update client_fusion set delete_date='$date',status_remove=1 where  client_id=$uId");

$qry1		=	$objU ->addBin($uId,$name,$positon,$school,$street,$substreet,$state,$country,$postal,$contact,$email,$information,$client_date,$status,$date);


header('location:list.php?id='.$name1.'');
 }


/*$out = ''; 
$fields = array('client_id ', 'name', 'positon','school','street','substreet','state','country','postal','contact','email','client_date','information');


 foreach ($fields as $key=>$value)
 {
 $out .= '"'.$value.'",';

 }
$out .="\n\r";*/

///while(list($key,$val)   = each($result)){
  
     /*$out  .= '"'.$uId.'",';
	  $out  .= '"'.$name.'",';
	   $out  .= '"'.$positon.'",';	  
	  $out  .= '"'.$school.'",';
	   $out  .= '"'.$street.'",';
	    $out  .= '"'.$substreet.'",'; 
		$out  .= '"'.$state.'",';
		 $out  .= '"'.$country.'",';		 
		    $out  .= '"'.$postal.'",'; 			
			$out  .= '"'.$contact.'",';
			$out  .= '"'.$email.'",';
			$out  .= '"'.$client_date.'",';
			$out  .= '"'.$information.'"';
			
	  $out .="\n";*/
	  
 // }
 // $backup="backup-".$uId;

//  $filename = "Bin/".$backup.".txt";
	//$file=fopen("welcome.zip","w");
//	$fp = fopen($filename, "w");
//	fwrite($fp, $out);
//	fclose($fp);
  
 
/* if($uId)
 
 {
$qry		=	mysql_query("update client_fusion set delete_date='$date',status_remove=1 where  client_id=$uId");


header('location:list.php?id='.$name1.'');
 }*/

//fclose($fh);



  

//$f = fopen ('deleteClient.txt','w');

//fputs($f, $out);
//fclose($f);





//header('location:editClient.php?msg=Successfully updated');

//$arrUser		=	$objU ->list_user($uId);
// include("templates/listschool.tpl.php");
 ?>