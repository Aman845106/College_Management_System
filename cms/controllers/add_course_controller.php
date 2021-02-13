<?php
include_once("../includes/connection.php");
$course = $_POST['course'];
//echo $course;
$insert_query = "insert into courses(course) values('$course')";
$result = mysqli_query($conn, $insert_query);

echo ($result);
?>