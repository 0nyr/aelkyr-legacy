<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>inscription - aelkyr.net</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="../general_reset_stylesheet.css">
	<link rel="stylesheet" type="text/css" href="./stylesheet_inscription.css">
	<link href="https://fonts.googleapis.com/css?family=Muli:400,400i&display=swap" rel="stylesheet">
</head>
<body>
	
	<nav id="header">
		<!-- <img id='nav_aelkyr_logo' src="./nav_aelkyr_logo_usable.png"/> -->
		<a id="nav_aelkyr_logo" href="http://aelkyr.net/index.html">
			<img class='nav_button_back' src="../sprites_usable/nav_sprites/nav_aelkyr_logo_hover_usable.png">
			<img class='nav_button_front' src="../sprites_usable/nav_sprites/nav_aelkyr_logo_usable.png">
		</a>
	</nav>
	
	<?php 
	if(isset($_SESSION['alerte'])){
		echo $_SESSION['alerte'];
	}
	?>
	<section class="content">
		<form method="POST" action="inscription_p.php">
			<label for="pseudo"><p>Votre pseudo:</p></label>
			<input type="text" id="pseudo" name="pseudo"><br />
			<label for="email"><p>Votre email:</p></label>
			<input type="text" name="email"><br />
			<label for="pass"><p>Votre mot de passe:</p></label>
			<input type="password" id="pass" name="pass"><br />
			<label for="verifPass"><p>Validez votre mot de passe:</p></label>
			<input type="password" id="verifPass" name="verifPass"><br />
			<input type="submit" value="S'inscrire"><br />
		</form>
	</section>
</body>
</html>
