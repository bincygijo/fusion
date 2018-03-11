<?php
function generateInvoicePDF($client_Id,$account_id)
{
include_once '../../config/config.inc.php';
include_once 'classes/database.class.php';
include_once 'classes/production.class.php';


$objP			=	new production();
$pdf				=	new HTML2FPDF();

$listAmount		=	$objP->createPDF_list($client_Id);
$email			=	$listAmount['email'];
$address		=	$listAmount['street'];
$address1		=	$listAmount['substreet'];
$phone			=	$listAmount['contact'];
$name			=	$listAmount['name'];

$date_rec		=	$listAmount['date_received'];
$date1			=	explode("-",$date_rec);
$day			=   date('l',strtotime($date_rec));
$month			=	date('F',strtotime($date_rec));
$day1			=	$date1['2'];
$year			=	$date1['0'];
$school			=	$listAmount['school'];
$refno			=	$listAmount['school'];
 $rate_id		=	$listAmount['rate_type_id'];
$type1			=	$objP->getRatetype($rate_id);
$type			=	$type1['rate_type'];
$total			=	$listAmount['client_deposit'];
 $deposit		= $listAccount['client_deposit'];
$total1			=	$listpayment['amount'];
$refno			=	$listAmount['Ref_no'];

//$logo_file 	= 	"images/logo1.gif";
//$amount			=	
//print_r($listAmount);
//echo $result;
//$pdfName			=	notice."-[".$inserted_invoice."].pdf";

$pdfName			=	"invoicepayment".$client_Id.".pdf";
$pdf->AddPage();
?>
<? 
//write html to pdf
$pdf->WriteHTML("<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
<title>Untitled Document</title>
</head><body>");



$pdf->WriteHTML("<table align=\"right\" width=\"100%\" border=0><tr>");

	
				$temp12 = "<td  valign=\"top\" align=\"right\"><img src=\"images/logo1.png\" width=\"150\" height=\"95\"></td>";
			$pdf->WriteHTML("<td></td><td></td><td align=right>");
					

$pdf->WriteHTML($temp12);
$pdf->WriteHTML("</td></tr>");

			
$pdf->WriteHTML("<tr>
					<td valign=\"top\"></td>");
			
	          $temp6= "<td valign=\"top\" align=\"right\">";		
		     

$pdf->WriteHTML($temp6);
$pdf->WriteHTML($temp7);




				
		$temp2="</td></tr>";
		
		$temp1="<td valign=\"top\" align=\"right\">
	
			</td>";
			
			
	$temp3="<td valign=\"top\" align=\"right\">
	
			
			Fusion Books<br>
			$name<br>
			$address<br>
			$address1<br>
			$phone<br>
			$email<br>
			";


$pdf->WriteHTML( $temp2);	
$pdf->WriteHTML( $temp1);							
$pdf->WriteHTML($temp3);





 $temp3= "	
			</table>
			
			
			<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
			
			
			<tr><td align =\"center\">DATE</td><td><b>".$day.'&nbsp;,'.$day1.'&nbsp;'.$month.'&nbsp;'.$year."</b></td>
			<tr><td align =\"center\">SCHOOL</td><td><b>$school</b></td>
			<tr><td align =\"center\">REFERENCE NO</td><td><b>$refno</b></td>
			</tr>
			
			</table>
			
			<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
				<tr>
					<td width=\"50%\" bgcolor=\"#000000\" height=\"15px\" colspan=\"4\"><strong>&nbsp;<font color=\"#FFFFFF\">INVOICE DETAILS</font></strong></td>
					
					<td width=\"20%\" bgcolor=\"#000000\" align=\"center\"><strong><font color=\"#FFFFFF\">AMOUNT APPLIED</font></strong></td>

				</tr>
				
				<tr>
				<td colspan=\"4\">$type&nbsp;&nbsp;&nbsp;&nbsp;</td>
					
					
					<td align=\"center\" rowspan=\"1\" valign=\"bottom\">".'$'.$total."</td>
					
				</tr>	";	
				
						
	
$listpayment		=	$objP->listpayment($client_Id);
$count		=	$objP->getPayment($client_Id);
$sum 	=	$count['amount'];

	//print_r($listpayment);exit;
	if(!empty($listpayment))
	{
	foreach($listpayment as $key=>$value)
	{
	 $trans_id		= $value['type'];
	 $listType		=	$objP->getTransactionType($trans_id);
	$type1			=	$listType['name'];
 	$total1		=	$value['amount'];
	echo "GST==". $gst1		=	$sum +$total;
	$gst		=	$gst1/11;
	
	
	
					
					
				$temp10.="<tr><td colspan=\"4\">$type1&nbsp;&nbsp;&nbsp;&nbsp;</td>
					
					
					<td align=\"center\" rowspan=\"1\" valign=\"bottom\">".'$'.$total1."</td></tr>";
			}
	
	}		
			

							
			$temp11="<tr>
				
				<td colspan=\"4\" height=\"20\" border=\"0\" align=\"right\"><strong>&nbsp;</strong></td>
					
					<td align=\"center\" rowspan=\"1\" valign=\"bottom\"></td>
				</tr>
				
				
				<tr>
				
				<td colspan=\"4\" height=\"20\" border=\"0\" align=\"right\"><strong>Total</strong></td>
					
					<td align=\"center\" rowspan=\"1\" valign=\"bottom\">$".number_format($sum +$total,2)."</td>
					
					
				</tr>
				
				
				<tr>
				
				<td colspan=\"4\" height=\"20\" border=\"0\" align=\"right\"><strong>GST</strong></td>
					
					<td align=\"center\" rowspan=\"1\" valign=\"bottom\">$".number_format($gst,2)."</td>
					
					
				</tr>
				<tr><td bgcolor=\"#000000\" colspan=\"6\" height=\"5\"></td></tr>									
			</table><br><br>";


			$temp5 ="<table width=\"100%\" border=\"0\" bgcolor=\"#C2C2C2\">
				<tr>
					<td align=\"left\" height=\"15\" colspan=\"6\"><b>How to Pay</b></td>
				</tr>			
				<tr>
					<td></td><td><b>by mail</b></td><td align=\"\"></td><td><b>by direct deposit</b></td><td></td><td></td>

				</tr>
				<tr>
					<td></td><td></td><td align=\"\">Fusion Books</td><td></td><td></td><td></td>
				</tr>	
				<tr>
					<td></td><td></td><td align=\"\">Attn:Accounts </td><td></td><td>A/C Name</td><td>Fusion Books</td>
				</tr>
						
				<tr>
					<td></td><td></td><td align=\"\">PO Box 2501</td><td></td><td>Bank:</td><td>Bank West</td>
				</tr>
				<tr>
					<td></td><td></td><td align=\"\">Warwick WA  6024</td><td></td><td>Branch:</td><td>Warwick</td>
				</tr>	
				<tr>
					<td></td><td></td><td align=\"\"></td><td></td><td>A/C No:</td><td>067514-3</td>
				</tr>	
				<tr>
					<td></td><td></td><td align=\"\"></td><td></td><td>BSB:</td><td>306-074</td>
				</tr>			
			</table>
			";

$pdf->WriteHTML($temp3);
$pdf->WriteHTML($temp10);
$pdf->WriteHTML($temp11);
$pdf->WriteHTML($temp5);



				
$temp="	</td></tr></table>";





$pdf->WriteHTML($temp);


 $pdf->Output("invoices/".$pdfName);
// header('location:save_pdf.php?');

}?>