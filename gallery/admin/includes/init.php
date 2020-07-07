<?php

defined("DS") ? null : define('DS', DIRECTORY_SEPARATOR);
defined("SITE_ROOT") ? null : define("SITE_ROOT", "C:\wamp64\www". DS);
defined("INCLUDES_PATH") ? null : define("INCLUDES_PATH", "C:\wamp64\www". DS . "admin" . DS . "includes");

    require_once("utility.php");
    require_once("database.php");
    require_once("entity.php");
    require_once("user.php");
    require_once("session.php");
?>