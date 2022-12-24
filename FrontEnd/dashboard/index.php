<?php
session_start();
include "../../BackEnd/database/connect.php";
include "../../BackEnd/auth/logout.php";
$session_var = $_SESSION['session_token'];
echo $session_var;
$check_credentials=mysqli_query($conn,"SELECT * FROM auth WHERE session_token='$session_var' limit 1");
if($check_credentials){
    $user_data = mysqli_fetch_assoc($check_credentials);
}



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
    <!-- <button type="submit" style="background: red;width:50px;border-radius:10px;margin-left:100px" onclick="<?php logout(); ?>">logout</button> -->
    <p><?php echo $user_data['email'] ?></p><br>
    <p><?php echo $user_data['session_token'] ?></p><br>
    <p><?php echo $user_data['password'] ?></p><br>

</body>
</html>
