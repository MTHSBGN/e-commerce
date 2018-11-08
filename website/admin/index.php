<!DOCTYPE html>
<?php
// This file is used to display the admin panel
include 'admin_active_session.php';
include '../connectDB.php';

function get_users()
{
    $sql = "SELECT * FROM Customer;";
    $res = mysqli_query($GLOBALS['connectDB'], $sql);
    if (!$res) {
        echo ("Error description: " . mysqli_error($con));
    }
    echo mysqli_num_rows($res);
}

function get_num_orders()
{
    $sql = "SELECT * FROM Product_order;";
    $res = mysqli_query($GLOBALS['connectDB'], $sql);
    if (!$res) {
        echo ("Error description: " . mysqli_error($con));
    }
    echo mysqli_num_rows($res);
}

?>

<html>
<?php 
$_GET['title']='home';
include './modules/meta.php';
?>

<body>
  <?php include './modules/header.php'?>

  <div class="wrapper">
    <?php include './modules/navbar.php'?>
    <div class="container">
      <p>
        Welcome on the admin panel. The panel is really simple it only gives the different types of products and the
        possibility
        to add a new type of product. </p>
      <div class="row">

        <div class="col-sm admin-tiles">
          <h2>users</h2>
          <div class="admin-tiles-content">
            <div class="admin-tiles-content-left">
              <p>Number</p>
            </div>
            <div class="admin-tiles-content-right">
              <p>
                <?php get_users()?>
              </p>
            </div>
          </div>
        </div>

        <div class="col-sm admin-tiles">
          <h2>Products</h2>
          <div class="admin-tiles-content">

            <div class="admin-tiles-content-left">
              <p>Sold</p>
            </div>
            <div class="admin-tiles-content-right">
              <p>20</p>
            </div>

          </div>
        </div>

        <div class="col-sm admin-tiles">
          <h2>Revenue</h2>
          <div class="admin-tiles-content">

            <div class="admin-tiles-content-left">
              <p>Benefice</p>
            </div>
            <div class="admin-tiles-content-right">
              <p class="green-alert">200</p>
            </div>
          </div>

          <div class="admin-tiles-content">
            <div class="admin-tiles-content-left">
              <p>Increase</p>
            </div>
            <div class="admin-tiles-content-right">
              <p class="green-alert">15%</p>
            </div>
          </div>

        </div>
      </div>

      <div class="row">
        <div class="col-sm admin-tiles">
          <h2>Orders</h2>
          <div class="admin-tiles-content">
            <div class="admin-tiles-content-left">
              <p>Number</p>
            </div>
            <div class="admin-tiles-content-right">
              <p>
                <?php get_num_orders()?>
              </p>
            </div>
          </div>
        </div>
      </div>


      <form class="form-container" style="text-align:center" method="POST" action="./modules/export/export_products.php">
        <h2>Products export csv</h2>
        <p> This export will create a csv file (standard file that does not depend of microsoft suite).</p>
        <p> This export contains several fields which are:</p>
        <ul>
          <li> Product name</li>
          <li> Category name</li>
          <li> The stock keeping unit of the product</li>
          <li> Unit price of the product </li>
          <li> Quantity available </li>
          <li> Quantity sold </li>
        </ul>
        <input type="submit" name="submit" value="export">
      </form>

      <form class="form-container" style="text-align:center" method="POST" action="./modules/export/export_skus.php">
        <h2>Sku-variant where stock is above a certain quantity export csv</h2>
        <p> This export will create a csv file (standard file that does not depend of microsoft suite).</p>
        <p> This export contains several fields which are:</p>
        <ul>
          <li> The stock keeping unit of the product</li>
          <li> Unit price of the product </li>
          <li> Quantity available </li>
          <li> Quantity sold </li>
          <li> Attributes and values associated to that sku </li>
        </ul>
        <input type="number" name="stock" value="0" min="0">
        <input type="submit" name="submit" value="export">
      </form>

    </div>
  </div>

  <footer class="footer-basic-centered">
    <p> Website built by: Loïc Lejoly </p>
    <p> University of Liège </p>
  </footer>
</body>

<script>
  //remove the active class from all items, if there is any
  $('nav li').removeClass('active');

  //finally, add the active class to the current item
  $('#' + document.title).addClass('active');
</script>

</html>