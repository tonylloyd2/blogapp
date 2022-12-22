<?php 
include "../../BackEnd/database/connect.php";
$error_msg = "Please fill out this form";
error_reporting(0);
$fpasword = $_POST['fpassword'];
$cpassword = $_POST['password'];
$email = $_POST['email'];
   
 
if ($fpasword == $cpassword && isset($_POST['login'])) { 
  $error_msg = "form validation success!!";
  
}
elseif ( ($fpasword != $cpassword && isset($_POST['login'])) || ($fpasword != $cpassword && !isset($_POST['login']))   ) {
  $error_msg = "passwords didn't match";
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
    
    <input type="text" name="email" required placeholder="Email" required id="email"> <br>
    <input type="text" name="fpassword" required placeholder="Password" id="password"> <br>
    <input type="text" name="password" required placeholder="Confirm Password" id="cpassword"> <br>
     <button name="login">Log In</button><br>
     
      </form>
      <input type="checkbox"  onclick="show_pass()" style="max-width:20px;border-style: none; max-height: 10px;"> Show Password ?   
      <div class="lowertext">
    
    <p style="font-size: 15px;">-Or Sign In With-</p>
    </div>
    <div class="icons">
    <ul class="icons-center">
  <li><a href="#"><i class="fab fa-facebook" aria-hidden="true" >A1</i></a></li>
  <li><a href="#"><i class="fab fa-twitter" aria-hidden="true">A1</i></a></li>
  <li><a href="#"><i class="fab fa-google-plus-g" aria-hidden="true">A1</i></a></li>
  </ul>
    </div>
   <p>Already Have An Account? <a href="login.php"><b>Log In</b></a></p>
    </div>
    </div>  

</body>
<script src="../javascript/validate_form.js"></script>

</html>