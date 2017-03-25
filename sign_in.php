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
		</nav>
		
        <h1>Sign In</h1>
		<form method="post" action="sign_in.php">
			<p><label for="pseudo">Your pseudo</label> : <input type="text" name="pseudo" id="pseudo" /></p>
			
       		<p><label for="pass">Your password :</label>
       		<input type="password" name="pass" id="pass" /></p>

       		<input type="submit" value="Send" />
		</form>

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
			
			if ($_POST != NULL)
			{
				$req = $bdd->prepare('SELECT password FROM app_db WHERE email = ?');
				$req->execute(array($_POST['pseudo']));

				$data = $req->fetch();
				if ($data != false)
				{				
					if (htmlspecialchars($data['password']) == $_POST['pass'])
						{
							$_SESSION['pseudo'] = $_POST['pseudo'];
							$_SESSION['logged'] = True;
							header("location: ./account.php");
						}
					else
						{
							echo '<br/> Password does not correspond to the email, did you forgot your password ?';
						}
				}
				else
				{
					echo '<br/> We did not find an account corresponding to this email adress. New on the website ? Please register';
				}
				$req->closeCursor();
			}
		?>

		<form method="register" action="registration.php">
			<p>You don't have an account ?
			<input type="submit" value="Register"/>
			</p>
    	</form>		

		<footer>
			<?php include("footer.php"); ?>
		</footer>
    </body>
</html>