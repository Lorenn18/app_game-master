<?php
// // price
if (!empty($price)) {
    if (!is_numeric($price)  && !is_float($price)) {
        $error["price"] = "<span class=text-red-500>*veuillez entrez un prix</span>";
    } elseif ($price < 0) {
        $error["price"] = "<span class=text-red-500>*veuillez rentrer un prix supérieur à 0€</span>";
    } elseif ($price > 90) {
        $error["price"] = "<span class=text-red-500>*veuillez rentrer un prix inférieur à 90€</span>";
    }
} else {
    $error["price"] = $errorMessage;
}
