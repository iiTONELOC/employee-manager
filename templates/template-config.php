<?php
    $self = $_SERVER['REQUEST_URI'];
    if ($self == "/dashboard.php") {
        $CURRENT_PAGE = "Dashboard";
        $PAGE_TITLE = "Dashboard";
    } else {
        $CURRENT_PAGE = "Index";
        $PAGE_TITLE = "Welcome To Dashboard Manager";
    }
