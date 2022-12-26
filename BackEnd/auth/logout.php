<?php
session_start();
include_once "../database/connect.php";
include_once "./generate_code.php";

if (isset($_POST['logout'])) {
    $email =  $_SESSION['email'];
    $session_token = random_code(10);
        //update db 
        $update_credentials = mysqli_query($conn,
            "UPDATE auth set session_token='{$session_token}' ,
                is_logged_in=0 where email='{$email}'");    
        if($update_credentials){
            unset($_SESSION['session_token']);
            unset($_SESSION['email']);
            session_destroy();
            echo " <script> alert('You have been logged out succesfully'); 
                             location.replace('../../FrontEnd/Authentication/login.php');
                    </script>";
            
            // die;
        }else{
            session_destroy();
            echo " <script> alert('You have been logged out succesfully'); </script>";
            header("location:../../FrontEnd/Authentication/login.php");
            die;
        }
        
        
    
    
}

?>