<?php

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\models\update_userInfo.model.php';

class UpdateInfo {

    public static function passwordUpdate(){


        if(empty($_POST["password"]) && empty($_POST["username"])){

            echo 'write something'; 

        }else{

                
            $username     =   $_SESSION["user_name"];
            $password     =   $_POST["password"];
            $new_password =   $_POST["newPassword"];

            $username     =   App::mysql_escape($username);
            $password     =   App::mysql_escape($password);
            $new_password =   App::mysql_escape($new_password);


            return UpdateInfo_MO::passwordUpdate($username , $password , $new_password);

        }
         
    } 

 
    public static function emailUpdate(){

        if(empty($_POST["email"]) && empty($_POST["newEmail"])){

            return 'write something'; 

        }else{

            $username   = $_SESSION["user_name"];
            $email      = $_POST["email"];
            $new_email  = $_POST["newEmail"];

            $email      = App::mysql_escape($email);
            $new_email  = App::mysql_escape($new_email);
            
            return UpdateInfo_MO::emailUpdate($username , $email , $new_email);
            
        }
    }

}
        

 
















?>