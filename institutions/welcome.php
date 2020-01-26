<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Home</title> <!-- title of the page -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> <!-- bootstrap -->
        
        <link href="https://fonts.googleapis.com/css?family=Coustard|Lato&display=swap" rel="stylesheet"> <!-- google font -->
 
        <!-- some styling -->
    <style>
        body {

        background-image: url("images/back22.jpg"); /* background image */
       
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
    
    <!-- Grey with black navbar -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark" >

        <div class="container">  
            <a class="navbar-brand" href="welcome.php"> <!-- go to welcome page when click on navtitle -->
                <h1 class="text-center navtitle">Schools Management</h1>
            </a>

       
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown "> <!-- Creating dropdown menu -->
                    <a class="navbar-toggler-icon" href="#" id="navbardrop" data-toggle="dropdown"></a>
                    <div class="dropdown-menu">
                        
                        <a class="dropdown-item" href="reset-password.php">Reset Password</a> <!-- redirect to reset password page -->
                        <a class="dropdown-item" href="logout.php">Log out</a> <!-- log out -->
                       

                    </div>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="container" style="padding: 4%;  opacity: 0.7; width:60%;"> 
    <div class="jumbotron" style="background-color: rgb(103, 125, 143); padding:5%;">
        <h1 class="text-center heads">Welcome <?php echo htmlspecialchars($_SESSION["username"]); ?> </h1> <!-- get school name the page using session -->
        <h3 class="text-center" style="font-family: 'Coustard', serif; color: white;">How are you ?</h3>
        <p class="text-center" style="font-family: 'Coustard', serif; color: white;">Have a good day !!!</p>

        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                        <a type="submit" class="btn" style="font-size: 45px; font-family: 'Coustard', serif; background-color:#5A5C9C; color: rgb(255, 255, 255);"href="insert_data_php/main-insert-page.php">Insert</a>
                </div>
                <br>
                <div class="col-md-12 text-center" style="padding-top: 2%;">
                        <a type="submit" class="btn" style="font-size: 45px; font-family: 'Coustard', serif; background-color:#433F61; color: rgb(255, 255, 255);"href="show_data/main-search.php">Search</a>
                </div>
            </div>
               
        </div>
            
   
       
    </div>
    
</div>

</body>

<!-- use jquery library to can use the dropdown  -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

</html>