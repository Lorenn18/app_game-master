<?php

$title = "Accueil"; 
ob_start();
require("view/partials/_home.php");

$content = ob_get_clean();
require("layout.php");