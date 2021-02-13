<html>

<head>
  <title>CMS</title>
  <link rel="stylesheet" type="text/css" href="scripts/student_bootstrap.css">
  <link rel="stylesheet" type="text/css" href="scripts/datepicker.css">
</head>

<style>
  .textshadow {
    text-shadow: 1px 1px 2px rgba(0, 0, 6, .5);
  }

  .boxshadow {
    position: relative;
    -moz-box-shadow: 1px 2px 4px rgba(9, 9, 9, .5);
    -webkit-box-shadow: 1px 2px 4px rgba(9, 9, 9, .5);
    box-shadow: 1px 2px 4px rgba(9, 9, 9, .5);
    padding: 25px;
    background: white;
  }

  .boxshadow::after {
    content: '';
    position: absolute;
    z-index: -1;
    /* hide shadow behind image */
    -webkit-box-shadow: 0 15px 20px rgba(9, 9, 9, .5);
    -moz-box-shadow: 0 15px 20px rgba(9, 9, 9, .5);
    box-shadow: 0 15px 20px rgba(9, 9, 9, .5);
    width: 70%;
    left: 15%;
    /* one half of the remaining 30% */
    height: 100px;
    bottom: 0;
  }

  .controlshodow {
    box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
    padding: 0px;
    -moz-box-shadow: 1px 2px 4px rgba(0, 0, 0, 0.5);
    -webkit-box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
    padding-left: 10px;
  }

  .bgtexture {
    background-image: url("images/bg2.png");
    background-repeat: repeat;
    background-color: #cccccc;
    background-position: fixed;
  }

  .formtexture {
    background-image: url("images/bg.jpg");
    background-repeat: repeat;
    background-color: #cccccc;
    background-position: fixed;
    border-radius: 5px;
  }

  .textbox-transparent {
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
  }

  .form-center {
    margin-top: 20px;
  }

  hr.newhr {
    border-top: 2px dotted purple;
    box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
    padding: 0px;
    -moz-box-shadow: 1px 2px 4px rgba(0, 0, 0, 0.5);
    -webkit-box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
  }
</style>

<body class="bgtexture">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">C.M.S</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="teacher_home.php">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="notice_create.php">Notice</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="student_attendance.php">Attendance (View/Take)</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="student_result.php">Result (View/Update)</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="fees.php">Fees</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <a class="btn btn-danger my-2 my-sm-0" href="controllers/logout.php">Logout</a>
    </form>
  </div>
</nav>
  <div class="container">