<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname ='php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn ) {
    die('Could not connect: ' . mysqli_error($conn));
} 
//    echo 'Connected successfully';

//    mysqli_close($conn);
?>