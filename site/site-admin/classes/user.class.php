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
		
		
		//
		function edit_user($name,$position,$school,$street,$substr,$state,$country,$postal,$contact,$email,$info,$id)
		{
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
		 $qry				= "SELECT * FROM client_fusion WHERE client_id=$cid AND status_remove=0" ;
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
		 $qry			=	"SELECT * FROM client_fusion WHERE school LIKE '$name%' AND status_remove=0 ORDER BY  client_id DESC LIMIT $offset,$limit";
		$res			= $this->db->readValues($qry); 
			return $res;
		}
		
		function countSchool_letter($name)
		{
		$qry			=	"SELECT * FROM client_fusion WHERE school LIKE '$name%' AND status_remove=0 ORDER BY  client_id DESC ";
		$res				= $this->db->numberOfRecords($qry);	
			return $res	;
		}
		
		
		// list deadline not yet in transit
		
		function listdeadline($field='C.school',$orderby='ASC',$offset=0,$limit=20)
		{
	  	$qry			=	"SELECT * FROM client_fusion C,client_account A , product P WHERE C.client_id=A.client_id AND P.	client_id=C.client_id AND  A.client_deposit>='300' AND  C.status_remove=0 AND P.Cover_designed='Y' AND P.Cover_approved='Y' AND P.print='N' ORDER BY $field $orderby  LIMIT $offset,$limit";
		$res			= $this->db->readValues($qry); 
			return $res;
		}
		
	//	SELECT * FROM client_fusion join client_account on 	      		 client_fusion.client_id=client_account.client_id and client_account.client_deposit >= '300' WHERE 1=1";
		
		function countdeadline()
		{
		$qry			=	"SELECT * FROM client_fusion C,client_account A , product P WHERE C.client_id=A.client_id AND P.	client_id=C.client_id AND  A.client_deposit>='300' AND  C.status_remove=0 AND P.Cover_designed='Y' AND P.Cover_approved='Y' AND  P.print='N' ORDER BY C.client_date DESC ";
		$res				= $this->db->numberOfRecords($qry);	
			return $res	;
		}
		
		
	
		//-------------------------------------------------------------------------
		function search_school($year)
		{
			
	  	$qry			=	"SELECT * FROM client_fusion WHERE client_date  LIKE '$year%' AND status_remove=0";
		$rows 			= 	$this->db->numberOfRecords($qry); 
				return $rows;
		}
		//-------------------------------------------------------------------------
		function search_paid_user($year)
		{
		//echo 	$qry	=	"SELECT * FROM client_account WHERE date_received   LIKE '$year%' and client_deposit >=300 ";
			
				$qry	=	"SELECT * FROM client_account A ,client_fusion C WHERE C.client_id=A.client_id AND C.client_date   LIKE '$year%' AND A.client_deposit >=300 AND C.status_remove=0";
			$rows 	= 	$this->db->numberOfRecords($qry); 
			return $rows;
		}
		
		function print_user($year)
		{
		//echo 	$qry	=	"SELECT * FROM client_account WHERE date_received   LIKE '$year%' and client_deposit >=300 ";
			
				$qry	=	"SELECT * FROM client_account A ,client_fusion C ,product P WHERE C.client_id=A.client_id AND P.	client_id=C.client_id AND C.client_date   LIKE '$year%' AND A.client_deposit >=300 AND C.status_remove=0 AND P.print='Y' AND P.print_status='RDY'";
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
		  $qry			=	"SELECT * FROM client_fusion JOIN client_account WHERE 	client_fusion.client_id=client_account.client_id  AND client_fusion.status_remove=0 ORDER BY client_fusion.school DESC LIMIT $offset,$limit";
			
			$result = $this->db->setQuery($qry);
			return $result;
		}
		
		function count_expire()
		{
		
		
		$qry			=	"SELECT * FROM client_fusion JOIN client_account WHERE 	client_fusion.client_id=client_account.client_id  AND client_fusion.status_remove=0";
	
							
		$res				= $this->db->numberOfRecords($qry);	
			return $res	;
						
		}
		
		function select_expire($offset=0,$limit=20)
		{
		
		
		 $qry			=	"SELECT * FROM client_fusion join client_account where 	client_fusion.client_id=client_account.client_id AND client_account.client_deposit<300 AND client_fusion.status_remove=0 ORDER BY client_fusion.school DESC LIMIT $offset,$limit";
			
			$result = $this->db->setQuery($qry);
			return $result;
		}
		
		
		
		
		function countExpaire()
		{
	
		 $qry			=	"SELECT * FROM client_fusion join client_account where 	client_fusion.client_id=client_account.client_id AND client_account.client_deposit<300 AND client_fusion.status_remove=0 ORDER BY client_fusion.school DESC";
		$res				= $this->db->numberOfRecords($qry);	
			return $res	;
		}
		
		//-------------------------------------------------------------
		function deposit_paid_school($school='',$offset=0,$limit=20)
		{
			if($school == "")
			{
			
		  $qry	=	"SELECT * FROM client_account A ,client_fusion C WHERE C.client_id=A.client_id   AND A.client_deposit >=300 AND C.status_remove=0 ORDER BY C.school ASC LIMIT $offset,$limit";
		
	//	$qry			=	"SELECT * FROM client_fusion JOIN client_account ON 	      		 client_fusion.client_id=client_account.client_id AND client_fusion.status_remove=0 AND client_account.client_deposit >= '300' WHERE 1=1";
			}
			else
			{
			$qry	=	"SELECT * FROM client_account A ,client_fusion C WHERE C.client_id=A.client_id   AND A.client_deposit >=300 AND C.status_remove=0 AND A.client_id='$school' ORDER BY C.school ASC ";
	// $qry			=	"SELECT * FROM client_fusion JOIN client_account WHERE 	      	client_fusion.client_id=client_account.client_id  AND client_fusion.status_remove=0 AND client_account.client_deposit >= '300' AND client_account.client_id='$school'";
			}
			
			
			
	
			$result = $this->db->setQuery($qry);
				//	echo $rows= mysql_num_rows($result);
			return $result;
		}
		
		
		
		function count_deppaid($school='')
		
		{
		if($school == "")
			{
		$qry			=	"SELECT * FROM client_account A ,client_fusion C WHERE C.client_id=A.client_id   AND A.client_deposit >=300 AND C.status_remove=0 ";
			}
			else
			{
	$qry			=	"SELECT * FROM client_account A ,client_fusion C WHERE C.client_id=A.client_id   AND A.client_deposit >=300 AND C.status_remove=0 AND A.client_id='$school' ";
			}
			$res				= $this->db->numberOfRecords($qry);	
			return $res	;
		}
		
		//sum of deposit
		
		
		/*function getsum($school)
		{
		$qry	="SELECT count(*) AS total,SUM(amount) AS amount from payment where client_id=$clientId";
		$res				= $this->db->readValue($qry);
		return $res;
		}*/
		
		
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
		$qry			=	"SELECT * FROM client_fusion JOIN product WHERE client_fusion.client_id = product.client_id AND  		product.print = 'Y' AND client_fusion.status_remove=0  ORDER BY client_fusion.school DESC LIMIT $offset,$limit" ;
			$result = $this->db->setQuery($qry);
			return $result;
		}
		
		
		
		function countPrint()
		{
		
		$qry			=	"SELECT * FROM client_fusion JOIN product where client_fusion.client_id = product.client_id AND  		product.print = 'Y' AND client_fusion.status_remove=0 ORDER BY client_fusion.school DESC";
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
 	 $qry	=	"SELECT * FROM client_fusion C,client_account A,new_entry E WHERE C.client_id=A.client_id AND E.client_id=C.client_id AND C.status_remove=0 AND (E.entry_actionid=5 OR E.entry_actionid=2) AND C.status_remove=0 AND   A.client_deposit!=300 ";
	
		
	//$qry	=	"SELECT * FROM client_account A,client_fusion C where A.client_id=C.client_id AND A.client_deposit!=300 ";
		$result = $this->db->readValues($qry);
			return $result;
		}
		
		
		//move current client
		
		function moveClient()
		{
 	  $qry	=	"SELECT * FROM client_fusion C,client_account A,new_entry E WHERE C.client_id=A.client_id AND E.client_id=C.client_id AND (E.entry_actionid=6) AND C.status_remove=0 AND  A.client_deposit!=300 ";
	
		
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
		 $qry = "SELECT * FROM client_fusion WHERE school='$school' AND status_remove=0";
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
		
		
		
		function getQuotes($id)
		{
		$qry	= "SELECT * FROM quote WHERE quote_id  = '$id'";
		$result = $this->db->readValues($qry);
			return $result;
		}
		
		function getFaq($id)
		{
		$qry	= "SELECT * FROM quest_answer WHERE ans_id  = '$id'";
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
		
		
		function add_Photo($name,$popdesc,$desc,$school_name)
		{
	 	$qry	= "INSERT INTO photo(photo_name,photo_desc,description,school_name)VALUES('".$name."','".$popdesc."','".$desc."','".$school_name."')";
		$result	=	$this->db->setQuery($qry);
		return $result;
		}
		
		//add photos
		
		
		function viewPhoto()
		{
		$qry		=	"SELECT * FROM photo order by photo_id DESC ";
			$result = $this->db->readValues($qry);
			return $result;
		}
		
		function listphoto($id)
		
		{
			$qry		=	"SELECT * FROM photo WHERE photo_id =$id";
			$result = $this->db->readValue($qry);
			return $result;
		}
		
		function updatePhoto($name,$desc,$description,$school_name,$id)
		
		{
		/*$query		=	"SELECT * FROM photo WHERE photo_id =$id";
		echo  $rows 			= 	$this->db->numberOfRecords($qry); 
		if($rows==0) 
		{*/
	 	 $qry		=	"UPDATE photo SET  photo_name='$name' ,	photo_desc='$desc',description='$description',school_name='$school_name' WHERE photo_id=$id";
		$result	=	$this->db->setQuery($qry);
		
		return $result;
		}
		
			function deletePhoto($id){
			$query = "DELETE FROM photo WHERE photo_id = $id ";
			$result = $this->db->setQuery($query);
			return $result;
		}
		
		
		function email_Addhistory($client_id,$date,$school,$subject,$content)
		{
		$date	=	date('Y-m-d');
		
		 $query	=	"SELECT * from new_history WHERE  client_id ='".$client_id."' AND history_detail='".$content."' AND history_summary='".$subject."' ";
 	 $numrecords = $this->db->numberOfRecords($query);
	
		if($numrecords==0)
		{
		$qry	= "INSERT INTO new_history(client_id,history_date ,history_school,history_summary,history_detail)VALUES($client_id,'$date','$school','$subject','$content')";
		$res = $this->db->setQuery($qry);
		
		}
                
		/*if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';*/
		}
		
		function listContact()
		{
		 $qry		=	"SELECT * FROM contact_us order by contact_id DESC";
		$res		=	$this->db->readValues($qry);
		return $res;
		}
		
		function listregister_Contact()
		{
		 $qry		=	"SELECT * FROM register_contact order by register_id DESC";
		$res		=	$this->db->readValues($qry);
		return $res;
		}
		
		
		function listregister_quote()
		{
		 $qry		=	"SELECT * FROM register_quote order by register_quoteid DESC";
		$res		=	$this->db->readValues($qry);
		return $res;
		}
		
		function getContact_us($id)
		{
		$qry	=	"SELECT * FROM contact_us WHERE contact_id=$id";
		$res	=	$this->db->readValue($qry);
		return $res;
		}
		
		function getContact_register($id)
		{
		$qry	=	"SELECT * FROM register_contact WHERE  register_id=$id";
		$res	=	$this->db->readValue($qry);
		return $res;
		}
		
		function getContact_qu($id)
		{
		$qry	=	"SELECT * FROM register_quote WHERE  register_quoteid=$id";
		$res	=	$this->db->readValue($qry);
		return $res;
		}
		
		
		function getQuote($id)
		{
		$qry	=	"SELECT * FROM quote WHERE quote_id=$id";
		$res	=	$this->db->readValue($qry);
		return $res;
		}
		
		
		function getRgister_contact($id)
		{
		$qry	=	"SELECT * FROM register_contact WHERE register_id=$id";
		$res	=	$this->db->readValue($qry);
		return $res;
		}
		
		
		function getRgister_quote($id)
		{
		$qry	=	"SELECT * FROM register_quote WHERE register_quoteid=$id";
		$res	=	$this->db->readValue($qry);
		return $res;
		}
		
		
			function deleteContact($id){
		   	$query = "DELETE FROM contact_us WHERE contact_id = $id";
			$result = $this->db->setQuery($query);
			return $result;
		}
		
		
		function deleteReg_Contact($id){
		   	$query = "DELETE FROM register_contact WHERE register_id = $id";
			$result = $this->db->setQuery($query);
			return $result;
		}
		function deleteReg_quote($id){
		 	$query = "DELETE FROM register_quote WHERE register_quoteid = $id";
			$result = $this->db->setQuery($query);
			return $result;
		}
		
		function deleteQuote($id){
		   	$query = "DELETE FROM quote WHERE quote_id = $id";
			$result = $this->db->setQuery($query);
			return $result;
		}
		
		function deleteFaq($id){
		   	$query = "DELETE FROM quest_answer WHERE ans_id = $id";
			$result = $this->db->setQuery($query);
			return $result;
		}
		
		function getList_client($email)
		{
		$qry	=	"SELECT * FROM client_fusion WHERE email='$email'";
		$res	=	$this->db->readValues($qry);
		return $res;
		}
		
		// newsletter management//
		
		function listNews()
		{
		$qry	=	"SELECT * FROM newsletter order by news_date DESC";
		$res	=	$this->db->readValues($qry);
		return $res;
		}
		function getNews($id)
		{
		$qry	=	"SELECT * FROM newsletter WHERE news_id=$id";
		$res	=	$this->db->readValue($qry);
		return $res;
		}
		
		function addNews($des,$title,$date,$new_date)
		{
 	 	 $qry		=	"INSERT INTO newsletter(news_name,news_title,date,news_date)VALUES('$des','$title','$date','$new_date')";
		$res		=	$this->db->setQuery($qry);
		
		if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';
		}
		
		function deletenews($id)
		{
		$qry	= "DELETE FROM newsletter WHERE news_id=$id";
		$res	=	$this->db->setQuery($qry);
		return $res;
		}
		
		function updateNews($news,$title,$date,$news_date,$id)
		{
		$qry	=	"UPDATE newsletter SET news_name='$news',news_title='$title',date='$date',news_date='$news_date' WHERE news_id=$id";
		$res	=	$this->db->setQuery($qry);
		return $res;
		
		}
		
		
		function getalldate()
		{
		$date		=	date('Y-m-d');
		 $qry 	=	"SELECT * FROM client_fusion where delete_date>=$date";
		$res	=	$this->db->readValues($qry);
		return $res;
		}
		
		
		function addevents($title,$start,$end,$month,$day,$year,$des)
		{
 	 	// $qry		=	"INSERT INTO newsletter(news_name,news_title,date,news_date)VALUES('$des','$title','$date','$new_date')";
		$qry		=	"insert into event(title,start_time,end_time,month,day,year,description)values('$title','$start','$end','$month','$day','$year','$des')";
		$res		=	$this->db->setQuery($qry);
		
		if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';
		}
		
		function listevents()
		{
		$qry		=	"select * from event";
		$res	=	$this->db->readValues($qry);
		return $res;
		}
		
		
		function getorderdate($client_id)
		{
		$qry	=	"select * from client_order where client_id=$client_id ";
		$res	=	$this->db->readValue($qry);
		return $res;
		}
		
		function getcontact($client_id)
		{
		$qry	=	"select * from contact_us where  contact_id=$client_id ";
		$res	=	$this->db->readValue($qry);
		return $res;
		}
		
		
		//
		function getCover($client_id)
		{
		$qry	=	"select * from product where client_id=$client_id ";
		$res	=	$this->db->readValue($qry);
		return $res;
		}
		
		
		function getcannontxt()
		{
		$qry				= "SELECT *FROM `canned_text";
		$res				= $this->db->readValues($qry);
		return $res;
		}
		
		
		function addBin($uId,$name,$position,$school,$street,$substr,$state,$country,$postal,$contact,$email,$info,$date,$status,$del_date)
		{
	
	
	
		  $qry				= "INSERT INTO bin (client_id,name,positon,school,street,substreet,state				,country,postal,contact,email,information,client_date,status_remove,delete_date)VALUES  
					   				($uId,'$name','$position','$school','$street','$substr','$state','$country',
					   				'$postal','$contact','$email','$info','$date','$status','$del_date')";
				   			
			$res				= $this->db->setQuery($qry);
		
			if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';
		
		}
		
	/*	function addCannedTxt($title,$c_text)
		{
		$qry	=	 mysql_query("INSERT INTO `canned_text (`title` ,`c_text`)VALUES ('$title', '$c_text');");
		$res				= $this->db->setQuery($qry);
		
			if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';
		}*/
		
		
		function listquotes()
		{
		$qry	=	"select * from quote order by quote_id DESC";
		$res				= $this->db->readValues($qry);
		return $res;
		}
		
		function getallSendbooks($year)
		{
		$qry			=	"SELECT * FROM product P,client_fusion C WHERE  C.client_id=P.client_id AND C.status_remove=0 AND product_dispatched  LIKE '$year%' ";
	//	$qry	=	"select * from product";
		$res	=	$this->db->readValues($qry);
		return $res;
				
		}
		
		function listFaq()
		{
		$qry	=	"select * from quest_answer ORDER BY ans_id DESC";
		$res				= $this->db->readValues($qry);
		return $res;
		}
		
		function addregister_contact($con_id,$name,$last_name,$position,$school,$nobooks,$price,$street,$substreet,$state,$country,$postal,$contact,$email,$cdate,$info,$comment,$tick,$tick_other,$calltime,$form,$desc,$rdate)
		{
 	 	// $qry		=	"INSERT INTO newsletter(news_name,news_title,date,news_date)VALUES('$des','$title','$date','$new_date')";
		 $qry		=	"insert into register_contact(contact_id,name,last_name,positon,school,number_books,price_range,street,substreet,state,country,postal,contact,email,client_date,information,comments_sugg,tick,tick_other,calltime,identity_from,description,remove_date)values('".$con_id."','".$name."','".$last_name."','".$position."','".$school."','".$nobooks."','".$price."','".$street."','".$substreet."','".$state."','".$country."','".$postal."','".$contact."','".$email."','".$cdate."','".$info."','".$comment."','".$tick."','".$tick_other."','".$calltime."','".$form."','".$desc."','".$rdate."')";
		$res		=	$this->db->setQuery($qry);
		
		if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';
		}
		
		
		
		
		function addregister_quote($con_id,$name,$school,$email,$nobooks,$nopage,$budget,$comments,$description,$date)
		{
 	 	// $qry		=	"INSERT INTO newsletter(news_name,news_title,date,news_date)VALUES('$des','$title','$date','$new_date')";
		  $qry		=	"insert into register_quote(quote_id,name,school,email,nobooks,nopages,budget,comments,description,rdate)values('".$con_id."','".$name."','".$school."','".$email."','".$nobooks."','".$nopage."','".$budget."','".$comments."','".$description."','".$date."')";
		$res		=	$this->db->setQuery($qry);
		
		if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';
		}
		
		
		
		function listallCalender($ev_date)
		{
		$qry	=	"SELECT * FROM `calender` WHERE `delivery_date` = '$ev_date' OR `deadline_date` = '$ev_date'
		 OR `entry_date` ='$ev_date' ";
		 $res				= $this->db->readValues($qry);
		return $res;
		
		}
	}
		
		
/* End : user.class.php  */

?>
