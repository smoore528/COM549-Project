<?php
  include_once 'fn_library.php';
  session_start();
  
  
  
  
	if (check_logged_in()) {
		
		export_data();
		do_html_header('Home');
		display_nav();
		display_welcome();
		
	} else {
		echo "<br>";
		display_error_message("You are not logged in");
		display_button("index.php", "Log in");
	}

  do_html_footer();
  
  function export_data(){
	$conn = db_connect();
    
	// output headers so that the file is downloaded rather than displayed
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');
    // fetch mysql table rows
    $sql = "select 'date','q1','q2','q3','q4','q5' UNION ALL
	select date, Q1, Q2, Q3, Q4, Q5 from surveyresults";
    $result = mysqli_query($conn, $sql);

    $fp = fopen('php://output', 'w');

	//fputcsv($fp,array("ID","date","q1","q2","q3","q4","q5"));
    while($row = mysqli_fetch_assoc($result))
    {	
			fputcsv($fp,$row);
        
    }
    
    fclose($fp);

    //close the db connection
    mysqli_close($conn);
	exit();
  }
?>