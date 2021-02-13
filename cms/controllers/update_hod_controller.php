<?php
include_once("../includes/connection.php");
$id = $_POST['inputId'];
$name = $_POST['inputName'];
$father = $_POST['inputFather'];
$phone = $_POST['inputPhone'];
$email = $_POST['inputEmail'];
$address = $_POST['inputAddress'];
$dob = $_POST['inputDOB'];
$department = $_POST['inputDepartment'];
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
    $update_query = "update hod set name = '$name', father = '$father',phone = '$phone',email = '$email',address = '$address',dob = '$dob',department = '$department', photo = '$photo' where id = '$id'";
    try {
        $result = mysqli_query($conn, $update_query);
        
        move_uploaded_file($_FILES['file']['tmp_name'], $target);
        
        echo $result;
    } catch (Exception $err) {
        echo $err;
    }

    //header('location:../hod_add_success.php');
} catch (Exception $err) {
    echo $err;
}
