#!/bin/sh

# A script that will help bundle the necessary files,
# that our plugin will use, into a .zip file.

rm -rf first_plugin.zip
zip -r first_plugin login.php greet_user.php
