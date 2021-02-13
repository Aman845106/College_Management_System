<?php
include_once('includes/header.php');
include_once('includes/connection.php');

?>
<div class="col-lg-3"></div>

<form class="form-horizontal textshadow boxshadow formtexture col-lg-6 form-center" enctype="multipart/form-data" method="POST" action="controllers/register_student_controller.php">
    <h2><img src="images/add_user.png" alt="Add user" width="100px" height="100px" style="margin-left:35px;"><label style="text-decoration: underline">Student Registration Form</label></h2>
    <hr class="newhr">
    <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Name</label>
        <div class="col-lg-10">
            <input type="text" required maxlength="30" class="form-control textbox-transparent controlshodow" id="inputName" name="inputName" placeholder="Full Name">
        </div>
    </div>

    <div class="form-group">
        <label for="inputFather" class="col-lg-2 control-label">Father</label>
        <div class="col-lg-10">
            <input type="text" required maxlength="30" class="form-control textbox-transparent controlshodow" id="inputFather" name="inputFather" placeholder="Father's Name">
        </div>
    </div>

    <div class="form-group">
        <label for="inputPhone" class="col-lg-2 control-label">Phone</label>
        <div class="col-lg-10">
            <input type="text" required maxlength="10" class="form-control textbox-transparent controlshodow" id="inputPhone" name="inputPhone" placeholder="Phone">
        </div>
    </div>

    <div class="form-group">
        <label for="inputEmail" class="col-lg-2 control-label">Email</label>
        <div class="col-lg-10">
            <input type="email" required maxlength="30" class="form-control textbox-transparent controlshodow" id="inputEmail" name="inputEmail" placeholder="Email">
        </div>
    </div>

    <div class="form-group">
        <label for="inputAddress" class="col-lg-2 control-label">Address</label>
        <div class="col-lg-10">
            <input type="text" required maxlength="50" class="form-control textbox-transparent controlshodow" id="inputAddress" name="inputAddress" placeholder="Address">
        </div>
    </div>

    <div class="form-group">
        <label for="inputDOB" class="col-lg-2 control-label">D.O.B</label>
        <div class="col-lg-10">
            <input type="text" required maxlength="10" class="form-control textbox-transparent controlshodow" id="inputDOB" name="inputDOB" placeholder="mm/dd/yyyy">
        </div>
    </div>

    <div class="form-group">
        <label for="inputCourse" class="col-lg-2 control-label">Course</label>
        <div class="col-lg-10">
            <input type="text" required maxlength="30" class="form-control textbox-transparent controlshodow" id="inputCourse" name="inputCourse" placeholder="Course">
        </div>
    </div>

    <div class="form-group">
        <label for="inputSession" class="col-lg-2 control-label">Session</label>
        <div class="col-lg-10">
            <input type="text" required maxlength="30" class="form-control textbox-transparent controlshodow" id="inputSession" name="inputSession" placeholder="Session">
        </div>
    </div>

    <div class="form-group">
        <label for="inputYear" class="col-lg-2 control-label">Year</label>
        <div class="col-lg-10">
            <input type="text" required maxlength="30" class="form-control textbox-transparent controlshodow" id="inputYear" name="inputYear" placeholder="Year">
        </div>
    </div>

    <div class="form-group">
        <label for="inputSemester" class="col-lg-2 control-label">Semester</label>
        <div class="col-lg-10">
            <input type="text" required maxlength="30" class="form-control textbox-transparent controlshodow" id="inputSemester" name="inputSemester" placeholder="Semester">
        </div>
    </div>

    <div class="form-group">
        <label for="inputPassword" class="col-lg-2 control-label">Password</label>
        <div class="col-lg-10">
            <input type="password" required maxlength="30" class="form-control textbox-transparent controlshodow" id="inputPassword" name="inputPassword" placeholder="Password">
        </div>
    </div>

    <div class="form-group">
        <label for="inputConfirmPassword" class="col-lg-2 control-label">Confirm</label>
        <div class="col-lg-10">
            <input type="Password" required maxlength="30" class="form-control textbox-transparent controlshodow" id="inputConfirmPassword" name="inputConfirmPassword" placeholder="Confirm Password">
        </div>
    </div>

    <div class="form-group">
        <label for="inputPhoto" class="col-lg-2 control-label">Photo</label>
        <div class="col-lg-10">
            <input type="file" required maxlength="50" class="form-control" name="file" id="uploadFile" accept="image/jpeg">
        </div>
    </div>
    <hr class="newhr">
    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            <button type="reset" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
<div class="col-lg-3"></div>
<?php
include_once('includes/footer.php');
?>
<script>
    $('#inputDOB').datepicker({
        autoclose: true
    });
</script>