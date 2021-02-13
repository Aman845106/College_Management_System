<?php
include_once("../includes/connection.php");
$id = $_POST['id'];

$date = $_POST['date'];

$select_query = "select subject, attendance from attendance where std_id = '$id' and date = '$date'";
$data = "";
$result = mysqli_query($conn, $select_query);
while($row = mysqli_fetch_row($result))
        
        {$data .= '<tr class="table-warning" id="row' . $row[0] . '">
        <td><label id="tbl_id">' . $row[0] . '</label></td>            
        <td><label id="tbl_name">' . $row[1] . '</label></td>
        </tr>';}
    
$data = json_encode($data);
echo $data;
?>
