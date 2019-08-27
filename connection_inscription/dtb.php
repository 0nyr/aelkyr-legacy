<?php 
$user = "aelktjst_LoGuardiaN";
$pass = "Hdg8&!)Hu9=)0jJH6?";
try {
    $bdd = new PDO('mysql:host=localhost;dbname=aelktjst_db1', $user, $pass,
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
