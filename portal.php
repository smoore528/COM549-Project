<?php
  include_once 'fn_library.php';
  session_start();
  
  do_html_header('Home');

  display_nav();
  display_welcome();

  do_html_footer();
?>