<?php

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\models\signUp.model.php';


class SignUp_control {

    public static function signUp() {

        $userName =  $passWord  =   $email = '';

        if($_SERVER["REQUEST_METHOD"] == "POST" ){

            if(!empty($_POST["username"]) && !empty($_POST["password"])){

                $userName = $_POST["username"];
                $passWord = $_POST["password"];
                $email =  $_POST["email"];  

                $userName = App::mysql_escape($userName);
                $passWord = App::mysql_escape($passWord);
                $email = App::mysql_escape($email);
            
                return Signup_model::signUp($userName , $email , $passWord);

               
 
            }else{

                return "write something";
                
            }
        }
    }
}






?>