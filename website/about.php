<html lang="en">
<?php
include 'features.php';
?>

<head>
	<title>About</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/bs/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header>
		<a href="./index.php">
			<img id="logo" src="./images/logo-white.svg" alt="">
		</a>
		<nav id="menu">
			<ul>
				<li><a href="./about.php">About</a></li>
				<?php accountState($state);?>
				<li><a href="#">Panier</a></li>
			</ul>
		</nav>
	</header>

	<div class="container">
		<h1>About us</h1>
		<div class="row">
			<div class="col-6 col-md-4">
				<div class="card" style="width: 18rem;">
					<div class="card-header">
						Featured
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><a href="#tmp1">Cras justo odio</a></li>
						<li class="list-group-item"><a href="#tmp2">Dapibus ac facilisis in</a></li>
						<li class="list-group-item"><a href="#tmp3">Vestibulum at eros</a></li>
					</ul>
				</div>
			</div>
			<div class="col-12 col-md-8">
				<h2 id="tmp1">Cras justo odio</h2>
				<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin
					literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney
					College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and
					going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes
					from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero,
					written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first
					line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>

				<h2 id="tmp2">Cras justo odio</h2>
				<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin
					literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney
					College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and
					going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes
					from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero,
					written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first
					line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>

				<h2 id="tmp3">Cras justo odio</h2>
				<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin
					literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney
					College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and
					going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes
					from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero,
					written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first
					line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
			</div>
		</div>
	</div>
</body>

</html>