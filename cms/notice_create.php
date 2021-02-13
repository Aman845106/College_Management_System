<?php
error_reporting(E_WARNING | E_PARSE);
session_start();
if ($_SESSION['priv'] == "hod") {
    include_once('includes/hod_header.php');
    include_once('includes/connection.php');
} else if ($_SESSION['priv'] == "teacher") {
    include_once('includes/teacher_header.php');
    include_once('includes/connection.php');
}
$select_query = "select * from notice order by date desc limit 10";
$result = mysqli_query($conn, $select_query);
?>
<div class="form-horizontal form-group textshadow boxshadow formtexture form-center">
    <form class="form-horizontal textshadow" enctype="multipart/form-data" method="POST" action="controllers/create_notice_controller.php">
        <div class="card text-white bg-danger mb-3">
            <div class="card-header">Add Notice</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="inputPhone" class="col-lg-2 control-label">Notice Title</label>

                    <div class="col-lg-12">
                        <input type="text" required maxlength="150" class="form-control textbox-transparent controlshodow" id="inputNoticeTitle" name="inputNoticeTitle" placeholder="Enter Notice Title">

                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPhone" class="col-lg-3 control-label">Upload notice pdf file</label>
                    <div class="col-lg-12">
                        <input type="file" required maxlength="50" class="form-control" name="file" id="uploadFile" accept="application/pdf">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-sm btn-default">Cancel</button>
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            </div>
        </div>
        <hr class="newhr">
    </form>
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