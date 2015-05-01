<?php
error_reporting(E_ALL);
ini_set('display_error', 'On');

// if any of the needed conditions are not met we will set
// $displayTable to false
$displayTable = true;
$checkContents = true;


// check that the needed variables are sent via GET
if (!isset($_GET['min-multiplicand'])) {
    echo '<p>Missing parameter: min-multiplicand';
    $displayTable = false;
    $checkContents = false;
}

if (!isset($_GET['max-multiplicand'])) {
    echo '<p>Missing parameter: max-multiplicand';
    $displayTable = false;
    $checkContents = false;
}

if (!isset($_GET['min-multiplier'])) {
    echo '<p>Missing parameter: min-multiplier';
    $displayTable = false;
    $checkContents = false;
}

if (!isset($_GET['max-multiplier'])) {
    echo '<p>Missing parameter: max-multiplier';
    $displayTable = false;
    $checkContents = false;
}

// check that the needed variables are integers
if ($checkContents) {
    if (!filter_input(INPUT_GET, 'min-multiplicand', FILTER_VALIDATE_INT)) {
        echo '<p>min-multiplicand must be an integer.';
        $displayTable = false;
    }

    if (!filter_input(INPUT_GET, 'max-multiplicand', FILTER_VALIDATE_INT)) {
        echo '<p>min-multiplicand must be an integer.';
        $displayTable = false;
    }

    if (!filter_input(INPUT_GET, 'min-multiplier', FILTER_VALIDATE_INT)) {
        echo '<p>min-multiplicand must be an integer.';
        $displayTable = false;
    }

    if (!filter_input(INPUT_GET, 'max-multiplier', FILTER_VALIDATE_INT)) {
        echo '<p>min-multiplicand must be an integer.';
        $displayTable = false;
    }

// check that min-multiplicand and min-multiplier are less than or equal to
// max-multiplicand/multiplier
    if ($_GET['min-multiplicand'] > $_GET['max-multiplicand']) {
        echo "<p>Minimum Multiplicand larger than maximum.";
        $displayTable = false;
    }

    if ($_GET['min-multiplier'] > $_GET['max-multiplier']) {
        echo "<p>Minimum Multiplier larger than maximum.";
        $displayTable = false;
    }
}
?>