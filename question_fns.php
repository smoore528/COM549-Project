<?php
require_once('db_fns.php');

function display_progress($progress){
/*
Function to display progress bar.
Takes progress value as a parameter and sets the bar fill and number
appropriately.
*/
?>
<br>
<div class="progress" style="width:100%; margin: 0 auto">
  <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar"
  aria-valuenow="$progress" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress ?>% ">
    <?php echo $progress ?>% Complete
  </div>
</div>
<?php
}

function store_answer($question, $answer){
	/*
	Function to store the submitted answer into the database.
	Accepts question and answer as a parameter so that the function
	can be generic and used for all questions.
	*/
	
	//Get users email from session var
	$email = $_SESSION['logged_in'];
	//connect to db
	$conn = db_connect();
				 
	//Update entry in USERS table for that particular user
	$sql = "UPDATE surveyresults SET $question = '$answer' WHERE surveyresults.email = '$email'";
	if ($conn->query($sql) === TRUE) {
		echo '';
	} else {
		//display message if error
		echo "Error: " . $sql . "<br>" . $conn->error;
		}
	$conn->close();	
}

function option_selected($question, $answer){
/*
Function to return the option that the user has stored in the database.
Takes question and answer as parameter so that it can be generic and used
for all questions.
The reason for needing this function is that when the user returns to the survey
I want them to see the results that they left the last time. This function
queries the database for the user's response and prints a "checked" in the radio
button to select it if successful.
*/	
	$email = $_SESSION['logged_in'];
	$conn = db_connect();
	$sql = "SELECT $question FROM surveyresults WHERE email = '$email' and $question = '$answer'";
	$result = $conn->query($sql);
	  if ($result->num_rows>0)
	  {
		  return true;
	  } else {
		  return false;
	  }
	$conn->close();					
}

function display_Q1(){
/*
HTML function to display Q1
*/
?>

<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10">
<div class="panel panel-default">
	<div class="panel-body">
	<div class="row">
	<div class="col-sm-8">
	<h3>2017 Consumer Survey</h3>
	</div>
	<div class="col-sm-4">
	<p class="text-right"><a href="portal.php">Exit survey and return to main menu</a></p>
	</div>
	</div>
	<?php display_progress(1) ?>
  <div class="panel-body">
  <h4>Question 1</h4>
  <strong>How many times per week do you go shopping for groceries?</strong>
  
  <form action="surveyQ2.php" method="post">
  <div class="radio">
  <label>
    <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" 
	<?php if(option_selected("Q1",1)){ echo "checked";} ?>>
    Less than once per week
  </label>
	</div>
	<div class="radio">
	  <label>
		<input type="radio" name="optionsRadios" id="optionsRadios2" value="2" 
		<?php if(option_selected("Q1",2)){ echo "checked";} ?>>
		Once per week
	  </label>
	</div>
	<div class="radio">
	  <label>
		<input type="radio" name="optionsRadios" id="optionsRadios3" value="3" 
		<?php if(option_selected("Q1",3)){ echo "checked";} ?>>
		Twice per week
	  </label>
	</div>
	<div class="radio">
	  <label>
		<input type="radio" name="optionsRadios" id="optionsRadios4" value="4" 
		<?php if(option_selected("Q1",4)){ echo "checked";} ?>>
		3+ Times per week
	  </label>
	</div>

<button type="Submit" class="btn btn-primary">Next</button>
</form>

  </div>
</div>
</div>
<div class="col-sm-1"></div>
</div>
<?php
}

function display_Q2(){
/*
HTML function to display Q2
*/
?>

<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10">
<div class="panel panel-default">
	<div class="panel-body">
	<div class="row">
	<div class="col-sm-8">
	<h3>2017 Consumer Survey</h3>
	</div>
	<div class="col-sm-4">
	<p class="text-right"><a href="portal.php">Exit survey and return to main menu</a></p>
	</div>
	</div>
	<?php display_progress(20) ?>
  <div class="panel-body">
  <h4>Question 2</h4>
  <strong>Which store do you use most frequently for your shopping?</strong>
  
  <form action="surveyQ3.php" method="post">
  <div class="radio">
  <label>
    <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" 
	<?php if(option_selected("Q2",1)){ echo "checked";} ?>>
    Tesco
  </label>
	</div>
	<div class="radio">
	  <label>
		<input type="radio" name="optionsRadios" id="optionsRadios2" value="2" 
		<?php if(option_selected("Q2",2)){ echo "checked";} ?>>
		Asda
	  </label>
	</div>
	<div class="radio">
	  <label>
		<input type="radio" name="optionsRadios" id="optionsRadios3" value="3" 
		<?php if(option_selected("Q2",3)){ echo "checked";} ?>>
		Sainsbury's
	  </label>
	</div>
	<div class="radio">
	  <label>
		<input type="radio" name="optionsRadios" id="optionsRadios4" value="4" 
		<?php if(option_selected("Q2",4)){ echo "checked";} ?>>
		Lidl
	  </label>
	</div>
	<div class="radio">
	  <label>
		<input type="radio" name="optionsRadios" id="optionsRadios5" value="5" 
		<?php if(option_selected("Q2",5)){ echo "checked";} ?>>
		Marks and Spencer
	  </label>
	</div>
	<div class="radio">
	  <label>
		<input type="radio" name="optionsRadios" id="optionsRadios6" value="6" 
		<?php if(option_selected("Q2",6)){ echo "checked";} ?>>
		Other
	  </label>
	</div>

<button type="Submit" class="btn btn-primary">Next</button>
</form>

  </div>
</div>
</div>
<div class="col-sm-1"></div>
</div>
<?php
}

function display_Q3(){
/*
HTML function to display Q3
*/
?>

<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10">
<div class="panel panel-default">
	<div class="panel-body">
	<div class="row">
	<div class="col-sm-8">
	<h3>2017 Consumer Survey</h3>
	</div>
	<div class="col-sm-4">
	<p class="text-right"><a href="portal.php">Exit survey and return to main menu</a></p>
	</div>
	</div>
	<?php display_progress(40) ?>
  <div class="panel-body">
  <h4>Question 3</h4>
  <strong>Approximately how much do you spend per week on groceries?</strong>
  
  <form action="surveyQ4.php" method="post">
  <div class="radio">
  <label>
    <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" 
	<?php if(option_selected("Q3",1)){ echo "checked";} ?>>
    Less than £30
  </label>
	</div>
	<div class="radio">
	  <label>
		<input type="radio" name="optionsRadios" id="optionsRadios2" value="2" 
		<?php if(option_selected("Q3",2)){ echo "checked";} ?>>
		Between £30 and £40
	  </label>
	</div>
	<div class="radio">
	  <label>
		<input type="radio" name="optionsRadios" id="optionsRadios3" value="3" 
		<?php if(option_selected("Q3",3)){ echo "checked";} ?>>
		Between £40 and £50
	  </label>
	</div>
	<div class="radio">
	  <label>
		<input type="radio" name="optionsRadios" id="optionsRadios4" value="4" 
		<?php if(option_selected("Q3",4)){ echo "checked";} ?>>
		Between £50 and £60
	  </label>
	</div>
	<div class="radio">
	  <label>
		<input type="radio" name="optionsRadios" id="optionsRadios5" value="5" 
		<?php if(option_selected("Q3",5)){ echo "checked";} ?>>
		More than £60
	  </label>
	</div>


<button type="Submit" class="btn btn-primary">Next</button>
</form>

  </div>
</div>
</div>
<div class="col-sm-1"></div>
</div>
<?php
}

function display_Q4(){
/*
HTML function to display Q4
*/
?>

<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10">
<div class="panel panel-default">
	<div class="panel-body">
	<div class="row">
	<div class="col-sm-8">
	<h3>2017 Consumer Survey</h3>
	</div>
	<div class="col-sm-4">
	<p class="text-right"><a href="portal.php">Exit survey and return to main menu</a></p>
	</div>
	</div>
	<?php display_progress(60) ?>
  <div class="panel-body">
  <h4>Question 4</h4>
  <strong>What is your preffered way of shopping for groceries?</strong>
  
  <form action="surveyQ5.php" method="post">
  <div class="radio">
  <label>
    <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" 
	<?php if(option_selected("Q4",1)){ echo "checked";} ?>>
    In-store
  </label>
	</div>
	<div class="radio">
	  <label>
		<input type="radio" name="optionsRadios" id="optionsRadios2" value="2" 
		<?php if(option_selected("Q4",2)){ echo "checked";} ?>>
		On-line
	  </label>
	</div>

<button type="Submit" class="btn btn-primary">Next</button>
</form>

  </div>
</div>
</div>
<div class="col-sm-1"></div>
</div>
<?php
}

function display_Q5(){
/*
HTML function to display Q5
*/
?>

<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10">
<div class="panel panel-default">
	<div class="panel-body">
	<div class="row">
	<div class="col-sm-8">
	<h3>2017 Consumer Survey</h3>
	</div>
	<div class="col-sm-4">
	<p class="text-right"><a href="portal.php">Exit survey and return to main menu</a></p>
	</div>
	</div>
	<?php display_progress(80) ?>
  <div class="panel-body">
  <h4>Question 5</h4>
  <strong>Which mode of transport do you most frequently use when going shopping for groceries?</strong>
  
  <form action="surveycomplete.php" method="post">
  <div class="radio">
  <label>
    <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" 
	<?php if(option_selected("Q5",1)){ echo "checked";} ?>>
    Car
  </label>
	</div>
	<div class="radio">
	  <label>
		<input type="radio" name="optionsRadios" id="optionsRadios2" value="2" 
		<?php if(option_selected("Q5",2)){ echo "checked";} ?>>
		Bus
	  </label>
	</div>
	<div class="radio">
	  <label>
		<input type="radio" name="optionsRadios" id="optionsRadios3" value="3" 
		<?php if(option_selected("Q5",3)){ echo "checked";} ?>>
		Train
	  </label>
	</div>
	<div class="radio">
	  <label>
		<input type="radio" name="optionsRadios" id="optionsRadios4" value="4" 
		<?php if(option_selected("Q5",4)){ echo "checked";} ?>>
		Walking
	  </label>
	</div>
	<div class="radio">
	  <label>
		<input type="radio" name="optionsRadios" id="optionsRadios5" value="5" 
		<?php if(option_selected("Q5",5)){ echo "checked";} ?>>
		Other
	  </label>
	</div>

<button type="Submit" class="btn btn-primary">Next</button>
</form>

  </div>
</div>
</div>
<div class="col-sm-1"></div>
</div>
<?php
}

function display_completed_survey(){
/*
Function to store Q5 result and display a page informing the user that the survey is
complete.
*/
?>

<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10">
<div class="panel panel-default">
  <div class="panel-body">
  <?php display_progress(100) ?>
  <h3>Survey Complete!</h3>
  <p>Thank you! You have now completed the survey</p>
  <p>Click <a href="dashboard.php">here</a> to view the results.</p>
  </div>
</div>
</div>
<div class="col-sm-1"></div>
</div>
<?php
}
