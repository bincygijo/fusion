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
                            <td class="head">Deposit Paid </td>
                            <td width="4"><img src="images/head_curve_right.gif" alt="" width="4" height="33" /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr >
                      <td height="385" valign="top" class="border">
					  <form name="progressSummary" action="" method="post">
					  <table width="100%" border="0">
					  
                        <tr>
                          <td width="46%" align="center" class="tbtext">School </td>
						    <td width="54%">
        <select name="Year" id="School" class="listmenu" style="width:100px" onchange="">
          <option value="" selected="selected">- Select All -</option>
          <?php
		//$schoolqry = mysql_query("select client_id,school from client_fusion ORDER BY  name");
		$schoolqry = mysql_query("select * from client_fusion C,client_account A WHERE C.client_id=A.client_id AND A.client_deposit>=300 AND C.status_remove=0  ORDER BY  C.name ASC");
		while($schoolresult = mysql_fetch_array($schoolqry))
		{
		?>
          <option value="<? echo $schoolresult['client_id'];?>"<?php if($school==$schoolresult['client_id']){echo "selected";} ?> ><?php echo $schoolresult['school'];?></option>
          <?php
		}
		?>
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
					  </form>
					
					  <?php
					/*  if(isset($_POST['search']))
	{*/
					  ?>
					  <table width="90%" align="center" border="0" cellpadding="4" cellspacing="1" bgcolor="#75bce1">
                              <tr class="rowcolor1">
							  <td align="center" class="tbhead">No</td>
                               <td class="tbhead">School</td>
								 <!--  <td align=""class="tbhead">Email</td>-->
                                  <td align="center" height="20" class="tbhead">No&nbsp;Of&nbsp;Books </td>
								  <td class="tbhead" align="center">Deposit</td>
                              <!--  <td class="tbhead">Expiry&nbsp;Date</td>-->
								<td class="tbhead">Total</td>
                                <?php
								  $j=$offset;
						 	$rows = mysql_num_rows($result);
								if($rows>0)
								{
								  $num =1;
								  while($list = mysql_fetch_array($result))
								   {
								    $expDte		=	$list['client_expires'];
								   $expDate			=	explode("-",$expDte);
								 
								 $exp_Date		=	$expDate[2]."/".$expDate[1]."/".$expDate[0];
							 	$deposit		=	 $list['client_deposit'];
								// $tot	=	0;
								  $total		=	$list['total'];
								
								if($total=='0.00')
								{
								$total	=	$list['client_deposit'];
								}
								$sum = 0;
								$sum	= $sum+$total	;
								
								
						//echo "sum==".		$sum		=	$rows +$total;
							
							//echo "sum==".	sum($total);
																//echo "sum==". array_sum($result);
					 //------------------------------
				   ?>
                               <tr class="rowcolor2">
							    <td class="tbtext" align="center"><?php echo $num++; ?></td>
                                <td class="tbtext" align="center"><?php echo $list['school']; ?></td>
								  <!-- <td class="tbtext" align="center"><?php echo $list['email']; ?></td>-->
                                  <td height="20" class="tbtext" align="center"><?php echo $list['client_book_require']; ?></td>
                                 <td class="tbtext" align="center"><?php echo $list['client_deposit']; ?></td>
                              <!--  <td class="tbtext" align="center"><?php echo $exp_Date; ?></td>-->
                                <td align="center" class="tbtext" ><?php echo $total; ?></td>
                            </tr>
							
							
						
							
				<?php
						//--------------
					
				}
				}
				
						
		//	echo "tot==".	$total2		=	array_sum($total);
				?>
				<tr class="rowcolor2"><td></td><td></td><td></td><td class="tbtext" align="center">Grand Total</td><td class="tbtext" align="center"><?php echo  number_format($sum,2);?></td></tr>
				
				
				<? //else
				//{
				?>
				
				
				<!-- 
				  <tr class="rowcolor2">
							   <td colspan="7" align="center" class="tbtext"><font color="#FF0000">No records found!</font></td>
					      </tr>-->
				<?php
			//	}
				?>
                            </table>
							<?php
						//	}
							?>
					  </td>
                    </tr>
					
					
					<tr> <td  align="center" class="tbhead border">	<?php for($i=1;$i<=$totpage;$i++) { ?>
		  <?php if($i==$page) { ?>
		  <?php  echo $i; 
		  } 
		  else { 
		   ?>
		   <a href="depositPaid.php?page=<?=$i?>&plimit=<?=$plimit?>"><? echo $i;?></a>
		   <?php } ?>
		   &nbsp; 
		  <?php } ?>	</td></tr>
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
<script type="text/javascript">
/*function validate()
{
	if(document.getElementById("Year").value == "")
}*/
</script>