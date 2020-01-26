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


$parent_id=(int)isset($_GET['parent_id']) ? $_GET['parent_id'] : '';  // get the parent id
 $name =$email=  $address = $number = "";
 $name_err =  $email_err = $address_err = $number_err = "";







// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $parent_id=trim($_POST["parent_id"]); // take this value from a hidden input cause the parent_id value becomes null after POST process
    

    // Validate Name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please insert a Name.";
    } else {
        $name = trim($_POST["name"]);
    }



    // Validate Email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please insert parent email.";
    } else {
        $email= trim($_POST["email"]);
    }

    // Validate number
    if (empty(trim($_POST["number"]))) {
        $number_err = "Please insert parent phone number.";
    } else {
        $number = trim($_POST["number"]);
    }

    // Validate email

    if (empty(trim($_POST["address"]))) {
        $address_err = "Please insert parent address.";
    } else {
        $address = trim($_POST["address"]);
    }





    // Check input errors before inserting in database
    if (
        
         empty($name_err) &&  empty($address_err) && empty($email_err) && empty($number_err)
    ) {

        // Prepare an insert statement
    $sql = "UPDATE parents SET name=?,email=?,address=?,number=? WHERE id='$parent_id'";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss",$param_name, $param_email, $param_address, $param_number);

            // Set parameters

            $param_name = $name;
            $param_email = $email;
            $param_address = $address;
            $param_number = $number;
            




            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                echo "<script>
                alert('Success');
                window.location.href='../show_data/search-parents.php';
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

    $query = "SELECT * FROM parents WHERE parents.id={$parent_id}";
    $result = mysqli_query($link, $query);
   
    if (mysqli_num_rows($result) > 0) {
        while ($user = mysqli_fetch_array($result)) {
            
            if ($user['school_id'] == (int)$_SESSION['id']) {
                $parent_id=$user['id'];
                $name = $user['name'];
                $email = $user['email'];
                $number = $user['number'];
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
    <title>Edit Parent</title>
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

                                <input type="hidden" name="parent_id" value="<?php echo $parent_id;?>"/> <!-- this is the hidden input that takes the parent_id value that we get from show_data/search-parents.php  -->



                                <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                                    <label>Full Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter Parent Full Name">  <!-- input that gonna be edited -->
                                    <span class="help-block" style="color:red"><?php echo $name_err; ?></span>
                                </div>

                                <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Enter parent email"> <!-- input that gonna be edited -->
                                    <span class="help-block" style="color:red"><?php echo $email_err; ?></span>
                                </div>

                                <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control" value="<?php echo $address; ?>" placeholder="Enter School Address"> <!-- input that gonna be edited -->
                                    <span class="help-block" style="color:red"><?php echo $address_err; ?></span>
                                </div>

                                <div class="form-group <?php echo (!empty($number)) ? 'has-error' : ''; ?>">
                                    <label>Phone Number</label>
                                    <input type="text" name="number" class="form-control" value="<?php echo $number; ?>" placeholder="Enter parent Date Of Birth"> <!-- input that gonna be edited -->
                                    <span class="help-block" style="color:red"><?php echo $number_err; ?></span>
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