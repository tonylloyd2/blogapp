<?php
include "./generate_code.php";
    function insert_code_into_db($code , $email , $conn){
        $code = random_code(5) ;
        $result = mysqli_query($conn , "UPDATE table users_password set code='$code' where email='$email'")  ;
    }

?>