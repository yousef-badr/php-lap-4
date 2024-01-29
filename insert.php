<?php
include 'index.html';
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname ='php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn ) {
    die('Could not connect: ' . mysqli_error($conn));
} 
mysqli_select_db( $conn,$dbname );
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $status = $_POST["agree"];
    $sql = "INSERT INTO students (student_name, student_email,student_gender,mail_status) VALUES ('$name', '$email','$gender','$status')";
}
   
// echo 'Connected successfully<br>';
  
$sql = 'SELECT student_id , student_name, student_email, student_gender , mail_status FROM students';
mysqli_select_db($conn,$dbname);
$result = mysqli_query($conn,$sql );
   
if(! $result ) {
  die('Could not get data: ' . mysqli_error($conn));
}

echo ' <h1 style="display: inline;"> User Details </h1> ' . ' <a href="register.php"><button type="button" class="btn btn-primary">Add New User</button></a>';

echo "<table class='table table-striped'>
<thead>
  <tr>
    <th scope='col'>#</th>
    <th scope='col'>Name</th>
    <th scope='col'>Email</th>
    <th scope='col'>Gender</th>
    <th scope='col'>Mail Status</th>
    <th scope='col'>Action</th>
  </tr>
</thead>
<tbody>";

if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <th scope='row'>"."{$row['student_id']}"."</th>
                <td>"."{$row['student_name']}"."</td>
                <td>"."{$row['student_email']}"."</td>
                <td>"."{$row['student_gender']}"."</td>
                <td>"."{$row['mail_status']}"."</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='6'>0 results</td></tr>";
}

echo "</tbody>
</table>";

mysqli_close($conn);
?>