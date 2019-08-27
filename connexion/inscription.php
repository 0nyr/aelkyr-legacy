<?php include_once("../templates/head.php")?>
<?php include_once("../templates/header.php")?>

<?php
if(isset($_SESSION['alerte'])){
    echo $_SESSION['alerte'];
}
?>
    <section class="content" role="main">
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


<?php include_once("../templates/footer.php")?>