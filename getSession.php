<?php
session_start();
include 'DBlogin.php';
	
	$Name = $_GET['q'];
	
	//Get the session for student
	$sql = "select session.sessionName from session, user 
			where user.u_id = session.u_id and user.username = '$Name' and sessionvalid = '1'";

	$result = mysqli_query($connection,$sql);
	
	while($row = mysqli_fetch_array($result)) 
	{
		echo '<a href="joinSession.php">'.ucwords($row['sessionName']).'</a>';
		$_SESSION['sessionName'] = $row['sessionName'];
	}

	mysqli_close($connection);
?>
