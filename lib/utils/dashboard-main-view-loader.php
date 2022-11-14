<?php

// we need to check for the dashAction session variable
// if it exists, we need to load the correct template
// if it doesn't exist, we need to load the default template

$dashAction = $_SESSION['dashAction'] ?? null;

$dashAction && print($dashAction);

!$dashAction && print('default');
