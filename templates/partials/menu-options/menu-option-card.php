<?php
// function to create a menu option card
function createMenuOptionCard($option)
{
    $dashAction = $_SESSION['dashAction'] ?? null;
    $isActive = $dashAction === $option ? 'active-option' : '';

    $html = <<<HTML
    <button class="card menu-option-card $isActive" type="submit" name="$option">
    <p class="card-text text-light p-2 m-2">$option</p>
    </button>
    HTML;

    echo $html;
}

// create a drop down button that will display the menu options
function createMenuOptionWDropDown($buttonLabel, $dopOptions)
{
    $dashAction = $_SESSION['dashAction'] ?? null;
    // remove the word options from the button label
    $tableName = str_replace(' Options', '', $buttonLabel);
    // see if the table name is in the dashAction
    // make sure that View All isn't in the dashAction
    $isActive = strpos($dashAction, $tableName) !== false && strpos($dashAction, 'View All') === false ?
     'active-option' : '';

    $shouldExpand = $isActive !== '' ? 'toggleMe' : 'dontToggleMe';

    $html = '<button
            type="button"
            id="'.$shouldExpand.'"
            class="card menu-option-card dropdown-toggle card-text text-light p-2 m-2 '.$isActive.'"
            data-bs-toggle="dropdown"
            aria-expanded="false">'
            . $buttonLabel .
            '</button>';

    $html .= '<ul class="dropdown-menu bg-black rounded-3">';

    foreach ($dopOptions as $_option) {
        $isActive = $dashAction === $_option ? 'active-option-drop' : '';
        $html .= '<li>
        <button class="dropdown-item menu-option-card card-text text-light p-2 m-2 '.$isActive.'"
        name="' .$_option .'">' . $_option .
        '</button>
        </li>';
    }

    $html .= '</ul>';

    // if we should expand, we need to include the js script that
    // will look for the button drop down with the button label
    // and expand it
   
    echo $html;
}
