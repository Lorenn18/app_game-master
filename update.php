<?php
session_start();
require_once("models/database.php");
$game = getGame();
$title = $game['name'];

$error = [];
$errorMessage = "<span class=text-red-500>*Ce champs est obligatoire</span>";

if (!empty($_POST["submited"])) {
    require_once("utils/secure-form/include.php");
    if (count($error) == 0) {
        update($name, $price, $note, $description, $genre_clear, $plateforms_clear, $PEGI, $url_img);
    }
};

require("view/updatePage.php");
