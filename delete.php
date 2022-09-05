<?php
session_start();
include("helpers/functions.php");
// 1-connexion a ma BDD
// include PDO pour la connexion BDD
require_once("helpers/pdo.php");
// requette delete
require_once("sql/delete-sql.php");

//6- redirection
$_SESSION["success"] = "Le jeu es bien supprimer.";
header("location:index.php");
