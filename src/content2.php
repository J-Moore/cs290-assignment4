<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
header('Content-type: text/html');

// this bit taken from the PHP Sessions video lecture
// used to create a filepath that can be used if the server moves
$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
$filePath = implode('/', $filePath);
$redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;

session_start();

// check that a username was submitted from the login form
if (   ($_SERVER['REQUEST_METHOD'] === 'GET')
    && (!isset($_SESSION['username']))
) {
    header("Location: {$redirect}/login.php", true);
    die();
} else {

    echo "Click <a href='content1.php'>here</a> to return to content1.php";
}