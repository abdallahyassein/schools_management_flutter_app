<?php

// Include config file
require_once "../config.php";



$schedule_id=(int)$_GET['schedule_id'];   // get the student id  



 

// sql to delete a record
$sql = "DELETE FROM schedules WHERE id='$schedule_id'";



 if ($link->query($sql) === TRUE) {
    echo "<script>
    alert('This schedule Deleted Successfully');
    window.location.href='../show_data/search-schedules.php';
    </script>";
} else {
    echo "Error deleting record: " . $link->error;
}

$link->close();

    

?>

