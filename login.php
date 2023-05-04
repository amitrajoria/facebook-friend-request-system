<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> 
	<style>
		
		fieldset{
			margin-top: 40px;
			height: 500px;
			max-width: 400px;
			border-radius: 30px;
			border-color: lightgray;
			box-shadow: 2px 2px 8px 2px white;

 		}
    .login_with_btn {
      display: block;
      margin-top: 30px;
    }
    .social-btn {
      display: inline-flex;
      border: 2px solid #d3dae9;
      color: #8fa1c7;
      border-radius: 30px;
      padding: 10px;
    }
    .social-btn span {
      font-weight: bold;
      color: #6b7c9e;
    }



	</style> 
</head>
<body>
<center>
<div>
<?php 
// if(isset($_SESSION['login']) && $_SESSION['login'] == "true") {
//   print_r($_SESSION);
// }
// else {
 // print_r($_SESSION);
// include('fbconfig.php');
// include('googleconfig.php');


// if(isset($_GET["code"]))
// {
//  $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

//  if(!isset($token['error']))
//  {
 
//   $google_client->setAccessToken($token['access_token']);

//   $_SESSION['google_access_token'] = $token['access_token'];

//   $google_service = new Google_Service_Oauth2($google_client);

//   $data = $google_service->userinfo->get();

//   if(!empty($data['given_name']))
//   {
//    $_SESSION['user_first_name'] = $data['given_name'];
//   }

//   if(!empty($data['family_name']))
//   {
//    $_SESSION['user_last_name'] = $data['family_name'];
//   }

//   if(!empty($data['email']))
//   {
//    $_SESSION['user_email_address'] = $data['email'];
//   }

//   if(!empty($data['gender']))
//   {
//    $_SESSION['user_gender'] = $data['gender'];
//   }

//   if(!empty($data['picture']))
//   {
//    $_SESSION['user_image'] = $data['picture'];
//   }

//   if(!empty($data['locale']))
//   {
//    $_SESSION['locale'] = $data['locale'];
//   }

//  }





// }


if(!isset($_GET["code"]))
{
  $_SESSION['login'] = "false";
?>
<form action="" method="post">
	<fieldset>
		<legend>&nbsp;&nbsp;<i class="material-icons" style="font-size: 50px;">account_circle</i>&nbsp;&nbsp;</legend>



<div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s10">
        	 <i class="material-icons prefix" style="margin-top: 10px;">person</i>
	          <input id="last_name" type="text" name="email" class="validate" autocomplete="off" required="" style="margin-top: 10px;">
	          <label for="last_name" style="margin-top: 10px;">Email</label>
        </div>
      </div>  
      <div class="row">
        <div class="input-field col s10">
        	<i class="material-icons prefix" style="margin-top: 10px;">vpn_key</i>
          <input id="password" type="password" name="password" class="validate" required="" style="margin-top: 10px;">
          <label for="password" style="margin-top: 10px;">Password</label>
        </div>
      </div>

      <button class="btn waves-effect waves-light" type="submit" name="submit" style="margin-top: 30px;">Submit
    <i class="material-icons right">send</i>
  </button>
  </form>
  </div>
  <span style="float: right;margin-right: 10px;">NewUser ?&nbsp;<a href="register.php">Register</a></span>
  	 <br>

     <div class="login_with_btn">

<?php
//  echo '<a href="'.$google_client->createAuthUrl().'" class="social-btn" id="google-login">Login with <span>&nbsp; Google</span></a>';
//  echo '<a href="'.$fb_login_url.'" class="social-btn" id="fb-login">Login with <span>&nbsp; Facebook</span></a>';

}
else
{
  include 'database.php';
  print_r($_SESSION);
  // if(isset($_SESSION['fb_access_token']) && $_SESSION['fb_access_token'] != '') {
  //   $username = $_SESSION['username'];
  //   $email = $_SESSION['email'];
  //   $picture = $_SESSION['picture'];
  //   $location = '';
  // }
  // else {
  //   $username = $_SESSION['user_first_name']." ".$_SESSION['user_last_name'];
  //   $email = $_SESSION['user_email_address'];
  //   $picture = $_SESSION['user_image'];
  //   $location = $_SESSION['locale'];
    // $_SESSION['u']= $_SESSION['$username'];

    $record=getbyEmail($_SESSION['email']);
    if(empty($record)) {

      $q=$con->prepare("insert into facebook(username,email,city,img) values(?,?,?,?)");
      $q->bind_param("ssss",$_SESSION['username'],$_SESSION['email'],$_SESSION['locale'],$_SESSION['picture']);
      $q->execute();
    }
    header("location:index.php");
  // }
}

// if($login_button != '') {
//   echo '<div align="center">'.$login_button . '</div>';
// }


?>
<!-- <a href="" class="social-btn" id="facebook-login">Login with <span>&nbsp; facebook</span></a> -->

<!-- <a href="" class="social-btn" id="google-login">Login with <span>&nbsp; Google</span></a> -->

</div>

</fieldset>
</form>
</div> 

</center>
<?php

  $con=new mysqli("localhost","root","","assignment");
  session_start();
  if (isset($_POST['submit'])) 
  {
// echo "Working";
    $email=$_POST['email'];
    $password=$_POST['password'];
    $q="select * from facebook where email='$email' and password='$password'";
    $result=$con->query($q);
    if ($result->num_rows==1) 
    { 
      $_SESSION['email']=$email;
      // print_r($_SESSION);
      header("location:index.php");
    }
    else
    {
        ?>
         <script>alert("Invalid username & password")</script>   
         <?php
        header('refresh:0; url=login.php');
    }
  }
?>
</body>
</html>