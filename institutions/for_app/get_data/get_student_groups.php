<?php

// first we will get group_id from control_groups table

// second we will use group_id to get groups(classes) from groups table

// third we will send data in json form

include '../conn.php';

$id=intval($_POST['id']); // student id that we are gonna get from the app

$queryResult=$connect ->query("SELECT * FROM control_groups WHERE student_id='".$id."'");
$result =array();
$result2 =array();
while ($fetchData=$queryResult->fetch_assoc()) {
  $result[]=$fetchData;
  $group_id=$fetchData['group_id'];

  $queryResult2=$connect ->query("SELECT * FROM groups WHERE id='".$group_id."'");
  

  while ($fetchData2=$queryResult2->fetch_assoc()) {
        
    $result2[]=$fetchData2;

    
  }
}

echo json_encode($result2); // send the data as json

 ?>
