<?php include_once("../templates/head.php")?>

<title>Connexion - aelkyr.net</title>
<link rel="stylesheet" type="text/css" href="../assets/css/stylesheet_inscription.css">
</head>



<body>

<?php include_once("../templates/header_simple.php")?>
<?php include_once("../templates/templates_css/stylesheet_header_simple.php")?> <!-- WRNG: necessary to do it here -->



<section class="content" role="main">
    <img src="../assets/img/connection_inscription/aelkyr_inscription_page_usable.png">

    <form method="POST" action="includes/verify_connection.php">
        <label for="email"><p>Votre email:</p></label>
        <input type="text" id="email" name="email"><br />
        <label for="password"><p>Votre mot de passe:</p></label>
        <input type="password" id="password" name="password"><br />
        <input name="signin" type="submit" value="Connexion"><br />
    </form>
</section>
</body>

<?php
if(isset($_SESSION['alerte'])){
    echo $_SESSION['alerte'];
}
?>

<?php include_once("../templates/footer.php")?>
