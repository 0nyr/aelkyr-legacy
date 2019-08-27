<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function connexion_pdo() {
    $db = new PDO("mysql:host=localhost;dbname=aelktjst_db1","aelktjst_LoGuardiaN","Hdg8&!)Hu9=)0jJH6?");
    $db->exec('SET NAMES utf8mb4');

    return $db;
}