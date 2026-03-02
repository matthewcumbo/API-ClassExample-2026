<?php 
    // This file sets up the core API structure

    // define named constants
    // DS = / or \ depending on server OS/Config
    // SITE_ROOT = root directory of project
        // i.e. C:/xampp/htdocs/API-ClassExample-2026
        // MAC = Applications/mamp/htdocs/API-ClassExample-2026
    defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
    defined('SITE_ROOT') ? null : define('SITE_ROOT', DS.'Applications'.DS.'mamp'.DS.'htdocs'.DS.'API-ClassExample-2026');

    require_once("config.php");


?>