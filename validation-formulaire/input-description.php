<?php
// // description
if (!empty($description)) {
    if (strlen($description) <= 25) {
        $error["description"] = "<span class=text-red-500>*25 Caractères minimum</span>";
    } elseif (strlen($description) > 500) {
        $error["description"] = "<span class=text-red-500>*500 Caractères maximum</span>";
    }
} else {
    $error["description"] = $errorMessage;
}
