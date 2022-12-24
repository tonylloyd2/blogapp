<?php 
session_start();
include "../../BackEnd/database/connect.php";
include_once  "../../BackEnd/auth/register.php";
$error_msg = " <u>Please fill out this form </u>";
error_reporting(0);
$fpasword = $_POST['fpassword'];
$cpassword = $_POST['password'];
$email = $_POST['email'];
   
 
if ($fpasword == $cpassword && isset($_POST['login'])) { 
  $fpasword = $_POST['fpassword'];
  $cpassword = $_POST['password'];
  $email = $_POST['email'];
  // $error_msg = "<b style='color:green'> success wait for redirection😊</b>";
  $query_db = mysqli_query($conn , "SELECT * FROM auth where email='$email'");

  if (mysqli_num_rows($query_db) > 0 ) {
    $error_msg = "<b style='color:red'> Failed , email already reistered !</b>";
  }
  else{
    register($conn , $email , $cpassword  ,$error_msg);
  }
  
}
elseif ( ($fpasword != $cpassword && isset($_POST['login'])) || ($fpasword != $cpassword && !isset($_POST['login']))   ) {
  $error_msg = "<b style='color:red'> passwords didn't match 😒</b>";
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
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> 
</head>
<body>
  <div class="iconform">
    <div class="form">
      <h4>Sign Up An account</h4>
      <p>
        <?php 
        echo $error_msg;
      ?>  
    </p>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    
    <input type="email" name="email" required placeholder="Email" required id="email"> <br>
    <input type="password" name="fpassword" required placeholder="Password" id="password"> <br>
    <input type="password" name="password" required placeholder="Confirm Password" id="cpassword"> <br>
     <button name="login">Create Account</button><br>
     
      </form>

      <input type="checkbox"  onclick="show_pass()" style="max-width:20px;border-style: none; max-height: 10px; margin-left:8%"> Show Password ?   
      <div class="lowertext">
    
    <p style="font-size: 15px;">-Or Sign In With-</p>
    </div>
    <div class="icons">
    <ul class="icons-center">
  <li><a href="#"><i class="fab fa-facebook" aria-hidden="true" ></i></a></li>
  <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
  <li><a href="#"><i class="fab fa-google" aria-hidden="true"></i></a></li>
  </ul>
    </div>
   <p>Already Have An Account? <a href="login.php"><b>Log In</b></a></p>
    </div>
    </div>  

</body>
<script src="../javascript/validate_form.js"></script>

</html>