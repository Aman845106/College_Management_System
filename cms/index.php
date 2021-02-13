<?php
include_once('includes/header.php');
include_once('includes/connection.php');
?>

<div class="col-lg-3"></div>
<form class="form-horizontal textshadow boxshadow formtexture col-lg-6 form-center" method="post" action="controllers/login_controller.php">
    <fieldset>
        <div style="margin-bottom:20px;">
            <h2><img src="images/access.png" alt="user" width="70px" height="70px" style="margin-left:35px;"><label style="margin-left:20px; text-decoration:underline" for="legend" style="margin-left:10px;">
                    Sign-In

                </label></h2>
            <hr class="newhr">
        </div>

        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label"><img src="images/users.png" alt="user" width="30px" height="30px"></label>
            <div class="col-lg-9">

                <select class="form-control textbox-transparent controlshodow" id="select" name="privilages">
                    <option value="super_admin">Super Admin</option>
                    <option value="hod">H.O.D</option>
                    <option value="teacher">Teacher</option>
                    <option value="student">Student</option>

                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label"><img src="images/user.png" alt="user" width="30px" height="30px"></label>
            <div class="col-lg-9">
                <input type="text" class="form-control textbox-transparent controlshodow" name="inputEmail" id="inputEmail" placeholder="Id">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-lg-2 control-label"><img src="images/lock.png" alt="user" width="30px" height="30px"></label>
            <div class="col-lg-9">
                <input type="password" class="form-control textbox-transparent controlshodow" id="inputPassword" name="inputPassword" placeholder="Password">
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-8 col-lg-offset-2">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary">Sign-In</button>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-8 col-lg-offset-2">
                <label for="" class="control-label"><a href="register_student.php">New Student Register Here.</a></label>
            </div>
        </div>
        <hr class="newhr">
    </fieldset>
</form>
<div class="col-lg-3"></div>

<?php
include_once('includes/footer.php');
?>