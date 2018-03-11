<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="Fusion Books, Fusion Books - School Yearbooks, Graduation Books, Yearbooks, Services, Online Yearbooks System, Fusion Book's online system, Yearbook Express, Yearbook Planner, Printing and Publishing, Custom School Diaries, Calendars, School Newsletters, Prospective,  Annual Report, School Reports, Autograph Books, Yearbooks, School Newsletters, Primary School Graduation Books, High School Graduation Books, Leaver's Books, Profile Books, " />

<meta name="keywords" content="Yearbook, Yearbook Printing, Graduation Books, Sports Club Yearbooks, School Yearbooks, Uni's &amp; Colleges, Workspace, Book Features, Yearbook Pricing, Yearbook Gallery, Yearbook Ideas, Article Page Ideas, Photo Page Ideas, Profile Page Ideas, How to Snap like a Pro, Front Cover Ideas, Yearbook Quotes, Quotes, Lesson Plans and Ideas, FAQ, Free Lesson Plans, Embossing, Hard-Covers, Gloss or matt laminate, UV Varnish and Spot UV Varnish, Dust-jackets, Foil binding, Durable wire-binding, standard binding, Cleat-binding, high quality yearbook, Full-Colour printing" />

<title>Fusion Books</title>
<style type="text/css">
.dark_blue {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #0000FF;
}
.grey_12px{
	font-family:Lucida Grande;
	font-size:12px;
	font-weight:normal;
	color:#555555;
	line-height:20px;
	text-decoration: none;
}
a.grey_12px{
	font-family:Lucida Grande;
	font-size:12px;
	font-weight:normal;
	color:#654012;
	line-height:20px;
	text-decoration: none;
}
span.extract  {
	font-family : verdana, arial,helvetica,sans-serif;
	color : #000000;
	font-weight : normal;
	font-size : 11px;
	text-decoration : none;
}
.headText {
	font-family: "Trebuchet MS",Arial, Helvetica, sans-serif;
	font-size: .90em;
	font-weight: normal;
	text-decoration: none;
	text-transform: capitalize;
	color: #434440;
}
</style>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/style_dropdown.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/ddlevelsmenu-base.css" />

<script type="text/javascript" src="js/drop.js"></script>
<script type="text/javascript" src="js/ddlevelsmenu.js"></script>


</head>

<body id="body_bg" onLoad="goSearch(<?php echo  $_REQUEST['keyword'];?>);">
<div id="container">
  <?php include('header.php');?>
  
  <div id="banspace">&nbsp;</div>
  <div id="middle-part">
    
    <div id="content_inner">
	
	<?php
  $key = $_REQUEST['keyword'];
// English Configuration
// echo $my_server = "http://".getenv("SERVER_NAME");//.":".getenv("SERVER_PORT"); // Your Server (generally no changes needed)

//In server

$my_server = "http://".getenv("SERVER_NAME")."";//.":".getenv("SERVER_PORT"); // Your Server (generally no changes needed)


// local

/*$my_server = "http://".getenv("SERVER_NAME")."/Fusion";//.":".getenv("SERVER_PORT"); // Your Server (generally no changes needed)
*/
/* $my_server = "http://".getenv("SERVER_NAME")."";//.":".getenv("SERVER_PORT"); // Your Server (generally no changes needed)
*/ 

$my_root = getcwd();
//= getenv("DOCUMENT_ROOT"); // Your document root (generally no changes needed)
$s_dirs = array("","/Mithun/search php-flat-file-search-script/dir2"); // Which directories should be searched ("/dir1","/dir2","/dir1/subdir2","/Verzeichniss2/Unterverzeichniss2")? --> $s_dirs = array(""); searches the entire server
$s_skip = array("..",".","js","classes","config","css","files","template","images","site","test","search_result.php","indexbkp.php","innerpage.php","free_samplebook_trial_account.php","footer.php","test1.php","promotions.php","header.php","addContact.php","popupContact.php","yearbook_full_page_image_ideas.php","listdesc.php","search.php","phpinfo.php","online.php","viewNews.php","contact_fusion_books 21-07-2009.php","index2.php","index1.php","index20.7ch.php","index3.8.php","search_resultbkp.php","viewNews1.php"); // Which files/dirs do you like to skip?
$s_files = "php"; // Which files types should be searched? Example: "html$|htm$|php4$"
$min_chars = "3"; // Min. chars that must be entered to perform the search
$max_chars = "30"; // Max. chars that can be submited to perform the search
$default_val = "Searchphrase"; // Default value in searchfield
 $limit_hits = array("5","10","25","50","100"); // How many hits should be displayed, to suppress the select-menu simply use one value in the array --> array("100")
// print_r($limit_hits);
$message_1 = "Invalid Searchterm!"; // Invalid searchterm
$message_2 = "Please enter at least '$min_chars', highest '$max_chars' characters."; // Invalid searchterm long ($min_chars/$max_chars)
$message_3= "YOUR SEARCH RESULTS FOR:"; // Headline searchresults
$message_4 = "Sorry, no Results."; // No hits
$message_5 = "results"; // Hits
$message_6 = "Match case"; // Match case
$no_title = "Untitled"; // This should be displayed if no title or empty title is found in file
$limit_extracts_extracts = ""; // How many extratcts per file do you like to display. Default: "" --> every extract, alternative: 'integer' e.g. "3"
$byte_size = "51200"; // How many bytes per file should be searched? Reduce to increase speed


function search_form($HTTP_GET_VARS, $limit_hits, $default_val, $message_5, $message_6, $PHP_SELF) {
	 @$keyword=$HTTP_GET_VARS['keyword'];
	@$case=$HTTP_GET_VARS['case'];
	@$limit=$HTTP_GET_VARS['limit'];
	/*echo "<form action=\"$PHP_SELF\" name=\"frm\" method=\"GET\">\n",
	"<input type=\"hidden\" value=\"SEARCH\" name=\"action\">\n",
	"<input type=\"text\" name=\"keyword\" id=\"keyword123\" class=\"text\" size=\"10\"  maxlength=\"30\" value=\"";
	*/
	if(!$keyword)
		echo "$default_val";
	else
		echo str_replace("&amp;","&",htmlentities($keyword));
	echo "\" ";
	echo "onFocus=\" if (value == '";
	if(!$keyword)
		echo "$default_val"; 
	else
		echo str_replace("&amp;","&",htmlentities($keyword));
	echo "') {value=''}\" onBlur=\"if (value == '') {value='";
	if(!$keyword)
		echo "$default_val"; 
	else
		echo str_replace("&amp;","&",htmlentities($keyword));
	echo "'}\"> ";
	$j=count($limit_hits);
	if($j==1)
		echo "<input type=\"hidden\" value=\"".$limit_hits[0]."\" name=\"limit\">";
	elseif($j>1) {
		echo
		"<select name=\"limit\" class=\"select\">\n";
		for($i=0;$i<$j;$i++) {
			echo "<option value=\"".$limit_hits[$i]."\"";
			if($limit==$limit_hits[$i])
				echo "SELECTED";
			echo ">".$limit_hits[$i]." $message_5</option>\n";
			}
		echo "</select> ";
		}
	echo
	"<input type=\"submit\" value=\"OK\" class=\"button\">\n",
	"<br>\n",
	
	
	"</form>\n";
	}


// search_headline(): Ueberschrift Suchergebnisse
function search_headline($HTTP_GET_VARS, $message_3) {

	@$keyword=$HTTP_GET_VARS['keyword'];
	
	@$action=$HTTP_GET_VARS['action'];
	
	if($action == "SEARCH") // Volltextsuche
		echo "<div class=\"headText\">$message_3 ".htmlentities(stripslashes($keyword))."</div>";
	}


// search_error(): Auf Fehler testen und Suchfehler anzeigen
function search_error($HTTP_GET_VARS, $min_chars, $max_chars, $message_1, $message_2, $limit_hits) {
	global $HTTP_GET_VARS;
	@$keyword=$HTTP_GET_VARS['keyword'];
	@$action=$HTTP_GET_VARS['action'];
	@$limit=$HTTP_GET_VARS['limit'];
	if($action == "SEARCH") { // Volltextsuche
		if(strlen($keyword)<$min_chars||strlen($keyword)>$max_chars||!in_array ($limit, $limit_hits)) { // Ist die Anfrage in Ordnung (min. '$min_chars' Zeichen, max. '$max_chars' Zeichen)?
			echo "<p class=\"result\"><b>$message_1</b><br>$message_2</p>";
			$HTTP_GET_VARS['action'] = "ERROR"; // Suche abbrechen
			}
		}
	}


// search_dir(): Volltextsuche in Verzeichnissen
function search_dir($my_server, $my_root, $s_dirs, $s_files, $s_skip, $message_1, $message_2, $no_title, $limit_extracts, $byte_size, $HTTP_GET_VARS) {
	global $count_hits;
	//print_r($my_root);
	@$keyword=$HTTP_GET_VARS['keyword'];
	@$action=$HTTP_GET_VARS['action'];
	@$limit=$HTTP_GET_VARS['limit'];
	@$case=$HTTP_GET_VARS['case'];
	if($action == "SEARCH") { // Volltextsuche
		foreach($s_dirs as $dir) { // Alle Verzeichnisse in $s_dirs durchsuchen
		//print_r($dir);	
			$handle = @opendir($my_root.$dir);
			while($file = @readdir($handle)) {
				if(in_array($file, $s_skip)) { // Alles in $skip auslassen
					continue;
					}
				elseif($count_hits>=$limit) {
					break; // Maximale Trefferzahl erreicht
					}
				elseif(is_dir($my_root."/".$file)) { // Unterverzeichnisse durchsuchen
					$s_dirs = array("$dir/$file");
					search_dir($my_server, $my_root, $s_dirs, $s_files, $s_skip, $message_1, $message_2, $no_title, $limit_extracts, $byte_size, $HTTP_GET_VARS); // search_dir() rekursiv auf alle Unterverzeichnisse aufrufen
					}
				elseif(preg_match("/($s_files)$/i", $file)) { // Alle Dateien gemaess Endungen $s_files
				
					$fd=fopen($my_root.$dir."/".$file,"r");
					$text=fread($fd, $byte_size); // 50 KB
					$keyword_html = htmlentities($keyword);
					if($case) { // Gross-/Kleinschreibung beruecksichtigen?
						$do=strstr($text, $keyword)||strstr($text, $keyword_html);
						}
					else {
						$do=stristr($text, $keyword)||stristr($text, $keyword_html);
						}
					if($do)	{
						$count_hits++; // Treffer zaehlen
						if(preg_match_all("=<title[^>]*>(.*)</title>=siU", $text, $titel)) { // Generierung des Link-Textets aus <title>...</title>
							if(!$titel[1][0]) // <title></title> ist leer...
								 $link_title=$no_title; // ...also $no_title
							else
								$link_title=$titel[1][0];  // <title>...</title> vorhanden...
							}
						else {
							$link_title=$no_title; // ...ansonsten $no_title
							}
						echo "<br><font><b>$count_hits.</b></font> <a href=\"$my_server/$file\" target=\"_self\" class=\"result\"> $link_title</a><br>"; // Ausgabe des Links
									$text =str_replace('<? 
			while($row11=mysql_fetch_array($qry11))
			{
			?>
				<span class="grey_12px">			
					<span><b>Title : </b><span class="dark_blue"><? if($row11[file]==""){ echo $row11[title];}else{?><a  href="files/<?=$row11[file];?>" ><?=$row11[title];?> - PDF</a><?}?></span></span><br />
					<span><b>Author(s): </b><span><?=$row11[author];?></span></span><br />
					<span><b>Description: </b><?=$row11[description];?>
					</span><br />
					<!--<span><b>Download File: </b><a href="publications.php?filename=<?=$row11[file];?>"><?=$row11[file];?></a></span><br />--><br />
				</span>
			<? } ?>','',$text);
		//	echo $link_title;
			$text =str_replace('$qry11 = mysql_query("select * from  publication where ','' ,$text);
						$auszug = strip_tags($text);
						$keyword = preg_quote($keyword); // unescapen
						$keyword = str_replace("/","\/","$keyword");
						$keyword_html = preg_quote($keyword_html); // unescapen
						 $keyword_html = str_replace("/","\/","$keyword_html");
						echo "<span class=\"extract\">";
						if(preg_match_all("/((\s\S*){0,10})($keyword|$keyword_html)((\s?\S*){0,10})/i", $auszug, $match, PREG_SET_ORDER)); {
							if(!$limit_extracts)
								$number=count($match);
							else
								$number=$limit_extracts;
							for ($h=0;$h<$number;$h++) { // Kein Limit angegeben also alle Vorkommen ausgeben
								if (!empty($match[$h][3]))
							
								
							
									printf("<i><b></b> %s<b>%s</b>%s <b>..</b></i>", $match[$h][1], $match[$h][3], $match[$h][4]);
								}
							}
						echo "</span><br><a href=\"$my_server/$file\" target=\"_self\" >
						$my_server$dir/$file</a>						<br>";
						flush();
						}
					fclose($fd);
					}
				}
	  		@closedir($handle);
			}
		}
	}


// search_no_hits(): Ausgabe 'keine Treffer' bei der Suche
function search_no_hits($HTTP_GET_VARS, $count_hits, $message_4) {
	@$action=$HTTP_GET_VARS['action'];
	if($action == "SEARCH" && $count_hits<1) // Volltextsuche, kein Treffer
		echo "<p class=\"result\">$message_4</p>";
	}
//echo $no_title;
?>


	<h1><?php if($key != "") {search_headline($HTTP_GET_VARS, $message_3);} else {echo "Enter the Searchphrase!!";}?></h1>
                    <span class="grey_12px">			
					<span><?php  if($key != "") { search_dir($my_server, $my_root, $s_dirs, $s_files, $s_skip, $message_1, $message_2, $no_title, $limit_extracts, $byte_size, $HTTP_GET_VARS);} ?>
					
<?php
//-----------------------
//$con=mysql_connect("localhost","edstrate_edstrat","eliana1");
//mysql_select_db("edstrate_edstrat1",$con);
//$con=mysql_connect("localhost","root","");
//mysql_select_db("edstrate_edstrat1",$con);
/*if($key != "")
{
$selQry = mysql_query("select * from publication where title like('%$key%') or author like('%$key%') or description like('%$key%')");
$newcount =  $count_hits+1;
 $rows = mysql_num_rows($selQry);
	if($rows>0)
	{
		$result = mysql_fetch_array($selQry);
	
		 $tittle = $result["title"];
		echo "<br><font>$newcount.</font> <a href=\"$my_server$dir/$file\" target=\"_self\" class=\"result\">Publications</a> <br>";
		echo "<span class=\"extract\">";
		echo $result["description"];
		
		echo "</span><br><a href=\"http://edstrategies.net/publications.php\" target=\"_self\" >http://edstrategies.net/publications.php
							</a>						<br>";
	}
	
}*/

//----------------------------------------

?>
      
	  <br/>		<?  //print_r($count_hits); ?>
					<?php if($count_hits == "" && $rows == 0) {search_no_hits($HTTP_GET_VARS, $count_hits, $message_4); }?>
</b><span class="dark_blue"><?php //if($key != "") {search_headline($HTTP_GET_VARS, $message_3);}?>              </span></span>
			  </span>
	
	    </div>
    <div id="column-right">
      <div class="sample"><a href="samplebooks_trailAccount.php"><img src="images/free_sample.jpg" alt="" border="0" /></a></div>
	  <div class="sample"><a href="request_quote.php"><img src="images/request.jpg" alt="" border="0" /></a></div>
    </div>
  </div>
</div>
<?php include('footer.php');?>
</body>