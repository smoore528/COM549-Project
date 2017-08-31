<?php

require_once('db_fns.php');

function login($username, $password) {
/* 
Function to check username and password with db 
if yes, return true else return false.
Takes username and password as parameters
*/
  // connect to db
  $conn = db_connect();
  if (!$conn) {
    return 0;
  }
  // check if username is unique
  $result = $conn->query("select * from surveyusers
                         where email='". $conn->real_escape_string($username)."'
                         and userpassword = sha1('". $conn->real_escape_string($password)."')");
  if (!$result) {
     return 0;
  }
  //if data is returned, return 1, otherwise 0.
  if ($result->num_rows>0) {
     return 1;
  } else {
     return 0;
  }
}


function check_logged_in() {
/*
Function to check if somebody is logged in and notify them if not.
*/
  if (isset($_SESSION['logged_in'])) {
    return true;
  } else {
    return false;
  }
}

?>