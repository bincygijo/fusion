<?php

/*  ====================================================================
 *  Copyright (c) 2005 Astonish Inc.
 *  www.blazonry.com/scripting/datemenu_php.php
 *  All rights reserved.
 *
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 *  Redistribution and use in source and binary forms, with or without
 *  modification, are permitted provided that the following conditions
 *  are met:
 *
 *  1. Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *  2. The name of the author may not be used to endorse or promote products
 *     derived from this software without specific prior written permission.
 *
 *  THIS SOFTWARE IS PROVIDED BY THE AUTHOR ``AS IS'' AND ANY EXPRESS OR
 *  IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES
 *  OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.
 *  IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY DIRECT, INDIRECT,
 *  INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT
 *  NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 *  DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 *  THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 *  (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF
 *  THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *  ====================================================================
 */


    $m = (!$m) ? date("m",mktime()) : "$m";
    $y = (!$y) ? date("Y",mktime()) : "$y";

	if ($_SERVER['REQUEST_METHOD'] == "POST") 
	{
		$eventdate = $_POST['eventdate']; 
		$event = $_POST['event']; 
		echo "<br />";

		echo "<h2>PHP Event Calendar</h2>";
		echo "This is a demo. We are not saving the event to the calendar, but you could.<br /><br />";
        echo "We are demo-ing building the calendar, and interacting with it.<br /><br />";
        echo "<b>Event:</b> $event<br />";
        echo "<b>Date:</b> $eventdate<br />";
        exit();
	}
	
?>
<html>
<head>
<title>PHP Event Calendar</title>
</head>
<body bgcolor="#FFFFFF" link="#0000CC" vlink="#0000CC">

<h2>PHP Event Calendar</h2>

<blockquote>
<table>
<tr>
<td valign="top"><?php mk_drawCalendar($_GET['m'],$_GET['y']); ?></td>
<td width="25" nowrap><br /></td>

	<form name="f" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#000000"><tr><td>
    <table cellpadding="4" cellspacing="1" border="0 "bgcolor="#FFFFFF">
    <tr><td colspan="2" bgcolor="#000000"><font size="+1" color="#FFFFFF"><b>Add New Event</b></font></td></tr>
	<tr><td><b>Event Date: </b></td><td><input type="text" name="eventdate" value="" size="12"> <font size="2">mm/dd/yyyy</font></td></tr>	
	<tr><td><b>Event:</b></td><td><input type="text" name="event" size="35" maxlength="128"></td></tr>
	<tr><td colspan="2" align="center" bgcolor="#CCCCCC"><input type="submit" value="Add Event"></td></tr>
	</table></td></tr></table></form>

</td>
</tr></table>
</blockquote>
</body>
</html>


<?php

//*********************************************************
// DRAW CALENDAR
//*********************************************************
/*
    Draws out a calendar (in html) of the month/year
    passed to it date passed in format mm-dd-yyyy 
*/
function mk_drawCalendar($m,$y)
{
    if ((!$m) || (!$y))
    { 
        $m = date("m",mktime());
        $y = date("Y",mktime());
    }

    /*== get what weekday the first is on ==*/
    $tmpd = getdate(mktime(0,0,0,$m,1,$y));
    $month = $tmpd["month"]; 
    $firstwday= $tmpd["wday"];

    $lastday = mk_getLastDayofMonth($m,$y);

?>
<table cellpadding="2" cellspacing="0" border="1">
<tr><td colspan="7" bgcolor="#CCCCDD">
    <table cellpadding="0" cellspacing="0" border="0" width="100%">
    <tr><th width="20"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?m=<?=(($m-1)<1) ? 12 : $m-1 ?>&y=<?=(($m-1)<1) ? $y-1 : $y ?>">&lt;&lt;</a></th>
    <th><font size=2><?="$month $y"?></font></th>
    <th width="20"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?m=<?=(($m+1)>12) ? 1 : $m+1 ?>&y=<?=(($m+1)>12) ? $y+1 : $y ?>">&gt;&gt;</a></th>
    </tr></table>
</td></tr>

<tr><th width=22 class="tcell">Su</th><th width=22 class="tcell">M</th>
    <th width=22 class="tcell">T </th><th width=22 class="tcell">W</th>
    <th width=22 class="tcell">Th</th><th width=22 class="tcell">F</th>
    <th width=22 class="tcell">Sa</th></tr>

<?php $d = 1;
    $wday = $firstwday;
    $firstweek = true;

    /*== loop through all the days of the month ==*/
    while ( $d <= $lastday) 
    {

        /*== set up blank days for first week ==*/
        if ($firstweek) {
            echo "<tr>";
            for ($i=1; $i<=$firstwday; $i++) 
            { echo "<td><font size=2>&nbsp;</font></td>"; }
            $firstweek = false;
        }

        /*== Sunday start week with <tr> ==*/
        if ($wday==0) { echo "<tr>"; }

        /*== check for event ==*/  
        echo "<td class='tcell'>";
        echo "<a href=\"#\" onClick=\"document.f.eventdate.value='$m-$d-$y';\">$d</a>";
        echo "</td>\n";

        /*== Saturday end week with </tr> ==*/
        if ($wday==6) { echo "</tr>\n"; }

        $wday++;
        $wday = $wday % 7;
        $d++;
    }
?>

</tr></table>
Click on a date to select it and to populate the event date field on the left
<br />

<?php
/*== end drawCalendar function ==*/
} 




/*== get the last day of the month ==*/
function mk_getLastDayofMonth($mon,$year)
{
    for ($tday=28; $tday <= 31; $tday++) 
    {
        $tdate = getdate(mktime(0,0,0,$mon,$tday,$year));
        if ($tdate["mon"] != $mon) 
        { break; }

    }
    $tday--;

    return $tday;
}

?>
