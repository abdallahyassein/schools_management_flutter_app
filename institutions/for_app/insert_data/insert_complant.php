<?php

include '../conn.php';

// Storing the received JSON in $json.
$json = file_get_contents('php://input');
 
// Decode the received JSON and store into $obj
$obj = json_decode($json,true);

$school_id=intval($obj['school_id']);
$type=$obj['type'];
$name=$obj['name'];                         // the variables that user gonna insert from the app
$number=$obj['number'];
$title=$obj['title'];
$feedback=$obj['feedback'];

    // Prepare an insert statement
    $sql = "INSERT INTO complants (school_id,type,name,number,title,feedback) VALUES ($school_id,'$type','$name','$number','$title','$feedback')";


    if(mysqli_query($connect,$sql)){

     // On query success it will print below message.
	$MSG = 'Complaint Successfully Submitted.' ;
	 
	// Converting the message into JSON format.
	$json = json_encode($MSG);
	 
	// Echo the message.
	 echo $json ;

    }
    mysqli_close($connect);
 ?>
