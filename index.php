<?php
  include_once 'fn_library.php';
  session_start();
  
  do_html_header('Home');

  
  display_login_form();
  
  
  if(isset($_POST['regemailaddress'])) {
	echo display_success_notification("You have now registered and may log in");
	}


  do_html_footer();
?>