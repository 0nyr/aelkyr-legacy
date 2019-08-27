<?php
session_start();
require_once('../../assets/config.php');
require_once('../../assets/_class/Users.php');

if(isset($_GET['code']) AND isset($_GET['email'])) {
    $db = connexion_pdo();

    $utilisateur = new GestionUtilisateur($db);
    $utilisateur = $utilisateur->getbymail($_GET['email']);

    if($_GET['code'] == $utilisateur->code) {
        $account = (object)array(
            'state' => 1,
            'email' => htmlentities($_POST['email'])
        );
        $activateAccount = new GestionUtilisateur($db);
        $activateAccount->activateAccount($account);

        $_SESSION['aelkyr_id'] = $utilisateur->id;
        $_SESSION['aelkyr_pseudo'] = $utilisateur->pseudo;
        $_SESSION['aelkyr_email'] = $utilisateur->email;

        header("Refresh: 0; URL= http://aelkyr.net/game");
    }
}