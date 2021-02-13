<?php
include_once("../includes/connection.php");
$student_id = $_POST['id'];

$select_query = "select s.id, s.name, s.father, s.course, s.semester, r.std_id, r.sub_name, r.marks from students 
as s inner join results as r on s.id = r.std_id where s.id = '$student_id'";
$result = mysqli_query($conn, $select_query);
$row_count = mysqli_num_rows($result);
if ($row_count > 0) {
    while ($row = mysqli_fetch_row($result)) {
        $data[] = array($row);
    }

    echo json_encode($data);
} else {
    echo "-1";
}
