<?php
session_start();
$ste = false;
# the user is not active anymore
if (!isset($_SESSION['login_user'])) {
    $state = false;
} else {
    $state = true;
}

