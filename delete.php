<?php
include 'config.php';
mysqli_select_db($conn,$dbname);
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM students WHERE student_id=$id");
    header("Location: index.php");
    exit();
}
?>
