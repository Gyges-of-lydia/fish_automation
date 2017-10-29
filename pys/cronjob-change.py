#!/usr/bin/env python

def clear_cron():
	f=open("/var/spool/cron/pi","r+")
	f.seek(0)
	f.truncate()
	f.close()

def read_change():
	fc=open("/var/www/html/Change_Interval","r+")
	fc_at=open("/var/www/html/Change_Interval_At","r+")
	day_full=fc.read()
	hour_full=fc_at.read()
	if day_full=="Sunday": day="0"
	if day_full=="Monday": day="1"
	if day_full=="Tuesday": day="2"
	if day_full=="Wednesday": day="3"
	if day_full=="Thursday": day="4"
	if day_full=="Friday": day="5"
	if day_full=="Saturday": day="6"
	if day_full=="Shut Auto Change": day="shut"
	hour=hour_full[0:2]
	return [day,hour]

def read_feed():
	ff=open("/var/www/html/Feed_Interval","r+")
	ff_at=open("/var/www/html/Feed_Interval_At","r+")
	feed_int=ff.read()
	hour=ff_at.read()
	if feed_int=="Once a Day": 
		inter="0 "+hour[0:2]+" * * * sudo /usr/bin/python /var/www/html/pys/feed.py\n"
	if feed_int=="Twice a Day":
		if int(hour[0:2])>=12: 
			inter="0 "+str(int(hour[0:2])-12)+","+hour[0:2]+" * * * sudo /usr/bin/python /var/www/html/pys/feed.py\n"
		if int(hour[0:2])<12: 
			inter="0 "+hour[0:2]+","+str(int(hour[0:2])+12)+" * * * sudo /usr/bin/python /var/www/html/pys/feed.py\n"
	elif feed_int=="Shut Auto Feeding": inter="# Auto feed is shut\n"
	return inter

def read_light():
	fl=open("/var/www/html/Light_Ans","r+");
	ans=fl.read()
	if ans != "Time is not Within 24H Time Frame!":
		start_time="0 "+ans[19:21]+" * * * sudo /usr/bin/python /var/www/html/pys/lights_on.py\n"
		if ":" not in ans[28:30]: end_time="0 "+ans[28:30]+" * * * sudo /usr/bin/python /var/www/html/pys/lights_off.py\n"
		else: end_time="0 "+ans[27:29]+" * * * sudo /usr/bin/python /var/www/html/pys/lights_off.py\n"
		return start_time,end_time
	else: return "no change"
	


clear_cron()

if read_change()[0]=="shut":
	change="# Auto Change is Shut\n"
else:
	change="0 "+read_change()[1]+" * "+"* "+read_change()[0]+" sudo /usr/bin/python /var/www/html/pys/change.py\n"

f=open("/var/spool/cron/pi","r+")
f.write(change)
f.write(read_feed())
if read_light() != "no change":
	f.write(read_light()[0])
	f.write(read_light()[1])
f.write("\n#######\n")
f.write("*/1 * * * * sudo /usr/bin/python /var/www/html/pys/temp-file.py\n")
f.close()

