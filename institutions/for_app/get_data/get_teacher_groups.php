<?php

include '../conn.php';

$teacher_id=intval($_POST['teacher_id']); // teacher id that we are gonna get from the app

$queryResult=$connect ->query("SELECT * FROM groups WHERE teacher_id='".$teacher_id."'");
$result =array();
while ($fetchData=$queryResult->fetch_assoc()) {
  $result[]=$fetchData;
}

echo json_encode($result); // send the data as json

 ?>
