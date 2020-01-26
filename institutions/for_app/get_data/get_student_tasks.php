<?php

include '../conn.php';

$group_id=intval($_POST['group_id']); // group id that we are gonna get from the app

$queryResult=$connect ->query("SELECT * FROM tasks WHERE group_id='".$group_id."' ORDER BY date_of_task DESC");
$result =array();
while ($fetchData=$queryResult->fetch_assoc()) {
  $result[]=$fetchData;
}

echo json_encode($result); // send the data as json

 ?>
