<?php
session_start();
include 'DBlogin.php';

	$OldPassword =$_GET["old-password"];
	$NewPassword = $_GET["password"];
	$username = $_SESSION['username'];
	
	//update password
	$sql = "select password from user where username = '$username'";
	
	$result = mysqli_query($connection,$sql);
	$num = mysqli_fetch_array($result);
	$DbPassword = $num['password'];

	//check password
	if($DbPassword == $OldPassword)
    {
	$sql2 = "UPDATE user SET password= '$NewPassword' WHERE username = '$username' ";
	
	$result2 = mysqli_query($connection,$sql2);
	
	header('location:  index.html');  
      exit();
   }
	else
		die("password incorrect");
		
mysqli_close($connection);
?>
