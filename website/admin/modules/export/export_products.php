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
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="products.csv";');
    $out = fopen('php://output', 'w');
    $sql = "SELECT Product.name as product_name, Category.name as category_name, Sku.sku_id, Sku.price, Sku.available, Sku.sold
    FROM Product INNER JOIN Sku ON Product.product_id = Sku.product_id
    INNER JOIN Category ON Product.category_id = Category.category_id;";
    $res = mysqli_query($connectDB, $sql);
    $row = mysqli_fetch_assoc($res);
    //read first line to have header
    fputcsv($out, array_keys($row));
    fputcsv($out, $row);

    while ($row = mysqli_fetch_assoc($res)) {
        fputcsv($out, $row);
    }
    //TODO check the res and redirect if problems
    //header('Location: ../../product.php');
}
