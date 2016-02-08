<?php
include 'DBlogin.php';
session_start();

	//Get the value of selected questionSet
	$QuestionSet = $_GET['q'];
	$userName = $_SESSION['username'];
	$_SESSION['QuestionSet'] = $QuestionSet;

	//put the question set ID into session 
	$sql = "UPDATE session
			INNER JOIN user on session.u_id = user.u_id
			SET qs_id = (

			SELECT qs_id
			FROM questionset
			where questionSetName = '$QuestionSet')

			WHERE user.username = '$userName' and session.sessionValid = 1";
	$result = mysqli_query($connection,$sql);

	//Print questions
	$sql1 = "select
			q.questionLabel
			FROM
			question as q
			inner join questionset as qs on qs.qs_id = q.qs_id
			where
			qs.questionSetName = '$QuestionSet'";
	
	$result1 = mysqli_query($connection,$sql1);
	
	echo "<b>Questions</b><br><br>";
	echo '<select name="select-question" onchange="getQuestionAnswer(this.value)" multiple="multiple" style="width: 100px;" size="18">';
	
	while($row = mysqli_fetch_array($result1)) 
	{
		echo "<option value = '$row[questionLabel]'>" .$row['questionLabel']. "</option>";
	}
	
mysqli_close($connection);
?>
