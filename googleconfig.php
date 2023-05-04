<?php

// session_start();

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



if(isset($_GET["code"]))
{
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

  $_SESSION['google_access_token'] = $token['access_token'];

  $google_service = new Google_Service_Oauth2($google_client);

  $data = $google_service->userinfo->get();

  if(!empty($data['given_name']) || !empty($data['family_name']))
  {
   $_SESSION['username'] = $data['given_name']." ".$data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['email'] = $data['email'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['picture'] = $data['picture'];
  }

  if(!empty($data['locale']))
  {
   $_SESSION['locale'] = $data['locale'];
  }
  
  $_SESSION['login'] = "true";
 }





}

 ?>