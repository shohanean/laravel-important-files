<?php

#add this line to .bash_profile
alias php='/opt/cpanel/ea-php70/root/usr/bin/php'
#this line created by information from two part
#first part: /opt/cpanel/ea-php70/root comes from phpinfo()
#find out the line [Configuration File (php.ini) Path]
#then copy everything except last /etc

#now time for the second part
#at CLI run whereis php
#then copy this part
#we are done!

#not at CLI run the last command
. ~/.bash_profile

#i hope we are done and now check with php -v