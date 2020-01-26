<?php

include '../conn.php';

// Storing the received JSON in $json.
$json = file_get_contents('php://input');
 
// Decode the received JSON and store into $obj
$obj = json_decode($json,true);

$school_id=intval($obj['school_id']);
$group_id=intval($obj['group_id']);     // the variables that user(teacher) gonna insert from the app
$subject=$obj['subject'];
$task=$obj['task'];

    // Prepare an insert statement
    $sql = "INSERT INTO tasks (school_id,group_id,subject,task) VALUES ($school_id,$group_id,'$subject','$task')";


    if(mysqli_query($connect,$sql)){

        	 // On query success it will print below message.
	$MSG = 'Task Successfully Submitted.' ;
	 
	// Converting the message into JSON format.
	$json = json_encode($MSG);
	 
	// Echo the message.
	 echo $json ;

    }
    mysqli_close($connect);
 ?>
