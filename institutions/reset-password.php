<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE schools SET password = ? WHERE id = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
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
    <title>Reset password</title> <!-- Title for the page -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> <!-- bootstrap link -->

    <!-- just Some Styling -->
    <style>
        body {

            background-image: url("images/back22.jpg"); /* background of the page */
            background-repeat: no-repeat; 
            background-size: cover; 

        }






        .row {

            padding-top: 5%;
            padding-bottom: 5%;
        }

        .box {

           
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16), 0 2px 3px;
            opacity: 0.8;
        }
    </style>
</head>

<body>
<div class="container py-5">
        <div class="row">
            <div class="col-10 col-sm-6 col-md-5 mx-auto">
        
                <div class="box">
                    
                    <div class="card bg-light mb-3">
                    
                        <div class="card-body">
                        
        <p class="text-center font-weight-bold">Please write your new password.</p> <!-- instruction to user -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> <!-- form that user gonna put new password when he press submit button-->
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>"> <!-- check if there is no errors with password -->
                <label>New Password</label> <!-- instruction to user -->
                <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>"> <!-- get the password -->
                <span class="help-block"><?php echo $new_password_err; ?></span> <!-- show error message if there is an error -->
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>"> <!-- make sure that no error in confirmation make sure that the two passwords matched -->
                <label>Confirm Password</label> <!-- instruction to user -->
                <input type="password" name="confirm_password" class="form-control">  <!-- get the confirmation to password -->
                <span class="help-block"><?php echo $confirm_password_err; ?></span> <!-- show error message if there is an error -->
            </div>
            <div class="form-group">
            <div class="col-md-12 text-center">
                <input type="submit" class="btn btn-primary" value="Submit"> <!--Submit button -->
                <a class="btn btn-link" href="welcome.php">Cancel</a> <!-- show error message if there is an error -->
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
</html>
