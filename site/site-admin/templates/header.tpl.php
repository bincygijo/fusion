      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="180" height="59" align="right"><img src="images/logo.gif" alt="" width="146" height="26" /></td>
              <td valign="bottom"><table width="410" border="0" align="right" cellpadding="0" cellspacing="0" bgcolor="#0099FF">
                  <tr>
                    <td width="4"><img src="images/curve_left.gif" alt="" width="4" height="23" /></td>
                    <td width="180" align="center"><a href="contactClient.php" class="toplink">Contact with Current Clients</a></td>
                    <td width="4"><img src="images/curve_right.gif" alt="" width="4" height="23" /></td>
				    <td width="3" bgcolor="#FFFFFF">&nbsp;</td>
                    <td width="4"><img src="images/curve_left.gif" alt="" width="4" height="23" /></td>
                    <td width="115" align="center"><a href="addClient.php" class="toplink">Create New Client</a> </td>
                    <td width="4"><img src="images/curve_right.gif" alt="" width="4" height="23" /></td>
                    <td width="3" bgcolor="#FFFFFF">&nbsp;</td>
                    <td width="4"><img src="images/curve_left.gif" alt="" width="4" height="23" /></td>
                    <td width="50" align="center"><a href="logout.php" class="toplink">Logout</a></td>
                    <td width="4"><img src="images/curve_right.gif" alt="" width="4" height="23" /></td>
                    <td width="25" bgcolor="#FFFFFF">&nbsp;</td>
                  </tr>
              </table></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td height="39" style="padding-right:95px;"><form id="frm" name="frm" method="post" action="search.php" style="margin:0px;">
            <table width="385" border="0" align="right" cellpadding="0" cellspacing="0">
              <tr>
                <td><label>
                  <input type="text" name="name" id="name" class="textfield" />
                </label></td>
                <td width="78"><input type="image" name="Search" src="images/search.jpg" alt="" width="78" height="21"  onclick="return che();"/></td>
              </tr>
            </table>
        </form></td>
      </tr>
      <tr>
        <td height="5"></td>
      </tr>
	  <script language="javascript">
	  function che()
	  {
	  if(document.getElementById("name").value=="")
	  {
	  alert("Enter school or name or email");
	  document.getElementById("name").focus();
	  return false;
	  }
	  }
	  </script>