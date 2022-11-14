<?php
   // start the session
    session_start();
    // load the environment variables
    include_once('lib/utils/load-env.php');
    // seed the database
    include_once('lib/db/seeds.php');
    // template header config
    include_once('templates/template-config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="public/images/favicon.ico" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
    integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">
        <link rel="stylesheet" href="public/CSS/styles.css" type="text/css">
    <?php
        // dynamically load the correct css file based on the current page
        include 'lib/utils/css-loader.php';
    ?>

    <title><?php print $PAGE_TITLE;?></title>
</head>

<body id="root" class="container-fluid bg-black text-light hero p-0 d-flex flex-column">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <?php
        $userId = isset($_COOKIE['userId']) ? $_COOKIE['userId'] : null;
        if ($userId) {
            // if we are logged in, show the dashboard
            require_once 'templates/partials/navigation/navbar.php';
        }
        // use our template loader to load the correct template
        include_once 'lib/utils/template-loader.php';
    ?>
</body>

</html>
