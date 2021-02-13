<?php
include_once("../includes/connection.php");
$subjects = $_POST['subjects'];
$marks = $_POST['marks'];
$std_id = $_POST['id'];

$check_result = "select id from results where std_id = '$std_id'";
$xx = mysqli_query($conn, $check_result);
$dd = mysqli_fetch_row($xx);
if ($dd[0] > 0) {
    echo "wrong";
} else {
    $subjects_array = explode(',', $subjects);
    $marks_array = explode(',', $marks);

    $count = count($subjects_array);
    $flag = 0;

    //print_r($subjects_array);

    for ($i = 0; $i < $count; $i++) {
        $insert_result = "insert into results(std_id, sub_name, marks) values('$std_id','$subjects_array[$i]','$marks_array[$i]')";
        $result = mysqli_query($conn, $insert_result);
        $flag++;
    }
    if ($flag > 1) {
        echo "saved";
    }
}

//$data = json_encode($data);
