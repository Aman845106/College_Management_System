<?php
error_reporting(E_WARNING | E_PARSE);
session_start();
if ($_SESSION['priv'] == "hod") {
    include_once('includes/hod_header.php');
    include_once('includes/connection.php');
}
?>

<div class="row textshadow boxshadow formtexture form-center">



    <div class="col-sm-6">
        <h2><label style="margin-left:20px; text-decoration:underline" for="legend" style="margin-left:10px;">
                Add Course
            </label></h2>
        <hr class="newhr">
        <div class="form-group">
            <div class="col-lg-12">
                <input type="text" required maxlength="30" class="form-control textbox-transparent controlshodow" name="inputCourse" id="inputCourse" placeholder="Enter Course Name">
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-8 col-lg-offset-2">
                <button type="button" class="btn btn-primary" onclick="addCourse()">Add Course</button>
            </div>
        </div>
        <hr class="newhr">
    </div>

    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-12">
                <h2><label style="margin-left:20px; text-decoration:underline" for="legend" style="margin-left:10px;">
                        Add Subject
                    </label></h2>
                <hr class="newhr">

            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="col-sm-12">

                        <select class="custom-select" id="course" onchange="">
                            <option selected="">--Select Course--</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="col-sm-12">
                    <div class="form-group">
                        <select class="custom-select" id="year">
                            <option selected="">--Select Year--</option>
                            <option value="1">1st Year</option>
                            <option value="2">2nd Year</option>
                            <option value="3">3rd Year</option>
                            <option value="4">4th Year</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-12">
                    <div class="form-group">
                        <select class="custom-select" id="semester">
                            <option selected="">--Select Semester--</option>
                            <option value="1">1st Semester</option>
                            <option value="2">2nd Semester</option>
                            <option value="3">3rd Semester</option>
                            <option value="4">4th Semester</option>
                            <option value="5">5th Semester</option>
                            <option value="6">6th Semester</option>
                            <option value="7">7th Semester</option>
                            <option value="8">8th Semester</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="text" required maxlength="30" class="form-control textbox-transparent controlshodow" name="inputSubject" id="inputSubject" placeholder="Enter Subject Name">
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="col-lg-8 col-lg-offset-2">
                        <button type="button" class="btn btn-primary" onclick="addSubject()">Add Subject</button>
                    </div>
                </div>
                <hr class="newhr">
            </div>
        </div>
    </div>



</div>

<?php
include_once('includes/footer.php');
?>

<script>
    $(document).ready(function() {
        //alert("hello");
        getCourse();
    });
    //add course---------------------------------------------------------------------------------------------------------
    function addCourse() {
        var course = $('#inputCourse').val();

        //alert(student_id);

        var dataString = 'course=' + course;
        $.ajax({

            url: "controllers/add_course_controller.php",
            method: "post",
            data: dataString,
            success: function(data) {
                console.log(data);
                //data = JSON.parse(data);
                if (data) {
                    alert("Course Added");
                    $('#inputCourse').val("");
                    getCourse();

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
    //get course--------------------------------------------------------------------------------------------------------------
    function getCourse() {
        var $dropdown = $('#course');
        $('#course').html("");
        $dropdown.append($("<option />").val("").text("--Select Course--"));
        $.ajax({

            url: "controllers/get_course_controller.php",
            method: "post",
            data: "",
            success: function(data) {

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
    //add subject--------------------------------------------------------------------------------------------
    function addSubject() {
        var course = $('#course').val();
        var year = $('#year').val();
        var semester = $('#semester').val();
        var subject = $('#inputSubject').val();

        //alert(course+year+semester+subject);

        var dataString = 'course=' + course + '&year=' + year + '&semester=' + semester + '&subject=' + subject;
        $.ajax({

            url: "controllers/add_subject_controller.php",
            method: "post",
            data: dataString,
            success: function(data) {
                //console.log(data);
                //data = JSON.parse(data);
                if (data) {
                    alert("Subject Added");
                    $('#inputSubject').val("");

                } else {
                    console.log(data);
                }
            },
            error: function(err) {
                alert("Error");
                console.error(err);
            }

        })
    }
    //-----------------------------------------------------------------------------------------------------------------------
</script>