<?php
include_once("../includes/connection.php");
$id = $_POST['id'];

$search = "select * from students where id = '$id'";
$result = mysqli_query($conn, $search);
$row = mysqli_fetch_row($result);
echo json_encode($row);
?>