#!/usr/bin/python
import time


def change_start():
	f=open("/var/www/html/logs/change.log", "a")
	f.seek(2)
	f.write("\n")
	now=time.strftime("%d-%m-%Y %H:%M:%S")+" - Feeding Started"
	f.write(now)
	f.close()

def change_end():
	f=open("/var/www/html/logs/change.log", "a")
	f.seek(2)
	f.write("\n")
	now=time.strftime("%d-%m-%Y %H:%M:%S")+" - Feeding Ended"
	f.write(now)
	f.close()

def lights_on():
	f=open("/var/www/html/logs/light.log", "a")
	f.seek(2)
	f.write("\n")
	now=time.strftime("%d-%m-%Y %H:%M:%S")+" - Lights On"
	f.write(now)
	f.close()
	
def lights_off():
	f=open("/var/www/html/logs/light.log", "a")
	f.seek(2)
	f.write("\n")
	now=time.strftime("%d-%m-%Y %H:%M:%S")+" - Lights Went Off"
	f.write(now)
	f.close()
	
def feed():
	f=open("/var/www/html/logs/feed.log", "a")
	f.seek(2)
	f.write("\n")
	now=time.strftime("%d-%m-%Y %H:%M:%S")+" - Feeded one Portion"
	f.write(now)
	f.close()
