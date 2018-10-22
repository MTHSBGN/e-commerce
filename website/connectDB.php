<?php
// This script is used to establish the connect with
// the mysql database. It is needed by pages that want to interact with
// the database.
$serverName = "localhost";
$username   = "root";
$password   = "";
$database   = "group15";
$connectDB  = mysqli_connect($serverName, $username, $password, $database);
// set the charset to utf8
mysqli_set_charset($connectDB, "utf8");
// Set the sha-512 encrypt key
$_SERVER['key_encrypt'] = '$6$rounds=5000$qDkTfHiTaWeaIOgzTeD$';

if (mysqli_connect_errno()) {
    printf("connection error: %s\n", mysqli_connect_error());
    exit();
}
