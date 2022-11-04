<?php

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\models\signUp.model.php';


class SignUp_control{  

    public static function signUp() {

        $userName =  $passWord  =   $email = ''; 

      
        if(!empty($_POST["username"]) && !empty($_POST["password"])){

            
            $userName    =   $_POST["username"]; 
            $passWord    =   $_POST["password"];
            $email       =   $_POST["email"];  

            $userName    =   App::mysql_escape($userName);
            $passWord    =   App::mysql_escape($passWord);
            $email       =   App::mysql_escape($email);
        
            $is_data_exist = Signup_model::signUp($userName , $email);

            if($is_data_exist){

                return false; 

            }else{

                Signup_model::insert_singUp_data($userName , $email , $passWord);

                return true;
            }
 
        }
    }
     
}






?>