<?php

function do_html_header($title = '') {
  // print an HTML header

?>

<html lang="en">
<head>
  <title>Survey Tool</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>




<?php
}

function do_html_footer() {
  // print an HTML footer
?>
  </body>
  </html>
<?php
}

function do_html_heading($heading) {
  // print heading
?>
  <h2><?php echo htmlspecialchars($heading); ?></h2>
<?php
}

function display_login_form() {
  // dispaly form asking for name and password
?>
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><h2>Log in</h2></div>
		<div class="col-sm-4"></div>
	</div>
	<div class="row">
	  <div class="col-sm-4"></div>	
	  <div class="col-sm-4">
		<div class="form-group">
		<form action="portal.php" method="post">
		  <label for="usr">Username:</label>
		  <input type="text" class="form-control" required="yes" name="usr">
		</div>
		<div class="form-group">
		  <label for="pwd">Password:</label>
		  <input type="password" class="form-control" required="yes" name="pwd">
		</div>
	  </div>
	  <div class="col-sm-4"></div>	
	</div>
	<div class="Button" align="center">
	  <button type="Submit" class="btn btn-primary">Log in</button>
	  </form>
	</div>
	<div align="center">
	<form action="register.php" method="post">
	  <button type="submit" class="btn btn-link">New user? Register here.</button>
	</form>
	</div>
<?php

}

function display_registration_form() {
  // dispaly form asking registration details
  
?>

<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><h2>Register</h2></div>
		<div class="col-sm-4"></div>
	</div>
	<div class="row">
	  <div class="col-sm-4"></div>	
	  <div class="col-sm-4">
		<div class="form-group">
		<form action="processregistration.php" method="post">
		  <label for="email">Email:</label>
		  <input class="form-control" required="yes" type="text" name="regemailaddress" size="50">
		</div>
		<div class="form-group">
		  <label for="username">Name:</label>
		  <input class="form-control" required="yes" type="text" name="username" size="50">
		</div>
		<div class="form-group">
		  <label for="pwd">Password:</label>
		  <input type="password" class="form-control" name="regpwd">
		</div>
		<div class="form-group">
		  <label for="pwdconf">Confirm Password:</label>
		  <input type="password" class="form-control" name="regpwdconf">
		</div>
	  </div>
	  <div class="col-sm-4"></div>	
	</div>
	<div class="Button" align="center">
	  <button type="submit" value="Submit" name="register" class="btn btn-primary">Register</button>
	  </form>
	</div>
	
<?php
}

function display_success_notification($msg) {
?>
<div class="row">
<div class="col-sm-4"></div>	
<div class="col-sm-4 alert alert-success alert-dismissable">
  <a href="index.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> <?php echo $msg ?>
</div>
<div class="col-sm-4"></div>
</div>
<?php
}

function display_error_message($msg) {
?>
<div class="row">
<div class="col-sm-4"></div>	
<div class="col-sm-4 alert alert-danger">
  <strong>Error!</strong> <?php echo $msg ?>
</div>
<div class="col-sm-4"></div>
</div>
<?php
}

function display_button($link, $text) {
?>
<div align="center">
	
<a href="<?php echo $link ?>" class="btn btn-primary" role="button"><?php echo $text ?></a>

</div>
<?php
}

function display_nav() {
?>
<div class="row"><div class="col-sm-12"><h2> </h2></div></div>
<div class="row">
<div class="col-sm-1"></div>	
<div class="col-sm-10">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="portal.php">Survey Portal</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="portal.php">Home</a></li>
      <li><a href="dashboard.php">Results Dashboard</a></li>
	  <li><a href="export.php">Export Data</a></li>

    </ul>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> 
	  <?php
	  echo $_SESSION['logged_in'];
	  ?>
	  </a></li>
      <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
    </ul>
  </div>
</nav>
</div>
<div class="col-sm-1"></div>
</div>
<?php
}

function display_welcome(){
?>

<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10">
<div class="panel panel-default">
  <div class="panel-body">
  <div class="row">
  <div class="col-sm-5">  
  <img class="img-rounded img-responsive" src="img/shopping.jpg" alt="Shopping">
  </div>
  <div class="col-sm-7">
  <h3>Welcome to the 2017 Consumer Survey!</h3>
  <p>The 2017 global consumer survey is an online tool intended to allow users to register via their email address, provide answers to questions, 
  and then gain access to a dashboard that shows their result's benchmarked against the rest of the respondents.
  </p>
  <p>The survey consists of 5 questions, all of which are single response only. There are no multiple choice questions.</p>
  <p>If you wish to see the results of the survey, click the link to the results dashboard in the navigation bar. To answer the survey questions, please click the link below.</p>
  <div class="Button" align="left">
	  <a href="surveyQ1.php">Click here to take the survey</a>
</div>
  </div>
  
  </div>
  
  
  </div>
</div>
</div>
<div class="col-sm-1"></div>
</div>
<?php
}




