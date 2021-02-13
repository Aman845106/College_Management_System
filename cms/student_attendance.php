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

$select_course = "select course from courses";
$result = mysqli_query($conn, $select_course);

?>

<input type="hidden" id="hidden_subject" value="">

<div class="row textshadow boxshadow formtexture form-center">
    <div class="col-lg-12">

        <div style="margin-bottom:20px;">
            <h2><label style="margin-left:20px; text-decoration:underline" for="legend" style="margin-left:10px;">
                    Attendance for (<?php echo date('m/d/Y'); ?>)
                </label></h2>
            <hr class="newhr">
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            <input type="text" required maxlength="5" class="form-control textbox-transparent controlshodow" id="inputId" name="inputId" placeholder="Enter Student Id">
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-12 col-lg-offset-2">
            <button type="button" class="btn btn-primary" onclick="getStudent()">Load Student (Current Date)</button>
        </div>

    </div>

    <div class="col-lg-12">

        <hr class="newhr">
        <table class="table">
            <thead>
                <tr class="table-danger">
                    <th scope="col">Photo</th>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Father</th>
                    <th scope="col">Course</th>
                    <th scope="col">Semester</th>
                </tr>
            </thead>
            <tbody id="student_details">

            </tbody>
        </table>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            <select class="custom-select textbox-transparent" id="subject" onchange="setHiddenSubject()">
                <option value="--Select Subject--">--Select Subject--</option>

            </select>
        </div>

    </div>

    <div class="col-sm-6">
        <button type="button" id="present" class="btn btn-success" onclick="take_attendance(this.id)">Present</button>
        <button type="button" id="absent" class="btn btn-danger" onclick="take_attendance(this.id)">Absent</button>
    </div>

</div>

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
            <select class="custom-select textbox-transparent" id="search_course" onchange="">
                <option value="--Select Subject--">--Select Course--</option>
                <?php
                    while($row = mysqli_fetch_row($result)){
                        echo ' <option value="'.$row[0].'">'.$row[0].'</option>';
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <select class="custom-select textbox-transparent" id="search_semester" onchange="load_subjects_view_attendance()">
                <option value="--Select Semester--">--Select Semester--</option>
                <option value="1">1st Semester</option>
                <option value="2">2st Semester</option>
                <option value="3">3st Semester</option>
                <option value="4">4st Semester</option>
                <option value="5">5st Semester</option>
                <option value="6">6st Semester</option>
                <option value="7">7st Semester</option>
                <option value="8">8st Semester</option>
            </select>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <select class="custom-select textbox-transparent" id="search_subject" onchange="">
                <option value="--Select Subject--">--Select Subject--</option>
            </select>
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
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Father</th>
                    <th scope="col">Course</th>
                    <th scope="col">Semester</th>
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
    function getStudent() {
        var student_id = $('#inputId').val();

        $('#student_details').html("");

        //alert(student_id);

        var dataString = 'id=' + student_id;
        $.ajax({

            url: "controllers/search_student_attendance.php",
            method: "post",
            data: dataString,
            success: function(data) {
                console.log(data);
                data = JSON.parse(data);

                if (data) {
                    $('#student_details').append(data);
                    load_subjects();

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
    //-----------------------------------------------------------------------------------------------------------
    function take_attendance(status) {
        var student_id = $('#tbl_id').text();
        var student_course = $('#tbl_course').text();
        var student_semester = $('#tbl_semester').text();
        var subject = $('#subject').val();

        if (student_id == "") {
            alert("Please enter student id.");
        } else if (subject == "--Select Subject--") {
            alert("Please select subject.");
        } else {
            var dataString = 'status=' + status + '&subject=' + subject + '&id=' + student_id + '&course=' + student_course + '&semester=' + student_semester;
            $.ajax({

                url: "controllers/take_student_attendance.php",
                method: "post",
                data: dataString,
                success: function(data) {

                    //data = JSON.parse(data);
                    if (data == 1) {
                        console.log(data);
                        alert("Attendance Taken.");

                    } else if (data == 0) {
                        console.log(data);
                        alert("Already Taken for this subject.\nNo more updates!");
                    }
                },
                error: function(err) {
                    alert("Error");
                    console.error(err);
                }

            })
        }

    }
    //---------------------------------------------------------------------------------------------------------------

    function load_subjects() {
        var $dropdown = $('#subject');
        $('#subject').html("");

        $dropdown.append($("<option />").val("--Select Subject--").text("--Select Subject--"));
        var student_course = $('#tbl_course').text();
        var student_semester = $('#tbl_semester').text();
        //alert(student_course + student_semester);
        var dataString = 'semester=' + student_semester + '&course=' + student_course;
        $.ajax({

            url: "controllers/get_subject_controller.php",
            method: "post",
            data: dataString,
            success: function(data) {
                console.log(data);
                data = JSON.parse(data);
                if (data) {
                    for (var i = 0; i < data.length; i++) {
                        //console.log(data[i]);
                        $dropdown.append($("<option />").val(data[i]).text(data[i]));
                    }

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

    function setHiddenSubject() {
        $('#hidden_subject').val($('#subject').val());
    }

    $('#inputSearchDate').datepicker({
        autoclose: true
    });

    function load_subjects_view_attendance(){
        var $dropdown = $('#search_subject');
        $('#search_subject').html("");

        $dropdown.append($("<option />").val("--Select Subject--").text("--Select Subject--"));
        var student_course = $('#search_course').val();
        var student_semester = $('#search_semester').val();
        //alert(student_course + student_semester);
        var dataString = 'semester=' + student_semester + '&course=' + student_course;
        $.ajax({

            url: "controllers/get_subject_controller.php",
            method: "post",
            data: dataString,
            success: function(data) {
                console.log(data);
                data = JSON.parse(data);
                if (data) {
                    for (var i = 0; i < data.length; i++) {
                        //console.log(data[i]);
                        $dropdown.append($("<option />").val(data[i]).text(data[i]));
                    }

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

    function load_searched_attendance(){
        var course = $('#search_course').val();
        var semester = $('#search_semester').val();
        var subject = $('#search_subject').val();
        var date = $('#inputSearchDate').val();

        $('#attendance_details').html("");

        console.log(course+semester+subject+date);

        var dataString = 'semester=' + semester + '&course=' + course + '&subject=' + subject + '&date=' + date;
        $.ajax({

            url: "controllers/get_taken_attendance_controller.php",
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
</script>