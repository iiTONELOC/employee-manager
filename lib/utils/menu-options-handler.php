<?php
    $menu_options = array(
    'View All Departments',
    'View All Roles',
    'View All Employees',

    'Department Options',
    'Role Options',
    'Employee Options',

    'View Budgets',
    'Exit'
    );

// check for post events

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $action = array_key_first($_POST);
    // check and see if the action exists in the menu options array
    global $menu_options;

    $formatAction = ucwords(str_replace('_', ' ', $action));

    // check if the action is in the menu options array

    if (in_array($formatAction, $menu_options)) {
        $_SESSION['dashAction'] = $formatAction;
        echo $formatAction;
        if ($formatAction == 'Exit') {
            header('Location: /lib/utils/logout.php');
        }else {
            header('Location: /dashboard.php');
        }
    }
}

