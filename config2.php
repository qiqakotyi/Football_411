<?php 
$host 		= "localhost";
$username 	= "root";
$password   = "root";
$db			= "soccerladuma";
 

$con = mysqli_connect($host,$username,$password,$db);
if (mysqli_connect_error($con))
	echo "could not connect<br />";
