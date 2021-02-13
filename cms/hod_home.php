<?php
error_reporting(E_WARNING | E_PARSE);
session_start();
if ($_SESSION['priv'] == "hod") {
    include_once('includes/hod_header.php');
    include_once('includes/connection.php');

    $hod_id = $_SESSION['id'];
    $select_query = "select * from hod where id = '$hod_id'";
    $result = mysqli_query($conn, $select_query);
    $row = mysqli_fetch_row($result);
}
?>
<div class="form-horizontal form-group textshadow boxshadow formtexture form-center">
<h2><label>Welcome HOD</label></h2>
    <div class="form-group">
        <label for="inputEmail" class="col-lg-2 control-label" style="text-align: center"><img src="images/<?php echo $row[9];?>" height="200px" width="150px" alt="No Image" class="img-thumbnail"></label>
    </div>

    <div class="form-group">
        <table class="table table-hover">
            <thead>
            </thead>
            <tbody>
                <tr class="table-warning">
                    <th style="text-align:left;"><h3>Id</h3></th>
                    <td style="text-align:left;"><?php echo $row[0]; ?></td>
                </tr>
                <tr class="table-warning">
                    <th style="text-align:left;"><h3>Name</h3></th>
                    <td style="text-align:left;"><?php echo $row[1]; ?></td>
                </tr>
                <tr class="table-warning">
                    <th style="text-align:left;"><h3>father</h3></th>
                    <td style="text-align:left;"><?php echo $row[2]; ?></td>
                </tr>
                <tr class="table-warning">
                    <th style="text-align:left;"><h3>Phone</h3></th>
                    <td style="text-align:left;"><?php echo $row[3]; ?></td>
                </tr>
                <tr class="table-warning">
                    <th style="text-align:left;"><h3>E-mail</h3></th>
                    <td style="text-align:left;"><?php echo $row[4]; ?></td>
                </tr>
                <tr class="table-warning">
                    <th style="text-align:left;"><h3>Address</h3></th>
                    <td style="text-align:left;"><?php echo $row[5]; ?></td>
                </tr>
                <tr class="table-warning">
                    <th style="text-align:left;"><h3>D.O.B</h3></th>
                    <td style="text-align:left;"><?php echo $row[6]; ?></td>
                </tr>
                <tr class="table-warning">
                    <th style="text-align:left;"><h3>Department</h3></th>
                    <td style="text-align:left;"><?php echo $row[7]; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<?php
include_once('includes/footer.php');
?>