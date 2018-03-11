<?php
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
include_once 'classes/search.class.php';
$page_heading="Potential Clients";
$objS			=	new search();
 $search				= isset($_POST['name'])	? $_POST['name'] 	: ''; 
// echo $search;
 if(isset($_POST['Search']))
{
		/* $searchcount	=	$objS->countschool($search);
		$pcount					= $objP->getPagerData($searchcount,$plimit,$page);	
		$cpage   		= $pcount['page'];		
		$offset 		= $pcount['offset'];  	
		$limit  		= $pcount['limit']; 	
		$totpage  		= $pcount['numPages']; */
		
	$arrSearch		=	 $objS->searchSchoolName($search);
	//print_r($arrSearch);
	
}
 


//print_r($result);

/*if(isset($_POST['remove_x'])){	
	
		if(count($_POST['client_id'])>=0){
				for($i = 0; $i < count($_POST['client_id']); $i++){
				$msg		= 	$objU->getclient($_POST['client_id'][$i]);
				
				$action_id	= $_POST['action_id'];
				
				
				$id			=	$msg[0]['client_id'];
				$name		=	$msg[0]['name'];
				$school		=	$msg[0]['school'];	
				$position	=	$msg[0]['positon'];
				$street		=	$msg[0]['street'];
				$substr		=	$msg[0]['substreet'];
				$state		=	$msg[0]['state'];
				$country	=	$msg[0]['country'];
				$postal		=	$msg[0]['postal '];
				$contact	=	$msg[0]['contact'];
				$email		=	$msg[0]['email'];
				$info		=	$msg[0]['information'];
				$qry		=	"INSERT INTO client_history (client_id, name, school, position, street, substreet, state, country, postal, contact, email, information,action_id, date) VALUES ($id, '$name', '$school', '$position', '$street', '$substr', '$state', '$country', '$postal', '$contact', '$email', '$info', $action_id,'$date')";
				$result		= 	mysql_query($qry);
			}
		
			
			$checked=$_POST['client_id'];
			foreach($checked as $delval)
			{
			$msg			= 	$objE->deleteNewentry($delval,$action_id);	
			}		
		}			
	}
	*/
//print_r($result);
include("templates/contactClient.tpl.php");

?>