<?php
include 'index.html';
include 'config.php';
mysqli_select_db( $conn,$dbname );
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $status = $_POST["agree"];
    $sql = "INSERT INTO students (student_name, student_email,student_gender,mail_status) VALUES ('$name', '$email','$gender','$status')";
}

header("Location: index.php");
$retval = mysqli_query( $conn,$sql );

mysqli_close($conn);
?>