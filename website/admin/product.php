<!DOCTYPE html>
<?php
/* This file generates the product page that give the possibility to add new
products inside the e-commerce database.
 */
include 'admin_active_session.php';
include '../connectDB.php';

/*
This function create a <select>
tag option category for a form and put the right id corresponding at the given class
as value parameter.
 */
function list_category()
{
    $sql = "SELECT category_id, name FROM Category;";
    $res = mysqli_query($GLOBALS['connectDB'], $sql);

    if (!$res) {
        echo ("Error description: " . mysqli_error($con));
    }

    $list = '<select name="category" required>';
    $list .= '<option disabled selected value> -- select a product -- </option>';
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($res)) {
        $list .= '<option value="' . $row['category_id'] . '">' . $row['name'] . '</option>';
    }
    $list .= '</select>';
    echo $list;
}

/*
This function create a <select>
tag option sku_id for a form and put the right id corresponding at the given class
as value parameter.
 */
function list_sku_id()
{
    $sql = "SELECT sku_id FROM Sku;";
    $res = mysqli_query($GLOBALS['connectDB'], $sql);
    if (!$res) {
        echo ("Error description: " . mysqli_error($con));
    }
    $list = '<select name="sku_id" required>';
    $list .= '<option disabled selected value> -- select a sku id -- </option>';
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($res)) {
        $list .= '<option value="' . $row['sku_id'] . '">' . $row['sku_id'] . '</option>';
    }
    $list .= '</select>';
    echo $list;
}

/*
This function create a <select>
tag option product for a form and put the right id corresponding at the given class
as value parameter.
 */
function list_product()
{
    $sql = "SELECT product_id, name FROM Product;";
    $res = mysqli_query($GLOBALS['connectDB'], $sql);

    if (!$res) {
        echo ("Error description: " . mysqli_error($con));
    }

    $list = '<select name="product_id" required>';
    $list .= '<option disabled selected value> -- select a product -- </option>';
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($res)) {
        $list .= '<option value="' . $row['product_id'] . '">' . $row['name'] . '</option>';
    }
    $list .= '</select>';
    echo $list;
}

?>

<html>
<?php
$_GET['title'] = 'product';
include './modules/meta.php';
?>

<body>
    <?php include './modules/header.php'?>

    <div class="wrapper">
        <?php include './modules/navbar.php'?>
        <div class="container">
            <section>
                <h2>Add a new product description</h2>

                <form class="form-container" method="POST" action="./modules/forms/addProduct.php">
                    <h1>Add a new product description</h1>
                    <div id="pass-form">
                        <input type="text" name="name" placeholder="name" required>
                        <?php list_category()?>
                        <input type="textarea" name="french" placeholder="french description" required>
                        <input type="textarea" name="english" placeholder="english description" required>
                        <input type="submit" name="submit" value="add">
                    </div>
                </form>

                <h2>Add a new sku for existing product</h2>

                <form class="form-container" method="POST" action="./modules/forms/addSku.php">
                    <h1>Add a new sku</h1>
                    <div id="pass-form">
                        <?php list_product()?>
                        <p>Not already used</p>
                        <input type="text" name="sku_id" placeholder="sku id" required>
                        <input type="number" step="0.01" name="price" placeholder="price" min="0" required>
                        <input type="number" name="quantity" placeholder="quantity" min="0" required>
                        <input type="submit" name="submit" value="add">
                    </div>
                </form>

                <h2>Add a new variant</h2>

                <form class="form-container" method="POST" action="./modules/forms/addVariant.php">
                    <h1>Add a new variant</h1>
                    <div id="pass-form">
                        <?php list_sku_id()?>
                        <input type="text" name="attr" placeholder="attribute" required>
                        <input type="text" name="value" placeholder="value" required>
                        <input type="submit" name="submit" value="add">
                    </div>
                </form>
            </section>
        </div>
    </div>
    <footer class="footer-basic-centered">
        <p> Website built by: Loïc Lejoly </p>
        <p> University of Liège </p>
    </footer>
</body>

<?php
//generate alert box after insertion
if (isset($_GET["result"])) {
    $res = $_GET["result"];
    if ($res) {
        echo "<script type='text/javascript'>alert('inserted')</script>";
    } else {
        echo "<script type='text/javascript'>alert('failed!')</script>";
    }
}
?>

<script>
    //remove the active class from all items, if there is any
    $('nav li').removeClass('active');

    //finally, add the active class to the current item
    $('#' + document.title).addClass('active');
</script>

</html>