<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Kevin Henry - Sign In</title>
    </head>
	
	<body>
	
		<header>
			<?php include("header.php"); ?>
		</header>

		<nav>
			<?php include("menu.php"); ?>
		</nav>http://localhost/munich_cowboys.png

        <section class=informations>
        	<h1>Payment Done</h1>
		</section>

		<?php
		require_once('stripe-php-4.5.0/init.php');
		if ($_POST != NULL)
		{
			// Set your secret key: remember to change this to your live secret key in production
			// See your keys here: https://dashboard.stripe.com/account/apikeys
			\Stripe\Stripe::setApiKey("sk_test_67VKjY6sCkLQe4UA5JfkuCJi");

			// Token is created using Stripe.js or Checkout!
			// Get the payment token submitted by the form:
			$token = $_POST['stripeToken'];

			// Charge the user's card:
			$charge = \Stripe\Charge::create(array(
			  "amount" => 999,
			  "currency" => "eur",
			  "description" => "One time payment",
			  "source" => $token,
			));

			// Connect to the database and check for the email and password
			try
			{
	    		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
			}
			catch(Exception $e)
			{
	        	die('Error : '.$e->getMessage());
			}

			$req = $bdd->prepare('UPDATE app_db SET membership = true WHERE email = ?');
			$req->execute(array($_SESSION['pseudo']));

		}
		?>

		<footer>
			<?php include("footer.php"); ?>
		</footer>
    </body>
</html>