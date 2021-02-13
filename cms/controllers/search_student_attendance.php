<?php
include_once("../includes/connection.php");
$student_id = $_POST['id'];

$today = date('m/d/Y');
$data = "";

$select_query = "select id, name, father, course, semester, photo from students where id = '$student_id'";

$result = mysqli_query($conn, $select_query);
$row = mysqli_fetch_row($result);
        
        $data = '<tr class="table-warning" id="row' . $row[0] . '">
        <td><img src="images/'.$row[5].'" height="150px" width="100px" alt="No Image" class="img-thumbnail"></td> 
        <td><label id="tbl_id">' . $row[0] . '</label></td>            
        <td><label id="tbl_name">' . $row[1] . '</label></td>
        <td><label id="tbl_father">' . $row[2] . '</label></td>
        <td><label id="tbl_course">' . $row[3] . '</label></td>
        <td><label id="tbl_semester">' . $row[4] . '</label></td>
        </tr>';
    
$data = json_encode($data);
echo $data;
?>
