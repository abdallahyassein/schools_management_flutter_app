<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Insert Class</title> <!-- title for the page -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <link href="https://fonts.googleapis.com/css?family=Coustard|Lato&display=swap" rel="stylesheet">
 <!-- some styling -->
    <style>
        body {

        background-image: url("../images/back22.jpg");
       
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
    
    <!-- Grey with black text -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark" >

        <div class="container">  
            <a class="navbar-brand" href="../welcome.php">
                <h1 class="text-center navtitle">Schools Management</h1>
            </a>

        <!-- create a navbar dropdown item -->
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown ">
                    <a class="navbar-toggler-icon" href="#" id="navbardrop" data-toggle="dropdown"></a>
                    <div class="dropdown-menu">
                        
                        <a class="dropdown-item" href="../reset-password.php">Reset Password</a>
                        <a class="dropdown-item" href="../logout.php">Log out</a>
                       

                    </div>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="container" style="padding: 10%;  opacity: 0.7; width:60%;"> 
    <div class="jumbotron" style="background-color: rgb(103, 125, 143); padding:5%;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                        <a type="submit" class="btn" style="font-size: 45px; font-family: 'Coustard', serif; background-color:#5A5C9C; color: rgb(255, 255, 255);"href="create-class.php">Create Class</a>
                </div>
                <br>
                <div class="col-md-12 text-center" style="padding-top: 2%;">
                        <a type="submit" class="btn" style="font-size: 45px; font-family: 'Coustard', serif; background-color:#433F61; color: rgb(255, 255, 255);"href="add-students-class.php">Add Students</a>
                </div>
            </div>
               
        </div>
            
   
       
    </div>
    
</div>

</body>
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