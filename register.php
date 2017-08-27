<?php
  include_once 'fn_library.php';
  session_start();
  
  do_html_header('Home');

  
  display_registration_form();


  do_html_footer();
?>