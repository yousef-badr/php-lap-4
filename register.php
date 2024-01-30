<?php
include "config.php";
include "index.html";
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
    <h1> User Registration Form</h1><br>
    <h6>Please fill this form and submit to add user record to the database</h6><br>
    <form action="insert.php" method="post">
        <label for="" >Name : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
        <input type="text" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']):''  ?>" required>
        <br><br>
        <label for="" >Email : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
        <input type="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']):''  ?>" requried> <br><br>
        <label for="">Gender : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
        <input type="radio" name="gender" value="male"> Male 
        <input type="radio" name="gender" value="female"> Female <br><br>
        <label for="">Agree : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
        <input type="checkbox" name="agree" ><span> Receive E-mails from us</span>
        <br><br>
        <input type="submit" name="submit">
    </form>
</body>
</html>
<?php
mysqli_close($conn);
?>