<?php
error_reporting(E_WARNING | E_PARSE);
session_start();
if ($_SESSION['priv'] == "student") {
    include_once('includes/student_header.php');
    include_once('includes/connection.php');
}
$select_query = "select * from notice order by date desc limit 10";
$result = mysqli_query($conn, $select_query);
?>
<div class="form-horizontal form-group textshadow boxshadow formtexture form-center">
<h2><label>Notice</label></h2>
    <ol class="list-group">
        <?php
        while ($row = mysqli_fetch_row($result)) {
            echo '<li class="list-group-item list-group-item-warning d-flex justify-content-between align-items-center">
                <a href="pdfiles/' . $row[3] . '" target="_blank">(' . $row[2] . ') -- ' . $row[1] . '</a>
            </li>';
        }
        ?>
    </ol>
</div>


<?php
include_once('includes/footer.php');
?>