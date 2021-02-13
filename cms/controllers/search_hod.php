<?php
include_once("../includes/connection.php");
$email = $_POST['email'];

$search = "select * from hod where email = '$email'";
$result = mysqli_query($conn, $search);
$row = mysqli_fetch_row($result);
echo json_encode($row);
?>