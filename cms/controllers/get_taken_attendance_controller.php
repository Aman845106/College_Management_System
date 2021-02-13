<?php
include_once("../includes/connection.php");
$course = $_POST['course'];
$semester = $_POST['semester'];
$subject = $_POST['subject'];
$date = $_POST['date'];

$data = "";

$select_query = "select s.id, s.name, s.father, s.course, s.semester, a.attendance from students as s inner join attendance as a on s.id = a.std_id where a.course = '$course' and a.semester = '$semester' and a.subject = '$subject' and a.date = '$date'";

$result = mysqli_query($conn, $select_query);
while($row = mysqli_fetch_row($result))
        
        {$data .= '<tr class="table-warning" id="row' . $row[0] . '">
        <td><label id="tbl_id">' . $row[0] . '</label></td>            
        <td><label id="tbl_name">' . $row[1] . '</label></td>
        <td><label id="tbl_father">' . $row[2] . '</label></td>
        <td><label id="tbl_course">' . $row[3] . '</label></td>
        <td><label id="tbl_semester">' . $row[4] . '</label></td>
        <td><label id="tbl_semester">' . $row[5] . '</label></td>
        </tr>';}
    
$data = json_encode($data);
echo $data;
?>
