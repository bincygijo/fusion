<?php


require_once "database.class.php";
require_once("imageresizing.php");
class photo
{
function move_file_image($imagename,$type,$popdesc,$dec,$schoolname)
{
			if($type=='image/jpeg' || $type=='image/gif' || $type=='image/png' || $type=='image/pjpeg')
		{
		
		     $imagename = basename($imagename);
			 list($name,$ext)=split('[.]', $imagename);
			 $fName		= time().'-'.$imagename;
				
			$tmpName = $tmp_name;
			$filePath_main 	= 	'upload/'.$fName;
			copy($tmpName,$filePath_main) ;
			
			
					
			
				$filePath_thumb = 	'upload/thumb/'.$fName;
			//move_uploaded_file($fName,$filePath_main) ;
			 smart_resize_image($tmpName, $width = 112, $height=78, $proportional = true, $output = 'file', $delete_original = false, $use_linux_commands = false );
			 $success_full = move_uploaded_file($tmpName, $filePath_thumb);	
				chmod($filePath_thumb, 0777);
				
			//echo  $c_id=$_SESSION['c_id'];	
					
			mysql_query("INSERT INTO photo (photo_name ,photo_desc ,description,school_name)VALUES ('$filePath_main', '$popdesc', '$dec','$schoolname')");
			
			
				
		}else
		{
		//$errorformat="Invalid file format";
		echo "Inavalid file format";
		}
		
			
		
}


function update_img($id,$imagename,$tmp_name,$type,$cat_id)
{
if($type=='image/jpeg' || $type=='image/gif' || $type=='image/png' || $type=='image/pjpeg')
		{
		
		    $imagename = basename($imagename);
			 list($name,$ext)=split('[.]', $imagename);
			 $fName		= time().'-'.$imagename;
				
			$tmpName = $tmp_name;
			$filePath_main 	= 	'upload/pic/'.$fName;
			$filePath_thumb = 	'upload/thumb/'.$fName;
			if (file_exists("upload/pic/" . $fName))
		  {
		  unlink("upload/pic/".$fName);
		  // $msg		=	$name . " already exists. ";
		  }
		  
		   if (file_exists("upload/thumb/" . $fName))
		  {
		  unlink("upload/pic/".$fName);
		  // $msg		=	$name . " already exists. ";
		  }
			copy($tmpName,$filePath_main) ;
			
			
					
			
				
			//move_uploaded_file($fName,$filePath_main) ;
			 smart_resize_image($tmpName, $width = 112, $height=78, $proportional = true, $output = 'file', $delete_original = false, $use_linux_commands = false );
			 $success_full = move_uploaded_file($tmpName, $filePath_thumb);	
				chmod($filePath_thumb, 0777);
				
			 $c_id=$_SESSION['c_id'];	
					
			//mysql_query("INSERT INTO `troncoso`.`gallery` (`c_id` ,`thumb` ,`pic`)VALUES ('$c_id', '$filePath_thumb', '$filePath_main')");
			if($id==''){
			mysql_query("INSERT INTO gallery (`c_id` ,`thumb` ,`pic`)VALUES ('$cat_id', '$filePath_thumb', '$filePath_main')");
			}else{
			mysql_query("UPDATE gallery SET c_id='$cat_id',thumb='$filePath_thumb',pic='$filePath_main' WHERE id='$id'");
			}
			
		}

}


function image_show($ctg_id)
{ 
    $result=mysql_query("select * from gallery where c_id=$ctg_id");
	 while($row=mysql_fetch_array($result))
	 {
	  $thumb=$row['thumb'];
		$pic=$row['pic'];
		$img_arr[$thumb]=$pic;
	 }
	 return $img_arr;
}



function imageId($ctg_id)
{ 
$idarray =array();
$i=0;
    $result=mysql_query("select * from gallery where c_id=$ctg_id order by id");
	 while($row=mysql_fetch_array($result))
	 {
	
	  $id=$row['id'];
		$idarray[$i]=$id;
		 $i++;
	 }
	 return $idarray;
}


function imgThumb($ctg_id)
{
   $thumbarray =array();
$i=0;
    $result=mysql_query("select * from gallery where c_id=$ctg_id order by id");
	 while($row=mysql_fetch_array($result))
	 {
	
	  $thumb=$row['thumb'];
		$thumbarray[$i]=$thumb;
		 $i++;
	 }
	 return $thumbarray;
}


function imgPic($ctg_id)
{
   $picarray =array();
$i=0;
    $result=mysql_query("select * from gallery where c_id=$ctg_id order by id");
	 while($row=mysql_fetch_array($result))
	 {
	
	  $pic=$row['pic'];
		$picarray[$i]=$pic;
		 $i++;
	 }
	 return $picarray;
}

function disc_show($ctg_id)
{
     $result=mysql_query("select * from categories where id=$ctg_id");
	 while($row=mysql_fetch_array($result))
	 {
	    $c_desc=$row['c_desc'];
		
	 }
	 return $c_desc;
}

function deleteimg($ctg_id)
{
$qry		=	"DELETE FROM gallery WHERE c_id=$ctg_id";

}
}
?>