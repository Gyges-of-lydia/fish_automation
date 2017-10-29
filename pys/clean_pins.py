#!/usr/bin/python

import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BOARD)
GPIO.setwarnings(False)
pins=(3,5,7,11,13,15,18,21,23,29,31,33,35,37,8,10,12,16,18,22,24,26,32,36,38,40)

for i in pins:
	GPIO.setup(i,GPIO.OUT)
	GPIO.output(i,0)

GPIO.cleanup()

