<?php
  include_once 'fn_library.php';
  session_start();
  
  do_html_header('Home');
  display_login_form();
  
  //Check if the user has navigated to this page by the registration page.
  if(isset($_POST['regemailaddress'])) {
	//if they have, display a confirmation message
	echo display_success_notification("You have now registered and may log in");
	}
	
	//If the user is currently logged in, log them out.
	if(isset($_SESSION['logged_in'])) {
	//log the user out if they are already logged in
	unset($_SESSION['logged_in']);
	}

  do_html_footer();
?>