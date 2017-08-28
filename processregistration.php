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
				 
				 $sql = "INSERT INTO surveyusers (username, email, userpassword)
					VALUES ('$username','$email','" .sha1($pwd)."')";

					if ($conn->query($sql) === TRUE) {
						echo "New record created successfully!<br><br>";
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
				$conn->close();	
			  } else{
				  display_button("register.php","Return to previous page");
			  }
			  
do_html_footer();			  

?>