#!/usr/bin/python

import os
import time
import logs

logs.change_start()
print "Drainning Water...."
os.system("python drain.py 1")
print "Done Draining, Hold on...."
time.sleep(5)
print "Refilling Water..."
os.system("python refill.py 1")
print "Done Refill."
logs.change_end()
