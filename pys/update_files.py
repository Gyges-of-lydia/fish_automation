#!/usr/bin/python
import time

def update_feed():
	f=open("last_feed_time", "r+")
	f.seek(0)
	now=time.strftime("%d/%m/%Y %H:%M:%S")
	f.write(now)
	f.close()
	
def update_change():
	f=open("Change", "r+")
	f.seek(0)
	now=time.strftime("%d/%m/%Y %H:%M:%S")
	f.write(now)
	f.close()

