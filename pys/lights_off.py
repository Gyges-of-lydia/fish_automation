#!/usr/bin/python
import RPi.GPIO as GPIO
import time
import log

GPIO.setmode(GPIO.BOARD)
GPIO.setup(11,GPIO.OUT)
GPIO.output(11,1)
log.lights_off()
