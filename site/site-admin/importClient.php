<?
include("loginchk.php");
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/production.class.php';

$objU		=	new user;
 $msg  = $_GET['msg'];
$color	=	'#FF0000';
$Uploadabletypes	="csv/CSV"; // upload image types
$uploadPath	= "csvimportfiles";
 $uploadPath;
if(isset($_POST['add_x'])){

 $size	=	$_FILES["import"]["size"];
	if($_FILES["import"]["size"] > 0)	// upload file
	{ 
	
		$fname=explode(".",$_FILES['import']['name']);
		//echo $fname;
		$filename=$fname[0];
	 	 $name	=	$filename.'.csv';
		$tmp_name = $_FILES["import"]["tmp_name"];
		move_uploaded_file($tmp_name,"$uploadPath/$name");
		
				
		$getContent='csvimportfiles/'.$name.'';
		
		//echo "name".$getContent;
		$fcontents  = file($getContent); 
	//	print_r($fcontents);exit;
		
		for($i=1; $i<sizeof($fcontents); $i++) { 
			$line = trim($fcontents[$i]); 
			$arr = explode(",", $line); 
			//print_r($arr);//exit;
			 $school		=	$arr[0];
			 $street		=	$arr[1];
			 $email			=	$arr[3];
			 $postal		=	$arr[6];
			 $contactno		=	$arr[13];
			  $substreet		=	$arr[14];
			   $postaladd		=	$arr[15];
			   $state		=	$arr[16];
		
			 
			$nume	=	$objU->getSchool($school);
			 
			
			 if($nume ==0)
			 {
			 $qry		=	"INSERT INTO client_fusion (school,street,substreet,state,postal,contact,email)VALUES('$school','$street','$substreet','$state','$postal','$contactno','$email')";
			 mysql_query($qry);
			 
			 header('location:importClient.php?msg=Data imported successfully!');
			
			 }
			 else
			 {
			 header('location:importClient.php?msg=Duplicate records have not been imported!');
			 }
			
		}
	}
}


include("templates/importClient.tpl.php");

?>
