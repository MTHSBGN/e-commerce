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

// if (isset($_POST['submit']) && isset($_POST['start']) && isset($_POST['end'])) {
//     header('Content-Type: application/csv');
//     header('Content-Disposition: attachment; filename="sku_start_to_end.csv";');
//     $out = fopen('php://output', 'w');
//     $sql = "SELECT * FROM  INNER JOIN Variant ON Sku.sku_id = Variant.sku_id WHERE;";
//     $res = mysqli_query($connectDB, $sql);
//     $row = mysqli_fetch_assoc($res);
//     //read first line to have header
//     fputcsv($out, array_keys($row));
//     fputcsv($out, $row);

//     while ($row = mysqli_fetch_assoc($res)) {
//         fputcsv($out, $row);
//     }
// }
if (isset($_POST['submit']) && isset($_POST['stock'])) {
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="sku_quantity.csv";');
    $out       = fopen('php://output', 'w');
    $available = mysqli_real_escape_string($connectDB, $_POST['stock']);
    $sql       = "SELECT * FROM Sku INNER JOIN Variant ON Sku.sku_id = Variant.sku_id WHERE Sku.available < '$available';";
    $res       = mysqli_query($connectDB, $sql);
    $row       = mysqli_fetch_assoc($res);
    //read first line to have header
    fputcsv($out, array_keys($row));
    fputcsv($out, $row);

    while ($row = mysqli_fetch_assoc($res)) {
        fputcsv($out, $row);
    }

} elseif (isset($_POST['submit'])) {
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="sku.csv";');
    $out = fopen('php://output', 'w');
    $sql = "SELECT * FROM Sku INNER JOIN Variant ON Sku.sku_id = Variant.sku_id;";
    $res = mysqli_query($connectDB, $sql);
    $row = mysqli_fetch_assoc($res);
    //read first line to have header
    fputcsv($out, array_keys($row));
    fputcsv($out, $row);

    while ($row = mysqli_fetch_assoc($res)) {
        fputcsv($out, $row);
    }
}
