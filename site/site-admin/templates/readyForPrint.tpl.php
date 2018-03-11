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
 <?php include_once 'header.tpl.php'; ?>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="210" valign="top">
				 <?php include_once 'left_side.tpl.php'; ?>
				</td>
                <td valign="top"><table width="767" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#0d76aa">
                          <tr>
                            <td width="4"><img src="images/head_curve_left.gif" alt="" width="4" height="33" /></td>
                            <td class="head"><strong>Books Ready For Print </strong></td>
                            <td width="4"><img src="images/head_curve_right.gif" alt="" width="4" height="33" /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="385" valign="top" class="border">
					  <form name="readyForPrint" action="" method="post">
					   
					  <table width="90%" align="center" border="0">
                              <tr >
							  <td align="center"><strong><strong><font color="#FF0000"><?php echo $Message; ?></font></strong></strong></td>
							  </tr>
							  </table>
					 
					  <table width="90%" align="center" border="0" cellpadding="4" cellspacing="1" bgcolor="#75bce1">
                              <tr class="rowcolor1">
							  <td class="tbhead" align="center">No</td>
                                <td class="tbhead" align="center">School</td>
								 <td class="tbhead" align="center">Name</td>
                         
								  <td class="tbhead" align="center">Dispatch Date</td>
								  <td class="tbhead" align="center">Editors Dead Line</td>
                               
                              
                                
								<td class="tbhead" align="center">Status</td>
                   <?php
				    $j=$offset;
				   $num =1;
				    if(!empty($result)){
				   $rows = mysql_num_rows($result);
				   if($rows>0)
				   {
					   while($list = mysql_fetch_array($result))
					   {
							if( $list['print_status'] == "RDY")
								$status = "Ready For Print";
							else
								$status = "Not Ready For Print";
							
						 //------------------------------
						 $desDate		=	$list['product_dispatched'];
						 $exp_Desp		=	explode("-",$desDate);
						 $despDate		=	$exp_Desp[2]."/".$exp_Desp[1]."/".$exp_Desp[0];
						 
						 $cId = $list['client_id'];
						 $expdateQry = mysql_query("select client_order_deadline from  client_order where client_id='$cId'");
						 $dateresult = mysql_fetch_array($expdateQry);
						 $expDate = $dateresult['client_order_deadline'];
						 $exp_Date	=	explode("-",$expDate);
						 $expiry_date		=	$exp_Date[2]."/".$exp_Date[1]."/".$exp_Date[0];
						 if($expDate != "")
							{
			
						 //-------------------------------------------------------
						 $exp_date_split = explode("-", $expDate);
					 //-----------------------------------------------------------------
							$day = $exp_date_split[2];
							$month = $exp_date_split[1];
							$year = $exp_date_split[0];
							$days = (int)((mktime (0,0,0,$month,$day,$year) - time(void))/86400);
							if($days <=0)
							{
								 
								$msg2	=	$objP->updateClientPrintStatus($clientId);
							}
						}		 //-------------------------------------------------------
				
				   ?>
								
                              <tr class="rowcolor2">
							   <td class="tbtext" align="center"><?php echo  ++$j; ?></td>
                                <td class="tbtext" align="center"><?php echo $list['school']; ?></td>
								<td class="tbtext" align="center"><?php echo $list['name']; ?></td>
                                <td height="20" class="tbtext" align="center"><?php echo $despDate; ?></td>
                                <td class="tbtext" align="center"><?php echo $expiry_date; ?></td>
                              
                                <td align="center" class="tbtext"><?php echo $status; ?></td>
                            </tr>
					
				<?php
				}
				}
				}
				else
				{
				?>
				<tr class="rowcolor2">
							   <td colspan="7" align="center" class="tbtext"><font color="#FF0000">No Result Found !!</font></td>
							   </tr>
				<?php
				}
				
						//--------------
						/*function send_mail($to ,$subject,$message)
						{
							mail ($to ,$subject,$message); 
						}*/
						//--------------
						
					
				
				?>
                            </table>
					  </form>
					  
					   
					  </td>
                    </tr>
					
					<tr> <td  align="center" class="tbhead border">	<? for($i=1;$i<=$totpage;$i++) { ?>
		  <? if($i==$page) { ?>
		  <?  echo $i; 
		  } 
		  else { 
		   ?>
		   <a href="readyForPrint.php?page=<?=$i?>&plimit=<?=$plimit?>"><? echo $i;?></a>
		   <? } ?>
		   &nbsp; 
		  <? } ?>	</td></tr>
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

</body>
</html>
<script type="text/javascript">
/*function validate()
{
	if(document.getElementById("Year").value == "")
}*/
function send_mail(to)
{
		document.trail_account.action = "trailAccntExpire.php?to="+to+"&send="+1;
		document.trail_account.submit();
}
</script>