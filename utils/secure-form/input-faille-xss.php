<?php
//2-je fais les failles xss
$name = clear_xss($_POST["name"]);
$price = clear_xss($_POST["price"]);
$note = clear_xss($_POST["note"]);
$description = clear_xss($_POST["description"]);


$genres = !empty($_POST["genre"]) ? $_POST["genre"] : [];
$genre_clear = [];
foreach ($genres as $genre) {
    $genre_clear[] = clear_xss($genre);
};

$plateforms = !empty($_POST["plateforms"]) ? $_POST["plateforms"] : [];
$plateforms_clear = [];
foreach ($plateforms as $plateform) {
    $plateforms_clear[] = clear_xss($plateform);
};

$PEGI = !empty($_POST["PEGI"]) ? clear_xss($_POST["PEGI"]) : [];
$url_img = $img_upload_path;
