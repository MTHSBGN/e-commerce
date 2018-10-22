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

function addCategory($connectDB, $name, $fr, $en)
{
    $cat_name      = mysqli_real_escape_string($connectDB, $name);
    $french_descr  = mysqli_real_escape_string($connectDB, $fr);
    $english_descr = mysqli_real_escape_string($connectDB, $en);
    $sql           = "INSERT INTO Description(french, english) VALUES('$french_descr', '$english_descr');
    INSERT INTO Category(description_id, name) VALUES(LAST_INSERT_ID(), '$cat_name')";
    $res = mysqli_multi_query($connectDB, $sql);
    //header('Location: ' . $_SERVER['PHP_SELF']); redirection must be done after
}

function addProduct($connectDB, $name, $cat, $descr, $sku_id, $price, $quantity)
{
    $name     = mysqli_real_escape_string($connectDB, $name);
    $cat      = mysqli_real_escape_string($connectDB, $cat);
    $descr    = mysqli_real_escape_string($connectDB, $descr);
    $sku_id   = mysqli_real_escape_string($connectDB, $sku_id);
    $price    = mysqli_real_escape_string($connectDB, $price);
    $quantity = mysqli_real_escape_string($connectDB, $quantity);

    $sql = "INSERT INTO Product(description_id, category_id, name) VALUES('$descr', '$cat', '$name');
    INSERT INTO Sku(sku_id, price, quantity) VALUES('$sku_id', '$price', '$quantity')";
    $res = mysqli_multi_query($connectDB, $sql);
    //header('Location: ' . $_SERVER['PHP_SELF']); redirection must be done after
}

function addVariant($connectDB, $sku_id, $product_id, $attribute, $value)
{
    $sku_id     = mysqli_real_escape_string($connectDB, $sku_id);
    $product_id = mysqli_real_escape_string($connectDB, $product_id);
    $attribute  = mysqli_real_escape_string($connectDB, $attribute);
    $value      = mysqli_real_escape_string($connectDB, $value);

    $sql = "INSERT INTO Variant(sku_id, product_id, attribute, value) VALUES('$sku_id', '$product_id', '$attribute', '$value');";
    $res = mysqli_multi_query($connectDB, $sql);
}
