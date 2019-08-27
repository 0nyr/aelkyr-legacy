<?php
session_start();
include 'dtb.php'; 
if($_POST['pseudo'] != null AND $_POST['pass'] != null AND $_POST['verifPass'] != null AND $_POST['email'] != null AND 
$_POST['pass'] == $_POST['verifPass']){
	// si tout est rempli, compter comptes existants avec pseudo
	$req = $bdd->prepare('SELECT COUNT(*) AS nb FROM accounts WHERE pseudo = :pseudo');
	$req->execute(array(
		':pseudo' => $_POST['pseudo']
	));
	$user_existants = $req->fetch();
	if($user_existants['nb'] == 0){
		/*si aucun compte existant, inscrire dans la base de comptes temporaire
		générer code à 5 chiffres, utilisés lors de la vérification
		puis envoyer l'email
		*/
		$code = rand (11111, 99999);
		$crypt = password_hash($_POST['pass'], PASSWORD_DEFAULT);
		$reqone = $bdd->prepare('INSERT INTO temporary_accounts  (pseudo, pass, email, code) VALUES(:pseudo, :pass, :email, :code)');
		$reqone->execute(array(
			':pseudo' => $_POST['pseudo'],
			'pass' => $crypt,
			':code' => $code,
			':email' => $_POST['email']
		));
		$to=$_POST['email'];
		$subject='Inscription à aelkyr';
		$message='Cliquez sur ce lien pour valider votre email.';
		mail($to,$subject,$message);
		$_SESSION['alerte'] = '<strong>Votre inscription a été envoyée</strong>';
	}
	else{
		$_SESSION['alerte'] = '<strong>Ce pseudo est déjà utilisé</strong>';
	}
}
else if($_POST['pass'] != $_POT['verifPass']){
	$_SESSION['alerte'] = '<strong>Les mots de passes ne correspondent pas</strong>';
}
else{
	$_SESSION['alerte'] = '<strong>Vous n\'avez pas rempli tous les champs</strong>';
}
header('Location: inscription.php');
?>