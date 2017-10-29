#!/usr/bin/python


import os
import time


def read_temp():
	try:
		f=open("/var/www/html/temprature", "r+")
		return f.read()
	except:
		print "problem opening file"
		os.system("echo `date` - lcd.py - Problem Opening File /var/www/html/temprature >> /var/www/html/logs/error.log")
		exit(1)
def read_name():
	try:
                f=open("/var/www/html/aq_name", "r+")
                return f.read()
        except:
                print "problem opening file"
                os.system("echo `date` - lcd.py - Problem Opening File /var/www/html/aq_name >> /var/www/html/logs/error.log")
                exit(1)

def read_last_feed():
        try:
                f=open("/var/www/html/last_feed_time", "r+")
		date_str=f.read()
		short_format=date_str[0:2]+"/"+date_str[3:5]+" "+date_str[11:16]
                return short_format
        except:
                print "problem opening file"
                os.system("echo `date` - lcd.py - Problem Opening File /var/www/html/last_feed_time >> /var/www/html/logs/error.log")
                exit(1)

def read_last_change():
        try:
                f=open("/var/www/html/Change", "r+")
                date_str=f.read()
                short_format=date_str[0:2]+"/"+date_str[3:5]+" "+date_str[11:16]
                return short_format

        except:
                print "problem opening file"
                os.system("echo `date` - lcd.py - Problem Opening File /var/www/html/Change >> /var/www/html/logs/error.log")
                exit(1)

def read_last_filter():
        try:
                f=open("/var/www/html/Filter", "r+")
		date_str=f.read()
                short_format=date_str[0:2]+"/"+date_str[3:5]+" "+date_str[11:16]
                return short_format
        except:
                print "problem opening file"
                os.system("echo `date` - lcd.py - Problem Opening File /var/www/html/Filter >> /var/www/html/logs/error.log")
                exit(1)

