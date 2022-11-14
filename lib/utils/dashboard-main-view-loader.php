<?php
// we need to check for the dashAction session variable
// if it exists, we need to load the correct template
// if it doesn't exist, we need to load the default template

$dashAction = $_SESSION['dashAction'] ?? null;

if ($dashAction) {
    switch ($dashAction) {
        case 'View All Departments':
            include_once 'templates/partials/dash/viewAllDepartments.php';
            break;
        case 'View All Roles':
            include_once 'templates/partials/dash/viewAllRoles.php';
            break;
        case 'View All Employees':
            include_once 'templates/partials/dash/viewAllEmployees.php';
            break;
        case 'Department Options':
            echo 'Department Options';
            break;
        case 'Role Options':
            echo 'Role Options';
            break;
        case 'Employee Options':
            echo 'Employee Options';
            break;
        case 'View Budget':
            echo 'View Budget';
            break;
        case 'Exit':
            break;
        default:
            echo 'Default';
            break;
    }
} else {
    echo 'Default';
}
