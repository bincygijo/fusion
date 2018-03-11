<b>Search Results </b>
<br />
<table width="699" border="0" style="border:1px solid #4674a4;">
  
 
   

          <tr>
            <td width="178" align="center"><strong>School Name</strong></td>
            <td width="165" align="center"><strong>Contact Person</strong></td>
            <td width="139" align="center"><strong>Suburb</strong></td>
            <td width="199" align="center"><strong>State</strong></td>
          </tr>
		  
		  
		   <?
  if(isset($_POST['Search_x']))
{
$arrSearch		=	 $objS->search_school($search);
//print_r($msg) ;
}
   $search				= isset($_POST['name'])	? $_POST['name'] 	: ''; 

   //$arrSearch		=	 $objS->search_school($search);
  //print_r($arrSearch);
   if(!empty($arrSearch)) { ?>
		  <? foreach($arrSearch as $key=>$value) { 
		  
		  
		  ?>
  <tr>
    <td align="center"><a href="clientSheet.php?id=<?=$value['client_id'];?>"><?=$value['school'];?>
    </a></td>
    <td align="center"><?=$value['name'];?></td>
    <td align="center"><?=$value['substreet'];?></td>
    <td align="center"><?=$value['state'];?></td>
  </tr>
  <? }} else {?>
  <tr>
    <td colspan="4" align="center" bgcolor="#FF0000">No Result Found</td>
  </tr><? }?>
</table>
