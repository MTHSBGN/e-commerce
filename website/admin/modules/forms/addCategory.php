<?php
/* This script allows to add a new category name inside the
e-commerce database. The information required are sent through a POST request.
- $_POST['category']
- $_POST['french']
- $_POST['english']
 */

/* Check to avoid direct access by user with the url */
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    /*
    Up to you which header to send, some prefer 404 even if
    the files does exist for security
     */
    header('HTTP/1.0 403 Forbidden', true, 403);

    /* choose the appropriate page to redirect users */
    die(header('Location: ../../../errors/403.html'));

}

include '../../../connectDB.php';
include '../../admin_active_session.php';

if (isset($_POST['submit'])) {
    mysqli_autocommit($GLOBALS['connectDB'], false);
    $cat_name      = mysqli_real_escape_string($connectDB, $_POST['category']);
    $french_descr  = mysqli_real_escape_string($connectDB, $_POST['french']);
    $english_descr = mysqli_real_escape_string($connectDB, $_POST['english']);
    $sql           = "INSERT INTO Description(french, english) VALUES('$french_descr', '$english_descr');
    INSERT INTO Category(description_id, name) VALUES(LAST_INSERT_ID(), '$cat_name')";
    $res = mysqli_multi_query($connectDB, $sql);

    // Only check the first query
    if (!$result) {
        mysqli_rollback($GLOBALS['connectDB']);
        header('Location: ../../category.php?result=0');
    }

    while (mysqli_next_result($GLOBALS['connectDB'])) {
        if ($resSet = mysqli_store_result($GLOBALS['connectDB'])) {mysqli_free_result($resSet);}
    }

    // check for errors in any query of any script
    if (mysqli_error($GLOBALS['connectDB'])) {
        mysqli_rollback($GLOBALS['connectDB']);
        header('Location: ../../category.php?result=0');
        return;
    }

    mysqli_commit($GLOBALS['connectDB']);
    header('Location: ../../category.php?result=1');
}
