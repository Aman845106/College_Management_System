<?php
include_once('includes/header.php');

$get_id = $_GET['id'];
?>
<div class="jumbotron textshadow boxshadow formtexture form-center">

  <h1><label class="text-success">Done.</label></h1>
  <h3><label for="id"><?php 
  if($get_id != ""){
    echo "Your id is: ".$get_id;
  }
  ?></label></h3>
<br />
  <a href="index.php" class="btn btn-danger">Go to Sign-In page.</a>

</div>
<?php
include_once('includes/footer.php');
?>