<header>
  <a href="#">
    <img id="logo" src="../images/logo-white.svg" alt="">
  </a>
  <h1> Welcome
    <?php echo "<i>" . $_SESSION['username'] . "</i>"; ?> to the admin panel
  </h1>
  <nav id="menu">
    <ul>
      <li><a href="../index.php"> <i class="fa fa-angle-double-left" aria-hidden="true"></i> Website</a></li>
      <li><a href="../logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log out</a></li>
    </ul>
  </nav>
</header>