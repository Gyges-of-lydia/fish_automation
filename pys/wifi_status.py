#!/usr/bin/python
import os
import commands

ipaddr=commands.getoutput("ifconfig | grep wlan0 -A 1 | grep inet | awk '{print $2}'")
os.system('rm -f /var/www/html/wifi_status')

f=open("/var/www/html/wifi_status","w")
if "192.168.100.1" in ipaddr:
        f.write("AccessPoint Mode")

if "192.168.100.1" not in ipaddr:
    ip_ans="connected to: "+commands.getoutput('nmcli connection show | grep wlan0 | cut -d" " -f1')+"<br>IP Address: "+ipaddr
    f.write(ip_ans)
    print ip_ans

f.close()
