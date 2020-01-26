<?php

// Include config file
require_once "../config.php";



$student_id=(int)$_GET['student_id'];   // get the student id  



 

// sql to delete a record
$sql = "DELETE FROM students WHERE id='$student_id'";



 if ($link->query($sql) === TRUE) {
    echo "<script>
    alert('The Student Deleted Successfully');
    window.location.href='../show_data/search-students.php';
    </script>";
} else {
    echo "Error deleting record: " . $link->error;
}

$link->close();

    

?>

