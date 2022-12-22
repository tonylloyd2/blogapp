<?php
function register($conn , $email , $cpassword  ,$error_msg){
  
  $query_db = mysqli_query($conn , "SELECT * FROM auth where email='$email'");

  if (mysqli_num_rows($query_db) > 0 ) {
    $error_msg = "<b style='color:red'> Failed , email already reistered !</b>";
  }
  else{

       $exec_query = mysqli_query($conn , "INSERT INTO `auth` ( `email`, `password`) VALUES ( '$email', '$cpassword')");
        if($exec_query){
          $error_msg = "<b style='color:green'>Success , wait for redirection 😊</b>";
            $data = [
                'success' => ' registeration was successful'
              ]; 
              $response = json_encode($data);
      
              echo "<script>
                    location.replace('./login.php');
                    </script>";
              
        }
        else if(!$exec_query){
          $error_msg = "<b style='color:red'> Failed , kindly try again 😢</b>";
          $data = [
              'error' => 'There was an error in your registration please try again'
          ];
          $response = json_encode($data);
          echo($response);
        }
   }

}

?>;;