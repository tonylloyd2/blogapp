<?php
session_start();

include_once "../database/connect.php";
include_once "./generate_code.php";
function login($conn , $email , $password , $session_token , $error_msg){
    
   // check session for auto login
    $check_session= mysqli_query($conn,"SELECT * FROM auth WHERE email='{$email}'and is_logged_in=1");

    if (mysqli_num_rows($check_session) == 1) {
        $user_data = mysqli_fetch_assoc($check_session);
        $_SESSION['session_token'] = $user_data['session_token']; 
        header("location:../dashboard/index.php");
            
    } 
    else{ //proceed to authentication
        $check_credentials=mysqli_query($conn,"SELECT * FROM auth WHERE email='{$email}' limit 1");
        $user_data = mysqli_fetch_assoc($check_credentials);
            if(mysqli_num_rows($check_credentials) == 1){
            
                $validate_db = mysqli_query($conn,"SELECT * FROM auth WHERE email='{$email}' and password='{$password}' limit 1");
                if (mysqli_num_rows($validate_db) == 1 ) {
                    $set_session = mysqli_query($conn,"UPDATE auth set session_token='{$session_token}' ,  is_logged_in=1 where email='{$email}' and password='{$password}'");
                    // if($set_session == true){
                        //proceed to set session
                        
                        $_SESSION['session_token'] = $user_data['session_token'];  

                        echo $_SESSION['session_token'];
                        echo $user_data['email'];
                        // header("location:../dashboard/");
                        // die; 

                    // }else {
                    //     $error_msg =  "<b style='color: red; padding-left:5px'>Something went wrong try again</b>";
                    //     return $error_msg;     
                    // }
                }else{
                    $error_msg =  "<b style='color: red; padding-left:5px'>Wrong password !</b>";
                    return $error_msg; 
                }


            }else {
                $error_msg =  "<b style='color: red; padding-left:5px'> Failed , email is not registered!</b>";
                return $error_msg;
            }
    }

}


?> 