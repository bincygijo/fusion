<?php

/*
   modify $calendar_name when you create another calendar so that the calendars
   will not all share the same data
*/
$calendar_name = '0';
/*
   $phpc_root_path gives the location of the base calendar install.
   if you move this file to a new location, modify $phpc_root_path to point
   to the location where the support files for the callendar are located.
*/
$phpc_root_path = './';
/*
   You can modify the following defines to change the color scheme of the
   calendar
*/
define('SEPCOLOR',     '#000000');
define('BG_COLOR1',    '#FFFFFF');
define('BG_COLOR2',    'gray');
define('BG_COLOR3',    'silver');
define('BG_COLOR4',    '#CCCCCC');
define('BG_PAST',      'silver');
define('BG_FUTURE',    'white');
define('TEXTCOLOR1',   '#000000');
define('TEXTCOLOR2',   '#FFFFFF');

define('IN_PHPC', true);

if(!empty($_GET['action']) && $_GET['action'] == 'style') {
	require_once($phpc_root_path . 'includes/style.php');
	exit;
}

require_once($phpc_root_path . 'includes/calendar.php');
require_once($phpc_root_path . 'includes/setup.php');
require_once($phpc_root_path . 'includes/globals.php');

$legal_actions = array('event_form', 'event_delete', 'display', 'event_submit',
		'search', 'login', 'logout', 'admin', 'options_submit',
                'new_user_submit');

if(!in_array($action, $legal_actions, true)){
	soft_error(_('Invalid action'));
}

require_once($phpc_root_path . "includes/$action.php");

eval("\$output = $action();");

echo create_xhtml($output);

?>