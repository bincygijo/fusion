<?php
	/* File Name	:	user.class.php
	   Purpose		:	For handling client related functions 
	  	 */
	require_once "database.class.php";
include_once('ImageResizeFactory.php');

		
	class image
	{
		var $RowCount;
		var $ListArray;
		var $ListRow;
		var $db;
		
		// Function for creating database connection......................
		function __construct()
		{
			$this->db	= new database();
		
			if(!$this->db->dbConnect())
				"Error Connection".$this->db->ErrorInfo;
		}# Close Construct function	
		/*function __destruct()
		{
			$this->db->dbClose();
		}*/
		
		
		function InsertPicture($file,$popdesc,$desc,$school_name)
	{
		/*for($i=1;$i<=5;$i++)
		{*/
			if(!empty($file['file']['name']))
					{
						$imagename1 = $this->check_image($file['file']);
						if($imagename1=="")
						return "Please upload a valid jpg/gif for Small Image!";
						
						if(move_uploaded_file($file['file']['tmp_name'], "upload/".$imagename1))
						{
							$srcFile 	= "upload/".$imagename1;
							
							copy($srcFile, "upload/original/".$imagename1);
							
							$width						= 159;
							$height						= 114;
							$destFile 					= "upload/thumb/".$imagename1;
							$objResize 					= ImageResizeFactory::getInstanceOf($srcFile, $destFile, $width, $height);
							$objResize->getResizedImage();
							unset($objResize);
							unlink($srcFile);
						}//////if(move_uploaded_file ends
						else
						return "Image cannot be uploaded ,please try later!";
					}////////if(!empty($file['image1'])) ends
					else
					 $imagename1		= "";
					// if(!empty($imagename1))
					// {
					 $query = "insert into photo (photo_name,photo_desc,description,school_name) VALUES ('$imagename1','$popdesc','$desc','$school_name')";
					 $result	= $this->db->setQuery($query);
					// }
					 
		//}///for ends
		return $result;
	}
		 
		 function check_image($file)
		{	
			$extarray		= array("jpg","jpeg","gif","png","JPEG","JPG","GIF","PNG");
			 $image_real	= $file['name'];
			 $image_temp		= $file['tmp_name'];
			 $imagename		= "";
			
			$size			= getimagesize($image_temp);
			$width			= $size[0];
			$height			= $size[1];
			 $file_ext		= substr(strrchr($image_real, "."), 1);
			
			 $image_real		= time().".".$file_ext; 
			
			if(($width<=0)||($height<=0)|| (!in_array($file_ext,$extarray)))
			return "";
			else
			return $image_real;
		}
		 
		
		 //update picture
		 function updatePicture2($file,$desc,$description,$school_name,$picid)
	{	
		/*for($i=1;$i<=5;$i++)
		{*/
			
			if(!empty($file['file']['name']))
					{
							$picid= $val['subim'];	
							$q="select * from photo where photo_id='$picid'";
							$res	= $this->db->readValues($q); 
							 $oldimg= $res[0]['photo_name'];
							
					
							 if($oldimg!="")
							 {
							 $uploadfilepath  = "upload/thumb/";
							 $uploadfilepath1 = "upload/original/";
							
							  $fileex  = $uploadfilepath.trim($oldimg);
							  $fileex1 = $uploadfilepath1.trim($oldimg);
							 if(file_exists($fileex))
								{
								unlink($fileex);
								}
							 if(file_exists($fileex1))
								{
								unlink($fileex1);
								}
							}
							$imagename1 = $this->check_image1($file['file']);
					
						if($imagename1=="")
						return "Please upload a valid jpg/gif for Small Image!";
						
						if(move_uploaded_file($file['file']['tmp_name'], "upload/".$imagename1))
						{
							$srcFile 	= "upload/".$imagename1;
							
							copy($srcFile, "upload/original/".$imagename1);
							
							$width						= 159;
							$height						= 114;
							$destFile 					= "upload/thumb/".$imagename1;
							$objResize 					= ImageResizeFactory::getInstanceOf($srcFile, $destFile, $width, $height);
							$objResize->getResizedImage();
							unset($objResize);
							unlink($srcFile);
						}//////if(move_uploaded_file ends
						else
						return "Image cannot be uploaded ,please try later!";
					}////////if(!empty($file['image1'])) ends
					else
					 $imagename1		= "";
					// if(!empty($imagename1))
					// {
					// if($picid!="")
					// {
			echo	 $query = "update photo set  photo_name='$imagename1',photo_desc='$desc',description='$description',school_name='$school_name' where  photo_id='$picid'";
					 $result	= $this->db->setQuery($query);
				//	}
					//}
					 /*else
					 {
					echo 	$query = "update photo set photo_name='$imagename1',photo_desc='$desc',description='$description' where  photo_id='$picid'";
					 $result	= $this->db->setQuery($query);			
					 }
*/					// }
					 
		//}///for ends
		return $result;
	}
		 
		 
		function check_image1($file)
		{	
			$extarray		= array("jpg","jpeg","gif","png","JPEG","JPG","GIF","PNG");
			$image_real		= $file['name'];
			$image_temp		= $file['tmp_name'];
			$imagename		= "";
			
			$size			= getimagesize($image_temp);
			$width			= $size[0];
			$height			= $size[1];
			$file_ext		= substr(strrchr($image_real, "."), 1);
			 $image_real		= time().".".$file_ext; 
			
			//$image_real		= "propertyimage_".$AdId."_".$i.".".$file_ext; 
			
			if(($width<=0)||($height<=0)|| (!in_array($file_ext,$extarray)))
			return "";
			else
			return $image_real;
		} 
		 
		 
		
	}
		
		
/* End : image.class.php  */

?>
