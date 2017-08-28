<?php
  include_once 'fn_library.php';
  session_start();
  
  do_html_header('Home');
  
	if (check_logged_in()) {
		
		echo "<br>";
		//Store the answer to the previous question
		$answer = $_POST['optionsRadios'];
		store_answer("Q5",$answer);
		
		display_completed_survey();
		
	} else {
		echo "<br>";
		display_error_message("You are not logged in");
		display_button("index.php", "Log in");
	}
  
  

  do_html_footer();
?>