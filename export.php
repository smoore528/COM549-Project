<?php
  include_once 'fn_library.php';
  session_start();
  
	if (check_logged_in()) {
		/*
		The export page is a php page that essentially replicates the homepage after
		calling the export_data() function. All relevant functions are contained in
		this file.
		*/
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
	/*
	Function to export all survey data into a downloadable csv file.
	*/
	$conn = db_connect();  
	//Output headers to instruct the browser that the file is for download
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');
    //SQL code. Notice the union to include data headers.
    $sql = "select 'date','q1','q2','q3','q4','q5' UNION ALL
	select date, Q1, Q2, Q3, Q4, Q5 from surveyresults";
    $result = mysqli_query($conn, $sql);
	//Open file. Notice the path is a PHP output stream as opposed to
	//a folder location.
    $fp = fopen('php://output', 'w');
	//Loop through data and place in CSV file
    while($row = mysqli_fetch_assoc($result))
    {	
			fputcsv($fp,$row);
        
    }
    //Close the file
    fclose($fp);
    //close the db connection & file
    mysqli_close($conn);
	exit();
  }
?>