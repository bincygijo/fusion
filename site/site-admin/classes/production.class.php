<?php
	/* File Name	:	production.class.php
	   Purpose		:	For handling client related functions 
	  	 */

	require_once "database.class.php";
		
	class production
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
		
		function add_paperInside($name)
		{
		
		 $select		=	"select * from paper_inside where name='".$name."'";

		$numrecords = $this->db->numberOfRecords($select);
		if($numrecords==0){
		$qry		=	"INSERT INTO paper_inside(name)VALUES('$name')";
		$res				= $this->db->setQuery($qry);
		}
		if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';
		
			
		}
		
		function getPaper_Inside($name)
		{
		
		$qry	=	"SELECT * FROM paper_inside WHERE name='".$name."'";
		$num	= $this->db->numberOfRecords($qry);
		return $num;
		}	
		
		function add_paperCover($name)
		{
		 $select		=	"select * from paper_cover where name='".$name."'";

		$numrecords = $this->db->numberOfRecords($select);
		if($numrecords==0){
		$qry		=	"INSERT INTO paper_cover(name)VALUES('$name')";
		$res				= $this->db->setQuery($qry);
		}
		if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';
			
				}	
				
		function getPaper_Cover($name)
		{
		
		$qry	=	"SELECT * FROM paper_cover WHERE name='".$name."'";
		$num	= $this->db->numberOfRecords($qry);
		return $num;
		}			
				
		function add_paperLaminate($name)
		{
		 $select		=	"select * from paper_laminate where name='".$name."'";

		$numrecords = $this->db->numberOfRecords($select);
		if($numrecords==0){
		$qry		=	"INSERT INTO paper_laminate(name)VALUES('$name')";
		$res				= $this->db->setQuery($qry);
		}
		if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';
		
		
		}		
		
			function getPaper_Laminate($name)
		{
		
		$qry	=	"SELECT * FROM paper_laminate WHERE name='".$name."'";
		$num	= $this->db->numberOfRecords($qry);
		return $num;
		}	
				
			function add_paperBinding($name)
		{
		 $select		=	"select * from paper_binding where name='".$name."'";
		$numrecords = $this->db->numberOfRecords($select);
		if($numrecords==0){
		$qry		=	"INSERT INTO paper_binding(name)VALUES('$name')";
		$res				= $this->db->setQuery($qry);
		}
		if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';
		
		
		}		
		
		function getPaper_Binding($name)
		{
		
		$qry	=	"SELECT * FROM paper_binding WHERE name='".$name."'";
		$num	= $this->db->numberOfRecords($qry);
		return $num;
		}	
		
					
		function add_paperBooks($name)
		{
		 $select		=	"select * from paper_books where name='".$name."'";
		$numrecords = $this->db->numberOfRecords($select);
		if($numrecords==0){
		$qry		=	"INSERT INTO paper_books(name)VALUES('$name')";
		$res				= $this->db->setQuery($qry);
		}
		if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';
				
		}	
		
		function getPaper_Books($name)
		{
		
		$qry	=	"SELECT * FROM paper_books WHERE name='".$name."'";
		$num	= $this->db->numberOfRecords($qry);
		return $num;
		}	
		function add_Freight($name)
		{
		 $select		=	"select * from freight where name='".$name."'";
		$numrecords = $this->db->numberOfRecords($select);
		if($numrecords==0){
		$qry		=	"INSERT INTO freight(name)VALUES('$name')";
		$res				= $this->db->setQuery($qry);
		}
		if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';
		
		
		}	
		
		//add books
		
		function add_Books($name)
		{
		 $select		=	"select * from book_type where booktype='".$name."'";
		$numrecords = $this->db->numberOfRecords($select);
		if($numrecords==0){
	 	$qry		=	"INSERT INTO book_type(booktype)VALUES('$name')";
		$res				= $this->db->setQuery($qry);
		}
		if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';
		
		
		}	
		
		function getPaper_Freight($name)
		{
		
		$qry	=	"SELECT * FROM freight WHERE name='".$name."'";
		$num	= $this->db->numberOfRecords($qry);
		return $num;
		}	
		
		function getBook_type($name)
		{
		
		$qry	=	"SELECT * FROM book_type WHERE booktype='".$name."'";
		$num	= $this->db->numberOfRecords($qry);
		return $num;
		}	
		
		function add_Trans($name)
		{
		$qry		=	"INSERT INTO transaction_type(name)VALUES('$name')";
		$res				= $this->db->setQuery($qry);
		if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';
		
		
		}	
			
				
		
		function getInside_paper()
		{
		$qry		=	"SELECT * FROM paper_inside order by paper_id DESC";
		$res		=	$this->db->readValues($qry);
		return $res;
		}
		function getCover_paper()
		{
		$qry		=	"SELECT * FROM paper_cover";
		$res		=	$this->db->readValues($qry);
		return $res;
		}
	
		function getLamp_paper()
		{
		$qry		=	"SELECT * FROM paper_laminate";
		$res		=	$this->db->readValues($qry);
		return $res;
		}
		function getbind_paper()
		{
		$qry		=	"SELECT * FROM paper_binding";
		$res		=	$this->db->readValues($qry);
		return $res;
		}
		
		function getbook_paper()
		{
		$qry		=	"SELECT * FROM paper_books";
		$res		=	$this->db->readValues($qry);
		return $res;
		}
		function getFreight()
		{
		$qry		=	"SELECT * FROM freight";
		$res		=	$this->db->readValues($qry);
		return $res;
		}
		
		function getBooktype()
		{
		$qry		=	"SELECT * FROM book_type";
		$res		=	$this->db->readValues($qry);
		return $res;
		}
	

	
		function updateClientAccountInfo($account_expiry,$txt_books,$txt_pages,$deposit,$rate_type,$baserate,$perpage,$extracostper,$costallbook,$total,$clientId)
		{
		 $select		=	"select * from client_account where client_id='".$clientId."'";

		$numrecords = $this->db->numberOfRecords($select);
		if($numrecords > 0){
		// do the upadte 
	  $qry		=	"UPDATE client_account SET client_expires = '".$account_expiry."',client_book_require = '".$txt_books."' ,client_page_require = '".$txt_pages."',rate_type_id='".$rate_type."',client_basic_rate='".$baserate."',client_per_page_rate='".$perpage."',client_extra_per__book='".$extracostper."',client_extra_all_book='".$costallbook."',total='".$total."' WHERE client_id = '".$clientId."' ";
			
			
			$res				= $this->db->setQuery($qry);
		}else{
		//insertion
			$qry		=	"INSERT INTO client_account (client_id,client_expires,client_book_require,client_page_require,client_deposit,rate_type_id,client_basic_rate,client_per_page_rate,client_extra_per__book,client_extra_all_book,total)VALUES('".$clientId."', '".$account_expiry."', '".$txt_books."', '".$txt_pages."','".$deposit."','".$rate_type."','".$baserate."','".$perpage."','".$extracostper."','".$costallbook."','".$total."')";
			$res				= $this->db->setQuery($qry);
			}
			if($res==1)
				return '';
				else
				return 'Some unknown error,Please try later!';
		
		}	
		
		function updateClientPrdInfo($no_books,$no_pages,$inside_paper,$coverpaper,$laminating_paper,$binding_paper,$books_deliver,$connote_number,$paper_freight,$dispateched_date,$clientId,$print_status,$editors,$cover,$approved,$booktypeid,$booksent)
		{
			
			if($print_status == 'Y') 
			{
				$print = "Y";
				$status = "RDY";
			}
			if($print_status == '') 
			{
				$print = "N";
				$status = "NRDY";
			}
			$select		=	"select * from product where client_id='".$clientId."'";
			$numrecords = $this->db->numberOfRecords($select);
			if($numrecords > 0){
			// do the upadte 
			 	$qry		=	"update product set paper_id = '".$inside_paper."',cover_id = '".$coverpaper."' ,lamp_id = '".$laminating_paper."', bind_id = '".$binding_paper."',book_id = '".$books_deliver."' ,product_con_no = '".$connote_number."', freight_id = '".$paper_freight."',product_dispatched = '".$dispateched_date."',no_books = '".$no_books."',no_pages = '".$no_pages."',print = '".$print."',print_status = '".$status."',Cover_designed='".$cover."',Cover_approved='".$approved."',booktype_id='".$booktypeid."',books_sent='".$booksent."'  where client_id = '".$clientId."' ";
				$res				= $this->db->setQuery($qry);
			}else{
			//insertion
				$qry		=	"INSERT INTO product (client_id, paper_id, cover_id, lamp_id, bind_id, book_id, product_con_no, freight_id, product_dispatched, no_books, no_pages,print,print_status )VALUES('".$clientId."', '".$inside_paper."', '".$coverpaper."', '".$laminating_paper."', '".$binding_paper."','".$books_deliver."', '".$connote_number."', '".$paper_freight."','".$print."' ,'".$status."','".$dispateched_date."', '".$no_books."', '".$no_pages."')";
				$res				= $this->db->setQuery($qry);
		
			}
			if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';
		
		}
		function updateClientOrderInfo($ref_no,$contactNname,$schoolName,$email,$noBooks,$editorsDeadline,$deliveryAddr,$deliveryDate,$contactNumber,$clientId)
		{
			$select		=	"select * from client_order where client_id='".$clientId."'";
			$numrecords = $this->db->numberOfRecords($select);
			if($numrecords > 0){
			// do the upadte 
		$qry		=	"update client_order set Ref_no='".$ref_no."',client_order_cpname = '".$contactNname."',client_order_school = '".$schoolName."' , email='".$email."',client_order_books = '".$noBooks."', client_order_deadline = '".$editorsDeadline."', client_order_del_addr = '".$deliveryAddr."', client_order_contact = '".$contactNumber."', client_order_del_date = '".$deliveryDate."' where client_id = '".$clientId."' ";
				$res				= $this->db->setQuery($qry);
			}else{
			//insertion
				$qry		=	"INSERT INTO client_order (client_id,Ref_no, client_order_cpname, client_order_school, email, client_order_books, client_order_deadline,client_order_del_addr, client_order_del_date, client_order_contact)VALUES('".$clientId."','".$ref_no."', '".$contactNname."', '".$schoolName."', '".$email."', '".$noBooks."', '".$editorsDeadline."', '".$deliveryAddr."', '".$deliveryDate."', '".$contactNumber."')";
				$res				= $this->db->setQuery($qry);
			}
				if($res==1)
				return '';
				else
				return 'Some unknown error,Please try later!';
		}
		
		
		function updateUserInfo($contactNname,$schoolName,$contactNumber,$email,$clientId)
		{
			$select		=	"select * from client_fusion where client_id='".$clientId."'";
			$numrecords = $this->db->numberOfRecords($select);
			if($numrecords > 0){
			// do the upadte 
			 	$qry		=	"update client_fusion set name = '".$contactNname."',school = '".$schoolName."' , contact = '".$contactNumber."',email='".$email."' where client_id = '".$clientId."' ";
				$res				= $this->db->setQuery($qry);
			}else{
			//insertion
				$qry		=	"INSERT INTO client_fusion (client_id, name, school, contact,email)VALUES('".$clientId."', '".$contactNname."', '".$schoolName."',  '".$contactNumber."','".$email."')";
				$res				= $this->db->setQuery($qry);
			}
				if($res==1)
				return '';
				else
				return 'Some unknown error,Please try later!';
		}
		
		
		
		function addCalender($clientId,$deli_date,$dead_date,$school)
		{
		$select		=	"select * from calender where client_id='".$clientId."'";
		$numrecords = $this->db->numberOfRecords($select);
		if($numrecords > 0){
		
		$qry	=	"update calender set delivery_date = '".$deli_date."',deadline_date = '".$dead_date."' , school = '".$school."' where client_id = '".$clientId."' ";
		$res				= $this->db->setQuery($qry);
		}else{
		
		$qry	=	"INSERT INTO calender(client_id,delivery_date,deadline_date,school)VALUES('".$clientId."','".$deli_date."','".$dead_date."','".$school."')";
		$res				= $this->db->setQuery($qry);
		}
		if($res==1)
				return '';
				else
				return 'Some unknown error,Please try later!';
		
		}
		
		
		//add history in to client sheet
		function addhistory($clientid,$refno,$entrysuuary,$entryde,$entryacid,$entrydes,$date)
		{
	 	$qry	=	"insert into new_entry(client_id,ref_id,entry_summary,entry_details,entry_actionid,entry_desc,date) values($clientid,$refno,'$entrysuuary','$entryde',$entryacid,'$entrydes','$date')";
		$res				= $this->db->setQuery($qry);
		if($res==1)
				return '';
				else
				return 'Some unknown error,Please try later!';
		}
		
		function listOrderDetails($clientId)
		{
	 	$qry			=	"SELECT * FROM client_order WHERE client_id ='".$clientId."'";
		$res				= $this->db->readValue($qry);
		return $res;
		}

		function listProduct($clientId)
		{
		$qry			=	"SELECT * FROM product WHERE client_id  ='".$clientId."'";
		
		$res				= $this->db->readValue($qry);
		return $res;
		}

		function listAccount($clientId)
		{
		$qry			=	"SELECT * FROM client_account WHERE client_id  ='".$clientId."'";
		$res				= $this->db->readValue($qry);
		return $res;
		}
		
		function listRate()
		{
		$qry		=	"SELECT * FROM  client_offer";
		$res				= $this->db->readValues($qry);
		return $res;
		}
		
		function listTrans_type()
		{
		$qry		=	"SELECT * FROM  transaction_type";
		$res				= $this->db->readValues($qry);
		return $res;
		}
	
		function getTrans_type($transid)
		{
		$qry		=	"SELECT * FROM  transaction_type WHERE trans_id=$transid";
		$res				= $this->db->readValue($qry);
		return $res;
		}
	
	
		function modifyAccounts($date_rece,$trans_id,$note,$amount_rece,$clientId,$accountid)
		{
		$qry		=	"UPDATE client_account SET date_received ='$date_rece',transation_id='$trans_id',notes='$note',client_deposit=$amount_rece,client_id =$clientId WHERE client_account_id=$accountid";
			$res				= $this->db->setQuery($qry);
					
			if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';		
		}
		
		//add  payments added in to history
		
		/*function addHistory()
		{
		$qry		=	"INSERT INTO new_history (client_id,history_date,history_school,)";
		}
	*/
	
		function addOffer_rate($type,$baserate,$perpage)
	
		{
		$select		=	"select * from client_offer where rate_type='".$type."'";
		$numrecords = $this->db->numberOfRecords($select);
		if($numrecords==0){
		$qry		=	"INSERT INTO client_offer(rate_type,base_rate,per_page)VALUES('$type',$baserate,$perpage)";
		$res				= $this->db->setQuery($qry);
		}
		if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';
		}
	
		function getrate_type($rateid)
		{
		$qry		=	"SELECT * FROM  client_offer WHERE offer_id=$rateid";
		$res				= $this->db->readValue($qry);
		return $res;
		}
		
		
		
		 function updateContact($updatefield,$value,$id) {
			$qry = $this->db->query("UPDATE new_entry SET $updatefield='$value' WHERE  	new_entryid=$id ");
		//	$res				= $this->db->setQuery($qry);
			
		}
		
		function getEntrydetails($clientid,$actionid)
		{
		//$qry		=	"SELECT * FROM  new_entry WHERE client_id=$clientid AND entry_actionid=$actionid";
		$qry	=	"SELECT * FROM new_entry AS E,client_fusion AS C WHERE C.client_id=E.client_id AND E.entry_actionid=$actionid AND C.client_id=$clientid";
		$res				= $this->db->readValue($qry);
		return $res;
		}
		
		
		function addPayment($client_id,$account_id,$date,$type,$amount_received)
	
		{
	 	$qry		=	"INSERT INTO payment(client_id,account_id,date_received,type,amount)VALUES($client_id,$account_id,'$date','$type',$amount_received)";
		$res				= $this->db->setQuery($qry);
		if($res==1)
			return '';
			else
			return 'Some unknown error,Please try later!';
		}
	
		function updateaccount($client_id,$account_id)
		{
 	$qry		=	"UPDATE client_account SET client_id=$client_id,client_final_payment='paid' WHERE client_account_id =$account_id";
	$res				= $this->db->setQuery($qry);
	return $res;
		}
		
		function getPayment($clientId)
		{
		$qry	="SELECT count(*) AS total,SUM(amount) AS amount from payment where client_id=$clientId";
		$res				= $this->db->readValue($qry);
		return $res;
		}
	
	
		function listpayment($clientId)
		{
		$qry		=	"SELECT * FROM  payment WHERE client_id=$clientId";
		$res				= $this->db->readValues($qry);
		return $res;
		}
		function updateClientPrintStatus($clientId)
		{
		$qry		=	mysql_query("update product set print = 'Y' where client_id = '$clientId'");
		}
		
		
		
		function createPDF_list($client_Id)
		{
		$qry 	= 	"SELECT * FROM client_account A, client_fusion C ,client_order O WHERE A.client_id=C.client_id AND O.client_id=C.client_id AND A.client_id='$client_Id'";
		$res	= $this->db->readValue($qry);
		return $res;
		}
		
		
		//orderform
		
		
		function orderform($client_Id)
		{
		 $qry		=	"SELECT * FROM client_fusion C ,client_account A, product P ,client_order O WHERE  A.client_id=C.client_id AND C.client_id=P.client_id AND O.client_id=C.client_id AND C.client_id=$client_Id";
		$res	= $this->db->readValue($qry);
		return $res;
		}
		function getpaper($id)
		{
		$qry ="select * from paper_inside where paper_id = $id";
		$res	= $this->db->readValue($qry);
		return $res;
		}
		function getcover($id)
		{
		$qry ="select * from paper_cover where cover_id = $id";
		$res	= $this->db->readValue($qry);
		return $res;
		}
		
		function getbinding($id)
		{
		$qry ="select * from paper_binding where bind_id = $id";
		$res	= $this->db->readValue($qry);
		return $res;
		}
		function getlaminate($id)
		{
		$qry ="select * from paper_laminate where lamp_id = $id";
		$res	= $this->db->readValue($qry);
		return $res;
		}
		function getdelivered($id)
		{
		$qry ="select * from paper_books where book_id = $id";
		$res	= $this->db->readValue($qry);
		return $res;
		}
		
		//end
		
		function getRatetype($rate_id)
		{
		$qry		=	"SELECT * FROM client_offer WHERE offer_id=$rate_id";
		$res	= $this->db->readValue($qry);
		return $res;
		}
		
		
		function getTransactionType($trans_id)
		{
		$qry		=	"SELECT * FROM transaction_type WHERE trans_id=$trans_id";
		$res	= $this->db->readValue($qry);
		return $res;
		}
		
		function countorder($clientId)
		{
	 	$select		=	"select * from client_order where client_id='".$clientId."'";
		$num	= $this->db->numberOfRecords($select);
		return $num;
		}
		
		function countaccount($clientId)
		{
		 $select		=	"select * from client_account where client_id='".$clientId."'";
		$numrecords = $this->db->numberOfRecords($select);
		return $numrecords;
		}
		
		function countproduct($clientId)
		{
		$select		=	"select * from product where client_id='".$clientId."'";
			$numrecords = $this->db->numberOfRecords($select);
			return $numrecords;
		}
		
		function getdates()
		{
		$qry	=	"select * from client_order";
		$res	= $this->db->readValues($qry);
		return $res;
		
		}
		
		function getSchool($id)
		{
		$qry	=	"select * from calender where client_id=$id";
		$res	= $this->db->readValue($qry);
		return $res;
		
		}
		
		
	//end class
		}	
/* End : production.class.php  */

?>
