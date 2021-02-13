<?php
include_once("../includes/connection.php");

$noticetitle = $_POST['inputNoticeTitle'];
$date = date("m/d/Y");
$pdf_name = $_FILES['file']['name'];
if ($pdf_name != "") {
    $pdf_ext = pathinfo($pdf_name, PATHINFO_EXTENSION);
    $time = date("mjYHis");
    $target = "../pdfiles/" . $time . "." . $pdf_ext;
    $noticepdf = $time . "." . $pdf_ext;
} else {
    $noticepdf = null;
}
try {
    $insert_query = "insert into notice(notice,date,noticepdf) values('$noticetitle','$date','$noticepdf')";
    try {
        $result = mysqli_query($conn, $insert_query);
        //echo $result;
        move_uploaded_file($_FILES['file']['tmp_name'], $target);
        header('location:../notice_create.php');
    } catch (Exception $err) {
        echo $err;
    }
} catch (Exception $err) {
    echo $err;
}
