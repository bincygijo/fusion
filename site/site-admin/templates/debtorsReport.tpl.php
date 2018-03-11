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
                            <td class="head"><strong>Debtors Report</strong></td>
                            <td width="4"><img src="images/head_curve_right.gif" alt="" width="4" height="33" /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="385" valign="top" class="border">
					  <form name="trail_account" action="" method="post">
					  <table width="100%" border="0">
					  <tr>
				 <td align="center" colspan="2"><strong><strong><font color="#FF0000"><?php if($_GET['msg']){echo "Mail successfully send!"; }?></font></strong></strong></td>
					  </tr>
					  <?php
	$searchcount	=	$objU->count_expire();
	$pcount			= $objP->getPagerData($daycount,$plimit,$page);	
	$cpage   		= $pcount['page'];		
	$offset 		= $pcount['offset'];  	
	$limit  		= $pcount['limit']; 	
	$totpage  		= $pcount['numPages']; 
					 
					  ?>
                        <tr>
                          <td width="46%" align="center" class="tbtext">Accounts OverDue </td>
						    <td width="54%">
        <select name="overDue" id="overDue" class="listmenu" style="width:100px" onchange="">
          
          <option value="1"<?php if($overDue ==1){echo "selected";} ?>>1 Week</option>
		   <option value="2" <?php if($overDue ==2){echo "selected";} ?> >1 Day</option>
        </select></td>
                        </tr>
						<tr>
					  <td valign="bottom" height="30"  align="center"></td>
					  <td>
					  
					  <input type="image"  src="images/search.jpg"alt="" width="69" height="21" name="search"  />
					   <input type="hidden" name="search" />
					  					 </td>
					  </tr>
                      </table>
				
						<!----------------------------------------------------->
						<?php
					
								//echo  $overDue;
								 if($overDue ==2)
								 {
						?>
						<table width="90%" align="center" border="0" cellpadding="4" cellspacing="1" bgcolor="#75bce1">
                              <tr class="rowcolor1">
							  <td class="tbhead" align="center">No</td>
                                <td class="tbhead" align="center">School</td>
								 <td class="tbhead" align="center">Email</td>
                                <td height="20" class="tbhead" align="center">No Of Books </td>
								  <td class="tbhead" align="center">Deposit</td>
                               
                              
                                <td class="tbhead" align="center">Expiry Date</td>
								<td class="tbhead" align="center">Send Email</td>
							</tr>
                   <?php
				   
				  $daycount = 0;
				   $num =1;
				   if(!empty($result)){ 
				   while($list = mysql_fetch_array($result))
				   {
				   
				     $expDte		=	$list['client_expires'];
					  $expDate			=	explode("-",$expDte);
					  $exp_Date		=	$expDate[2]."/".$expDate[1]."/".$expDate[0];
				    $current_date = date("Y-m-d");
					 $exp_date 		=$list['client_expires'];
					  $exp_date_split = explode("-", $exp_date);
					 //-----------------------------
					$day = $exp_date_split[2]."<br>";
					$month = $exp_date_split[1];
					$year = $exp_date_split[0];
				   $days = (int)((mktime (0,0,0,$month,$day,$year) - time(void))/86400);
				
					if($days== '-1' )
					{
				$plimit			= isset($_REQUEST['plimit'])	? $_REQUEST['plimit'] 	: 20;
				$daycount++;
				$searchcount	=	$objU->count_expire();
				$pcount			= $objP->getPagerData($daycount,$plimit,$page);	
				$cpage   		= $pcount['page'];		
				$offset 		= $pcount['offset'];  	
				$limit  		= $pcount['limit']; 	
				$totpage  		= $pcount['numPages']; 
								
				   ?>
								
                              <tr class="rowcolor2">
							   <td class="tbtext" align="center"><?php echo $num++; ?></td>
                                <td class="tbtext" align="center"><?php echo $list['school']; ?></td>
								 <td class="tbtext" align="center"><?php echo $list['email']; ?></td>
                                <td height="20" class="tbtext" align="center"><?php echo $list['client_book_require']; ?></td>
                                <td class="tbtext" align="center"><font color="<?php  echo $color;?>"><?php echo $list['client_deposit']; ?></font></td>
                                <td align="center" class="tbtext"><?php echo $exp_Date; ?></td>
                                <td align="center" class="tbtext"><font color="<?php  echo $color;?>"><a href="javascript:send_mail('<?php echo $list['email']; ?>');" name="email" id="email">Send</a></font></td>
                            </tr>
					
				<?php
				
						
					}
				}
				?>
                          </table>
							<?php
							}?>
							
							
							
							
							<? 
												
							 if($overDue ==1)
							{
								
							?>
							<table width="90%" align="center" border="0" cellpadding="4" cellspacing="1" bgcolor="#75bce1">
                              <tr class="rowcolor1">
							  <td class="tbhead" align="center">No</td>
                                <td class="tbhead" align="center">School</td>
								 <td class="tbhead" align="center">Email</td>
                                <td height="20" class="tbhead" align="center">No Of Books </td>
								  <td class="tbhead" align="center">Deposit</td>
                                <td class="tbhead" align="center">Expiry Date</td>
								 <td class="tbhead" align="center">Make a Call</td>
							  </tr>
								  <?php
					$j=$offset;
				   $num =0;
				   while($list = mysql_fetch_array($result))
				   {
				 
				    $expDte		=	$list['client_expires'];
					  $expDate			=	explode("-",$expDte);
					  $exp_Date		=	$expDate[2]."/".$expDate[1]."/".$expDate[0];
				  	 $current_date 		= 	date("Y-m-d");
					  $d			=	date('d');
					  $exp_date 			=	$list['client_expires'];
					 $exp_date_split 	= 	explode("-", $exp_date);
				 //-----------------------------
				  	 $day = $exp_date_split[2];
					$month = $exp_date_split[1];
					$year = $exp_date_split[0];
						 
		
				 $days1 = (int)((mktime (0,0,0,$month,$day,$year) - time(void))/86400);
			
						 	
					if($days<=-7 )
					{
					
					$plimit			= isset($_REQUEST['plimit'])	? $_REQUEST['plimit'] 	: 20;
				    $searchcount	=	$objU->count_expire();
					$pcount			= $objP->getPagerData($searchcount,$plimit,$page);	
					$cpage   		= $pcount['page'];		
					$offset 		= $pcount['offset'];  	
					$limit  		= $pcount['limit']; 	
					$totpage  		= $pcount['numPages']; 
				   					 
					 //------------------------------
				   ?>
								
                              <tr class="rowcolor2">
							   <td class="tbtext" align="center"><?php echo  ++$num; ?></td>
                                <td class="tbtext" align="center"><?php echo $list['school']; ?></td>
								 <td class="tbtext" align="center"><?php echo $list['email']; ?></td>
                                <td height="20" class="tbtext" align="center"><?php echo $list['client_book_require']; ?></td>
                                <td class="tbtext" align="center"><font color="<?php  echo $color;?>"><?php echo $list['client_deposit']; ?></font></td>
                                <td align="center" class="tbtext"><?php echo $exp_Date	; ?></td>
                                <td align="center" class="tbtext"><font color="<?php  echo $color;?>"><a href="javascript:openWindow(<?php echo $list['client_id']; ?>);" name="email" onclick="" id="email"> Conversations</a></font></td>
                            </tr>
					
				<?php
				
						
					}
				}
				?>
						  </table>
								
								

							<?php
							}
				
				}
							?>
							
							<table width="733" border="0">
  <tr>
                            <td width="727"  align="center" class="tbhead"><?
							
							 for($i=1;$i<=$totpage;$i++) { ?>
		  <? if($i==$page) { ?>
		  <?  echo $i; 
		  } 
		  else { 
		   ?>
		   <a href="debtorsReport.php?page=<?=$i?>&plimit=<?=$plimit?>&overDue=<?=$overDue?>"><? echo $i;?></a>
		   <? } ?>
		   &nbsp; 
		  <? } ?>	</td>
                          </tr>
</table>

						<!----------------------------------------------------->
					   
						<input type="hidden" id="client_id" name="client_id" value="" />
						<input type="hidden" name="" value="">
					  </form>
					  
					   
					  </td>
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

</body>
</html>
<script type="text/javascript">

/*function validate()
{
	if(document.getElementById("Year").value == "")
}*/
function send_mail(to)
{
		document.trail_account.action = "ExpireDay.php?to="+to+"&send="+1;
		document.trail_account.submit();
	//url = "ExpireDay.php";
	//newurl = url+"?to="+to+"&send="+1;
	//aWindow=window.open(newurl,"theWindow","height=500,width=500,left=200,top=100,scrollbars=yes");
}
function openWindow(Cid)
{
	url = "add_conversation.php";
	newurl = url+"?Cid="+Cid;
	aWindow=window.open(newurl,"theWindow","height=500,width=500,left=200,top=100,scrollbars=yes");
}

</script>