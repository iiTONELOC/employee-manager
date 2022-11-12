<?php
    if ($_SERVER["SCRIPT_NAME"] == "/dashboard.php") {
        $CURRENT_PAGE = "Dashboard";
        $PAGE_TITLE = "Dashboard";
    } else {
        $CURRENT_PAGE = "Index";
        $PAGE_TITLE = "Welcome To Dashboard Manager";
    }
