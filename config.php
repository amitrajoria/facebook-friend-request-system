<?php

//start session on web page
session_start();

//Include Google Client Library for PHP autoload file
require_once 'google/vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('979371534629-eao76j4jj0ap92e9bpqkijdn4am2p517.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('LtdZ5iOr-P98wxLW_D7MA0c6');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/friend-request-system/login.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');



// =================================================

require_once 'facebook/vendor/autoload.php';

$fb = new Facebook\Facebook([
	'app_id' => '530900281334294',
	'app_secret' => '3659daa9e9797d45f0f1500925c2f84b',
	'default_graph_version' => 'v8.0'
]);

$helper = $fb->getRedirectLoginHelper();
$permission = ['email'];
$fb_login_url = $helper->getLoginUrl("http://localhost/friend-request-system/login.php", $permission);

$accessToken = $helper->getAccessToken();
if(isset($accessToken)) {
	$_SESSION['fb_access_token'] = (string)$accessToken;
	// header("Location: login.php");
}
	





?> 