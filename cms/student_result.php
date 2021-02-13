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
<style>
    .table_result {
        max-width: 80%;
        width: 100%;
    }

    .table_result td {
        padding: 5px;
        border-bottom: 1px dotted black;

    }

    .table_result th {
        padding: 10px;
        color: brown;
        font-size: 16px;
        border-bottom: 2px solid black;
    }
</style>
<input type="hidden" id="hidden_subject_count" value="">

<div class="row textshadow boxshadow formtexture form-center">
    <div class="col-lg-12">

        <div style="margin-bottom:20px;">
            <h2><label style="margin-left:20px; text-decoration:underline" for="legend" style="margin-left:10px;">
                    Search Student
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
            <button type="button" class="btn btn-primary" id="hideme" onclick="getStudent()">Load Student (Current Date)</button>
            <button type="button" class="btn btn-danger" onclick="viewResult();">View Result</button>
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

</div>

<div class="row textshadow boxshadow formtexture form-center">
    <div class="col-lg-12">
        <div class="col-lg-12">
            <div style="margin-bottom:20px;">
                <h2><label style="margin-left:20px; text-decoration:underline" for="legend" style="margin-left:10px;">
                        Enter Marks
                    </label></h2>
                <hr class="newhr">
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="col-sm-6" id="result_form">
        </div>

    </div>

</div>

<div class="modal" id="modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Student Result</h5>
            </div>
            <div class="modal-body">
                <p id="model_name"></p>
                <p id="model_father"></p>
                <p id="model_course"></p>
                <p id="model_semester"></p>

                <hr class="newhr">
                <table class="table_result">
                    <thead>
                        <tr class="">
                            <th scope="col">Subjects</th>
                            <th scope="col">Maximum</th>
                            <th scope="col">Obtained</th>
                        </tr>
                    </thead>
                    <tbody id="student_result_detail">

                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php
include_once('includes/footer.php');
?>
<script>
    //-------------------------------------------------------------------------------------------
    function showModel() {
        $('#modal').modal();
    }
    //--------------------------------------------------------------------------------------------
    function viewResult() {
        var student_id = $('#inputId').val();
        if (student_id == "") {
            alert("Please enter student id.");
        } else {
            $('#student_result_detail').html("");
            var dataString = 'id=' + student_id;
            $.ajax({
                url: "controllers/view_student_result.php",
                method: "post",
                data: dataString,
                success: function(data) {
                    if (data) {
                        data = JSON.parse(data);
                        //getStudent();
                        //console.log(data.length);
                        //getStudentDetails();

                        $('#model_name').text("Name : " + data[0][0][1]);
                        $('#model_father').text("Father : " + data[0][0][2]);
                        $('#model_course').text("Course : " + data[0][0][3]);
                        $('#model_semester').text("Semester : " + data[0][0][4]);
                        $('#student_result_detail').append();

                        for (var i = 0; i < data.length; i++) {
                            var inner_len_1 = data[i].length;
                            for (var j = 0; j < inner_len_1; j++) {
                                console.log(data[i][j][6] + " : " + data[i][j][7]);
                                $('#student_result_detail').append("<tr><td>" + data[i][j][6] + "</td><td>25</td><td>" + data[i][j][7] + "</td></tr>");

                            }
                        }
                        showModel();
                    } else {
                        alert("Error in result");
                    }
                },
                error: function(err) {
                    alert("Error");
                    console.error(err);
                }

            })
        }
    }
    //----------------------------------------------------------------------------------------------------------
    function getStudentDetails() {
        var student_id = $('#inputId').val();
        if (student_id == "") {
            alert("Please enter student id.");
        } else {
            $('#student_details_result_form').html("");

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
                        $('#student_details_result_form').append(data);


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
    //-------------------------------------------------------------------------------------------------------------
    function getStudent() {
        var student_id = $('#inputId').val();
        $('#hideme').hide();
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

    //---------------------------------------------------------------------------------------------------------------

    function load_subjects() {
        var student_course = $('#tbl_course').text();
        var student_semester = $('#tbl_semester').text();
        $('#result_form').html = "";
        //alert(student_course + student_semester);
        //----------------------------------------------------------------------------

        //----------------------------------------------------------------------------
        var dataString = 'semester=' + student_semester + '&course=' + student_course;
        $.ajax({

            url: "controllers/get_subject_controller.php",
            method: "post",
            data: dataString,
            success: function(data) {
                //console.log(data);
                data = JSON.parse(data);
                if (data) {
                    $('#hidden_subject_count').val(data.length);
                    for (var i = 0; i < data.length; i++) {
                        //alert(data[i]);
                        $('#result_form').append(
                            '<div class="form-group"><h3><label class="control-label" id= s' + i + '>' + data[i] + '</label></h3><input type="text" class="form-control textbox-transparent controlshodow" id=inputMarks' + i + ' placeholder="Enter Marks"></div><hr class="newhr">'
                        );

                    }
                    $('#result_form').append('<div class="form-group"><div class=""><button type="button" class="btn btn-primary" onclick="submitMarks()">Submit Result</button></div></div>');

                }
            },
            error: function(err) {
                alert("Error");
                console.error(err);
            }

        })
    }

    function submitMarks() {
        var count = $('#hidden_subject_count').val();
        var subjects = [];
        var marks = [];
        var sub_marks = [];
        var student_id = $('#tbl_id').text();
        var flag = false;
        for (var i = 0; i < count; i++) {
            subjects[i] = $('#s' + i).text();
            marks[i] = $('#inputMarks' + i).val();
        }

        for (var i = 0; i < count; i++) {
            if (marks[i] == "") {
                flag = true;
            }
        }

        if (flag == true) {
            alert("Please enter marks.");
        } else {
            var dataString = 'subjects=' + subjects + '&marks=' + marks + '&id=' + student_id;
            $.ajax({

                url: "controllers/result_save_controller.php",
                method: "post",
                data: dataString,
                success: function(data) {
                    if (data == "saved") {
                        alert("Result saved.");
                        $('#student_details').html("");
                        $('#hideme').show();
                    } else if (data == "wrong") {
                        alert("Result already exist.\nClick View Result to see the result.");
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