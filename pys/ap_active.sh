#!/bin/bash

PATH=/usr/local/sbin:/sbin:/bin:/usr/sbin:/usr/bin:/root/bin:/usr/local/bin
sudo create_ap -n wlan0 Aquarium -g 192.168.100.1 --daemon > /dev/null

