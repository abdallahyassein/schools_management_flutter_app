<?php

// just simple connecting with localhost 

$connect= new mysqli("localhost","root","","institutions");
if($connect){

}else{

	echo "Connection Failed";
	exit();

}

?>
