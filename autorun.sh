#!/bin/sh
sudo sed -i "s/# deb/deb/" /etc/apt/sources.list
sudo sysctl -w net.ipv6.conf.all.disable_ipv6=1
sudo sysctl -w net.ipv6.conf.default.disable_ipv6=1
sudo apt update
sudo apt-get --yes install php
sudo chmod -R +x *.php
./run.php
