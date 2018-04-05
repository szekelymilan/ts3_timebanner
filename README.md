# TeamSpeak 3 TimeBanner
Shows the current time on your TS3 (dynamic) banner.

## Requirements
* A web server that supports PHP (with GD and PNG Support enabled)
* A TeamSpeak 3 server
* A default image
* A font

## Setting up
* Make a default image (recommended in 850px*300px)
* Upload *updateImage.php*, *your default image* and *your font* to the web server
* Change the settings in *updateImage.php*
* On your TS3 server, change *Banner Gfx URL*, and *Gfx interval* to *60*
* Set up a cron job on your server

**If you have a VPS / a dedicated server, you could use crontab:**
```sh
$ crontab -e
```
Scroll down to the bottom, and write a new line:
```
* * * * * cd /path_to_the_file; /usr/bin/php updateImage.php
```
Validate crontab:
```sh
$ crontab -l
```
**Otherwise, you could search for cron jobs in your web admin.**

If your web admin does not support cron jobs, you could try:
* https://www.webcron.org
* https://www.easycron.com
* https://cron-job.org

## Author(s)
* **Milan Szekely** - *Initial work* - [szekelymilan](https://github.com/szekelymilan)
