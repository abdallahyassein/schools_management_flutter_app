<?php

// this page for live searching to use it with ajax

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  echo "<br/>"."Please Login"."<br/>";
    exit;
}

  require_once "../config.php";
 
  if (isset($_POST['query'])) {

   

  $query = "SELECT * FROM children_feedback  WHERE teacher_name LIKE '{$_POST['query']}%' AND children_feedback.school_id='{$_SESSION['id']}'";
    $result = mysqli_query($link, $query);
 
  if (mysqli_num_rows($result) > 0) {
     while ($user = mysqli_fetch_array($result)) {
    
    echo "<br/>";
    echo"<a style='color: #ffffff;  padding-top: 2px;' href=\"../edit_data/edit-child-feedback.php?child_feedback_id=".$user['id']."\">";
    echo "ID : ".$user['id']."<br/>";
    echo "Teacher Name : ".$user['teacher_name']."<br/>";
    echo "Subject : ".$user['subject']."<br/>";
    echo "Feedback : ".$user['feedback']."<br/>";
      
      
      
      
    }
  } else {
    echo "<p style='color:red'>Feedback not found...</p>";
  }
 
}
?>