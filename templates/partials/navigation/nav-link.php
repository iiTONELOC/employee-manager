<?php

function navLink($link, $text, $liClass = null, $aClass = null) {
    $class = $class ? "class='$class'" : '';
    $aClass = $aClass ? "class='$aClass'" : '';

    echo "<li class='nav-item' '$liClass'> <a class='nav-link' $aClass href='$link'>$text</a> </li>";

}