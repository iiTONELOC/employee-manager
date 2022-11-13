<?php
    // get our user controller
    include_once 'lib/db/controllers/user.php';
     // define variables and set to empty values
    $username = $password =  "";

    // error holders
    $usernameErr = $passwordErr = null;

    $results = false;

// validate our inputs and set any errors
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
    $usernameErr = "Name is required";
    } else {
        $username = sanitizeInput($_POST["username"]);
    }
    
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = sanitizeInput($_POST["password"]);
    }

    // if we have no errors, check the database
    if (!$usernameErr && !$passwordErr) {
        $results = checkCredentials($username, $password);
        if ($results) {
            // redirect to the dashboard
            header('Location: dashboard.php');
        }
    }
}


/**
 * Sanitize user input
 */
function sanitizeInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/**
 * Display input error message
 */
function displayError($error)
{
    echo "<span class='error'>* " . $error . "</span>";
}


/**
 * Check the users credentials against the database
 * Set the userID in the session if the credentials are valid
 */

function checkCredentials($username, $password)
{
    $uc = new UserController();
    $verified = $uc->verifyLogin($username, $password);

    if ($verified) {
        $exp = time() + 60 * 60 * 24 * 30;
        setcookie('userId', $verified->getId(), $exp, "/");
        return true;
    } else {
        return false;
    }
}
