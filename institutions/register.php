<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = $name = $email = $address = $number = "";
$username_err = $password_err = $confirm_password_err = $name_err = $email_err = $address_err = $number_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM schools WHERE username = ?";

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
        $password_err = "Please enter a password."; // if the user did not write a password
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters."; // if the password is less than 6 characters show him this message
    } else {
        $password = trim($_POST["password"]); // if the password is not empty and longer than 6 character take it from user
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";  // if the user did not write a confirm password
    } else {
        $confirm_password = trim($_POST["confirm_password"]); // if the password and confirm password are the same show the user this messag
        if (empty($password_err) && ($password != $confirm_password)) { 
            $confirm_password_err = "Password did not match."; // if the password and confirm password are not the same show the user this message 
        }
    }
    // Validate Name 
    if (empty(trim($_POST["name"]))) {  // check if the name input not empty
        $name_err = "Please insert a Name."; // if it is empty show the user this message
    } else {
        $name = trim($_POST["name"]); // if is not empty take the value that the user entered from the input
    }

    // Validate Email
    if (empty(trim($_POST["email"]))) {  // check if the email input not empty
        $email_err = "Please insert a Email."; // if it is empty show the user this message
    } else {
        $email = trim($_POST["email"]); // if is not empty take the value that the user entered from the input
    }

    // Validate address
    if (empty(trim($_POST["address"]))) {
        $address_err = "Please insert a Address."; // if it is empty show the user this message
    } else {
        $address = trim($_POST["address"]); // if is not empty take the value that the user entered from the input
    }

    // Validate number
    if (empty(trim($_POST["number"]))) {
        $number_err = "Please insert a Number."; // if it is empty show the user this message
    } else {
        $number = trim($_POST["number"]); // if is not empty take the value that the user entered from the input
    }



    // Check input errors before inserting in database(if all the error variables are empty this mean that there is no errors)
    if (
        empty($username_err) && empty($password_err) &&
        empty($confirm_password_err) && empty($name_err) && empty($email_err) && empty($address_err) && empty($number_err)
    ) {

        // Prepare an insert the school data to schools table in your database
        $sql = "INSERT INTO schools (username, password, name, email, address, number) VALUES (?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_username, $param_password, $param_name, $param_email, $param_address, $param_number);

            // Set parameters
            $param_username = $username; // put the username  input in the param_username variable that you passed to mysqli_stmt_bind_param method
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash and pass it
            $param_name = $name; // put the  school name input in the param_name variable that you passed to mysqli_stmt_bind_param method
            $param_email = $email; // put the school email input in the param_email variable that you passed to mysqli_stmt_bind_param method
            $param_address = $address;  // put the school address input in the param_address variable that you passed to mysqli_stmt_bind_param method
            $param_number = $number; // put the school phone number input in the param_number variable that you passed to mysqli_stmt_bind_param method




            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) { 
                // if it successed Redirect to login page
                header("location: login.php"); 
            } else {
                // if there is a problem show that message
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
    <title>Register</title>  <!-- Title for the page -->

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

      <!-- css style -->
      <!-- Setting backgroung   -->
      <!-- Some Padding  -->
      <!-- Adding small shadow to navbar -->
      <!-- Adding some fonts  -->
    <style> 
        body {

        background-image: url("images/back22.jpg");
       
        background-size:cover;


        }
        .navtitle{
            font-family: 'Lato', sans-serif;
        }
        .heads{
            font-family: 'Coustard', serif;
            font-size: 50px;
            color: #ffffff; 
            padding-top: 1%;
        }

        .navbar{
            box-shadow:  0 3px 4px rgba(0,0,0,0.16), 0 3px 4px;
        }
  
    </style>
</head>

<body>
    <!-- Grey Navbar with black text -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

        <div class="container">
            <a class="navbar-brand" href="welcome.php">
                <h1 class="navtitle">Schools Management</h1>  <!-- Navbar Title -->
             
            </a>
    </nav>
    <div class="container py-5">
        <div class="row">
            <div class="col-10 col-sm-6 col-md-5 mx-auto"> <!-- Just some styling using bootstrap to but the register card in the centerand with with better looking -->

                <div class="box">
                    <div class="card bg-light mb-3">

                        <div class="card-body">

                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> <!-- making a form when it posted then check data and make the register proccess -->
                                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                    <label>Username</label>  <!-- label for username input -->
                                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" aria-describedby="Username" placeholder="Enter School Username"> <!-- The user input that we take the value from it -->
                                    <span class="help-block" style="color:red"><?php echo $username_err; ?></span> <!-- show a error to user if there are any kind of errors in username -->

                                </div>
                                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>"> 
                                    <label>Password</label> <!-- label for password input -->
                                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" placeholder="Enter Password"> <!-- The user password that we take the value from it -->
                                    <span class="help-block" style="color:red"><?php echo $password_err; ?></span>  <!-- show a error to user password if there are any kind of errors in password  -->
                                </div>

                                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                    <label>Confirm Password</label> <!-- label for confirming password input -->
                                    <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>" placeholder="Confirm Password"> <!-- The user confirm password that we check if the two password are the same  -->
                                    <span class="help-block" style="color:red"><?php echo $confirm_password_err; ?></span>  <!-- show a error to confirming password  if there is any kind of errors in confirming password  -->
                                </div>

                                <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                                    <label>Name</label> <!-- label for name input -->
                                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter School Name">    <!-- The school Name that we take the value  -->
                                    <span class="help-block" style="color:red"><?php echo $name_err; ?></span> <!-- show a error if   if there are any kind of errors in putting name  -->
                                </div>

                                <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>"> 
                                    <label>Email</label> <!-- label for email input -->
                                    <input type="text" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Enter School Email"> <!-- show a error to email  if there is any kind of errors in email  -->
                                    <span class="help-block" style="color:red"><?php echo $email_err; ?></span> <!-- show a error if   if there are any kind of errors in putting name  -->
                                </div>

                                <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                                    <label>Address</label> <!-- label for address input -->
                                    <input type="text" name="address" class="form-control" value="<?php echo $address; ?>" placeholder="Enter School Address"> <!-- show a error to address  if there is any kind of errors in address -->
                                    <span class="help-block" style="color:red"><?php echo $address_err; ?></span> <!-- show a error if   if there are any kind of errors in putting name  -->
                                </div>

                                <div class="form-group <?php echo (!empty($number_err)) ? 'has-error' : ''; ?>">
                                    <label>Number</label> <!-- label for phone number input -->
                                    <input type="text" name="number" class="form-control" value="<?php echo $number; ?>" placeholder="Enter School Phone Number"> <!-- show a error to phone number  if there is any kind of errors in phone number  -->
                                    <span class="help-block" style="color:red"><?php echo $number_err; ?></span> <!-- show a error if   if there are any kind of errors in putting phone number -->
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                    </div>
                                </div>
                                <p>Already have an account? <a href="login.php">Login here</a>.</p>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>