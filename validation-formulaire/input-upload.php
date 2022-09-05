<?php
$files_name = $_FILES["url_img"]["name"];
$files_size = $_FILES["url_img"]["size"];
$files_tmp = $_FILES["url_img"]["tmp_name"];
$files_type = $_FILES["url_img"]["type"];


// 2-verifie la taille de l'image
$sizeMax = 2000000; //2mo

if ($files_size <= $sizeMax) {
    $fileInfo = pathinfo($files_name);
    $extension = $fileInfo["extension"];
    $allowed_extensions = ["jpg", "jpeg", "png"];
    if (in_array($extension, $allowed_extensions)) {
        $new_img_name = uniqid('IMG-', true) . "." . $extension;
        $img_upload_path = 'uploads/' . $new_img_name;
        move_uploaded_file($files_tmp, $img_upload_path);
    } else {
        $error["url_img"] = "<span class='text-red-500'>Type de fichier incorect (autorisé : jpg, jpeg ou png)</span>";
    }
} else {
    $error["url_img"] = "<span class='text-red-500'>Fichier trop lourd (Max 2Mo)</span>";
}
