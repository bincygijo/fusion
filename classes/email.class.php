<?php
	/* File Name	:	user.email.php
	   Purpose		:	For handling email related functions 
	  	 */
	
		
	class email
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
		
		
		function emailContentAdd($to,$from,$subject,$date,$content)
		{
		$query	=	"SELECT * from email_content WHERE  email_to='".$to."' AND email_from='".$from."' AND email_subject='".$subject."' AND email_date='".$date."' AND email_content='".$content."'";
	 $numrecords = $this->db->numberOfRecords($query);
		//exit;
		if($numrecords==0){
	  	$qry	=	"INSERT INTO email_content (email_to,email_from,email_subject,email_date,email_content)VALUES('$to','$from','$subject','$date','$content')";
		$res	=	$this->db->setQuery($qry);
		}
		if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';
		}
		
		
		function getSchoolEmail($email)
		{
		 $qry = "SELECT * FROM client_fusion WHERE email='$email'";
		$result = $this->db->readValue($qry);
			return $result;
		}
		
		
		
		function email_Addhistory($client_id,$date,$school,$subject,$content)
		{
		$date	=	date('Y-m-d');
		
		$query	=	"SELECT * from new_history WHERE  client_id='".$client_id."' AND history_detail='".$content."' AND history_summary='".$subject."' ";
 	 $numrecords = $this->db->numberOfRecords($query);
	
		if($numrecords==0)
		{
		$qry	= "INSERT INTO new_history(client_id,history_date ,history_school,history_summary,history_detail)VALUES($client_id,'$date','$school','$subject','$content')";
		$res = $this->db->setQuery($qry);
		
		}
		if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';
		}
		
	
	}
		
		
/* End : user.class.php  */

?>
