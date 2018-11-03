<!DOCTYPE html>
<?php
// This page is used to create a new account on the freezer database.
include 'connectDB.php';
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")  {
    $error = "";
    if (!strcmp($_POST['email'], '') || strcmp($_POST['password'], $_POST['repassword'])) {
        $error = "Not the same password!!";
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
            $error = "An account with this email/username already exists!";
        }
    }
}
?>

<html>
<head>
    <!--For Mobile devices-->
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, width = device-width">
    <meta http-equiv="Content-Type" content="text/html; charset = utf-8">
    <link rel="stylesheet" href="./css/form.css">
    <title> Sign up </title>
</head>
<body>
    <div id="form-card">
        <h2>Sign up</h2>
        <form class="boxcon" name="registration" method="post" action="register.php">
            <div id="register-name">
                <div class="form-input">
                    <input id="register-firstname" type="text" name="firstname" required>
                    <label for="register-firstname">First name</label>
                </div>
                <div class="form-input">
                    <input id="register-lastname" type="text" name="lastname" required>
                    <label for="register-lastname">Last name</label>
                </div>
            </div>
            <div class="form-input">
                <input id="register-username" type="text" name="username" required>
                <label for="register-username">Username</label>
            </div>
            <div class="form-input">
                <input id="register-email" type="text" name="email" required>
                <label for="register-email">E-mail</label>
            </div>
            <div class="form-input">
                <input id="register-password" type="password" name="password" required>
                <label for="register-password">Password</label>
            </div>
            <div class="form-input">
                <input id="register-repassword" type="password" name="repassword" required>
                <label for="register-repassword">Password</label>
            </div>
            <div class="form-input">
                <input id="register-address" type="text" name="delivery_address" required>
                <label for="register-address">Shipping address</label>
            </div>
            <select name="type" required>
                <option value="" disabled selected>Select an option</option>
                <option value="1">Alumni</option>
                <option value="2">Student</option>
                <option value="3">Teacher</option>
            </select>
            
            <button>Sign up</button>
        </form>
        <div class="error">
      <?php echo $error ?>
        <!-- Manage error returned with ejs or anything else -->
</div>
    </div>
</body>
</html>