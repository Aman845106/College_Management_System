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
<body class="bgtexture">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">C.M.S</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="student_home.php">Home</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="student_notice_view.php">Notice</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="student_attendance_view.php">Attendance</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#" onclick="viewResult()">Result</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <a class="btn btn-danger my-2 my-sm-0" href="controllers/logout.php">Logout</a>
      </form>
    </div>
  </nav>
  <div class="modal" id="modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Result</h5>
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
  $id = $_SESSION['id'];
  echo '<input type="hidden" id="inputId" value="'.$id.'">';
  ?>
  <script>
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
    function showModel() {
        $('#modal').modal();
    }
  </script>
  <div class="container">