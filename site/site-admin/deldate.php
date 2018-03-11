<?php
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
//$page_heading	=	"Edit Client";
$objU 			= 	new user();
$uId			=	$_GET['cid'];
 $name1		=	$_GET['id'];	
 $date	=date('Y-m-d');

$i		=	14;
  $newdate=date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")-$i, date("Y")));
 
 $backup="backup-".$uId;

  $filename = "Bin/".$backup.".txt";
  if (file_exists("Bin/" . $filename))
		  {
			unlink("upload/".$oldimage);
		  }


//$result		=	$objU ->list_user($uId);



//fclose($fh);



  

//$f = fopen ('deleteClient.txt','w');

//fputs($f, $out);
//fclose($f);





//header('location:editClient.php?msg=Successfully updated');

//$arrUser		=	$objU ->list_user($uId);
// include("templates/listschool.tpl.php");
 ?>