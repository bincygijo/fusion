<?php 
	include "../../config/config.inc.php";
  	/*
	File Name	:	database.class.php
	Purpose		:	For creating database connection and other necessary functions
	*/
//require_once("../include/config.inc.php");
class database
{
	var			$lnk;  // Link identifier for the current connection.
	var 		$mysqli; 	
	var			$ErrorInfo;
	
		 		
	function __construct()
	{
	global 			$HostName;
	global			$UserName;
	global			$Password;
	global			$DatabaseName;
	
		$this->HostName			=	$HostName;
		$this->UserName			=	$UserName;
		$this->Password			=	$Password;
		$this->DatabaseName		=	$DatabaseName;
		//$this->dbConnect();
	}
		
	#	The following method establish a connection with the database server and on success return TRUE, on failure return FALSE
	#	On failure ErrorInfo property contains the error information.
	function dbConnect()
	{
		$this->mysqli 	= 	mysql_connect($this->HostName, $this->UserName, $this->Password);
		if(!$this->mysqli)
		{ 
			$this->ErrorInfo	=	mysql_error();
			return FALSE;
		}
		else
		{
			if(!mysql_select_db($this->DatabaseName))
			{
				$this->ErrorInfo	=	mysql_error();
				return FALSE;
			} else 
			{
				return TRUE;
			}
		}
	} # Close method dbConnect
	
	/*function dbClose()
	{
		
		mysql_close($this->mysqli);
				
	}*/ # Close method dbClose
	

	# On insert, update it returns TRUE,  and on select it returns result set object
	function setQuery($Query)
	{
		$ExecStatus		=	mysql_query($Query, $this->mysqli);
		if($ExecStatus	===	FALSE) {
			$this->ErrorInfo	=	mysql_error();
			return FALSE;
		} else {
			return $ExecStatus;
		} 
	} # Close method setQuery			
		
		
	# On Success returns number of records corresponding to the query, else return 0	
	function numberOfRecords($Query)
	{
		$RowCount	=	0;
		$ResultSet	=	mysql_query($Query, $this->mysqli);
		if($ResultSet) {
			$RowCount	=	 mysql_num_rows($ResultSet);
			mysql_free_result($ResultSet);
			return $RowCount;
		} else {
			$this->ErrorInfo	=	mysql_error();
			return $RowCount;
		}
	} # Close numberOfRecords method

	
	# Returns an array of rows in the result set
	function readValues($Query)
	{
		$ResultData		=	array();
		$ResultSet		=	mysql_query($Query, $this->mysqli);
		
		if($ResultSet) {
			$RowCount		=	mysql_num_rows($ResultSet);
			for($i=0; $i<$RowCount; $i++)
				$ResultData[$i]	=	mysql_fetch_array($ResultSet); 	
			mysql_free_result($ResultSet);
			return $ResultData;
		} else {
			$this->ErrorInfo	=	mysql_error();
			return $ResultData;
		}	
	} # Close method readValues
	
	# Return a single row 
	function readValue($Query)
	{
		$ResultData		=	array();
		$ResultSet		=	mysql_query($Query, $this->mysqli);
		
		if($ResultSet) {
			$ResultData[0]	=	mysql_fetch_array($ResultSet); 	
			mysql_free_result($ResultSet);
			return $ResultData[0];
						} 
			else {
			$this->ErrorInfo	=	mysql_error();
			return $ResultData;
		}		
	} # Close method readValue
	
	function getTableValue($field,$table,$condition="")
	 {
		$query = "SELECT $field as f1 FROM $table ";
		if($condition<>"")
			$query.=" WHERE $condition";
			//echo "<BR>" . $query;
		$result	= mysql_query($query, $this->mysqli);
		if(mysql_num_rows($result))
		 {
			$row	= mysql_fetch_object($result);
			$f1		= $row->f1;
		 }
		else
		 {
			$f1	=	"";
		 }
		return stripslashes($f1);
	 }

	# Method returns the last insert Id of this connection	
	function getInsertId()
	{
		return mysql_insert_id();
	}
	
	
} # Close class definition
?>