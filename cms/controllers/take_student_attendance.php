<?php
include_once("../includes/connection.php");
$std_id = $_POST['id'];
$course = $_POST['course'];
$subject = $_POST['subject'];
$semester = $_POST['semester'];
$status = $_POST['status'];
$date = date('m/d/Y');
//echo $course;

//check if attendance already taken-------------------------------------
$check_attendance = "select std_id from attendance where date = '$date' and subject = '$subject'";
$result_attendance = mysqli_query($conn, $check_attendance);
$row_attendance = mysqli_fetch_row($result_attendance);
if($row_attendance[0] > 0){
    echo 0;
}
else{
    if($status == "present"){
        $insert_query = "insert into attendance(std_id,course,subject,semester,attendance,date) values('$std_id','$course','$subject','$semester','Present','$date')";
    }
    else if($status == "absent"){
        $insert_query = "insert into attendance(std_id,course,subject,semester,attendance,date) values('$std_id','$course','$subject','$semester','Absent','$date')";
    }
    $result = mysqli_query($conn, $insert_query);
    echo $result;
}
