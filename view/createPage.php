<?php

$title = "Jeux";
ob_start();
require("partials/_create.php");

$content = ob_get_clean();
require("layout.php");
