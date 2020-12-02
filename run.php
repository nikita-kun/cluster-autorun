#!/usr/bin/php
<?php


passthru("sudo ./dependencies.php");
passthru("sudo ./firewall.php");
passthru('./repo.php');

while(1){
	echo("Launch the job and type 'run' to start logging\n");
	$input = readline();
	if ($input == "run"){
		break;
	}
}

passthru('screen -L -Logfile ./repo/output.log echo Start and detach');

echo "Starting logging";
system('screen -d -m -L -Logfile ./git.log ./log.php');

while(1){
	echo("Type 'lock' to lock\n");
	$input = readline();
	if ($input == "lock"){
		break;
	}
}

system("sudo ./lock.php");

while(1){
	echo("*"); 
	sleep(1);
}

