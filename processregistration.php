<?php
include_once 'fn_library.php';


$email = $_POST['regemailaddress'];
$username = $_POST['username'];
$pwd= $_POST['regpwd'];
$pwdconf = $_POST['regpwdconf'];

echo $email, $username, $pwd, $pwdconf;

$conn = db_connect();
			$sql = "SELECT * FROM surveyusers WHERE email='$email'";
			$result = $conn->query($sql);
			  if ($result->num_rows>0)
			  {
				  echo "This email address already exists in the database.";
				  echo $result->num_rows;
			  }

			  else
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

				$sql = "SELECT * FROM users";
				$result = $conn->query($sql);
			  }
			  $conn->close();	
			  

?>