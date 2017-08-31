<?php

function db_connect() {
	/*
	Function used to connect to database.
	There is a commented out version of this code to connect via
	localhost rather than into the school's mySQL server.
	*/
   $result = new mysqli('localhost', 'root', '', 'com549_project');
   if (!$result) {
     throw new Exception('Could not connect to database server');
   } else {
     return $result;
   }
}

?>
