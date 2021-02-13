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
?>

<form class="form-horizontal textshadow boxshadow formtexture col-lg-6" style="margin:20px auto;" method="post">
    <fieldset>
        <div style="margin-bottom:20px;">
            <h2><label style="margin-left:20px; text-decoration:underline" for="legend" style="margin-left:10px;">
                    Search Student
                </label></h2>
            <hr class="newhr">
        </div>

        <div class="form-group">

            <div class="col-lg-6">
                <input type="text" required maxlength="5" class="form-control textbox-transparent controlshodow" name="inputStudentId" id="inputStudentId" placeholder="Student Id">
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-6 col-lg-offset-4">

                <select class="custom-select" name="studentYear" id="studentYear">
                    <option selected="">--Select Year--</option>
                    <option value="1">1st Year</option>
                    <option value="2">2nd Year</option>
                    <option value="3">3rd Year</option>
                    <option value="4">4th Year</option>
                </select>

            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-8 col-lg-offset-2">
                <button type="button" class="btn btn-primary" onclick="getStudent()">Search Student</button>
            </div>
        </div>
        <hr class="newhr">
    </fieldset>
</form>


<form class="form-horizontal textshadow boxshadow formtexture col-lg-12" style="margin:20px auto;" method="post">
    <fieldset>
        <div style="margin-bottom:20px;">
            <h2><label style="margin-left:20px; text-decoration:underline" for="legend" style="margin-left:10px;">
                    Student Details / Fee Deposit
                </label></h2>
            <hr class="newhr">
        </div>

        <table class="table">
            <thead>
                <tr class="table-danger">
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Father</th>
                    <th scope="col">Course</th>

                    <th scope="col">Session</th>
                    <th scope="col">Year</th>
                    <th scope="col">Fees</th>

                </tr>
            </thead>
            <tbody>
                <tr class="table-warning">
                    <td><label for="" id="id"></label></td>
                    <td><label for="" id="name"></label></td>
                    <td><label for="" id="father"></label></td>
                    <td><label for="" id="course"></label></td>
                    <td><label for="" id="session"></label></td>
                    <td><label for="" id="year"></label></td>
                    <td><label for="" id="totalfees"></label></td>
                </tr>

            </tbody>
        </table>
        <hr class="newhr">
        <form class="form-horizontal textshadow boxshadow formtexture col-lg-6" style="margin:20px auto;" method="post">
            <fieldset>

                <div class="form-group">

                    <div class="col-lg-4">
                        <input type="text" required maxlength="6" class="form-control textbox-transparent controlshodow" name="inputStudentFees" id="inputStudentFees" placeholder="Input Fees">
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-lg-8 col-lg-offset-2">
                        <button type="button" class="btn btn-primary" onclick="depositFees()">Deposit Fees</button>
                    </div>
                </div>

            </fieldset>
        </form>

        <hr class="newhr">
    </fieldset>
</form>




<?php
include_once('includes/footer.php');
?>
<script>
    function getStudent() {
        var student_id = $('#inputStudentId').val();
        var student_year = $('#studentYear').val();

        //alert(student_id);

        var dataString = 'id=' + student_id + '&student_year=' + student_year;
        $.ajax({

            url: "controllers/search_student_fees.php",
            method: "post",
            data: dataString,
            success: function(data) {
                //console.log(data);
                data = JSON.parse(data);
                if (data) {
                    $('#id').text(data[0]);
                    $('#name').text(data[1]);
                    $('#father').text(data[2]);
                    $('#course').text(data[3]);
                    $('#session').text(data[4]);
                    $('#year').text(data[5]);
                    $('#totalfees').text(data[6]);

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

    function depositFees() {
        var student_fees = $('#inputStudentFees').val();
        var student_id = $('#id').text();
        var student_name = $('#name').text();
        var student_father = $('#father').text();
        var student_course = $('#course').text();
        var student_session = $('#session').text();
        var student_year = $('#year').text();

        if (student_fees == "") {
            alert("Please input fees.");
        } else {
            var dataString = 'fees=' + student_fees + '&id=' + student_id + '&name=' + student_name + '&father=' + student_father + '&course=' + student_course + '&session=' + student_session + '&year=' + student_year;
            $.ajax({

                url: "controllers/student_fees.php",
                method: "post",
                data: dataString,
                success: function(data) {
                    //console.log(data);
                    data = JSON.parse(data);
                    if (data) {

                        alert("Fees Deposited Successfully.");
                        $('#inputStudentId').val("");
                        $('#inputStudentFees').val("");
                        $('#id').text("");
                        $('#name').text("");
                        $('#father').text("");
                        $('#course').text("");
                        $('#session').text("");
                        $('#year').text("");
                        $('#totalfees').text("");

                    } else {
                        alert("Error. Please try after some time.");
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