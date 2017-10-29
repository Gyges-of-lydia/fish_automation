#!/usr/bin/python

import RPi.GPIO as GPIO
import time
import os
GPIO.setmode(GPIO.BOARD)
GPIO.setup(24,GPIO.IN)
indicator=0

try:
	f=open("/var/www/html/refill_limit", "r")
except:
	print "problem opening file"
	os.system("echo `date` - refill.py - Problem Opening File /var/www/html/refill_limit >> /var/www/html/logs/error.log")
	raise KeyboardInterrupt
try:
        fc=open("/var/www/html/ch_progress", "w+")
except:
        print "problem opening file"
        os.system("echo `date` - refill.py - Problem Opening File /var/www/html/ch_progress >> /var/www/html/logs/error.log")
        raise KeyboardInterrupt

fc.write("1")
fc.close()

if f.read()=="Safty is Shut!":
	time_limit=0	
else: 
	time_limit_str=open("/var/www/html/refill_limit", "r").read()
	time_limit=int(time_limit_str)

try:
	start_clock=int(str(time.time())[:10])
	while True:
		if indicator==0:
			GPIO.setmode(GPIO.BOARD)
			GPIO.setup(13,GPIO.OUT)
			GPIO.output(13,0)
			indicator=1

                if GPIO.input(24)==0:
			print "Float is Closed"
			raise KeyboardInterrupt

		now_clock=int(str(time.time())[:10])
		if time_limit==0: pass 
		else: 
			if now_clock>start_clock+time_limit:
				print "Time limit exceeded"
				raise KeyboardInterrupt
		

except KeyboardInterrupt:
	open("/var/www/html/ch_progress", "w+").write("0")
	GPIO.cleanup()
	
