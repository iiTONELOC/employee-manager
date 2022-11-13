<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$templatePath = $root . '/templates';

// render the correct template based on the current page

$self = $_SERVER['REQUEST_URI'];
$session = $_COOKIE;


if ($self == "/dashboard.php") {
        isset($session['userId']) && include $templatePath . '/dashboard.php';
        !isset($session['userId']) && header('Location: /index.php');
} elseif ($self == '/lib/utils/logout.php') {
        include $root. '/lib/utils/logout.php';
} else {
        !isset($session['userId']) && include $templatePath . '/index.php';
        isset($session['userId']) && header('Location: /dashboard.php');
}
