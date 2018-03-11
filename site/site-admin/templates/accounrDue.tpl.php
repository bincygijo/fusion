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
                            <td class="head"><strong>  Accounts due</strong></td>
                            <td width="4"><img src="images/head_curve_right.gif" alt="" width="4" height="33" /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="385" valign="top" class="border">
					  <form name="trail_account" action="" method="post">
					  
					  <table width="90%" align="center" border="0">
                              <tr >
							  <td align="center"><strong><strong><font color="#FF0000"><?php echo $Message; ?></font></strong></strong></td>
							  </tr>
							  </table>
					 
					  <table width="90%" align="center" border="0" cellpadding="4" cellspacing="1" bgcolor="#75bce1">
                              <tr class="rowcolor1">
							  <td class="tbhead" align="center">No</td>
                                <td class="tbhead" align="center">School</td>
								 <td class="tbhead" align="center">Email</td>
                                <td height="20" class="tbhead" align="center">No Of Books </td>
								  <td class="tbhead" align="center">Deposit</td>
                               
                              
                                <td class="tbhead" align="center">Expiry Date</td>
								<td class="tbhead" align="center">Send Email</td>
                   <?php
				   $num =1;
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
					if($days<=7 && $days>0)
					{
						
					 //------------------------------
				
				
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
				
						//--------------
						/*function send_mail($to ,$subject,$message)
						{
							mail ($to ,$subject,$message); 
						}*/
						//--------------
						
					}
				}
				?>
                            </table>
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
		document.trail_account.action = "trailAccntExpire.php?to="+to+"&send="+1;
		document.trail_account.submit();
}
</script>