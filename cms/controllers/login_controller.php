<?php
session_start();
include_once("../includes/connection.php");
$priv = $_POST['privilages'];
$email = $_POST['inputEmail'];
$password = $_POST['inputPassword'];
$select_query = "";
 //echo $priv.$email.$password;

if ($priv == "super_admin") {
    $select_query = "select id from super_admin where email = '$email' and password = '$password' and status = 1";
    $result = mysqli_query($conn, $select_query);
    $row = mysqli_fetch_row($result);

    if ($row[0] > 0) {
        
            $_SESSION['id'] = $row[0];
            $_SESSION['priv'] = $priv;
            header('location:../super_admin_home.php');
        
    } else {
        header('location:../login_error.php');
    }
} else if ($priv == "hod") {
    $select_query = "select id from hod where email = '$email' and password = '$password' and status = 1";
    $result = mysqli_query($conn, $select_query);
    $row = mysqli_fetch_row($result);

    if ($row[0] > 0) {
       
            $_SESSION['id'] = $row[0];
            $_SESSION['priv'] = $priv;
            header('location:../hod_home.php');
        
    } else {
        header('location:../login_error.php');
    }
} else if ($priv == "teacher") {
    $select_query = "select id from teacher where email = '$email' and password = '$password' and status = 1";
    $result = mysqli_query($conn, $select_query);
    $row = mysqli_fetch_row($result);

    if ($row[0] > 0) {
        
            $_SESSION['id'] = $row[0];
            $_SESSION['priv'] = $priv;
            header('location:../teacher_home.php');
        
    } else {
        header('location:../login_error.php');
    }
} else if ($priv == "student") {
    $select_query = "select id from students where id = '$email' and password = '$password' and status = 1";
    $result = mysqli_query($conn, $select_query);
    $row = mysqli_fetch_row($result);

    if ($row[0] > 0) {
            $_SESSION['id'] = $row[0];
            $_SESSION['priv'] = $priv;
            header('location:../student_home.php');
        
    } else {
        header('location:../login_error.php');
    }
}
