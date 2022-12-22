<?php
$servername = "localhost";
$username = "root";
$password = "0909";
$dbname = "Gen_z";
// Create connection
$conn = mysqli_connect($servername, $username, $password , $dbname);

// Check connection
if (!$conn){

    die();

}
?> 