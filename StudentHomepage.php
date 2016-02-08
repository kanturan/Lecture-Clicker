<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" /> 
	<title>Student Homepage</title>
	<link rel="icon" href="weltec-icon.png" type="img/png"/>
	<!--<script>
		window.onload = function() {
			if(!window.location.hash) {
				window.location = window.location + '#loaded';
				window.location.reload();
			}
		}
	</script>-->
	<script>
		function getSession(str) {
			if (str == "") {
				document.getElementById("txtHint").innerHTML = "";
				return;
			} else { 
				if (window.XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else {
					// code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open("GET","getSession.php?q="+str,true);
				xmlhttp.send();
			}
		}
	</script>		

</head>

<body align="center">
	<div class="all">
    	<div class="header"align="center"><a id="home"></a>
			<div class="logo"><br><br><br>
            	<img src="weltec-logo-vertical.png" height="150" width="100"><br><img src="divider.png" alt="" width="160px" class="pull-right">
            </div>
            <div class="menu">
				<a href="Student Homepage.html">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="ChangePassword.html">Change Password</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="logout.php">Logout</a>
            </div>
    	</div>
		<div class="dropdown">
			<br><br><b>Instructor:</b> <br>
<?php
include 'DBlogin.php';

	// get all of the instructor from database
	$sql = "select username from user where usertype = 'instructor'";
	$result = mysqli_query($connection,$sql);

	echo '<form name="select-instructor">';
	echo '	<select name="instructor" onchange="getSession(this.value)">';
	echo "<option value = ''>" ."Select Instructor". "</option>";
	
	while($row = mysqli_fetch_array($result)) 
	{
		echo "<option value = '$row[username]'>" .ucwords($row['username']). "</option>";		
	}
	echo '</select>';
	echo '</form>';
				
?>
		</div>
		<br><br><b>
		<div id="txtHint"><br></div>
		</b><br>
	</div>
	<footer><h6>© 2015 Lecture Clicker. All Rights Reserved.</h6></footer>
</body>
</html>

