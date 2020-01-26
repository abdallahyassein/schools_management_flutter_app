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
$username = $password = $confirm_password = $name =  $address = $number= $email =$job= "";
$username_err = $password_err = $confirm_password_err = $name_err =  $address_err =$number_err= $email_err =$job_err= "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM staffs WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }
    // Validate Name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please insert a Name.";
    } else {
        $name = trim($_POST["name"]);
    }



    // Validate Number
    if (empty(trim($_POST["number"]))) {
        $number_err = "Please insert staff member number.";
    } else {
        $number = trim($_POST["number"]);
    }

    // Validate Email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please insert staff member email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate Address

    if (empty(trim($_POST["address"]))) {
        $address_err= "Please insert staff member address.";
    } else {
        $address = trim($_POST["address"]);
    }

    // Validate job

    if (empty(trim($_POST["job"]))) {
        $job_err= "Please insert staff member job.";
    } else {
        $job = trim($_POST["job"]);
    }



    // Check input errors before inserting in database
    if (
        empty($username_err) && empty($password_err) &&
        empty($confirm_password_err) && empty($name_err) &&  empty($address_err) && empty($number_err) && empty($job_err)
    ) {

        // Prepare an insert statement
        $sql = "INSERT INTO staffs (username, password, name,number, address,email,school_id,job) VALUES (?, ?, ?, ?, ?, ?,?,?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt,"ssssssss", $param_username, $param_password, $param_name,$param_number,$param_address, $param_email,$param_school_id,$param_job);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_name = $name;
            $param_number = $number;
            $param_address = $address;
            $param_email = $email;
            $param_school_id = $_SESSION["id"];
            $param_job = $job;




            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
               header("location: insert-staff.php");

              
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
    <title>Insert Staff</title> <!-- title for the page -->
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
                                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" aria-describedby="Username" placeholder="Enter Student Username">
                                    <span class="help-block" style="color:red"><?php echo $username_err; ?></span>

                                </div>
                                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" placeholder="Enter Password">
                                    <span class="help-block" style="color:red"><?php echo $password_err; ?></span>
                                </div>

                                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                    <label>Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>" placeholder="Confirm Password">
                                    <span class="help-block" style="color:red"><?php echo $confirm_password_err; ?></span>
                                </div>

                                <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                                    <label>Full Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter Staff Member Full Name">
                                    <span class="help-block" style="color:red"><?php echo $name_err; ?></span>
                                </div>

                                <div class="form-group <?php echo (!empty($job_err)) ? 'has-error' : ''; ?>">
                                    <label>Job</label>
                                    <input type="text" name="job" class="form-control" value="<?php echo $job; ?>" placeholder="Enter Staff Member Job">
                                    <span class="help-block" style="color:red"><?php echo $job_err; ?></span>
                                </div>

                                <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control" value="<?php echo $address; ?>" placeholder="Enter Staff member Address">
                                    <span class="help-block" style="color:red"><?php echo $address_err; ?></span>
                                </div>

                                <div class="form-group <?php echo (!empty($number)) ? 'has-error' : ''; ?>">
                                    <label>Phone Number</label>
                                    <input type="text" name="number" class="form-control" value="<?php echo $number; ?>" placeholder="Enter Staff Member Phone Number">
                                    <span class="help-block" style="color:red"><?php echo $number_err; ?></span>
                                </div>

                                <div class="form-group <?php echo (!empty($email)) ? 'has-error' : ''; ?>">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Enter Staff Member Email">
                                    <span class="help-block" style="color:red"><?php echo $email_err; ?></span>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>