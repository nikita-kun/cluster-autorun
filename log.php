#!/usr/bin/php
<?php

while(1){
	sleep(60);
	system("cd repo; git add *.log");
	system("cd repo; git commit -m 'automatic update'");
	system("cd repo; git push");
	sleep(10000);
}


