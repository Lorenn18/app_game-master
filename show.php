<!-- header -->
<?php
// start session
// session_start();
require_once("models/database.php");
$game = getGame();
$title = $game['name']; //title for current page
require("view/showPage.php");



?>