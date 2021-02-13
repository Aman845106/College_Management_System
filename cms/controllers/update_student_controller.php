<?php
include_once("../includes/connection.php");
$id = $_POST['inputId'];
$name = $_POST['inputName'];
$father = $_POST['inputFather'];
$phone = $_POST['inputPhone'];
$email = $_POST['inputEmail'];
$address = $_POST['inputAddress'];
$dob = $_POST['inputDOB'];
$course = $_POST['inputCourse'];
$session = $_POST['inputSession'];
$year = $_POST['inputYear'];
$semester = $_POST['inputSemester'];
$photo = null;

$avatar_name = $_FILES['file']['name'];
if ($avatar_name != "") {
    $avatar_ext = pathinfo($avatar_name, PATHINFO_EXTENSION);
    $time = date("mjYHis");
    $target = "../images/" . $time . "." . $avatar_ext;
    $photo = $time . "." . $avatar_ext;
} else {
    $photo = null;
}
try {
    $update_query = "update students set name = '$name', father = '$father',phone = '$phone',email = '$email',address = '$address',dob = '$dob',course = '$course', session = '$session', year = '$year', semester = '$semester', photo = '$photo' where id = '$id'";
    try {
        $result = mysqli_query($conn, $update_query);

        move_uploaded_file($_FILES['file']['tmp_name'], $target);

        echo $result;
        header('location:../student_add_success.php');
    } catch (Exception $err) {
        echo $err;
    }
} catch (Exception $err) {
    echo $err;
    header('location:../student_add_error.php');
}
