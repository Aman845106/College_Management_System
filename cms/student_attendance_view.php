<?php
error_reporting(E_WARNING | E_PARSE);
session_start();
if ($_SESSION['priv'] == "student") {
    include_once('includes/student_header.php');
    include_once('includes/connection.php');
}
?>
<?php 
$id = $_SESSION['id'];
echo '<input type="hidden" id="std_id" value="'.$id.'">';
?>
<div class="row textshadow boxshadow formtexture form-center">
    <div class="col-lg-12">
        <div class="col-lg-12">
            <div style="margin-bottom:20px;">
                <h2><label style="margin-left:20px; text-decoration:underline" for="legend" style="margin-left:10px;">
                        Search Attendance
                    </label></h2>
                <hr class="newhr">
            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            <input type="text" required maxlength="5" class="form-control textbox-transparent controlshodow" id="inputSearchDate" name="inputSearchDate" placeholder="Date">
        </div>
    </div>

    <div class="col-sm-6">
        <button type="button" id="load_attendance" class="btn btn-primary" onclick="load_searched_attendance()">Load Attendance</button>
    </div>

    <div class="col-lg-12">

        <hr class="newhr">
        <table class="table">
            <thead>
                <tr class="table-danger">
                    <th scope="col">Subject</th>
                    <th scope="col">Attendance</th>
                </tr>
            </thead>
            <tbody id="attendance_details">

            </tbody>
        </table>
    </div>
</div>


<?php
include_once('includes/footer.php');
?>

<script>
    $('#inputSearchDate').datepicker({
        autoclose: true
    });

    function load_searched_attendance() {
        var date = $('#inputSearchDate').val();
        if (date == "") {
            alert("Please select date.");
        } else {
            $('#attendance_details').html("");
            var id = $('#std_id').val();
            var dataString = 'date=' + date +'&id=' +id;
            $.ajax({

                url: "controllers/student_attendance_view_controller.php",
                method: "post",
                data: dataString,
                success: function(data) {
                    console.log(data);
                    data = JSON.parse(data);
                    if (data) {
                        $('#attendance_details').append(data);

                    } else {
                        alert("No data found.");
                    }
                },
                error: function(err) {
                    alert("Error");
                    console.error(err);
                }

            })
        }
    }
</script>