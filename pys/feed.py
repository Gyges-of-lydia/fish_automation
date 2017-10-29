#!/usr/bin/python

import RPi.GPIO as GPIO
import time
import datetime
import log

fs=open("/var/www/html/fd_progress", "r+")
fs.write("1")
fs.close()

GPIO.setmode(GPIO.BOARD)
pins = [40,38,36,32]

for i in pins:
	GPIO.setup(i,GPIO.OUT)
	GPIO.output(i,0)

seq = [[1,0,0,0],[1,1,0,0],[0,1,0,0],[0,1,1,0],[0,0,1,0],[0,0,1,1],[0,0,0,1],[1,0,0,1]]

for i in range(0,512):
	for hs in range(0,8):
		for pn in range(0,4):
			GPIO.output(pins[pn],seq[hs][pn])
		time.sleep(0.001)
GPIO.cleanup()


f=open("/var/www/html/last_feed_time", "r+")
now=datetime.datetime.strftime(datetime.datetime.now(), '%d-%m-%Y %H:%M:%S')
f.seek(0,0)
f.write(now)
log.feed()
f.close()

time.sleep(1)

fe=open("/var/www/html/fd_progress", "r+")
fe.write("0")
fe.close()
