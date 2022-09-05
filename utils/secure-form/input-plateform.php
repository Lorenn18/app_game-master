<?php
// // plateform
if (!empty($plateforms_clear)) {
    if (in_array("Switch", $plateforms_clear) || in_array("PS3", $plateforms_clear) || in_array("PS4", $plateforms_clear) || in_array("Xbox", $plateforms_clear)) {
    } else {
        $error["error"] = "<span class=text-red-500>c'est bizarre plateform, ces valeurs n'existent pas</span>";
    }
} else {
    $error["plateforms"] = $errorMessage;
}
