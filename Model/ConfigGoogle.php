<?php
require_once __DIR__ . '/../vendor/autoload.php';


//------ init configuration file -----------//
$clientID = '414590756141-e9dea9uns7nr23s847naomeelbahjfe6.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/projet/View/BookFlixClient/index.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
session_start();
?>