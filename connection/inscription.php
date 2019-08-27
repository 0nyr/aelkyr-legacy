	<?php include_once("../templates/head.php")?>
	
	<title>inscription - aelkyr.net</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/stylesheet_inscription.css">
</head>



<body>
	
	<?php include_once("../templates/header_simple.php")?>
	<?php include_once("../templates/templates_css/stylesheet_header_simple.php")?> <!-- WRNG: necessary to do it here -->
	
	
	
    <section class="content" role="main">
		<img src="../assets/img/connection_inscription/aelkyr_inscription_page_usable.png">
		
        <form method="POST" action="includes/create_user.php">
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

<?php
if(isset($_SESSION['alerte'])){
    echo $_SESSION['alerte'];
}
?>

<?php include_once("../templates/footer.php")?>
