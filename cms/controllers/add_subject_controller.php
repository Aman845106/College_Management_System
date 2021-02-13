<?php
include_once("../includes/connection.php");
$course = $_POST['course'];
$year = $_POST['year'];
$semester = $_POST['semester'];
$subject = $_POST['subject'];
//echo $course.$year.$semester.$subject;
$insert_query = "insert into subjects(course,year,semester,subject) values('$course','$year','$semester','$subject')";
$result = mysqli_query($conn, $insert_query);

echo ($result);
?>