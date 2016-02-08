<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" /> 
	<title>Instructor Homepage</title>
	<script>
		function validateForm() 
			{
				var s = document.forms["create-session"]["sname"].value;

				if (s==null || s=="") {
					alert("Session name must be filled out!");
					return false;}

				else{
					alert("Session Created!");
					return true;}
			}
	</script>
	<link rel="icon" href="weltec-icon.png" type="img/png"/>
</head>

<body>
	<div class="all">
    	<div class="header" align="center"><a id="home"></a>
			<div class="logo"><br><br><br>
            	<img src="weltec-logo-vertical.png" height="150" width="100"><br><img src="divider.png" alt="" width="160px" class="pull-right">
            </div>
            <div class="menu">
				<a href="#home">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#create">Create New Session</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="ChangePassword.html">Change Password</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="logout.php">Logout</a>
            </div>
    	</div>
        <div class="view-session" align="center" style="height:806.68px; -webkit-transition: all 0s ease; transition: all 0s ease;">
			<h4><b>Welcome,</b></h4>
			<h4>
				<?php
					session_start();
					//Display the name of instructor
					$_SESSION['username'] = ucwords($_SESSION['username']);
					echo $_SESSION['username'];
					echo "<br><br>";
					$_SESSION['sessionName'] = ucwords($_SESSION['sessionName']);
					echo '<a href="SessionHomepage.php">'.$_SESSION['sessionName'].'</a>';
				?>
			</h4>
        </div>
        <div class="create-sessions" align="center" style="height:806.68px; -webkit-transition: all 0s ease; transition: all 0s ease;">
        	<div class="header2">
				<div class="logo">
					<a id="create"><img src="weltec-logo-vertical.png" height="150" width="100"></a><br><img src="divider.png" alt="" width="160px" class="pull-right">
             	</div>
             	<div class="menu">
					<a href="#home">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#create">Create New Session</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="ChangePassword.html">Change Password</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="logout.php">Logout</a>
             	</div>
    		</div>
            <h3>
				Create a Session<br><br>
				<h5>Session name:</h5>
				<form name="create-session" method="get" action="addSession.php" onsubmit="return validateForm()">
					<input type="text" name="sname"><br><br>
					<input type="submit" value="Submit">
				</form>
            </h3>
        </div>
	</div>
    <footer><h6 align="center">© 2015 Lecture Clicker. All Rights Reserved.</h6></footer>
</body>
</html>
