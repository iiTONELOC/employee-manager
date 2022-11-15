<?php
// import our department controller
include_once 'lib/db/controllers/departments.php';
include_once 'lib/helpers/get-all-db-helper.php';

$_SESSION['fieldError'] = null;
$_SESSION['dbError'] = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dName = $_POST['departmentName'] ?? '';
    $rName = $_POST['roleName'] ?? '';
    $uName = $_POST['username'] ?? '';

    $aName = ($dName ? 'department': null) ?? ($rName ? 'role': null) ?? ($uName? 'user': null);

    if ($aName) {
        switch ($aName) {
            case 'department':
                $results = createEntry('departments', $dName);
                break;
            case 'role':
                $results = createEntry('roles', $rName);
                break;
            case 'user':
                echo 'user';
                break;
            default:
                echo 'default';
                break;
            }
    } else {
        $_SESSION['fieldError'] = 'Fields cannot be empty';
    }

}else {
    echo $_SERVER['REQUEST_METHOD'];
    $_SESSION['fieldErr'] = 'Invalid request method';
}

function sanitizeInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/**
 * Creates an entry in the departments or roles table
 * The employee table will need more than one field/argument so for cleanliness
 * it will have its own function
 */
function createEntry($tableName, $entryName)
{
    $validTableNames = ['departments', 'roles'];

    if (!in_array($tableName, $validTableNames)) {
        return;
    }
    // get a list of all departments to ensure we don't have a duplicate
    // MySQL will throw an error if we try to create a duplicate so lets
    // check for it here and display a custom error message
    try {
        $existingEntries = getAll($tableName);

        $existingNameToGet = $tableName == 'departments' ? 'department_name' : 'role_name';
        //  get a list of existing department names
        $existingNames = array_map(function ($entry) use ($existingNameToGet) {
            return $entry[$existingNameToGet];
        }, $existingEntries);
    
        // Validate the field

        $fieldName = $existingNameToGet == 'department_name' ? 'Department' : 'Role';
        $functionName = $existingNameToGet == 'department_name' ? 'createDepartment' : 'createRole';
        if (empty($entryName)) {
            $_SESSION['fieldError'] =  $fieldName. ' is required';
        } elseif (in_array($entryName, $existingNames)) {
            $_SESSION['fieldError'] = $fieldName. ' already exists';
        } elseif (!preg_match("/^[a-zA-Z\d ]*$/", $entryName)) {
            $_SESSION['fieldError'] = 'Only letters numbers and white space allowed';
        } else {
            // clear any errors
            $_SESSION['fieldError'] = null;

            // sanitize the input
            $entryName = sanitizeInput($entryName);

            // create the entry
            $entryId = $functionName($entryName);

            if ($entryId) {
                $_SESSION['dashAction'] = 'View All '.$fieldName.'s';
            } else {
                $_SESSION['DbError'] = 'There was an error creating the '.$fieldName;
            }
        }

    } catch (\Throwable $th) {
        echo 'ERROR' . $th->getMessage();
        $_SESSION['DbError'] = $th->getMessage();
    }
}


// send the user back to the dashboard
header('Location: /dashboard.php');
