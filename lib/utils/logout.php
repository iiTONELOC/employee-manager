<?php

// need to delete the cookie and clear the session
// then redirect to the index page

// delete the cookie
setcookie('userId', '', time() - 3600, '/');

// clear the session
session_unset();
session_destroy();

// redirect to the index page
header('Location: /index.php');
