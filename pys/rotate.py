#!/usr/bin/python
import os

f=open("/var/www/html/rotate", "r+")
os.system("cat /dev/null > /etc/logrotate.d/aqua")
days=f.read()

if days == "0":
	rotate_file=open("/etc/logrotate.d/aqua", "r+")
	rotate_file.seek(0)
	rotate_file.write("# Rotation of /var/www/html/logs/ is shut")
else:	
	rotate_file=open("/etc/logrotate.d/aqua", "r+")
	rotate_file.seek(0)
	rotate_file.write("/var/www/html/logs/*.log\n")
	rotate_file.write("{\n")
	rotate_file.write("	rotate "+days+"\n")
	rotate_file.write("	daily\n")
	rotate_file.write("	missingok\n")
	rotate_file.write("	compress\n")
	rotate_file.write("}")


