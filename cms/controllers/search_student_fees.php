<?php
include_once("../includes/connection.php");
$student_id = $_POST['id'];
$student_year = $_POST['student_year'];
$select_query = "select s.id, s.name, s.father, s.course, s.session, s.year, sum(f.fees) from fees as f INNER JOIN students as s on s.id = f.std_id where s.id = '$student_id' and s.year = '$student_year'";
$result = mysqli_query($conn, $select_query);
$data = mysqli_fetch_row($result);
$row = json_encode($data);
echo $row;
?>