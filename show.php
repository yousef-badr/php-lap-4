<?php 
    include 'config.php';
    include 'index.html';
    $id = $_GET['id'];
    $sql = "SELECT  student_name, student_email, student_gender , mail_status FROM students WHERE student_id=$id";
    mysqli_select_db($conn,$dbname);
    $result = mysqli_query($conn,$sql );
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>View Record</h2>
    <label for=""><h3>Name</h3></label>
    <p><?php echo "{$row['student_name']}" ?></p>
    <label for=""><h3>Email</h3></label>
    <p><?php echo "{$row['student_email']}" ?></p>
    <label for=""><h3>Gender</h3></label>
    <p><?php echo "{$row['student_gender']}" ?></p>
    <a href="index.php"><button type="button" class="btn btn-primary">Back</button></a>
</body>
</html>