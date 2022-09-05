<?php
// // note
if (!empty($note)) {
    if (!is_numeric($note) > 1) {
        $error["note"] = "<span class=text-red-500>*il faut mettre une note de 1 à 10</span>";
    } elseif ($note > 10) {
        $error["note"] = "<span class=text-red-500>*il faut mettre une note sur 10</span>";
    }
} else {
    $error["note"] = $errorMessage;
}
