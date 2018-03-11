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
                            <td class="head"><strong>Trial  Accounts expired</strong></td>
                            <td width="4"><img src="images/head_curve_right.gif" alt="" width="4" height="33" /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="385" valign="top" class="border">
					  <form name="trail_account" action="" method="post">
					   
					  <table width="90%" align="center" border="0">
                              <tr >
							  <td align="center"><font color="#FF0000"><?php echo $Message; ?></font></td>
							  </tr>
						  </table>
					 
					  <table width="90%" align="center" border="0" cellpadding="4" cellspacing="1" bgcolor="#75bce1">
                              <tr class="rowcolor1">
							  <td width="4%" align="center" class="tbhead">No</td>
                                <td width="23%" align="center" class="tbhead">School</td>
								 <td width="16%" align="center" class="tbhead">Email</td>
                                <td width="15%" height="20" align="center" class="tbhead">No&nbsp;Of&nbsp;Books </td>
								  <td width="16%" align="center" class="tbhead">Deposit</td>
                               
                              
                                <td width="16%" align="center" class="tbhead">Expiry&nbsp;Date</td>
								<td width="10%" align="center" class="tbhead">Total</td>
                                <?php
								  $j=$offset;
								 
				   $num =1;
				 if(!empty($result)){
				  $rows = mysql_num_rows($result);
				   if($rows>0)
				   {
				   while($list = mysql_fetch_array($result))
				   {
				   
				    $expDte		=	$list['client_expires'];
					  $expDate			=	explode("-",$expDte);
					  $exp_Date		=	$expDate[2]."/".$expDate[1]."/".$expDate[0];
				   	 $current_date = date("Y-m-d");
					 $exp_date 		=$list['client_expires'];
					  $exp_date_split = explode("-", $exp_date);
					 //-----------------------------
					$day = $exp_date_split[2];
					$month = $exp_date_split[1];
					$year = $exp_date_split[0];

					 $days = (int)((mktime (0,0,0,$month,$day,$year) - time(void))/86400);
					if($days<0)
					{
						
						//echo $number = $num++;
						if($number>0)
						{
						
						
						} }
					 //------------------------------
				//echo ++$j;
				
				   ?>
								
                              <tr class="rowcolor2" id="">
							   <td class="tbtext" align="center"><?php echo  ++$j ?></td>
                                <td class="tbtext" align="center"><?php echo $list['school']; ?></td>
								 <td class="tbtext" align="center"><?php echo $list['email']; ?></td>
                                <td height="20" class="tbtext" align="center"><?php echo $list['client_book_require']; ?></td>
                                <td class="tbtext" align="center"><?php echo $list['client_deposit']; ?></td>
                                <td  class="tbtext" align="center"><?php echo $exp_Date; ?></td>
                                <td  class="tbtext" align="center"><?php echo number_format($list['total'],2); ?></td>
                            </tr>
					
				<?php
						}
						}
				       }
				
				     
						else
						{
						?>
						<tr class="rowcolor2">
							   <td colspan="7" align="center" class="tbtext"><font color="#FF0000">No List !!</font></td>
						    </tr>
						<?php
						}
				
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
		   <a href="trailAccountExpired.php?page=<?=$i?>&plimit=<?=$plimit?>"><? echo $i;?></a>
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