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

$grade = $ap1 =$ap2=$ap3=$ap4=$ap5=$ap6=$ap7=$ap8="";
$grade_err =  "";


// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


  // Validate Illness Name
  if (empty(trim($_POST["grade"]))) {
    $grade_err = "Please insert grade number.";
  } else {
    $grade = trim($_POST["grade"]);
    $ap1 = trim($_POST["ap1"]);
    $ap2 = trim($_POST["ap2"]);
    $ap3 = trim($_POST["ap3"]);
    $ap4 = trim($_POST["ap4"]);
    $ap5 = trim($_POST["ap5"]);
    $ap6 = trim($_POST["ap6"]);
    $ap7 = trim($_POST["ap7"]);
    $ap8 = trim($_POST["ap8"]);
  }





  


  // Check input errors before inserting in database
  if (
    empty($grade_err)
  ) {

    // Prepare an insert statement
    $sql = "INSERT INTO schedules (grade,appointment1,appointment2,appointment3,appointment4,appointment5,appointment6,appointment7,appointment8,school_id) VALUES (?, ?, ?, ?, ?,?,?,?,?,?)";


    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "sssssssssi", $param_grade,$param_ap1,$param_ap2,$param_ap3,$param_ap4,$param_ap5,$param_ap6,$param_ap7,$param_ap8,$param_school_id);

      // Set parameters
      $param_grade = $grade;
      $param_ap1= $ap1;
      $param_ap2= $ap2;
      $param_ap3= $ap3;
      $param_ap4= $ap4;
      $param_ap5= $ap5;
      $param_ap6= $ap6;
      $param_ap7= $ap7;
      $param_ap8= $ap8;
      $param_school_id = $_SESSION["id"];
      



      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        // Redirect to login page
        header("location: insert_schedule.php");
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
  <title>Insert Activity</title> <!-- title for the page -->
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
                <div class="form-group <?php echo (!empty($grade_err)) ? 'has-error' : ''; ?>">
                  <label>Grade</label>
                  <input type="text" name="grade" class="form-control" value="<?php echo $grade; ?>" placeholder="Enter Grade">
                  <span class="help-block" style="color:red"><?php echo $grade_err; ?></span>
                </div>

                <div class="form-group">
                  <label>Subject 1</label>
                  <input type="text" name="ap1" class="form-control" value="<?php echo $ap1; ?>" placeholder="Enter Subject 1">
                </div>

                <div class="form-group">
                  <label>Subject 2</label>
                  <input type="text" name="ap2" class="form-control" value="<?php echo $ap2; ?>" placeholder="Enter Subject 2">
                </div>
                
                <div class="form-group">
                  <label>Subject 3</label>
                  <input type="text" name="ap3" class="form-control" value="<?php echo $ap3; ?>" placeholder="Enter Subject 3">
                </div>

                <div class="form-group">
                  <label>Subject 4</label>
                  <input type="text" name="ap4" class="form-control" value="<?php echo $ap4; ?>" placeholder="Enter Subject 4">
                </div>

                <div class="form-group">
                  <label>Subject 5</label>
                  <input type="text" name="ap5" class="form-control" value="<?php echo $ap5; ?>" placeholder="Enter Subject 5">
                </div>

                <div class="form-group">
                  <label>Subject 6</label>
                  <input type="text" name="ap6" class="form-control" value="<?php echo $ap6; ?>" placeholder="Enter Subject 6">
                </div>

                <div class="form-group">
                  <label>Subject 7</label>
                  <input type="text" name="ap7" class="form-control" value="<?php echo $ap7; ?>" placeholder="Enter Subject 7">
                </div>

                <div class="form-group">
                  <label>Subject 8</label>
                  <input type="text" name="ap8" class="form-control" value="<?php echo $ap8; ?>" placeholder="Enter Subject 8">
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

    </div>
  </div>

  </div>



</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>