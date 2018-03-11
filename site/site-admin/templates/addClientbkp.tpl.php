<b>New Client Registration</b>
<form name="frm" method="post" action="">
<table width="699" border="0" style="border:1px solid #4674a4;">
  <tr>
    <td align="center" >&nbsp;</td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td width="275" align="center" >Name</td>
    <td width="408" ><input type="text" name="name" id="name"  value="<?=$_POST['name'];?>" size="45"/></td>
  </tr>
  <tr>
    <td width="275" align="center">Position</td>
    <td width="408"><input type="text" name="position" id="position"  value="<?=$_POST['position'];?>" size="45"/></td>
  </tr>
  <tr>
    <td width="275" align="center">School</td>
    <td width="408"><input type="text" name="school" id="school"  value="<?=$_POST['school'];?>" size="45"/></td>
  </tr>
  <tr>
    <td align="center"><b>Postal Address</b></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">Street</td>
    <td><input type="text" name="street" id="street"  value="<?=$_POST['street'];?>" size="45"/></td>
  </tr>
  <tr>
    <td align="center">Suburb</td>
    <td><input type="text" name="substreet" id="substreet"  value="<?=$_POST['substreet'];?>" size="45"/></td>
  </tr>
  <tr>
    <td align="center">State</td>
    <td><input type="text" name="state" id="state"  value="<?=$_POST['state'];?>" size="45"/></td>
  </tr>
  <tr>
    <td align="center">Country</td>
    <td><input type="text" name="country" id="country"  value="<?=$_POST['country'];?>" size="45"/></td>
  </tr>
  <tr>
    <td align="center">Postcode </td>
    <td><input type="text" name="postal" id="postal"  value="<?=$_POST['postal'];?>" size="45"/></td>
  </tr>
  <tr>
    <td align="center">Best Contact Number </td>
    <td><input type="text" name="contact" id="contact"  value="<?=$_POST['contact'];?>" size="45"/></td>
  </tr>
  <tr>
    <td align="center">Email Address </td>
    <td class="txtboxes"><input type="text" name="email" id="email"  value="<?=$_POST['email'];?>" size="45"/></td>
  </tr>
  <tr>
    <td align="center">Other information </td>
    <td><textarea cols="40" rows="7" name="info"></textarea></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td><input type="submit" name="add" value="Add" /></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>