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


$student_id=(int)isset($_GET['student_id']) ? $_GET['student_id'] : '';  // get the student id
 $name =  $address = $grade = $date_of_birth = "";
 $name_err =  $address_err = $grade_err = $date_of_birth_err = "";







// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $student_id=trim($_POST["student_id"]); // take this value from a hidden input cause the student_id value becomes null after POST process
    

    // Validate Name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please insert a Name.";
    } else {
        $name = trim($_POST["name"]);
    }



    // Validate Grade
    if (empty(trim($_POST["grade"]))) {
        $grade_err = "Please insert student grade.";
    } else {
        $grade = trim($_POST["grade"]);
    }

    // Validate date_of_birth
    if (empty(trim($_POST["date_of_birth"]))) {
        $date_of_birth_err = "Please insert student date of birth.";
    } else {
        $date_of_birth = trim($_POST["date_of_birth"]);
    }

    // Validate grade

    if (empty(trim($_POST["address"]))) {
        $address_err = "Please insert student address.";
    } else {
        $address = trim($_POST["address"]);
    }





    // Check input errors before inserting in database
    if (
        
         empty($name_err) &&  empty($address_err) && empty($date_of_birth_err) && empty($grade_err)
    ) {

        // Prepare an insert statement
    $sql = "UPDATE students SET name=?,grade=?,address=?,date_of_birth=? WHERE id='$student_id'";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss",$param_name, $param_grade, $param_address, $param_date_of_birth);

            // Set parameters

            $param_name = $name;
            $param_grade = $grade;
            $param_address = $address;
            $param_date_of_birth = $date_of_birth;
            




            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                echo "<script>
                alert('Success');
                window.location.href='../show_data/search-students.php';
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

    $query = "SELECT * FROM students WHERE students.id={$student_id}";
    $result = mysqli_query($link, $query);
   
    if (mysqli_num_rows($result) > 0) {
        while ($user = mysqli_fetch_array($result)) {
            
            if ($user['school_id'] == (int)$_SESSION['id']) {
                $student_id=$user['id'];
                $name = $user['name'];
                $grade = $user['grade'];
                $date_of_birth = $user['date_of_birth'];
                $address = $user['address'];
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
    <title>Edit Student</title>
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

                                <input type="hidden" name="student_id" value="<?php echo $student_id;?>"/> <!-- this is the hidden input that takes the student_id value that we get from show_data/search-students.php  -->



                                <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                                    <label>Full Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter Student Full Name"> <!-- input that gonna be edited -->
                                    <span class="help-block" style="color:red"><?php echo $name_err; ?></span>
                                </div>

                                <div class="form-group <?php echo (!empty($grade_err)) ? 'has-error' : ''; ?>">
                                    <label>Grade</label>
                                    <input type="text" name="grade" class="form-control" value="<?php echo $grade; ?>" placeholder="Enter Student Grade"> <!-- input that gonna be edited -->
                                    <span class="help-block" style="color:red"><?php echo $grade_err; ?></span>
                                </div>

                                <div class="form-group <?php echo (!empty($date_of_birth)) ? 'has-error' : ''; ?>">
                                    <label>Date Of Birth</label>
                                    <input type="text" name="date_of_birth" class="form-control" value="<?php echo $date_of_birth; ?>" placeholder="Enter Student Date Of Birth"> <!-- input that gonna be edited -->
                                    <span class="help-block" style="color:red"><?php echo $date_of_birth_err; ?></span>
                                </div>

                                <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control" value="<?php echo $address; ?>" placeholder="Enter School Address"> <!-- input that gonna be edited -->
                                    <span class="help-block" style="color:red"><?php echo $address_err; ?></span>
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