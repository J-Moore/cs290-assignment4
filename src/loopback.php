<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
header('Content-type: application/json');
mb_internal_encoding('UTF-8');

$type = "";
$parameters = array();


// check the method of the request and parse accordingly
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $type = 'GET';
    if (count($_GET) > 0) {
        foreach($_GET as $key => $value) {
            $parameters[$key] = $value;
        }
    } else {
        $parameters = null;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = 'POST';
    if (count($_POST) > 0) {
        foreach($_POST as $key => $value) {
            $parameters[$key] = $value;
        }
    } else {
        $parameters = null;
    }
} else {
    die();
}

// then combine read parameters into a JSON object
$json = array(
    'Type'          => $type,
    'parameters'    => $parameters
);

$jsonstring = json_encode($json);
echo $jsonstring;
?>