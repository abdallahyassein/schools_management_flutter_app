<?php

// Include config file
require_once "../config.php";



$group_id=(int)$_GET['student_id'];   // get the student id  



 

// sql to delete a record
$sql = "DELETE FROM control_groups WHERE id='$group_id'";



 if ($link->query($sql) === TRUE) {
    echo "<script>
    alert('The Student Deleted Successfully');
    window.location.href='../show_data/search-classes.php';
    </script>";
} else {
    echo "Error deleting record: " . $link->error;
}

$link->close();

    

?>

