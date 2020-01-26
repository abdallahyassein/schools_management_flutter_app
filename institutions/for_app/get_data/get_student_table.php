<?php

include '../conn.php';

$grade=$_POST['grade']; // student grade that we are gonna get from the app

$queryResult=$connect ->query("SELECT * FROM schedules WHERE grade='".$grade."'");
$result =array();
while ($fetchData=$queryResult->fetch_assoc()) {
  $result[]=$fetchData;
}

echo json_encode($result); // send the data as json

 ?>
