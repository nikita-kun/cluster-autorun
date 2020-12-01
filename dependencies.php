#!/usr/bin/php
<?php

/* Config dependencies */
$apt = array("install" => ["python3", "python3-pip", 'screen'],
	"remove" => ["apport", "network-manager-config-connectivity-ubuntu"]);


echo("Downloading dependencies\n");
foreach ($apt as $command => $values){
	system("apt --yes $command ".implode($values, " "));
}
