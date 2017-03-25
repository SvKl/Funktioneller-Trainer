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

    	<h1>Register</h1>
		<form method="post" action="registration.php">
			<fieldset>
				<legend>Vos coordonnees</legend>
					<p><label for="firstname">Firstname</label> : <input type="text" name="firstname" id="firstname" required/></p>
					<p><label for="lastname">Lastname</label> : <input type="text" name="lastname" id="lastname" required/></p>
					<p><label for="age">Age</label> : <input type="number" min="16" max="100" placeholder="20" name="age" id="age" required/></p>
					<p>Are you a male or female ? <br/>
					<input type="radio" name="sex" value="male" id="male" checked="checked"/> <label for="male">Male</label>
					<input type="radio" name="sex" value="female" id="female" /> <label for="female">Female</label>
					</p>
			</fieldset>
			<fieldset>
				<legend>Your connection details</legend>	
					<p><label for="email">Email</label> : <input type="email" name="email" id="email" required/></p>
		       		<p><label for="password">Votre mot de passe :</label>
		       		<input type="password" name="password" id="password" required/></p>
		    </fieldset>
		    <br/>
		    <input type="submit" value="Envoyer" />
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
				$req->execute(array($_POST['email']));

				$data = $req->fetch();
				if ($data == false)
				{
					$req = $bdd->prepare('INSERT INTO app_db(firstname, lastname, age, sex, email, password) VALUES(:firstname, :lastname, :age, :sex, :email, :password)');

					$req->execute(array(
					    'firstname' => $_POST['firstname'],
					    'lastname' => $_POST['lastname'],
					    'age' => $_POST['age'],
					    'sex' => $_POST['sex'],
					    'email' => $_POST['email'],
					    'password' => $_POST['password']
					    ));

					$_SESSION['pseudo'] = $_POST['email'];
					$_SESSION['logged'] = True;
					header("location: ./account.php");
				}
				else
				{
					echo '<br/> An account already exist with this email adress, please Sign In';
				}
				$req->closeCursor();
			}
		?>

		<br/>
		<form method="sign_in" action="sign_in.php">
			<p>Do you already have an account ?
			<input type="submit" value="Sign In"/>
			</p>
    	</form>

		<footer>
			<?php include("footer.php"); ?>
		</footer>
    </body>
</html>