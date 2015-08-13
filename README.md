# printAvail
Small SQLlite powered application for internal monitoring of printer availability.  Two pages: index.php and manage.php, where manage.php is username / password controlled and meant for admin only.

* Permissions
  * root directory and printAvail.db must be owned by www-data, group can be anyone (e.g. sudo chown -R www-data:webmins printAvail/)
  * printAvail.db should chmod 775, if www-data is group only

* Config
  * printers are an array in config.php

* Viewing
  * index.php

* Management
  * manage.php
  * contains username and password manage page
