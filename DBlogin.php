<?php
$connection = mysqli_connect("localhost:3306","root","Red8Hat","lecture clicker");
	
	if (!$connection) 
	{
		die('Could not connect 3: ' . mysql_error($connection));		
	}	
?>
