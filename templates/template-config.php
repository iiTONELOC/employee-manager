<?php
    switch ($_SERVER["SCRIPT_NAME"]) {
        case "/login.php":
            $CURRENT_PAGE = "Login";
            $PAGE_TITLE = "Login";
            break;
        case "/dashboard.php":
            $CURRENT_PAGE = "Dashboard";
            $PAGE_TITLE = "Dashboard";
            break;

        default:
            $CURRENT_PAGE = "Index";
            $PAGE_TITLE = "Welcome To Dashboard Manager";
        
    }
