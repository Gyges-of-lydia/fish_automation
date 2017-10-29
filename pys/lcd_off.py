#!/usr/bin/python
import RPi_I2C_driver
import time

display = RPi_I2C_driver.lcd()

display.backlight(0)
