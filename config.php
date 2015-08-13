<?php

// config

$database_name = "printAvail.db";

// array for printer names
// when updating this, you will need to navigate to
// manage.php, and click "Reset All"
$printers_array = array(
	"P/K Black and White #1 (example)",
	"P/K Black and White #2 (example)",
	"P/K Color, West Wall (example)",
	"UGL Black and White, #1 (example)",
	"UGL Black and White, #2 (example)"
);

$manage_username = "admin";
$manage_password = "password";

// add ip's here to be whitelisted
$ip_white_list = array(
	"141.217.54.97"
);

/**************************************
* Create databases and                *
* open connections                    *
**************************************/

// Create (connect to) SQLite database in file
$file_db = new PDO('sqlite:'.$database_name);
// Set errormode to exceptions
$file_db->setAttribute(PDO::ATTR_ERRMODE, 
                          PDO::ERRMODE_EXCEPTION);


?>
