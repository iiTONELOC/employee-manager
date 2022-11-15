<?php
include 'templates/partials/menu-options/menu-option-card.php';

$department_options = [
    'Add Department',
    'Edit Department',
    'Delete Department'
];

$employee_options = [
    'Add Employee',
    'Edit Employee',
    'Delete Employee'
];

$role_options = [
    'Add Role',
    'Edit Role',
    'Delete Role'
];

$menu_options = array(
    'View All Departments',
    'Department Options'=>array(
        'Department Options',
        'Add Department',
        'Update Department',
        'Delete Department'
    ),
    'View All Roles',
    'Role Options'=>array(
        'Role Options',
        'Add Role',
        'Update Role',
        'Delete Role'
    ),
    'View All Employees',
    'Employee Options' => array(
        'Employee Options',
        'Add Employee',
        'Update Employee',
        'Delete Employee'
    ),
    'View Budgets',
    'Exit'
    );

?>


<form
    class ="menu-grid-wrapper"
    method="post"
    action="<?php echo htmlspecialchars("/lib/helpers/menu-options-handler.php");?>"
    >

        <?php
            foreach ($menu_options as $option) {
                // only render a regular button if the option is a string
                if (is_string($option)) {
                    createMenuOptionCard($option);
                } else {
                    // get the button label
                    $key = $option[0];

                    // remove the button label from the array
                    unset($option[0]);

                    // create the drop down button
                    createMenuOptionWDropDown($key, $option);
                }
            }
        ?>
</form>
