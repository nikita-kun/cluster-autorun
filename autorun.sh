#!/bin/sh
sudo sed -i "s/# deb/deb/" /etc/apt/sources.list
sudo apt update
sudo apt-get --yes install php
sudo chmod -R +x *.php
./run.php
