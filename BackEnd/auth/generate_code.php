<?php
function random_code($length){   
    $alpha = array_merge(range('A','Z'));
    $rand_string = "";
    for ($i=0; $i <= $length ; $i++) { 
        $random = rand(1,2);
        if($random==1){
            $rand_string.=rand(0,9);
        }
        elseif($random==2){
            $rand_string.=$alpha[array_rand($alpha,1)];
        }
    }
    return $rand_string;
  }
?>