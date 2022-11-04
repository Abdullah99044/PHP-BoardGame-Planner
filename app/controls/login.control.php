<?php

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\models\login.model.php';


class Login_control { 

    public static function login(){
            
        if(!empty($_POST["username"]) && !empty($_POST["password"])){
            
            $userName = $passWord = " ";
            $userName = $_POST["username"];
            $passWord = $_POST["password"];
                
            $username = mysqli_real_escape_string(App::dataBase() ,  $userName);  
            $password = mysqli_real_escape_string(App::dataBase() ,  $passWord);   

            $login = Login_Model::login($username , $password);

            if(!$login){
        
                return false;

            }else{
        
                return true;
        
            }
        }

    
            
    }

} 











?>