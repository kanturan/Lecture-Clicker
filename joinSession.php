<?php
session_start();
include 'DBlogin.php';

	$sessionName = $_SESSION['sessionName'];
	$studentName = $_SESSION['username'];
	
	//Get the session for student
	$sql = "INSERT INTO usersession(u_id,s_id)
			VALUES (
					(
					SELECT
					u_id
					FROM
					user
					WHERE
					username = '$studentName'),
					(
					SELECT
					s_id
					FROM
					session
					WHERE
					sessionName = '$sessionName')
					)";

	$result = mysqli_query($connection,$sql);

	mysqli_close($connection);
	header("refresh: 0; url=addStudentAnswer.php");
	exit();  
?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" /> 
	<title>Student Answer Page</title>
	<link rel="icon" href="weltec-icon.png" type="img/png"/>
</head>

</html>
