#!/usr/bin/php
<?php


$ALLOWED_OUTPUT_PORTS = [22,53,80,443];

exec("iptables -F");
exec("ip6tables -F");
echo "Setting up firewall\n";
echo "Disabling IPv6\n";
exec("ip6tables -P INPUT DROP");
exec("ip6tables -P FORWARD DROP");
exec("ip6tables -P OUTPUT DROP");

echo "Disabling IPv4\n";
exec("iptables -P INPUT DROP");
exec("iptables -P FORWARD DROP");
exec("iptables -P OUTPUT DROP");

foreach ($ALLOWED_OUTPUT_PORTS as $port) {
        exec("iptables -A OUTPUT -p udp -m udp --dport $port -j ACCEPT");
	exec("iptables -A OUTPUT -p tcp -m tcp --dport $port -j ACCEPT");
}

echo "Setting up exceptions\n";
exec("iptables -A INPUT -i lo -j ACCEPT");
exec("iptables -A OUTPUT -o lo -j ACCEPT");
exec("iptables -A INPUT -m state --state ESTABLISHED,RELATED -j ACCEPT");

exec("systemctl stop apt-daily.timer; systemctl disable apt-daily.timer; systemctl disable apt-daily.service; systemctl stop apt-daily-upgrade.timer; systemctl disable apt-daily-upgrade.timer; systemctl disable apt-daily-upgrade.service");
exec("systemctl stop udisks2.service");
