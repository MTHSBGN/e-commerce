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
// Includes to connect to the DB and check the user access
include '../../../connectDB.php';
include '../../admin_active_session.php';

if (isset($_POST['submit'])) {
    $sku_id     = mysqli_real_escape_string($connectDB, $_POST['sku_id']);
    $product_id = mysqli_real_escape_string($connectDB, $_POST['product_id']);
    $attribute  = mysqli_real_escape_string($connectDB, $_POST['attr']);
    $value      = mysqli_real_escape_string($connectDB, $_POST['value']);

    $sql = "INSERT INTO Variant(sku_id, product_id, attribute, value) VALUES('$sku_id', '$product_id', '$attribute', '$value');";
    $res = mysqli_multi_query($connectDB, $sql);
    //TODO check the res and redirect if problems
    header('Location: ../../product.php');
}
