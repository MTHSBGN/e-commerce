<?php
// check if the admin session is still alive or not.
// If it is not the case. The admin user will be redirected to the login page.
session_start();

// the admin is not active anymore
if (!isset($_SESSION['login_user']) && !isset($_SESSION['type'])) {
    header("location: ../index.php");
} else if (isset($_SESSION['type']) && $_SESSION['type'] != 0) {
    header("location: ../index.php");
}
