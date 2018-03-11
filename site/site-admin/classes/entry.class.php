<?php
	/* File Name	:	user.class.php
	   Purpose		:	For handling client related functions 
	  	 */

	require_once "database.class.php";
		
	class entry
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
				
				//count the need action today
			function count_actiontoday($client_id)
			{
			$query				=	"SELECT * FROM new_entry WHERE client_id='".$client_id."' AND entry_actionid=1";
			$records			=	$this->db->numberOfRecords($query);
			return $records;
			}	
			
			function count_samplebooksent($client_id)
			{
			$query				=	"SELECT * FROM new_entry WHERE client_id='".$client_id."' AND entry_actionid=2";
			$records			=	$this->db->numberOfRecords($query);
			return $records;
			}	
			function count_contactedsoon($client_id)
			{
			$query				=	"SELECT * FROM new_entry WHERE client_id='".$client_id."' AND entry_actionid=3";
			$records			=	$this->db->numberOfRecords($query);
			return $records;
			}	
				//function for adiing new entry
		function add_entry($ref_id,$contact_name,$school_name,$no_books,$editor_de,$delivery_add,$delivery_date,$contact_num,$txt_date,$staff_name,$summary,$details,$action,$action_name,$client,$school,$email,$contactype,$other,$client_id)
		{	
			/*$query				=	"SELECT * FROM new_entry WHERE client_id='".$client_id."' AND entry_actionid=$action ";
			$records			=	$this->db->numberOfRecords($query);		
			if($records==0)*/
	 	 $qry				= "INSERT INTO new_entry(ref_id,contact_name,school_name,no_books,editors_dedline,delivery_add,delivery_date,contact_number,date,staff_name,entry_summary,entry_details,entry_actionid,entry_desc,client,school,email,contact_type,contact_other,client_id)VALUES ('$ref_id','$contact_name','$school_name','$no_books','$editor_de','$delivery_add','$delivery_date','$contact_num','$txt_date','$staff_name','$summary','$details','$action','$action_name','$client','$school','$email','$contactype','$other',$client_id)";
			$res				= $this->db->setQuery($qry);
		
			if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';
		}
		
		
		
			//delete customer					
		function deleteNewentry($clientId,$action){
			$query = "DELETE FROM new_entry WHERE client_id = $clientId AND entry_actionid=$action";
			$result = $this->db->setQuery($query);
			return $result;
		}
		
		/*function delete_entry($)
		{
			$abc			= 0;
			if(!empty($arr))
			{
				foreach($arr as $key=>$value)
				{
					$abc	= $abc.",".$value;
				}
				$clentid		= substr($abc,2);
				
			echo 	 $qry		= "DELETE FROM new_entry WHERE client_id IN ($clentid) AND entry_actionid =$action ";
				$res		= $this->db->setQuery($qry);
				return '';
			}
			else
			return '';
		}*/
			
		
		function list_entry()
		{
		$qry				= "SELECT * FROM entry_fusion";
		$res				= $this->db->readValues($qry);
		return $res;
		}
		
		
		function listNewentry($cid)
		{
		$qry				= "SELECT * FROM new_entry WHERE client_id=$cid";
		$res				= $this->db->readValue($qry);
		return $res;
		}
		function listEntry()
		{
		//$date = date('Y-m-d');
		
	 //	$qry				= "SELECT * FROM new_entry AS E,client_fusion AS C WHERE C.client_id=E.client_id AND E.entry_actionid=1 AND E.date='".$date."' ";
	
	  	$qry				= "SELECT * FROM new_entry AS E,client_fusion AS C WHERE C.client_id=E.client_id AND  C.status_remove=0  AND E.entry_actionid=1 ";
		$res				= $this->db->readValues($qry);
		return $res;
		}
		//sample book send listing in work space
		function entryDetails()
		{
		 $qry				= "SELECT * FROM new_entry AS E,client_fusion AS C WHERE C.client_id=E.client_id AND  C.status_remove=0 AND E.entry_actionid=2";
		$res				= $this->db->readValues($qry);
		return $res;
		}
		
		// software required lising in workspace
		function entrySoftware()
		{
		$qry				= "SELECT * FROM new_entry AS E,client_fusion AS C WHERE C.client_id=E.client_id AND  C.status_remove=0 AND E.entry_actionid=7";
		$res				= $this->db->readValues($qry);
		return $res;
		}
		//design required lising in work space
		function entryDesign()
		{
		 $qry				= "SELECT * FROM new_entry AS E,client_fusion AS C WHERE C.client_id=E.client_id AND C.status_remove=0 AND E.entry_actionid=8";
		$res				= $this->db->readValues($qry);
		return $res;
		}
		
		function getactionsent($clientId,$action)
		{
		$query = "SELECT *  FROM new_entry WHERE client_id = $clientId AND entry_actionid=$action";
		$res				= $this->db->readValue($query);
		return $res;
		}
		
		function entryContactedsoon()
		{
		 $qry				= "SELECT * FROM new_entry AS E,client_fusion AS C WHERE C.client_id=E.client_id AND C.status_remove=0 AND E.entry_actionid=3";
		$res				= $this->db->readValues($qry);
		return $res;
		}
		
		
		function getActon_values($Id)
		{
	 	$query = "SELECT *  FROM entry_fusion WHERE entry_id = $Id ";
		$res				= $this->db->readValue($query);
		return $res;
		}
		
	}
	
	
	
		
/* End : user.class.php  */

?>
