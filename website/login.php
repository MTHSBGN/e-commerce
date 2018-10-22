<!DOCTYPE html>
<?php
// This page is used to connect an existing user to the user panel.
include 'connectDB.php';
session_start();
// the session is active
if (isset($_SESSION['login_user'])) {
    header("location: ./index.php");
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email      = mysqli_real_escape_string($connectDB, $_POST['email']);
    $password = mysqli_real_escape_string($connectDB, $_POST['password']);

    $query  = "SELECT * FROM Customer where email = '$email'";
    $result = mysqli_query($connectDB, $query);
    $row    = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count  = mysqli_num_rows($result);

    if ($count == 1 && hash_equals($row['password'], crypt($password, $row['password']))) {
        $_SESSION['login_user'] = $email;
        $_SESSION['username']   = $row["username"];
        $_SESSION['type']       = $row["type"];
        //put restriction if we want other direction for admin
        header("location: ./index.php");

    } else {
        $error = "Your email or password is invalid";
    }
}
?>

<html>

<head>
    <!--For Mobile devices-->
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, width = device-width">
    <meta http-equiv="Content-Type" content="text/html; charset = utf-8">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
    <link rel="stylesheet" href="css/form.css">
    <title> Sign in </title>
</head>

<body>
    <div id="form-card">
        <h2>Sign in</h2>
        <form action="" method="post">
            <div class="form-input">
                <input id="login-email" type="text" name="email" required>
                <label for="login-email">E-mail</label>
            </div>
            <div class="form-input">
                <input id="login-password" type="password" name="password" required>
                <label for="login-password">Password</label>
            </div>

            <div id="login-forgot-register">
                <a href="">Forgot Password?</a>
                <p>Not a member? <a href="./register.php">Register</a></p>
            </div>

            <button value="Connection">Sign in</button>
        </form>
    </div>
</body>

</html>