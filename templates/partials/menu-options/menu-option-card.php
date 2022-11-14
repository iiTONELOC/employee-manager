<?php
// function to create a menu option card

function createMenuOptionCard($option)
{

    // get the dashAction from the $_SESSION superglobal
    $dashAction = $_SESSION['dashAction'] ?? null;
    $isActive = $dashAction === $option ? 'active-option' : '';

    $html = <<<HTML
    <button class="card menu-option-card $isActive" type="submit" name="$option">
    <p class="card-text text-light p-2 m-2">$option</p>
    </button>
    HTML;

    echo $html;
}
