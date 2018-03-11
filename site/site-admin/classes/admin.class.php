<?php
	/* File Name	:	admin.class.php
	   Purpose		:	For handling admin related functions 
	  	 */

	require_once "database.class.php";
	
		class admin
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
		
		
		// To check the admin login..................
		function admin_login($arr=array())
		{
			$uname			= trim($arr['adminusername']); 
			$pwd			= trim($arr['adminpwd']); 		
			
			
			$qry			= "SELECT * FROM admin WHERE username='$uname' AND password='$pwd' ";
			$count			= $this->db->numberOfRecords($qry);
			if ($count==1)
			{
				$res		= $this->db->readValue($qry); 
				if(!empty($res))
				{
					$_SESSION['admin_id']		=	$res['adminid'];			
					$_SESSION['username']		=	$res['username'];
					return  "" ;
				} 
				else
				return "Error : Invalid username or password!";
			}
			else
			return "Error : Invalid username or password!";
		}
		
		// Logout function for admin/user..............
		function logout()
		{
			if (isset($_SESSION['admin_id'])) 
			{
				$_SESSION['admin_id']	= "";
				unset($_SESSION['admin_id']);
			}
			if (isset($_SESSION['username'])) 
			{
				$_SESSION['username']	= "";
				unset($_SESSION['username']);
			}
		}
	
	
		}
/* End : admin.class.php  */

?>
