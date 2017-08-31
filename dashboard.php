<?php
  include_once 'fn_library.php';
  session_start();
	//Check user is logged in before showing content
	if (check_logged_in()) {		
		display_charts();		
	} else {
		echo "<br>";
		display_error_message("You are not logged in");
		display_button("index.php", "Log in");
	}
  do_html_footer();
?>