#!/usr/bin/python

import os
import time
import simplejson as json

wifi_list_raw=os.popen('sudo nmcli device wifi list').readlines()
wifi_list=[]

for i in range(1,len(wifi_list_raw)):
	wifi_list.append(wifi_list_raw[i].split())

for n in range(0,len(wifi_list)):
	if "*" in wifi_list[n]:
		wifi_list[n].remove("*")

check=0

for r in range(0,len(wifi_list)):
	wifi_list[r].insert(0,r+1)
mone=0
for t in range(0,len(wifi_list)):
	seq=""
	mone=0
	if wifi_list[t][2] != "Infra":
		for h in range(1,len(wifi_list[t])):
			if wifi_list[t][h]=="Infra":
				for b in range(1,h):
					seq=seq+wifi_list[t][b]+" "
					mone=h
		for j in range(1,mone):
			del wifi_list[t][1]
		wifi_list[t].insert(1,seq)

for l in range(0,len(wifi_list)):
	if wifi_list[l][-1]=="WPA2" and wifi_list[l][-2]=="WPA1":
		del wifi_list[l][-2]

	if wifi_list[l][-1]=="WPA2" and (wifi_list[l][-2]  == "*" or wifi_list[l][-2] == "**" or wifi_list[l][-2] == "***" or wifi_list[l][-2] == "****" or wifi_list[l][-2] == "*****" ):
		del wifi_list[l][-2]

	if wifi_list[l][-2]=="WPA2" and (wifi_list[l][-1]  == "*" or wifi_list[l][-1] == "**" or wifi_list[l][-1] == "***" or wifi_list[l][-1] == "****" or wifi_list[l][-1] == "*****" ):
		del wifi_list[l][-1]

	if wifi_list[l][-1]=="--" and (wifi_list[l][-2]  == "*" or wifi_list[l][-2] == "**" or wifi_list[l][-2] == "***" or wifi_list[l][-2] == "****" or wifi_list[l][-2] == "*****" ):
		del wifi_list[l][-2]

	if wifi_list[l][-1]=="WEP" and (wifi_list[l][-2]  == "*" or wifi_list[l][-1] == "**" or wifi_list[l][-2] == "***" or wifi_list[l][-2] == "****" or wifi_list[l][-2] == "*****" ):
		del wifi_list[l][-2]

	if wifi_list[l][-2]=="WEP" and (wifi_list[l][-1]  == "*" or wifi_list[l][-1] == "**" or wifi_list[l][-2] == "***" or wifi_list[l][-2] == "****" or wifi_list[l][-2] == "*****" ):
		del wifi_list[l][-1]

	if wifi_list[l][-2]=="***" or wifi_list[l][-2] == "**" or wifi_list[l][-2] == "***" or wifi_list[l][-2] == "****":
		del wifi_list[l][-2]

	del wifi_list[l][5]



with open("/var/www/html/wifi.json", 'wb') as jsonfile:
    json.dump(wifi_list, jsonfile)
    jsonfile.close()
"""
#--->> For Debugging Purpeses <<--------
print ("##   SSID           	                     Type    Channel  Speed    Signal  Security")
print ("------------------------------------------------------------------------------------")
for m in range(0,len(wifi_list)):
	print "%02d" % (wifi_list[m][0],)," | ","{:<35}".format(wifi_list[m][1])," | "+wifi_list[m][2]," | "+"{:<2}".format(wifi_list[m][3])," | "+"{:<5}".format(wifi_list[m][4]+" Mbps")," | "+"{:<4}".format(wifi_list[m][6]+"%")," | "+"{:<1}".format(wifi_list[m][8])
"""


