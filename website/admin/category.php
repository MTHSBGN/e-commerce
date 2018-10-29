<!DOCTYPE html>
<?php
// This file is used to display the admin panel
include '../connectDB.php';
include 'admin_active_session.php';
include 'modules/product.php';
?>

<html>

<head>
  <meta name="viewport" content="initial-scale=1.0, maximum-scale = 1.0, width = device-width">
  <!--For Mobile devices-->
  <meta http-equiv="Content-Type" content="text/html; charset = utf-8">
  <link rel="stylesheet" href="../css/bs/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/formstyle.css">
  <link rel="stylesheet" href="./css/tablecss.css">
  <link rel="stylesheet" href="./css/footer.css">
  <link rel="stylesheet" href="./css/navbar.css">
  <!--Link for style of table -->

  <title>Admin Panel</title>
</head>


<body>
  <a href="../logout.php" class="btn btn-secondary btn-lg" style="float:right; margin:16px" role="button">
    <span class="glyphicon glyphicon-log-out"></span> Log out
  </a>

  <header>
    <h1> Welcome
      <?php echo "<i>" . $_SESSION['username'] . "</i>"; ?> to the admin panel</h1>
  </header>

  <div class="wrapper">
  <?php include './modules/navbar.php' ?>
  <div class="container">
  <section>
    <h2>Add a new type of product</h2>

    <form class="form-container" method="POST" action="./modules/forms/addCategory.php">
      <h1>Add a category of products</h1>
      <div id="pass-form">
        <input type="text" name="cat_name" placeholder="category name">
        <input type="textarea" name="french" placeholder="french description">
        <input type="textarea" name="english" placeholder="english description">
        <input type="submit" name="submit" value="add">
      </div>
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