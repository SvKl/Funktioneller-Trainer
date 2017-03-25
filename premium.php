<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Kevin Henry - Premium work-out</title>
    </head>
	
	<body>
	
		<header>
			<?php include("header.php"); ?>
		</header>

		<nav>
			<?php include("menu.php"); ?>
		</nav>

        <section class=premium>
        	<h1>Premium work-outs</h1>
		</section>

		<?php 
			// Connect to the database and check for the email and password
			try
			{
	    		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
			}
			catch(Exception $e)
			{
	        	die('Error : '.$e->getMessage());
			}
			$req = $bdd->prepare('SELECT membership FROM app_db WHERE email = ?');
			$req->execute(array($_SESSION['pseudo']));
			$data = $req->fetch();
			if ($data != false)
			{
				if ($data['membership'] == false)
					{
						if ($_POST == NULL)
						{
							echo '<p> You are not a premium member. In order to access to the premium Work-outs, please enter your bank data </p>';

							echo '
							<p><form action="premium.php" method="POST">
							<script
								src="https://checkout.stripe.com/checkout.js" class="stripe-button"
								data-key="pk_test_sNK1LoIxdKjIW7delHNVWzgM"
								data-amount="999"
								data-name="Demo Site"
								data-description="Widget"
								data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
								data-locale="auto"
								data-zip-code="false"
								data-billing-address="false"
								data-currency="eur">
							</script>
							</form></p>';
						}
						else
						{
							require_once('stripe-php-4.5.0/init.php');
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
							header("location: ./premium.php");
						}
					}
				else 
					{
						echo '<p> Hi ! Good to have you back ! Thank you for choosing the premium version of our website </p>';	
					}
			}
			else
			{
				echo '<br/> We did not find an account corresponding to this email adress. New on the website ? Please register';
			}


		?>

		<footer>
			<?php include("footer.php"); ?>
		</footer>
    </body>
</html>