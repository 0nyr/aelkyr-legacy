<?php
session_start();
require_once('../../assets/config.php');
require_once('../../assets/_class/Users.php');

// Si les champs sont remplis et que les mots de passes sont similaires
if($_POST['pseudo'] != null AND $_POST['pass'] != null AND $_POST['verifPass'] != null AND $_POST['email'] != null AND $_POST['pass'] == $_POST['verifPass']){
    $db = connexion_pdo();
    // Vérification si l'adresse e-mail existe
    $verif_email = new GestionUtilisateur($db);
    $verif_email = $verif_email->getbymail($_POST['email']);
    // Vérification si le pseudo existe
    $verif_pseudo = new GestionUtilisateur($db);
    $verif_pseudo = $verif_pseudo->getbypseudo($_POST['pseudo']);

    // Si aucun des deux n'existe
    if (!isset($verif_email->id) && !isset($verif_pseudo->id)) {
        // Génération d'un code aléatoire permettant de valider son inscription par la suite
        $characts = 'abcdefghijklmnopqrstuvwxyz';
        $characts .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characts .= '1234567890';
        $code_aleatoire = '';
        for ($i = 0; $i < 50; $i++) {
            $code_aleatoire .= $characts[rand() % strlen($characts)];
        }
        // Hashage du mot de passe pour sécurité
        $mot_de_passe = $_POST['pass'];
        $pass_hache = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        // Récupération de la date d'aujourd'hui pour savoir quand le compte a été créé
        $date_inscription = getdate();
        // Création de l'objet $utilisateur dans lequel est enregistré ses informations
        $state = 0;
        $utilisateur = (object)array(
            'pseudo' => htmlentities($_POST['pseudo']),
            'pass' => $pass_hache,
            'email' => htmlentities($_POST['email']),
            'code' => $code_aleatoire,
            'state' => $state,
            'created' => $date_inscription[0]
        );
        // Appel de la class pour ajouter cet utilisateur en BDD
        $ajout_utilisateur = new GestionUtilisateur($db);
        $ajout_utilisateur->add($utilisateur);
        // Envoi du mail pour demander à l'utilisateur de valider son compte
        $to = $_POST['email'];
        $subject = 'Votre inscription sur AELKYR';
        $message = 'Veuillez cliquer sur ce lien pour valider votre inscription : http://aelkyr.net/connection/includes/verif_accounts.php?code=' . $code_aleatoire .'&email=' . $_POST['email'];
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
header('Location: ../inscription.php');
