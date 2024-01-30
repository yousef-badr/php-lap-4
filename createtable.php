<?php
include 'config.php';
mysqli_select_db( $conn,$dbname );
$sql = 'CREATE TABLE students( student_id INT NOT NULL AUTO_INCREMENT,
   student_name VARCHAR(20) NOT NULL,
   student_email  VARCHAR(20) NOT NULL,
   student_gender   VARCHAR(10),
   mail_status  VARCHAR(10) NOT NULL,
   primary key ( student_id ))';
$retval = mysqli_query( $conn,$sql );
if(! $retval ) {
   die('Could not create table: ' . mysqli_error($conn));
}
echo "<br>Database Table  created successfully\n";
mysqli_close($conn);