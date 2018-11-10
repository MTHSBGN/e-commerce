<?php
/*
This script allows to assess a new client order inside the
e-commerce database. The information required are sent through a POST request.
- $_POST['user_id']
- $_POST['address']
- $_POST['order'] Must be a json file as defined in the example below.
 */

include 'connectDB.php';
session_start();
$state = false;
# the user is not active anymore
if (!isset($_SESSION['login_user'])) {
    $state = false;
} else {
    $state = true;
}

function retrieve_products($products)
{
    $prods  = implode("','", $products);
    $query  = "SELECT sku_id, price, available, sold FROM Sku WHERE sku_id IN ('" . $prods . "')";
    $result = mysqli_query($GLOBALS['connectDB'], $query);
    $post   = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $post[] = $row;
    }
    return $post;
}

function create_product_order($client_id, $date, $total_price, $ship_address, $order_details, $sku_update)
{
    mysqli_autocommit($GLOBALS['connectDB'], false);
    $query = "INSERT INTO Client_order(client_id, date, total_price, ship_address) VALUES('$client_id', '$date', '$total_price', '$ship_address');
    INSERT INTO Order_details(order_id, sku_id, quantity) VALUES $order_details;
    INSERT INTO Sku(sku_id,available,sold) VALUES $sku_update ON DUPLICATE KEY UPDATE sku_id=VALUES(sku_id), available=VALUES(available), sold=VALUES(sold);"; // not standard sql queries only for MySQL https://stackoverflow.com/questions/20255138/sql-update-multiple-records-in-one-query
    $result = mysqli_multi_query($GLOBALS['connectDB'], $query);

    // Only check the first query
    if (!$result) {
        echo "<p> Error during the request made </p>";
        echo "<p> Transaction has been aborted !!</p>";
        mysqli_rollback($GLOBALS['connectDB']);
        return;
    }

    while (mysqli_next_result($GLOBALS['connectDB'])) {
        if ($resSet = mysqli_store_result($GLOBALS['connectDB'])) {mysqli_free_result($resSet);}
    }

    // check for errors in any query of any script
    if (mysqli_error($GLOBALS['connectDB'])) {
        echo "<p> Error during the request made </p>";
        echo "<p> Transaction has been aborted !!</p>";
        mysqli_rollback($GLOBALS['connectDB']);
        return;
    }

    mysqli_commit($GLOBALS['connectDB']);
}

function accept_order($user_id, $address, $products)
{
    $prods      = json_decode($products, true);
    $sku_ids    = array_keys($prods);
    $quantities = array_values($prods);

    $product_list = retrieve_products($sku_ids);

    $total_price = 0;

    // Generate the list of sku_id to update after the order
    $order_details = [];
    foreach ($prods as $key => $value) {
        $order_details[] = "(LAST_INSERT_ID(),'$key','$value')";
    }

    // Generate the list of products bought to insert them into to Order_details table
    $sku_update = [];
    foreach ($product_list as $row) {
        $elem_id       = $row['sku_id'];
        $product_price = $row['price'];
        $sold          = $row['sold'];
        $quantity      = $prods[$elem_id];
        $available     = $row['available'];
        $remain        = ($available - $quantity);
        // Check if the quantity for the product ordered is correct
        if ($remain < 0) {
            echo "<p>error out of stock for product $elem_id only $available still available</p>";
            echo "<p> Transaction has been aborted !!</p>";
            return;
        }

        $total_price += $product_price * $quantity;
        $sold += $quantity;
        $sku_update[] = "('$elem_id', '$remain','$sold')";
        // echo "(".$row['sku_id'].", ". ($row['available'] - $prods[$row['sku_id']]).") <br/>";
        // echo $prods[$row['sku_id']] * $row['price'];
    }

    $order_details = implode(",", $order_details);
    $sku_update    = implode(",", $sku_update);
    create_product_order($user_id, date("Y-m-d H:i:s"), $total_price, $address, $order_details, $sku_update);

    echo "<p> Your order has been accepted </p>";
}

$user_id = 1;
$address = 'lala';
$input   = '{"BADGE_HEC": 2, "BAG_HEC": 2}';

accept_order($user_id, $address, $input);
