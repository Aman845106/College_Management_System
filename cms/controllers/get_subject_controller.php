<?php
include_once("../includes/connection.php");
$semester = $_POST['semester'];
$course = $_POST['course'];
$select_query = "select subject from subjects where course = '$course' and semester = '$semester'";
$result = mysqli_query($conn, $select_query);
$i = 0;
while($row = mysqli_fetch_row($result)){
    $data[] = array($row[0]);
}
echo json_encode($data);
?>