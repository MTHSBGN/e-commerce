<!DOCTYPE html>
<?php
// This file is used to display the admin panel
include 'admin_active_session.php';
?>

<html>
<?php 
$_GET['title']='category';
include './modules/meta.php';
?>
<body>
  <?php include './modules/header.php'?>

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
<?php
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