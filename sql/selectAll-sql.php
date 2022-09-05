<?php
//1- recuperer les jeux
$sql = "SELECT * FROM jeux ORDER BY name";
// 2- prépare la requette (préformatter)
$query = $pdo->prepare($sql);
// 3- execute la requette
$query->execute();
// 4- on stock le resultat ds une variable
$games = $query->fetchAll();
// debug_array($games)
