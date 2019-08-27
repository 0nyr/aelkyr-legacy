<?php
include"dtb.php";
if(isset($_GET['code']) AND isset($_GET['pseudo']))
	$req = $bdd->prepare('SELECT code, pseudo, email, pass FROM temporary_accounts WHERE pseudo = :pseudo');
	$req->execute(array(
		':pseudo' => $_GET['pseudo']
	))
	$tempo_acc = $req->fetch();
	if($_GET['code'] == $tempo_acc['code']){
		$reqOne = $bd->prepare('INSERT INTO accounts (pseudo, password, email) VALUES(:pseudo, :pass, :mail');
		$reqOne->execute(array(
			':pseudo' => $tempo_acc['pseudo'],
			':pass' => $tempo_acc['pass'],
			':mail' => $tempo_acc['email']
		));
		$reqTwo = $bdd->prepare('DELETE FROM temporary_accounts WHERE pseudo = :pseudo');
		$reqTwo->execute(array(
			':pseudo' => $_GET['pseudo']
		));
	}
?>