<?php
session_start();
require_once('../../assets/config.php');
require_once('../../assets/_class/Users.php');
// Si il y a les infos dont on a besoin
if(isset($_GET['code']) AND isset($_GET['email'])) {
    $db = connexion_pdo();
    // On vérifie avant que l'email correspond au code de sécurité
    $utilisateur = new GestionUtilisateur($db);
    $utilisateur = $utilisateur->getbymail($_GET['email']);
    // Si c'est correct
    if($_GET['code'] == $utilisateur->code) {
        // On créé l'objet $account pour mettre à jour son état (0 = non validé, 1 = validé)
        $account = (object)array(
            'state' => 1,
            'email' => htmlentities($_GET['email'])
        );
        $activateAccount = new GestionUtilisateur($db);
        $activateAccount->activateAccount($account);

        // On enregistre en session ses informations pour le connecter
        $_SESSION['aelkyr_id'] = $utilisateur->id;
        $_SESSION['aelkyr_pseudo'] = $utilisateur->pseudo;
        $_SESSION['aelkyr_email'] = $utilisateur->email;
        // On le redirige vers la page du jeu
        header("Refresh: 0; URL= http://aelkyr.net/game");
    }
}