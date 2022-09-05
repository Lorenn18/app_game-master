<?php
//1- ecriture de la requette
$sql = "INSERT INTO jeux(name, price, genre, note, plateforms, description, PEGI, created_at, url_img) VALUES(:name, :price, :genre, :note, :plateforms, :description, :PEGI, NOW(), :url_img)";

// 2- prepare la requette
$query = $pdo->prepare($sql);

// 3- on associe chaque requette à sa valeur et protection contre injection SQL
$query->bindValue(':name', $name, PDO::PARAM_STR);
$query->bindValue(':price', $price, PDO::PARAM_STMT);
$query->bindValue(':note', $note, PDO::PARAM_STMT);
$query->bindValue(':description', $description, PDO::PARAM_STR);
$query->bindValue(':genre', implode("|", $genre_clear), PDO::PARAM_STR);
$query->bindValue(':plateforms', implode("|", $plateforms_clear), PDO::PARAM_STR);
$query->bindValue(':PEGI', $PEGI, PDO::PARAM_STR);
$query->bindValue(':url_img', $url_img, PDO::PARAM_STR);

// 4- execution de la requette
$query->execute();

// 5- redirection
$_SESSION["success"] = "le jeu a bien été ajouté";
header("Location: index.php");
