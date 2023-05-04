<?php
	include_once 'src/Google_Client.php';
	include_once 'src/contrib/Google_Oauth2Service.php';
	
	// Edit Following 3 Lines
	$clientId = '979371534629-eao76j4jj0ap92e9bpqkijdn4am2p517.apps.googleusercontent.com'; //Application client ID
	$clientSecret = 'LtdZ5iOr-P98wxLW_D7MA0c6'; //Application client secret
	$redirectURL = 'http://localhost/friend-request-system/login.php'; //Application Callback URL
	
	$gClient = new Google_Client();
	// $gClient->setApplicationName('Social Login');
	$gClient->setClientId($clientId);
	$gClient->setClientSecret($clientSecret);
	$gClient->setRedirectUri($redirectURL);
	$google_oauthV2 = new Google_Oauth2Service($gClient);

$gClient->createAuthUrl();



if(isset($_GET['code'])){
        $gClient->authenticate($_GET['code']);
        $_SESSION['token'] = $gClient->getAccessToken();
        header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
      }
      if (isset($_SESSION['token'])) {
        $gClient->setAccessToken($_SESSION['token']);
      }
      if ($gClient->getAccessToken()) 
      {
        $gpUserProfile = $google_oauthV2->userinfo->get();
        $_SESSION['oauth_provider'] = 'Google'; 
        $_SESSION['oauth_uid'] = $gpUserProfile['id']; 
        $_SESSION['first_name'] = $gpUserProfile['given_name']; 
        $_SESSION['last_name'] = $gpUserProfile['family_name']; 
        $_SESSION['email'] = $gpUserProfile['email'];
        $_SESSION['logincust']='yes';
        print_r($_SESSION);
      } 


?>