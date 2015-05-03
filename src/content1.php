<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
header('Content-type: text/html');

// this bit taken from the PHP Sessions video lecture
// used to create a filepath that can be used if the server moves
$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
$filePath = implode('/', $filePath);
$redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;

// check that a username was submitted from the login form
if (   ($_SERVER['REQUEST_METHOD'] === 'POST')
    && (($_POST['username'] === null)
    || ($_POST['username'] === ""))
) {
    echo "A username must be entered. Click <a href='$redirect/login.php'>
    here</a> to return to the login screen.";
} else {

    session_start();
    
    // check that the content page was not accessed before creating a username
    if (   ($_SERVER['REQUEST_METHOD'] === 'GET')
        && (!isset($_SESSION['username']))
    ) {
        header("Location: {$redirect}/login.php", true);
        die();
    }
    
    // main code section for displaying number of visits
    if (session_status() == PHP_SESSION_ACTIVE) {
        if (!isset($_SESSION['username'])) {
            $_SESSION['username'] = $_POST['username'];
        }
        
        if (!isset($_SESSION['visits'])) {
            $_SESSION['visits'] = 0;
        } else {
            $_SESSION['visits']++;
        }
        
        echo "Hello $_SESSION[username] you have visited this page $_SESSION[visits] 
        times before. Click <a href='login.php?action=logout'>here</a> to logout.";
        
        echo "<br>";
        
        echo "Click <a href='content2.php'>here</a> to access content2.php";
    }
}
?>