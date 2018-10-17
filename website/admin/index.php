<!DOCTYPE html>
<?php
// This file is used to display the admin panel

include 'admin_active_session.php';
include 'modules/product.php';
$message = "";
#echo "<p>hellloooooo</p>";
if (isset($_POST['submit'])) {
  echo "<p>hellloooooo</p>";
    switch ($_POST['submit']) {
        case 'add':
            echo "hellloooooo";
            //tmp();
            addProduct($_POST['cat_name'], $_POST['french'], $_POST['english']);
            break;
        case 'update':
            updateProduct();
            break;
    }
}

// This function is used to display the different
// types of products present in the database
function displayTypes()
{
    global $connectDB;
    $error = "";
    $table = '<table class="tableLib"><tr><th>ID</th><th>type_name_en</th><th>type_name_fr</th></tr>';

    $query  = "SELECT * FROM Description_type";
    $result = mysqli_query($connectDB, $query);
    $rows   = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //Display each product type
    foreach ($rows as $row) {
        $table .= "<tr>";
        $table .= "<td>" . $row['type_id'] . "</td>";
        $table .= "<td>" . $row['type_name_en'] . "</td>";
        $table .= "<td>" . $row['type_name_fr'] . "</td>";
        $table .= "</tr>";
    }

    $table .= "</table>";
    echo $table;
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
    <div id="types_section" style="display:none">
      <?php displayTypes();?>
    </div>

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