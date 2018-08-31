<?php
require 'connectToDatabase.php';
require 'sendMail.php';
require 'filtruj.php';

if (isset($_POST['password'])  && isset($_POST['repassword']) && isset($_POST['email']) && isset($_POST['verifyText']))
{
		$verifyText = filtruj($_POST['verifyText']);
		$password = filtruj($_POST['password']);
		$repassword = filtruj($_POST['repassword']);
		$email = filtruj($_POST['email']);
		if ($password == $repassword)
		{
			$passwd = hash("sha256", $password);
			$vt = hash("sha256", rand(0, 5000));
			$quer = "SELECT email from users where email='$email' and verifyText='$verifyText'";
			$search = mysqli_query($i, $quer); 
			if(mysqli_num_rows($search) == 1)
			{
				$query = "UPDATE users SET password='$passwd', verifyText='$vt' WHERE email='$email' AND verifyText='$verifyText'";
				mysqli_query($i, $query);
				echo "Hasło zmienione";
				//header("Location: login.php"); 
			}
			else echo "Nieprawidłowy email lub kod";
		}
		else echo "Podane hasła nie są takie same";
}
else 
{
	if (isset($_GET['email']) && isset($_GET['verifyText']))
	{
		$email = filtruj($_GET['email']);
		$verifyText = filtruj($_GET['verifyText']);
	
		$quer = "SELECT email from users where email='$email' and verifyText='$verifyText'";
		$search = mysqli_query($i, $quer); 
		if(mysqli_num_rows($search) == 1)
		{
			?>
			<form method="POST" action="lostPassword.php">
				VerifyText: <input type="text" id="verifyText"	name="verifyText"  value=<?php echo $verifyText ?>> </br>
				Email: <input type="text" id="email"	name="email" value= <?php echo $email ?> > </br>
				Podaj nowe hasło: <input type="password" id="password"	name="password"   > </br>
				Powtórz nowe hasło: <input type="password" id="repassword"	name="repassword"   > </br>
				<input type="submit" value="Resetuj" name="Resetuj"/> 
			</form>
			<?php
		} else echo 'Nieprawidłowy link';
	}
	else
		{	
		if (isset($_POST['email']))
		{
			$email = filtruj($_POST['email']);
			$verifyText = hash('sha256', rand(0, 5000));	
			$quer = "SELECT email from users where email='$email' and isVerified=1";
			$search = mysqli_query($i, $quer); 
			if(mysqli_num_rows($search) == 1)
			{
				$query=  "UPDATE users SET verifyText='$verifyText' WHERE email='$email'";
				mysqli_query($i, $query);
				sendLostPasswordMail($email, $verifyText);
				echo "Wysłano email resetujący hasło";
			}
			else 
				echo 'Nieprawidłowy lub nie zweryfikowany email';
		}
		else
		{
		echo "<form method='POST' action='lostPassword.php'>
				Podaj email: <input type='text' id='email'	name='email'   > </br>
				<input type='submit' value='Ok' name='Ok'/>
			</form>";
		}
	}
}
?>