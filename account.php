<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Kevin Henry - My account</title>
    </head>
	
	<body>
		<header>
			<?php include("header.php"); ?>
		</header>

		<nav>
			<?php include("menu.php"); ?>
		</nav>

        <section class=informations>
        	<h1>Your account</h1>
		</section>

		<p> Welcome on the website. Here you can manage your account </p>

		<p><a href="my_account.php" class="button">Manage your datas</a></p>

		<p><a href="free.php" class="button">Free work-out</a></p>

		<p><a href="premium.php" class="button">Premium work-out</a></p>

		<footer>
			<?php include("footer.php"); ?>
		</footer>
    </body>
</html>