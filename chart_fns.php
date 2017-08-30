<?php
require_once('db_fns.php');

function display_charts(){
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
	<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
	
      // Load Charts and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Draw the charts for when they are loaded
	  
      google.charts.setOnLoadCallback(drawQ1Chart);
      google.charts.setOnLoadCallback(drawQ2Chart);
	  google.charts.setOnLoadCallback(drawQ3Chart);
	  google.charts.setOnLoadCallback(drawQ4Chart);
	  google.charts.setOnLoadCallback(drawQ5Chart);
	  

      // Callback that draws the pie chart for Q1
      function drawQ1Chart() {

        // Create the data table for Q1
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Times');
        data.addColumn('number', 'Result');
        data.addRows([
          ['< Once', <?php echo get_data("Q1",1)?>],
          ['Once', <?php echo get_data("Q1",2)?>],
          ['Twice', <?php echo get_data("Q1",3)?>],
          ['3+', <?php echo get_data("Q1",4)?>]
        ]);

        // Set options for Q1 pie chart.
        var options = {title:'How many times per week do you go shopping for groceries?',
						pieHole: 0.4
						};

        // Instantiate and draw the chart for Q1
        var chart = new google.visualization.PieChart(document.getElementById('Q1_chart_div'));
        chart.draw(data, options);
      }

      // Callback that draws the chart
      function drawQ2Chart() {

        // Create the data table
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Stores');
        data.addColumn('number', 'Result');
        data.addRows([
          ['Tesco', <?php echo get_data("Q2",1)?>],
          ['Asda', <?php echo get_data("Q2",2)?>],
          ['Sainsburys', <?php echo get_data("Q2",3)?>],
          ['Lidl', <?php echo get_data("Q2",4)?>],
		  ['M&S', <?php echo get_data("Q2",5)?>],
		  ['Other', <?php echo get_data("Q2",6)?>]
        ]);

        // Set options for Q2's pie chart.
        var options = {title:'Which store do you use most frequently for your shopping?',
		};

        // Instantiate and draw the chart
        var chart = new google.visualization.BarChart(document.getElementById('Q2_chart_div'));
        chart.draw(data, options);
      }
	  
	  // Callback that draws the pie chart
      function drawQ3Chart() {

        // Create the data table for Q2's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Money');
        data.addColumn('number', 'Result');
        data.addRows([
          ['< £30', <?php echo get_data("Q3",1)?>],
          ['£30 - £40', <?php echo get_data("Q3",2)?>],
          ['£40 - £50', <?php echo get_data("Q3",3)?>],
          ['£50 - £60', <?php echo get_data("Q3",4)?>],
		  ['£60+', <?php echo get_data("Q3",5)?>]
        ]);

        // Set options for Q2's pie chart.
        var options = {title:'Approximately how much do you spend per week on groceries?',
		};

        // Instantiate and draw the chart for Q2's pizza.
        var chart = new google.visualization.BarChart(document.getElementById('Q3_chart_div'));
        chart.draw(data, options);
      }
	  
	  // Callback that draws the pie chart for Q4
      function drawQ4Chart() {

        // Create the data table for Q4
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Mode');
        data.addColumn('number', 'Result');
        data.addRows([
          ['In-store', <?php echo get_data("Q4",1)?>],
          ['On-line', <?php echo get_data("Q4",2)?>]
        ]);

        // Set options for Q4 pie chart.
        var options = {title:'What is your preffered way of shopping for groceries?',
						pieHole: 0.4
						};

        // Instantiate and draw the chart for Q4
        var chart = new google.visualization.PieChart(document.getElementById('Q4_chart_div'));
        chart.draw(data, options);
      }
	  
	  

	  
	  // Callback that draws the pie chart
      function drawQ5Chart() {

        // Create the data table for Q2's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Method');
        data.addColumn('number', 'Result');
        data.addRows([
          ['Car', <?php echo get_data("Q5",1)?>],
          ['Bus', <?php echo get_data("Q5",2)?>],
          ['Train', <?php echo get_data("Q5",3)?>],
          ['Walking', <?php echo get_data("Q5",4)?>],
		  ['Other', <?php echo get_data("Q5",5)?>]
        ]);

        // Set options for Q2's pie chart.
        var options = {title:'Which mode of transport do you most frequently use when going shopping for groceries?',
		};

        // Instantiate and draw the chart for Q2's pizza.
        var chart = new google.visualization.BarChart(document.getElementById('Q5_chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
  <?php display_nav() ?>
	<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
	<div class="panel panel-default" background-color="#f2f2f2">
	<div class="panel-body"><div class="well well-sm"><h3>Results Dashboard</h3></div> 
		
		<div class="row">
			<div class="col-sm-4">
			<div id="Q1_chart_div" style="width: 100%;"></div>
			<div class="well well-sm">
			Your answer: <?php echo get_answer("Q1");?>
			</div>
			</div>	
			<div class="col-sm-4">
			<div id="Q2_chart_div" style="width: 100%;"></div>
			<div class="well well-sm">
			Your answer: <?php echo get_answer("Q2");?>
			</div>
			</div>
			<div class="col-sm-4">
			<div id="Q3_chart_div" style="width: 100%;"></div>
			<div class="well well-sm">
			Your answer: <?php echo get_answer("Q3");?>
			</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
			<div id="Q4_chart_div" style="width: 100%;"></div>
			<div class="well well-sm">
			Your answer: <?php echo get_answer("Q4");?>
			</div>
			</div>
			<div class="col-sm-4">
			<div id="Q5_chart_div" style="width: 100%;"></div>
			<div class="well well-sm">
			Your answer: <?php echo get_answer("Q5");?>
			</div>
			</div>
			<div class="col-sm-4">
			<div id="Q6_chart_div" style="width: 100%;"></div>
			</div>
		</div>
		
	</div>
	</div>
	</div>
	<div class="col-sm-1"></div>
	</div>


<?php
do_html_footer();
}

function get_data($question, $answer){
	$conn = db_connect();
				 
	
	$sql = "SELECT $question FROM surveyresults WHERE $question = '$answer'";
	$result = mysqli_query($conn, $sql);
	$number = mysqli_num_rows($result);
	echo $number;
	
	$conn->close();	
}

function get_answer($question){
	
	$email = $_SESSION['logged_in'];
	$conn = db_connect();
	$sql = "SELECT $question FROM surveyresults WHERE email = '$email'";
	$result = $conn->query($sql);
	  if ($result->num_rows>0)
	  {
		  while ($row = $result->fetch_assoc()) {
			convert_answer($question, $row[$question]);
		}
	  } else {
		  return false;
	  }
	$conn->close();	
}

function convert_answer($question, $answer){
	if ($question == "Q1"){
		if($answer==1){
			echo "< Once";
		}
		if($answer==2){
			echo "Once";
		}
		if($answer==3){
			echo "Twice";
		}
		if($answer==4){
			echo "3+";
		}
	}
	
	if ($question == "Q2"){
		if($answer==1){
			echo "Tesco";
		}
		if($answer==2){
			echo "Asda";
		}
		if($answer==3){
			echo "Sainsburys";
		}
		if($answer==4){
			echo "Lidl";
		}
		if($answer==5){
			echo "M&S";
		}
		if($answer==6){
			echo "Other";
		}
	}
	
	if ($question == "Q3"){
		if($answer==1){
			echo "<£30";
		}
		if($answer==2){
			echo "£30 - £40";
		}
		if($answer==3){
			echo "£40 - £50";
		}
		if($answer==4){
			echo "£50 - £60";
		}
		if($answer==5){
			echo "£60+";
		}
	}
	
	if ($question == "Q4"){
		if($answer==1){
			echo "In-store";
		}
		if($answer==2){
			echo "On-line";
		}
	}
	
	if ($question == "Q5"){
		if($answer==1){
			echo "Car";
		}
		if($answer==2){
			echo "Bus";
		}
		if($answer==3){
			echo "Train";
		}
		if($answer==4){
			echo "Walking";
		}
		if($answer==5){
			echo "Other";
		}
	}
}


?>
