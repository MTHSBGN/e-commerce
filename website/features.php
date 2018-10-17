<?php
session_start();
$ste = false;
# the user is not active anymore
if (!isset($_SESSION['login_user'])) {
    $state = false;
} else {
    $state = true;
}

function accountState($active)
{
    $output = '';

    if ($active) {
        $output .= '<li class="account">';
        $output .= '<a href="#">';
        $output .= $_SESSION['username'];
        $output .= '</a>';

        $output .= '<ul class="account_selection">';
        $output .= '<li><a href="./logout.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Logout</a></li>';
        $output .= '</ul>';
        $output .= '</li>';
    } else {
        $output .= '<li class="account">';
        $output .= '<a href="#">';
        $output .= 'Account';
        $output .= '</a>';

        $output .= '<ul class="account_selection">';
        $output .= '<li><a href="./login.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a></li>';
        $output .= '<li><a href="./register.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>';
        $output .= '</ul>';
        $output .= '</li>';
    }

    echo $output;
}
