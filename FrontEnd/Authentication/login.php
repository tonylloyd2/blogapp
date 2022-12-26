<?php
session_start();
error_reporting(0);
require_once '../../vendor/autoload.php';
include_once "../../BackEnd/auth/generate_code.php";
include_once "../../BackEnd/database/connect.php";
include_once "../../BackEnd/auth/login.php";

 
 // init configuration
$clientID = '1019491450696-iakksnjt3vjj7u09gl2qtvhu7fd9jse7.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/blog/blogapp/index.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// authenticate code from Google OAuth Flow
// error_reporting(0);
$error_msg = "";

if (isset($_POST['login'])) {
  
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);   
  $error_msg = login($conn , $email , $password , $error_msg);   
  
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>genz</title>
    <link rel="stylesheet" href="../css/login.css">

    <style>


@import url('https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400');
</style>


<style>
  .fa-google{
    background: conic-gradient(from -45deg, #ea4335 110deg, #4285f4 90deg 180deg, #34a853 180deg 270deg, #fbbc05 270deg) 73% 55%/150% 150% no-repeat;
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
  -webkit-text-fill-color: transparent;
  }
</style>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>
<body>
    <!-- <h3> <hr> </h3> -->
    <div class="iconform">
    <div class="form">
      <h4>Login to your account</h4>
      <?php echo $error_msg; ?>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
      <!-- <label for="email">Email</label> <br> -->
      <input type="text" placeholder="Email" name="email" required> <br>
      <!-- <label for="password">Password</label><br> -->
      <input type="password" placeholder="Password" name="password" required> <br>

      <button name="login">Log In</button>
      <br>
      <br>
      <a href="./forgotpassword.php"><h5 class="forgot-password"> Forgot password ? </h5></a>
   </form>
    
    <div class="icons">
    <div class="lowertext">
    <p style="font-size: 15px;">-Or Sign In With-</p>
    </div>
    <ul class="icons-center">
  <li><a href="#"><i class="fab fa-facebook" aria-hidden="true" >q</i></a></li>
  <li><a href="#"><i class="fab fa-twitter" aria-hidden="true">a</i></a></li>
<?php
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);
  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;

  // now you can use this profile info to create account in your website and make user logged in.
} 
else {
  echo " <li><a href='".$client->createAuthUrl()."'><i class='fab fa-google' aria-hidden='true'>d</i></a></li> ";
}
  ?>
  
  </ul>
    </div>
   <p>Don't Have An Account? <a href="./signup.php"><b>Sign Up</b></a></p>

    </div>
    </div>
</body>
</html>