<?php
session_start();
include "../../BackEnd/database/connect.php";
// include "../../BackEnd/auth/logout.php";
$session_var = $_SESSION['email'];
$check_credentials = mysqli_query($conn,"SELECT * FROM auth WHERE email ='$session_var' limit 1");
if(mysqli_num_rows($check_credentials) == 1){
    $user_data = mysqli_fetch_assoc($check_credentials);
    $session_token = $user_data['session_token'];
    $_SESSION['session_token'] = $session_token;

}else{
    echo " <script> alert ('An error occured on our side retry');";
    header("location:../Authentication/login.php");
}


//check logout




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <form action="../../BackEnd/auth/logout.php" method="post">
    <button type="submit" name="logout" style="background: red;width:50px;border-radius:10px;margin-left:100px">logout</button>
    </form>
    
    <p><?php  ?></p><br>
    <p><?php echo "Hello  ".$user_data['email'] ?></p><br>
    


</body>
</html>
