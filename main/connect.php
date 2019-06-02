<?php
$hostname='localhost';
$user_name='root';
$password='';
$db_name='doctor_appoint';

// Create connection
$conn=mysqli_connect($hostname,$user_name,$password,$db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>