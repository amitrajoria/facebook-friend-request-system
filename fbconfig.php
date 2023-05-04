<?php 

session_start();

require_once 'facebook/vendor/autoload.php';

$fb = new Facebook\Facebook([
	'app_id' => '530900281334294',
	'app_secret' => '3659daa9e9797d45f0f1500925c2f84b',
	'default_graph_version' => 'v8.0'
]);

$helper = $fb->getRedirectLoginHelper();
$permission = ['email'];
$fb_login_url = $helper->getLoginUrl("http://localhost/friend-request-system/login.php", $permission);

try {$accessToken = $helper->getAccessToken();} catch( FacebookRequestException $ex ) {} catch( Exception $ex ) {}


// $accessToken = $helper->getAccessToken();
if(isset($accessToken)) {
	$_SESSION['fb_access_token'] = (string)$accessToken;
	// header("Location: login.php");
}
if(isset($_SESSION['fb_access_token'])){
  $fb->setDefaultAccessToken($_SESSION['fb_access_token']);
  $res = $fb->get('/me?fields=name,email');
  $user = $res->getGraphUser();
  $picture = $fb->get('/me/picture?redirect=false&height=150');
  $userpic = $picture->getGraphUser();
  $_SESSION['username'] = $user->getField('name');
  $_SESSION['email'] = $user->getField('email');
  $_SESSION['picture'] = $userpic->getField('url');
  $_SESSION['locale'] = $userpic->getField('locale');
  $_SESSION['login'] = "true";
  // print_r($_SESSION);
}



?>