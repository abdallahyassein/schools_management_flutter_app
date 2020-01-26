<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: ../login.php");
  exit;
}

// Include config file
require_once "../config.php";

// Define variables and initialize with empty values
$teacher_id = 0;
$name =  $subject = $task = $time_of_class = "";
$name_err =  $subject_err = $task_err = $time_of_class_err = $teacher_id_err = "";

// Check if there are teachers

$result = mysqli_query($link,"SELECT * FROM teachers WHERE teachers.school_id='{$_SESSION['id']}'");
if (mysqli_num_rows($result) <= 0) {
 
  echo "<script>
  alert('There are no teachers in This school');
  window.location.href='main-insert-page.php';
  </script>";
}

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

 


  // Validate Name
  if (empty(trim($_POST["name"]))) {
    $name_err = "Please insert a Name.";
  } else {
    $name = trim($_POST["name"]);
  }



  // Validate subject
  if (empty(trim($_POST["subject"]))) {
    $subject_err = "Please insert subject.";
  } else {
    $subject = trim($_POST["subject"]);
  }

    // Validate subject
    if (empty(trim($_POST["task"]))) {
        $task_err = "Please insert task.";
      } else {
        $task = trim($_POST["task"]);
      }
    

  // Validate Time of class
  if (empty(trim($_POST["time_of_class"]))) {
    $time_of_class_err = "Please insert parent time_of_class.";
  } else {
    $time_of_class = trim($_POST["time_of_class"]);
  }


  // Validate teacher_id
  

  if (empty(trim($_POST["teacher_id"]))) {
    $teacher_id_err = "Please insert teacher ID.";


  }else {
   

    $teacher_id = $_POST["teacher_id"];
    
    // CHECK IF THIS teacher AT THIS SCHOOL
    $result1 = mysqli_query($link,"SELECT id FROM teachers WHERE id='{$teacher_id}' AND school_id='{$_SESSION['id']}'");
    if(mysqli_num_rows($result1) <= 0){

  
      $teacher_id_err = "Please insert a Right teacher ID.";
      $teacher_id=0;
    
    }

  }

  // Check if the teacher in this school


  // Check input errors before inserting in database
  if (
    
    empty($name_err) &&  empty($subject_err) && empty($time_of_class_err)  && empty($teacher_id_err)
  ) {

    // Prepare an insert statement
    $sql = "INSERT INTO groups (name,subject,time_of_room,school_id,teacher_id) VALUES (?, ?, ?, ?, ?)";


    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ssssi",$param_name, $param_subject,$param_time_of_class, $param_school_id, $param_teacher_id);

      // Set parameters

      $param_name = $name;
      $param_subject = $subject;
      $param_time_of_class = $time_of_class;
      $param_school_id = $_SESSION["id"];
      $param_teacher_id = $teacher_id;



      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        // Redirect to login page
        header("location: create-class.php");
      } else {
        echo "Something went wrong. Please try again later.";
      }
    }

    // Close statement
    mysqli_stmt_close($stmt);
  }

  // Close connection
  mysqli_close($link);
}


?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Insert Group</title> <!-- title for the page -->
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link href="https://fonts.googleapis.com/css?family=Coustard|Lato&display=swap" rel="stylesheet">

 <!-- some styling -->
  <style>
    body {

      background-image: url("../images/back22.jpg");

      background-size: cover;


    }

    .navtitle {
      font-family: 'Lato', sans-serif;
    }

    .heads {
      font-family: 'Coustard', serif;
      font-size: 50px;
      color: #ffffff;
      padding-top: 1%;
    }

    .navbar {
      box-shadow: 0 3px 4px rgba(0, 0, 0, 0.16), 0 3px 4px;
    }
  </style>
</head>

<body>

  <!-- Grey with black text -->
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

    <div class="container">
      <a class="navbar-brand" href="../welcome.php">
        <h1 class="text-center navtitle">Schools Management</h1>
      </a>

    <!-- create a navbar dropdown item -->
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown ">
          <a class="navbar-toggler-icon" href="#" id="navbardrop" data-toggle="dropdown"></a>
          <div class="dropdown-menu">


            <a class="dropdown-item" href="../welcome.php">Home</a>
            <a class="dropdown-item" href="../reset-password.php">Reset Password</a>
            <a class="dropdown-item" href="../logout.php">Log out</a>

          </div>
        </li>
      </ul>
  </nav>
  <div class="container py-5">
    <div class="row">
      <div class="col-10 col-sm-6 col-md-5 mx-auto">

        <div class="box">
          <div class="card bg-light mb-3">

            <div class="card-body">

              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">



                <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                  <label>Name of Class</label>
                  <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter Name of class">
                  <span class="help-block" style="color:red"><?php echo $name_err; ?></span>
                </div>
                
                <div class="form-group <?php echo (!empty($subject_err)) ? 'has-error' : ''; ?>">
                  <label>Subject</label>
                  <input type="text" name="subject" class="form-control" value="<?php echo $subject; ?>" placeholder="Enter Parent subject">
                  <span class="help-block" style="color:red"><?php echo $subject_err; ?></span>
                </div>


                <div class="form-group <?php echo (!empty($time_of_class)) ? 'has-error' : ''; ?>">
                  <label>Time of class</label>
                  <input type="text" name="time_of_class" class="form-control" value="<?php echo $time_of_class; ?>" placeholder="Enter Parent Time of Class">
                  <span class="help-block" style="color:red"><?php echo $time_of_class_err; ?></span>
                </div>

                <div class="form-group <?php echo (!empty($teacher_id_err)) ? 'has-error' : ''; ?>">
                  <label>teacher ID</label>
                  <input type="text" name="teacher_id" class="form-control" value="<?php echo $teacher_id; ?>" placeholder="Enter teacher ID">
                  <span class="help-block" style="color:red"><?php echo $teacher_id_err; ?></span>
                </div>


     

    

                <div class="form-group">
                  <div class="col-md-12 text-center">
                    <input type="submit" class="btn btn-primary" value="Submit">
                  </div>
                </div>

            </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-13 col-sm-6 col-md-5 mx-auto">
        <div class="form-group">
          <h2 class="text-center" style=" font-size: 45px; font-family:'Coustard', serif; color: #FFFFFF; background-color:#353a40;">Search teacher ID</h2>
          <input type="text" name="search" id="search" autocomplete="off" class="form-control" placeholder="Enter teacher Full Name">
          <div id="output" style="font-family: 'Coustard', serif; background-color:#353a40; color: rgb(255, 255, 255); padding-left: 2%;"></div>
        </div>
      </div>
    </div>
  </div>

  </div>
 <!-- ajax for live searching -->
  <script type="text/javascript">
    $(document).ready(function() {
      $("#search").keyup(function() {
        var query = $(this).val();
        if (query != "") {
          $.ajax({
            url: '../search_data/search-teacher.php',
            method: 'POST',
            data: {
              query: query
            },
            success: function(data) {

              $('#output').html(data);
              $('#output').css('display', 'block');

              $("#search").focusout(function() {
                $('#output').css('display', 'none');
              });
              $("#search").focusin(function() {
                $('#output').css('display', 'block');
              });
            }
          });
        } else {
          $('#output').css('display', 'none');
        }
      });
    });
  </script>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>