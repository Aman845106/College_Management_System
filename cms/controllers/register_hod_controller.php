<?php
include_once("../includes/connection.php");

$name = $_POST['inputName'];
$father = $_POST['inputFather'];
$phone = $_POST['inputPhone'];
$email = $_POST['inputEmail'];
$address = $_POST['inputAddress'];
$dob = $_POST['inputDOB'];
$department = $_POST['inputDepartment'];
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

    $select_query = "select id, email from hod where name = '$name' and father = '$father' and phone = '$phone' and email = '$email' and status = 1";
    $result = mysqli_query($conn, $select_query);
    $row = mysqli_fetch_row($result);
    if ($row[0] > 0 || $row[1] == $email || $password != $confirm_password) {
        echo "error";
        header('location:../hod_add_error.php');
    } else {
        $insert_query = "insert into hod(name,father,phone,email,address,dob,department,password,photo,status) values('$name','$father','$phone','$email','$address','$dob','$department','$password','$photo','$status')";
        try {
            $result = mysqli_query($conn, $insert_query);
            echo $result;
            move_uploaded_file($_FILES['file']['tmp_name'], $target);
        } catch (Exception $err) {
            echo $err;
        }

        header('location:../hod_add_success.php');
    }
} catch (Exception $err) {
    echo $err;
}
