<?php
include_once("../includes/connection.php");

$select_query = "select course from courses";
$result = mysqli_query($conn, $select_query);

while($row = mysqli_fetch_row($result)){
    $data[] = array($row[0]);
}
echo json_encode($data);
?>