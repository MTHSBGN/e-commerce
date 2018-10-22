<?php
/* Check to avoid direct access by user with the url */
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    /*
    Up to you which header to send, some prefer 404 even if
    the files does exist for security
     */
    header('HTTP/1.0 403 Forbidden', true, 403);

    /* choose the appropriate page to redirect users */
    die(header('location: ../../errors/404.html'));

}

include '../../../connectDB.php';
include '../../admin_active_session.php';

if (isset($_POST['submit'])) {
    $cat_name      = mysqli_real_escape_string($connectDB, $_POST['cat_name']);
    $french_descr  = mysqli_real_escape_string($connectDB, $_POST['french']);
    $english_descr = mysqli_real_escape_string($connectDB, $_POST['english']);
    $sql           = "INSERT INTO Description(french, english) VALUES('$french_descr', '$english_descr');
    INSERT INTO Category(description_id, name) VALUES(LAST_INSERT_ID(), '$cat_name')";
    $res = mysqli_multi_query($connectDB, $sql);
    //TODO check the res and redirect if problems
    header('Location: ../../category.php');
}
