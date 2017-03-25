<?php session_start();

if ($_SESSION == NULL)
{
	?>
	<ul>
		<a href="registration.php"><li>Register</li></a>
		<a href="sign_in.php"><li>Sign In</li></a>
		<a href="contact.php"><li>Contact</li></a>
	</ul>
<?php }
else
{
	if ($_SESSION['pseudo'] != NULL)
	{
		?>
		<ul>
			<a href="my_account.php"><li>My account</li></a>
			<a href="my_program.php"><li>My Work-out</li></a>
			<a href="disconnect.php"><li>Disconnect</li></a>
		</ul>
		<?php
	}
	else
	{
		echo 'Houston, we got a problem';
	}
}
?>


<img src="munich_cowboys.png" alt="Logo Munich Cowboys" />