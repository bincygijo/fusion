<?php
	/* File Name	:	history.class.php
	   Purpose		:	For handling client related functions 
	  	 */

	require_once "database.class.php";
		
	class history
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
		
		function addHistory($client_id,$date,$staffname,$clientname,$school,$summary,$detail)
		
		{
		$qry	="INSERT INTO new_history(client_id,history_date,history_staffname,history_clientname,history_school,history_summary,history_detail)VALUES($client_id,'$date','$staffname','$clientname','$school','$summary','$detail')";
		$res		=	$this->db->setQuery($qry);
		if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';			
		}
		
		
		function addclientshhet_History($client_id,$date,$staffname,$school,$summary,$detail)
		
		{
		$qry	="INSERT INTO new_history(client_id,history_date,history_staffname,history_school,history_summary,history_detail)VALUES($client_id,'$date','$staffname','$school','$summary','$detail')";
		$res		=	$this->db->setQuery($qry);
		if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';			
		}
		
		function add_EmalHistory($client_id,$date,$staffname,$clientname,$id,$status)
		
		{
		$qry	="INSERT INTO email_history(client_id,date,subject,content,content_id,email_received)VALUES($client_id,'$date','$staffname','$clientname',$id,$status)";
		$res		=	$this->db->setQuery($qry);
		if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';			
		}
			
	function listhistory($clientid)
		{
		
			$qry	=	"SELECT * FROM new_history where client_id=$clientid ORDER BY history_date DESC";
			$res			= $this->db->readValues($qry); 
			return $res;
		}	
		
	function listEmailhistory($clientid)
		{
		
			$qry	=	"SELECT * FROM email_history where client_id=$clientid  ORDER BY date DESC";
			$res			= $this->db->readValues($qry); 
			return $res;
		}			
				
			function viewhistory($hisId)
		{
		
			$qry	=	"SELECT * FROM new_history where new_history_id=$hisId ";
			$res			= $this->db->readValue($qry); 
			return $res;
		}	
		
				
			function viewemail($hisId)
		{
		
			$qry	=	"SELECT * FROM email_history where  history_id =$hisId ";
			$res			= $this->db->readValue($qry); 
			return $res;
		}		
		
		function addContact_History($client_id,$date,$summary,$detail,$school)
		
		{
		$date	=	date('Y-m-d');
	 $qry	="INSERT INTO new_history(client_id,history_date,history_summary,history_detail,history_school)VALUES($client_id,'$date','$summary','$detail','$school')";
		$res		=	$this->db->setQuery($qry);
		if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';			
		}
		
		
		function addEmail_History($client_id,$date,$summary,$detail,$school)
		
		{
		$date	=	date('Y-m-d');
	 $qry	="INSERT INTO new_history(client_id,history_date,history_summary,history_detail,history_school)VALUES($client_id,'$date','$summary','$detail','$school')";
		$res		=	$this->db->setQuery($qry);
		if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';			
		}
		
		function deleteHistory()
		{
		$query = "DELETE FROM new_history WHERE client_id = $clientId AND entry_actionid=$action";
			$result = $this->db->setQuery($query);
			return $result;
		}
		
	}
		
/* End : history.class.php  */

?>
