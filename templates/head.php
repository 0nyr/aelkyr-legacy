<!DOCTYPE html>
<?php session_start()?>
<html>

<head>
    <?php require_once(dirname(__DIR__) .'/assets/config.php');
    $db = connexion_pdo();
    require_once(dirname(__DIR__) .'/assets/_class/Users.php');
    require_once(dirname(__DIR__) .'/assets/_class/Cities.php');?>
    
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    
    <link rel="shortcut icon" href="/favicon.ico" type="image/icon">
	<link rel="icon" href="/favicon.ico" type="image/icon">
    
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/general_reset_stylesheet.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/general_stylesheet.css">

