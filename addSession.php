<?php
include 'DBlogin.php';
Session_start();
	
	$NameS = $_GET["sname"];
	$userName = $_SESSION['username'];
	$userID = $_SESSION['userID'];


	//update valid = 0;
	$sql = "UPDATE session
			INNER JOIN user ON
			user.u_id = session.u_id
			and user.username = '$userName'
			SET sessionValid = '0'";
	
	$result = mysqli_query($connection,$sql);

	// add session
	$sql2 =  "INSERT INTO session(u_id,sessionName,sessionValid)
			VALUES ('$userID','$NameS','1')";


	$result2 = mysqli_query($connection,$sql2);

	//save session name
	$sql3 = "select session.sessionName from session, user where user.u_id = session.u_id and user.username = '$userName' and sessionvalid = '1'";
	$result3 = mysqli_query($connection,$sql3);
	 
	$num = mysqli_fetch_array($result3);
	$SessionName = $num["sessionName"];
	$_SESSION['sessionName']=  $SessionName;


	
mysqli_close($connection);
header('location: InstructorHomepage.php');   
exit();   
   
?>

