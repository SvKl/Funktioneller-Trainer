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
		
        <h1>Contacts</h1>
        <form method="post" action="contact.php">
        	<fieldset>
				<legend>Your Datas</legend>
					<p><label for="firstname">Firstname</label> : <input type="text" name="firstname" id="firstname" required/></p>
					<p><label for="lastname">Lastname</label> : <input type="text" name="lastname" id="lastname" required/></p>
					<p><label for="email">Email</label> : <input type="email" name="email" id="email" required/></p>
			</fieldset>
			<fieldset>
				<legend>Your message</legend>
					<p><label for="subject">Subject</label> : <input type="text" name="subject" id="subject" required/></p>
					<p><label for="message"></label>
       				<textarea name="message" id="message" rows="10" cols="50">Type your message here</textarea>     
			</fieldset>
			<input type="submit" value="Envoyer" />
		</form>

		<?php
			$mail = 'fanol68@aol.com'; // Déclaration de l'adresse de destination.
			if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
			{	
    			$passage_ligne = "\r\n";
			}
			else
			{
			    $passage_ligne = "\n";
			}

			if ($_POST != NULL)
			{
				//=====Déclaration des messages au format texte et au format HTML.
				$message_txt = $_POST['message'];
				$message_html = "<html><head></head><body><b>Salut à tous</b>, voici un e-mail envoyé par un <i>script PHP</i>.</body></html>";
				//==========

				//=====Création de la boundary
				$boundary = "-----=".md5(rand());
				//==========

				//=====Définition du sujet.
				$sujet = "Contact from " + $_POST['firstname'] + $_POST['lastname'] + ":" + $_POST['subject'];
				//=========

				//=====Création du header de l'e-mail.
				$header = "From: \"Website\"<website@website.fr>".$passage_ligne;
				$header.= "Reply-to: \"Website\"<" + $_POST['email'] + ">".$passage_ligne;
				$header.= "MIME-Version: 1.0".$passage_ligne;
				$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
				//==========

				//=====Création du message.
				$message = $passage_ligne."--".$boundary.$passage_ligne;
				//=====Ajout du message au format texte.
				$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
				$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
				$message.= $passage_ligne.$message_txt.$passage_ligne;
				//==========
				$message.= $passage_ligne."--".$boundary.$passage_ligne;
				//=====Ajout du message au format HTML
				$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
				$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
				$message.= $passage_ligne.$message_html.$passage_ligne;
				//==========
				$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
				$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
				//==========

				//=====Envoi de l'e-mail.
				mail($mail,$sujet,$message,$header);
				//==========
			}
		?>

		<footer>
			<?php include("footer.php"); ?>
		</footer>
    </body>
</html>