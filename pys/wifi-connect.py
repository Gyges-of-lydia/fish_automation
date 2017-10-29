#!/usr/bin/env python

import time
import os
import sys

if len(sys.argv)<=2 or sys.argv[1]=="--help" or sys.argv[1]=="-h":
	print "Usage wifi-connect.py SSD_NAME PASSWOD\n Please note Wifi Networks with no Security is unsupported"

connection_status=os.popen("nmcli device status | grep wifi").readline()

is_connected=os.popen("nmcli device wifi connect "+sys.argv[1]+" password "+sys.argv[2]).readline()

if "successfully" in is_connected:
	print "Connected Successfuly to "+sys.argv[1]
else:
	print "Couldn't connect to "+sys.argv[1]+" Wrong Password or Try Again"
#os.system("rm -f /var/www/html/wifi_file")
