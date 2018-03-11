<?php
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/entry.class.php';
include_once 'classes/history.class.php';
$objU		=	new user();
$objE 			=	new entry();
$objH 			=	new history();
  
 
   $cont_id 				=  $_GET['id'];
 		if(isset($_POST['add']))
		
		{
		
		 // $contentId		=	$_GET['id'];
		 
			// $id 				=  $_GET['id'];
			
			 $details			=	$_POST['details'];	
		 	$Date				= date('Y-m-d');		
		$client_id			=	explode("-",$id);
		//print_r($client_id);
		//exit;
		
		if($_POST['details']=="")
		{
	 	//$Summary 			= 'Removed from email received';
		$details			= 'Removed from contact us';
		}
		else
		{
		//  $Summary			=	$_POST['summary'];
		 $details			=	$_POST['details'];	
		}
		
		
		
		//echo "count==".$k=sizeof($client_id);
	
		//for($i = 0; $i < count($client_id)-1; $i++){
		
			$contact_id		= 	$objU->getcontact($cont_id);
		//	print_r($contact_id);
			
		
			$id				=	$contact_id[0];
	 		$name			= 	$contact_id['name'];
			 $last_name		=	$contact_id['last_name'];
			$position		=	$contact_id['positon'];
			$school			=	$contact_id['school'];
			$no_books		=	$contact_id['number_books'];
			$price_range	=	$contact_id['price_range'];
			$street			=	$contact_id['street'];
			$sub_street		=	$contact_id['substreet'];
			$state			=	$contact_id['state'];
			$country		=	$contact_id['country'];
			$postal			=	$contact_id['postal'];
			$con_num		=	$contact_id['contact'];
			$email			=	$contact_id['email'];
			$date 			=	$contact_id['client_date'];
			$info			=	$contact_id['information'];
			$comments		=	$contact_id['comments_sugg'];
			$tick			=	$contact_id['tick'];
			$tick_other		=	$contact_id['tick_other'];
			$call_time		=	$contact_id['calltime'];
			$ide_form		=	$contact_id['identity_from'];
			
			$rdate	= date('Y-m-d');
			
			
			
			$qry		=	$objU->addregister_contact($cont_id,$name,$last_name,$position,$school,$no_books,$price_range,$street,$sub_street,$state,$country,$postal,$con_num,$email,$date,$info,$comments,$tick,$tick_other,$call_time,$ide_form,$details,$rdate);
	
	
			$msg			= 	$objU->deleteContact($cont_id);	
			
			header("location:register_contact.php");
			//$desc	=	
			
			
		 	//$email			=	$objU->getSchoolEmail($name);
		 //	$m				=	$email['client_id'];
		 	//$school			=	$email['school'];
		
		 
		// $listEmail		=	$objU->getSchoolEmail($m);
		// $client		=	$listEmail['client_id'];
		
			
	//	$msg		= $objH->addEmail_History($m,$Date,$Summary,$details,$school);
		//$msg		= $objH->add_EmalHistory($m,$Date,$Summary,$details,1);
		
	//	$msg			= 	$objU->updateEmail($client_id[$i]);		
		//$msg			= 	$objU->deleteEmail($client_id[$i]);	
				
	
				
			
		


/*echo "<script language='javascript'>window.opener.location='workSpace.php';</script>";

echo "<script language='javascript'>window.close();</script>";*/
	//header('location:clientSheet.php?id='.$client_Id.'');
	


//	}		
	
}

 
	 /*if(isset($_POST['add']))
	 {
	 		$email		=	$value['email_from'];
		 $listEmail		=	$objU->getSchoolEmail($email);
		 $Summary			=	$_POST['summary'];
		$details			=	$_POST['details'];	
		$Date	= date('Y-m-d');	
		
		//$msg		= $objH->addHistory($client_id,$Date,$staffName,$Client,$school,$Summary,$details);
		
		$msg		= $objH->addContact_History($client_id,$Date,$Summary,$details);
		
		if($msg=="")
{

echo "<script language='javascript'>window.close();</script>";
	//header('location:clientSheet.php?id='.$client_Id.'');
	
}

	
	
	}*/
	
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
                            <td class="head">Add Register(Contacted)</td>
                            <td width="4"><img src="images/head_curve_right.gif" alt="" width="4" height="33" /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="385" valign="top" class="border"><table width="725" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
						<!-- <? if($msg!='') { ?>
				<tr>
            <td valign="top" colspan="2" align="center" class="tbtext"><font color="<?=$color?>"><?=$msg?></font></td>
          </tr>
			<? } ?>-->
                       
                          <tr>
                            <td><form id="form2" name="form2" method="post" action="" style="margin:0;">
                                <table width="569" border="0" align="center" cellpadding="2" cellspacing="0">
                                 <!-- <tr>
                                    <td class="tbtext">Ref.No</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="ref_number" id="ref_number" class="field2"   size="45"/></td>
                                  </tr>-->
                                 
                                  <tr>
                                    <td class="tbtext">Description</td>
                                    <td>&nbsp;</td>
                                    <td><textarea name="details" class="textarea"></textarea></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>
                                    <input type="image" name="add" value="Add" src="images/save.gif" alt="" onclick="return check();"  />
									&nbsp;&nbsp; <input type="image" name="submit" value="" src="images/close.gif" alt=""  />
									<input type="hidden" name="add" />
									</td>
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
    <td height="40" background="images/footer_bg.gif" align="center"><? include('footer.php')?></td>
  </tr>
</table>
<script language="javascript">
function check()
{
if(document.form2.details.value=="")
{
alert("Please enter description");
document.form2.details.focus();
return false;

}
}
</script>
</body>
</html>

