<!doctype html>
<html>
<?php
	session_start();
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" /> 
	<title>Session Homepage</title>
	<link rel="icon" href="weltec-icon.png" type="img/png"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script>
		$(document).ready(function(){
		  $("button").click(function(){
			$("#navigator").toggle();
		  });
		});
	</script>
	<script>
		function showquestion(str) {
			if (str == "") {
				document.getElementById("showquestion").innerHTML = "";
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
						document.getElementById("showquestion").innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open("GET","showquestion.php?q="+str,true);
				xmlhttp.send();
			}
		}
	</script>
	<script>
		function getQuestion(str) {
			if (str == "") {
				document.getElementById("getQuestionSet").innerHTML = "";
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
						document.getElementById("getQuestionSet").innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open("GET","getQuestion.php?q="+str,true);
				xmlhttp.send();
			}
		}
	</script>
	<script>
		function getQuestionAnswer(str) {
			if (str == "") {
				document.getElementById("getQuestionAnswer").innerHTML = "";
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
						document.getElementById("getQuestionAnswer").innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open("GET","getQuestionAnswer.php?q="+str,true);
				xmlhttp.send();
			}
		}
	</script>
	<script>
		(function($){
			$(document).ready(function(){
				$.ajaxSetup({
					cache: false,
					beforeSend: function() {
						$('#studentList').hide();
						$('#loading').show();},
					complete: function() {
						$('#loading').hide();
						$('#studentList').show();},
					success: function() {
						$('#loading').hide();
						$('#studentList').show();}
				});
				var $container = $("#studentList");
				$container.load("getStudentList.php");
				var refreshId = setInterval(function()
				{$container.load('getStudentList.php');}, 9000);
			});
		})(jQuery);
	</script>
	<style>
		#table{
			width: 100%;
			font-size: 12px;
			background-color: #d3d3d3;
			border-style: groove;
			align: center;
		}
		#navigator{
			float: left; 
			width: 30%;
			height: 500px;
		}
		#courses{
			float: left; 
			width: 30%;
			height: 500px;
		}
		#question-sets{
			float: left; 
			width: 30%;
			height: 500px;
		}
		#questions{
			float: left; 
			width: 30%;
			height: 500px;
		}
		#blank-space{
			float: left; 
			width: 3%;
			height: 500px;
		}
		#content{
			float: right; 
			width: 67%;
			height: 500px;
		}
		#students{
			float: right;
			width: 20%;
			height: 500px;
		}
		select{
			width: 100px;
			height: 400px;
			border: 2px solid #888;
			border-style: groove;
		}
		button{
			width: 2.5em;
			height: 500px;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
			color: #33cc33;
			background: #0000FF;
		}
	</style>
</head>

<body>
	<div id="header" align="center"><a id="home"></a>
		<div id="logo"><br><br><br>
			<img src="weltec-logo-vertical.png" height="150" width="100"><br><img src="divider.png" alt="" width="160px" class="pull-right">
		</div>
		<div id="menu">
			<a href="#home">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="InstructorHomepage.php">Instructor Homepage</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="logout.php">Logout</a>
		</div>
	</div>
	<br><br>
	<div id="table">
		<div id="navigator">
		<h4 align="center"> Menu </h4>
			<div id="blank-space">&nbsp;</div>
			<div id="courses">
				<b>Courses</b> <br><br>
				
				<?php 
					include 'DBlogin.php';
					
					// get the courname from database
					$sql ="SELECT coursename FROM `course` ";
					$result = mysqli_query($connection,$sql);
					echo '<select name="select-courses" onchange="showquestion(this.value)" "multiple="multiple" style="width: 100px;" size="18">';
					while($row = mysqli_fetch_array($result)) {
					echo "<option value = '$row[coursename]'>" .$row['coursename']. "</option>";
					}
					echo "</select>";
					mysqli_close($connection);	
				?>
			</div>
			<div id="blank-space">&nbsp;</div>
			<div id="question-sets"> 
				<div id="showquestion"></div>		
			</div>
			<div id="blank-space">&nbsp;</div>	
			<div id="questions"> 
				<div id="getQuestionSet"></div>		
			</div>			
		</div>
		
		<button><b><<</b></button>  <!-- Button to toggle navigator -->
			
		<div id="content">  <!-- Q&A and Student List -->
			<div id="students"> 
				<div id="wrapper">  <!-- Refreshes student list -->
					<div id="studentList"></div>
						<img id="loading"  style="display:none;" />
				</div>
			</div>
			<div id="getQuestionAnswer"></div>	<!-- Content Questions and Answers box -->
			<!--<div id ="getStudentAnswer"></div>  --><!-- Content Shows total number of answers --> 
		</div>
	</div>
	<div id="end" align="center">  <!-- Ends a Session -->
		<form method="get" action="InstructorHomepage.php" onclick='alert("Session Ended")'>
			<br><br><input type="submit" value="End Session"></input>
		</form>
	</div>
    <footer><h6 align="center">© 2015 Lecture Clicker. All Rights Reserved.</h6></footer>
</body>
</html>
