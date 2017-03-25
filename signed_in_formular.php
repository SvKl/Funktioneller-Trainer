<?php session_start();?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Kevin Henry - Register</title>
    </head>
	
	<body>
		<header>
			<?php include("header.php"); ?>
		</header>

		<nav>
			<?php include("menu.php"); ?>
		</nav>

		<h1>Sign In Info</h1>
		<p>Pseudo : <?php echo htmlspecialchars($_POST['pseudo']); ?></p>
		<p>Password : <?php echo htmlspecialchars($_POST['pass']); ?></p>

		<?php
		try {$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');}
		catch(Exception $e) {die('Erreur : '.$e->getMessage());}

		$req = $bdd->prepare('SELECT password FROM user_db WHERE pseudo = ?');
		$req->execute(array($_POST['pseudo']));

		while ($donnees = $req->fetch())
		{
			if ($donnees['password'] == $_POST['pass'])
				{echo 'OK';}
		}
		?>

		<footer>
			<?php include("footer.php"); ?>

		</footer>
    </body>
</html>