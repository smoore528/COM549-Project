<?php
  include_once 'fn_library.php';
  session_start(); 
  do_html_header('Home');  
  display_registration_form();
  echo "<br>";
  display_button("index.php","Return to previous page");
  do_html_footer();
?>