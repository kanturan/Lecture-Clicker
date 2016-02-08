<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" /> 
	<title>Student Answer Page</title>
	<link rel="icon" href="weltec-icon.png" type="img/png"/>
	<style>
		fieldset{
			font-family: sans-serif;
			border: 1px solid #ffffff;
			background: -webkit-linear-gradient(white, grey); /* For Safari 5.1 to 6.0 */
			background: -o-linear-gradient(white, grey); /* For Opera 11.1 to 12.0 */
			background: -moz-linear-gradient(white, grey); /* For Firefox 3.6 to 15 */
			background: linear-gradient(white, grey); /* Standard syntax (must be last) */
		}
	</style>
</head>

<body align="center">
	<div class="all">
    	<div class="header"align="center"><a id="home"></a>
			<div class="logo"><br><br>
            	<img src="weltec-logo.png"  height="70px"><br><img src="divider.png" alt="" width="160px" class="pull-right">
            </div>
    	</div>

<?php
error_reporting(0);
session_start();
include 'DBlogin.php';
	
	$sessionName = $_SESSION['sessionName'];
	$studentName = $_SESSION['username'];
	
	if(isset($_POST['next']))
	{
		$a=$_POST['a'];
	}
	if(!isset($a))
	{
		$a=0;
	}	
	
	//Display question label
	$sql = "
	select 
	q.questionLabel,
	q.questionDesc
	from
	question as q
	inner join session as s on s.qs_id = q.qs_id
	where
	s.sessionName = '$sessionName'
	and s.sessionValid = 1 LIMIT 1 OFFSET $a" ;

	$result = mysqli_query($connection,$sql);
	$num_rows = mysqli_num_rows($result);

	echo "<form method='post' action='' align='center'>";
	
	$questionDesc = "";
	
	while($row = mysqli_fetch_array($result)) 
	{
		echo "<b>Question #".$row['questionLabel']."</b><br>";
		echo "<input type='hidden' value='$row[questionDesc]' name='questionDesc'>"; 
		
		$_SESSION['questionDesc'] = $row['questionDesc'];
		$questionDesc = $_SESSION['questionDesc'];			
	}
	
	// display answer label
	if ($questionDesc == " ")
	{
	}
	else
	{
		$sql2 = "
			Select
			a.answerLabel,
			a.answerDesc
			from
			answer as a
			inner join question as q on q.q_id = a.q_id
			where
			q.questionDesc = '$questionDesc'";
		
	$result2 = mysqli_query($connection,$sql2);
	
	while($row = mysqli_fetch_array($result2))
	{
		echo "<fieldset data-role='controlgroup'><input type='radio' id='radio-choice-$row[answerLabel]' value='$row[answerLabel]' name='answerLabel'/><label style='text-align:center;' for='radio-choice-$row[answerLabel]'>".$row[answerLabel]."</label></fieldset>";
			
	}
	}
	
	$selected_val = "";
	$selected_desc = "";
	
	// save students answer and label
	if(isset($_POST['next']))
	{
	$selected_val = $_POST['answerLabel']; 
	$selected_desc = $_POST['questionDesc']; 
	}
	
	// add the answer into database UserAnswer table
	$sql3 = "INSERT INTO useranswer(u_id,a_id,s_id)
			VALUES (
					(
					SELECT
					u_id
					FROM
					user
					WHERE
					username = '$studentName'
					),
				(
					SELECT
					a.a_id
					FROM
					answer as a
					INNER JOIN question as q on a.q_id = q.q_id
					WHERE
					q.questionDesc = '$selected_desc' and a.answerLabel = '$selected_val'),
				(
					SELECT
					s.s_id
					FROM
					session as s
					WHERE
					s.sessionName = '$sessionName' and sessionValid = '1')
				)" ;
	
	$result3 = mysqli_query($connection,$sql3);

	$b=$a+1;
	echo "<br>"."<input type='hidden' value='$b' name='a'>";
	
	if ($num_rows == 1){
		echo "<input type='submit' name='next' value='Next' > ";
	}	
	echo "</form>";	
	
	if ($num_rows != 1){
	echo "<font color='red'><i>Session has Ended!</i></font>";
	echo "<form method='get' action='StudentHomepage.php' align='center'>";
	echo "<br>"."<input type ='submit' value='Back to Homepage'>";
	echo "</form>";
	}
	mysqli_close($connection);
?>

	</div>
</body>
</html>
