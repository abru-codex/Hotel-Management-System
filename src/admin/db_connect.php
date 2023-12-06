<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_db";

$conn= new mysqli($servername,$username,$password,$dbname)or die("Could not connect to mysql".mysqli_error($con));

?>
