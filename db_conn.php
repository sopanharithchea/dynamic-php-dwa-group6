<?php
require 'config.php';
// Set the database access information as constants:
DEFINE('DB_HOST', $DB_HOST);
DEFINE('DB_USER', $DB_USER);
DEFINE('DB_PASSWORD', $DB_PASS);
DEFINE('DB_NAME', $DB_NAME);
DEFINE('DB_PORT', $DB_PORT);
// Make the connection:
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT)
or die('Could not connect to MySQL: ' . mysqli_connect_error());
// Set the encoding...
mysqli_set_charset($dbc, 'utf8');
