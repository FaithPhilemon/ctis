<?php
// Sanitize data 
function sanitize_data($input){
    htmlspecialchars(stripslashes(trim($input)));
    return $input;
}


//compare passwords
function comparePasswords($pass, $cPass){
    if($pass === $cPass){
        return true;
    }
    else{
        return false;
    }
}
?>