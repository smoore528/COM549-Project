<?php
  include_once 'fn_library.php';
  session_start();
  
  do_html_header('Home');
	//if user is logged in, show content
	if (check_logged_in()) {		
		echo "<br>";
		//Store the answer to the previous question
		$answer = $_POST['optionsRadios'];
		store_answer("Q2",$answer);
		//display question
		display_Q3();		
	} else {
		echo "<br>";
		display_error_message("You are not logged in");
		display_button("index.php", "Log in");
	}
  do_html_footer();
?>