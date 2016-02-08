<!doctype html>
<html>
<head>
	<meta http-equiv="refresh" content="10">
	<link rel="icon" href="weltec-icon.png" type="img/png"/>
	<title>Statistics Page</title>
	<?php
		session_start();
		include 'DBlogin.php';


		$QuestionSet = $_SESSION['QuestionSet'];
		$QuestionLabel = $_SESSION['QuestionLabel'];
		$Username = $_SESSION['username'];
		
		if ($QuestionSet == "" && $QuestionLabel == "")
		{
			
		}
		else
		{
	
		// get the count of answer A
		$sqlA ="SELECT COUNT(ua.a_id) as countA
				FROM UserAnswer as ua
				inner join
				answer as a on a.a_id = ua.a_id
				inner join question as q on q.q_id = a.q_id
				inner join questionset as qs on qs.qs_id = q.qs_id
				WHERE
				ua.s_id = (Select
							s.s_id
							from
							session as s
							inner join user as u on u.u_id = s.u_id
							where
							u.username = '$Username' and s.sessionValid = '1')

				and qs.questionSetName = '$QuestionSet'
				and q.questionLabel = '$QuestionLabel'
				and a.answerLabel = 'A'";
		
		// get the count of answer B
		$sqlB = "SELECT COUNT(ua.a_id) as countB
				FROM UserAnswer as ua
				inner join
				answer as a on a.a_id = ua.a_id
				inner join question as q on q.q_id = a.q_id
				inner join questionset as qs on qs.qs_id = q.qs_id
				WHERE
				ua.s_id = (Select
							s.s_id
							from
							session as s
							inner join user as u on u.u_id = s.u_id
							where
							u.username = '$Username' and s.sessionValid = '1')

				and qs.questionSetName = '$QuestionSet'
				and q.questionLabel = '$QuestionLabel'
				and a.answerLabel = 'B'";
				
		// get the count of answer C
		$sqlC = "SELECT COUNT(ua.a_id) as countC
					FROM UserAnswer as ua
					inner join
					answer as a on a.a_id = ua.a_id
					inner join question as q on q.q_id = a.q_id
					inner join questionset as qs on qs.qs_id = q.qs_id
					WHERE
					ua.s_id = (Select
								s.s_id
								from
								session as s
								inner join user as u on u.u_id = s.u_id
								where
								u.username = '$Username' and s.sessionValid = '1')

					and qs.questionSetName = '$QuestionSet'
					and q.questionLabel = '$QuestionLabel'
					and a.answerLabel = 'C'";
		
		// get the count of answer C
		$sqlD = "SELECT COUNT(ua.a_id) as countD
					FROM UserAnswer as ua
					inner join
					answer as a on a.a_id = ua.a_id
					inner join question as q on q.q_id = a.q_id
					inner join questionset as qs on qs.qs_id = q.qs_id
					WHERE
					ua.s_id = (Select
								s.s_id
								from
								session as s
								inner join user as u on u.u_id = s.u_id
								where
								u.username = '$Username' and s.sessionValid = '1')

					and qs.questionSetName = '$QuestionSet'
					and q.questionLabel = '$QuestionLabel'
					and a.answerLabel = 'D'";
		
		
			
		$resultA = mysqli_query($connection,$sqlA);
		while($row = mysqli_fetch_array($resultA)) 
		{
			echo "<i>Total answers for A is</i> <b>" . $row['countA']. "</b><br>";
			$countA = $row['countA'];
			// put the result of counter into $_SESSION
			$_SESSION['countA'] = $countA;
		}
		
		$resultB = mysqli_query($connection,$sqlB);
		while($row = mysqli_fetch_array($resultB)) 
		{
			echo "<i>Total answers for B is</i> <b>" . $row['countB']. "</b><br>";
			$countB = $row['countB'];
			$_SESSION['countB'] = $countB;
		}
		
		$resultC = mysqli_query($connection,$sqlC);
		while($row = mysqli_fetch_array($resultC)) 
		{
			echo "<i>Total answers for C is</i> <b>" . $row['countC']. "</b><br>";
			$countC = $row['countC'];
			$_SESSION['countC'] = $countC;	
		}
		
		$resultD = mysqli_query($connection,$sqlD);
		while($row = mysqli_fetch_array($resultD)) 
		{
			echo "<i>Total answers for D is</i> <b>" . $row['countD']. "</b><br>";
			$countD = $row['countD'];
			$_SESSION['countD'] = $countD;	
			 
		}
	}	

	?>
	<!--Load the AJAX API-->
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript">

	  // Load the Visualization API and the piechart package.
	  google.load('visualization', '1.0', {'packages':['corechart']});

	  // Set a callback to run when the Google Visualization API is loaded.
	  google.setOnLoadCallback(drawChart);

	  // Callback that creates and populates a data table,
	  // instantiates the pie chart, passes in the data and
	  // draws it.
   
	  function drawChart() {
	
		// Create the data table.
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Choice');
		data.addColumn('number', 'Students');
		data.addRows([
		  ['A', <?php echo $_SESSION['countA']; ?>],
		  ['B', <?php echo $_SESSION['countB']; ?>],
		  ['C', <?php echo $_SESSION['countC']; ?>],
		  ['D', <?php echo $_SESSION['countD']; ?>]
		]);
		// Set chart options
		var options = {'title':'Answer Statistics',
					   'width':800,
					   'height':500};
		// Instantiate and draw our chart, passing in some options.
		var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
		chart.draw(data, options);
	  }
	  
	</script>
</head>

<body>
	<!--Div that will hold the bar chart-->
	<div id="chart_div"></div>

</body>
</html>
