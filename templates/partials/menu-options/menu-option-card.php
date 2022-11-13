<?php
// function to create a menu option card
function createMenuOptionCard($option)
{
    $html = <<<HTML
    <button class="card menu-option-card" type="submit" name="$option">
    <p class="card-text text-light p-2 m-2">$option</p>
    </button>
    HTML;

    echo $html;
}
