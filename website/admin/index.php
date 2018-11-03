<!DOCTYPE html>
<?php
// This file is used to display the admin panel
include 'admin_active_session.php';
include 'modules/product.php';
?>

<html>
<?php include './modules/meta.php'?>

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
              <p>200</p>
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
              <p>25</p>
            </div>
          </div>
        </div>
      </div>


      <form class="form-container" style="text-align:center" method="POST" action="./modules/export/export_products.php">
        <h2>Products export csv</h2>
        <input type="submit" name="submit" value="export">
      </form>

      <form class="form-container" style="text-align:center" method="POST" action="./modules/export/export_skus.php">
        <h2>Sku-variant export csv</h2>
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
  // This function allows to set the visibility of an element
  // If the element is already visible then it will be turned to none
  // otherwise an element which is set to none will be turned to block.
  // elementId: It is the id given to a element
  function setVisibility(elementId) {
    if (document.getElementById(elementId).style.display == 'none') {
      document.getElementById(elementId).style.display = 'block';
      document.getElementById('typeBtn').innerHTML = 'Hide';
    } else {
      document.getElementById(elementId).style.display = 'none';
      document.getElementById('typeBtn').innerHTML = 'Show';
    }
  }
</script>

</html>