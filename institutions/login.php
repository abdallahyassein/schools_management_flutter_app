<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;
}

// Include config file
require_once "config.php";
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials 
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM schools WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else {
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else {
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
    <title>Log in</title>

      <!-- Bootstrap Library -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

      <!-- css style -->
      <!-- Setting backgroung   -->
      <!-- Some Padding  -->
      <!-- Adding small shadow to navbar -->
      <!-- Adding some fonts  -->
    <style> 
        body {

            background-image: url("images/back22.jpg");   
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

    <!-- Grey with black text Navbar -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    
      <!-- Title of the Navbar -->
        <div class="container">
            <a class="navbar-brand" href="welcome.php">
                <h1 class="text-center navtitle">Schools Management</h1>
            </a>

        </div>
    </nav>
    <div class="container py-5">
        <div class="row">
            <div class="col-10 col-sm-6 col-md-5 mx-auto">

                <div class="box">

                    <div class="card bg-light mb-3">   <!-- make card that login items will appear on it -->

                        <div class="card-body">
                            <h1 class="text-center">Welcome</h1>  <!-- Title for the card  -->
                            <p class="text-center font-weight-bold">Please fill in your credentials to login.</p>   <!-- giving the user instructions -->
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">  <!-- making a form when it posted then check data and make the login proccess -->
                                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">  <!-- Adding the username -->
                                    <label>Username</label>  
                                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">  <!-- The input that will be used to continue the login process  -->
                                    <span class="help-block"><?php echo $username_err; ?></span>  <!-- if there is an error show username_err to user -->
                                </div>
                                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>"> 
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control">              <!-- The same for the password  -->
                                    <span class="help-block"><?php echo $password_err; ?></span>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <input type="submit" class="btn btn-primary" value="Login">  <!-- Submit button for the process  -->
                                    </div>
                                </div>
                                <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>  <!-- if you want to register or add a school redirct user to sign up page  -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>