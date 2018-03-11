<?php
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
//include_once 'classes/database.class.php';
include_once 'classes/user.class.php';
include_once 'classes/image.class.php';
include_once 'classes/photo.class.php';
$objU		=	new user();
$objI		=	new image();
$objP		=	new photo();

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

$objP->move_file_image($name,$type1,$popdesc,$desc,$school_name);
$msg		='Photo added successfully!';
			header("location:viewPhoto.php?msg=$msg&color=$color");

}

/*function smart_resize_image( $file, $width , $height, $proportional = false, $output = 'file', $delete_original = false, $use_linux_commands = false )
    {
        if ( $height <= 0 && $width <= 0 ) {
            return false;
        }
$info = getimagesize($file);
        $image = '';

$final_width = 0;
        $final_height = 0;
        list($width_old, $height_old) = $info;

        if ($proportional) {
            if ($width == 0) $factor = $height/$height_old;
            elseif ($height == 0) $factor = $width/$width_old;
            else $factor = min ( $width / $width_old, $height / $height_old);  
           //echo $factor;a
$final_width = round ($width_old * $factor);
            $final_height = round ($height_old * $factor);

        }
        else {
		$final_width = ( $width <= 0 ) ? $width_old : $width;
            $final_height = ( $height <= 0 ) ? $height_old : $height;
        }

        switch ($info[2] ) {
            case IMAGETYPE_GIF:
                $image = imagecreatefromgif($file);
            break;
            case IMAGETYPE_JPEG:
                $image = imagecreatefromjpeg($file);
            break;
            case IMAGETYPE_PNG:
                $image = imagecreatefrompng($file);
            break;
            default:
                return false;
        }
       
        $image_resized = imagecreatetruecolor( $final_width, $final_height );
               
        if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
            $trnprt_indx = imagecolortransparent($image);
  
            // If we have a specific transparent color
            if ($trnprt_indx >= 0) {
  
                // Get the original image's transparent color's RGB values
                $trnprt_color    = imagecolorsforindex($image, $trnprt_indx);
  
                // Allocate the same color in the new image resource
                $trnprt_indx    = imagecolorallocate($image_resized, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
  
                // Completely fill the background of the new image with allocated color.
                imagefill($image_resized, 0, 0, $trnprt_indx);
  
                // Set the background color for new image to transparent
                imagecolortransparent($image_resized, $trnprt_indx);
  
           
            }
            // Always make a transparent background color for PNGs that don't have one allocated already
            elseif ($info[2] == IMAGETYPE_PNG) {
  
                // Turn off transparency blending (temporarily)
                imagealphablending($image_resized, false);
  
                // Create a new transparent color for image
                $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
  
                // Completely fill the background of the new image with allocated color.
                imagefill($image_resized, 0, 0, $color);
  
                // Restore transparency blending
                imagesavealpha($image_resized, true);
            }
        }

       
imagecopyresampled($image_resized, $image, 0, 0, 0, 0, $final_width, $final_height, $width_old, $height_old);
   
        if ( $delete_original ) {
            if ( $use_linux_commands )
                exec('rm '.$file);
            else
                @unlink($file);
        }
       
        switch ( strtolower($output) ) {
            case 'browser':
                $mime = image_type_to_mime_type($info[2]);
                header("Content-type: $mime");
                $output = NULL;
            break;
            case 'file':
                $output = $file;
            break;
            case 'return':
                return $image_resized;
            break;
            default:
            break;
        }

        switch ($info[2] ) {
            case IMAGETYPE_GIF:
                imagegif($image_resized, $output);
            break;
            case IMAGETYPE_JPEG:
                imagejpeg($image_resized, $output);
            break;
            case IMAGETYPE_PNG:
                imagepng($image_resized, $output);
            break;
            default:
                return false;
        }

        return
true;
    }
	?>
<?	
if(isset($_POST['add']))
{

	//$title = $_POST["title"];
//	$c_id = $_POST["cat"];
 $popdesc		= 	$_POST['desc'];
 $desc		=	$_POST['desc1'];
 $school_name		=	$_POST['sc_name'];

	$tmpName = $_FILES['file']['tmp_name'];
	$filename = '';
	if($_FILES['file']['tmp_name']!=''){
		$filename = $_FILES['file']['name'];
		
		$ext = substr(strrchr($filename, '.'), 1);
		$title1 = explode('.',$filename);
		$title = $title1[0];
		$filename = time().".".$ext;

		$filePath_thumb = 	'thumb/'.$filename;
		$filePath_main 	= 	'upload/'.$filename;
		if(copy($_FILES['file']['tmp_name'],$filePath_main)){
			chmod($filePath_main, 0777);
			smart_resize_image($tmpName, $width=166, $height='110', $proportional = false, $output = 'file', $delete_original = false, $use_linux_commands = false );
			move_uploaded_file($tmpName, $filePath_thumb);	
			chmod($filePath_main, 0777);
		}
	}
	$sql = mysql_query("insert into photo(photo_name,photo_desc,description,school_name) values('".$filename."','". $popdesc."','".$desc."','".$school_name."')");
	
	$msg		='Photo added successfully!';
			header("location:viewPhoto.php?msg=$msg&color=$color");
	
	//	$sql = mysql_query("insert into photo(title,image_big,image,cat_id) values('".$title."','".$filename."','".$filename."','".$c_id."')");
	
	//header("Location:index.php?section=gallery");
	
}/*else{
	if(isset($_POST["action"]) && $_POST["action"]=="Update"){
		//$title = $_POST["title"];
		$c_id = $_POST["cat"];
		$id = $_POST["key"];
		if($_FILES['image_big']['tmp_name']!=''){
		
		$sql = mysql_query("select * from gallery_photos where id='".$id."'");
		while($row=mysql_fetch_array($sql)){
			$imagename = $row['image_big'];
			$thumbname = $row['image'];
		}
			$filePath_thumb_old = 	'../images/gallery/thumbs/'.$thumbname;
			$filePath_main_old 	= 	'../images/gallery/large/'.$imagename;
			
			unlink($filePath_thumb_old);
			unlink($filePath_main_old);
		
			$tmpName = $_FILES['image_big']['tmp_name'];
			$filename = $_FILES['image_big']['name'];
			
			$ext = substr(strrchr($filename, '.'), 1);
			
			$title1 = explode('.',$filename);
			$title = $title1[0];
		
			$filename = time().".".$ext;
			
			$filePath_thumb = 	'../images/gallery/thumbs/'.$filename;
			$filePath_main 	= 	'../images/gallery/large/'.$filename;
		
			if(copy($_FILES['image_big']['tmp_name'],$filePath_main)){
				chmod($filePath_main, 0777);
				smart_resize_image($tmpName, $width=166, $height='110', $proportional = false, $output = 'file', $delete_original = false, $use_linux_commands = false );
				move_uploaded_file($tmpName, $filePath_thumb);	
				chmod($filePath_main, 0777);
				$sql = mysql_query("update gallery_photos set title='".$title."',image_big='".$filename."',image='".$filename."' where id='".$id."'");
			}
		}
		$sql = mysql_query("update gallery_photos set cat_id='".$c_id."' where id='".$id."'");
				
	}else if(isset($_POST["action"]) && $_POST["action"]=="Delete"){
		
		$id = $_POST["key"];
		
		$sql = mysql_query("select * from gallery_photos where id='".$id."'");
		while($row=mysql_fetch_array($sql)){
			$imagename = $row['image_big'];
			$thumbname = $row['image'];
		}
		$filePath_thumb = 	'../images/gallery/thumbs/'.$thumbname;
		$filePath_main 	= 	'../images/gallery/large/'.$imagename;

		unlink($filePath_main);
		unlink($filePath_thumb);
		
		$sql = mysql_query("delete from gallery_photos where id='".$id."'");
		
	}*/
	//header("Location:index.php?section=gallery");
//}


include("templates/addPhoto.tpl.php");

?>
