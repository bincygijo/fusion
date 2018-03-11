<?	require_once "includepath.inc.php";
	
	$objL				= new locations();
	$objC				= new cuisine();
	$objS				= new search();
	$objV				= new review();
	$objP				= new page;
	$objB				= new banner();
	
	$arrCountry			= array();
	$arrCuisine			= array();
	$arrAreas			= array();
	$arrSearch			= array();
	$arrRestCities		= array();
	$restcitycount		= '';
	$cuisinecount		= '';
	$searchcount		= '';
	
	$page				= isset($_REQUEST['page'])		? $_REQUEST['page'] 	: 1;
	$plimit				= isset($_REQUEST['plimit'])	? $_REQUEST['plimit'] 	: 10;
	$food				= isset($_REQUEST['food'])		? $_REQUEST['food'] 	: '';
	$area				= isset($_REQUEST['location'])	? $_REQUEST['location'] : '';
	$search				= isset($_REQUEST['search'])	? $_REQUEST['search'] 	: '';
	
	$arrCountry			= $objL->get_countries();
	$arrAreas			= $objL->areas_city($cityId);
	$cuisinecount		= $objC->count_rest_cuisine($cityId); 
	$arrCuisines			= $objC->rest_cuisines(couisinename,ASC,0,$cuisinecount,$cityId);
	$restcitycount		= $objC->count_rest_cities();
	$arrRestCities		= $objC->restaurant_cities(cityname,ASC,0,$restcitycount);
	
	if(isset($search) && $search=='Search')
	{
		$searchcount	= $objS->get_foodcount($food,$area,$cityId);//echo "count=$searchcount<br>";
		$pcount			= $objP->getPagerData($searchcount,$plimit,$page);	
		$cpage   		= $pcount['page'];		
		$offset 		= $pcount['offset'];  	
		$limit  		= $pcount['limit']; 	
		$totpage  		= $pcount['numPages']; 
		$arrSearch		= $objS->search_food($food,$area,$cityId,$offset,$limit);
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ibistrot</title>
<link href="images/style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
	var xmlHttp
	function getarea_country(str)
	{ 
		//alert ("id="+str);
		xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		{
		alert ("Browser does not support HTTP Request")
		return
		} 
		var url="get_areas.php"
		url=url+"?contid="+str
		url=url+"&sid="+Math.random()
		xmlHttp.onreadystatechange=stateChanged15
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null)
	}

	function stateChanged15() 
	{ 
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 
			//alert ("text="+xmlHttp.responseText );
			document.getElementById("searchbox_item").innerHTML=xmlHttp.responseText 
		} 
	} 

	function GetXmlHttpObject()
	{ 
		var objXMLHttp=null
		if (window.XMLHttpRequest)
		{
			objXMLHttp=new XMLHttpRequest()
		}
		else if (window.ActiveXObject)
		{
			objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")
		}
		return objXMLHttp
	}
	</script>

</head>

<body>
<div id="wrap">
  <? require_once("topbar.inc.php");?>
  <div id="middle">
    <div class="innerleft ">
      <? include("search_box.php");?>
      <br class="spacer" />
      <div id="innerrightarea">
      <div class="column_details">
          <div class="header"><?php echo $translate->_("Neighborhood"); ?></div>
          <div class="contents">
		  <ul>
		  <? if(!empty($arrAreas)) { ?>
			  <? foreach($arrAreas as $k=>$v) { ?>
			  	<li><a href="rest_area.php?areaid=<?=$v['areaid']?>"> <?=$v['areaname']?></a></li>
			  <? } ?>
		  <? } else {?>
			  <? if(!empty($arrRestCities)) { ?>
				<? foreach($arrRestCities as $k=>$v) { ?>
				
				<li><?=$v['cityname']?></li>
				<?  $areacount	= '';
					$arrAreas	= array();
					$areacount	= $objC->rest_areas_count($v['cityid']);
					$arrAreas	= $objC->restaurant_areas($v['cityid'],areaname,ASC,0,$areacount);
					if(!empty($arrAreas))
					{ 
						foreach($arrAreas as $m=>$n) 
						{
						?>
						<li><a href="rest_area.php?areaid=<?=$n['areaid']?>"> <?=$n['areaname']?></a> </li>
						<?
						}
					}
				?>
				
				<? } ?>
				<? }?>
			<? } ?>
			</ul>
			</div>
        </div>
        <br class="spacer" />
      </div>
      <br class="spacer" />
    </div>
    <div class="innermiddle">
		
      <div class="rest_ad_area">
	  <div class="top-ad_area">
	  <h3><?php echo $translate->_("Search results"); ?></h3>
	  </div> 
	 
        <!--
          <h2>New York City Restaurants</h2>
          
          <hr noshade="noshade" style="color:#c3c176; height: 2px;"> 
          <p class="midText">We found (5) Afghan restaurants in New York City</p>
          <div class="menuselect">
            <form id="form1" name="form1" method="post" action="">
             <label>Filter by Meal : </label>          
             <select name="select" class="login_input2" id="select">
            </select>
            <label>Feature : </label>          
             <select name="select" class="login_input2" id="select">
            </select>
            </form>
          </div>
        </div>-->
        <div id="inner_rest_listing">
          <div class="header"><?php echo $translate->_("No"); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $translate->_("Restaurant name and address"); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $translate->_("Rating"); ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $translate->_("Reviews"); ?>
          </div>
		   <? 
		    $j=$offset;
		   if(!empty($arrSearch)) { ?>
		  <? foreach($arrSearch as $key=>$value) { ?>
          <div class="listing">
            <div class="number"><? //=$key+1?><?=++$j?></div>
            <div class="restnames">
            <h2><a class="more1" href="searchDetails.php?restaurantId=<?=$value['restaurantid']?>"><?=$value['name']?></a></h2>
            <span><?=$value['address1']?>, <?=$value['address2']?></span></div>
				
            <div class="starrating">
			<?  
				 $restId	= $value['restaurantid'];
				 $arrRate	= $objV->get_rate($restId);
				 $arrReview	= $objV->count_review($restId);
				 $food1		= $arrRate['avgfood'];
				 $service	= $arrRate['avgservice'];
				 $value1	= $arrRate['avgrvalue'];
				 $atmos		= $arrRate['avgatmosphere']."<br>";
				 $tot		= ($food1 + $service + $value1 + $atmos)/4;
				 $total 	= floor($tot);
				
				?>
			 <? for($i=1;$i<=5;$i++){?>
			  <? if($i<=$total) {?><img src="images/star_act.gif" width="13" height="12" /><? } else {?>
			  <img src="images/star_nor.gif" width="13" height="12" /><? }?>
			  <? }?>
			
			
			</div>
            <div class="reviews"><? echo $arrReview['total'];?></div>
          </div>
		   <? } ?>
		 
        <div id="inner_rest_pagination"><?php echo $translate->_("Pages."); ?> : 
		<? for($i=1;$i<=$totpage;$i++) { ?>
		  <? if($i==$page) { ?>
		  <?  echo $i; 
		  } 
		  else { 
		   ?>
		   <a href="searching.php?page=<?=$i?>&plimit=<?=$plimit?>&food=<?=$food?>&area=<?=$area?>&search=<?=$search?>"><? echo $i;?></a>
		   <? } ?>
		   &nbsp; 
		  <? } ?>	
		  </div>
		  <? } else{ ?>
		  <div class="listing"><font color="#FF6633" face="Arial, Helvetica, sans-serif" size="3"><b><?php echo $translate->_("Your search produced no results."); ?></b></font></div>
           <?php }?>     
        </div>
								    
        <div id="inner_rest_bottom_adarea">
		
		 <?	 $id = 4;
	  $arrPagebottom = array();
	  	$arrPagebottom = $objB->getBottombanner($id);
		//print_r($arrPagetop);
		$count	= count($arrPagebottom);
		 if($count>0) { ?>
		  <? foreach($arrPagebottom as $key=>$value) { ?>
		  <? 
			 $pagename	=	$value['bannerid'];
		 	$image	= $value['displayfile'];
			 $link  = $value['link'];
		 
		 
		  if($value['displayfile']!="")
		  {
			$imgpath	= "bannerimages/".$value['displayfile'];
			
			 if($link!="#"){
			echo "<a href=\"".$link."\"><img src=\"imagefile.php?imgpath=$imgpath&width=530&height=94\" border=\"1\" 
					alt=\"Click For Full Details \" title=\"Click For Full Details\"></a>";
						} 
					else {
					echo "<img src=\"imagefile.php?imgpath=$imgpath&width=530&height=94\" alt=\"Click For Full Details \" title=\"Click For Full Details\">";

		 				} 
			  
		} }  }
		 
		  else
		  { ?>
		
		  <img src="images/bottom_ad.gif" width="530" height="94" />
		  
		 <? }
		 
		  ?>
		<!--<img src="images/bottom_ad.gif" width="530" height="94" />--></div>
      </div>
    </div>
    <div class="innerright">
      <div class="ad_area">
	  
	   <?	 $id = 4;
	  $arrPagetop = array();
	  	$arrPagetop = $objB->getRightbanner($id);
		//print_r($arrPagetop);
		$count	= count($arrPagetop);
		 if($count>0) { ?>
		  <? foreach($arrPagetop as $key=>$value) { ?>
		  <? 
			 $pagename	=	$value['bannerid'];
		 	$image	= $value['displayfile'];
			 $link  = $value['link'];
		 
		 
		  if($value['displayfile']!="")
		  {
			$imgpath	= "bannerimages/".$value['displayfile'];
			
			 if($link!="#"){
			echo "<a href=\"".$link."\"><img src=\"imagefile.php?imgpath=$imgpath&width=204&height=600\" border=\"1\" 
					alt=\"Click For Full Details \" title=\"Click For Full Details\"></a>";
						} 
					else {
					echo "<img src=\"imagefile.php?imgpath=$imgpath&width=204&height=600\" alt=\"Click For Full Details \" title=\"Click For Full Details\">";

		 				} 
			  
		} }  }
		 
		  else
		  { ?>
		
		  <img src="images/ad2.jpg" width="204" height="600" />
		  
		 <? }
		 
		  ?>
	  
	 <!-- <img src="images/ad2.jpg" width="204" height="600" />--></div>
    </div>
  </div>
  <br class="spacer" />
</div>
<div id="footerMain">
<? require_once("footer.inc.php");?>
</div>
</body>
</html>
