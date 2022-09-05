<?php
$sql = "UPDATE jeux SET name = :name, price = :price, genre = :genre, note = :note, plateforms = :plateforms, description = :description, PEGI = :PEGI, updated_at = NOW() WHERE id= :id";

$query = $pdo->prepare($sql);

$query->bindValue(':id', $id, PDO::PARAM_INT);
$query->bindValue(':name', $name, PDO::PARAM_STR);
$query->bindValue(':price', $price, PDO::PARAM_STMT);
$query->bindValue(':note', $note, PDO::PARAM_STMT);
$query->bindValue(':description', $description, PDO::PARAM_STR);
$query->bindValue(':genre', implode("|", $genre_clear), PDO::PARAM_STR);
$query->bindValue(':plateforms', implode("|", $plateforms_clear), PDO::PARAM_STR);
$query->bindValue(':PEGI', $PEGI, PDO::PARAM_STR);

$query->execute();

$_SESSION["success"] = "le jeu a bien été modifié";
header("Location: index.php");
