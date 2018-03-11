function GetXmlHttpObject()
{ 
	var objXMLHttp=null
		if (window.XMLHttpRequest)
		{
		objXMLHttp=new XMLHttpRequest()
		}
		else if (window.ActiveXObject)
		{
		objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")
		}
	return objXMLHttp
}

var xmlHttp;
var action;

function validateRegForm(){

	if(document.getElementById("name").value ==''){
		alert("Please enter name");
		document.getElementById("name").focus();
		return false;
	}

	if(document.getElementById("password").value ==''){
		alert("Please enter password");
		document.getElementById("password").focus();
		return false;
	}
	if(document.getElementById("email").value ==''){
		alert("Please enter email");
		document.getElementById("email").focus();
		return false;
	}
	if (echeck(document.getElementById("email").value)==false){
		document.getElementById("email").value ='';
		document.getElementById("email").focus()
		return false;
	}
	register();
	return true;
}


/**
 * DHTML email validation script. Courtesy of SmartWebby.com (http://www.smartwebby.com/dhtml/)
 */

function echeck(str) {

		var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		if (str.indexOf(at)==-1){
		   alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		   alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		    alert("Invalid E-mail ID")
		    return false
		}

		 if (str.indexOf(at,(lat+1))!=-1){
		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.indexOf(dot,(lat+2))==-1){
		    alert("Invalid E-mail ID")
		    return false
		 }
		
		 if (str.indexOf(" ")!=-1){
		    alert("Invalid E-mail ID")
		    return false
		 }

 		 return true					
	}

function loginForm(){
	document.getElementById('reglogin').innerHTML='<form name="frmlogin" id="frmlogin" method="post"><table width="100%" cellpadding="3" cellspacing="3" align="left"><tbody style="border:none;"><tr><td colspan="2" class="mandatory" id="warning" align="center"></td></tr><tr><td>Email:</td><td><input type="text" name="email" id="email" value="" /><span class="mandatory">*</span></td></tr><tr><td>Password:</td><td><input type="password" name="password" id="password" value="" /><span class="mandatory">*</span></td></tr><tr><td></td><td></td></tr><tr><td></td><td><input type="button" name="submit" id="submit" value="Login" onClick="return validateloginfrm();" /></td></tr><tr><td align"left"><a href="javascript:void(0);" onclick="passwwordReset();">Forgot Password?</a></td><td align"right"><a href="javascript:void(0);" onclick="showRegForm();">Back to Registration</a></td></tr></tbody></table></form>';
	
}

function showRegForm(){
	document.getElementById('reglogin').innerHTML='<form name="frmregister" id="frmregister" method="post"><table width="100%" cellpadding="3" cellspacing="3" align="left"><tbody style="border:none;"><tr><td colspan="2">Please register with us to see our photos</td></tr><tr><td colspan="2">&nbsp;</td></tr><tr><td colspan="2" class="mandatory" id="warning" align="center"></td></tr><tr><tr><td>Name:</td><td><input type="text" name="name" id="name" value=""><span class="mandatory">*</span></td></tr><tr><td>Password:</td><td><input type="password" name="password" id="password" value=""><span class="mandatory">*</span></td></tr><tr><td>Email:</td><td><input type="text" name="email" id="email" value=""><span class="mandatory">*</span></td></tr>	<tr><td>Address:</td><td><input type="text" name="address" id="address" value=""><span class="mandatory">*</span></td></tr><tr><td>Post Code:</td><td><input type="text" name="postcode" id="postcode" value=""></td></tr><tr><td>Telephone:</td><td><input type="text" name="telephone" id="telephone" value=""></td></tr><tr><td></td><td></td></tr><tr><td></td><td><input type="button" name="submit" id="submit" value="Register" onClick="return validateRegForm();"></td></tr><tr><td></td><td></td></tr><tr><td colspan="2"><a href="javascript:void(0);" onclick="loginForm();">Already registered? Please click here to login</a></td></tr></tbody></table></form>';
}

function passwwordReset(){
	
document.getElementById('reglogin').innerHTML='<form name="frmrReset" id="frmrReset" method="post"><table width="100%" cellpadding="3" cellspacing="3" align="left"><td colspan="2" class="mandatory" id="warning" align="center"></td></tr><tr><td>Email</td><td><input type="text" value="" name="email" id="email" /><span class="mandatory">*</span></td></tr><tr><td></td><td><input type="button" name="passreset" id="passreset" value="Send" onClick="return sendPassword();"/></td></tr><tr><td colspan="2">&nbsp;</td></tr><tr><td align"left" colspan="2"><a href="javascript:void(0);" onclick="showRegForm();">Back to Registration</a></td></tr></table></form>';
}

function sendPassword(){

	action = "resetPassword";
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	{
	alert ("Browser does not support HTTP Request")
	return
	} 
	
	var url="ajxCommon.php";
	email = document.getElementById("email").value;
	if(email==''){
		alert("Please enter your email");
	 	document.getElementById("email").focus();
	 	return false;
	}else if(echeck(document.getElementById("email").value)==false){
		document.getElementById("email").value ='';
		document.getElementById("email").focus()
		return false;
	}
	url=url+"?action="+action+"&email="+email;
	url=url+"&sid="+Math.random();
	xmlHttp.onreadystatechange=stateChanged;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	
	return true;
}

function validateloginfrm(){
	if(document.getElementById("email").value==''){
		alert("Please enter email");
		document.getElementById("email").focus();
		return false;
	}
	if (echeck(document.getElementById("email").value)==false){
		document.getElementById("email").value ='';
		document.getElementById("email").focus()
		return false;
	}
	if(document.getElementById("password").value==''){
		alert("Please enter password");
		document.getElementById("password").focus();
		return false;
	}
		checkLoginFields();

	return true;
}
function checkLoginFields(){
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	{
	alert ("Browser does not support HTTP Request")
	return
	} 
	action = "checkFields";	
	var url="ajxCommon.php";
	email = document.getElementById("email").value;
	password = document.getElementById("password").value;
	
	url=url+"?action="+action+"&email="+email+"&passwd="+password;
	url=url+"&sid="+Math.random();
	xmlHttp.onreadystatechange=stateChanged;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}
function register(){
//alert('gggggggg');
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	{
	alert ("Browser does not support HTTP Request")
	return
	} 
	action = "register";	
	var url="ajxCommon.php";
	username = document.getElementById("name").value;
	password = document.getElementById("password").value;
	email = document.getElementById("email").value;
	address = document.getElementById("address").value;
	postcode = document.getElementById("postcode").value;
	telephone = document.getElementById("telephone").value;
	
	url=url+"?action="+action+"&uname="+username+"&passwd="+password+"&email="+email+"&address="+address+"&postcode="+postcode+"&telephone="+telephone;
	url=url+"&sid="+Math.random();
	xmlHttp.onreadystatechange=stateChanged;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	
}
function loadImages(id){
	
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	{
	alert ("Browser does not support HTTP Request")
	return
	} 
	action = "loadImages";	
	var url="ajxCommon.php";
		
	url=url+"?action="+action+"&catid="+id;
	alert(url);
	url=url+"&sid="+Math.random();
	xmlHttp.onreadystatechange=stateChanged;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	
}
function stateChanged() 
{ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{ 
		var result = xmlHttp.responseText;
		if(action=="resetPassword")
		{
			if(result=='success'){
				//alert(result);
			document.getElementById("reglogin").innerHTML = 'Your password details have been emailed to you.<br><br><a href="javascript:void(0);" onclick="loginForm();">Click here to login</a>';
			document.getElementById("processing").innerHTML = '';
			}else{
				passwwordReset();
			document.getElementById("warning").innerHTML = result;
			document.getElementById("processing").innerHTML = '';
			}
			
		}else if(action=="checkFields"){
			if(result=='success'){
				window.location = "index.php?page=gallery";
				
			}else{
				loginForm();
			document.getElementById("warning").innerHTML = result;
			document.getElementById("processing").innerHTML = '';
			}
		}else if(action=="register"){
			//alert(result);
				if(result=='success'){
					window.location =  "index.php?page=gallery";
				}else{
					showRegForm();
					document.getElementById("warning").innerHTML = result;
					document.getElementById("processing").innerHTML = '';
				}
		}else if(action=="loadImages"){
				if(result!=''){
					alert(result);
					document.getElementById("slides").innerHTML = result;
				}else{
					document.getElementById("slides").innerHTML = "Processing....";
				}
		}else{
			document.getElementById("processing").innerHTML = "Processing....";
		}
	} else{
		document.getElementById("processing").innerHTML = "Processing....";
	}
} 