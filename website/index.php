<!DOCTYPE html>
<?php
include 'features.php';
?>

<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css">
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.11/lodash.min.js"></script>
        <title>Boutique de l'université de Liège</title>
    </head>
    <body>
        <header>
            <a href="#">
                <img id="logo" src="./images/logo-white.svg" alt="">
            </a>
            <nav id="menu">
                <ul>
				<?php accountState($state);?>
                    <li><a href="#">Panier</a></li>
                </ul>
            </nav>
        </header>

        <div id="cards-container"></div>

        <script src="js/script.js"></script>
    </body>
</html>
