<?php
//the hooks file for the StopForumSpam extension
$hooks = array();
$hooks['review_registration'] = array( 
	function($args) {
		global $errors;
		$info = file_get_contents('http://stopforumspam.com/api?ip=' . $_SERVER['REMOTE_ADDR'] . '&email=' . rawurlencode($args['email']));
		preg_match_all('%<frequency>(\d+)</frequency>%', $info, $matches);
		$score = 0;
		foreach ($matches[1] as $val) {
			$score += $val;
		}
		if ($score > 5) {
			$errors[] = translate('sfs_failmsg');
			return false;
		}
	}
);
