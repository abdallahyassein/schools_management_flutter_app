<?php

// Include config file
require_once "../config.php";



$sibiling_id=(int)$_GET['sibiling_id'];   // get the student id  



 

// sql to delete a record
$sql = "DELETE FROM sibiling WHERE id='$sibiling_id'";



 if ($link->query($sql) === TRUE) {
    echo "<script>
    alert('This Sibiling Deleted Successfully');
    window.location.href='../show_data/search-sibiling.php';
    </script>";
} else {
    echo "Error deleting record: " . $link->error;
}

$link->close();

    

?>

