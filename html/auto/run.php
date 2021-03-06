<?php
require("init.php");

// common vars
$yr 	= date("Y");
$mth 	= date("m");
$day 	= date("d");
$dayID 	= date("w");
$hr 	= date("H");
$min 	= date("i");
$sec 	= date("s");

// check if it's time to go to the update api
$update_check_min = $Common->get_pref('update_next_check');
if($min == $update_check_min){
	// call the api and check for any updates
	include("update-get-count.php");
	// set a random minute number for the next check
	$Common->set_pref('update_next_check', rand(1,59));
}


/*- check the ast-manager script is running -*/
$running = false;
$ps = exec("ps axw | /bin/egrep ami-scripts/event-handler.php", $o, $r);
$j = count($o);
for($i=0;$i<$j;$i++) { 
	if(strpos($o[$i], "egrep") !== false){
		continue;
	}
	if(strpos($o[$i], "ami-scripts/event-handler.php") !== false){
		$running = true;
	}
}
if(!$running){
	exec("/usr/bin/php /var/lib/asterisk/agi-bin/ami-scripts/event-handler.php >/dev/null &");
}
/*- -*/

/*- check the asterisk logging daemon is running -*/
$running = false;
$ps = exec("ps axw | /bin/egrep daemons/asterisk-messages-logging.php", $o, $r);
$j = count($o);
for($i=0;$i<$j;$i++) { 
	if(strpos($o[$i], "egrep") !== false){
		continue;
	}
	if(strpos($o[$i], "daemons/asterisk-messages-logging.php") !== false){
		$running = true;
	}
}
if(!$running){
	exec("/usr/bin/php /var/www/html/daemons/asterisk-messages-logging.php >/dev/null &");
}
/*-  -*/

/*- checking external ip on natted boxes -*/
exec("/usr/bin/php ".__DIR__."/check-natted-external-ip.php > /dev/null &");
/*- -*/

?>