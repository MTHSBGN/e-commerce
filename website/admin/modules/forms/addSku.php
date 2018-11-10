<?php
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
// Includes to connect to the DB and check the user access
include '../../../connectDB.php';
include '../../admin_active_session.php';

if (isset($_POST['submit'])) {
    $sku_id     = mysqli_real_escape_string($connectDB, $_POST['sku_id']);
    $product_id = mysqli_real_escape_string($connectDB, $_POST['product_id']);
    $price      = mysqli_real_escape_string($connectDB, $_POST['price']);
    $available  = mysqli_real_escape_string($connectDB, $_POST['quantity']);

    $sql = "INSERT INTO Sku(sku_id, product_id, price, available) VALUES('$sku_id', '$product_id', '$price', '$available')";
    $res = mysqli_query($connectDB, $sql);
    $response = 0;
    // Insertion is a success
    if ($res) {
        $response = 1;
    }
    
    header('Location: ../../product.php?result=' . $response);
}
