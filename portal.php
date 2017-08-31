<?php
include_once 'fn_library.php';
session_start();
do_html_header('Home');
//Check to see if theres a username in the session.
//This is because it's possible to navigate back to this page while already logged in
//meaning that the post var for username may be undefined.
if(!isset($_SESSION['logged_in'])){
	if (($_POST['usr']) && ($_POST['pwd'])) {
		//User has just tried to log in, therefore run log in code.
		$username = $_POST['usr'];
		$passwd = $_POST['pwd'];
		if (login($username, $passwd)) {
		  //if they are in the database, then register the username 
		  //in the session variable.
		  $_SESSION['logged_in'] = $username;
	   } else {
		  // unsuccessful login
		  echo "<br>";
		  display_error_message("You could not be logged in.");
		  display_button('index.php', 'Login');
		  do_html_footer();
		  exit;
		}
	}
}
	//If user is logged in, display the page content
	if (check_logged_in()) {		
		display_nav();
		display_welcome();		
	} else {
		echo "<br>";
		display_error_message("You are not logged in");
		display_button("index.php", "Log in");
	}
  do_html_footer();
?>