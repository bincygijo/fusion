<? 
ob_start();
include_once '../../config/config.inc.php';
// $name		=	$_GET['id'];


//delete bakp folder
	$alldate		=	$objU->getalldate();
	$cId		=	$alldate[0]['client_id'];
	 $del_date		=	$alldate[0]['delete_date'];
	
	/*$i		=	14;
   $newdate=date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")-$i, date("Y")));
if($del_date == $newdate)
   {
  	 $backup="backup-".$cId;

 	$filename = "".$backup.".txt";
	  if (file_exists("Bin/" . $filename))
		  {
			unlink("Bin/".$filename);
		  }
		  
	}	  */
//print_r($alldate);
//echo sizeof($alldate);

 	$orderby 		= isset($_REQUEST['orderby'])	? $_REQUEST['orderby']	: 'ASC';
	$field	 		= isset($_REQUEST['field'])		? $_REQUEST['field']	: 'school';
	
	$name				= isset($_GET['id'])	? $_GET['id'] : ''; 
	$page			= isset($_REQUEST['page'])		? $_REQUEST['page'] 	: 1;
	$plimit			= isset($_REQUEST['plimit'])	? $_REQUEST['plimit'] 	: 20;
	
	$searchcount	=	$objU->countdeadline();
  	$pcount			= $objP->getPagerData($searchcount,$plimit,$page);	
	$cpage   		= $pcount['page'];		
	$offset 		= $pcount['offset'];  	
	$limit  		= $pcount['limit']; 	
	$totpage  		= $pcount['numPages']; 
	//echo $totpage;
	 $listSchool	=	$objU->listdeadline($field,$orderby,$offset,$limit);
	 
	 if($orderby== 'ASC')
		$orderby1	= 'DESC';
	else
		$orderby1	= 'ASC';
	
 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fusion Books</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body >
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
                            <td class="head">Deadlines</td>
                            <td width="4"><img src="images/head_curve_right.gif" alt="" width="4" height="33" /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="385" valign="top" class="border"><table width="725" border="0" align="center" cellpadding="0" cellspacing="0">
                         
                          <tr>
                            <td class="subhead"></td>
                          </tr>
                          <tr>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td><form id="form1" name="form1" method="post" action="" style="margin:0;">
                                    <table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#75bce1">
                                      <tr class="rowcolor1">
                                        <td width="23%" height="20" class="tbhead">School Name</td>
                                        <td width="16%" class="tbhead">Editor’s Deadline </td>
                                        <td width="24%" class="tbhead"><a class="" href="deadline.php?orderby=<?=$orderby1?>&plimit=<?=$plimit?>&page=<?=$page?>">Delivery Date</a></td>
                                      <td width="12%" class="tbhead">Cover Design</td>
										 <td width="10%" class="tbhead">cover&nbsp;Approved</td>
										  <!--   <td width="15%" class="tbhead">Delete</td>-->
                                      </tr>
                                      <?

  										 if(!empty($listSchool)) { ?>
                                      <? foreach($listSchool as $key=>$value) { 
									  $client_id	=	$value['client_id'];
		$delidate	=	 $objU->getorderdate($client_id);
		$arrCover	=		$objU->getCover($client_id);
		
		 //  $qry		=	mysql_query("select * from client_order where client_id=$client_id");
		   $deliverydate		=	$delidate['client_order_del_date'];
		  $deadline				=	 $delidate['client_order_deadline'];
		  $cover				=	$arrCover['Cover_designed'];
		  $approved				=	$arrCover['Cover_approved'];
		  if($cover=='Y')
		  $cover	=	'Yes';
		 // else
		 // $cover	=	'No';
		  if($approved=='Y')
		  $approved	=	'Yes';
		 								 ?>
                                      <tr class="rowcolor2">
                                        <td height="20" class="tbtext">
                                        <a href="clientSheet.php?id=<?=$value['client_id'];?>">  <?=$value['school'];?></a>
                                       </td>
                                        <td class="tbtext" align="center"><?=$deadline;?></td>
                                        <td align="center" class="tbtext"><?=$deliverydate;?></td>
                                       <td align="center" class="tbtext"><?=$cover?></td>
										<td align="center" class="tbtext"><?=$approved?></td>
										<!-- <td align="center" class="tbtext"><a href="deleteClient.php?cid=<?=$value['client_id'];?>&id=<?=$name?>" onclick="return del();">Delete</a></td>-->
                                      </tr>
                                      <?php
		}
	} else {
?>
                                      <tr class="rowcolor2">
                                        <td colspan="6" class="tbtext"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td  align="center">&nbsp;</td>
                                              <td align="center"><font color="#FF0000">No Records Found!</font></td>
                                            </tr>
                                        </table></td>
                                      </tr>
                                      <? }?>
                                      
                                    </table>
                                  </form></td>
                                </tr>
                              </table></td>
                          </tr>
                          <tr>
                            <td  align="center" class="tbhead">	<? for($i=1;$i<=$totpage;$i++) { ?>
		  <? if($i==$page) { ?>
		  <?  echo $i; 
		  } 
		  else { 
		   ?>
		   <a href="deadline.php?page=<?=$i?>&plimit=<?=$plimit?>&orderby=<?=$orderby?>"><? echo $i;?></a>
		   <? } ?>
		   &nbsp; 
		  <? } ?>	</td>
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
</body>
</html>

 <script language="javascript">
function check(){	
	var	a			= 	document.form1;
	var countChecked= 	0;
	for(var i = 0; i < document.getElementById('form1').elements.length ; i++){	
		if(document.getElementById('form1').elements[i].checked == true){
			countChecked=countChecked+1;
		}
	}	
	if(countChecked != 0){
		var x=confirm("Do you contact that person?");
		if(x == true)
			return true;
		else
			return false;
	}else{
		alert("You must select atleast one client");
		return false;
	}
	return false;		
}

checked = false;
function checkedAll () {
	if (checked == false){
		checked = true
	}else{
		checked = false
	}
	for (var i = 0; i < document.getElementById('form1').elements.length; i++) {
		document.getElementById('form1').elements[i].checked = checked;
	}
}

checked = false;
function checking () {
	if (checked == false){
		checked = true
	}else{
		checked = false
	}
	for (var i = 0; i < document.getElementById('form2').elements.length; i++) {
		document.getElementById('form2').elements[i].checked = checked;
	}
}
</script>

<script language="javascript" type="text/javascript">
	function del()
	{
	
		var x=confirm("Do you want to delete");
		if(x==true)
		return true;
		else
		return false;
	}
	
	function bkpdel()
	{
	var url="deldate.php";
	alert(url);
	//url=url+"?q="+str
	}
</script>