<?
include_once '../../config/config.inc.php';
//include_once 'classes/database.class.php';
include_once 'classes/user.class.php';
$objU		=	new user();
$msg 			= isset($_REQUEST['msg'])	? $_REQUEST['msg']		: '';
$color 			= isset($_REQUEST['color'])	? $_REQUEST['color']	: 'red';

  $id			=	$_GET['id'];
$arrPhoto		=	$objU->listphoto($id);

 $oldimage		=	$arrPhoto['photo_name'];
 $desc1			=	$arrPhoto['photo_desc'];
	
	
	if($oldimage!="")
	 {
		 $uploadfilepath  = "upload/";
		  //$uploadfilepath1  = "upload/thumb/";
			//$uploadfilepath2 = "upload/original/";
		  $fileex  = $uploadfilepath.trim($oldimage);
		
		 if(file_exists($fileex))
				{
				unlink($fileex);
				}
		//unlink("upload/".$oldimage);
		
}
		
		$sql = mysql_query("delete from photo where photo_id='".$id."'");


header('location:viewPhoto.php');

?>