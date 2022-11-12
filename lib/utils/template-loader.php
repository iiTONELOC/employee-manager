<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    $templatePath = $root . '/templates';

    // render the correct template based on the current page

    
    if ($_SERVER["SCRIPT_NAME"] == "/dashboard.php") {
        include $templatePath . 'dashboard.php';
    } else {
        include $templatePath . '/index.php';
    }

