<?php
// session_start();
function logout(){

if (isset($_SESSION['session_token']) ){

    unset($_SESSION['session_token']);

    session_destroy();

    echo " <script> alert ('You have been logged out succesfully');";

}

header("location:../Authentication/login.php");
die;

}

?>