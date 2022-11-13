<?php
    $publicPath ='./public';
    $cssFolder = $publicPath . '/CSS';

    $dynamicSource;

    if ($_SERVER["REQUEST_URI"]== "/dashboard.php") {
        $dynamicSource = $cssFolder . '/dashboard.css';
    } else {
        $dynamicSource = $cssFolder . '/home.css';
    }

    print "<link rel='stylesheet' href='$dynamicSource' type='text/css' />";

