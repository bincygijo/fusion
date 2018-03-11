<?
session_start();
include("loginchk.php");
include_once '../../config/config.inc.php';
include_once 'classes/user.class.php';
include_once 'classes/production.class.php';
include('events.php');
//include_once 'templates/header.tpl.php'; 
$objU	=	new user();
$event		=	$objU->listevents();
 $list		=	$_GET['eventlist'];
//$objE		=	new events();
 //$numevents = sizeof($event);
 
//$event		=	$objE->events();
// print_r($event);
/* $result		=	mysql_query("select * from event");
 $result		=	mysql_query("select * from event");
 */
/*$event = new array();
$i=0;
while($row=mysql_fetch_array($result))
{
$id=$row['event_id'];
$i++;
}
return $event;*/
?>


<style type="text/css">

#evtcal a:link {font: normal 12pt "Arial", "Helvetica", "Sans Serif"; color: #004400; text-decoration: none; font-weight: bold;}		/* unvisited link */
#evtcal a:visited {font: normal 12pt "Arial", "Helvetica", "Sans Serif"; color: #004400; text-decoration: none; font-weight: bold;}	/* visited link */
#evtcal a:hover {font: normal 12pt "Arial", "Helvetica", "Sans Serif"; color: #004400; text-decoration: underline; font-weight: bold;}	/* mouse over link */
#evtcal a:active {font: normal 12pt "Arial", "Helvetica", "Sans Serif"; color: #004400; text-decoration: none; font-weight: bold;}		/* selected link */

</style>

<!--<script language="JavaScript" type="text/javascript" src="events.js"></script>-->

<script type="text/JavaScript" language="JavaScript">

/* Preload images script */
var myimages=new Array()

function preloadimages(){
	for (i=0;i<preloadimages.arguments.length;i++){
		myimages[i]=new Image();
		myimages[i].src=preloadimages.arguments[i];
	}
}


/* The path of images to be preloaded inside parenthesis: (Extend list as desired.) */
preloadimages("images/PrevYrOff40x40.jpg","images/PrevYrOn40x40.jpg","images/PrevMoOff40x40.jpg","images/PrevMoOn40x40.jpg","images/NextYrOff40x40.jpg","images/NextYrOn40x40.jpg","images/NextMoOff40x40.jpg","images/NextMoOn40x40.jpg");


/***************************************************************************************
	JavaScript Calendar - Digital Christian Design
	//Script featured on and available at JavaScript Kit: http://www.javascriptkit.com
	// Functions
		changedate(): Moves to next or previous month or year, or current month depending on the button clicked.
		createCalendar(): Renders the calander into the page with links for each to fill the date form filds above.
			
***************************************************************************************/

var thisDate = 1;							// Tracks current date being written in calendar
var wordMonth = new Array("January","February","March","April","May","June","July","August","September","October","November","December");
var today = new Date();							// Date object to store the current date
var todaysDay = today.getDay() + 1;					// Stores the current day number 1-7
var todaysDate = today.getDate();					// Stores the current numeric date within the month
var todaysMonth = today.getUTCMonth() + 1;				// Stores the current month 1-12
var todaysYear = today.getFullYear();					// Stores the current year
var monthNum = todaysMonth;						// Tracks the current month being displayed
var yearNum = todaysYear;						// Tracks the current year being displayed
var firstDate = new Date(String(monthNum)+"/1/"+String(yearNum));	// Object Storing the first day of the current month
var firstDay = firstDate.getUTCDay();					// Tracks the day number 1-7 of the first day of the current month
var lastDate = new Date(String(monthNum+1)+"/0/"+String(yearNum));	// Tracks the last date of the current month
var numbDays = 0;
var calendarString = "";
var eastermonth = 0;
var easterday = 0;


function changedate(buttonpressed) {
	if (buttonpressed == "prevyr") yearNum--;
	else if (buttonpressed == "nextyr") yearNum++;
	else if (buttonpressed == "prevmo") monthNum--;
	else if (buttonpressed == "nextmo") monthNum++;
	else  if (buttonpressed == "return") { 
		monthNum = todaysMonth;
		yearNum = todaysYear;
	}

	if (monthNum == 0) {
		monthNum = 12;
		yearNum--;
	}
	else if (monthNum == 13) {
		monthNum = 1;
		yearNum++
	}

	lastDate = new Date(String(monthNum+1)+"/0/"+String(yearNum));
	numbDays = lastDate.getDate();
	firstDate = new Date(String(monthNum)+"/1/"+String(yearNum));
	firstDay = firstDate.getDay() + 1;
	createCalendar();
	return;
}


function easter(year) {
// feed in the year it returns the month and day of Easter using two GLOBAL variables: eastermonth and easterday
var a = year % 19;
var b = Math.floor(year/100);
var c = year % 100;
var d = Math.floor(b/4);
var e = b % 4;
var f = Math.floor((b+8) / 25);
var g = Math.floor((b-f+1) / 3);
var h = (19*a + b - d - g + 15) % 30;
var i = Math.floor(c/4);
var j = c % 4;
var k = (32 + 2*e + 2*i - h - j) % 7;
var m = Math.floor((a + 11*h + 22*k) / 451);
var month = Math.floor((h + k - 7*m + 114) / 31);
var day = ((h + k - 7*m +114) % 31) + 1;
eastermonth = month;
easterday = day;
}


function createCalendar() {
	calendarString = '';
	var daycounter = 0;
	calendarString += '<table width="800" height="700" border="1" cellpadding="0" cellspacing="1" class="calender">';
	calendarString += '<tr>';
	calendarString += '<td align=\"center\" valign=\"center\" width=\"114\" height=\"40\"><a href=\"#\" onMouseOver=\"document.PrevYr.src=\'images\/PrevYrOn40x40\.jpg\';\" onMouseOut=\"document.PrevYr.src=\'images\/PrevYrOff40x40\.jpg\';\" onClick=\"changedate(\'prevyr\')\"><img name=\"PrevYr\" src=\"images\/PrevYrOff40x40\.jpg\" width=\"40\" height=\"40\" border=\"0\" alt=\"Prev Yr\"\/><\/a><\/td>';
	calendarString += '<td align=\"center\" valign=\"center\" width=\"114\" height=\"40\" ><a href=\"#\" onMouseOver=\"document.PrevMo.src=\'images\/PrevMoOn40x40\.jpg\';\" onMouseOut=\"document.PrevMo.src=\'images\/PrevMoOff40x40\.jpg\';\" onClick=\"changedate(\'prevmo\')\"><img name=\"PrevMo\" src=\"images\/PrevMoOff40x40\.jpg\" width=\"40\" height=\"40\" border=\"0\" alt=\"Prev Mo\"\/><\/a><\/td>';
	calendarString += '<td bgcolor=\"#C8C896\" align=\"center\" valign=\"center\" height=\"40\" colspan=\"3\"><b>' + wordMonth[monthNum-1] + '&nbsp;&nbsp;' + yearNum + '<\/b><\/td>';
	calendarString += '<td align=\"center\" valign=\"center\" width=\"114\" height=\"40\"><a href=\"#\" onMouseOver=\"document.NextMo.src=\'images\/NextMoOn40x40\.jpg\';\" onMouseOut=\"document.NextMo.src=\'images\/NextMoOff40x40\.jpg\';\" onClick=\"changedate(\'nextmo\')\"><img name=\"NextMo\" src=\"images\/NextMoOff40x40\.jpg\" width=\"40\" height=\"40\" border=\"0\" alt=\"Next Mo\"\/><\/a><\/td>';
	calendarString += '<td align=\"center\" valign=\"center\" width=\"114\" height=\"40\"><a href=\"#\" onMouseOver=\"document.NextYr.src=\'images\/NextYrOn40x40\.jpg\';\" onMouseOut=\"document.NextYr.src=\'images\/NextYrOff40x40\.jpg\';\" onClick=\"changedate(\'nextyr\')\"><img name=\"NextYr\" src=\"images\/NextYrOff40x40\.jpg\" width=\"40\" height=\"40\" border=\"0\" alt=\"Next Yr\"\/><\/a><\/td>';
	calendarString += '<\/tr>';
	calendarString += '<tr>';
	calendarString += '<td bgcolor=\"#DDDDDD\" align=\"center\" valign=\"center\" width=\"114\" height=\"22\" class=\"calfon\">Sun<\/td>';
	calendarString += '<td bgcolor=\"#DDDDDD\" align=\"center\" valign=\"center\" width=\"114\" height=\"22\" class=\"calfon\">Mon<\/td>';
	calendarString += '<td bgcolor=\"#DDDDDD\" align=\"center\" valign=\"center\" width=\"114\" height=\"22\" class=\"calfon\">Tue<\/td>';
	calendarString += '<td bgcolor=\"#DDDDDD\" align=\"center\" valign=\"center\" width=\"114\" height=\"22\" class=\"calfon\">Wed<\/td>';
	calendarString += '<td bgcolor=\"#DDDDDD\" align=\"center\" valign=\"center\" width=\"114\" height=\"22\" class=\"calfon\">Thu<\/td>';
	calendarString += '<td bgcolor=\"#DDDDDD\" align=\"center\" valign=\"center\" width=\"114\" height=\"22\" class=\"calfon\">Fri<\/td>';
	calendarString += '<td bgcolor=\"#DDDDDD\" align=\"center\" valign=\"center\" width=\"114\" height=\"22\" class=\"calfon\">Sat<\/td>';
	calendarString += '<\/tr>';

	thisDate == 1;
	var sch= events[4];
	//alert(sch);
	//var numeve = 0;
	//day	=	,month,year,week,dayofweek
//	alert(events);
var numevents = 0;
for (var i = 0; i < events.length; i++) {
if (events[i][0] == "M") {
			}
			if (events[i][0] == "year") {
			school	=	events[i][4];
			day		=	events[i][2];
			month	= events[i][1];
			
			if ((events[i][2] == day) && (events[i][1] == month)) numevents++;
			
			//alert(school);
			/* if (events[i][0] == "Y") {
			if ((events[i][2] == day) && (events[i][1] == month)) numevents++;
			
		 }*/

/*if (events[i][0] == "M") {
			}
			if (events[i][0] == "Y") {
				if ((events[i][2] == day) && (events[i][1] == month)) {
				theevent += "Date: \n" + month +'/'+ day +'/'+ year + '\n';
				theevent += events[i][6] + '\n';
				theevent += 'School: ' + events[i][4] + '\n';
				theevent += 'Description: ' + events[i][7] + '\n';
				/*theevent += 'Client Id: ' + events[i][5] + '\n';
				theevent += 'Description: ' + events[i][7] + '\n';*/
				/*theevent += '\n -------------- \n\n';
				IDS += events[i][5]+',';
				SNM += events[i][4]+',';
				document.forms.eventform.list.value = IDS;
				document.forms.eventform.school.value = SNM;
				document.forms.eventform.d.value = day;
				document.forms.eventform.m.value = month;
				document.forms.eventform.y.value = year;
				//document.forms.eventform.add.style.display = 'block';
				//document.forms.eventform.eventlist.style.display = 'block';
				document.forms.eventform.eventlist.value = theevent;
				
				
				}*/
			}

}


	
	for (var i = 1; i <= 6; i++) {
		calendarString += '<tr>';
		for (var x = 1; x <= 7; x++) {
			daycounter = (thisDate - firstDay)+1;
			
			
			thisDate++;
		
			
			if ((daycounter > numbDays) || (daycounter < 1)) {
				calendarString += '<td align=\"center\" bgcolor=\"#cccccc\" height=\"30\" width=\"40\">&nbsp;<\/td>';
			} else {
			
			
				if (checkevents(daycounter,monthNum,yearNum,i,x) || ((todaysDay == x) && (todaysDate == daycounter) && (todaysMonth == monthNum))){
				
				var str = showentry(daycounter,monthNum,yearNum,i,x);
				
					if ((todaysDay == x) && (todaysDate == daycounter) && (todaysMonth == monthNum)) {
						calendarString += '<td align=\"center\" bgcolor=\"#0099FF\" height=\"30\" width=\"40\"><a href=\"javascript:openWin(\'addentry.php?d=' + daycounter + ',' + monthNum + ',' + yearNum + ',' + i + ',' + x + '\')\">' + daycounter + '<\/a><p name="" id="'+daycounter+'">'+str+'</p><\/td>';
					}
					else{	
				
					
					var str = showentry(daycounter,monthNum,yearNum,i,x);
					
					//alert(str );
					calendarString += '<td align=\"center\" bgcolor=\"#FF0000\" height=\"30\" width=\"40\"><a href=\"javascript:openWin(\'addentry.php?d=' + daycounter + ',' + monthNum + ',' + yearNum + ',' + i + ',' + x + '\')\">' + daycounter + '<\/a><p name="" id="'+daycounter+'">'+str+'</p><\/td>';
					
					//alert(daycounter);
					//showevents( daycounter , monthNum, yearNum , i , x );
					}
					
 					//else	calendarString += '<td align=\"center\" bgcolor=\"#FF0000\" height=\"30\" width=\"40\"><a href=\"javascript:showevents(' + daycounter + ',' + monthNum + ',' + yearNum + ',' + i + ',' + x + ')\">' + daycounter + '<\/a><\/td>';
				} else 
				
				
				{
				
				//var URL=addevents.php;
				
					calendarString += '<td align=\"center\" bgcolor=\"#DDFFFF\" height=\"30\" width=\"40\"><a href=\"javascript:openWin(\'addentry.php?d=' + daycounter + ',' + monthNum + ',' + yearNum + ',' + i + ',' + x + '\')\">' + daycounter + '<\/a> <\/td>';
					
				//	calendarString += '<td align=\"center\" bgcolor=\"#DDFFFF\" height=\"30\" width=\"40\"><a href=addevents.php?d=' + daycounter + ',' + monthNum + ',' + yearNum + ',' + i + ',' + x + '>' + daycounter + '</a> <\/td>';
				}
				
			}
		}
		calendarString += '<\/tr>';
	}

	calendarString += '<tr><td colspan=\"7\" nowrap align=\"center\" valign=\"center\"  bgcolor=\"#C8C896\" width=\"280\" height=\"22\"><a href=\"javascript:changedate(\'return\')\"><\/a><\/td><\/tr><\/table>';

	var object=document.getElementById('calendar');
	object.innerHTML= calendarString;
	thisDate = 1;
}


function checkevents(day,month,year,week,dayofweek) {
var numevents = 0;
var floater = 0;
 
	for (var i = 0; i < events.length; i++) {
	//alert(events[5]);
	
var id	=	events[i][5];
	
	
		if (events[i][0] == "W") {
			if ((events[i][2] == dayofweek)) numevents++;
			
		}
		else if (events[i][0] == year) {
			if ((events[i][2] == day) && (events[i][1] == month) && (events[i][5] == id)) numevents++;
			
			//if ((events[i][8] == id)) numevents++;
			//alert(id);
		}
		else if (events[i][0] == "F") {
			if ((events[i][1] == 3) && (events[i][2] == 0) && (events[i][3] == 0) ) {
				easter(year);
				if (easterday == day && eastermonth == month) numevents++;
			} else {
				floater = floatingholiday(year,events[i][1],events[i][2],events[i][3]);
				if ((month == 5) && (events[i][1] == 5) && (events[i][2] == 4) && (events[i][3] == 2)) {
					if ((floater + 7 <= 31) && (day == floater + 7)) {
						numevents++;
					} else if ((floater + 7 > 31) && (day == floater)) numevents++;
				} else if ((events[i][1] == month) && (floater == day)) numevents++;
			}
		}
		else if ((events[i][2] == day) && (events[i][1] == month) && (events[i][3] == year)) {
			numevents++;
		}
	}

	if (numevents == 0) {
		return false;
	} else {
		return true;
	}
}




function showentry(day,month,year,week,dayofweek) {
//alert(day);

var IDS = "";
var SNM	=	"";

//alert(day);
//alert(month);alert(year);alert(week);alert(dayofweek);
var theevent = "";

var floater = 0;

//document.getElementById("add").style.display = 'block';
//document.getElementById("eventlist").style.display = 'block';

	for (var i = 0; i < events.length; i++) {
		// First we'll process recurring events (if any):
		if (events[i][0] != "") {
			if (events[i][0] == "D") {
			}
			if (events[i][0] == "W") {
			
				if ((events[i][2] == dayofweek)) {
				//theevent += "Events of: \n" + month +'/'+ day +'/'+ year + '\n';
				//theevent += events[i][6] + '\n';
				if(events[i][4]!='')
							{
				theevent += 'School: ' + events[i][4] + '<br>';
				//theevent += 'Description: ' + events[i][7] + '\n';
				/*theevent += 'Client Id: ' + events[i][5] + '\n';
				theevent += 'Description: ' + events[i][7] + '\n';*/
				theevent += '<br>';
				//theevent += '\n -------------- \n\n';
				}
				IDS += events[i][5]+',';
				SNM += events[i][4]+',';
				

				}
				
			}
			
			
			
			if (events[i][0] == "M") {
			}
			if (events[i][0] == year) {
				if ((events[i][2] == day) && (events[i][1] == month)) {
				//theevent += "Date: \n" + month +'/'+ day +'/'+ year + '\n';
				//theevent += events[i][6] + '\n';
				if(events[i][4]!='')
							{
				theevent += 'School: ' + events[i][4] + '<br>';
				//theevent += 'Description: ' + events[i][7] + '\n';
				/*theevent += 'Client Id: ' + events[i][5] + '\n';
				theevent += 'Description: ' + events[i][7] + '\n';*/
				theevent += '<br>';
				//theevent += '\n -------------- \n\n';
				}
				if(events[i][4]=='')
				{
				theevent += 'New Entry : ' + events[i][7] + '<br>';
				theevent += '<br>';
				}
				
				IDS += events[i][5]+',';
				SNM += events[i][4]+',';

				
				}
			}
			if (events[i][0] == "F") {
				if ((events[i][1] == 3) && (events[i][2] == 0) && (events[i][3] == 0) ) {
					if (easterday == day && eastermonth == month) {
						//theevent += "Date: \n" + month +'/'+ day +'/'+ year + '\n';
						//theevent += events[i][6] + '\n';
						if(events[i][4]!='')
							{
						theevent += 'School: ' + events[i][4] + '<br>';
						//theevent += 'Description: ' + events[i][7] + '\n';
						/*theevent += 'Client Id: ' + events[i][5] + '\n';
						theevent += 'Description: ' + events[i][7] + '\n';*/
						theevent += '<br>';
						}
						IDS += events[i][5]+',';
						SNM += events[i][4]+',';

					} 
				} else {
					floater = floatingholiday(year,events[i][1],events[i][2],events[i][3]);

					if ((month == 5) && (events[i][1] == 5) && (events[i][2] == 4) && (events[i][3] == 2)) {
						if ((floater + 7 <= 31) && (day == floater + 7)) {
							//theevent += "Date: \n" + month +'/'+ day +'/'+ year + '\n';
							//theevent += events[i][6] + '\n';
							if(events[i][4]!='')
							{
							theevent += 'School: ' + events[i][4] + '<br>';
							//theevent += 'Description: ' + events[i][7] + '\n';
							/*theevent += 'Client Id: ' + events[i][5] + '\n';
							theevent += 'Description: ' + events[i][7] + '\n';*/
							theevent += '<br>';
							}
							IDS += events[i][5]+',';
							SNM += events[i][4]+',';

						} else if ((floater + 7 > 31) && (day == floater)) {
							//theevent += "Date: \n" + month +'/'+ day +'/'+ year + '\n';
							//theevent += events[i][6] + '\n';
							if(events[i][4]!='')
							{
							theevent += 'School: ' + events[i][4] + '<br>';
						//	theevent += 'Description: ' + events[i][7] + '\n';
							/*theevent += 'Client Id: ' + events[i][5] + '\n';
							theevent += 'Description: ' + events[i][7] + '\n';*/
							theevent += '<br>';
							}
							
							IDS += events[i][5]+',';
							SNM += events[i][4]+',';

						}
					} else if ((events[i][1] == month) && (floater == day)) {
						//theevent += "Date: \n" + month +'/'+ day +'/'+ year + '\n';
						//theevent += events[i][6] + '\n';
						if(events[i][4]!='')
							{
						theevent += 'School: ' + events[i][4] + '<br>';
						//theevent += 'Description: ' + events[i][7] + '\n';
						/*theevent += 'Client Id: ' + events[i][5] + '\n';
						theevent += 'Description: ' + events[i][7] + '\n';*/
						theevent += '<br>';
						}
						IDS += events[i][5]+',';
						SNM += events[i][4]+',';

						
					}
				}
		}
		}
		// Now we'll process any One Time events happening on the matching month, day, year:
		else if ((events[i][2] == day) && (events[i][1] == month) && (events[i][3] == year)) {
			//theevent += "Date: \n" + month +'/'+ day +'/'+ year + '\n';
			//theevent += events[i][6] + '\n';
			if(events[i][4]!='')
							{
			theevent += 'School: ' + events[i][4] + '<br>';
			//theevent += 'Description: ' + events[i][7] + '\n';
			/*theevent += 'Client Id: ' + events[i][5] + '\n';
			theevent += 'Description: ' + events[i][7] + '\n';*/
			theevent += '<br>';
			}
			
			IDS += events[i][5]+',';
			SNM += events[i][4]+',';

		}
	}
	if (theevent != ""){ return theevent; }
	else{
	return "";
	}
}




function showevents(day,month,year,week,dayofweek) {
//alert(day);

var IDS = "";
var SNM	=	"";

//alert(day);
//alert(month);alert(year);alert(week);alert(dayofweek);
var theevent = "";

var floater = 0;

//document.getElementById("add").style.display = 'block';
//document.getElementById("eventlist").style.display = 'block';

	for (var i = 0; i < events.length; i++) {
		// First we'll process recurring events (if any):
		if (events[i][0] != "") {
			if (events[i][0] == "D") {
			}
			if (events[i][0] == "W") {
			
				if ((events[i][2] == dayofweek)) {
				theevent += "Events of: \n" + month +'/'+ day +'/'+ year + '\n';
				theevent += events[i][6] + '\n';
				theevent += 'School: ' + events[i][4] + '\n';
				theevent += 'New entry: ' + events[i][7] + '\n';
				/*theevent += 'Client Id: ' + events[i][5] + '\n';
				theevent += 'Description: ' + events[i][7] + '\n';*/
				theevent += '\n -------------- \n\n';
				IDS += events[i][5]+',';
				SNM += events[i][4]+',';
				
				document.forms.eventform.school.value = SNM;
				document.forms.eventform.list.value = IDS;
				document.forms.eventform.d.value = day;
				document.forms.eventform.m.value = month;
				document.forms.eventform.y.value = year;
				//document.forms.eventform.add.style.display = 'block';
				//document.forms.eventform.eventlist.style.display = 'block';
				document.forms.eventform.eventlist.value = theevent;
				}
				
			}
			if (events[i][0] == "M") {
			}
			if (events[i][0] == "Y") {
				if ((events[i][2] == day) && (events[i][1] == month)) {
				theevent += "Date: \n" + month +'/'+ day +'/'+ year + '\n';
				theevent += events[i][6] + '\n';
				theevent += 'School: ' + events[i][4] + '\n';
				theevent += 'Description: ' + events[i][7] + '\n';
				/*theevent += 'Client Id: ' + events[i][5] + '\n';
				theevent += 'Description: ' + events[i][7] + '\n';*/
				theevent += '\n -------------- \n\n';
				IDS += events[i][5]+',';
				SNM += events[i][4]+',';
				document.forms.eventform.list.value = IDS;
				document.forms.eventform.school.value = SNM;
				document.forms.eventform.d.value = day;
				document.forms.eventform.m.value = month;
				document.forms.eventform.y.value = year;
				//document.forms.eventform.add.style.display = 'block';
				//document.forms.eventform.eventlist.style.display = 'block';
				document.forms.eventform.eventlist.value = theevent;
				//document.getElementById(day).value=theevent;
				//alert(document.getElementById(day).value);
				
				}
			}
			if (events[i][0] == "F") {
				if ((events[i][1] == 3) && (events[i][2] == 0) && (events[i][3] == 0) ) {
					if (easterday == day && eastermonth == month) {
						theevent += "Date: \n" + month +'/'+ day +'/'+ year + '\n';
						theevent += events[i][6] + '\n';
						theevent += 'School: ' + events[i][4] + '\n';
						theevent += 'Description: ' + events[i][7] + '\n';
						/*theevent += 'Client Id: ' + events[i][5] + '\n';
						theevent += 'Description: ' + events[i][7] + '\n';*/
						theevent += '\n -------------- \n\n';
						IDS += events[i][5]+',';
						SNM += events[i][4]+',';
						document.forms.eventform.list.value = IDS;
						document.forms.eventform.school.value = SNM;
						document.forms.eventform.d.value = day;
						document.forms.eventform.m.value = month;
						document.forms.eventform.y.value = year;
						//document.forms.eventform.add.style.display = 'block';
						//document.forms.eventform.eventlist.style.display = 'block';
						document.forms.eventform.eventlist.value = theevent;
					} 
				} else {
					floater = floatingholiday(year,events[i][1],events[i][2],events[i][3]);

					if ((month == 5) && (events[i][1] == 5) && (events[i][2] == 4) && (events[i][3] == 2)) {
						if ((floater + 7 <= 31) && (day == floater + 7)) {
							theevent += "Date: \n" + month +'/'+ day +'/'+ year + '\n';
							theevent += events[i][6] + '\n';
							theevent += 'School: ' + events[i][4] + '\n';
							theevent += 'Description: ' + events[i][7] + '\n';
							/*theevent += 'Client Id: ' + events[i][5] + '\n';
							theevent += 'Description: ' + events[i][7] + '\n';*/
							theevent += '\n -------------- \n\n';
							IDS += events[i][5]+',';
							SNM += events[i][4]+',';
							document.forms.eventform.list.value = IDS;
							document.forms.eventform.school.value = SNM;
							document.forms.eventform.d.value = day;
							document.forms.eventform.m.value = month;
							document.forms.eventform.y.value = year;
							//document.forms.eventform.add.style.display = 'block';
							//document.forms.eventform.eventlist.style.display = 'block';
							document.forms.eventform.eventlist.value = theevent;
						} else if ((floater + 7 > 31) && (day == floater)) {
							theevent += "Date: \n" + month +'/'+ day +'/'+ year + '\n';
							theevent += events[i][6] + '\n';
							theevent += 'School: ' + events[i][4] + '\n';
							theevent += 'Description: ' + events[i][7] + '\n';
							/*theevent += 'Client Id: ' + events[i][5] + '\n';
							theevent += 'Description: ' + events[i][7] + '\n';*/
							theevent += '\n -------------- \n\n';
							
							IDS += events[i][5]+',';
							SNM += events[i][4]+',';
							document.forms.eventform.list.value = IDS;
							document.forms.eventform.school.value = SNM;
							document.forms.eventform.d.value = day;
							document.forms.eventform.m.value = month;
							document.forms.eventform.y.value = year;
							//document.forms.eventform.add.style.display = 'block';
							//document.forms.eventform.eventlist.style.display = 'block';
							document.forms.eventform.eventlist.value = theevent;
						}
					} else if ((events[i][1] == month) && (floater == day)) {
						theevent += "Date: \n" + month +'/'+ day +'/'+ year + '\n';
						theevent += events[i][6] + '\n';
						theevent += 'School: ' + events[i][4] + '\n';
						theevent += 'Description: ' + events[i][7] + '\n';
						/*theevent += 'Client Id: ' + events[i][5] + '\n';
						theevent += 'Description: ' + events[i][7] + '\n';*/
						theevent += '\n -------------- \n\n';
						IDS += events[i][5]+',';
						SNM += events[i][4]+',';
						document.forms.eventform.list.value = IDS;
						document.forms.eventform.school.value = SNM;
						document.forms.eventform.d.value = day;
						document.forms.eventform.m.value = month;
						document.forms.eventform.y.value = year;
						//document.forms.eventform.add.style.display = 'block';
						//document.forms.eventform.eventlist.style.display = 'block';
						//document.forms.eventform.eventlist.value = theevent;
						
					}
				}
		}
		}
		// Now we'll process any One Time events happening on the matching month, day, year:
		else if ((events[i][2] == day) && (events[i][1] == month) && (events[i][3] == year)) {
			theevent += "Date: \n" + month +'/'+ day +'/'+ year + '\n';
			theevent += events[i][6] + '\n';
			theevent += 'School: ' + events[i][4] + '\n';
			theevent += 'Description: ' + events[i][7] + '\n';
			/*theevent += 'Client Id: ' + events[i][5] + '\n';
			theevent += 'Description: ' + events[i][7] + '\n';*/
			theevent += '\n -------------- \n\n';
			
			IDS += events[i][5]+',';
			SNM += events[i][4]+',';
				document.forms.eventform.list.value = IDS;
				document.forms.eventform.school.value = SNM;
				document.forms.eventform.d.value = day;
				document.forms.eventform.m.value = month;
				document.forms.eventform.y.value = year;
				//document.forms.eventform.add.style.display = 'block';
				//document.forms.eventform.eventlist.style.display = 'block';
			document.forms.eventform.day.value = theevent;
		}
	}
	if (theevent == "") document.forms.eventform.eventlist.value = 'No list.';
}


function floatingholiday(targetyr,targetmo,cardinaloccurrence,targetday) {
// Floating holidays/events of the events.js file uses:
//	the Month field for the Month (here it becomes the targetmo field)
//	the Day field as the Cardinal Occurrence  (here it becomes the cardinaloccurrence field)
//		1=1st, 2=2nd, 3=3rd, 4=4th, 5=5th, 6=6th occurrence of the day listed next
//	the Year field as the Day of the week the event/holiday falls on  (here it becomes the targetday field)
//		1=Sunday, 2=Monday, 3=Tuesday, 4=Wednesday, 5=Thurday, 6=Friday, 7=Saturday
//	example: "F",	"1",	"3",	"2", = Floating holiday in January on the 3rd Monday of that month.
//
// In our code below:
// 	targetyr is the active year
// 	targetmo is the active month (1-12)
// 	cardinaloccurrence is the xth occurrence of the targetday (1-6)
// 	targetday is the day of the week the floating holiday is on
//		0=Sun; 1=Mon; 2=Tue; 3=Wed; 4=Thu; 5=Fri; 6=Sat
//		Note: subtract 1 from the targetday field if the info comes from the events.js file
//
// Note:
//	If Memorial Day falls on the 22nd, 23rd, or 24th, then we add 7 to the dayofmonth to the result.
//
// Example: targetyr = 2052; targetmo = 5; cardinaloccurrence = 4; targetday = 1
//	This is the same as saying our floating holiday in the year 2052, is during May, on the 4th Monday
//
var firstdate = new Date(String(targetmo)+"/1/"+String(targetyr));	// Object Storing the first day of the current month.
var firstday = firstdate.getUTCDay();	// The first day (0-6) of the target month.
var dayofmonth = 0;	// zero out our calendar day variable.

	targetday = targetday - 1;

	if (targetday >= firstday) {
		cardinaloccurrence--;	// Subtract 1 from cardinal day.
		dayofmonth = (cardinaloccurrence * 7) + ((targetday - firstday)+1);
	} else {
		dayofmonth = (cardinaloccurrence * 7) + ((targetday - firstday)+1);
	}
return dayofmonth;
}

</script>

<script language="javascript">
function openWin(URL){
//alert(URL);

aWindow=window.open(URL,"theWindow","height=400,width=600,left=200,top=100,scrollbars=no");}
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fusion Books</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/cal2.js"></script>
<script language="javascript" src="js/cal_conf2.js"></script>



</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
 <?php include_once 'templates/header.tpl.php'; ?>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="210" valign="top">
				 <?php include_once 'templates/left_side.tpl.php'; ?>
				</td>
                <td valign="top"><table width="767" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#0d76aa">
                          <tr>
                            <td width="4"><img src="images/head_curve_left.gif" alt="" width="4" height="33" /></td>
                            <td class="head">Calender </td>
                            <td width="4"><img src="images/head_curve_right.gif" alt="" width="4" height="33" /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="385" valign="top" class="border"><table width="725" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
						 
                          <tr>
                            <td >
							
						<body style="background-color: transparent;" onLoad="changedate('return')">

<p align="center"><!--Calendar--> </p>

<center>	
							
                                <table id="evtcal" border="0" cellpadding="0" cellspacing="0" width="584">
<? //include_once 'templates/header.tpl.php';?>

	<tbody>
		<tr>
			<td width="314" height="30" align="center" valign="top" bgcolor="#aaddff" style="padding: 3px;">
				<div id="calendar"><!--  Dynamically Filled --></div>
				<!--You can move to a different month or year by clicking on the buttons or return to today's date by clicking "Show Current Date".--></td>
			<td width="10">&nbsp;</td>
			<td style="padding: 3px;" align="center" bgcolor="" valign="top" width="260">
				<center></b>
				
				</center>			</td>
		</tr>
	</tbody>
</table>
</center>

<br />		                      </td>
                          </tr>
                          <tr>
                            <td></td>
                          </tr>
                          <tr>
                            <td class="tbtext"><br />
                           <!-- Click a highlighted date on the calendar to see a list of events on that day in the box below.--><br /><br /></td>
                          </tr>
						  
					
						  
						  
                        
                          <tr>
                            <td><form id="eventform" name="eventform" action="addentry.php" method="get"> 	
						<table width="200" border="0">
  <tr>
    <td>&nbsp;</td>
    <td><textarea name="eventlist" id="eventlist" cols="75" rows="11" wrap="soft" style="display:none"></textarea>
	<input type="hidden" name="list" id="list" value="" />
	<input type="hidden" name="school" id="school" />
	
	<input type="hidden" name="d" id="d" />
	<input type="hidden" name="m" id="m" />
	<input type="hidden" name="y" id="y" />
	</td>
	

  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="image" name="add" id="add" value="Add" src="images/add.gif"  style="display:none" /></td>
  </tr>
</table>
  </form></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="4"><img src="images/curve_bottom_left.gif" width="4" height="4" /></td>
                            <td background="images/bottom_pic.gif"><img src="images/bottom_pic.gif" alt="" width="1" height="4" /></td>
                            <td width="4"><img src="images/curve_bottom_right.gif" alt="" width="4" height="4" /></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        
        <tr>
          <td height="8"></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="40" background="images/footer_bg.gif" align="center"><? include('footer.php')?></td>
  </tr>
</table>
</body>
</html>
