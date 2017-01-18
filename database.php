<?php
//create connection credentials

$db_host='localhost';
$db_name='quizzer';
$db_user='root';
$db_pass='saveearth';

//create a mysqli object
$mysqli=new mysqli($db_host,$db_user,$db_pass,$db_name);

//Error Handler

if($mysqli->connect_error){// if not connected it shows the error below
	printf("Connection Failed: %s\n",$mysqli->connect_error);
	// Or , die("Connection failed: " . $mysqli->connect_error);
	exit();
}