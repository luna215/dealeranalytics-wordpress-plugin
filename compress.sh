#!/bin/sh

# A script that will help us bundle our files
# into a .zip file.
rm -rf first_plugin.zip
zip -r first_plugin login.php greet_user.php
