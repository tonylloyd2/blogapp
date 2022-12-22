<?php
function register($conn , $email , $password){
    $email = $_POST['email'];
    $password = $_POST['password'];
   
    $exec_query = mysqli_query($conn , "INSERT INTO `auth` ( `email`, `password`) VALUES ( '$email', '$password')");
    if(mysqli_query($conn,$exec_query)){
        $data = [
            'success' => 'Voter registered succesfully'
          ]; 
          $response = json_encode($data);
          echo "<script>
                alert('registration was successfull');
                location.replace('./login.php');
                </script>";
          
  }
  else if(!mysqli_query($conn,$exec_query)){
    $data = [
        'error' => 'There was an error in your registration please try again'
    ];
    $response = json_encode($data);
    echo($response);
  }                                     


}

?>