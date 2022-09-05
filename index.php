<?php

/**
 * This file show the home page 
 */
session_start();
require_once("models/database.php");
$games = getAllGames();

require("view/homePage.php");
