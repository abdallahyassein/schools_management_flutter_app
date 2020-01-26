<?php

// Include config file
require_once "../config.php";



$teacher_id=(int)$_GET['teacher_id'];   // get the student id  


// sql to delete a record
$sql = "DELETE FROM teachers WHERE id='$teacher_id'";



 if ($link->query($sql) === TRUE) {
    echo "<script>
    alert('teacher Deleted Successfully');
    window.location.href='../show_data/search-teachers.php';
    </script>";
} else {
    echo "Error deleting record: " . $link->error;
}

$link->close();

    

?>

