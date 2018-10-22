<!DOCTYPE html>
<?php
// This file is used to display the admin panel

include 'admin_active_session.php';
include 'modules/product.php';
$message = "";
if (isset($_POST['submit'])) {
    switch ($_POST['submit']) {
        case 'add':
            addCategory($connectDB, $_POST['cat_name'], $_POST['french'], $_POST['english']);
            break;
        case 'add_product':
            addProduct($connectDB, $_POST['name'], $_POST['cat'], $_POST['descr'], $_POST['sku_id'], $_POST['price'], $_POST['quantity']);
            break;
        case 'add_variant':
            addVariant($connectDB, $_POST['sku_id'], $_POST['product_id'], $_POST['attr'], $_POST['value']);
            break;
    }
}

?>

<html>

<head>
  <meta name="viewport" content="initial-scale=1.0, maximum-scale = 1.0, width = device-width">
  <!--For Mobile devices-->
  <meta http-equiv="Content-Type" content="text/html; charset = utf-8">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="./css/formstyle.css">
  <link rel="stylesheet" href="./css/tablecss.css">
  <link rel="stylesheet" href="./css/footer.css">
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

  <section>
    <h2>Admin panel</h2>
    <p>
      Welcome on the admin panel. The panel is really simple it only gives the different types of products and the
      possibility
      to add a new type of product.
    </p>
    <h2>Display types</h2>
    <p> To display/hide the types please click on the button:</p>
    <button id="typeBtn" onclick="setVisibility('types_section')">Click me</button>

    <h2>Add a new type of product</h2>

    <form class="form-container" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
      <h1>Add a category of products</h1>
      <div id="pass-form">
        <input type="text" name="cat_name" placeholder="category name">
        <input type="textarea" name="french" placeholder="french description">
        <input type="textarea" name="english" placeholder="english description">
        <?php echo $message; ?>
        <input type="submit" name="submit" value="add">
      </div>
    </form>

    <h2>Add a new product</h2>

    <form class="form-container" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
      <h1>Add a new product</h1>
      <div id="pass-form">
        <input type="text" name="name" placeholder="name">
        <input type="number" name="cat" placeholder="category id">
        <input type="number" name="descr" placeholder=" description id">
        <input type="text" name="sku_id" placeholder=" sku id">
        <input type="number" name="price" placeholder="price">
        <input type="number" name="quantity" placeholder="quantity">
        <input type="submit" name="submit" value="add_product">
      </div>
    </form>


        <h2>Add a new variant</h2>

<form class="form-container" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
  <h1>Add a new variant</h1>
  <div id="pass-form">
    <input type="text" name="sku_id" placeholder=" sku id">
    <input type="number" name="product_id" placeholder="product id">
    <input type="text" name="attr" placeholder="attribute">
    <input type="text" name="value" placeholder="value">
    <input type="submit" name="submit" value="add_variant">
  </div>
</form>
  </section>

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