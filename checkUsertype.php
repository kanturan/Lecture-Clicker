<?php
session_start();

$UserType = $_SESSION['type'];


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
?>
