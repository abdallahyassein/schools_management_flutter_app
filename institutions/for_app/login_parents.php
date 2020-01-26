<?php

// login for app using the username and password that app user gonna insert 

include 'conn.php';
$username=$_POST['username'];
$password=$_POST['password'];

$queryResult=$connect->query("SELECT * FROM parents WHERE username='".$username."'");

$result=array();

while($fetchData=$queryResult->fetch_assoc()){

if (password_verify($password, $fetchData['password'])) {  // use for the hashed password
$result[]=$fetchData;
}
}
echo json_encode($result); // send the data as json
?>
