<?
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
include_once 'classes/production.class.php';
$objP			=	new production();
 $clientId		=	$_GET['id'];

$arrOrderform		=	$objP->orderform($clientId);
$paper_id		=	$arrOrderform['paper_id'];
 $cover_id		=	$arrOrderform['cover_id'];
 $bind_id	=	$arrOrderform['bind_id']; 
 $laminate_id		=	$arrOrderform['lamp_id']; 
 $deliver_id		=	$arrOrderform['book_id']; 
$paper				=	$objP->getpaper($paper_id);
$cover				=	$objP->getcover($cover_id);
$binding		=	$objP->getbinding($bind_id);
$laminate		=	$objP->getlaminate($laminate_id);
$deliverd		=	$objP->getdelivered($deliver_id);
//$paper		=	$db->getTableValue("");

//print_r($binding);
?>


<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0">
                                      <tr>
                                        <td width="335" class="grouphead">Order Form</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td class="tbtext">School Name</td>
                                          <td width="14">&nbsp;</td>
                                          <td width="496">
<input type="text" name="refNumber" class="field" value="<?=$arrOrderform['school'];?>" readonly="" /></td>
  </tr>
                                        <tr>
                                          <td class="tbtext">School Delivery Address </td>
                                          <td>&nbsp;</td>
                                          <td><input type="text" name="contactNname" class="field" value="<? echo $arrOrderform['client_order_del_addr'];?>" readonly=""/ ></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">Number of Books ordered </td>
                                          <td>&nbsp;</td>
                                          <td><input type="text" name="schoolName" value="<? echo $arrOrderform['client_book_require'];?>" class="field"  readonly=""/></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">Inside pages printed by </td>
                                          <td>&nbsp;</td>
                                          <td><input type="text" name="noBooks" class="field"  value="<? echo $paper['name'];?>" readonly=""/></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">Cover printed by </td>
                                          <td>&nbsp;</td>
                                          <td><input type="text" name="editorsDeadline" id="editorsDeadline" class="field" value="<?=$cover['name'];?>" readonly="" /> </td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">Laminated by </td>
                                          <td>&nbsp;</td>
                                          <td><input type="text" name="deliveryAddr" class="field"  value="<? echo $laminate['name'];?>" readonly=""/ ></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">Binding by </td>
                                          <td>&nbsp;</td>
                                          <td><input type="text" name="deliveryDate" class="field" id="deliveryDate"  value="<?=$binding['name'];?>"  readonly=""/> </td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">Delivery by </td>
                                          <td>&nbsp;</td>
                                          <td><input type="text" name="contactNumber" class="field" value="<? echo $deliverd['name'];?>"  readonly=""/></td>
                                      </tr>
                                        <tr>
                                          <td class="tbtext">Latest delivery date</td>
                                          <td>&nbsp;</td>
                                          <td><input type="text" class="field" name="email" value="<? echo $arrOrderform['client_order_del_date'];?>" readonly="" /></td>
                                        </tr>
                                        <tr>
                                          <td class="tbtext">&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td><a href="JavaScript:window.print();">Print </a></td>
                                        </tr>
                                    </table>
