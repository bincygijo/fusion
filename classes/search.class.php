<?php
	/*
	File Name	:	search.class.php
	Purpose		:	For handling searching related functions 
		*/
	
	require_once "database.class.php";
	class search
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
		
	//searching school name
		function search_school($schoolname)
		{
		$qry				= "SELECT * FROM client_fusion WHERE ";
		//	$qry				= "SELECT * FROM client_fusion C WHERE C.school='$schoolname' OR C.name='$schoolname' OR C.email='$schoolname' ";
			
			if($schoolname!='')
			$qry				.= "  (school='$schoolname')  ";
			
			if($schoolname!='')
			$qry				.= "OR (name ='$schoolname') ";
			
			if($schoolname!='')
			$qry				.= "OR (email ='$schoolname') ";
			
			if($schoolname!='')
			$qry				.= "OR  client_id IN(SELECT DISTINCT client_id FROM new_history
									WHERE history_school ='$schoolname') ";
			if($schoolname!='')
			$qry				.= "OR  client_id IN(SELECT DISTINCT client_id FROM new_history
									WHERE history_clientname ='$schoolname') ";
			if($schoolname!='')
			$qry				.= "OR  client_id IN(SELECT DISTINCT client_id FROM new_history
									WHERE 	history_summary ='$schoolname') ";
			if($schoolname!='')
			$qry				.= "OR  client_id IN(SELECT DISTINCT client_id FROM new_history
									WHERE 	history_staffname ='$schoolname') ";		
			if($schoolname!='')
			$qry				.= "OR  client_id IN(SELECT DISTINCT client_id FROM new_history
									WHERE 	history_detail ='$schoolname') ";												
		
			
//echo $qry;
			//$qry				.= "ORDER BY school DESC LIMIT $offset,$limit";	
	//echo $qry;
			$res				= $this->db->readValues($qry); 
			return $res;
		}
		
		
		function countschool($schoolname='')
		{
			$qry				= "SELECT * FROM client_fusion  WHERE 1=1 ";
			if($schoolname!='')
			$qry				.= "AND (school LIKE '%{$schoolname}%') ";
			if($schoolname!='')
			$qry				.= "OR (name LIKE '%{$schoolname}%') ";
			
			if($schoolname!='')
			$qry				.= "OR (email LIKE '%{$schoolname}%') ";
	
			//$qry				.= "ORDER BY school DESC ";	
			$res				= $this->db->numberOfRecords($qry);	
			return $res	;
		}
		
		
		function searchSchoolName($schoolname)
		{
			$qry				= "SELECT * FROM client_fusion  WHERE school='$schoolname'";
			
			/*if($schoolname)
			$qry				.= "AND (school LIKE '%{$schoolname}%') ";*/
			//echo $qry;
			
			$res				= $this->db->readValues($qry); 
			return $res;
		}
		
		
	}
		
/* End : admin.class.php  */

?>
