<?php
include 'templates/partials/menu-options/menu-option-card.php';

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

?>


<form class = "menu-grid-wrapper" method='post' action="<?php echo htmlspecialchars("/lib/utils/menu-options-handler.php");?>">
        <?php
            foreach ($menu_options as $option) {
                createMenuOptionCard($option);
            }
        ?>
</form>