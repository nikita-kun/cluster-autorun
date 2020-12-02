#!/usr/bin/php
<?php


passthru("sudo ./dependencies.php");
passthru("sudo ./firewall.php");
passthru('./repo.php');

while(1){
	echo("Type 'run' to start\n");
	$input = readline();
	if ($input == "run"){
		break;
	}
}

echo "Detach when running";
passthru('screen -L -Logfile ./repo/output.log ./repo/autorun*');

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

