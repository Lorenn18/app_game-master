<?php
// 2- recup' id ds url & nettoie
$id = clear_xss($_GET["id"]);
// 3- requette vers BDD
$sql = "DELETE FROM jeux WHERE id=?";
//4- prepare ma requette
$query = $pdo->prepare($sql);
// 5- on execute le requette
$query->execute([$id]);
