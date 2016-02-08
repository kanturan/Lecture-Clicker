<?php
session_start();
include 'DBlogin.php';

$SessionName = $_SESSION['sessionName'];

	// get the students name  that joined the session 
	$sql = "SELECT
			u.username
			FROM
			user as u
			inner join usersession as us on us.u_id = u.u_id
			inner join session as s on s.s_id = us.s_id
			WHERE
			s.sessionName = '$SessionName'";

$result = mysqli_query($connection,$sql);
	
	echo '<br><b>Student List </b><br><br>';
	echo '<select  style="width: 100px; height:420px; resize:none;" size="20">';

	while($row = mysqli_fetch_array($result)) 
	{
		echo '<option value = $row["username"]>'.$row['username'] ."<br>"; "</option>";
	}
	echo '</select>';
?>
