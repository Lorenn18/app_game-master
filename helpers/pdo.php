<?php
$serveur = "localhost";
$dbname = "app_game";
$login = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$serveur;dbname=$dbname", $login, $password, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        // pour ne pas avoir de doublons
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        // pour afficher les erreurs
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ));
    // affiche message ok connexion
    // echo "connexion établie";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
