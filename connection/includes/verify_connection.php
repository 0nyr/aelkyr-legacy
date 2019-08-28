<?php
session_start();
require_once('../../assets/config.php');
require_once('../../assets/_class/Users.php');

if (isset($_POST['signin']) && $_POST['signin']=='Connexion') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $db = connexion_pdo();
    $user = new GestionUtilisateur($db);
    $user = $user->getbymail($email);

    if(isset($user->password) && password_verify($password,$user->password) && $user->state == '1'){
        unset($_SESSION['error']);

        ini_set('session.gc_maxlifetime', 3600 * 24 * 7);

        $_SESSION['labrume_pseudo'] = $user->pseudo;
        $_SESSION['labrume_userid'] = $user->id;
        $_SESSION['labrume_mail'] = $email;

        header("Refresh: 0; URL= http://aelkyr.net/game");
    } else {
        if($user->state != '1') {
            $_SESSION['alerte'] = "Oops. Ce compte n'existe pas ou votre compte n'est pas activé.";
        }
        else if(password_verify($password,$user->password)) {
            $_SESSION['alerte'] = "Oops. Ce mail et ce mot de passe ne correspondent pas";
        }
        else {
            $_SESSION['alerte'] = "Une erreur est survenue. Ce compte n'existe peut-être pas.";
        }
        header("Refresh: 0; URL= http://aelkyr.net/connection");
    }
}