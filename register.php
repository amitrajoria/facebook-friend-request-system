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
			height: auto;
			width: 760px;
			border-radius: 30px;
			border-color: lightgray;
			box-shadow: 2px 2px 8px 2px white;

 		}

	</style> 
</head>
<body>
<center>
<div>
<form action="" method="post" enctype="multipart/form-data" class="col s12">
	<fieldset>
		<legend>&nbsp;&nbsp;<i class="material-icons" style="font-size: 50px;">account_circle</i>&nbsp;&nbsp;</legend>



<div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
        	 <i class="material-icons prefix">person</i>
	          <input id="full_name" type="text" name="username" class="validate" autocomplete="off" required="">
	          <label for="full_name">User Name</label>
        </div>
        <div class="input-field col s6">
        	 <i class="material-icons prefix">person</i>
	          <input id="email" type="text" name="email" class="validate" autocomplete="off" required="">
	          <label for="email">User Email</label>
        </div>
        <div class="input-field col s6">
        	<i class="material-icons prefix">vpn_key</i>
          <input id="password_inline" type="password" name="password" class="validate" required="">
          <label for="password_inline">Password</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">contacts</i>
          <input id="contact" type="text" name="contact" class="validate" maxlength="10" required="">
          <label for="contact">Contact</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">business</i>
          <input id="city" type="text" name="city" class="validate" required="">
          <label for="city">City</label>
        </div>
        <div class="input-field col s6">
          <div class="file-field input-field col s11" style="margin-left: 30px;">
            <div class="btn">
              <span>File</span>
              <input type="file" name="file">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" name="file" required="">
            </div>
          </div>
       </div>

      <button class="btn waves-effect waves-light" type="submit" name="submit" style="margin-top: 30px;">Submit
    <i class="material-icons right">send</i>
  </button>
  </form>
  </div>
  
  	
</fieldset>
</form>
</div> 
</center>
<?php
$con=new mysqli("localhost","root","","assignment");

if (isset($_POST['submit'])) 
{
  $current_timestamp = time();
  $username=$_POST['username'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $contact=$_POST['contact'];
  $city=$_POST['city'];
  $filename=$_FILES['file']['name'];
  $tmp_name=$_FILES['file']['tmp_name'];
  $ext=pathinfo($filename, PATHINFO_EXTENSION);
  $ext_arr=['png','jpeg','jpg'];
  if(in_array($ext, $ext_arr)) 
    {
      $imgurl="img/img{$current_timestamp}.{$ext}";
      move_uploaded_file($tmp_name,$imgurl);

      $q=$con->prepare("insert into facebook(username,email,password,contact,city,img) values(?,?,?,?,?,?)");
      $q->bind_param("ssssss",$username,$email,$password,$contact,$city,$imgurl);
      $q->execute();
      if ($q) {
        ?>
        <script>alert("Registration Successful..")</script>   
        <?php
        header('refresh:0; url=login.php');
  }
}
}

$con->close();

?>
</body>
</html>