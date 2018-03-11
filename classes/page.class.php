<?php 
	require_once "database.class.php";

   class page 
   { 
       function getPagerData($numHits, $limit, $page) 
       { 
           $numHits  = (int) $numHits; 
           $limit    = max((int) $limit, 1); 
           $page     = (int) $page; 
           $numPages = ceil($numHits / $limit); 

           $page = max($page, 1); 
           $page = min($page, $numPages); 
           $offset = ($page - 1) * $limit; 

         //  $ret = new stdClass; 
		// $arrPage	= array();
		 $arrPage	= array("offset"=>$offset,"limit"=>$limit,"numPages"=>$numPages,"page"=>$page);

          // $ret->offset   = $offset; 
          // $ret->limit    = $limit; 
          // $ret->numPages = $numPages; 
           //$ret->page     = $page; 
			return $arrPage;
          // return $ret; 
       } 
   } 
?> 