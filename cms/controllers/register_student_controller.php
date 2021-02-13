<?php
include_once("../includes/connection.php");

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
$password = $_POST['inputPassword'];
$confirm_password = $_POST['inputConfirmPassword'];
$photo = null;
$status = 1;

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

    $select_query = "select id, email, semester from students where (name = '$name' and father = '$father') or (phone = '$phone' or email = '$email') and status = 1";
    $result = mysqli_query($conn, $select_query);
    $row = mysqli_fetch_row($result);
    if ($row[0] > 0 && $row[1] == $email && $row[2] == $semester || $password != $confirm_password) {
        echo "error";
        header('location:../student_add_error.php');
    } else {
        $insert_query = "insert into students(name,father,phone,email,address,dob,course,session,password,photo,status,year,semester) values('$name','$father','$phone','$email','$address','$dob','$course','$session','$password','$photo','$status','$year','$semester')";
        try {
            $result = mysqli_query($conn, $insert_query);
            //echo $result;
            move_uploaded_file($_FILES['file']['tmp_name'], $target);
            $get_id = "select id from students where email = '$email'";
            $get_result = mysqli_query($conn, $get_id);
            $get_row = mysqli_fetch_row($get_result);
            header('location:../student_add_success.php?id='.$get_row[0]);
        } catch (Exception $err) {
            echo $err;
        }

        
    }
} catch (Exception $err) {
    echo $err;
}
