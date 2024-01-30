<?php
include 'config.php';
mysqli_select_db($conn,$dbname);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $stmt = $conn->prepare("UPDATE students SET student_name=?, student_email=?, student_gender=? WHERE student_id=?");
    $stmt->bind_param("sssi", $name, $email, $gender, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php?id=$id");
    exit();
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM students WHERE student_id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form validation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Hello <?php echo "{$row['student_name']}"; ?></h1><br>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="">Name: </label>
        <input type="text" name="name" value="<?php echo $row['student_name']; ?>" required>
        <br><br>
        <label for="">Email: </label>
        <input type="email" name="email" value="<?php echo $row['student_email']; ?>" required> <br><br>
        <label for="">Gender: </label>
        <input type="radio" name="gender" value="Male" <?php echo ($row['student_gender'] === 'male') ? 'checked' : ''; ?> required> Male 
        <input type="radio" name="gender" value="Female" <?php echo ($row['student_gender'] === 'female') ? 'checked' : ''; ?>required> Female <br><br>
        <label for="">Agree: </label>
        <input type="checkbox" name="agree" value="<?php echo $row['mail_status']; ?>" <?php echo ($row['mail_status'] == 1) ? 'checked' : ''; ?>>
        <span> Receive E-mails from us</span>
        <br><br>
        <input type="submit" name="update">
    </form>
</body>
</html>
