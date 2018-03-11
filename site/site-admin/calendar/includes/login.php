<?php 

if(!defined('IN_PHPC')) {
       die("Hacking attempt");
}

function login()
{
	global $vars, $day, $month, $year, $phpc_script;

	$html = tag('div');

	//Check password and username
	if(isset($vars['username'])){
		$user = $vars['username'];
		$password = $vars['password'];

		if(verify_user($user, $password)){
                        $_SESSION['user'] = $user;
                        session_write_close();

                        $string = "$phpc_script?";
                        $arguments = array();
                        if(!empty($vars['lastaction']))
                                $arguments[] = "action=$vars[lastaction]";
                        if(!empty($vars['year']))
                                $arguments[] = "year=$year";
                        if(!empty($vars['month']))
                                $arguments[] = "month=$month";
                        if(!empty($vars['day']))
                                $arguments[] = "day=$day";
                        redirect($string . implode('&', $arguments));
			return tag('h2', _('Logged in.'));
		}

		$html->add(tag('h2', _('Sorry, Invalid Login')));

	}

	$html->add(login_form());
	return $html;
}


function login_form()
{
        global $vars, $phpc_script, $day, $year, $month;

        $lastaction = empty($vars['lastaction']) ? '' : $vars['lastaction'];

        $submit_data = tag('td', attributes('colspan="2"'),
                                create_hidden('action', 'login'),
                                create_submit(_('Submit')));

        if(!empty($vars['lastaction']))
                $submit_data->prepend(create_hidden('lastaction',
                                        $vars['lastaction']));

        if(!empty($vars['day']))
                $submit_data->prepend(create_hidden('day', $day));

        if(!empty($vars['month']))
                $submit_data->prepend(create_hidden('month', $month));

        if(!empty($vars['year']))
                $submit_data->prepend(create_hidden('year', $year));

	return tag('form', attributes("action=\"$phpc_script\"",
				'method="post"'),
		tag('table', attributes('class="phpc-main"'),
			tag('caption', _('Log in')),
                        tag('thead',
                                tag('tr',
                                        tag('th', attributes('colspan="2"'),
                                                _('You must have cookies enabled to login.')))),
			tag('tfoot',
				tag('tr', $submit_data)),
			tag('tbody',
				tag('tr',
					tag('th', _('Username').':'),
					tag('td', create_text('username'))),
				tag('tr',
					tag('th', _('Password').':'),
					tag('td', create_password('password'))))));
}

?>
