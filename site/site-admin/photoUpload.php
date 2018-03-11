<?php
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
//include_once 'classes/database.class.php';
include_once 'classes/user.class.php';
include_once 'classes/image.class.php';
$objU		=	new user();
$objI		=	new image();

$msg 			= isset($_REQUEST['msg'])	? $_REQUEST['msg']		: '';
$color 			= isset($_REQUEST['color'])	? $_REQUEST['color']	: 'red';


if(isset($_POST['add']))

{
  $name		=	$_FILES['file']['name'];
 $popdesc		= 	$_POST['desc'];
 $desc		=	$_POST['desc1'];
$type		=	$_FILES['file']['type'];
$size		=	$_FILES['file']['size'];
$school_name		=	$_POST['sc_name'];
$img_tmp	=	$_FILES['file']['tmp_name'];
$type1=$_FILES['file']['type'];	
//$filename = '';

		
	  
/*$msg1		=	$objI->InsertPicture($_FILES,$popdesc,$desc);
if($msg1)
{
$msg		='Photo added successfully!';
			header("location:viewPhoto.php?msg=$msg&color=$color");
}*/
//exit;

if($name=="")

{
$qry	=	"INSERT INTO photo(photo_desc,description,school_name)VALUES('$popdesc','$desc','$school_name')";
mysql_query($qry);
$msg		='Photo added successfully!';
			header("location:viewPhoto.php?msg=$msg&color=$color");
}

	//$extarray		= array("jpg","jpeg","gif","png","JPEG","JPG","GIF","PNG");
if ((($_FILES["file"]["type"] == "image/gif")|| ($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/jpg"))|| ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/JPEG") || ($_FILES["file"]["type"] == "image/JPG") || ($_FILES["file"]["type"] == "image/GIF") || ($_FILES["file"]["type"] == "image/PNG") && ($_FILES["file"]["size"] > 0))
  {
  			 $imagename = basename($name);
			$ext = substr(strrchr($imagename, '.'), 1);
			$fName		= time().'.'.$ext;
			 
			
			 // $imagename = basename($name);
			  //$fName		= time().'_'.$imagename;
		/*	
  		$filename = $_FILES['file']['name'];
		$ext = substr(strrchr($filename, '.'), 1);
		$filename = time().".".$ext;*/
  
  	
  if ($_FILES["file"]["error"] > 0)
    {
  //  echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
     //  if (file_exists("upload/" . $_FILES["file"]["name"]))
	 if (file_exists("upload/" . $fName))
      {
       $msg		=	$fName . " already exists. ";
      }
    else
      { 	  
	  
	
	 
	  $msg1	=	$objU->add_Photo($fName,$popdesc,$desc,$school_name);
	  
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $fName);
	  
	  
	 if($msg1)
			{
			$msg		='Photo added successfully!';
			header("location:viewPhoto.php?msg=$msg&color=$color");
			}
   
      }
    }
  }
else
  {
  $msg		=	 "Uploded failed!";
  }


}

include("templates/addPhoto.tpl.php");

?>