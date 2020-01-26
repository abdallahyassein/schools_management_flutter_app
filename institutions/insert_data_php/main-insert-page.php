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
    <title>Insert</title> <!-- title for the page -->
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
        </div>
    </nav>

    <div class="container" style="padding-top: 1%;  opacity: 0.9; ">

        <div class="row row h-100 justify-content-center align-items-center">
            <div class="card" style="width: 18rem; height: 20rem; margin: 2%;">
               
                <div class="card-body">
                <img src="../images/student-icon.png" class="card-img-top mx-auto d-block" alt="student icon" style="width: 50%; height: 50%;" >
                    <div class="col-md-12 text-center">
                        <h5 class="card-title">Students</h5>
                        <p class="card-text">adding students to your school.</p>
                        <a href="insert-student.php" class="btn btn-primary">Add Student</a>
                    </div>
                </div>
            </div>
            <div class="card" style="width: 18rem; height: 20rem; margin: 2%;">
                
                <div class="card-body">
                <img src="../images/teacher-icon.png" class="card-img-top mx-auto d-block" alt="parent icon" style="width: 50%; height: 50%;" >
                    <div class="col-md-12 text-center">
                        <h5 class="card-title">Parents</h5>
                        <p class="card-text">Adding Parent of student on your school.</p>
                        <a href="insert-parent.php" class="btn btn-primary">Add Parent</a>
                    </div>
                </div>
            </div>

            <div class="card" style="width: 18rem; height: 20rem; margin: 2%;">
                <div class="card-body">
                <img src="../images/parent-icon.png" class="card-img-top mx-auto d-block" alt="teacher icon" style="width: 50%; height: 50%;" >
                    <div class="col-md-12 text-center">
                        <h5 class="card-title">Teachers</h5>
                        <p class="card-text">Adding teachers working at your school.</p>
                        <a href="insert-teacher.php" class="btn btn-primary">Add Teacher</a>
                    </div>
                </div>
            </div>

        </div>

        <div class="row row h-100 justify-content-center align-items-center">
            
        <div class="card" style="width: 18rem; height: 20rem; margin: 2%;">
                
                <div class="card-body">
                <img src="../images/class-icon.png" class="card-img-top mx-auto d-block" alt="class icon" style="width: 50%; height: 50%;" >
                    <div class="col-md-12 text-center">
                        <h5 class="card-title">Class</h5>
                        <p class="card-text">Adding class information on your school.</p>
                        <a href="insert-group.php" class="btn btn-primary">Add Class</a>
                    </div>
                </div>
            </div>

            <div class="card" style="width: 18rem; height: 20rem; margin: 2%;">
                
                <div class="card-body">
                <img src="../images/activites-icon.png" class="card-img-top mx-auto d-block" alt="activities icon" style="width: 50%; height: 45%;" >
                    <div class="col-md-12 text-center">
                        <h5 class="card-title">Activites</h5>
                        <p class="card-text">Adding Activities that student make at the school.</p>
                        <a href="insert-activity.php" class="btn btn-primary">Add Activity</a>
                    </div>
                </div>
            </div>

    

            <div class="card" style="width: 18rem; height: 20rem; margin: 2%;">
                
                <div class="card-body">
                <img src="../images/child-feedback-icon.png" class="card-img-top mx-auto d-block" alt="feedback icon" style="width: 50%; height: 45%;" >
                    <div class="col-md-12 text-center">
                        <h5 class="card-title">Child Feedback</h5>
                        <p class="card-text">Adding feedback for child that will appear to parent.</p>
                        <a href="insert-child-feedback.php" class="btn btn-primary">Add Child Feedback</a>
                    </div>
                </div>
            </div>


            
            <div class="card" style="width: 18rem; height: 22rem; margin: 2%;">
                
                <div class="card-body">
                <img src="../images/time-table-icon.png" class="card-img-top mx-auto d-block" alt="time table icon" style="width: 50%; height: 45%;" >
                    <div class="col-md-12 text-center">
                        <h5 class="card-title">Time Table</h5>
                        <p class="card-text">Adding Time Table for school that will make it easy for users.</p>
                        <a href="insert_schedule.php" class="btn btn-primary">Add Time Table</a>
                    </div>
                </div>
            </div>
            
            <div class="card" style="width: 18rem; height: 22rem; margin: 2%;">
                
                <div class="card-body">
                <img src="../images/emergency-people-icon.png" class="card-img-top mx-auto d-block" alt="emergency people icon" style="width: 50%; height: 45%;" >
                    <div class="col-md-12 text-center">
                        <h5 class="card-title">Emergency people</h5>
                        <p class="card-text">Adding emergency people information that are allowed to take child from school.</p>
                        <a href="insert_people_emergency.php" class="btn btn-primary">Add Emergency People</a>
                    </div>
                </div>
            </div>

            <div class="card" style="width: 18rem; height: 22rem; margin: 2%;">
                
                <div class="card-body">
                <img src="../images/medication-icon.png" class="card-img-top mx-auto d-block" alt="medication icon" style="width: 50%; height: 45%;" >
                    <div class="col-md-12 text-center">
                        <h5 class="card-title">Medication</h5>
                        <p class="card-text">Adding Medication cases for students to deal with them in a good way.</p>
                        <a href="insert-medication.php" class="btn btn-primary">Add Medication</a>
                    </div>
                </div>
            </div>

            <div class="card" style="width: 18rem; height: 22rem; margin: 2%;">
                
                <div class="card-body">
                <img src="../images/fees-icon.png" class="card-img-top mx-auto d-block" alt="fees icon" style="width: 50%; height: 45%;" >
                    <div class="col-md-12 text-center">
                        <h5 class="card-title">Fees</h5>
                        <p class="card-text">Confirm that parent paid the fees to the school for the current year.</p>
                        <a href="insert-fees.php" class="btn btn-primary">Add Fees</a>
                    </div>
                </div>
            </div>

            <div class="card" style="width: 18rem; height: 22rem; margin: 2%;">
                
                <div class="card-body">
                <img src="../images/sibiling-icon.png" class="card-img-top mx-auto d-block" alt="sibiling icon" style="width: 50%; height: 45%;" >
                    <div class="col-md-12 text-center">
                        <h5 class="card-title">Sibiling</h5>
                        <p class="card-text">Adding Sibiling of student this will help you to invite him to your school when he grows.</p>
                        <a href="insert-sibiling.php" class="btn btn-primary">Add Sibiling</a>
                    </div>
                </div>
            </div>

            <div class="card" style="width: 18rem; height: 22rem; margin: 2%;">
                
                <div class="card-body">
                <img src="../images/staff-member-icon.png" class="card-img-top mx-auto d-block" alt="staff member icon" style="width: 50%; height: 45%;" >
                    <div class="col-md-12 text-center">
                        <h5 class="card-title">Staff</h5>
                        <p class="card-text">Adding stuff members informations that are working in school.</p>
                        <a href="insert-staff.php" class="btn btn-primary">Add Staff Member</a>
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