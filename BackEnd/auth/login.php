<?php
function login($conn , $email , $password  , $error_msg){
    $check_credentials = mysqli_query($conn,"SELECT * FROM auth WHERE email='{$email}' limit 1");    
    if(mysqli_num_rows($check_credentials) > 0){
      $validate_db = mysqli_query($conn,"SELECT * FROM auth WHERE email='{$email}' and password='{$password}' limit 1");
      if (mysqli_num_rows($validate_db) == 1 ) {
        $session_token = random_code(10);        
        $set_session = mysqli_query($conn,"UPDATE auth set session_token='{$session_token}' ,  is_logged_in=1 where email='{$email}' and password='{$password}'");
        if($set_session){
          $user_data = mysqli_fetch_assoc($check_credentials);
            // proceed to set session
            $_SESSION['session_token'] = $user_data['session_token']; 
            $_SESSION['email']  = $user_data['email'];
            echo "
                <script>
                      location.replace('../dashboard/index.php');
                </script>
                      ";

            die;
        }
        else{
          $error_msg =  "<b style='color: red; padding-left:5px'>Something went wrong on our side !!</b>";  
          return $error_msg;        
        }
      }
      else{
        $error_msg =  "<b style='color: red; padding-left:5px'> Failed , wrong password</b>";
        return $error_msg;        
      }
      
    }
    else {
        $error_msg =  "<b style='color: red; padding-left:5px'> Failed , email is not registered!</b>";
        return $error_msg;   
    }
}

?> 