<?php
session_start();
include_once 'fn_library.php';


$email = $_POST['regemailaddress'];
$username = $_POST['username'];
$pwd= $_POST['regpwd'];
$pwdconf = $_POST['regpwdconf'];

$conn = db_connect();

do_html_header();

			$sql = "SELECT * FROM surveyusers WHERE email='$email'";
			$result = $conn->query($sql);
			  if ($result->num_rows>0)
			  {
				  display_error_message("This email address already exists in the database.");
			  }
			  
			  if ($pwd != $pwdconf){
				  display_error_message("The specified passwords do not match.");
			  }
			  
			  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					display_error_message("Please enter a valid email address.");
				}

			  if(($pwd == $pwdconf) and $result->num_rows==0)
			  {
				// connect to db
				 $conn = db_connect();
				 
				 //Create entry in USERS table
				 $sql = "INSERT INTO surveyusers (username, email, userpassword)
					VALUES ('$username','$email','" .sha1($pwd)."')";

					if ($conn->query($sql) === TRUE) {
						echo "";
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
				
				//Create entry in RESULTS!! table.
				//We do this so that we can then "edit" the result when the user answers the survey
				$sql = "INSERT INTO surveyresults (email)
					VALUES ('$email')";

					if ($conn->query($sql) === TRUE) {
						echo "";
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
				
				$conn->close();	
				display_login_form();
				echo display_success_notification("You have now registered and may log in");
			  } else{
				  display_button("register.php","Return to previous page");
			  }
			  
do_html_footer();			  

?>