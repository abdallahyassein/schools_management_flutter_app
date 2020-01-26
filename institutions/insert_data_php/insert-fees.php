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
$student_id = 0;
$amount=0.0;

$student_id_err=$amount_err="";


// Check if there are teachers

$result = mysqli_query($link,"SELECT * FROM students WHERE students.school_id='{$_SESSION['id']}'");
if (mysqli_num_rows($result) <= 0) {
 
  echo "<script>
  alert('There are no students in This school');
  window.location.href='main-insert-page.php';
  </script>";
}

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

 

  // Validate amount

    
    if (empty(trim($_POST["amount"]))) {
        $amount_err = "Please insert amount of money.";
      } else {
        $amount = trim($_POST["amount"]);
      }


  if (empty(trim($_POST["student_id"]))) {
    $student_id_err = "Please insert student ID.";


  }else {
   

    $student_id = $_POST["student_id"];
    
    // CHECK IF THIS teacher AT THIS SCHOOL
    $result1 = mysqli_query($link,"SELECT id FROM students WHERE id='{$student_id}' AND school_id='{$_SESSION['id']}'");
    if(mysqli_num_rows($result1) <= 0){

  
      $student_id_err = "Please insert a Right student ID.";
      $student_id=0;
    
    }

  }

  // Check if the teacher in this school


  // Check input errors before inserting in database
  if (
    
     empty($student_id_err)  && empty($amount_err)
  ) {

    // Prepare an insert statement
    $sql = "INSERT INTO fees (fees_amount,school_id,student_id) VALUES (?, ?, ?)";


    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "dii",$param_amount,$param_school_id,$param_student_id);

      // Set parameters

    
      $param_school_id = $_SESSION["id"]; // school id from the session
      $param_student_id = $student_id;
      $param_amount = $amount;



      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        // Redirect to login page
        header("location: insert-fees.php");
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
  <title>Fees</title> <!-- title for the page -->
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





              <div class="form-group <?php echo (!empty($student_id_err)) ? 'has-error' : ''; ?>">
                  <label>Student ID</label>
                  <input type="text" name="student_id" class="form-control" value="<?php echo $student_id; ?>" placeholder="Enter student ID">
                  <span class="help-block" style="color:red"><?php echo $student_id_err; ?></span>
                </div>


                <div class="form-group <?php echo (!empty($amount_err)) ? 'has-error' : ''; ?>">
                  <label>Fees amount</label>
                  <input type="text" name="amount" class="form-control" value="<?php echo $amount; ?>" placeholder="Enter Amount">
                  <span class="help-block" style="color:red"><?php echo $amount_err; ?></span>
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
          <h2 class="text-center" style=" font-size: 45px; font-family:'Coustard', serif; color: #FFFFFF; background-color:#353a40;">Search Student ID</h2>
          <input type="text" name="search" id="search" autocomplete="off" class="form-control" placeholder="Enter Student Full Name">
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
            url: '../search_data/search-student-for-parent.php',
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