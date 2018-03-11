<?php
ob_start();
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

$id			=	$_GET['id'];
$arrPhoto		=	$objU->listphoto($id);
 $oldimage		=	$arrPhoto['photo_name'];
 $desc1			=	$arrPhoto['photo_desc'];
  $desc2		=	$arrPhoto['description'];

if(isset($_POST['add']))
{
$name		=	$_FILES['file']['name'];

 $desc		= 	$_POST['desc'];
$type		=	$_FILES['file']['type'];
$size		=	$_FILES['file']['size'];
$description	=	$_POST['desc1'];
$school_name	=	$_POST['scool_name'];


/*$msg1		=	$objI->updatePicture2($_FILES,$desc,$description,$id);

if($msg1)
{
$msg		='Updated successfully!';
header("location:viewPhoto.php?msg=$msg&color=$color");


}*/


if($name=="")

{
 $qry	=	"UPDATE photo SET photo_desc ='$desc',description='$description',school_name='$school_name' WHERE photo_id=$id";
mysql_query($qry);
$msg		='Updated successfully!';
header("location:viewPhoto.php?msg=$msg&color=$color");
}

else
{
if ((($_FILES["file"]["type"] == "image/gif")|| ($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/jpg"))|| ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/JPEG") || ($_FILES["file"]["type"] == "image/JPG") || ($_FILES["file"]["type"] == "image/GIF") || ($_FILES["file"]["type"] == "image/PNG") && ($_FILES["file"]["size"] > 0))

  {
  
   $imagename = basename($name);
	echo "name==". $fName		= time().'_'.$imagename;
	 
	 
  
	  if ($_FILES["file"]["error"] > 0)
		{
		//echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
		}
	  else
		{
		   if (file_exists("upload/" . $fName))
		  {
		   $msg		=	$fName . " already exists. ";
		  }
    else
      { 
	
      move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $fName);
	  
	  $msg1	=	$objU->updatePhoto($fName,$desc,$description,$school_name,$id);
	  
	  if (file_exists("upload/" . $oldimage))
		  {
			unlink("upload/".$oldimage);
		  }
	 
} 
	 	  
	 if($msg1)
			{
			$msg		='Updated successfully!';
			header("location:viewPhoto.php?msg=$msg&color=$color");
			}
   
      }
   }

else
  {
  $msg	=	 "Uploded failed!";
  }

}
}
//print_r($arrPhoto);


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fusion Books</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
 <?php include_once 'templates/header.tpl.php'; ?>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="210" valign="top">
				 <?php include_once 'templates/left_side.tpl.php'; ?>
				</td>
                <td valign="top"><table width="767" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#0d76aa">
                          <tr>
                            <td width="4"><img src="images/head_curve_left.gif" alt="" width="4" height="33" /></td>
                            <td class="head"> Edit Photo</td>
                            <td width="4"><img src="images/head_curve_right.gif" alt="" width="4" height="33" /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="385" valign="top" class="border"><table width="725" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
						 <?php if($msg!='') { ?>
				<tr>
            <td valign="top" colspan="2" align="center" class="tbtext"><font color="<?=$color?>"><?=$msg?></font></td>
          </tr>
			<?php } ?>
                       
                          <tr>
                            <td><form id="form2" name="form2" method="post" action="" style="margin:0;" enctype="multipart/form-data">
                                <table width="569" border="0" align="center" cellpadding="2" cellspacing="0">
                                 <!-- <tr>
                                    <td class="tbtext">Ref.No</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="ref_number" id="ref_number" class="field2"   size="45"/></td>
                                  </tr>-->
                                  <tr>
                                    <td width="116" class="tbtext">File</td>
                                    <td width="2">&nbsp;</td>
                                    <td width="439"><input type="file" name="file" id="file" value="<?php echo $arrPhoto['photo_name']?>"   size="30" class="field1"/></td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">Pop-up Description</td>
                                    <td>&nbsp;</td>
                                    <td><textarea name="desc" class="textarea"><?=$arrPhoto['photo_desc']?></textarea></td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">Description</td>
                                    <td>&nbsp;</td>
                                    <td><textarea name="desc1" class="textarea"><?=$arrPhoto['description']?></textarea></td>
                                  </tr>
                                  <tr>
                                    <td class="tbtext">School Name </td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="scool_name"  class="field2" value="<?php echo $arrPhoto['school_name']?>" /></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>
                                    <input type="image" name="add" value="Add" src="images/submit.gif" alt=""  />&nbsp;
									  <img name="button" src="images/back.jpg" value="Go back" onClick="history.go(-1);"  />
									<input type="hidden" name="add" value="Add" />									</td>
                                  </tr>
                                </table>
                              </form></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="4"><img src="images/curve_bottom_left.gif" width="4" height="4" /></td>
                            <td background="images/bottom_pic.gif"><img src="images/bottom_pic.gif" alt="" width="1" height="4" /></td>
                            <td width="4"><img src="images/curve_bottom_right.gif" alt="" width="4" height="4" /></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        
        <tr>
          <td height="8"></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="40" background="images/footer_bg.gif" align="center"><?php include('footer.php')?></td>
  </tr>
</table>
</body>
</html>
