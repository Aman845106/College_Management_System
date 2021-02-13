<?php
error_reporting(E_WARNING | E_PARSE);
session_start();
if ($_SESSION['priv'] == "super_admin") {
    include_once('includes/super_admin_header.php');
    //include_once('includes/connection.php'); 
?>
    <div class="form-horizontal form-group textshadow boxshadow formtexture form-center">

        <h1><label>Welcome Super Admin</label></h1>
        <div class="form-center">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#add_hod">Register Hod</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#add_teacher">Register Teacher</a>
                </li>

            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active show" id="add_hod">


                    <form style="margin:0px auto;" class="form-horizontal textshadow col-lg-8 col-lg-offset-2 form-center" enctype="multipart/form-data" method="POST" action="controllers/register_hod_controller.php">
                        <h2><img src="images/add_user.png" alt="Add user" width="100px" height="100px" style="margin-left:35px;"><label style="text-decoration: underline">HOD Registration Form</label></h2>
                        <hr class="newhr">
                        <div class="form-group">
                            <label for="inputName" class="col-lg-2 control-label">Name</label>
                            <div class="col-lg-12">
                                <input type="text" required maxlength="30" class="form-control textbox-transparent controlshodow" id="inputName" name="inputName" placeholder="Full Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputFather" class="col-lg-2 control-label">Father</label>
                            <div class="col-lg-12">
                                <input type="text" required maxlength="30" class="form-control textbox-transparent controlshodow" id="inputFather" name="inputFather" placeholder="Father's Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPhone" class="col-lg-2 control-label">Phone</label>
                            <div class="col-lg-12">
                                <input type="text" required maxlength="10" class="form-control textbox-transparent controlshodow" id="inputPhone" name="inputPhone" placeholder="Phone">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-12">
                                <input type="email" required maxlength="30" class="form-control textbox-transparent controlshodow" id="inputEmail" name="inputEmail" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputAddress" class="col-lg-2 control-label">Address</label>
                            <div class="col-lg-12">
                                <input type="text" required maxlength="50" class="form-control textbox-transparent controlshodow" id="inputAddress" name="inputAddress" placeholder="Address">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputDOB" class="col-lg-2 control-label">D.O.B</label>
                            <div class="col-lg-12">
                                <input type="text" required maxlength="10" class="form-control textbox-transparent controlshodow" id="inputDOB" name="inputDOB" placeholder="mm/dd/yyyy">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputDepartment" class="col-lg-2 control-label">Department</label>
                            <div class="col-lg-12">
                                <input type="text" required maxlength="30" class="form-control textbox-transparent controlshodow" id="inputDepartment" name="inputDepartment" placeholder="Department">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                            <div class="col-lg-12">
                                <input type="password" required maxlength="30" class="form-control textbox-transparent controlshodow" id="inputPassword" name="inputPassword" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputConfirmPassword" class="col-lg-2 control-label">Confirm</label>
                            <div class="col-lg-12">
                                <input type="Password" required maxlength="30" class="form-control textbox-transparent controlshodow" id="inputConfirmPassword" name="inputConfirmPassword" placeholder="Confirm Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPhoto" class="col-lg-2 control-label">Photo</label>
                            <div class="col-lg-12">
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

                </div>
                <div class="tab-pane fade" id="add_teacher">
                    <form style="margin:0px auto;" class="form-horizontal textshadow col-lg-8 col-lg-offset-2 form-center" enctype="multipart/form-data" method="POST" action="controllers/register_teacher_controller.php">

                        <h2><img src="images/add_user.png" alt="Add user" width="100px" height="100px" style="margin-left:35px;"><label style="text-decoration: underline">Teacher Registration Form</label></h2>

                        <hr class="newhr">
                        <div class="form-group">
                            <label for="inputName" class="col-lg-2 control-label">Name</label>
                            <div class="col-lg-12">
                                <input type="text" required maxlength="30" class="form-control textbox-transparent controlshodow" id="inputName" name="inputName" placeholder="Full Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputFather" class="col-lg-2 control-label">Father</label>
                            <div class="col-lg-12">
                                <input type="text" required maxlength="30" class="form-control textbox-transparent controlshodow" id="inputFather" name="inputFather" placeholder="Father's Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPhone" class="col-lg-2 control-label">Phone</label>
                            <div class="col-lg-12">
                                <input type="text" required maxlength="10" class="form-control textbox-transparent controlshodow" id="inputPhone" name="inputPhone" placeholder="Phone">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-12">
                                <input type="email" required maxlength="30" class="form-control textbox-transparent controlshodow" id="inputEmail" name="inputEmail" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputAddress" class="col-lg-2 control-label">Address</label>
                            <div class="col-lg-12">
                                <input type="text" required maxlength="50" class="form-control textbox-transparent controlshodow" id="inputAddress" name="inputAddress" placeholder="Address">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputDOBTeacher" class="col-lg-2 control-label">D.O.B</label>
                            <div class="col-lg-12">
                                <input type="text" required maxlength="10" class="form-control textbox-transparent controlshodow" id="inputDOBTeacher" name="inputDOBTeacher" placeholder="mm/dd/yyyy">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputQualification" class="col-lg-2 control-label">Qualification</label>
                            <div class="col-lg-12">
                                <input type="text" required maxlength="30" class="form-control textbox-transparent controlshodow" id="inputQualification" name="inputQualification" placeholder="Qualification">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputDepartment" class="col-lg-2 control-label">Department</label>
                            <div class="col-lg-12">
                                <input type="text" required maxlength="30" class="form-control textbox-transparent controlshodow" id="inputDepartment" name="inputDepartment" placeholder="Department">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                            <div class="col-lg-12">
                                <input type="password" required maxlength="30" class="form-control textbox-transparent controlshodow" id="inputPassword" name="inputPassword" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputConfirmPassword" class="col-lg-2 control-label">Confirm</label>
                            <div class="col-lg-12">
                                <input type="Password" required maxlength="30" class="form-control textbox-transparent controlshodow" id="inputConfirmPassword" name="inputConfirmPassword" placeholder="Confirm Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPhoto" class="col-lg-2 control-label">Photo</label>
                            <div class="col-lg-12">
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
                </div>
            </div>
        </div>
    </div>


<?php
    include_once('includes/footer.php');
}
?>
<script>
    $('#inputDOB').datepicker({
        autoclose: true
    });

    $('#inputDOBTeacher').datepicker({
        autoclose: true
    });
</script>