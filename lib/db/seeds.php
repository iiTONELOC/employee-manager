<?php
// include our user controller

include_once 'lib/db/controllers/user.php';

$uc = new UserController();

// get all users
$allUsers = $uc->getAll();

// if there was an error, we return null so we need to force an empty array
$allUsers  = $allUsers ? $allUsers : [];

// check the length of the array
if (count($allUsers) > 0) {
    // the default admin user already exists
} else {
    // get our username and password from our ENVs
    $username = getenv('DBMS_ADMIN');
    $password = getenv('DBMS_PASS');
    // create our test admin user
    $uc->createUser($username, $password);
}
