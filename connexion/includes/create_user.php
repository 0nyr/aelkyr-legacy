<?php
session_start();
require_once('../../assets/config.php');
require_once('../../assets/_class/Users.php');


if($_POST['pseudo'] != null AND $_POST['pass'] != null AND $_POST['verifPass'] != null AND $_POST['email'] != null AND $_POST['pass'] == $_POST['verifPass']){
    $db = connexion_pdo();
    // Check if mail doesn't exist
    $verif_email = new GestionUtilisateur($db);
    $verif_email = $verif_email->getbymail($_POST['email']);
    // Check if pseudo doesn't exist
    $verif_pseudo = new GestionUtilisateur($db);
    $verif_pseudo = $verif_pseudo->getbypseudo($_POST['pseudo']);

    if (!isset($verif_email->id) && !isset($verif_pseudo->id)) {

        $characts = 'abcdefghijklmnopqrstuvwxyz';
        $characts .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characts .= '1234567890';
        $code_aleatoire = '';
        for ($i = 0; $i < 50; $i++) {
            $code_aleatoire .= $characts[rand() % strlen($characts)];
        }

        $mot_de_passe = $_POST['pass'];
        $pass_hache = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        $date_inscription = getdate();


        $utilisateur = (object)array(
            'pseudo' => htmlentities($_POST['pseudo']),
            'pass' => $pass_hache,
            'email' => htmlentities($_POST['email']),
            'code' => $code_aleatoire,
            'created' => $date_inscription[0]
        );
        $ajout_utilisateur = new GestionUtilisateur($db);
        $ajout_utilisateur->add($utilisateur);

        $to = $_POST['email'];
        $subject = 'Votre inscription sur AELKYR';
        $message = 'Veuillez cliquer sur ce lien pour valider votre inscription : http://aelkyr.net/inscription/include/verif_accounts.php?code=' . $code_aleatoire .'&email=' . $_POST['email'];
        mail($to,$subject,$message);
        $_SESSION['alerte'] = '<strong>Votre inscription a été envoyée</strong>';
    }
    else{
        $_SESSION['alerte'] = '<strong>Ce pseudo ou cette adresse e-mail est déjà utilisé(e)</strong>';
    }
}
else if($_POST['pass'] != $_POST['verifPass']){
    $_SESSION['alerte'] = '<strong>Les mots de passes ne correspondent pas</strong>';
}
else{
    $_SESSION['alerte'] = '<strong>Vous n\'avez pas rempli tous les champs</strong>';
}
header('Location: inscription.php');
