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


$schedule_id=(int)isset($_GET['schedule_id']) ? $_GET['schedule_id'] : '';  // get the activity id
$grade= $appointment1= $appointment2=$appointment3=$appointment4=$appointment5=$appointment6=$appointment7=$appointment8="";
$grade_err= "";







// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $schedule_id=trim($_POST["schedule_id"]); // take this value from a hidden input cause the activity_id value becomes null after POST process
    

    // Validate Grade
    if (empty(trim($_POST["grade"]))) {
        $grade_err = "Please insert a grade.";
    } else {
        $grade = trim($_POST["grade"]);
    }


    $appointment1 = trim($_POST["appointment1"]);
    $appointment2 = trim($_POST["appointment2"]);
    $appointment3 = trim($_POST["appointment3"]);
    $appointment4 = trim($_POST["appointment4"]);
    $appointment5 = trim($_POST["appointment5"]);
    $appointment6 = trim($_POST["appointment6"]);
    $appointment7 = trim($_POST["appointment7"]);
    $appointment8=  trim($_POST["appointment8"]);



    // Check input errors before inserting in database
    if (
        
         empty($grade_err) 
    ) {

        // Prepare an insert statement
    $sql = "UPDATE schedules SET grade=?,appointment1=?,appointment2=?,appointment3=?,appointment4=?,appointment5=?,appointment6=?,appointment7=?,appointment8=? WHERE id='$schedule_id'";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt,"sssssssss",$param_grade,$param_appointment1,$param_appointment2,$param_appointment3,$param_appointment4,$param_appointment5,$param_appointment6,$param_appointment7,$param_appointment8);

            // Set parameters

            $param_grade = $grade;
            $param_appointment1 = $appointment1;
            $param_appointment2 = $appointment2;
            $param_appointment3 = $appointment3;
            $param_appointment4 = $appointment4;
            $param_appointment5 = $appointment5;
            $param_appointment6 = $appointment6;
            $param_appointment7 = $appointment7;
            $param_appointment8 = $appointment8;
            




            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                echo "<script>
                alert('Success');
                window.location.href='../show_data/search-schedules.php';
                </script>";

               
          
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
} else{

    // this is used to get the old data from database and show it at inputs this happen before you press submit (posting)

    $query = "SELECT * FROM schedules WHERE schedules.id={$schedule_id}";
    $result = mysqli_query($link, $query);
   
    if (mysqli_num_rows($result) > 0) {
        while ($user = mysqli_fetch_array($result)) {
            
            if ($user['school_id'] == (int)$_SESSION['id']) {
                
                $grade = $user['grade'];
                $appointment1 = $user['appointment1'];
                $appointment2 = $user['appointment2'];
                $appointment3 = $user['appointment3'];
                $appointment4 = $user['appointment4'];
                $appointment5 = $user['appointment5'];
                $appointment6 = $user['appointment6'];
                $appointment7 = $user['appointment7'];
                $appointment8 = $user['appointment8'];
            }else{
                echo "<script>
                alert('There is a problem with the data');
                window.location.href='../show_data/main-search.php';
                </script>";
            }
        }
   
        mysqli_close($link);
    }
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Edit Schedule</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Coustard|Lato&display=swap" rel="stylesheet">

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
                <h1 class="navtitle">Schools Management</h1>

            </a>



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

                                <input type="hidden" name="schedule_id" value="<?php echo $schedule_id;?>"/> <!-- this is the hidden input that takes the activity_id value that we get from show_data/search-activitys.php  -->



                                <div class="form-group <?php echo (!empty($grade_err)) ? 'has-error' : ''; ?>">
                                    <label>Grade</label>
                                    <input type="text" name="grade" class="form-control" value="<?php echo $grade; ?>" placeholder="Enter Schedule Grade"> <!-- input that gonna be edited -->
                                    <span class="help-block" style="color:red"><?php echo $grade_err; ?></span>
                                </div>

                                <div class="form-group <?php echo (!empty($grade_err)) ? 'has-error' : ''; ?>">
                                    <label>1</label>
                                    <input type="text" name="appointment1" class="form-control" value="<?php echo $appointment1; ?>"> <!-- input that gonna be edited -->
                                </div>

                                <div class="form-group <?php echo (!empty($grade_err)) ? 'has-error' : ''; ?>">
                                    <label>2</label>
                                    <input type="text" name="appointment2" class="form-control" value="<?php echo $appointment2; ?>"> <!-- input that gonna be edited -->
                                </div>

                                <div class="form-group <?php echo (!empty($grade_err)) ? 'has-error' : ''; ?>">
                                    <label>3</label>
                                    <input type="text" name="appointment3" class="form-control" value="<?php echo $appointment3; ?>"> <!-- input that gonna be edited -->
                                </div>

                                <div class="form-group <?php echo (!empty($grade_err)) ? 'has-error' : ''; ?>">
                                    <label>4</label>
                                    <input type="text" name="appointment4" class="form-control" value="<?php echo $appointment4; ?>"> <!-- input that gonna be edited -->
                                </div>

                                <div class="form-group <?php echo (!empty($grade_err)) ? 'has-error' : ''; ?>">
                                    <label>5</label>
                                    <input type="text" name="appointment5" class="form-control" value="<?php echo $appointment5; ?>"> <!-- input that gonna be edited -->
                                </div>

                                <div class="form-group <?php echo (!empty($grade_err)) ? 'has-error' : ''; ?>">
                                    <label>6</label>
                                    <input type="text" name="appointment6" class="form-control" value="<?php echo $appointment6; ?>"> <!-- input that gonna be edited -->
                                </div>

                                <div class="form-group <?php echo (!empty($grade_err)) ? 'has-error' : ''; ?>">
                                    <label>7</label>
                                    <input type="text" name="appointment7" class="form-control" value="<?php echo $appointment7; ?>"> <!-- input that gonna be edited -->
                                </div>

                                <div class="form-group <?php echo (!empty($grade_err)) ? 'has-error' : ''; ?>">
                                    <label>8</label>
                                    <input type="text" name="appointment8" class="form-control" value="<?php echo $appointment8; ?>"> <!-- input that gonna be edited -->
                                </div>

                           




                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <input type="submit" class="btn btn-primary" value="Update">
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>