<?php
if ( !defined('IN_PHPC') ) {
       die("Hacking attempt");
}

function event_submit()
{
	global $calendar_name, $day, $month, $year, $db, $vars, $config, 
	       $phpc_script;

        /* Validate input */
	if(isset($vars['id'])) {
		$id = $vars['id'];
		$modify = 1;
	} else {
		$modify = 0;
	}
	
	if(isset($vars['email'])) {
		$email = $vars['email'];
	} else {
		$email = '';
	}

	if(isset($vars['description'])) {
		$description = $vars['description'];
	} else {
		$description = '';
	}

	if(isset($vars['subject'])) {
		$subject = $vars['subject'];
	} else {
		$subject = '';
	}

	if(empty($vars['day'])) soft_error(_('No day was given.'));

	if(empty($vars['month'])) soft_error(_('No month was given.'));

	if(empty($vars['year'])) soft_error(_('No year was given'));

	if(isset($vars['hour'])) {
                $hour = $vars['hour'];
	} else {
             //   soft_error(_('No hour was given.'));
        }

        if(!$config['hours_24'])
        {
                if (array_key_exists('pm', $vars) && $vars['pm']) {
                        if ($hour < 12) {
                                $hour += 12;
                        }
                } 
        }

        if(array_key_exists('minute', $vars)) {
                $minute = $vars['minute'];
        } else {
               // soft_error(_('No minute was given.'));
        }

	if(isset($vars['durationmin']))
		$duration_min = $vars['durationmin'];
	else //soft_error(_('No duration minute was given.'));

	if(isset($vars['durationhour']))
		$duration_hour = $vars['durationhour'];
	else //soft_error(_('No duration hour was given.'));

	if(isset($vars['typeofevent']))
		$typeofevent = $vars['typeofevent'];
	else// soft_error(_('No type of event was given.'));

	if(isset($vars['endday']))
		$end_day = $vars['endday'];
	else //soft_error(_('No end day was given'));

	if(isset($vars['endmonth']))
		$end_month = $vars['endmonth'];
	else// soft_error(_('No end month was given'));

	if(isset($vars['endyear']))
		$end_year = $vars['endyear'];
	else //soft_error(_('No end year was given'));

	if(strlen($subject) > $config['subject_max']){
		soft_error(_('Your subject was too long').". $config[subject_max] "._('characters max').".");
	}

	$uid 		= 	get_uid($_SESSION['user']);
	$startstamp = 	mktime($hour, $minute, 0, $month, $day, $year);
	$endstamp 	= 	mktime(0, 0, 0, $end_month, $end_day, $end_year);
    if($endstamp < mktime(0, 0, 0, $month, $day, $year)){
		//soft_error(_('The start of the event cannot be after the end of the event.'));
	}
	$startdate 	= 	$db->DBDate($startstamp);
	 $starttime 	= 	$db->DBDate(date("Y-m-d", $startstamp)); 
	$enddate 	=	$db->DBDate($endstamp);
	$duration 	= 	$duration_hour * 60 + $duration_min;
	$table 		= 	SQL_PREFIX . 'events';
	
	///////////////////////////////////////////		Add After 2 days
	$tomrw   	=	mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));
	$tomrw2   	=	mktime(0, 0, 0, date("m"), date("d")+2, date("Y"));
	$tomorrow  	=	date("Y-m-d", $tomrw);
	$tomorrow2  =	date("Y-m-d", $tomrw2);
	$today 		=	date("Y-m-d");
	
	$sdate		=	str_replace("'", "", $startdate);
	$edate		=	str_replace("'", "", $enddate);
	

	///////////////////////////////////////////// Checking three events
	/*if($modify){
		$datesql	=	" AND id != '$id'";
	}else{
		$datesql	=	"";
	}*/
	//////////////////////////// Checking Start Date	
	/*$chkSDate	=	mysql_query("SELECT 1 FROM phpc_events WHERE startdate = $startdate AND starttime = $starttime $datesql");
	$couStart	=	mysql_num_rows($chkSDate);
	
	if(($couStart <= 0)){
		if($modify){
			if(!check_user() && $config['anon_permission'] < 2) {
				soft_error(_('You do not have permission to modify events.'));
			}
			$query = "UPDATE $table\n"
				."SET startdate=$startdate,\n"
				."enddate=$enddate,\n"
				."starttime=$starttime,\n"
				."duration='$duration',\n"
				."subject='$subject',\n"
				."description='$description',\n"
				."eventtype='$typeofevent',\n"
				."email='$email'\n"
				."WHERE id='$id'";
		}else{*/
			
			$id 	= 	$db->GenID(SQL_PREFIX . 'sequence');
		 	$query 	= 	"INSERT INTO $table\n"
				."(id, uid, startdate, enddate, starttime, duration,"
				." subject, description, eventtype, calendar, email)\n"
				."VALUES ($id, '$uid', $startdate, $enddate,"
				."$starttime, '$duration', '$subject',"
				."'$description', '$typeofevent', '$calendar_name', '$email')";
		//}
	//}
	
	/*else
	{
		soft_error(_('This time slot is already booked.'));
		
	}	*/

	$result = $db->Execute($query);
	//echo $result;

	if(!$result){
		db_error(_('Error processing event'), $query);
	}

	$affected = $db->Affected_Rows($result);
	if($affected < 1) return tag('div', _('No changes were made.'));

        session_write_close();

	redirect("$phpc_script?action=display&id=$id");
	return tag('div', attributes('class="box"'), _('Date updated').": $affected");
}

?>