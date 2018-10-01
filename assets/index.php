<?php
require("dbconnection.php");

// Gets data from URL parameters.
$start = $_GET['start'];
$end = $_GET['end'];

// Opens a connection to a MySQL server.
$connection=mysql_connect ("localhost", $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Sets the active MySQL database.
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Inserts new row with place data.
$query = sprintf("SELECT * FROM `markers`" .
         " (start,end) " .
         " VALUES ('%s', '%s');",
         mysql_real_escape_string($start),
         mysql_real_escape_string($end));

$result = mysql_query($query);

if (!$result) {
  die('Invalid query: ' . mysql_error());
}

?>