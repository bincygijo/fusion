<?php

/*
   This file has the functions for the main displays of the calendar
*/

if ( !defined('IN_PHPC') ) {
       die("Hacking attempt");
}

// picks which view to show based on what data is given
// returns the appropriate view
function display()
{
	global $vars, $day, $month, $year;

	if(isset($vars['id'])) return display_id($vars['id']);
	if(isset($vars['day'])) return display_day($day, $month, $year);
	if(isset($vars['month'])) return display_month($month, $year);
	if(isset($vars['year'])) soft_error('year view not yet implemented');
	return display_month($month, $year);
}

// creates a menu to navigate the month/year
// returns XHTML data for the menu
function month_navbar($month, $year)
{
	$html = tag('div', attributes('class="phpc-navbar"'));
	menu_item_append($html, _('last year'), 'display', $year - 1, $month);
	menu_item_append($html, _('last month'), 'display', $year, $month - 1);

	for($i = 1; $i <= 12; $i++) {
		menu_item_append($html, short_month_name($i), 'display', $year,
				$i);
	}
	menu_item_append($html,  _('next month'), 'display', $year, $month + 1);
	menu_item_append($html,  _('next year'), 'display', $year + 1, $month);

	return $html;
}

// creates a tables of the days in the month
// returns XHTML data for the month
function display_month($month, $year)
{
	global $config;

	$days = tag('tr');
	for($i = 0; $i < 7; $i++) {
		if($config['start_monday'])
			$d = $i + 1 % 7;
		else
			$d = $i;
		$days->add(tag('th', day_name($d)));
	}

	return tag('div',
                        month_navbar($month, $year),
                        tag('table', attributes('class="phpc-main"',
                                        'id="calendar"'),
                                tag('caption', month_name($month)." $year"),
                                tag('colgroup', attributes('span="7"', 'width="1*"')),
                                tag('thead', $days),
                                create_month($month, $year)));
}

// creates a display for a particular month
// return XHTML data for the month
function create_month($month, $year)
{
	return tag('tbody', create_weeks(1, $month, $year));
}

// creates a display for a particular week and the rest of the weeks until the
// end of the month
// returns XHTML data for the weeks
function create_weeks($week_of_month, $month, $year)
{
	if($week_of_month > weeks_in_month($month, $year)) return array();

        $html_week = tag('tr', display_days(1, $week_of_month, $month, $year));

        return array_merge(array($html_week), create_weeks($week_of_month + 1,
                                $month, $year));
}

// displays the day of the week and the following days of the week
// return XHTML data for the days
function display_days($day_of_week, $week_of_month, $month, $year)
{
	global $db, $phpc_script, $config;

	if($day_of_week > 7) return array();

	if($config['start_monday'])
		$dow = $day_of_week + 1 % 7;
	else
		$dow = $day_of_week;

	$day_of_month = ($week_of_month - 1) * 7 + $dow
		- day_of_first($month, $year);

	if($day_of_month <= 0 || $day_of_month > days_in_month($month, $year)) {
		$html_day = tag('td', attributes('class="none"'));
	} else {
		
		$tomrw2   		=	mktime(0, 0, 0, date("m"), date("d")+2, date("Y"));
		$currentday 	= 	date('j', $tomrw2);
		$currentmonth 	= 	date('n');
		$currentyear 	= 	date('Y');

		// set whether the date is in the past or future/present
		$nowdate	=	$year."-".$month."-".$day_of_month;
		
		$days1= jddayofweek ( cal_to_jd(CAL_GREGORIAN, $month,$day_of_month, $year) , 1 );

		if(($days1=="Sunday")||($currentyear > $year || $currentyear == $year && ($currentmonth > $month || $currentmonth == $month && $currentday > $day_of_month))){
			 $html_day = tag('td', attributes('valign="top"', 'height="100"', 
                                                "class=\"xt\""),
												 create_date_link('Add Events', 'event_form',
                                                $year, $month, $day_of_month, array('class="phpc-add"')),
                                        create_date_link($day_of_month, 'display', $year, $month, $day_of_month, array('class="date"')));
		}else{
        	if($days1<>"Sunday"){
			 $chkSDate	=	mysql_query("SELECT 1 FROM phpc_events WHERE startdate = '$nowdate' OR enddate = '$nowdate'");
			 $couStart	=	mysql_num_rows($chkSDate);
		       	if($couStart <= 3){
				 $html_day = tag('td', attributes('valign="top"', 'height="100"', 
                                                "class=\"xt\""),
                                        create_date_link('Add Events', 'event_form',
                                                $year, $month, $day_of_month, array('class="phpc-add"')),
                                        create_date_link($day_of_month, 'display', $year, $month,
                                                $day_of_month,
                                                array('class="date"')));
												} else {
		       	 $html_day = tag('td', attributes('valign="top"', 'height="100"', 
                                                "class=\"xt\""),
                                        create_date_link($day_of_month,
                                                'display', $year, $month,
                                                $day_of_month,
                                                array('class="date"')));
												
                }
												
                } else {
		       	 $html_day = tag('td', attributes('valign="top"', 'height="100"', 
                                                "class=\"xt\""),
                                        create_date_link($day_of_month,
                                                'display', $year, $month,
                                                $day_of_month,
                                                array('class="date"')));
												
                }
		}	

		$result = get_events_by_date($day_of_month, $month, $year);

		/* Start off knowing we don't need to close the event
		 *  list.  loop through each event for the day
		 */
        $have_events = false;
		$html_events = tag('ul');
		while($row = $result->FetchRow($result)) {
		
				if($currentyear > $year || $currentyear == $year && ($currentmonth > $month || $currentmonth == $month && $currentday > $day_of_month)||$days1=="Sunday"){
			$current_era = 'past1';
		} else {
			$chkSDate	=	mysql_query("SELECT 1 FROM phpc_events WHERE startdate = '$nowdate' OR enddate = '$nowdate'");
			$couStart	=	mysql_num_rows($chkSDate);
			if($couStart >= 1){
				$current_era = 'future1';
			}else{
				$current_era = 'normal1';
			}
		} 
			$subject = htmlspecialchars(strip_tags(stripslashes(
							$row['subject'])));

			$event_time = formatted_time_string(
					$row['starttime'],
					$row['eventtype']);
		 $evet=explode(" ", $row['starttime']);
		//print_r($evet);
		
		$vvv=$evet[1];
			$event1[$vvv] = tag('li',
                                        tag('a',
                                                attributes("class=\"$current_era\"",
                                                        "href=\"$phpc_script"
                                                        ."?action=display&amp;"
                                                        ."id=$row[id]\""),
                                                /*($event_time ? "$event_time - "
                                                 : '')*/
                                               // .
												 $subject));
                      
		}
		$arraynew=array("10:00:00","12:00:00","14:00:00","16:00:00");
		//print_r($arraynew);
		foreach ($arraynew as $value )
		{
		if($currentyear > $year || $currentyear == $year && ($currentmonth > $month || $currentmonth == $month && $currentday > $day_of_month)||$days1=="Sunday"){
			$current_era = 'past1';
		} else {
			$chkSDate	=	mysql_query("SELECT 1 FROM phpc_events WHERE startdate = '$nowdate' OR enddate = '$nowdate'");
			$couStart	=	mysql_num_rows($chkSDate);
			if($couStart >= 1){
				$current_era = 'normal1';
			}else{
				$current_era = 'normal1';
			}
		} 
		if($event1[$value]<>'')
		{
		
		  $html_events->add($event1[$value]);
                        $have_events = true;
		}
		else
		{
	 	$value  = formatted_time_string(
					$value ,
					"");
		$event=tag('li',
                                        tag('a',
                                                attributes("class=\"$current_era\"",
                                                        ""),
                                                ($value ? "$value - "
                                                 : '')
                                                . ""));
												
		// $html_events->add($event);
                      //  $have_events = true;
		} 
		
		}
		
		 $html_day->add($html_events);
	}

	return array_merge(array($html_day), display_days($day_of_week + 1,
				$week_of_month, $month, $year));
}

// returns a string representation of $duration for $typeofevent
function get_duration($duration, $typeofevent)
{
	$dur_mins = $duration % 60;
	$dur_hrs  = floor($duration / 60);

	$dur_str = '';

	if($typeofevent == 2) $dur_str = _("FULL DAY");
	else {
		$comma = 0;
		if(!empty($dur_hrs)) {
			$comma = 1;
			$dur_str .= "$dur_hrs "._('hour(s)');
		}
		if($dur_mins) {
			if($comma) $dur_str .= ', ';
			$dur_str .= "$dur_mins "._('minutes');
		}
	}

	if(empty($dur_str)) $dur_str = _('No duration');

	return $dur_str;
}

// displays a single day in a verbose way to be shown singly
// returns the XHTML data for the day
function display_day($day, $month, $year)
{
	global $db, $config, $phpc_script;

	$tablename = date('Fy', mktime(0, 0, 0, $month, 1, $year));
	$monthname = month_name($month);

	$privileged = check_user() || $config['anon_permission'] >= 2;

	$result = get_events_by_date($day, $month, $year);

	$today_epoch = mktime(0, 0, 0, $month, $day, $year);

	if($row = $result->FetchRow()) {

		$html_table = tag('table', attributes('class="phpc-main"'),
				tag('caption', "$day $monthname $year"),
				tag('thead',
					tag('tr',
						tag('th', _('Title')),
						tag('th', _('Time')),
						tag('th', _('Duration')),
						tag('th', _('Description'))
					     )));
		if($privileged) {
			$html_table->add(tag('tfoot',
                                                tag('tr',
                                                        tag('td',
                                                                attributes('colspan="4"'),
                                                                create_hidden('action', 'event_delete'),
                                                                create_hidden('day', $day),
                                                                create_hidden('month', $month),
                                                                create_hidden('year', $year),
                                                                create_submit(_('Delete Selected'))))));
                }

		$html_body = tag('tbody');

		for(; $row; $row = $result->FetchRow()) {
			$subject = htmlspecialchars(strip_tags(stripslashes(
							$row['subject'])));
			if(empty($subject)) $subject = _('(No subject)');
			$desc = parse_desc($row['description']);
			$time_str = formatted_time_string($row['starttime'],
					$row['eventtype']);
			$dur_str = get_duration($row['duration'],
					$row['eventtype']);

			$html_subject = tag('td',
                                        attributes('class="phpc-list"'));

			if($privileged) {
                                $html_subject->add(create_checkbox('id',
                                                        $row['id']));
                        }

			$html_subject->add(create_id_link(tag('strong',
                                                        $subject),
                                                'display', $row['id']));

			if($privileged) {
				$html_subject->add(' (');
				$html_subject->add(create_id_link(_('Modify'),
                                                'event_form', $row['id']));
				$html_subject->add(')');
			}

			$html_body->add(tag('tr',
                                        $html_subject,
                                        tag('td',
                                                attributes('class="phpc-list"'),
                                                $time_str),
                                        tag('td',
                                                attributes('class="phpc-list"'),
                                                $dur_str),
                                        tag('td',
                                                attributes('class="phpc-list"'),
                                                $desc)));
		}

		$html_table->add($html_body);

		if($privileged) $output = tag('form',
			attributes("action=\"$phpc_script\""),
                        $html_table);
		else $output = $html_table;

	} else {
		$output = tag('h2', _('No events on this day.'));
	}

	return $output;
}

// displays a particular event to be show singly
// returns XHTML data for the event
function display_id($id)
{
	global $db, $year, $month, $day, $config;

	$row = get_event_by_id($id);

	$year = $row['year'];
	$month = $row['month'];
	$day = $row['day'];

	$time_str = formatted_time_string($row['starttime'], $row['eventtype']);
	$date_str = formatted_date_string($row['year'], $row['month'],
			$row['day'], $row['end_year'], $row['end_month'],
			$row['end_day']);
	$dur_str = get_duration($row['duration'], $row['eventtype']);
	$subject = htmlspecialchars(strip_tags(stripslashes($row['subject'])));
	if(empty($subject)) $subject = _('(No subject)');
	$name = stripslashes($row['username']);
	$desc = parse_desc($row['description']);

        if(check_user() || $config['anon_permission'] >= 2) {
                return tag('div', attributes('class="phpc-main"'),
                                tag('h2', $subject),
                                tag('div', 'by ', tag('cite', $name)),
                                tag('div', create_id_link(_('Modify'), 'event_form',
                                                $id), "\n", create_id_link(_('Delete'),
                                                        'event_delete', $id)),
                                tag('div',
					tag('div', _('Date').": $date_str"),
					tag('div', _('Time').": $time_str"),
                                        tag('div', _('Duration').": $dur_str")),
                                tag('p', $desc));
        } else {
                return tag('div', attributes('class="phpc-main"'),
                                tag('h2', $subject),
                                tag('div', 'by ', tag('cite', $name)),
                                tag('div',
					tag('div', _('Date').": $date_str"),
					tag('div', _('Time').": $time_str"),
                                        tag('div', _('Duration').": $dur_str")),
                                tag('p', $desc));
        }
}

?>
<style>
.future1
{
background-color:#FFFF99;
}
.normal1
{
background-color:#FFFFFF;
}
.past1
{
background-color:#CCFFCC;
}

.xt
{
background-color:#FFFFFF;
}
</style>