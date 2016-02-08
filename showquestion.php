<?php
include 'DBlogin.php';
	//get the value of selected course
	$CourseName = $_GET['q'];
	
	//display questionSet
	$sql ="SELECT qs.questionSetName FROM questionset as qs inner join course as c on qs.c_id = c.c_id where c.courseName = '$CourseName' ";
	$result = mysqli_query($connection,$sql);

	echo "<b>Question Sets</b><br><br>";
	echo '<select name="select-question" onchange="getQuestion(this.value)" multiple="multiple" style="width: 100px;" size="18">';
	
	while($row = mysqli_fetch_array($result))
	{
		echo "<option value = '$row[questionSetName]'>" .$row['questionSetName']. "</option>";
	}
	
mysqli_close($connection);
?>
