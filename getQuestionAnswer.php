<?php
include 'DBlogin.php';
session_start();
	
	//Save questionDesc
	$QuestionLabel = $_GET['q'];
	$QuestionSet = $_SESSION['QuestionSet'];
	$_SESSION['QuestionLabel'] =$QuestionLabel;
	
	//Display question label and  description 
	$sql = "select
			q.questionDesc
			from
			question as q
			inner join questionset as qs on qs.qs_id = q.qs_id
			where
			q.questionLabel = '$QuestionLabel'
			and qs.questionSetName = '$QuestionSet'";

	$result = mysqli_query($connection,$sql);

	echo "<b><br>Question<b><br><br>";
	echo "<div style='background-color: #FFFFFF; width: 50%; border-style: groove;'>";
	
	while($row = mysqli_fetch_array($result)) 
	{
		echo "<textarea style='resize: none; border:none; width: 95%; height: 5em; font-size: 200%;' value = '$row[questionDesc]'>" .$row['questionDesc']. "</textarea><br>";
		
		$_SESSION['questionDesc'] = $row['questionDesc'];
		$QuestionDesc = $_SESSION['questionDesc'];
	}
	
	// display answer label and description
	$sql2 = "
		Select
		a.answerLabel,
		a.answerDesc
		from
		answer as a
		inner join question as q on q.q_id = a.q_id
		where
		q.questionDesc = '$QuestionDesc'";
			
	$result2 = mysqli_query($connection,$sql2);

	while($row = mysqli_fetch_array($result2)) 
	{
		echo "<textarea style='resize: none; border:none; width: 95%; height: 3em; font-size: 120%;' value = '$row[answerLabel]'>" .$row['answerLabel'].  "    ".$row['answerDesc']."</textarea>"."<br>";	
	}	
	echo "</div>";
	echo "<br><br><form method='get' action='stat.php' target='right'><input type='submit' value='Show Chart'></input></form>";
					
mysqli_close($connection);
?>
