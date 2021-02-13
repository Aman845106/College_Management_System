<?php
include_once("../includes/connection.php");
$student_fees = $_POST['fees'];
$student_id = $_POST['id'];
$student_name = $_POST['name'];
$student_father = $_POST['father'];
$student_course = $_POST['course'];
$student_session = $_POST['session'];
$student_year = $_POST['year'];
$date = date('m/d/Y');



$insert_query = "insert into fees(std_id,std_name,std_father,std_course,std_session,std_year,date,fees) values('$student_id','$student_name','$student_father','$student_course','$student_session','$student_year','$date','$student_fees')";
$result = mysqli_query($conn, $insert_query);
$data = json_encode($result);
echo json_encode($data);
?>