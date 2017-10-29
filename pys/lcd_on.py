#!/usr/bin/python


import os
import RPi_I2C_driver
import time
import lcddata
import thread
lcd=RPi_I2C_driver.lcd()
lcd.backlight(1)
while True:
	f=open("/var/www/html/lcd_refresh","r")
	refresh_min=int(f.read())*60
	lcd.lcd_clear()
	lcd.lcd_display_string("Temprature: "+lcddata.read_temp()+chr(223)+"c",1)
	lcd.lcd_display_string("Feed: "+lcddata.read_last_feed(),2)
	lcd.lcd_display_string("Change: "+lcddata.read_last_change(),3)
	lcd.lcd_display_string("Filter: "+lcddata.read_last_filter(),4)
	time.sleep(refresh_min)
	lcd.lcd_clear()
	lcd.lcd_display_string("Aquarium Name:",1)
	lcd.lcd_display_string(lcddata.read_name(),2)
	lcd.lcd_display_string_pos("Refreshing Data...",3,0)
	for x in range (0,11):
	    lcd.lcd_display_string_pos(chr(255),4,x)
	    lcd.lcd_display_string_pos(`x*10` + "%",4,14)
	    time.sleep(0.3)
	time.sleep(2)

