<?php
	/* File Name	:	user.class.php
	   Purpose		:	For handling client related functions 
	  	 */
	require_once "database.class.php";
		
	class user
	{
		var $RowCount;
		var $ListArray;
		var $ListRow;
		var $db;
		
		// Function for creating database connection......................
		function __construct()
		{
			$this->db	= new database();
		
			if(!$this->db->dbConnect())
				"Error Connection".$this->db->ErrorInfo;
		}# Close Construct function	
		/*function __destruct()
		{
			$this->db->dbClose();
		}*/
		function add_user($arr=array())
		{
			
			$name				= trim($arr['name']);
			$position			= trim($arr['position']);
			$school				= trim($arr['school']);
			$street				= trim($arr['street']);
			$substr				= trim($arr['substreet']);
			$state				= trim($arr['state']);
			$country			= trim($arr['country']);
			$postal			    = trim($arr['postal']);
			$contact			= trim($arr['contact']);
			$email				= trim($arr['email']);
			$info 				= trim($arr['info']);
				
		 	  $qry				= "INSERT INTO client_fusion(name,positon,school,street,substreet,state 
					  				,country,postal,contact,email,information,client_date)VALUES  
					   				('$name','$position','$school','$street','$substr','$state','$country',
					   				'$postal','$contact','$email','$info',NOW())";
			$res				= $this->db->setQuery($qry);
		
			if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';
		}
		//add contact email
		
		
		
		function count_refno($ref_id)
			{
			$query				=	"SELECT * FROM client_fusion WHERE  ref_id=$ref_id";
			$records			=	$this->db->numberOfRecords($query);
			return $records;
			}	
		
		function update_user($arr=array())
		{	
			
			$name				= trim($arr['name']);
			$position			= trim($arr['position']);
			$school				= trim($arr['school']);
			$street				= trim($arr['street']);
			$substr				= trim($arr['substreet']);
			$state				= trim($arr['state']);
			$country			= trim($arr['country']);
			$postal			    = trim($arr['postal']);
			$contact			= trim($arr['contact']);
			$email				= trim($arr['email']);
			$info 				= trim($arr['info']);
			$id					=	$_POST['clid'];
			
		 	$qry				= "UPDATE client_fusion SET name='$name',positon='$position',school='$school',street='$street',substreet='$substr',state='$state' 
					  				,country='$country',postal='$postal',contact='$contact',email='$email',information='$info' WHERE client_id='$id'";
									
				$res				= $this->db->setQuery($qry);
					
			if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';					
		}
		
		
		function list_user($cid)
		{
		 $qry				= "SELECT * FROM client_fusion WHERE client_id=$cid";
		$res				= $this->db->readValue($qry);
		return $res;
		}
		
		function list_entry()
		{
		$qry				= "SELECT * FROM entry_fusion";
		$res				= $this->db->readValues($qry);
		return $res;
		}
		
		function listClient()
		{
		$qry				= "SELECT * FROM client_fusion";
		$res				= $this->db->readValues($qry);
		return $res;
		}
		
		function delete_client($arr=array())
		{
			$abc			= 0;
			if(!empty($arr))
			{
				foreach($arr as $key=>$value)
				{
					$abc	= $abc.",".$value;
				}
				
				$userid		= substr($abc,2);
				$qry		= "DELETE FROM client_fusion WHERE client_id IN ($userid) ";
				$res		= $this->db->setQuery($qry);
				return '';
			}
			else
			return '';
		}
		
		function getclient($id)
		{
		  $qry		=	"SELECT * FROM client_fusion WHERE client_id='".$id."'";
		  $res				= $this->db->readValues($qry);
		  return $res;		
		
		}
		function getEmailId($eid)
		{
		  $qry		=	"SELECT * FROM email_content WHERE content_id='".$eid."'";
		  $res				= $this->db->readValues($qry);
		  return $res;		
		
		}
		
		
		function listSchool($name,$offset=0,$limit=20)
		{
	 	$qry			=	"SELECT * FROM client_fusion WHERE school LIKE '$name%' ORDER BY school DESC LIMIT $offset,$limit";
		$res			= $this->db->readValues($qry); 
			return $res;
		}
		
		function countSchool_letter($name)
		{
		$qry			=	"SELECT * FROM client_fusion WHERE school LIKE '$name%'ORDER BY school DESC ";
		$res				= $this->db->numberOfRecords($qry);	
			return $res	;
		}
		
		
		
	
		//-------------------------------------------------------------------------
		function search_school($year)
		{
			
	  	$qry			=	"SELECT * FROM client_fusion WHERE client_date  LIKE '$year%'";
		$rows 			= 	$this->db->numberOfRecords($qry); 
				return $rows;
		}
		//-------------------------------------------------------------------------
		function search_paid_user($year)
		{
			$qry	=	"SELECT * FROM client_account WHERE date_received   LIKE '$year%' and client_deposit >=300";
			$rows 	= 	$this->db->numberOfRecords($qry); 
			return $rows;
		}
		//-------------------------------------------------------------------------
		function add_login($client_id,$status)
		{
			
			$firstName 	= $_REQUEST['firstname'];	
			$surName 	= $_REQUEST['surname'];	
			$userName 	= $_REQUEST['username'];	
			$password 	= $_REQUEST['password'];
			$notes 	    = $_REQUEST['notes'];	
			if($status == 'E')
			{
	 			$qry			=	"insert into editor_login (client_id,firstname,surname,username,password,notes,status) values                              ('$client_id','$firstName','$surName','$userName','$password','$notes','E')";
			}
			else if($status == 'C')
			{
				$qry			=	"insert into editor_login (client_id,firstname,surname,username,password,notes,status) values                              ('$client_id','$firstName','$surName','$userName','$password','$notes','C')";
			}
			else if($status == 'P')
				{
					  $userName 	= $_REQUEST['Pusername'];	
					  $password 	= $_REQUEST['Ppassword'];
					  $qry			=	mysql_query("SELECT * FROM editor_login WHERE client_id = '$client_id' AND status = 'P'");
					  $rows =   mysql_num_rows($qry);
					  if($rows == 0)
					  {
						mysql_query("insert into editor_login (client_id,username,password,status) values                              ('$client_id','$userName','$password','P')");
					  }
					 else
					  {
						$result = mysql_fetch_array($qry);
						$editor_id  = $result['editors_id'];
						mysql_query("update  editor_login set username = '$userName' ,
						                              password='$password'
													  where editors_id  = '$editor_id' ");
					  }
				}
	
		$res	=   $this->db->setQuery($qry);
				
		}
		//-------------------------------------------------------------------------
		
		function select_login_details($cid,$status)
		{
				if($status == 'E')
				{
	 				$qry			=	"SELECT * FROM editor_login WHERE client_id = '$cid' and status = 'E'";
				}
				else if($status == 'C')
				{
					$qry			=	"SELECT * FROM editor_login WHERE client_id = '$cid' AND status = 'C'";
				}
				
				
			$rows 			= 	$this->db->numberOfRecords($qry); 
			if($rows>0)
			{
				$result = $this->db->setQuery($qry);
			}
			else
			{
				$result = "";
			}
					return $result;
		}
		//--------------------------------------------------------------------------
		function select_login_details_for_contact_person($cid,$status)
		{
			$qry			=	mysql_query("SELECT * FROM editor_login WHERE client_id = '$cid' AND status = 'P'");
			return $qry;
		}
		//--------------------------------------------------------------------------
		function select_expire_details($offset=0,$limit=20)
	
		{
	 	  $qry			=	"SELECT * FROM client_fusion join client_account where 	client_fusion.client_id=client_account.client_id ORDER BY client_fusion.school DESC LIMIT $offset,$limit";
			
			$result = $this->db->setQuery($qry);
			return $result;
		}
		
		function count_expire()
		{
		
		
		$qry			=	"SELECT * FROM client_fusion join client_account where 	client_fusion.client_id=client_account.client_id ";
	
							
		$res				= $this->db->numberOfRecords($qry);	
			return $res	;
						
		}
		
		function select_expire($offset=0,$limit=20)
		{
		
		
	 	$qry			=	"SELECT * FROM client_fusion join client_account where 	client_fusion.client_id=client_account.client_id ORDER BY client_fusion.school DESC LIMIT $offset,$limit";
			
			$result = $this->db->setQuery($qry);
			return $result;
		}
		
		
		
		
		function countExpaire()
		{
	
		 $qry			=	"SELECT * FROM client_fusion join client_account where 	client_fusion.client_id=client_account.client_id ORDER BY client_fusion.school DESC";
		$res				= $this->db->numberOfRecords($qry);	
			return $res	;
		}
		
		//-------------------------------------------------------------
		function deposit_paid_school($school='')
		{
			if($school == "")
			{
		$qry			=	"SELECT * FROM client_fusion join client_account on 	      		 client_fusion.client_id=client_account.client_id and client_account.client_deposit >= '300' WHERE 1=1";
			}
			else
			{
	$qry			=	"SELECT * FROM client_fusion join client_account where 	      	client_fusion.client_id=client_account.client_id and client_account.client_deposit >= '300' and client_account.client_id='$school'";
			}
			
			
			
	
			$result = $this->db->setQuery($qry);
				//	echo $rows= mysql_num_rows($result);
			return $result;
		}
		
		
		function count_depositpaid($school='')
		
		{
		if($school == "")
			{
		$qry			=	"SELECT * FROM client_fusion join client_account on 	      		 client_fusion.client_id=client_account.client_id and client_account.client_deposit >= '300' WHERE 1=1";
			}
			else
			{
	$qry			=	"SELECT * FROM client_fusion join client_account where 	      	client_fusion.client_id=client_account.client_id and client_account.client_deposit >= '300' and client_account.client_id='$school'";
	}
		$res				= $this->db->numberOfRecords($qry);	
			return $res	;
		}
		//------------------------------
		function add_conversation()
		{
			 $Cid =		$_REQUEST['Cid'];
		     $date 	= $_REQUEST['con_date'];	
			 $note 	= $_REQUEST['notes'];	
			 $qry	="insert into phone_conversation (client_id,date,conversation) values ('$Cid','$date','$note')";
			 $result = $this->db->setQuery($qry);
			  return  $result;
		}
		//------------------------------------------------
		function view_conversation()
		{
			 $Cid =		$_REQUEST['Cid'];
		   
			 $qry	="select * from  phone_conversation where client_id = '$Cid'";
			
			 $result = $this->db->setQuery($qry);
			 return  $result;
		}
		//------------------------------------------------
		function select_due_details()
		{
			$qry			=	"SELECT *,client_order.email as mail FROM client_fusion join client_order where 	client_fusion.client_id = client_order.client_id";
			
			
			$result = $this->db->setQuery($qry);
			return $result;
		}
	  //-------------------------------------------------------------
		function readyForPrint($offset=0,$limit=20)
		{
			$qry			=	"SELECT * FROM client_fusion join product where client_fusion.client_id = product.client_id and  		product.print = 'Y' ORDER BY client_fusion.school DESC LIMIT $offset,$limit" ;
			$result = $this->db->setQuery($qry);
			return $result;
		}
		
		
		
		function countPrint()
		{
		
		$qry			=	"SELECT * FROM client_fusion join product where client_fusion.client_id = product.client_id and  		product.print = 'Y' ORDER BY client_fusion.school DESC";
		$res				= $this->db->numberOfRecords($qry);	
			return $res	;
		}
		//-------------------------------------------------------------
		function select_conversation()
		{
			$qry			=	"SELECT * FROM client_fusion join phone_conversation where client_fusion.client_id = phone_conversation.client_id ";
			
			$result = $this->db->setQuery($qry);
			return $result;
		}
		//-------------------------------------------------------------
		function select_alerts()
		{
			$qry			=	"SELECT * FROM client_fusion join phone_conversation where client_fusion.client_id = phone_conversation.client_id and  phone_conversation.date=CURDATE() ";
			
			$result = $this->db->setQuery($qry);
			return $result;
		}
		//-------------------------------------------------------------
		
		function getEmail()
		{
		$qry		=	"SELECT * FROM email_settings";
			$result = $this->db->readValue($qry);
			return $result;
		}
		
		
		function emailContentAdd($to,$from,$subject,$date,$content)
		{
	 	$qry	=	"INSERT INTO email_content (email_to,email_from,email_subject,email_date,email_content)VALUES('$to','$from','$subject','$date','$content')";
		$res	=	$this->db->setQuery($qry);
		if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';
		}
		
		function notDeposted()
		{
 	 $qry	=	"SELECT * FROM client_fusion C,client_account A,new_entry E WHERE C.client_id=A.client_id AND E.client_id=C.client_id AND (E.entry_actionid=5 OR E.entry_actionid=2) AND  A.client_deposit!=300 ";
	
		
	//$qry	=	"SELECT * FROM client_account A,client_fusion C where A.client_id=C.client_id AND A.client_deposit!=300 ";
		$result = $this->db->readValues($qry);
			return $result;
		}
		
		
		function getActionvalue($id)
		{
		 $qry	= "SELECT * FROM entry_fusion WHERE entry_id=$id";
		$result = $this->db->readValue($qry);
			return $result;
		}
		
		function listClient_id($id)
		{
		 $qry = "SELECT * FROM client_fusion WHERE client_id='$id'";
		 $result = $this->db->readValues($qry);
			return $result;
		}
		
		function getSchool($school)
		{
		 $qry = "SELECT * FROM client_fusion WHERE school='$school'";
		$rows 			= 	$this->db->numberOfRecords($qry); 
		return $rows;
		}
		//email part start
		function getEmailcontent()
		{
		$qry	= "SELECT * FROM email_content WHERE status=0  ORDER BY email_date DESC";
		$result = $this->db->readValues($qry);
			return $result;
		}
		
		function getEmailContact($email)
		{
		$qry	= "SELECT * FROM contact_us WHERE email = '".$email."'";
		$result = $this->db->readValues($qry);
			return $result;
		}
		
		function getContact($id)
		{
		$qry	= "SELECT * FROM contact_us WHERE contact_id  = '".$id."'";
		$result = $this->db->readValues($qry);
			return $result;
		}
		
		//end email
		
		function getSchoolEmail($email)
		{
		 $qry = "SELECT * FROM client_fusion WHERE email='$email'";
		$result = $this->db->readValue($qry);
			return $result;
		}
		
		function getId($email)
		{
		 $qry = "select * from email_content where email_from=".$email."";
		$result = $this->db->readValue($qry);
			return $result;
		}
		/*function deleteEmail($content_id)
		{
		$query = "DELETE FROM email_content WHERE  content_id = '".$content_id."'";
			$result = $this->db->setQuery($query);
			return $result;
		}*/
		
		function listEmail($email)
		{
		 $qry = "SELECT * FROM client_fusion WHERE email='$email'";
		$res			=	$this->db->numberOfRecords($qry);		
		return 	$res;
		}
		function getEmaillist($id)
		{
		$qry	= "SELECT * FROM email_content WHERE content_id=$id";
		$result = $this->db->readValue($qry);
			return $result;
		}
		
			function deleteEmail($contentId){
		   	$query = "DELETE FROM email_content WHERE content_id = $contentId";
			$result = $this->db->setQuery($query);
			return $result;
		}
		
		function updateEmail($contentId)
		{
		$qry	=	"UPDATE email_content SET status='1' WHERE content_id=$contentId";
			$result = $this->db->setQuery($qry);
			return $result;
		}
		
		
		function add_Photo($name,$desc)
		{
	 	$qry	= "INSERT INTO photo(photo_name,photo_desc)VALUES('".$name."','".$desc."')";
		$result	=	$this->db->setQuery($qry);
		return $result;
		}
		
		//add video
		
		function add_video($name)
		{
		$qry	= "INSERT INTO vedio(vedio_name)VALUES('".$name."')";
		$result	=	$this->db->setQuery($qry);
		return $result;
		}
		
		function viewPhoto()
		{
	$qry		=	"SELECT * FROM photo order by photo_id DESC";
			$result = $this->db->readValues($qry);
			return $result;
		}
		
		function viewPhoto1()
		{
	$qry		=	"SELECT * FROM photo order by photo_id DESC LIMIT 1";
			$result = $this->db->readValues($qry);
			return $result;
		}
		
		function listphoto($id)
		
		{
			$qry		=	"SELECT * FROM photo WHERE photo_id =$id";
			$result = $this->db->readValue($qry);
			return $result;
		}
		
		function updatePhoto($name,$desc,$id)
		
		{
		/*$query		=	"SELECT * FROM photo WHERE photo_id =$id";
		echo  $rows 			= 	$this->db->numberOfRecords($qry); 
		if($rows==0) 
		{*/
		$qry		=	"UPDATE photo SET  photo_name='$name' ,	photo_desc='$desc' WHERE photo_id=$id";
		$result	=	$this->db->setQuery($qry);
		
		return $result;
		}
		
			function deletePhoto($id){
			$query = "DELETE FROM photo WHERE photo_id = $id ";
			$result = $this->db->setQuery($query);
			return $result;
		}
		
		function add_contactus($name,$lastname,$position,$school,$numberbooks,$price,$street,$substreet,$state,$country,$postal,$contact,$email,$date,$info,$comment_sugg,$tick,$tick_con,$field)
		{
		
 	$qry	=	"INSERT INTO contact_us(name,last_name,positon,school,number_books,price_range,street,substreet,state,country,postal,contact,email,client_date,information,comments_sugg,tick,tick_other,identity_from)VALUES('$name','$lastname','$position','$school','$numberbooks','$price','$street','$substreet','$state','$country','$postal','$contact','$email','$date','$info','$comment_sugg','$tick','$tick_con','$field')";
		
		$res	=	$this->db->setQuery($qry);
		if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';
		}
		
		function addpopupCon($name,$number,$time,$school,$email,$date)
		{
		$qry	=	"INSERT INTO popupContact(name,number,calltime,school,email,date)VALUES('$name','$number','$time','$school','$email','$date')";
		$res		=	$this->db->setQuery($qry);
		if($res==1)
		return '';
		else
		return 'Some unknown error,Please try later!';
		
		}
		
		
		//popup contact inserted in to contact table
		
		function addpopContact($name,$number,$time,$school,$email,$date,$field)
		{
		$qry	=	"INSERT INTO contact_us (name,contact,calltime,	school,email,client_date,identity_from)VALUES('$name','$number','$time','$school','$email','$date','$field')";
		$res		=	$this->db->setQuery($qry);
		if($res==1)
		return '';
		else
		return 'Some unknown error,Please try later!';
		
		}
		
		
		
		function listnews()
		{
		$qry	=	"SELECT * FROM newsletter order by news_date DESC limit 2";
		$res	=	$this->db->readValues($qry);
		return $res;
		}
		
		function listallnews()
		{
		$qry	=	"SELECT * FROM newsletter order by news_date DESC ";
		$res	=	$this->db->readValues($qry);
		return $res;
		}
		
		
		function addQuote($name,$school,$books,$page,$budget,$comments,$email)
		{
	 	$qry	=	"INSERT INTO quote (name,school,nobooks,nopages,budget,comments,email)VALUES('$name','$school','$books','$page','$budget','$comments','$email')";
		$res		=	$this->db->setQuery($qry);
		if($res==1)
		return '';
		else
		return 'Some unknown error,Please try later!';
		}
		
		function getquestion()
		{
		$qry	=	"select * from questionnaire";
		$res	=	$this->db->readValues($qry);
		return $res;
		}
		
		function addquestion($quId,$ans)
		{
		//$select		=	"select * from quest_answer where question_id='".$quId."'";
		//$numrecords = $this->db->numberOfRecords($select);
		//if($numrecords > 0){
		
	//	$qry	=	"update quest_answer set answer = '".$ans."' where question_id = '".$quId."' ";
	//	$res				= $this->db->setQuery($qry);
		//}else{
		
	 	$qry	=	"INSERT INTO quest_answer(question_id,answer)VALUES('".$quId."','".$ans."')";
		$res				= $this->db->setQuery($qry);
		//}
		if($res==1)
				return '';
				else
				return 'Some unknown error,Please try later!';
		
		
		}
		
		function getanswer($quId)
		{
		$qry		=	"select * from quest_answer where question_id='".$quId."'";
		$res	=	$this->db->readValues($qry);
		return $res;
		}
		
		
		function listprinting_publishing()
		{
		$qry	=	"select * from printing_publishing order by  print_id ASC";
		$res	= $this->db->readValues($qry);
		return $res;
		}
		
		function listonline()
		{
		$qry	=	"select * from online_yearbook order by  yearbook_id ASC";
		$res	= $this->db->readValues($qry);
		return $res;
		}
		function getprinting_publishing($id)
		{
		$qry	=	"select * from printing_publishing where print_id!=$id order by  print_id ASC";
		$res	= $this->db->readValues($qry);
		return $res;
		}
		
		function getonline_publishing($id)
		{
		$qry	=	"select * from online_yearbook where yearbook_id!=$id order by  yearbook_id ASC";
		$res	= $this->db->readValues($qry);
		return $res;
		}
		
		function getprinting($id)
		{
		$qry	=	"select * from printing_publishing where print_id=$id order by  print_id ASC ";
		$res	= $this->db->readValues($qry);
		return $res;
		}
		
		function count_printing()
		{
		$qry	=	"select * from printing_publishing order by  print_id ASC ";
		$res				= $this->db->numberOfRecords($qry);	
		return $res	;
		}
		
		function listprinting($id='')
		{
			if($id!=''){
			$sqlpnd = " WHERE print_id='".$id."'";
			}else{
			$sqlpnd ='';
			}
			$qry	=	"select * from printing_publishing ".$sqlpnd." order by  print_id ASC ";
			$res	= $this->db->readValues($qry);
			return $res;
		}
		
		
		
		
		function getNavLinks($id,$page_name)
		{
			$result = '';
			$qry	=	"SELECT min(`print_id`) as minid FROM printing_publishing ";
			$res	= $this->db->readValues($qry);
		 	 $minid = $res[0]['minid'];
		
			$qry	=	"SELECT max(`print_id`) as maxid FROM printing_publishing";
			$res	= $this->db->readValues($qry);
		 	$maxid = $res[0]['maxid'];
			
			if($id!==$minid){
				$qry	=	"select * from printing_publishing where `print_id`<".$id." order by print_id desc limit 0,1 ";
				$res	= $this->db->readValues($qry);
				$previd = $res[0]['print_id'];
				$prevlink = "<a href='$page_name?id=$previd'><font face='Verdana' size='2'>PREV</font></a>";
			}
			if($id!==$maxid){
				$qry	=	"select * from printing_publishing where `print_id`>".$id." order by print_id asc limit 0,1 ";
				$res	= $this->db->readValues($qry);
				$nextid	= $res[0]['print_id'];
				$nextlink = "<a href='$page_name?id=$nextid'><font face='Verdana' size='2'>NEXT</font></a>";
			}
			
			if($prevlink!=''){
				$result .= $prevlink."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			}
			if($nextlink!=''){
				$result .= $nextlink;
			}
			return $result;
		}
		
		
		
		function listonline_publish($id='')
		{
			if($id!=''){
			$sqlpnd = " WHERE yearbook_id='".$id."'";
			}else{
			$sqlpnd ='';
			}
			$qry	=	"select * from online_yearbook ".$sqlpnd." order by  yearbook_id ASC ";
			$res	= $this->db->readValues($qry);
			return $res;
		}
		
		
		function listNavLinks($id,$page_name)
		{
			$result = '';
			$qry	=	"SELECT min(`yearbook_id`) as minid FROM online_yearbook ";
			$res	= $this->db->readValues($qry);
			$minid = $res[0]['minid'];
		
			$qry	=	"SELECT max(`yearbook_id`) as maxid FROM online_yearbook";
			$res	= $this->db->readValues($qry);
			$maxid = $res[0]['maxid'];
			
			if($id!==$minid){
				$qry	=	"select * from online_yearbook where `yearbook_id`<".$id." order by yearbook_id desc limit 0,1 ";
				$res	= $this->db->readValues($qry);
				$previd = $res[0]['yearbook_id'];
				$prevlink = "<a href='$page_name?id=$previd'><font face='Verdana' size='2'>PREV</font></a>";
			}
			if($id!==$maxid){
				$qry	=	"select * from online_yearbook where `yearbook_id`>".$id." order by yearbook_id asc limit 0,1 ";
				$res	= $this->db->readValues($qry);
				$nextid	= $res[0]['yearbook_id'];
				$nextlink = "<a href='$page_name?id=$nextid'><font face='Verdana' size='2'>NEXT</font></a>";
			}
			
			if($prevlink!=''){
				$result .= $prevlink."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			}
			if($nextlink!=''){
				$result .= $nextlink;
			}
			return $result;
		}
		
	}
		
		
/* End : user.class.php  */

?>
