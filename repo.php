#!/usr/bin/php
<?php


echo "Generating the public key\n";

echo "Enter an identity (e.g. an email)\n";
$id = readline();
echo "$id\n";

passthru("ssh-keygen -t ed25519 -C $id");

system("cat ~/.ssh/id_ed25519.pub");

while(1){
	echo "Has the public key been installed (y/n)?\n";
	$installed = readline();
	if ($installed == "y"){
		break;
	}
}

echo "Enter repository path (user/name)\n";
$repo = readline();
echo "$repo\n";

system("rm -r ./repo");
passthru("git clone ssh://git@github.com/$repo.git ./repo");
system("git -C ./repo config user.email '$id'");
system("git -C ./repo config --global user.name '$repo'");
system("git -C ./repo checkout -b $id");
system("git -C ./repo push --set-upstream ssh://git@github.com/$repo.git $id");

