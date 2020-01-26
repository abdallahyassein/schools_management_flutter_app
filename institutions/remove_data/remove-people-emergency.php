<?php

// Include config file
require_once "../config.php";



$people_id=(int)$_GET['people_id'];   // get the student id  



 

// sql to delete a record
$sql = "DELETE FROM people_emergency WHERE id='$people_id'";



 if ($link->query($sql) === TRUE) {
    echo "<script>
    alert('This Person Deleted Successfully');
    window.location.href='../show_data/search-people-emergency.php';
    </script>";
} else {
    echo "Error deleting record: " . $link->error;
}

$link->close();

    

?>

