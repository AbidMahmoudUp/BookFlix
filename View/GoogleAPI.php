<?php
//require_once '../vendor/autoload.php';

// init configuration
$clientID = '414590756141-tq6mu2kvnobp7euqasj5t22teou52ja7.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/projectWeb/View/BookFlixClient/index.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);

  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;
  print_r($google_account_info);
  // now you can use this profile info to create account in your website and make user logged in.
} else {
  echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
}
?>