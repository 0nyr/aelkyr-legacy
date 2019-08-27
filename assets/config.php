<?php
function connexion_pdo() {
    $db = new PDO("mysql:host=localhost;dbname=aelktjst_db1","aelktjst_LoGuardiaN","Hdg8&!)Hu9=)0jJH6?");
    $db->exec('SET NAMES utf8mb4');

    return $db;
}