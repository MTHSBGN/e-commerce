<!DOCTYPE html>
<?php
// This page is used to create a new account on the freezer database.
include 'connectDB.php';
$error = "";

if (isset($_POST['submit'])) {
    $error = "";
    if (!strcmp($_POST['email'], '') || strcmp($_POST['password'], $_POST['repassword'])) {
        echo $error = "Not the same password!!";
    } else {
        $email     = mysqli_real_escape_string($connectDB, $_POST['email']);
        $username  = mysqli_real_escape_string($connectDB, $_POST['username']);
        $firstname = mysqli_real_escape_string($connectDB, $_POST['firstname']);
        $lastname  = mysqli_real_escape_string($connectDB, $_POST['lastname']);
        $delivery  = mysqli_real_escape_string($connectDB, $_POST['delivery_address']);
        $type      = mysqli_real_escape_string($connectDB, $_POST['type']);
        $password  = mysqli_real_escape_string($connectDB, $_POST['password']);
        $password  = crypt($password, $_SERVER['key_encrypt']); #encrypt the password with a salt
        $sql       = "INSERT INTO Customer(email, username, password, firstname, lastname, delivery_address, type) VALUES('$email', '$username', '$password', '$firstname', '$lastname', '$delivery', '$type')";
        $res       = mysqli_query($connectDB, $sql);

        if ($res) {
            header("location: login.php");
        } else {
            $error = "An account with this email already exists!";
        }
    }
}
?>

<html>

<head>
    <!--For Mobile devices-->
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, width = device-width">
    <meta http-equiv="Content-Type" content="text/html; charset = utf-8">
    <link rel="stylesheet" href="./css/login.css">
    <title> Sign up </title>
</head>

<div class="connectPanel">
    <h1> Sign up </h1>
    <form class="boxcon" name="registration" method="post" action="register.php">
        <input type="text" name="email" placeholder="Email" required/>
        <input type="text" name="username" placeholder="username" required/>
        <input type="password" name="password" placeholder="Password" required/>
        <input type="password" name="repassword" placeholder="Pass again" required/>
        <input type="text" name="firstname" placeholder="first name" required/>
        <input type="text" name="lastname" placeholder="last name" required/>
        <input type="text" name="delivery_address" placeholder="ship address" required/>
        <select name="type" required>
            <option value="1">Student</option>
            <option value="2">Teacher</option>
        </select>
        <input type="submit" name="submit" value="submit">
    </form>
    <div class="error">
      <?php echo $error ?>
        <!-- Manage error returned with ejs or anything else -->
    </div>
    </body>

</html>