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
          ['< Once', <?php echo getData("Q1",1)?>],
          ['Once', <?php echo getData("Q1",2)?>],
          ['Twice', <?php echo getData("Q1",3)?>],
          ['3+', <?php echo getData("Q1",4)?>]
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
          ['Tesco', <?php echo getData("Q2",1)?>],
          ['Asda', <?php echo getData("Q2",2)?>],
          ['Sainsburys', <?php echo getData("Q2",3)?>],
          ['Lidl', <?php echo getData("Q2",4)?>],
		  ['M&S', <?php echo getData("Q2",5)?>],
		  ['Other', <?php echo getData("Q2",6)?>]
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
          ['< £30', <?php echo getData("Q3",1)?>],
          ['£30 - £40', <?php echo getData("Q3",2)?>],
          ['£40 - £50', <?php echo getData("Q3",3)?>],
          ['£50-60', <?php echo getData("Q3",4)?>],
		  ['£60+', <?php echo getData("Q3",5)?>]
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
          ['In-store', <?php echo getData("Q4",1)?>],
          ['On-line', <?php echo getData("Q4",2)?>]
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
          ['Car', <?php echo getData("Q5",1)?>],
          ['Bus', <?php echo getData("Q5",2)?>],
          ['Train', <?php echo getData("Q5",3)?>],
          ['Walking', <?php echo getData("Q5",4)?>],
		  ['Other', <?php echo getData("Q5",5)?>]
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
			Your answer:
			</div>
			</div>	
			<div class="col-sm-4">
			<div id="Q2_chart_div" style="width: 100%;"></div>
			<div class="well well-sm">
			Your answer:
			</div>
			</div>
			<div class="col-sm-4">
			<div id="Q3_chart_div" style="width: 100%;"></div>
			<div class="well well-sm">
			Your answer:
			</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
			<div id="Q4_chart_div" style="width: 100%;"></div>
			<div class="well well-sm">
			Your answer:
			</div>
			</div>
			<div class="col-sm-4">
			<div id="Q5_chart_div" style="width: 100%;"></div>
			<div class="well well-sm">
			Your answer:
			</div>
			</div>
			<div class="col-sm-4">
			<div id="Q6_chart_div" style="width: 100%;"></div>
			<div class="well well-sm">
			Your answer:
			</div>
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

function getData($question, $answer){
	$conn = db_connect();
				 
	
	$sql = "SELECT $question FROM surveyresults WHERE $question = '$answer'";
	$result = mysqli_query($conn, $sql);
	$number = mysqli_num_rows($result);
	echo $number;
	
	$conn->close();	
}


?>
