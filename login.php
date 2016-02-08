<?php
include 'DBlogin.php';
session_start();
		
	$Tname = $_POST["Tname"];
	$Password = $_POST["password"];
	$_SESSION['username']=$Tname;

	// check username and password
	$sql = "SELECT u_id,username,userType,password FROM user WHERE username='$Tname' AND password='$Password'";
	$result = mysqli_query($connection,$sql);
	$num = mysqli_fetch_array($result);
	
	
	//Put the data inside 
	$UserID = $num['u_id'];
	$username = $num['username'];
	$DBpassword = $num['password'];
	$UserType = $num['userType'];
	
	$_SESSION['type'] = $UserType;
	$_SESSION['userID'] = $UserID;
	
	//save sessionName
	$sql2 = "select session.sessionName from session, user where user.u_id = session.u_id and user.username = '$Tname' and sessionvalid = '1'";
	$result2 = mysqli_query($connection,$sql2);
	$num = mysqli_fetch_array($result2);
	
	//put sessionName into the array
	$SessionName = $num["sessionName"];
	$_SESSION['sessionName']=  $SessionName;
	
	//check usertype
if ( $Tname == $username and $Password == $DBpassword)
{
	if($UserType == "student")
    {
		header('location: StudentHomepage.php');  
		exit();
    }
	else if($UserType == "instructor")
    {
		header('location: InstructorHomepage.php');  
		exit();
    }
}
	else
		header('location: loginError.html');  
        exit();
	
mysqli_close($connection);
  
?>
