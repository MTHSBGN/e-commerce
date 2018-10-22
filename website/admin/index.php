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
      <section>
        <h2>Admin panel</h2>
        <p>
          Welcome on the admin panel. The panel is really simple it only gives the different types of products and the
          possibility
          to add a new type of product.
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